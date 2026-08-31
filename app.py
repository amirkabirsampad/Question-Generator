from flask import Flask, render_template, request, send_file, jsonify, redirect, url_for, session
import os
import dotenv
from datetime import datetime
from openai import OpenAI
import requests
import io
import json
import traceback
import hashlib
import time
from PyPDF2 import PdfReader

try:
    import arabic_reshaper
    from bidi.algorithm import get_display
    PERSIAN_SUPPORT = True
except ImportError:
    PERSIAN_SUPPORT = False
    print("⚠️  کتابخانه‌های فارسی نصب نیستند. برای نصب: pip install arabic-reshaper python-bidi")

# Load environment variables
dotenv.load_dotenv()

app = Flask(__name__)
app.config['MAX_CONTENT_LENGTH'] = 16 * 1024 * 1024
app.config['SECRET_KEY'] = os.urandom(24)

# ذخیره درخواست‌های در حال پردازش
processing_requests = {}

# DeepSeek Configuration
try:
    client = OpenAI(
        api_key=os.environ.get('API_KEY'),
        base_url="https://api.deepseek.com")
    print("✅ OpenAI configuration set for DeepSeek/OpenRouter")
except Exception as e:
    print(f"❌ خطا در تنظیم OpenAI: {e}")

os.makedirs('uploads', exist_ok=True)

def extract_text_from_pdf(pdf_file):
    try:
        reader = PdfReader(pdf_file)
        text = "".join(page.extract_text() + "\n" for page in reader.pages)
        return text
    except Exception as e:
        return f"خطا در خواندن PDF: {str(e)}"

