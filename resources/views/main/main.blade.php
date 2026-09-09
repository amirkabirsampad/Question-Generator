<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- SEO Meta Tags -->
    <title>سوال‌ساز هوشمند | تولید خودکار سوالات آزمون با هوش مصنوعی</title>
    <meta name="description"
        content="سوال‌ساز هوشمند با هوش مصنوعی، PDF درس شما را تبدیل به سوالات آزمون حرفه‌ای می‌کند. رایگان امتحان کنید و زمان خود را صرفه‌جویی کنید.">
    <meta name="keywords" content="سوال‌ساز، تولید سوال، هوش مصنوعی، آزمون، تست، تشریحی، معلم، استاد، مدرسه">
    <meta name="author" content="سوال‌ساز هوشمند">
    <meta name="robots" content="index, follow">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://soalsaz.com/">
    <meta property="og:title" content="سوال‌ساز هوشمند | تولید خودکار سوالات آزمون">
    <meta property="og:description" content="با هوش مصنوعی، در چند ثانیه سوالات آزمون حرفه‌ای بسازید!">
    <meta property="og:image" content="https://soalsaz.com/og-image.jpg">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://soalsaz.com/">
    <meta property="twitter:title" content="سوال‌ساز هوشمند | تولید خودکار سوالات آزمون">
    <meta property="twitter:description" content="با هوش مصنوعی، در چند ثانیه سوالات آزمون حرفه‌ای بسازید!">

    <!-- Canonical URL -->
    <link rel="canonical" href="https://soalsaz.com/">

    <!-- Fonts & Icons -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Schema.org Markup -->
    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@@type": "SoftwareApplication",
      "name": "سوال‌ساز هوشمند",
      "applicationCategory": "EducationalApplication",
      "description": "تولید خودکار سوالات آزمون با هوش مصنوعی",
      "operatingSystem": "Web",
      "offers": {
        "@@type": "Offer",
        "price": "0",
        "priceCurrency": "IRR"
      },
      "aggregateRating": {
        "@@type": "AggregateRating",
        "ratingValue": "4.8",
        "ratingCount": "1250"
      }
    }
    </script>

    <script src="{{ asset('asset/js/tailwind.js') }}"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        vazir: ['Vazirmatn', 'sans-serif'],
                    },
                    colors: {
                        primary: '#667eea',
                        secondary: '#764ba2',
                    },
                    animation: {
                        'fade-in-up': 'fadeInUp 0.8s ease forwards',
                        'float': 'float 3s ease-in-out infinite',
                    },
                    keyframes: {
                        fadeInUp: {
                            '0%': {
                                opacity: '0',
                                transform: 'translateY(30px)'
                            },
                            '100%': {
                                opacity: '1',
                                transform: 'translateY(0)'
                            },
                        },
                        float: {
                            '0%, 100%': {
                                transform: 'translateY(0)'
                            },
                            '50%': {
                                transform: 'translateY(-5px)'
                            },
                        }
                    }
                }
            }
        }
    </script>

    <style>
        body {
            font-family: 'Vazirmatn', Tahoma, sans-serif !important;
        }

        /* بقیه استایل‌ها */
        html {
            scroll-behavior: smooth;
        }

        .faq-answer {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease;
        }

        .faq-item.active .faq-answer {
            max-height: 500px;
        }

        .faq-item.active .faq-question i {
            transform: rotate(180deg);
        }

        .animate-on-scroll {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s ease;
        }

        .animate-on-scroll.animated {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
</head>

<body class="font-vazir bg-white text-slate-800 dark:bg-slate-900 dark:text-slate-100 overflow-x-hidden">

    <!-- Header -->
    <header class="fixed top-0 w-full z-50 bg-gradient-to-br from-slate-800 to-slate-900 text-white shadow-lg">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center gap-8">
            <div class="flex items-center gap-4">
                <div
                    class="w-12 h-12 bg-gradient-to-br from-primary to-secondary rounded-xl flex items-center justify-center text-2xl animate-float">
                    <i class="fas fa-brain"></i>
                </div>
                <div>
                    <h1 class="text-xl font-bold leading-tight">سوال‌ساز هوشمند</h1>
                    <div class="text-xs text-slate-400 font-normal">تولید سوال با هوش مصنوعی</div>
                </div>
            </div>
            <div class="flex items-center gap-2">
                <button id="darkModeToggle"
                    class="w-10 h-10 flex items-center justify-center rounded-xl bg-white/10 hover:bg-white/20 transition-all"
                    title="تغییر تم">
                    <i class="fas fa-moon"></i>
                </button>
                <a href="form/"
                    class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-gradient-to-br from-slate-500 to-slate-600 hover:from-slate-400 hover:to-slate-500 text-white font-semibold transition-all hover:-translate-y-0.5 hover:shadow-lg">
                    <i class="fas fa-book"></i>
                    تولید سوال
                </a>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="pt-40 pb-24 px-6 bg-gradient-to-br from-primary to-secondary relative overflow-hidden">
        <!-- Wave decoration -->
        <div
            class="absolute inset-0 opacity-30 bg-[url('data:image/svg+xml,<svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 1440 320\"><path fill=\"rgba(255,255,255,0.1)\" d=\"M0,96L48,112C96,128,192,160,288,165.3C384,171,480,149,576,154.7C672,160,768,192,864,197.3C960,203,1056,181,1152,165.3C1248,149,1344,139,1392,133.3L1440,128L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z\"></path></svg>')] bg-no-repeat bg-bottom bg-cover">
        </div>

        <div class="max-w-5xl mx-auto text-center relative z-10">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-black text-white mb-6 leading-tight animate-fade-in-up">
                تولید سوالات آزمون با هوش مصنوعی 🧠
            </h1>
            <p class="text-lg md:text-xl text-white/95 mb-10 animate-fade-in-up" style="animation-delay: 0.2s;">
                PDF درس خود را آپلود کنید، در عرض چند ثانیه سوالات حرفه‌ای دریافت کنید!<br>
                بدون نیاز به ثبت‌نام، کاملاً رایگان
            </p>
            <div class="flex flex-col sm:flex-row gap-6 justify-center animate-fade-in-up"
                style="animation-delay: 0.4s;">
                <a href="main/form"
                    class="inline-flex items-center justify-center gap-3 px-10 py-4 bg-white text-primary font-bold text-lg rounded-xl shadow-xl hover:-translate-y-1 hover:shadow-2xl transition-all">
                    <i class="fas fa-rocket"></i>
                    برو به فرم
                </a>
                <a href="#how-it-works"
                    class="inline-flex items-center justify-center gap-3 px-10 py-4 bg-transparent text-white font-bold text-lg rounded-xl border-2 border-white hover:bg-white hover:text-primary transition-all">
                    <i class="fas fa-play-circle"></i>
                    نحوه کار
                </a>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-16 px-6 bg-white dark:bg-slate-800 border-b border-slate-200 dark:border-slate-700">
        <div class="max-w-6xl mx-auto grid grid-cols-2 md:grid-cols-4 gap-10">
            <div class="text-center animate-on-scroll">
                <div
                    class="text-4xl md:text-5xl font-black bg-gradient-to-br from-primary to-secondary bg-clip-text text-transparent mb-2">
                    12,500+
                </div>
                <div class="text-base font-semibold text-slate-500 dark:text-slate-400">
                    سوال تولید شده
                </div>
            </div>
            <div class="text-center animate-on-scroll">
                <div
                    class="text-4xl md:text-5xl font-black bg-gradient-to-br from-primary to-secondary bg-clip-text text-transparent mb-2">
                    1,250+
                </div>
                <div class="text-base font-semibold text-slate-500 dark:text-slate-400">
                    معلم راضی
                </div>
            </div>
            <div class="text-center animate-on-scroll">
                <div
                    class="text-4xl md:text-5xl font-black bg-gradient-to-br from-primary to-secondary bg-clip-text text-transparent mb-2">
                    4.8/5
                </div>
                <div class="text-base font-semibold text-slate-500 dark:text-slate-400">
                    امتیاز کاربران
                </div>
            </div>
            <div class="text-center animate-on-scroll">
                <div
                    class="text-4xl md:text-5xl font-black bg-gradient-to-br from-primary to-secondary bg-clip-text text-transparent mb-2">
                    30 ثانیه
                </div>
                <div class="text-base font-semibold text-slate-500 dark:text-slate-400">
                    سرعت تولید
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-24 px-6 bg-slate-50 dark:bg-slate-900" id="features">
        <div class="max-w-3xl mx-auto text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-extrabold text-slate-800 dark:text-white mb-4">چرا سوال‌ساز هوشمند؟
            </h2>
            <p class="text-lg text-slate-500 dark:text-slate-400">ابزاری حرفه‌ای برای معلمان و اساتید برای صرفه‌جویی در
                وقت</p>
        </div>

        <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Feature 1 -->
            <div
                class="bg-white dark:bg-slate-800 p-10 rounded-2xl shadow-lg hover:-translate-y-2 hover:shadow-2xl hover:shadow-primary/20 transition-all duration-300 animate-on-scroll">
                <div
                    class="w-16 h-16 bg-gradient-to-br from-primary to-secondary rounded-xl flex items-center justify-center text-2xl text-white mb-6">
                    <i class="fas fa-magic"></i>
                </div>
                <h3 class="text-xl font-bold text-slate-800 dark:text-white mb-4">هوش مصنوعی پیشرفته</h3>
                <p class="text-slate-500 dark:text-slate-400 leading-relaxed">با استفاده از آخرین تکنولوژی‌های AI،
                    سوالات با کیفیت بالا و متنوع تولید می‌کنیم</p>
            </div>

            <!-- Feature 2 -->
            <div
                class="bg-white dark:bg-slate-800 p-10 rounded-2xl shadow-lg hover:-translate-y-2 hover:shadow-2xl hover:shadow-primary/20 transition-all duration-300 animate-on-scroll">
                <div
                    class="w-16 h-16 bg-gradient-to-br from-primary to-secondary rounded-xl flex items-center justify-center text-2xl text-white mb-6">
                    <i class="fas fa-bolt"></i>
                </div>
                <h3 class="text-xl font-bold text-slate-800 dark:text-white mb-4">سرعت بالا</h3>
                <p class="text-slate-500 dark:text-slate-400 leading-relaxed">در کمتر از 30 ثانیه، آزمون کامل شما آماده
                    دانلود است</p>
            </div>

            <!-- Feature 3 -->
            <div
                class="bg-white dark:bg-slate-800 p-10 rounded-2xl shadow-lg hover:-translate-y-2 hover:shadow-2xl hover:shadow-primary/20 transition-all duration-300 animate-on-scroll">
                <div
                    class="w-16 h-16 bg-gradient-to-br from-primary to-secondary rounded-xl flex items-center justify-center text-2xl text-white mb-6">
                    <i class="fas fa-check-double"></i>
                </div>
                <h3 class="text-xl font-bold text-slate-800 dark:text-white mb-4">تنوع سوالات</h3>
                <p class="text-slate-500 dark:text-slate-400 leading-relaxed">سوالات تستی، تشریحی، جاخالی و درست/غلط در
                    یک پلتفرم</p>
            </div>

            <!-- Feature 4 -->
            <div
                class="bg-white dark:bg-slate-800 p-10 rounded-2xl shadow-lg hover:-translate-y-2 hover:shadow-2xl hover:shadow-primary/20 transition-all duration-300 animate-on-scroll">
                <div
                    class="w-16 h-16 bg-gradient-to-br from-primary to-secondary rounded-xl flex items-center justify-center text-2xl text-white mb-6">
                    <i class="fas fa-file-pdf"></i>
                </div>
                <h3 class="text-xl font-bold text-slate-800 dark:text-white mb-4">خروجی PDF و A4 برای امتحان</h3>
                <p class="text-slate-500 dark:text-slate-400 leading-relaxed">فایل PDF با فرمت استاندارد و آماده چاپ
                    دریافت کنید</p>
            </div>

            <!-- Feature 5 -->
            <div
                class="bg-white dark:bg-slate-800 p-10 rounded-2xl shadow-lg hover:-translate-y-2 hover:shadow-2xl hover:shadow-primary/20 transition-all duration-300 animate-on-scroll">
                <div
                    class="w-16 h-16 bg-gradient-to-br from-primary to-secondary rounded-xl flex items-center justify-center text-2xl text-white mb-6">
                    <i class="fas fa-edit"></i>
                </div>
                <h3 class="text-xl font-bold text-slate-800 dark:text-white mb-4">ویرایشگر آنلاین</h3>
                <p class="text-slate-500 dark:text-slate-400 leading-relaxed">قبل از دانلود، سوالات را ویرایش و
                    شخصی‌سازی کنید</p>
            </div>

            <!-- Feature 6 -->
            <div
                class="bg-white dark:bg-slate-800 p-10 rounded-2xl shadow-lg hover:-translate-y-2 hover:shadow-2xl hover:shadow-primary/20 transition-all duration-300 animate-on-scroll">
                <div
                    class="w-16 h-16 bg-gradient-to-br from-primary to-secondary rounded-xl flex items-center justify-center text-2xl text-white mb-6">
                    <i class="fas fa-lock"></i>
                </div>
                <h3 class="text-xl font-bold text-slate-800 dark:text-white mb-4">امنیت کامل</h3>
                <p class="text-slate-500 dark:text-slate-400 leading-relaxed">فایل‌های شما بلافاصله پس از پردازش حذف
                    می‌شوند</p>
            </div>
        </div>
    </section>

    <!-- How It Works -->
    <section class="py-24 px-6 bg-white dark:bg-slate-900" id="how-it-works">
        <div class="max-w-3xl mx-auto text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-extrabold text-slate-800 dark:text-white mb-4">چطور کار می‌کند؟</h2>
            <p class="text-lg text-slate-500 dark:text-slate-400">فقط 3 قدم تا دریافت آزمون آماده</p>
        </div>

        <div class="max-w-4xl mx-auto space-y-12">
            <!-- Step 1 -->
            <div class="flex flex-col md:flex-row items-center gap-8 animate-on-scroll">
                <div
                    class="flex-shrink-0 w-20 h-20 bg-gradient-to-br from-primary to-secondary rounded-full flex items-center justify-center text-3xl font-black text-white">
                    1
                </div>
                <div class="text-center md:text-right">
                    <h3 class="text-2xl font-bold text-slate-800 dark:text-white mb-3">درس خود را انتخاب کنید</h3>
                    <p class="text-lg text-slate-500 dark:text-slate-400 leading-relaxed">فایل PDF جزوه یا کتاب درسی
                        خود را در سیستم بارگذاری کنید. حداکثر حجم ۱۶ مگابایت</p>
                </div>
            </div>

            <!-- Step 2 -->
            <div class="flex flex-col md:flex-row-reverse items-center gap-8 animate-on-scroll">
                <div
                    class="flex-shrink-0 w-20 h-20 bg-gradient-to-br from-primary to-secondary rounded-full flex items-center justify-center text-3xl font-black text-white">
                    2
                </div>
                <div class="text-center md:text-right">
                    <h3 class="text-2xl font-bold text-slate-800 dark:text-white mb-3">تنظیمات را انتخاب کنید</h3>
                    <p class="text-lg text-slate-500 dark:text-slate-400 leading-relaxed">تعداد سوالات، نوع سوالات و
                        سایر جزئیات آزمون را مشخص کنید</p>
                </div>
            </div>

            <!-- Step 3 -->
            <div class="flex flex-col md:flex-row items-center gap-8 animate-on-scroll">
                <div
                    class="flex-shrink-0 w-20 h-20 bg-gradient-to-br from-primary to-secondary rounded-full flex items-center justify-center text-3xl font-black text-white">
                    3
                </div>
                <div class="text-center md:text-right">
                    <h3 class="text-2xl font-bold text-slate-800 dark:text-white mb-3">دانلود PDF</h3>
                    <p class="text-lg text-slate-500 dark:text-slate-400 leading-relaxed">پس از تولید، سوالات را ویرایش
                        کنید و فایل PDF نهایی را دانلود کنید</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing -->
    <section class="py-24 px-6 bg-slate-50 dark:bg-slate-900" id="pricing">
        <div class="max-w-3xl mx-auto text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-extrabold text-slate-800 dark:text-white mb-4">پلن‌های قیمت‌گذاری</h2>
            <p class="text-lg text-slate-500 dark:text-slate-400">برای هر نیازی، یک پلن مناسب داریم</p>
        </div>

        <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Free Plan -->
            <div class="bg-white dark:bg-slate-800 rounded-2xl p-8 shadow-lg text-center animate-on-scroll">
                <h3 class="text-2xl font-bold text-slate-800 dark:text-white mb-4">رایگان</h3>
                <div
                    class="text-4xl font-black bg-gradient-to-br from-primary to-secondary bg-clip-text text-transparent mb-2">
                    ۰ تومان
                </div>
                <div class="text-slate-500 dark:text-slate-400 mb-8">برای همیشه</div>
                <ul class="space-y-4 mb-8 text-right">
                    <li
                        class="flex items-center gap-2 text-slate-600 dark:text-slate-300 border-b border-slate-200 dark:border-slate-700 pb-3">
                        <i class="fas fa-check text-green-500"></i>
                        ۵ سوال در هر آزمون
                    </li>
                    <li
                        class="flex items-center gap-2 text-slate-600 dark:text-slate-300 border-b border-slate-200 dark:border-slate-700 pb-3">
                        <i class="fas fa-check text-green-500"></i>
                        تمام انواع سوالات
                    </li>
                    <li
                        class="flex items-center gap-2 text-slate-600 dark:text-slate-300 border-b border-slate-200 dark:border-slate-700 pb-3">
                        <i class="fas fa-check text-green-500"></i>
                        خروجی PDF
                    </li>
                    <li class="flex items-center gap-2 text-slate-600 dark:text-slate-300">
                        <i class="fas fa-check text-green-500"></i>
                        ویرایشگر آنلاین
                    </li>
                </ul>
                <a href="/form"
                    class="inline-block w-full py-3 rounded-xl border-2 border-slate-300 dark:border-slate-600 text-slate-700 dark:text-slate-200 font-semibold hover:bg-slate-100 dark:hover:bg-slate-700 transition-all">
                    شروع رایگان
                </a>
            </div>

            <!-- Pro Plan -->
            <div
                class="bg-white dark:bg-slate-800 rounded-2xl p-8 shadow-xl shadow-primary/20 text-center relative scale-105 animate-on-scroll">
                <div
                    class="absolute -top-4 left-1/2 -translate-x-1/2 bg-gradient-to-r from-orange-400 to-red-500 text-white px-6 py-1.5 rounded-full font-bold text-sm">
                    محبوب‌ترین
                </div>
                <h3 class="text-2xl font-bold text-slate-800 dark:text-white mb-4">حرفه‌ای</h3>
                <div
                    class="text-4xl font-black bg-gradient-to-br from-primary to-secondary bg-clip-text text-transparent mb-2">
                    ۱۹۹,۰۰۰ تومان
                </div>
                <div class="text-slate-500 dark:text-slate-400 mb-8">ماهانه</div>
                <ul class="space-y-4 mb-8 text-right">
                    <li
                        class="flex items-center gap-2 text-slate-600 dark:text-slate-300 border-b border-slate-200 dark:border-slate-700 pb-3">
                        <i class="fas fa-check text-green-500"></i>
                        ۵۰ سوال در هر آزمون
                    </li>
                    <li
                        class="flex items-center gap-2 text-slate-600 dark:text-slate-300 border-b border-slate-200 dark:border-slate-700 pb-3">
                        <i class="fas fa-check text-green-500"></i>
                        تمام انواع سوالات
                    </li>
                    <li
                        class="flex items-center gap-2 text-slate-600 dark:text-slate-300 border-b border-slate-200 dark:border-slate-700 pb-3">
                        <i class="fas fa-check text-green-500"></i>
                        خروجی PDF
                    </li>
                    <li
                        class="flex items-center gap-2 text-slate-600 dark:text-slate-300 border-b border-slate-200 dark:border-slate-700 pb-3">
                        <i class="fas fa-check text-green-500"></i>
                        ویرایشگر پیشرفته
                    </li>
                    <li class="flex items-center gap-2 text-slate-600 dark:text-slate-300">
                        <i class="fas fa-check text-green-500"></i>
                        پشتیبانی اختصاصی
                    </li>
                </ul>
                <a href="/form"
                    class="inline-block w-full py-3 rounded-xl bg-gradient-to-br from-blue-500 to-blue-600 text-white font-semibold hover:from-blue-400 hover:to-blue-500 transition-all hover:-translate-y-0.5 hover:shadow-lg">
                    شروع کنید
                </a>
            </div>

            <!-- Enterprise Plan -->
            <div class="bg-white dark:bg-slate-800 rounded-2xl p-8 shadow-lg text-center animate-on-scroll">
                <h3 class="text-2xl font-bold text-slate-800 dark:text-white mb-4">سازمانی</h3>
                <div
                    class="text-4xl font-black bg-gradient-to-br from-primary to-secondary bg-clip-text text-transparent mb-2">
                    تماس بگیرید
                </div>
                <div class="text-slate-500 dark:text-slate-400 mb-8">سفارشی</div>
                <ul class="space-y-4 mb-8 text-right">
                    <li
                        class="flex items-center gap-2 text-slate-600 dark:text-slate-300 border-b border-slate-200 dark:border-slate-700 pb-3">
                        <i class="fas fa-check text-green-500"></i>
                        نامحدود
                    </li>
                    <li
                        class="flex items-center gap-2 text-slate-600 dark:text-slate-300 border-b border-slate-200 dark:border-slate-700 pb-3">
                        <i class="fas fa-check text-green-500"></i>
                        API اختصاصی
                    </li>
                    <li
                        class="flex items-center gap-2 text-slate-600 dark:text-slate-300 border-b border-slate-200 dark:border-slate-700 pb-3">
                        <i class="fas fa-check text-green-500"></i>
                        سفارشی‌سازی کامل
                    </li>
                    <li
                        class="flex items-center gap-2 text-slate-600 dark:text-slate-300 border-b border-slate-200 dark:border-slate-700 pb-3">
                        <i class="fas fa-check text-green-500"></i>
                        آموزش تیم
                    </li>
                    <li class="flex items-center gap-2 text-slate-600 dark:text-slate-300">
                        <i class="fas fa-check text-green-500"></i>
                        پشتیبانی ۲۴/۷
                    </li>
                </ul>
                <a href="#"
                    class="inline-block w-full py-3 rounded-xl border-2 border-slate-300 dark:border-slate-600 text-slate-700 dark:text-slate-200 font-semibold hover:bg-slate-100 dark:hover:bg-slate-700 transition-all">
                    تماس با ما
                </a>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="py-24 px-6 bg-white dark:bg-slate-900">
        <div class="max-w-3xl mx-auto text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-extrabold text-slate-800 dark:text-white mb-4">نظرات کاربران</h2>
            <p class="text-lg text-slate-500 dark:text-slate-400">معلمان درباره سوال‌ساز چه می‌گویند</p>
        </div>

        <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Testimonial 1 -->
            <div
                class="bg-slate-50 dark:bg-slate-800 p-8 rounded-2xl shadow-lg hover:-translate-y-1 hover:shadow-xl transition-all animate-on-scroll">
                <div class="flex items-center gap-4 mb-4">
                    <div
                        class="w-12 h-12 rounded-full bg-gradient-to-br from-primary to-secondary flex items-center justify-center text-white font-bold text-lg">
                        م
                    </div>
                    <div>
                        <h4 class="font-bold text-slate-800 dark:text-white">مریم احمدی</h4>
                        <p class="text-sm text-slate-500 dark:text-slate-400">دبیر ریاضی - تهران</p>
                    </div>
                </div>
                <div class="text-yellow-400 text-xl mb-4">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <p class="text-slate-600 dark:text-slate-300 leading-relaxed mb-6">
                    "قبلاً ساعت‌ها برای تهیه سوالات وقت می‌گذاشتم. الان با سوال‌ساز هوشمند، در چند دقیقه آزمون آماده
                    دارم!"
                </p>

            </div>

            <!-- Testimonial 2 -->
            <div
                class="bg-slate-50 dark:bg-slate-800 p-8 rounded-2xl shadow-lg hover:-translate-y-1 hover:shadow-xl transition-all animate-on-scroll">
                <div class="flex items-center gap-4 mb-4">
                    <div
                        class="w-12 h-12 rounded-full bg-gradient-to-br from-primary to-secondary flex items-center justify-center text-white font-bold text-lg">
                        ع
                    </div>
                    <div>
                        <h4 class="font-bold text-slate-800 dark:text-white">علی رضایی</h4>
                        <p class="text-sm text-slate-500 dark:text-slate-400">دبیر فیزیک - مشهد</p>
                    </div>
                </div>
                <div class="text-yellow-400 text-xl mb-4">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <p class="text-slate-600 dark:text-slate-300 leading-relaxed mb-6">
                    "سوالات تولید شده واقعاً با کیفیت و متنوع هستند. دانش‌آموزانم هم از تنوع سوالات راضی‌اند."
                </p>
            </div>

            <!-- Testimonial 3 -->
            <div
                class="bg-slate-50 dark:bg-slate-800 p-8 rounded-2xl shadow-lg hover:-translate-y-1 hover:shadow-xl transition-all animate-on-scroll">
                <div class="flex items-center gap-4 mb-4">
                    <div
                        class="w-12 h-12 rounded-full bg-gradient-to-br from-primary to-secondary flex items-center justify-center text-white font-bold text-lg">
                        ز
                    </div>
                    <div>
                        <h4 class="font-bold text-slate-800 dark:text-white">زهرا کریمی</h4>
                        <p class="text-sm text-slate-500 dark:text-slate-400">دبیر شیمی - اصفهان</p>
                    </div>
                </div>
                <div class="text-yellow-400 text-xl mb-4">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <p class="text-slate-600 dark:text-slate-300 leading-relaxed mb-6">
                    "ابزاری عالی برای معلمان! ویرایشگر آنلاین هم که داره خیلی کارآمده. به همه توصیه می‌کنم."
                </p>

            </div>
        </div>
    </section>

    <!-- FAQ -->
    <section class="py-24 px-6 bg-slate-50 dark:bg-slate-900" id="faq">
        <div class="max-w-3xl mx-auto text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-extrabold text-slate-800 dark:text-white mb-4">سوالات متداول</h2>
            <p class="text-lg text-slate-500 dark:text-slate-400">پاسخ سوالات رایج درباره سوال‌ساز</p>
        </div>

        <div class="max-w-3xl mx-auto space-y-4">
            <!-- FAQ 1 -->
            <div class="faq-item bg-white dark:bg-slate-800 rounded-2xl shadow-md overflow-hidden animate-on-scroll">
                <div
                    class="faq-question px-8 py-5 cursor-pointer flex justify-between items-center font-bold text-slate-800 dark:text-white hover:bg-primary/5 transition-all">
                    <span>آیا واقعاً رایگان است؟</span>
                    <i class="fas fa-chevron-down text-primary transition-transform"></i>
                </div>
                <div class="faq-answer">
                    <div class="px-8 pb-5 text-slate-600 dark:text-slate-300 leading-relaxed">
                        بله! نسخه رایگان به شما امکان تولید ۵ سوال در هر آزمون را می‌دهد. برای تعداد بیشتر می‌توانید پلن
                        حرفه‌ای را انتخاب کنید.
                    </div>
                </div>
            </div>

            <!-- FAQ 2 -->
            <div class="faq-item bg-white dark:bg-slate-800 rounded-2xl shadow-md overflow-hidden animate-on-scroll">
                <div
                    class="faq-question px-8 py-5 cursor-pointer flex justify-between items-center font-bold text-slate-800 dark:text-white hover:bg-primary/5 transition-all">
                    <span>چه نوع فایل‌هایی پشتیبانی می‌شود؟</span>
                    <i class="fas fa-chevron-down text-primary transition-transform"></i>
                </div>
                <div class="faq-answer">
                    <div class="px-8 pb-5 text-slate-600 dark:text-slate-300 leading-relaxed">
                        در حال حاضر فقط فایل‌های PDF با حداکثر حجم ۱۶ مگابایت پشتیبانی می‌شوند. به زودی فرمت‌های دیگر
                        اضافه خواهند شد.
                    </div>
                </div>
            </div>

            <!-- FAQ 3 -->
            <div class="faq-item bg-white dark:bg-slate-800 rounded-2xl shadow-md overflow-hidden animate-on-scroll">
                <div
                    class="faq-question px-8 py-5 cursor-pointer flex justify-between items-center font-bold text-slate-800 dark:text-white hover:bg-primary/5 transition-all">
                    <span>سوالات چقدر دقیق هستند؟</span>
                    <i class="fas fa-chevron-down text-primary transition-transform"></i>
                </div>
                <div class="faq-answer">
                    <div class="px-8 pb-5 text-slate-600 dark:text-slate-300 leading-relaxed">
                        هوش مصنوعی ما با دقت بالا سوالات تولید می‌کند، اما همیشه توصیه می‌کنیم قبل از استفاده نهایی،
                        سوالات را بررسی و در صورت نیاز ویرایش کنید.
                    </div>
                </div>
            </div>

            <!-- FAQ 4 -->
            <div class="faq-item bg-white dark:bg-slate-800 rounded-2xl shadow-md overflow-hidden animate-on-scroll">
                <div
                    class="faq-question px-8 py-5 cursor-pointer flex justify-between items-center font-bold text-slate-800 dark:text-white hover:bg-primary/5 transition-all">
                    <span>آیا فایل‌های من امن هستند؟</span>
                    <i class="fas fa-chevron-down text-primary transition-transform"></i>
                </div>
                <div class="faq-answer">
                    <div class="px-8 pb-5 text-slate-600 dark:text-slate-300 leading-relaxed">
                        بله! فایل‌ها پس از پردازش از سرورهای ما حذف می‌شوند و هیچ نسخه‌ای از آن‌ها نگهداری نمی‌شود.
                    </div>
                </div>
            </div>

            <!-- FAQ 5 -->
            <div class="faq-item bg-white dark:bg-slate-800 rounded-2xl shadow-md overflow-hidden animate-on-scroll">
                <div
                    class="faq-question px-8 py-5 cursor-pointer flex justify-between items-center font-bold text-slate-800 dark:text-white hover:bg-primary/5 transition-all">
                    <span>آیا می‌توانم سوالات را ویرایش کنم؟</span>
                    <i class="fas fa-chevron-down text-primary transition-transform"></i>
                </div>
                <div class="faq-answer">
                    <div class="px-8 pb-5 text-slate-600 dark:text-slate-300 leading-relaxed">
                        بله! پس از تولید سوالات، به ویرایشگر آنلاین منتقل می‌شوید که می‌توانید سوالات را ویرایش، حذف یا
                        تغییر دهید.
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-24 px-6 bg-gradient-to-br from-primary to-secondary relative overflow-hidden">
        <div class="absolute inset-0 opacity-20 bg-[url('data:image/svg+xml,<svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 1440 320\"><path fill=\"rgba(255,255,255,0.05)\" d=\"M0,96L48,112C96,128,192,160,288,165.3C384,171,480,149,576,154.7C672,160,768,192,864,197.3C960,203,1056,181,1152,165.3C1248,149,1344,139,1392,133.3L1440,128L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z\"></path></svg>
        </div>

        <div class="max-w-4xl
            mx-auto text-center relative z-10">
            <h2 class="text-4xl md:text-5xl font-black text-white mb-6">همین الان شروع کنید! 🚀</h2>
            <p class="text-xl text-white/95 mb-10">هزاران معلم به ما اعتماد کرده‌اند. شما هم بپیوندید!</p>
            <a href="/main/form"
                class="inline-flex items-center gap-3 px-12 py-5 bg-white text-primary font-bold text-xl rounded-xl shadow-xl hover:-translate-y-1 hover:shadow-2xl transition-all">
                <i class="fas fa-rocket"></i>
                تولید سوال رایگان
            </a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-slate-900 text-white pt-16 pb-8 px-6">
        <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-12">
            <div>
                <h3 class="text-xl font-bold mb-6 flex items-center gap-2">
                    <i class="fas fa-brain"></i>
                    سوال‌ساز هوشمند
                </h3>
                <p class="text-white/70 leading-relaxed">
                    ابزار هوشمند تولید سوالات آزمون برای معلمان و اساتید. صرفه‌جویی در وقت، افزایش کیفیت.
                </p>
            </div>

            <div>
                <h3 class="text-xl font-bold mb-6">دسترسی سریع</h3>
                <ul class="space-y-3">
                    <li><a href="#features" class="text-white/70 hover:text-white transition-colors">ویژگی‌ها</a></li>
                    <li><a href="#how-it-works" class="text-white/70 hover:text-white transition-colors">نحوه کار</a>
                    </li>
                    <li><a href="#pricing" class="text-white/70 hover:text-white transition-colors">قیمت‌ها</a></li>
                    <li><a href="#faq" class="text-white/70 hover:text-white transition-colors">سوالات متداول</a>
                    </li>
                </ul>
            </div>

            <div>
                <h3 class="text-xl font-bold mb-6">پشتیبانی</h3>
                <ul class="space-y-3">
                    <li><a href="#" class="text-white/70 hover:text-white transition-colors">راهنما</a></li>
                    <li><a href="#" class="text-white/70 hover:text-white transition-colors">تماس با ما</a></li>
                    <li><a href="#" class="text-white/70 hover:text-white transition-colors">گزارش مشکل</a></li>
                    <li><a href="#" class="text-white/70 hover:text-white transition-colors">درخواست ویژگی</a>
                    </li>
                </ul>
            </div>

            <div>
                <h3 class="text-xl font-bold mb-6">قوانین</h3>
                <ul class="space-y-3">
                    <li><a href="#" class="text-white/70 hover:text-white transition-colors">حریم خصوصی</a></li>
                    <li><a href="#" class="text-white/70 hover:text-white transition-colors">شرایط استفاده</a>
                    </li>
                    <li><a href="#" class="text-white/70 hover:text-white transition-colors">سیاست بازپرداخت</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="max-w-6xl mx-auto border-t border-white/10 pt-8 text-center text-white/70">
            <p>© ۲۰۲۴ سوال‌ساز هوشمند. تمامی حقوق محفوظ است.</p>
        </div>
    </footer>
    <script src="{{ asset('asset/js/dark-tailwind.js') }}"></script>

    <script>

        // Scroll Animation
        const animateOnScroll = () => {
            const elements = document.querySelectorAll('.animate-on-scroll');
            elements.forEach(element => {
                const elementTop = element.getBoundingClientRect().top;
                const windowHeight = window.innerHeight;
                if (elementTop < windowHeight - 100) {
                    element.classList.add('animated');
                }
            });
        };
        window.addEventListener('scroll', animateOnScroll);
        animateOnScroll();

        // FAQ Accordion
        const faqItems = document.querySelectorAll('.faq-item');
        faqItems.forEach(item => {
            const question = item.querySelector('.faq-question');
            question.addEventListener('click', () => {
                const isActive = item.classList.contains('active');
                faqItems.forEach(i => i.classList.remove('active'));
                if (!isActive) {
                    item.classList.add('active');
                }
            });
        });

        // Smooth Scroll for Links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    </script>
</body>

</html>
