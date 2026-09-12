<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>داشبورد — سوال‌ساز هوشمند</title>

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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet" />

    <style>
        * {
            font-family: 'Vazirmatn', sans-serif;
        }

        :root {
            --primary: #8b5cf6;
            --secondary: #6d28d9;
        }

        .animate-float {
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-6px);
            }
        }

        .card-hover {
            transition: transform 0.25s ease, box-shadow 0.25s ease;
        }

        .card-hover:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.35);
        }

        ::-webkit-scrollbar {
            width: 6px;
        }

        ::-webkit-scrollbar-track {
            background: #1e293b;
        }

        ::-webkit-scrollbar-thumb {
            background: #475569;
            border-radius: 3px;
        }
    </style>
</head>

<body class="bg-slate-900 text-white min-h-screen flex flex-col">

    {{-- ══════════════════════════════════════════════════════ --}}
    {{--                                               --}}
    {{-- ══════════════════════════════════════════════════════ --}}
    <header
        class="fixed top-0 w-full z-50 bg-gradient-to-br from-slate-800 to-slate-900 shadow-lg border-b border-slate-700/40">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center gap-4">

            {{-- Logo --}}
            <a href="/" class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-xl flex items-center justify-center text-2xl animate-float shadow-lg shadow-violet-500/30"
                    style="background: linear-gradient(135deg, var(--primary), var(--secondary))">
                    <i class="fas fa-brain"></i>
                </div>
                <div>
                    <div class="text-xl font-bold leading-tight">سوال‌ساز هوشمند</div>
                    <div class="text-xs text-slate-400">تولید سوال با هوش مصنوعی</div>
                </div>
            </a>

            {{-- Actions --}}
            <div class="flex items-center gap-2">

                {{-- نام کاربر --}}
                <div
                    class="hidden sm:flex items-center gap-2 px-3 py-2 rounded-xl bg-slate-700/50 border border-slate-600/30">
                    <div class="w-7 h-7 rounded-lg flex items-center justify-center text-xs font-bold text-white"
                        style="background: linear-gradient(135deg, var(--primary), var(--secondary))">
                        {{ mb_substr(auth()->user()->name, 0, 1) }}
                    </div>
                    <span class="text-sm text-slate-300 max-w-[120px] truncate">{{ auth()->user()->name }}</span>
                </div>

                {{-- تولید سوال --}}
                <a href="/main/form"
                    class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl text-sm font-semibold text-white transition-all hover:-translate-y-0.5 hover:shadow-lg"
                    style="background: linear-gradient(135deg, #64748b, #475569)">
                    <i class="fas fa-book"></i>
                    تولید سوال
                </a>

                {{-- خروج --}}
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-red-500/10 hover:bg-red-500/20 text-red-400 border border-red-500/20 font-semibold transition-all text-sm">
                        <i class="fas fa-right-from-bracket"></i>
                        <span class="hidden sm:inline">خروج</span>
                    </button>
                </form>

            </div>
        </div>
    </header>

    {{-- ══════════════════════════════════════════════════════ --}}
    {{--                        MAIN                           --}}
    {{-- ══════════════════════════════════════════════════════ --}}
    <main class="flex-1 pt-28 pb-14 px-4">
        <div class="max-w-7xl mx-auto space-y-6">

            {{-- Alert --}}
            @if (session('success'))
                <div
                    class="flex items-center gap-3 px-5 py-4 rounded-2xl bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 text-sm">
                    <i class="fas fa-circle-check text-lg flex-shrink-0"></i>
                    {{ session('success') }}
                </div>
            @endif

            {{-- ── Welcome Banner ────────────────────────────────── --}}
            <div class="relative overflow-hidden rounded-2xl border border-violet-500/20 p-8"
                style="background: linear-gradient(135deg, rgba(139,92,246,0.13), rgba(109,40,217,0.05), rgba(15,23,42,0.7))">

                <div class="absolute -top-20 -right-20 w-64 h-64 rounded-full blur-3xl opacity-20"
                    style="background: var(--primary)"></div>
                <div class="absolute -bottom-20 -left-20 w-48 h-48 rounded-full blur-3xl opacity-10"
                    style="background: var(--secondary)"></div>

                <div class="relative flex flex-col sm:flex-row items-start sm:items-center justify-between gap-5">
                    <div>
                        <div class="flex items-center gap-2 mb-3">
                            <span
                                class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold border"
                                style="background: rgba(139,92,246,0.15); border-color: rgba(139,92,246,0.3); color: #a78bfa">
                                <span class="w-1.5 h-1.5 rounded-full bg-violet-400 animate-pulse"></span>
                                {{ $team->name }}
                            </span>
                        </div>
                        <h2 class="text-3xl sm:text-4xl font-extrabold text-white mb-2">
                            سلام، {{ auth()->user()->name }} 👋
                        </h2>
                        <p class="text-slate-400 text-sm leading-relaxed">
                            به داشبورد سوال‌ساز هوشمند خوش اومدی.<br>
                            امروز چه سوالی می‌خوای بسازی؟
                        </p>
                    </div>

                    <a href="/main/form"
                        class="flex-shrink-0 inline-flex items-center gap-2.5 px-7 py-3.5 rounded-xl font-bold text-white text-sm transition-all hover:-translate-y-0.5"
                        style="background: linear-gradient(135deg, var(--primary), var(--secondary)); box-shadow: 0 8px 25px rgba(139,92,246,0.4)">
                        <i class="fas fa-wand-magic-sparkles"></i>
                        شروع سوال‌سازی
                    </a>
                </div>
            </div>

            {{-- ── Stats ─────────────────────────────────────────── --}}
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">

                @php
                    $stats = [
                        [
                            'label' => 'سوالات ساخته‌شده',
                            'value' => '۰',
                            'sub' => 'این ماه',
                            'icon' => 'fa-circle-question',
                            'color' => 'rgba(139,92,246,0.15)',
                            'text' => '#a78bfa',
                        ],
                        [
                            'label' => 'آزمون‌های فعال',
                            'value' => '۰',
                            'sub' => 'در حال اجرا',
                            'icon' => 'fa-file-lines',
                            'color' => 'rgba(16,185,129,0.15)',
                            'text' => '#34d399',
                        ],
                        [
                            'label' => 'پاسخ‌های دریافتی',
                            'value' => '۰',
                            'sub' => 'مجموع',
                            'icon' => 'fa-comments',
                            'color' => 'rgba(14,165,233,0.15)',
                            'text' => '#38bdf8',
                        ],
                        [
                            'label' => 'اعضای تیم',
                            'value' => $team->members()->count(),
                            'sub' => 'نفر',
                            'icon' => 'fa-users',
                            'color' => 'rgba(245,158,11,0.15)',
                            'text' => '#fbbf24',
                        ],
                    ];
                @endphp

                @foreach ($stats as $stat)
                    <div class="card-hover rounded-2xl border border-slate-700/50 p-5"
                        style="background: linear-gradient(135deg, rgba(30,41,59,0.85), rgba(15,23,42,0.7))">
                        <div class="flex items-center justify-between mb-4">
                            <span class="text-slate-400 text-xs leading-snug">{{ $stat['label'] }}</span>
                            <div class="w-10 h-10 rounded-xl flex items-center justify-center flex-shrink-0"
                                style="background: {{ $stat['color'] }}; color: {{ $stat['text'] }}">
                                <i class="fas {{ $stat['icon'] }}"></i>
                            </div>
                        </div>
                        <div class="text-4xl font-extrabold mb-1">{{ $stat['value'] }}</div>
                        <div class="text-xs text-slate-500">{{ $stat['sub'] }}</div>
                    </div>
                @endforeach

            </div>

            {{-- ── Quick Actions ──────────────────────────────────── --}}
            <div>
                <h3 class="text-base font-bold text-slate-300 mb-4 flex items-center gap-2">
                    <i class="fas fa-bolt text-yellow-400 text-sm"></i>
                    دسترسی سریع
                </h3>

                @php
                    $actions = [
                        [
                            'href' => '/main/form',
                            'title' => 'سوال‌سازی جدید',
                            'desc' => 'با هوش مصنوعی سوال بساز',
                            'icon' => 'fa-wand-magic-sparkles',
                            'color' => 'rgba(139,92,246,0.2)',
                            'text' => '#a78bfa',
                            'border' => 'rgba(139,92,246,0.2)',
                            'glow' => true,
                        ],
                        [
                            'href' => '#',
                            'title' => 'آزمون‌های من',
                            'desc' => 'مدیریت آزمون‌های ساخته‌شده',
                            'icon' => 'fa-list-check',
                            'color' => 'rgba(16,185,129,0.15)',
                            'text' => '#34d399',
                            'border' => 'rgba(51,65,85,0.5)',
                            'glow' => false,
                        ],
                        [
                            'href' => '#',
                            'title' => 'گزارش‌ها',
                            'desc' => 'مشاهده نتایج و آمار',
                            'icon' => 'fa-chart-line',
                            'color' => 'rgba(14,165,233,0.15)',
                            'text' => '#38bdf8',
                            'border' => 'rgba(51,65,85,0.5)',
                            'glow' => false,
                        ],
                        [
                            'href' => '#',
                            'title' => 'مدیریت تیم',
                            'desc' => 'دعوت اعضا و تنظیمات',
                            'icon' => 'fa-users',
                            'color' => 'rgba(245,158,11,0.15)',
                            'text' => '#fbbf24',
                            'border' => 'rgba(51,65,85,0.5)',
                            'glow' => false,
                        ],
                        [
                            'href' => '#',
                            'title' => 'بانک سوال',
                            'desc' => 'مدیریت سوالات ذخیره‌شده',
                            'icon' => 'fa-layer-group',
                            'color' => 'rgba(239,68,68,0.15)',
                            'text' => '#f87171',
                            'border' => 'rgba(51,65,85,0.5)',
                            'glow' => false,
                        ],
                        [
                            'href' => '/main/editor',
                            'title' => 'ویرایشگر',
                            'desc' => 'ویرایش و تنظیم سوالات',
                            'icon' => 'fa-pen-to-square',
                            'color' => 'rgba(168,85,247,0.15)',
                            'text' => '#c084fc',
                            'border' => 'rgba(51,65,85,0.5)',
                            'glow' => false,
                        ],
                    ];
                @endphp

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach ($actions as $action)
                        <a href="{{ $action['href'] }}"
                            class="card-hover group relative overflow-hidden rounded-2xl border p-6 block"
                            style="background: linear-gradient(135deg, rgba(30,41,59,0.85), rgba(15,23,42,0.7)); border-color: {{ $action['border'] }}">

                            @if ($action['glow'])
                                <div class="absolute -top-10 -right-10 w-32 h-32 rounded-full blur-2xl opacity-20"
                                    style="background: var(--primary)"></div>
                            @endif

                            <div class="relative">
                                <div class="w-12 h-12 rounded-xl flex items-center justify-center text-xl mb-4 transition-transform duration-300 group-hover:scale-110"
                                    style="background: {{ $action['color'] }}; color: {{ $action['text'] }}">
                                    <i class="fas {{ $action['icon'] }}"></i>
                                </div>
                                <h4 class="font-bold text-white mb-1">{{ $action['title'] }}</h4>
                                <p class="text-sm text-slate-400">{{ $action['desc'] }}</p>
                            </div>

                            <div class="absolute bottom-5 left-5 opacity-0 group-hover:opacity-100 transition-opacity duration-300"
                                style="color: {{ $action['text'] }}">
                                <i class="fas fa-arrow-left text-xs"></i>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>

            {{-- ── Team Info ──────────────────────────────────────── --}}
            <div class="rounded-2xl border border-slate-700/50 p-6"
                style="background: linear-gradient(135deg, rgba(30,41,59,0.85), rgba(15,23,42,0.7))">

                <div class="flex items-center justify-between mb-5">
                    <h3 class="font-bold text-slate-200 flex items-center gap-2">
                        <i class="fas fa-users" style="color: var(--primary)"></i>
                        اطلاعات تیم
                    </h3>
                    <span class="text-xs px-3 py-1 rounded-full border font-medium"
                        style="background: rgba(139,92,246,0.1); border-color: rgba(139,92,246,0.25); color: #a78bfa">
                        {{ $team->is_personal ? 'تیم شخصی' : 'تیم گروهی' }}
                    </span>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                    <div class="rounded-xl p-4 bg-slate-800/60 border border-slate-700/40">
                        <div class="text-slate-500 text-xs mb-1.5">نام تیم</div>
                        <div class="font-semibold text-white text-sm">{{ $team->name }}</div>
                    </div>
                    <div class="rounded-xl p-4 bg-slate-800/60 border border-slate-700/40">
                        <div class="text-slate-500 text-xs mb-1.5">شناسه تیم (Slug)</div>
                        <div class="font-mono text-xs text-violet-300 font-semibold">{{ $team->slug }}</div>
                    </div>
                    <div class="rounded-xl p-4 bg-slate-800/60 border border-slate-700/40">
                        <div class="text-slate-500 text-xs mb-1.5">تاریخ ساخت</div>
                        <div class="font-semibold text-white text-sm">{{ $team->created_at->format('Y/m/d') }}</div>
                    </div>
                </div>
            </div>

        </div>
    </main>

    {{-- ══════════════════════════════════════════════════════ --}}
    {{--                       FOOTER                          --}}
    {{-- ══════════════════════════════════════════════════════ --}}
    <footer class="border-t border-slate-800 py-5">
        <p class="text-center text-xs text-slate-600">
            © {{ date('Y') }} سوال‌ساز هوشمند — تمام حقوق محفوظ است
        </p>
    </footer>

</body>

</html>