# ⭐️ تغییر: تابع حالا یک فلگ برای حالت تست می‌گیرد
def generate_questions_with_ai(text, subject, grade, chapter, count,testmode = False):
    """
    Generate questions using AI.
    """
    if testmode:
        print("⚙️ حالت تست فعال است: بازگشت سوالات نمونه ثابت")
        return {
            "questions": [
                {
                    "id": "field_1",
                    "type": "text",
                    "label": "(سوال کوتاه)",
                    "name": "",
                    "placeholder": "(جواب)",
                    "required": False,
                    "className": "",
                    "validation": {"minLength": "", "maxLength": "", "pattern": ""}
                },
                {
                    "id": "field_2",
                    "type": "textarea",
                    "label": "(سوال)",
                    "name": "",
                    "placeholder": "(جواب)",
                    "required": False,
                    "className": "",
                    "validation": {"minLength": "", "maxLength": "", "pattern": ""}
                },
                {
                    "id": "field_3",
                    "type": "radio",
                    "label": "(سوال درست یا نادرست)",
                    "name": "field_2",
                    "placeholder": "(جواب)",
                    "required": False,
                    "className": "",
                    "validation": {"minLength": "", "maxLength": "", "pattern": ""},
                    "options": [{"value": "option1", "label": "غلط"}, {"value": "option2", "label": "درست"}]
                },
                {
                    "id": "field_4",
                    "type": "radio",
                    "name": "",
                    "placeholder": "(گزینه صحیح)",
                    "required": False,
                    "className": "",
                    "validation": {"minLength": "", "maxLength": "", "pattern": ""},
                    "options": [
                        {"value": "option1", "label": "(گزینه 1)"},
                        {"value": "option2", "label": "(گزینه 2)"},
                        {"value": "option3", "label": "(گزینه 3)"},
                        {"value": "option4", "label": "(گزینه 4)"}
                    ]
                }
            ]
        }
    else:     
        try:
            print("🤖 در حال تولید سوالات با AI...")
            prompt = f"""
                    {text}
    .

        این متن جدید کتاب {subject} پایه{grade} ایران است {count} نمونه سوال از درس {chapter} بدون هیچ توضیح اضافی در قالب json به ترتیب ، جواب کوتاه ، تشریحی ، صحیح و غلط و چهار گزینه ای بده فقط اون قسمت هایی که داخل پرانتز است مانند(سوال) را در تغییر بده :
        {{
        "questions": [
        {{
        "id": "field_1",
        "type": "text",
        "label": "(سوال کوتاه)",
        "name": "", "placeholder": "(جواب)", "required": False, "className": "",
        "validation": {{"minLength": "", "maxLength": "", "pattern": ""}}
        }},
        {{
        "id": "field_2",
        "type": "textarea",
        "label": "(سوال)",
        "name": "", "placeholder": "(جواب)", "required": False, "className": "",
        "validation": {{"minLength": "", "maxLength": "", "pattern": ""}}
        }},
        {{
        "id": "field_3",
        "type": "radio",
        "label": "(سوال درست یا نادرست)",
        "name": "field_2", "placeholder": "(جواب)", "required": False, "className": "",
        "validation": {{"minLength": "", "maxLength": "", "pattern": ""}},
        "options": [{{"value": "option1", "label": "غلط"}}, {{"value": "option2", "label": "درست"}}]
        }},
        {{
        "id": "field_4",
        "type": "radio",
        # "label": "(سوال چند گزینه‌ای)",
        "name": "", "placeholder": "(گزینه صحیح)", "required": False, "className": "",
        "validation": {{"minLength": "", "maxLength": "", "pattern": ""}},
        "options": [
        {{"value": "option1", "label": "(گزینه 1)"}},
        {{"value": "option2", "label": "(گزینه 2)"}},
        {{"value": "option3", "label": "(گزینه 3)"}},
        {{"value": "option4", "label": "(گزینه 4)"}}
        ]
        }}
        ]
        }} 
            """
            response = client.chat.completions.create(
                model="	deepseek-v4-flash",
                messages=[
                    {"role": "system", "content": "You are a helpful assistant"},
                    {"role": "user", "content": "Hello"},
                ],
                stream=False,
                reasoning_effort="high",
                extra_body={"thinking": {"type": "enabled"}}
            )
            print("✅ پاسخ از AI دریافت شد")
            result = response.choices[0].message.content.strip()
            print(f"📝 پاسخ خام: {result[:150]}...")
            
            # پاکسازی و پارس کردن JSON
            clean_result = result.replace('```json', '').replace('```', '').strip()
            try:
                questions_data = json.loads(clean_result)
                print("✅ JSON پارس شد")
                return questions_data
            except json.JSONDecodeError as je:
                print(f"❌ خطا در پارس JSON: {je}")
                import re
                json_match = re.search(r'\{.*\}', clean_result, re.DOTALL)
                if json_match:
                    questions_data = json.loads(json_match.group())
                    print("✅ JSON از regex استخراج شد")
                    return questions_data
                else:
                    return {"error": f"پاسخ AI قابل تجزیه نیست: {result}"}
        except Exception as e:
            print(f"❌ خطا در تولید سوال: {e}")
            return {"error": f"خطا در تولید سوال: {str(e)}"}

