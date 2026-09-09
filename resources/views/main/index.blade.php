<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>سوال‌ساز هوشمند | تولید خودکار سوالات آزمون با هوش مصنوعی</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
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

        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Sixtyfour+Convergence&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* abut  */
        .container-abu {
            justify-content: center;
            gap: 70px;
            display: flex;
            flex-direction: row;
            margin-bottom: 100px;
        }

        .containerA1 {
            justify-content: center;
            gap: 70px;
            display: flex;
            flex-direction: row;
            margin-bottom: 100px;
        }

        .containerA2 {
            justify-content: center;
            gap: 70px;
            display: flex;
            flex-direction: row;
            margin-bottom: 100px;
        }

        .cardssss {
            --border-radius: 1rem;
            --bg-color: #393e41;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            width: 300px;
            height: 400px;
            background: var(--bg-color);
            border-radius: var(--border-radius);
            color: #fff;
            padding: 30px;
            box-shadow: 0 0 20px rgba(1, 1, 1, 0.5);
            isolation: isolate;
            overflow: hidden;
        }

        .cardssss::before,
        .cardssss::after {
            content: '';
            position: absolute;
        }

        .cardssss::before {
            width: 200%;
            height: 200%;
            background-image: conic-gradient(var(--color) 0deg,
                    transparent 60deg, transparent 180deg, var(--color) 180deg,
                    transparent 240deg);
            inset: -50%;
            z-index: -2;
            animation: borderanimation 4s linear infinite;
        }

        .cardssss:hover::before {
            animation-play-state: paused;
        }

        @keyframes borderanimation {
            to {
                transform: rotate(-360deg);
            }
        }

        .cardssss::after {
            --inset: 4px;
            background: #131a2c;
            inset: var(--inset);
            border-radius: calc(var(--border-radius) - var(--inset));
            z-index: -1;
            transition: all 0.3s linear;
        }

        .cardssss:hover::after {
            background: var(--bg-color);
        }

        .cardssss i {
            font-size: 3.5rem;
            color: transparent;
            -webkit-text-stroke: thin var(--color);
        }

        .cardssss:hover i {
            color: var(--color);
            -webkit-text-stroke-width: 0;
        }

        .cardssss .title {
            text-align: center;
            font-size: 1.5rem;
            line-height: 2rem;
            margin-block: 2.5rem 1.5rem;
            color: var(--color);
        }

        .cardssss .description {
            line-height: 1.5rem;
            text-align: center;
            opacity: 0.75;
        }

        @media(max-width:1420px) {
            .containerA1 {
                flex-direction: column;
            }

            .containerA2 {
                flex-direction: column;
            }
        }

        @media(max-width:684px) {
            .container-abu {
                flex-direction: column;
                justify-content: center;
            }

            .cardssss {
                margin: 0px auto;
            }
        }
    </style>
    <link rel="stylesheet" href="{{ asset('asset/font-awesome-4.7.0/css/font-awesome.min.css') }}" type="text/css">
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
        <div class="container-abu">

            <div class="containerA1">
                <a href="https://www.instagram.com/radin2008official?igsh=dWE4Y3c4Zmx2eDM0" class="abuot">


                    <div class="cardssss" style="--color: #ef476f;">
                        <i class="fa fa-instagram" aria-hidden="true"></i>
                        <div class="title">Instegram</div>
                        <div class="description">من در اینستگرام؛ تیکه هایی موزیک ،و فعالیت برنامه نویسی مو ارائه میدهم
                            فعالیت چندانی ندارم، با فالو کردن روحیه مو تقویت کنید . </div>
                    </div>

                </a>
                <a href="https://soundcloud.com/user-757535903?ref=clipboard&p=a&c=1&si=f6ac030cf7eb413ab6f32565cea9079f&utm_source=clipboard&utm_medium=text&utm_campaign=social_sharing"
                    class="abuot">


                    <div class="cardssss" style="--color: #ffd23f;">
                        <i class="fa fa-soundcloud" aria-hidden="true"></i>
                        <div class="title">SoundCloud</div>
                        <div class="description">تمامی موزیک های خود را در ساند کلاد آپلود میکنم. <br>آنجا هم میتوانید
                            کارهای من را گوش کنید...</div>
                    </div>
                </a>
            </div>
            <div class="containerA2">
                <a href="https://t.me/Khode333khoda" class="abuot">



                    <div class="cardssss" style="--color: #00a6ed;">
                        <i class="fa fa-telegram" aria-hidden="true"></i>
                        <div class="title">Telegram</div>
                        <div class="description">اگر برای دانلود موزیک هایم، صحبت یا هر چیز دیگر... <br> به من در
                            تلگرام پیام دهید.</div>
                    </div>

                </a>
                <a href="https://github.com/mohammadHasanHakemi" class="abuot">


                    <div class="cardssss" style="--color: #8812d6;">
                        <i class="fa fa-github" aria-hidden="true"></i>
                        <div class="title">GitHub</div>
                        <div class="description">پروژه های برنامه نویسیم به طور open source اینجا آپلود میشود.</div>
                    </div>
                </a>
            </div>
        </div>
        <div class="max-w-6xl mx-auto">
            <p class="opacity-80"> ساخته شده با ❤️ برای جامعه توسعه‌دهندگان ایرانی توسط محمد حسن حاکمی</p>
            <p class="mt-4 opacity-60">نسخه 2.5 - Dashboard Edition</p>
        </div>
    </footer>

</body>

</html>
