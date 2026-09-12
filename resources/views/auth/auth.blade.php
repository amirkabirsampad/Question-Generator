<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>ورود / ثبت‌نام — سوال‌ساز هوشمند</title>

    {{-- Tailwind --}}
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
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

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>

    {{-- Vazirmatn Font --}}
    <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@300;400;500;600;700;800&display=swap" rel="stylesheet"/>

    <style>
        * { font-family: 'Vazirmatn', sans-serif; }

        :root {
            --primary: #8b5cf6;
            --secondary: #6d28d9;
        }

        .from-primary  { --tw-gradient-from: var(--primary); }
        .to-secondary  { --tw-gradient-to:   var(--secondary); }

        .animate-float {
            animation: float 3s ease-in-out infinite;
        }
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50%       { transform: translateY(-6px); }
        }

        .tab-active {
            color: white;
            border-bottom: 2px solid var(--primary);
            background: rgba(139,92,246,0.08);
        }
        .tab-inactive {
            color: #94a3b8;
            border-bottom: 2px solid transparent;
        }
        .tab-inactive:hover { color: #cbd5e1; }

        /* Custom checkbox */
        input[type="checkbox"] { accent-color: var(--primary); }

        /* Input focus ring */
        .auth-input:focus {
            outline: none;
            border-color: rgba(139,92,246,0.6);
            box-shadow: 0 0 0 3px rgba(139,92,246,0.15);
        }

        /* Scrollbar */
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: #1e293b; }
        ::-webkit-scrollbar-thumb { background: #475569; border-radius: 3px; }
    </style>
</head>

<body class="bg-slate-900 text-white min-h-screen flex flex-col">

{{-- ═══════════════════════════════════════════ --}}
{{--                    HEADER                   --}}
{{-- ═══════════════════════════════════════════ --}}
<header class="fixed top-0 w-full z-50 bg-gradient-to-br from-slate-800 to-slate-900 text-white shadow-lg">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center gap-8">

        {{-- Logo --}}
        <div class="flex items-center gap-4">
            <div class="w-12 h-12 bg-gradient-to-br from-primary to-secondary rounded-xl flex items-center justify-center text-2xl animate-float shadow-lg shadow-violet-500/30">
                <i class="fas fa-brain"></i>
            </div>
            <div>
                <h1 class="text-xl font-bold leading-tight">سوال‌ساز هوشمند</h1>
                <div class="text-xs text-slate-400 font-normal">تولید سوال با هوش مصنوعی</div>
            </div>
        </div>

        {{-- Nav Buttons --}}
        <div class="flex items-center gap-2">
            <a href="/"
               class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-gradient-to-br from-slate-500 to-slate-600 hover:from-slate-400 hover:to-slate-500 text-white font-semibold transition-all hover:-translate-y-0.5 hover:shadow-lg text-sm">
                <i class="fas fa-house"></i>
                خانه
            </a>
            <a href="/form/"
               class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-gradient-to-br from-slate-500 to-slate-600 hover:from-slate-400 hover:to-slate-500 text-white font-semibold transition-all hover:-translate-y-0.5 hover:shadow-lg text-sm">
                <i class="fas fa-book"></i>
                تولید سوال
            </a>
        </div>

    </div>
</header>

{{-- ═══════════════════════════════════════════ --}}
{{--                 MAIN CONTENT                --}}
{{-- ═══════════════════════════════════════════ --}}
<main class="flex-1 flex items-center justify-center px-4 pt-28 pb-12 relative overflow-hidden">

    {{-- Background Glow --}}
    <div class="absolute inset-0 pointer-events-none overflow-hidden">
        <div class="absolute -top-32 -right-32 w-96 h-96 rounded-full bg-violet-600/10 blur-3xl"></div>
        <div class="absolute -bottom-32 -left-32 w-96 h-96 rounded-full bg-purple-700/10 blur-3xl"></div>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[700px] h-[700px] rounded-full bg-slate-800/40 blur-3xl"></div>
    </div>

    <div class="relative w-full max-w-md">

        {{-- Badge --}}
        <div class="flex justify-center mb-5">
            <span class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-violet-500/10 border border-violet-500/20 text-violet-400 text-xs font-medium">
                <span class="w-1.5 h-1.5 rounded-full bg-violet-400 animate-pulse"></span>
                هوش مصنوعی در خدمت آموزش
            </span>
        </div>

        {{-- ─── CARD ─── --}}
        <div class="bg-slate-800/70 backdrop-blur-xl border border-slate-700/60 rounded-2xl shadow-2xl shadow-black/40 overflow-hidden">

            {{-- Tab Switcher --}}
            <div class="flex border-b border-slate-700">
                <button id="tab-signin"
                        onclick="switchTab('signin')"
                        class="flex-1 py-4 text-sm font-bold transition-all duration-300 tab-active">
                    <i class="fas fa-right-to-bracket ml-1.5"></i>
                    ورود
                </button>
                <button id="tab-signup"
                        onclick="switchTab('signup')"
                        class="flex-1 py-4 text-sm font-bold transition-all duration-300 tab-inactive">
                    <i class="fas fa-user-plus ml-1.5"></i>
                    ثبت‌نام
                </button>
            </div>

            <div class="p-7">

                {{-- ─── ALERTS ─── --}}
                @if(session('success'))
                    <div class="mb-5 flex items-center gap-3 px-4 py-3 rounded-xl bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 text-sm">
                        <i class="fas fa-circle-check flex-shrink-0"></i>
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="mb-5 flex items-center gap-3 px-4 py-3 rounded-xl bg-red-500/10 border border-red-500/20 text-red-400 text-sm">
                        <i class="fas fa-triangle-exclamation flex-shrink-0"></i>
                        {{ session('error') }}
                    </div>
                @endif

                {{-- ════════════════════════════ --}}
                {{--         SIGN IN FORM         --}}
                {{-- ════════════════════════════ --}}
                <div id="form-signin">

                    <div class="text-center mb-6">
                        <h2 class="text-2xl font-extrabold text-white">خوش برگشتی!</h2>
                        <p class="text-slate-400 text-sm mt-1">برای ادامه وارد حساب کاربری‌ات شو</p>
                    </div>

                    <form method="POST" action="{{ route('login') }}" class="space-y-4">
                        @csrf

                        {{-- Email --}}
                        <div>
                            <label for="login_email" class="block text-xs font-semibold text-slate-400 mb-1.5 tracking-wide">
                                <i class="fas fa-envelope ml-1 text-violet-400"></i>آدرس ایمیل
                            </label>
                            <input type="email"
                                   id="login_email"
                                   name="email"
                                   value="{{ old('email') }}"
                                   placeholder="example@email.com"
                                   required
                                   class="auth-input w-full px-4 py-3 bg-slate-900/60 border rounded-xl text-sm text-white placeholder-slate-600 transition-all duration-200
                                          {{ $errors->has('email') ? 'border-red-500/60' : 'border-slate-600/60' }}"/>
                            @error('email')
                                <p class="text-xs text-red-400 mt-1 flex items-center gap-1">
                                    <i class="fas fa-circle-exclamation"></i> {{ $message }}
                                </p>
                            @enderror
                        </div>

                        {{-- Password --}}
                        <div>
                            <div class="flex items-center justify-between mb-1.5">
                                <label for="login_password" class="text-xs font-semibold text-slate-400 tracking-wide">
                                    <i class="fas fa-lock ml-1 text-violet-400"></i>رمز عبور
                                </label>
                                <a href="#" class="text-xs text-violet-400 hover:text-violet-300 transition-colors">
                                    رمز را فراموش کردم
                                </a>
                            </div>
                            <div class="relative">
                                <input type="password"
                                       id="login_password"
                                       name="password"
                                       placeholder="••••••••"
                                       required
                                       class="auth-input w-full px-4 py-3 pl-11 bg-slate-900/60 border rounded-xl text-sm text-white placeholder-slate-600 transition-all duration-200
                                              {{ $errors->has('password') ? 'border-red-500/60' : 'border-slate-600/60' }}"/>
                                <button type="button"
                                        onclick="togglePassword('login_password', this)"
                                        class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-500 hover:text-slate-300 transition-colors text-sm w-5 text-center">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                            @error('password')
                                <p class="text-xs text-red-400 mt-1 flex items-center gap-1">
                                    <i class="fas fa-circle-exclamation"></i> {{ $message }}
                                </p>
                            @enderror
                        </div>

                        {{-- Remember Me --}}
                        <div class="flex items-center gap-2.5 py-1">
                            <input type="checkbox" id="remember" name="remember"
                                   class="w-4 h-4 rounded cursor-pointer"/>
                            <label for="remember" class="text-sm text-slate-400 cursor-pointer">مرا به خاطر بسپار</label>
                        </div>

                        {{-- Submit --}}
                        <button type="submit"
                                class="w-full py-3 px-4 rounded-xl text-sm font-bold text-white transition-all duration-200
                                       bg-gradient-to-br from-violet-600 to-purple-700
                                       hover:from-violet-500 hover:to-purple-600
                                       shadow-lg shadow-violet-500/25 hover:shadow-violet-500/40
                                       hover:-translate-y-0.5 active:translate-y-0 mt-1">
                            <i class="fas fa-right-to-bracket ml-2"></i>
                            ورود به سوال‌ساز
                        </button>

                    </form>

                    <p class="text-center text-sm text-slate-500 mt-5">
                        حساب کاربری نداری؟
                        <button onclick="switchTab('signup')"
                                class="text-violet-400 hover:text-violet-300 font-semibold transition-colors mr-1">
                            ثبت‌نام رایگان
                        </button>
                    </p>

                </div>


                {{-- ════════════════════════════ --}}
                {{--         SIGN UP FORM         --}}
                {{-- ════════════════════════════ --}}
                <div id="form-signup" class="hidden">

                    <div class="text-center mb-6">
                        <h2 class="text-2xl font-extrabold text-white">ثبت‌نام رایگان</h2>
                        <p class="text-slate-400 text-sm mt-1">به هزاران معلم و مدرس بپیوند</p>
                    </div>

                    <form method="POST" action="{{ route('register') }}" class="space-y-4">
                        @csrf
                        <input type="hidden" name="_form" value="register"/>

                        {{-- Name --}}
                        <div>
                            <label for="reg_name" class="block text-xs font-semibold text-slate-400 mb-1.5 tracking-wide">
                                <i class="fas fa-user ml-1 text-violet-400"></i>نام و نام خانوادگی
                            </label>
                            <input type="text"
                                   id="reg_name"
                                   name="name"
                                   value="{{ old('name') }}"
                                   placeholder="علی رضایی"
                                   required
                                   class="auth-input w-full px-4 py-3 bg-slate-900/60 border rounded-xl text-sm text-white placeholder-slate-600 transition-all duration-200
                                          {{ $errors->has('name') ? 'border-red-500/60' : 'border-slate-600/60' }}"/>
                            @error('name')
                                <p class="text-xs text-red-400 mt-1 flex items-center gap-1">
                                    <i class="fas fa-circle-exclamation"></i> {{ $message }}
                                </p>
                            @enderror
                        </div>

                        {{-- Email --}}
                        <div>
                            <label for="reg_email" class="block text-xs font-semibold text-slate-400 mb-1.5 tracking-wide">
                                <i class="fas fa-envelope ml-1 text-violet-400"></i>آدرس ایمیل
                            </label>
                            <input type="email"
                                   id="reg_email"
                                   name="email"
                                   value="{{ old('email') }}"
                                   placeholder="example@email.com"
                                   required
                                   class="auth-input w-full px-4 py-3 bg-slate-900/60 border rounded-xl text-sm text-white placeholder-slate-600 transition-all duration-200
                                          {{ $errors->has('email') ? 'border-red-500/60' : 'border-slate-600/60' }}"/>
                            @error('email')
                                <p class="text-xs text-red-400 mt-1 flex items-center gap-1">
                                    <i class="fas fa-circle-exclamation"></i> {{ $message }}
                                </p>
                            @enderror
                        </div>

                        {{-- Password --}}
                        <div>
                            <label for="reg_password" class="block text-xs font-semibold text-slate-400 mb-1.5 tracking-wide">
                                <i class="fas fa-lock ml-1 text-violet-400"></i>رمز عبور
                            </label>
                            <div class="relative">
                                <input type="password"
                                       id="reg_password"
                                       name="password"
                                       placeholder="حداقل ۸ کاراکتر"
                                       required
                                       class="auth-input w-full px-4 py-3 pl-11 bg-slate-900/60 border rounded-xl text-sm text-white placeholder-slate-600 transition-all duration-200
                                              {{ $errors->has('password') ? 'border-red-500/60' : 'border-slate-600/60' }}"/>
                                <button type="button"
                                        onclick="togglePassword('reg_password', this)"
                                        class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-500 hover:text-slate-300 transition-colors text-sm w-5 text-center">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                            @error('password')
                                <p class="text-xs text-red-400 mt-1 flex items-center gap-1">
                                    <i class="fas fa-circle-exclamation"></i> {{ $message }}
                                </p>
                            @enderror
                        </div>

                        {{-- Confirm Password --}}
                        <div>
                            <label for="reg_password_confirm" class="block text-xs font-semibold text-slate-400 mb-1.5 tracking-wide">
                                <i class="fas fa-shield-halved ml-1 text-violet-400"></i>تکرار رمز عبور
                            </label>
                            <div class="relative">
                                <input type="password"
                                       id="reg_password_confirm"
                                       name="password_confirmation"
                                       placeholder="رمز را دوباره وارد کن"
                                       required
                                       class="auth-input w-full px-4 py-3 pl-11 bg-slate-900/60 border border-slate-600/60 rounded-xl text-sm text-white placeholder-slate-600 transition-all duration-200"/>
                                <button type="button"
                                        onclick="togglePassword('reg_password_confirm', this)"
                                        class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-500 hover:text-slate-300 transition-colors text-sm w-5 text-center">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>

                        {{-- Terms --}}
                        <div class="flex items-start gap-2.5 py-1">
                            <input type="checkbox" id="terms" name="terms" required
                                   class="mt-0.5 w-4 h-4 rounded cursor-pointer flex-shrink-0"/>
                            <label for="terms" class="text-sm text-slate-400 cursor-pointer leading-relaxed">
                                با
                                <a href="#" class="text-violet-400 hover:text-violet-300 transition-colors">قوانین و مقررات</a>
                                و
                                <a href="#" class="text-violet-400 hover:text-violet-300 transition-colors">سیاست حریم خصوصی</a>
                                موافقم
                            </label>
                        </div>
                        @error('terms')
                            <p class="text-xs text-red-400 -mt-2 flex items-center gap-1">
                                <i class="fas fa-circle-exclamation"></i> {{ $message }}
                            </p>
                        @enderror

                        {{-- Submit --}}
                        <button type="submit"
                                class="w-full py-3 px-4 rounded-xl text-sm font-bold text-white transition-all duration-200
                                       bg-gradient-to-br from-violet-600 to-purple-700
                                       hover:from-violet-500 hover:to-purple-600
                                       shadow-lg shadow-violet-500/25 hover:shadow-violet-500/40
                                       hover:-translate-y-0.5 active:translate-y-0 mt-1">
                            <i class="fas fa-user-plus ml-2"></i>
                            ایجاد حساب رایگان
                        </button>

                    </form>

                    <p class="text-center text-sm text-slate-500 mt-5">
                        قبلاً ثبت‌نام کردی؟
                        <button onclick="switchTab('signin')"
                                class="text-violet-400 hover:text-violet-300 font-semibold transition-colors mr-1">
                            وارد شو
                        </button>
                    </p>

                </div>

            </div>
        </div>

        {{-- Trust Badges --}}
        <div class="flex items-center justify-center gap-5 mt-6 flex-wrap">
            <span class="flex items-center gap-1.5 text-slate-500 text-xs">
                <i class="fas fa-lock text-emerald-500 text-xs"></i>
                اتصال امن و رمزگذاری‌شده
            </span>
            <span class="w-px h-3 bg-slate-700"></span>
            <span class="flex items-center gap-1.5 text-slate-500 text-xs">
                <i class="fas fa-circle-check text-emerald-500 text-xs"></i>
                بدون نیاز به کارت بانکی
            </span>
            <span class="w-px h-3 bg-slate-700"></span>
            <span class="flex items-center gap-1.5 text-slate-500 text-xs">
                <i class="fas fa-bolt text-emerald-500 text-xs"></i>
                شروع فوری
            </span>
        </div>

    </div>
</main>

{{-- ═══════════════════════════════════════════ --}}
{{--                   FOOTER                    --}}
{{-- ═══════════════════════════════════════════ --}}
<footer class="border-t border-slate-800 py-5">
    <p class="text-center text-xs text-slate-600">
        © {{ date('Y') }} سوال‌ساز هوشمند — تمام حقوق محفوظ است
    </p>
</footer>


{{-- ═══════════════════════════════════════════ --}}
{{--                 JAVASCRIPT                  --}}
{{-- ═══════════════════════════════════════════ --}}
<script>
    // ── Tab Switcher ──────────────────────────────────
    function switchTab(tab) {
        const signinForm = document.getElementById('form-signin');
        const signupForm = document.getElementById('form-signup');
        const signinBtn  = document.getElementById('tab-signin');
        const signupBtn  = document.getElementById('tab-signup');

        if (tab === 'signin') {
            signinForm.classList.remove('hidden');
            signupForm.classList.add('hidden');
            signinBtn.className = signinBtn.className.replace('tab-inactive', 'tab-active');
            signupBtn.className = signupBtn.className.replace('tab-active', 'tab-inactive');
        } else {
            signupForm.classList.remove('hidden');
            signinForm.classList.add('hidden');
            signupBtn.className = signupBtn.className.replace('tab-inactive', 'tab-active');
            signinBtn.className = signinBtn.className.replace('tab-active', 'tab-inactive');
        }
    }

    // ── Toggle Password ───────────────────────────────
    function togglePassword(inputId, btn) {
        const input  = document.getElementById(inputId);
        const isHide = input.type === 'password';
        input.type   = isHide ? 'text' : 'password';
        btn.innerHTML = isHide
            ? '<i class="fas fa-eye-slash"></i>'
            : '<i class="fas fa-eye"></i>';
    }

    // ── Auto-switch tab if signup had errors ──────────
@if($errors->any() && session('_form') === 'register')
        switchTab('signup');
    @endif
</script>

</body>
</html>