# تابع ساخت HTML آزمون
def create_exam_html(questions, subject, grade, chapter, school_name, teacher_name, exam_name):
    """Create HTML content for the exam"""
    
    # استخراج شماره فصل (فقط عدد)
    chapter_num = ''.join(filter(str.isdigit, str(chapter))) or '۱'
    
    html = f"""
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{exam_name}</title>
    <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@400;700&display=swap" rel="stylesheet">
    <style>
        @page {{
            size: A4;
            margin: 15mm;
            @bottom-center {{
                content: "صفحه " counter(page);
                font-size: 12px;
            }}
        }}
        body {{
            font-family: 'Vazirmatn', sans-serif;
            direction: rtl;
            margin: 10px;
            line-height: 1.4;
            font-size: 14px;
        }}
        .header {{
            text-align: center;
            margin-bottom: 20px;
            font-size: 20px;
            font-weight: bold;
        }}
        .info-table {{
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }}
        .info-table td {{
            border: 2px solid black;
            padding: 6px;
            text-align: right;
        }}
        .exam-title {{
            text-align: center;
            font-size: 18px;
            font-weight: bold;
            margin: 15px 0;
            border-bottom: 2px solid black;
        }}
        .questions-table {{
            width: 100%;
            border-collapse: collapse;
        }}
        .questions-table th, .questions-table td {{
            border: 1px solid black;
            padding: 4px;
            text-align: right;
            vertical-align: top;
        }}
        .questions-table th {{
            background-color: #f0f0f0;
            font-weight: bold;
        }}
        .question-number {{
            width: 40px;
            text-align: center;
        }}
        .question-text {{
            text-align: right;
        }}
        @media print {{
            body {{
                margin: 0;
                font-size: 14px;
            }}
            .questions-table {{
                page-break-inside: auto;
                border-collapse: separate;
                border-spacing: 0;
            }}
            .info-table {{
                page-break-inside: auto;
                
                border-spacing: 0;
            }}
            .questions-table tr {{
                page-break-inside: avoid;
            }}
            .questions-table th, .questions-table td {{
                
            }}
            .questions-table th {{
                background-color: #f0f0f0;
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }}
            thead {{
                display: table-header-group;
            }}
        }}
    </style>
</head>
<body>
    <div class="header">
        بسم الله الرحمن الرحیم
    </div>
    
    <table class="info-table">
        <tr>
            <td>نام و نام خانوادگی: &nbsp;</td>
            <td>نام درس: {subject}</td>
            <td>فصل: {chapter_num}</td>
        </tr>
        <tr>
            <td>پایه: {grade}</td>
            <td>نام معلم: {teacher_name}</td>
            <td>نام مدرسه: {school_name}</td>
        </tr>
    </table>
    
    <table class="questions-table">
        <thead>
            <tr>
                <th class="question-number">شماره</th>
                <th class="question-text">سوال</th>
            </tr>
        </thead>
        <tbody>
"""
    
    for i, question in enumerate(questions, 1):
        q_type = question.get('type', 'text')
        q_label = question.get('label', 'سوال بدون عنوان')
        
        question_html = f"{q_label}"
        
        # اضافه کردن گزینه‌ها
        if q_type in ['radio', 'checkbox'] and 'options' in question:
            options = question.get('options', [])
            option_labels = ['الف)', 'ب)', 'ج)', 'د)']
            
            for j, option in enumerate(options[:4]):
                option_text = option.get('label', option.get('value', ''))
                question_html += f"<br/>{option_labels[j]} {option_text}"
        
        # اضافه کردن جای خالی برای جواب
        if q_type == 'text':
            question_html += "<br><br><br>"
        elif q_type == 'textarea':
            question_html += "<br><br><br><br><br><br>"
        
        html += f"""
        <tr>
            <td class="question-number">{i}</td>
            <td class="question-text">{question_html}</td>
        </tr>
"""
    
    html += """
        </tbody>
    </table>
</body>
</html>
"""
    
    return html

@app.route('/')
def index():
    return render_template('index.html')
@app.route('/form')
def form():
    return render_template('form.html')

@app.route('/generate', methods=['POST'])
def generate_questions():
    try:
        # ✅ حالت تست: همیشه فعال است
        
        
        text = ""
        
        # این بلاک فقط در حالت واقعی اجرا می‌شود
        print("⚙️ حالت واقعی: پردازش فایل PDF...")
        if 'pdf_file' not in request.files or not request.files['pdf_file'].filename:
            return jsonify({"error": "هیچ فایل PDF آپلود نشده است."}), 400
        
        pdf_file = request.files['pdf_file']
        print("📖 استخراج متن از PDF...")
        # text = extract_text_from_pdf(pdf_file)
        # if len(text.strip()) < 50:
        #     return jsonify({"error": "متن استخراج شده از PDF کافی نیست"}), 400

        subject = request.form.get('subject', 'عمومی')
        grade = request.form.get('grade', 'دهم')
        chapter = request.form.get('chapter', 'فصل ۱')
        count = int(request.form.get('count', 5))
        question_types = request.form.getlist('question_types') or ['multiple_choice']
        school_name = request.form.get('school_name', 'مدرسه نمونه')
        teacher_name = request.form.get('teacher_name', 'معلم')

        questions_data = generate_questions_with_ai(text, subject, grade, chapter, count)

        return jsonify({
            "id": 1763210740939,
            "name": "آزمون تولید شده",
            "data": questions_data.get("questions", []),        
            "createdAt": "۱۴۰۴/۸/۲۴",
            "updatedAt": "۱۴۰۴/۸/۲۴"
        })

    except Exception as e:
        print(f"❌ خطای سرور: {str(e)}")
        traceback.print_exc()
        return jsonify({"error": f"خطای سرور: {str(e)}"}), 500

