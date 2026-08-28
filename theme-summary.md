# تم سایت سوال‌ساز

## نمای کلی
تم مدرن با گرادیان آبی-بنفش، فونت Vazirmatn، تم دارک/لایت، ریسپانسیو.

## رنگ‌ها
```css
--primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
--secondary-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
--success-gradient: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
--warning-gradient: linear-gradient(135deg, #fa709a 0%, #fee140 100%);
--dark-gradient: linear-gradient(135deg, #2d3748 0%, #1a202c 100%);
--bg-color: #f8fafc;
--text-primary: #2d3748;
--text-secondary: #718096;
--border-color: #e2e8f0;
```

## فونت‌ها
- Vazirmatn (وزیر متن) از Google Fonts، وزن 100-900، RTL.

## ساختار صفحه
```html
<div class="app-container">
  <header class="app-header"><!-- برند و دکمه‌ها --></header>
  <div class="app-main">
    <main class="canvas-container"><!-- محتوا --></main>
  </div>
</div>
```

## هدر
```css
.app-header { background: var(--dark-gradient); padding: 1rem 2rem; display: flex; justify-content: space-between; align-items: center; }
.brand-icon { width: 48px; height: 48px; background: var(--primary-gradient); border-radius: 12px; animation: float 3s ease-in-out infinite; }
```

## دکمه‌ها
```css
.btn { padding: 0.6rem 1.25rem; border: none; border-radius: 10px; background: var(--primary-gradient); color: white; cursor: pointer; transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); display: inline-flex; align-items: center; gap: 0.5rem; }
.btn:hover { transform: translateY(-2px); box-shadow: 0 8px 20px rgba(0,0,0,0.2); }
```

## کارت‌ها
```css
.card { background: white; border-radius: 16px; box-shadow: 0 4px 16px rgba(0,0,0,0.1); padding: 2rem; transition: all 0.3s ease; }
.card:hover { transform: translateY(-4px); box-shadow: 0 8px 24px rgba(0,0,0,0.15); }
```

## فرم‌ها
```css
.form-control { width: 100%; padding: 0.75rem; border: 2px solid #e2e8f0; border-radius: 8px; font-family: inherit; transition: border-color 0.3s ease; }
.form-control:focus { outline: none; border-color: #4299e1; box-shadow: 0 0 0 3px rgba(66, 153, 225, 0.1); }
```

## تم دارک
```css
body.dark-mode { --bg-color: #1a202c; --text-primary: #f7fafc; --text-secondary: #cbd5e0; --border-color: #2d3748; background: linear-gradient(135deg, #1a202c 0%, #2d3748 100%); }
body.dark-mode .app-container { background: #1a202c; }
```

## انیمیشن‌ها
```css
@keyframes float { 0%, 100% { transform: translateY(0px); } 50% { transform: translateY(-5px); } }
@keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }
```

## ریسپانسیو
- موبایل: max-width: 768px - ستون‌ها عمودی
- تبلت: max-width: 1024px - سایدبار کوچکتر
- دسکتاپ: کامل

## کامپوننت‌ها
- نوتیفیکیشن: گوشه بالا راست با اسلاید
- مودال: backdrop blur و اسکیل
- لودینگ: اسپینر

## نکات
- CSS Variables برای تم‌ها
- cubic-bezier برای smoothness
- direction: rtl برای RTL
- Font Awesome 6 برای آیکون‌ها
- JS برای toggle تم</content>
<parameter name="filePath">e:\Codein\MVPazmoonsaz\question-generator-mvp\theme-summary.md