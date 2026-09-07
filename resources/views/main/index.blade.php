<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>فرم‌ساز حرفه‌ای - ساخت فرم بدون کدنویسی</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        vazir: ['Vazirmatn', 'sans-serif'],
                    },
                    animation: {
                        'fade-in-up': 'fadeInUp 0.8s ease forwards',
                        'drift': 'drift 20s linear infinite',
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
                        drift: {
                            '0%': {
                                transform: 'translate(0, 0)'
                            },
                            '100%': {
                                transform: 'translate(-100px, -100px)'
                            },
                        }
                    }
                }
            }
        }
    </script>
    <style>
        body {
            font-family: 'Vazirmatn', sans-serif;
        }
    </style>
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
</head>

<body class="font-vazir leading-relaxed overflow-x-hidden">

    <!-- Hero Section -->
    <section
        class="min-h-screen bg-gradient-to-br from-[#667eea] to-[#764ba2] text-white flex items-center justify-center relative overflow-hidden">
        <!-- Animated background pattern -->

        <div class="text-center max-w-4xl px-8 relative z-10">
            <h1 class="text-4xl md:text-6xl font-black mb-6 animate-fade-in-up">
                🎨 سوال ساز حرفه‌ای
            </h1>
            <p class="text-xl md:text-2xl mb-10 opacity-95 animate-fade-in-up" style="animation-delay: 0.2s;">
                ساخت فرم‌های زیبا و حرفه‌ای بدون نیاز به زمان <br>
                با رابط کاربری ساده و قابلیت‌های پیشرفته
            </p>
            <div class="flex flex-col sm:flex-row gap-6 justify-center animate-fade-in-up"
                style="animation-delay: 0.4s;">
                <a href="/main"
                    class="inline-flex items-center justify-center gap-3 px-10 py-4 bg-white text-[#667eea] font-bold text-lg rounded-full shadow-xl hover:-translate-y-1 hover:shadow-2xl transition-all duration-300">
                    <i class="fas fa-rocket"></i>
                    شروع کنید
                </a>
                <a href="dashboard.html"
                    class="inline-flex items-center justify-center gap-3 px-10 py-4 bg-transparent text-white font-bold text-lg rounded-full border-[3px] border-white hover:bg-white hover:text-[#667eea] transition-all duration-300">
                    <i class="fas fa-chart-line"></i>
                    داشبورد
                </a>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-24 px-8 bg-slate-50">
        <div class="max-w-6xl mx-auto">
            <h2 class="text-center text-3xl md:text-4xl font-extrabold text-slate-800 mb-4">
                ویژگی‌های منحصر به فرد
            </h2>
            <p class="text-center text-lg text-slate-500 mb-16">
                همه چیز برای ساخت فرم‌های عالی
            </p>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                <!-- Feature 1 -->
                <div
                    class="bg-white p-10 rounded-2xl shadow-lg hover:-translate-y-2 hover:shadow-2xl transition-all duration-300">
                    <div
                        class="w-16 h-16 rounded-xl flex items-center justify-center text-2xl text-white mb-6 bg-gradient-to-br from-[#667eea] to-[#764ba2]">
                        <i class="fas fa-hand-pointer"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-800 mb-4">Drag & Drop</h3>
                    <p class="text-slate-500 text-base leading-relaxed">
                        با کشیدن و رها کردن ساده، فرم خود را طراحی کنید. نیازی به کدنویسی نیست!
                    </p>
                </div>

                <!-- Feature 2 -->
                <div
                    class="bg-white p-10 rounded-2xl shadow-lg hover:-translate-y-2 hover:shadow-2xl transition-all duration-300">
                    <div
                        class="w-16 h-16 rounded-xl flex items-center justify-center text-2xl text-white mb-6 bg-gradient-to-br from-[#f093fb] to-[#f5576c]">
                        <i class="fas fa-palette"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-800 mb-4">طراحی مدرن</h3>
                    <p class="text-slate-500 text-base leading-relaxed">
                        رابط کاربری زیبا با انیمیشن‌های روان و طراحی Gradient منحصر به فرد
                    </p>
                </div>

                <!-- Feature 3 -->
                <div
                    class="bg-white p-10 rounded-2xl shadow-lg hover:-translate-y-2 hover:shadow-2xl transition-all duration-300">
                    <div
                        class="w-16 h-16 rounded-xl flex items-center justify-center text-2xl text-white mb-6 bg-gradient-to-br from-[#4facfe] to-[#00f2fe]">
                        <i class="fas fa-mobile-alt"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-800 mb-4">Responsive</h3>
                    <p class="text-slate-500 text-base leading-relaxed">
                        فرم‌های شما در تمام دستگاه‌ها به صورت کامل Responsive هستند
                    </p>
                </div>

                <!-- Feature 4 -->
                <div
                    class="bg-white p-10 rounded-2xl shadow-lg hover:-translate-y-2 hover:shadow-2xl transition-all duration-300">
                    <div
                        class="w-16 h-16 rounded-xl flex items-center justify-center text-2xl text-white mb-6 bg-gradient-to-br from-[#43e97b] to-[#38f9d7]">
                        <i class="fas fa-chart-bar"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-800 mb-4">داشبورد کامل</h3>
                    <p class="text-slate-500 text-base leading-relaxed">
                        مدیریت فرم‌ها، مشاهده آمار و تحلیل داده‌ها در یک پنل حرفه‌ای
                    </p>
                </div>

                <!-- Feature 5 -->
                <div
                    class="bg-white p-10 rounded-2xl shadow-lg hover:-translate-y-2 hover:shadow-2xl transition-all duration-300">
                    <div
                        class="w-16 h-16 rounded-xl flex items-center justify-center text-2xl text-white mb-6 bg-gradient-to-br from-[#fa709a] to-[#fee140]">
                        <i class="fas fa-layer-group"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-800 mb-4">قالب‌های آماده</h3>
                    <p class="text-slate-500 text-base leading-relaxed">
                        شروع سریع با قالب‌های از پیش طراحی شده برای موارد مختلف
                    </p>
                </div>

                <!-- Feature 6 -->
                <div
                    class="bg-white p-10 rounded-2xl shadow-lg hover:-translate-y-2 hover:shadow-2xl transition-all duration-300">
                    <div
                        class="w-16 h-16 rounded-xl flex items-center justify-center text-2xl text-white mb-6 bg-gradient-to-br from-[#30cfd0] to-[#330867]">
                        <i class="fas fa-moon"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-800 mb-4">Dark Mode</h3>
                    <p class="text-slate-500 text-base leading-relaxed">
                        پشتیبانی کامل از حالت تاریک برای راحتی بیشتر در شب
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-24 px-8 bg-gradient-to-br from-[#667eea] to-[#764ba2] text-white">
        <div class="max-w-6xl mx-auto">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-12 text-center">
                <div>
                    <h2 class="text-5xl md:text-6xl font-black mb-2">21+</h2>
                    <p class="text-lg opacity-95">نوع فیلد مختلف</p>
                </div>
                <div>
                    <h2 class="text-5xl md:text-6xl font-black mb-2">100%</h2>
                    <p class="text-lg opacity-95">رایگان و متن‌باز</p>
                </div>
                <div>
                    <h2 class="text-5xl md:text-6xl font-black mb-2">4</h2>
                    <p class="text-lg opacity-95">قالب آماده</p>
                </div>
                <div>
                    <h2 class="text-5xl md:text-6xl font-black mb-2">∞</h2>
                    <p class="text-lg opacity-95">امکانات بی‌نهایت</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-24 px-8 bg-white text-center">
        <div class="max-w-4xl mx-auto">
            <h2 class="text-3xl md:text-5xl font-extrabold text-slate-800 mb-6">
                آماده شروع هستید؟
            </h2>
            <p class="text-xl text-slate-500 mb-12">
                همین الان اولین فرم خود را ایجاد کنید
            </p>
            <a href="index.html"
                class="inline-flex items-center justify-center gap-3 px-12 py-5 bg-white text-[#667eea] font-bold text-xl rounded-full shadow-xl hover:-translate-y-1 hover:shadow-2xl transition-all duration-300 border border-slate-200">
                <i class="fas fa-magic"></i>
                شروع رایگان
            </a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-12 px-8 bg-slate-800 text-white text-center">
        <div class="max-w-6xl mx-auto">
            <p class="opacity-80">ساخته شده با ❤️ برای جامعه توسعه‌دهندگان ایرانی</p>
            <p class="mt-4 opacity-60">نسخه 2.5 - Dashboard Edition</p>
        </div>
    </footer>

</body>

</html>