@app.route('/editor')
def editor():
    return render_template('editor.html') 
# def editor():
#     try:
#         # 1. دریافت داده‌های JSON از بدنه درخواست
#         # چون در جاوااسکریپت Content-Type: 'application/json' را ست کردید،
#         # باید از request.get_json() استفاده کنید.
#         data = request.get_json()

#         # یک بررسی کوچک برای اطمینان از اینکه داده‌ای دریافت شده
#         if not data:
#             return jsonify({"error": "هیچ داده JSON دریافت نشد"}), 400

#         # # 2. استخراج اطلاعات از دیکشنری پایتون
#         # questions = data.get('questions')
#         # subject = data.get('subject')
#         # grade = data.get('grade')
#         # school_name = data.get('school_name')
#         # teacher_name = data.get('teacher_name')
#         print(type(data))
#         # حالا می‌توانید با این داده‌ها هر کاری انجام دهید.
#         # مثلاً آن‌ها را به یک تمپلیت پاس دهید تا یک صفحه ویرایشگر رندر شود.
#         print("✅ داده‌ها با موفقیت در روت /editor دریافت شد.")
        
#         # 3. رندر کردن صفحه ویرایشگر و ارسال داده‌ها به آن
#         # فرض می‌کنیم یک فایل به نام editor.html در پوشه templates دارید.
#         return render_template('editor.html', 
#                                questions=questions,
#                                subject=subject,
#                                grade=grade,
#                                school_name=school_name,
#                                teacher_name=teacher_name)

#     except Exception as e:
#         # این بخش برای مدیریت خطاهای احتمالی است
#         print(f"❌ خطا در روت /editor: {e}")
#         return jsonify({"error": f"خطای داخلی سرور: {str(e)}"}), 500
# # مسیر دانلود
@app.route('/download/<filename>')
def download_file(filename):
    try:
        filepath = os.path.join('uploads', filename)
        if os.path.exists(filepath):
            return send_file(filepath, as_attachment=True, download_name=filename, mimetype='application/pdf')
        return jsonify({"error": "فایل یافت نشد"}), 404
    except Exception as e:
        return jsonify({"error": str(e)}), 500
@app.route('/generatepdf', methods=['POST'])
def generate_pdf():
    try:
        # دریافت داده‌های JSON
        data = request.get_json()
        
        if not data:
            return jsonify({"error": "داده‌ای دریافت نشد"}), 400
        
        # استخراج اطلاعات
        questions = data.get('questions', [])
        subject = data.get('subject', 'عمومی')
        grade = data.get('grade', 'دهم')
        chapter = data.get('chapter', 'فصل ۱')
        school_name = data.get('school_name', 'مدرسه نمونه')
        teacher_name = data.get('teacher_name', 'معلم')
        exam_name = data.get('exam_name', 'آزمون')
        
        if not questions:
            return jsonify({"error": "هیچ سوالی برای تولید PDF وجود ندارد"}), 400
        
        print(f"📄 در حال ساخت HTML برای {len(questions)} سوال...")
        
        # ساخت HTML
        html_content = create_exam_html(questions, subject, grade, chapter, school_name, teacher_name, exam_name)
        
        print(f"✅ HTML ساخته شد")
        
        # بازگشت HTML
        return html_content, 200, {'Content-Type': 'text/html; charset=utf-8'}
        
    except Exception as e:
        print(f"❌ خطا در تولید HTML: {e}")
        traceback.print_exc()
        return jsonify({"error": f"خطا در تولید HTML: {str(e)}"}), 500

if __name__ == '__main__':
    app.run(debug=True, host='0.0.0.0', port=5000)
