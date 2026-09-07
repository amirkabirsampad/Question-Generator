<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $examName }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Vazirmatn', Tahoma, sans-serif;
            background: #fff;
            color: #1a202c;
            font-size: 11.5px;
            line-height: 1.4;
            padding: 7mm 9mm;
        }

        /* ===== هدر فشرده ===== */
        .exam-header {
            background: linear-gradient(135deg, #ebf4ff 0%, #e9d8fd 100%);
            border: 1.5px solid #5a67d8;
            border-radius: 7px;
            padding: 7px 10px;
            margin-bottom: 7px;
            position: relative;
            overflow: hidden;
        }

        .exam-header::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 4px;
            height: 100%;
            background: linear-gradient(180deg, #667eea, #764ba2);
        }

        .exam-header-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 5px;
        }

        .school-name {
            font-weight: 700;
            font-size: 11px;
            color: #434190;
            background: #fff;
            padding: 2px 8px;
            border-radius: 12px;
            border: 1px solid #c3dafe;
        }

        .exam-title {
            font-weight: 700;
            font-size: 13.5px;
            color: #2c5282;
            text-align: center;
            flex: 1;
        }

        .exam-badge {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: #fff;
            font-size: 10px;
            font-weight: 600;
            padding: 2px 9px;
            border-radius: 12px;
        }

        .exam-meta {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 3px 10px;
            background: rgba(255,255,255,0.75);
            border-radius: 5px;
            padding: 5px 8px;
            font-size: 10.5px;
        }

        .exam-meta .item {
            display: flex;
            gap: 3px;
            align-items: baseline;
        }

        .exam-meta .label {
            color: #5a67d8;
            font-weight: 600;
            white-space: nowrap;
        }

        .exam-meta .value {
            color: #2d3748;
            border-bottom: 1px dotted #a3bffa;
            flex: 1;
            min-width: 40px;
        }

        /* ===== مشخصات دانش‌آموز ===== */
        .student-box {
            display: grid;
            grid-template-columns: 1.4fr 0.8fr 0.8fr;
            gap: 6px;
            margin-bottom: 8px;
            background: #f7fafc;
            border: 1px solid #e2e8f0;
            border-radius: 6px;
            padding: 5px 8px;
        }

        .student-box .field {
            display: flex;
            align-items: center;
            gap: 4px;
            font-size: 11px;
        }

        .student-box .field .label {
            color: #4a5568;
            font-weight: 600;
            white-space: nowrap;
        }

        .student-box .field .line {
            flex: 1;
            height: 14px;
            border-bottom: 1.2px solid #a0aec0;
        }

        /* ===== سوالات فشرده ===== */
        .question {
            margin-bottom: 5px;
            padding: 5px 7px;
            background: #fff;
            border: 1px solid #e2e8f0;
            border-right: 2.5px solid #667eea;
            border-radius: 5px;
            page-break-inside: avoid;
            break-inside: avoid;
        }

        .question:nth-child(even) {
            border-right-color: #9f7aea;
            background: #faf5ff;
        }

        .question-header {
            display: flex;
            align-items: flex-start;
            gap: 5px;
        }

        .q-number {
            background: linear-gradient(135deg, #667eea, #5a67d8);
            color: #fff;
            font-weight: 700;
            font-size: 10px;
            min-width: 18px;
            height: 18px;
            border-radius: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .question:nth-child(even) .q-number {
            background: linear-gradient(135deg, #9f7aea, #805ad5);
        }

        .q-text {
            font-weight: 500;
            color: #1a202c;
            padding-top: 1px;
            font-size: 11.5px;
        }

        /* گزینه‌ها */
        .options {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 2px 12px;
            margin: 3px 4px 0 0;
            font-size: 11px;
        }

        .option {
            display: flex;
            align-items: flex-start;
            gap: 4px;
            padding: 1px 3px;
        }

        .option-circle {
            width: 11px;
            height: 11px;
            border: 1.3px solid #5a67d8;
            border-radius: 50%;
            flex-shrink: 0;
            margin-top: 2px;
            background: #fff;
        }

        .question:nth-child(even) .option-circle {
            border-color: #805ad5;
        }

        /* خطوط پاسخ خیلی فشرده */
        .answer-area {
            margin: 3px 2px 0 0;
        }

        .answer-line {
            height: 14px;
            border-bottom: 1px solid #cbd5e0;
            margin-bottom: 10px;
        }

        .answer-area.short .answer-line:nth-child(n+2) {
            display: none;
        }

        .answer-area.long .answer-line:nth-child(n+3) {
            display: none;
        }

        /* ===== فوتر ===== */
        .exam-footer {
            margin-top: 8px;
            padding: 5px 10px;
            background: linear-gradient(135deg, #ebf4ff, #e9d8fd);
            border-radius: 6px;
            border: 1px solid #c3dafe;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 10.5px;
            color: #4c51bf;
        }

        .exam-footer .wish {
            font-weight: 600;
        }

        .exam-footer .page-info {
            background: #fff;
            padding: 1px 8px;
            border-radius: 10px;
            border: 1px solid #c3dafe;
            font-size: 10px;
        }

        /* ===== چاپ ===== */
        @page {
            size: A4;
            margin: 6mm 8mm;
        }

        @media print {
            body {
                padding: 0;
                font-size: 11px;
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }

            .exam-header {
                margin-bottom: 5px;
                padding: 5px 8px;
            }

            .student-box {
                margin-bottom: 5px;
                padding: 4px 6px;
            }

            .question {
                margin-bottom: 4px;
                padding: 4px 6px;
            }

            .answer-line {
                height: 12px;
            }
        }
    </style>
</head>
<body>

    <div class="exam-header">
        <div class="exam-header-top">
            <div class="school-name">{{ $schoolName ?: 'نام مدرسه' }}</div>
            <div class="exam-title">{{ $examName }}</div>
            <div class="exam-badge">آزمون</div>
        </div>
        <div class="exam-meta">
            <div class="item">
                <span class="label">درس:</span>
                <span class="value">{{ $subject }}</span>
            </div>
            <div class="item">
                <span class="label">پایه:</span>
                <span class="value">{{ $grade }}</span>
            </div>
            <div class="item">
                <span class="label">فصل:</span>
                <span class="value">{{ $chapter }}</span>
            </div>
            <div class="item">
                <span class="label">معلم:</span>
                <span class="value">{{ $teacherName }}</span>
            </div>
            <div class="item">
                <span class="label">تاریخ:</span>
                <span class="value"></span>
            </div>
            <div class="item">
                <span class="label">مدت:</span>
                <span class="value"></span>
            </div>
        </div>
    </div>

    <div class="student-box">
        <div class="field">
            <span class="label">نام و نام‌خانوادگی:</span>
            <span class="line"></span>
        </div>
        <div class="field">
            <span class="label">کلاس:</span>
            <span class="line"></span>
        </div>
        <div class="field">
            <span class="label">نمره:</span>
            <span class="line"></span>
        </div>
    </div>

    @foreach($questions as $index => $q)
        @php
            $type = $q['type'] ?? 'text';
            $label = $q['label'] ?? $q['question'] ?? 'سوال';
            $options = $q['options'] ?? [];
        @endphp

        <div class="question">
            <div class="question-header">
                <div class="q-number">{{ $index + 1 }}</div>
                <div class="q-text">{{ $label }}</div>
            </div>

            @if($type === 'radio' && count($options) > 0)
                <div class="options">
                    @foreach($options as $opt)
                        <div class="option">
                            <span class="option-circle"></span>
                            <span>{{ is_array($opt) ? ($opt['label'] ?? $opt['value'] ?? '') : $opt }}</span>
                        </div>
                    @endforeach
                </div>
            @elseif($type === 'textarea')
                <div class="answer-area long">
                    <div class="answer-line"></div>
                    <div class="answer-line"></div>
                </div>
            @else
                <div class="answer-area short">
                    <div class="answer-line"></div>
                </div>
            @endif
        </div>
    @endforeach

    <div class="exam-footer">
        <span class="wish">✨ موفق و پیروز باشید</span>
        <span class="page-info">{{ $examName }}</span>
    </div>

    <script>
        window.onload = function () {
            setTimeout(function () {
                window.print();
            }, 350);
        };
    </script>
</body>
</html>
