<!doctype html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>سوال‌ساز هوشمند - تولید سوال با هوش مصنوعی</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@100;200;300;400;500;600;700;800;900&amp;display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            box-sizing: border-box;
        }

        /* Reset & Base Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --secondary-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            --success-gradient: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            --warning-gradient: linear-gradient(135deg, #fa709a 0%, #fee140 100%);
            --dark-gradient: linear-gradient(135deg, #2d3748 0%, #1a202c 100%);
            --bg-color: #f8fafc;
            --text-primary: #2d3748;
            --text-secondary: #718096;
            --border-color: #e2e8f0;
            --shadow-sm: 0 2px 8px rgba(0, 0, 0, 0.06);
            --shadow-md: 0 4px 16px rgba(0, 0, 0, 0.1);
            --shadow-lg: 0 8px 24px rgba(0, 0, 0, 0.15);
        }

        body {
            font-family: 'Vazirmatn', sans-serif;
            background: var(--primary-gradient);
            min-height: 100%;
            line-height: 1.6;
            transition: background 0.3s ease;
        }

        /* Dark Mode */
        body.dark-mode {
            --bg-color: #1a202c;
            --text-primary: #f7fafc;
            --text-secondary: #cbd5e0;
            --border-color: #2d3748;
            background: linear-gradient(135deg, #1a202c 0%, #2d3748 100%);
        }

        body.dark-mode .app-container {
            background: #1a202c;
        }

        body.dark-mode .card {
            background: #2d3748;
        }

        body.dark-mode .form-control,
        body.dark-mode .form-select {
            background: #1a202c;
            color: var(--text-primary);
            border-color: var(--border-color);
        }

        /* App Container */
        .app-container {
            height: 100%;
            display: flex;
            flex-direction: column;
            background: white;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
        }

        /* Header */
        .app-header {
            background: var(--dark-gradient);
            color: white;
            padding: 1rem 2rem;
            box-shadow: var(--shadow-md);
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 50;
            overflow: hidden;
        }

        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 2rem;
        }

        .header-brand {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .brand-icon {
            width: 48px;
            height: 48px;
            background: var(--primary-gradient);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-5px);
            }
        }

        .brand-text h1 {
            font-size: 1.5rem;
            font-weight: 700;
            margin: 0;
            line-height: 1.2;
        }

        .brand-subtitle {
            font-size: 0.75rem;
            color: #a0aec0;
            font-weight: 400;
        }

        .header-actions {
            display: flex;
            gap: 0.5rem;
            align-items: center;
        }

        /* Buttons */
        .btn {
            padding: 0.6rem 1.25rem;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-family: inherit;
            font-weight: 600;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            text-decoration: none;
            position: relative;
            overflow: hidden;
        }

        .btn::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.3);
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }

        .btn:hover::before {
            width: 300px;
            height: 300px;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        .btn:active {
            transform: translateY(0);
        }

        .btn-icon {
            padding: 0.6rem;
            width: 40px;
            height: 40px;
            justify-content: center;
            background: rgba(255, 255, 255, 0.1);
            color: white;
        }

        .btn-icon:hover {
            background: rgba(255, 255, 255, 0.2);
        }

        .btn-primary {
            background: linear-gradient(135deg, #4299e1 0%, #3182ce 100%);
            color: white;
            font-size: 1.1rem;
        }

        .btn-secondary {
            background: linear-gradient(135deg, #718096 0%, #4a5568 100%);
            color: white;
        }

        .btn-gradient {
            background: var(--primary-gradient);
            color: white;
            font-weight: 700;
        }

        .btn-lg {
            padding: 0.9rem 2rem;
            font-size: 1.1rem;
        }

        /* Main Content */
        .app-main {
            margin-top: 55px;
            flex: 1;
            overflow-y: auto;
            background: var(--bg-color);
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }

        /* Card */
        .card {
            background: white;
            border-radius: 16px;
            box-shadow: var(--shadow-md);
            overflow: hidden;
            transition: all 0.3s ease;
            margin-bottom: 1.5rem;
        }

        .card:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-lg);
        }

        .card-header {
            background: var(--primary-gradient);
            color: white;
            padding: 2rem;
            text-align: center;
        }

        .card-header h1 {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
        }

        .card-header p {
            font-size: 1rem;
            opacity: 0.95;
        }

        .card-body {
            padding: 2.5rem;
        }

        /* Steps Indicator */







        @keyframes pulse {

            0%,
            100% {
                transform: scale(1);
                box-shadow: 0 0 0 0 rgba(102, 126, 234, 0.4);
            }

            50% {
                transform: scale(1.05);
                box-shadow: 0 0 0 10px rgba(102, 126, 234, 0);
            }
        }

        /* Form Controls */
        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 0.5rem;
            font-size: 0.95rem;
        }

        .form-label i {
            color: #667eea;
            font-size: 1.1rem;
        }

        .form-control,
        .form-select {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 2px solid var(--border-color);
            border-radius: 10px;
            font-family: inherit;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            background: white;
        }

        .form-control:focus,
        .form-select:focus {
            outline: none;
            border-color: #4299e1;
            box-shadow: 0 0 0 3px rgba(66, 153, 225, 0.1);
        }

        .form-control::placeholder {
            color: var(--text-secondary);
            opacity: 0.6;
        }

        .form-text {
            font-size: 0.85rem;
            color: var(--text-secondary);
            margin-top: 0.35rem;
            display: block;
        }

        /* File Input Custom Style */
        .form-control[type="file"] {
            padding: 0.5rem;
            cursor: pointer;
        }

        .form-control[type="file"]::file-selector-button {
            background: var(--primary-gradient);
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            cursor: pointer;
            font-family: inherit;
            font-weight: 600;
            margin-left: 0.75rem;
            transition: all 0.3s ease;
        }

        .form-control[type="file"]::file-selector-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
        }

        /* Row & Col Layout */
        .row {
            display: flex;
            flex-wrap: wrap;
            margin: 0 -0.75rem;
        }

        .col-md-6 {
            flex: 0 0 50%;
            max-width: 50%;
            padding: 0 0.75rem;
        }

        .col-12 {
            flex: 0 0 100%;
            max-width: 100%;
            padding: 0 0.75rem;
        }

        /* Loading Spinner */
        .loading {
            display: none;
            text-align: center;
            margin-top: 2rem;
        }

        .spinner-border {
            width: 3rem;
            height: 3rem;
            border: 4px solid rgba(102, 126, 234, 0.2);
            border-top-color: #667eea;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        .loading p {
            margin-top: 1rem;
            color: var(--text-primary);
            font-weight: 600;
            font-size: 1.05rem;
        }

        /* Alert Messages */
        .alert {
            padding: 1rem 1.25rem;
            border-radius: 10px;
            margin-top: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            font-weight: 500;
            animation: fadeIn 0.3s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .alert-success {
            background: linear-gradient(135deg, rgba(72, 187, 120, 0.1) 0%, rgba(56, 161, 105, 0.1) 100%);
            color: #2f855a;
            border: 2px solid rgba(72, 187, 120, 0.3);
        }

        .alert-danger {
            background: linear-gradient(135deg, rgba(245, 101, 101, 0.1) 0%, rgba(229, 62, 62, 0.1) 100%);
            color: #c53030;
            border: 2px solid rgba(245, 101, 101, 0.3);
        }

        .alert i {
            font-size: 1.25rem;
        }

        /* Instructions Card */
        .instructions-card {
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.05) 0%, rgba(118, 75, 162, 0.05) 100%);
            border: 2px solid rgba(102, 126, 234, 0.2);
        }

        .instructions-card h5 {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--text-primary);
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .instructions-card h5 i {
            color: #4299e1;
            font-size: 1.25rem;
        }

        .instructions-card ol {
            margin-right: 1.25rem;
            color: var(--text-primary);
        }

        .instructions-card ol li {
            margin-bottom: 0.5rem;
            padding-right: 0.5rem;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .container {
                padding: 1rem;
            }

            .card-header h1 {
                font-size: 1.5rem;
                flex-direction: column;
            }

            .card-body {
                padding: 1.5rem;
            }

            .col-md-6 {
                flex: 0 0 100%;
                max-width: 100%;
            }



            .header-content {
                flex-direction: column;
                gap: 1rem;
            }

            .brand-text h1 {
                font-size: 1.25rem;
            }
        }

        /* Submit Button Container */
        .submit-container {
            text-align: center;
            margin-top: 2rem;
        }

        font-family: Tahoma,
        sans-serif;
        background: #f0f4f8;
        padding: 30px;
        }

        .form-wrapper {
            background: #fff;
            border-radius: 20px;
            padding: 36px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.10);
            max-width: 900px;
            margin: auto;
        }

        h2.form-title {
            color: #1a237e;
            font-weight: 800;
            margin-bottom: 28px;
            font-size: 22px;
            border-bottom: 3px solid #e3e8f0;
            padding-bottom: 14px;
        }

        .section-title {
            font-size: 13px;
            font-weight: 700;
            color: #888;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 10px;
            margin-top: 6px;
        }

        .form-label {
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 7px;
        }

        .form-group {
            margin-bottom: 22px;
        }

        /* ── Grade Grid ── */
        .grade-grid {
            display: grid;
            grid-template-columns: repeat(6, 1fr);
            gap: 8px;
        }

        @media(max-width: 576px) {
            .grade-grid {
                grid-template-columns: repeat(4, 1fr);
            }
        }

        .grade-btn {
            border: 2px solid #dee2e6;
            background: #f8f9fa;
            border-radius: 12px;
            padding: 10px 4px;
            text-align: center;
            cursor: pointer;
            font-size: 13px;
            font-weight: 700;
            color: #555;
            transition: all .2s;
            user-select: none;
        }

        .grade-btn:hover {
            border-color: #3f51b5;
            color: #3f51b5;
            background: #e8eaf6;
        }

        .grade-btn.active {
            border-color: #3f51b5;
            background: #3f51b5;
            color: #fff;
            box-shadow: 0 2px 10px rgba(63, 81, 181, .35);
        }

        .grade-btn .gnum {
            font-size: 20px;
            display: block;
        }

        .grade-btn .glbl {
            font-size: 10px;
            opacity: .8;
        }

        /* ── Field Selector ── */
        #field-container {
            display: none;
            animation: fadeUp .3s ease;
        }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(10px)
            }

            to {
                opacity: 1;
                transform: translateY(0)
            }
        }

        .field-wrap {
            position: relative;
        }

        .field-wrap .fi {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #aaa;
            pointer-events: none;
        }

        #field-search {
            padding-right: 36px;
            border-radius: 10px 10px 0 0;
            border-bottom: none;
        }

        #field-dropdown {
            border: 1px solid #dee2e6;
            border-radius: 0 0 10px 10px;
            max-height: 220px;
            overflow-y: auto;
            background: #fff;
            box-shadow: 0 6px 18px rgba(0, 0, 0, .08);
        }

        .fcat {
            padding: 6px 14px;
            font-size: 11px;
            font-weight: 700;
            background: #f1f3f5;
            color: #888;
            position: sticky;
            top: 0;
            border-bottom: 1px solid #e9ecef;
        }

        .fitem {
            padding: 9px 14px;
            cursor: pointer;
            font-size: 14px;
            border-bottom: 1px solid #f5f5f5;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: background .15s;
        }

        .fitem:hover {
            background: #e8eaf6;
        }

        .fitem.selected {
            background: #e8eaf6;
            font-weight: 700;
            color: #3f51b5;
        }

        .fbadge {
            font-size: 10px;
            padding: 2px 8px;
            border-radius: 20px;
            white-space: nowrap;
        }

        .b-nazari {
            background: #d1ecf1;
            color: #0c5460;
        }

        .b-fanni {
            background: #d4edda;
            color: #155724;
        }

        .b-kar {
            background: #fff3cd;
            color: #856404;
        }

        .b-maaref {
            background: #f8d7da;
            color: #721c24;
        }

        .no-res {
            padding: 14px;
            text-align: center;
            color: #bbb;
            font-size: 14px;
        }

        .pill {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: #e8eaf6;
            color: #3f51b5;
            border: 1px solid #9fa8da;
            border-radius: 20px;
            padding: 4px 14px;
            font-size: 13px;
            font-weight: 700;
            margin-top: 8px;
        }

        .pill .rx {
            cursor: pointer;
            font-size: 16px;
        }

        /* ── Book List ── */
        #book-container {
            display: none;
            animation: fadeUp .3s ease;
        }

        .book-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(170px, 1fr));
            gap: 12px;
            margin-top: 6px;
        }

        .book-card {
            border: 2px solid #e0e0e0;
            border-radius: 14px;
            padding: 14px 10px;
            text-align: center;
            cursor: pointer;
            transition: all .2s;
            background: #fafafa;
            position: relative;
        }

        .book-card:hover {
            border-color: #3f51b5;
            background: #e8eaf6;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(63, 81, 181, .15);
        }

        .book-card.active {
            border-color: #3f51b5;
            background: #3f51b5;
            color: #fff;
            box-shadow: 0 4px 16px rgba(63, 81, 181, .4);
        }

        .book-card.active .book-icon {
            color: #fff;
        }

        .book-card.active .book-name {
            color: #fff;
        }

        .book-icon {
            font-size: 28px;
            color: #e53935;
            margin-bottom: 8px;
            display: block;
        }

        .book-name {
            font-size: 12px;
            font-weight: 700;
            color: #333;
            line-height: 1.4;
        }

        .book-badge {
            position: absolute;
            top: 6px;
            left: 6px;
            font-size: 9px;
            background: #fff3e0;
            color: #e65100;
            border-radius: 8px;
            padding: 2px 6px;
            font-weight: 700;
        }

        .book-card.active .book-badge {
            background: rgba(255, 255, 255, .25);
            color: #fff;
        }

        .book-loading {
            text-align: center;
            padding: 20px;
            color: #aaa;
        }

        .book-loading i {
            font-size: 28px;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        .no-books {
            text-align: center;
            padding: 20px;
            color: #aaa;
            font-size: 14px;
        }

        /* ── Selected Book Banner ── */
        #selected-book-banner {
            display: none;
            background: linear-gradient(135deg, #e8eaf6, #c5cae9);
            border: 1px solid #9fa8da;
            border-radius: 12px;
            padding: 12px 16px;
            margin-top: 10px;
            animation: fadeUp .3s ease;
        }

        #selected-book-banner .sb-title {
            font-weight: 700;
            color: #1a237e;
            font-size: 14px;
        }

        #selected-book-banner .sb-url {
            font-size: 11px;
            color: #5c6bc0;
            direction: ltr;
            word-break: break-all;
        }

        /* ── Divider ── */
        .sec-divider {
            border: none;
            border-top: 2px dashed #e9ecef;
            margin: 24px 0;
        }

        /* ── Submit ── */
        #submitBtn {
            border-radius: 12px;
            padding: 13px 36px;
            font-weight: 700;
            font-size: 15px;
            background: linear-gradient(135deg, #3f51b5, #1a237e);
            border: none;
        }

        #submitBtn:hover {
            opacity: .9;
        }

        .loading {
            text-align: center;
            color: #666;
        }

        .loading .spinner-border {
            color: #3f51b5;
        }

        /* Alert */
        .alert-validation {
            background: #fff3cd;
            border: 1px solid #ffc107;
            color: #856404;
            border-radius: 10px;
            padding: 10px 16px;
            font-size: 13px;
            display: none;
            margin-top: 8px;
        }
    </style>
    <script src="/_sdk/data_sdk.js" type="text/javascript"></script>
    <script src="/_sdk/element_sdk.js" type="text/javascript"></script>
    <script src="https://cdn.tailwindcss.com" type="text/javascript"></script>
    script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.min.js"></script>
</head>

<body>
    <div class="app-container"><!-- Header -->
        <header class="app-header">
            <div class="header-content">
                <div class="header-brand">
                    <div class="brand-icon"><i class="fas fa-brain"></i>
                    </div>
                    <div class="brand-text">
                        <h1>سوال‌ساز هوشمند</h1>
                        <div class="brand-subtitle">
                            تولید سوال با هوش مصنوعی
                        </div>
                    </div>
                </div>
                <div class="header-actions"><button class="btn btn-icon" id="darkModeToggle" title="تغییر تم"> <i
                            class="fas fa-moon"></i> </button> <a href="/editor" class="btn btn-secondary"> <i
                            class="fas fa-edit"></i> ویرایشگر </a>
                </div>
            </div>
        </header><!-- Main Content -->
        <main class="app-main">
            <div class="container"><!-- Main Card -->
                <div class="card">
                    <div class="card-header">
                        <h1><i class="fas fa-graduation-cap"></i> سوال‌ساز هوشمند</h1>
                        <p>PDF آپلود کنید، سوالات آزمون دریافت کنید!</p>
                    </div>
                    <div class="card-body"><!-- Steps Indicator -->
                        <!-- Form -->
                        <form id="questionForm" enctype="multipart/form-data">

                            <!-- ══ STEP 1: GRADE ══ -->
                            <div class="section-title"><i class="fas fa-graduation-cap"></i> مرحله ۱ — پایه تحصیلی</div>
                            <div class="form-group">
                                <div class="grade-grid" id="gradeGrid"></div>
                                <input type="hidden" id="grade" name="grade" required>
                                <div class="alert-validation" id="grade-alert">⚠️ لطفاً پایه تحصیلی را انتخاب کنید.
                                </div>
                            </div>

                            <!-- ══ STEP 2: FIELD (10-12) ══ -->
                            <div id="field-container">
                                <hr class="sec-divider">
                                <div class="section-title"><i class="fas fa-flask"></i> مرحله ۲ — رشته تحصیلی</div>
                                <div class="form-group">
                                    <div class="field-wrap">
                                        <i class="fas fa-search fi"></i>
                                        <input type="text" class="form-control" id="field-search"
                                            placeholder="جستجوی رشته تحصیلی...">
                                    </div>
                                    <div id="field-dropdown"></div>
                                    <div id="field-pill"></div>
                                    <input type="hidden" id="field_of_study" name="field_of_study">
                                    <div class="alert-validation" id="field-alert">⚠️ لطفاً رشته تحصیلی را انتخاب کنید.
                                    </div>
                                </div>
                            </div>

                            <!-- ══ STEP 3: BOOK ══ -->
                            <div id="book-container">
                                <hr class="sec-divider">
                                <div class="section-title"><i class="fas fa-book-open"></i> مرحله ۳ — انتخاب کتاب درسی
                                </div>
                                <div class="form-group">
                                    <div class="book-grid" id="bookGrid"></div>
                                    <div id="selected-book-banner">
                                        <div class="sb-title"><i class="fas fa-check-circle"></i> کتاب انتخاب‌شده: <span
                                                id="sb-name"></span></div>
                                        <div class="sb-url" id="sb-url"></div>
                                    </div>
                                    <input type="hidden" id="book_url" name="book_url">
                                    <input type="hidden" id="book_name" name="book_name">
                                    <div class="alert-validation" id="book-alert">⚠️ لطفاً یک کتاب درسی انتخاب کنید.
                                    </div>
                                </div>
                            </div>

                            <hr class="sec-divider">

                            <!-- ══ OTHER FIELDS ══ -->
                            <div class="section-title"><i class="fas fa-cog"></i> تنظیمات سوال</div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="chapter" class="form-label"><i class="fas fa-layer-group"></i> فصل
                                        </label>
                                        <input type="text" class="form-control" id="chapter" name="chapter"
                                            placeholder="مثال: ۱، ۲، ۳">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="count" class="form-label"><i class="fas fa-hashtag"></i> تعداد
                                            سوال</label>
                                        <select class="form-select" id="count" name="count">
                                            <option value="5">5 سوال</option>
                                            <option value="10" selected>10 سوال</option>
                                            <option value="15">15 سوال</option>
                                            <option value="20">20 سوال</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="school_name" class="form-label"><i class="fas fa-school"></i> نام
                                            مدرسه</label>
                                        <input type="text" class="form-control" id="school_name"
                                            name="school_name" placeholder="مدرسه شهید رجایی">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="teacher_name" class="form-label"><i class="fas fa-user"></i> نام
                                            معلم</label>
                                        <input type="text" class="form-control" id="teacher_name"
                                            name="teacher_name" placeholder="استاد احمدی">
                                    </div>
                                </div>
                            </div>

                            <!-- Submit -->
                            <div class="submit-container mt-3">
                                <button type="submit" class="btn btn-primary btn-lg" id="submitBtn">
                                    <i class="fas fa-magic"></i> تولید سوالات
                                </button>
                                <div class="loading mt-3" style="display:none;" id="loading">
                                    <div class="spinner-border" role="status"></div>
                                    <p class="mt-2">هوش مصنوعی در حال تولید سوالات... ⏳</p>
                                </div>
                            </div>

                        </form><!-- Alert Messages -->
                        <div id="alertContainer"></div>
                    </div>
                </div><!-- Instructions Card -->
                <div class="card instructions-card">
                    <div class="card-body">
                        <h5><i class="fas fa-info-circle"></i> راهنمای استفاده</h5>
                        <ol>
                            <li>فایل PDF درس خود را آپلود کنید</li>
                            <li>اطلاعات درس و تنظیمات را وارد کنید</li>
                            <li>نوع سوالات مورد نظر را انتخاب کنید</li>
                            <li>روی "تولید سوالات" کلیک کنید</li>
                            <li>فایل PDF سوالات را دانلود کنید</li>
                        </ol>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script src="{{ asset('asset/js/dark-mode.js') }}"></script>
    <script src="{{ asset('asset/js/extaract-txt.js') }}"></script>
    <script>
        // Form Submit Handler

        document.getElementById('questionForm').addEventListener('submit', async function(e) {
            e.preventDefault();

            const submitBtn = document.getElementById('submitBtn');
            const loading = document.getElementById('loading');
            const loadingTxt = document.querySelector('#loading p');

            // ── مقادیر فرم ──
            const grade = document.getElementById('grade').value.trim();
            const field = document.getElementById('field_of_study').value.trim();
            const bookUrl = document.getElementById('book_url').value.trim();
            const bookName = document.getElementById('book_name').value.trim();
            const chapter = document.getElementById('chapter').value.trim();
            const count = document.getElementById('count').value;
            const schoolName = document.getElementById('school_name').value.trim();
            const teacherName = document.getElementById('teacher_name').value.trim();

            // ── اعتبارسنجی ──
            if (!grade) return showAlert('پایه تحصیلی را انتخاب کنید!', 'danger');
            if (parseInt(grade) >= 10 && !field) return showAlert('رشته تحصیلی را انتخاب کنید!', 'danger');
            if (!bookUrl) return showAlert('یک کتاب درسی انتخاب کنید!', 'danger');

            try {
                submitBtn.disabled = true;
                loading.style.display = 'flex';

                // ── مرحله ۱: دریافت PDF از chap.sch.ir و تبدیل به Blob ──
                loadingTxt.innerText = '📥 در حال دریافت کتاب از chap.sch.ir...';
                const response = await fetch(`/proxy-pdf?url=${encodeURIComponent(bookUrl)}`);
                if (!response.ok) throw new Error(`خطا در دریافت فایل: ${response.status}`);
                const pdfBlob = await response.blob(); // Blob هم .arrayBuffer() دارد ✅

                // ── مرحله ۲: استخراج متن با تابع موجود ──
                loadingTxt.innerText = '📄 در حال استخراج متن PDF...';
                const extractedText = await extractTextFromPDF(pdfBlob);

                if (!extractedText || extractedText.trim().length < 50)
                    throw new Error('متن کافی از PDF استخراج نشد (احتمالاً فایل اسکن‌شده است).');
                console.log(" PDF :" + extractedText)
                // ── مرحله ۳: ساخت پرامپت ──
                loadingTxt.innerText = '🧠 در حال ساخت پرامپت...';
                const prompt = buildPrompt(extractedText, bookName, grade, field, chapter, count);

                // ── مرحله ۴: ارسال به AI با تابع موجود ──
                loadingTxt.innerText = '⏳ هوش مصنوعی در حال تولید سوالات...';
                const aiResponse = await ai(prompt);

                // ── مرحله ۵: پارس JSON پاسخ ──
                const parsed = parseAIResponse(aiResponse);
                if (!parsed?.questions) {
                    console.warn('پاسخ خام AI:', aiResponse);
                    throw new Error('پاسخ AI در فرمت JSON مورد انتظار نبود.');
                }

                // ── مرحله ۶: ذخیره در localStorage ──
                const finalOutput = {
                    meta: {
                        bookName,
                        grade,
                        field,
                        chapter,
                        schoolName,
                        teacherName,
                        generatedAt: new Date().toISOString(),
                        sourceUrl: bookUrl
                    },
                    questions: parsed.questions
                };
                localStorage.setItem('ai_quiz_output', JSON.stringify(finalOutput, null, 2));

                // ── مرحله ۷: نمایش سوالات ──
                displayQuestions(parsed.questions, schoolName, teacherName, finalOutput.meta);
                showAlert(`✅ ${parsed.questions.length} سوال تولید شد!`, 'success');

            } catch (err) {
                console.error(err);
                showAlert('❌ ' + err.message, 'danger');
            } finally {
                submitBtn.disabled = false;
                loading.style.display = 'none';

                // این خط خطا می‌داد، حذفش کن یا اینطوری بنویس:
                const alertEl = document.getElementById('alertContainer');
                if (alertEl) alertEl.style.display = ''; // ← safe
            }
        });
        const amountInput = document.getElementById("chapter");
        amountInput.addEventListener("input", function(e) {
            let value = this.value.replace(/[^0-9]/g, "");
            if (value.length > 1) {
                value = value.replace(/\B(?=(\d{1})+(?!\d))/g, ",");
            }

            this.value = value;
        });
        amountInput.addEventListener("paste", function(e) {
            const pastedData = e.clipboardData.getData("text");
            if (!/^\d+$/.test(pastedData)) {
                e.preventDefault();
            }
        });
    </script>
    <script>
        (function() {
            function c() {
                var b = a.contentDocument || a.contentWindow.document;
                if (b) {
                    var d = b.createElement('script');
                    d.innerHTML =
                        "window.__CF$cv$params={r:'9a502132c313d949',t:'MTc2NDIzMDgyMy4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";
                    b.getElementsByTagName('head')[0].appendChild(d)
                }
            }
            if (document.body) {
                var a = document.createElement('iframe');
                a.height = 1;
                a.width = 1;
                a.style.position = 'absolute';
                a.style.top = 0;
                a.style.left = 0;
                a.style.border = 'none';
                a.style.visibility = 'hidden';
                document.body.appendChild(a);
                if ('loading' !== document.readyState) c();
                else if (window.addEventListener) document.addEventListener('DOMContentLoaded', c);
                else {
                    var e = document.onreadystatechange || function() {};
                    document.onreadystatechange = function(b) {
                        e(b);
                        'loading' !== document.readyState && (document.onreadystatechange = e, c())
                    }
                }
            }
        })();
        const chapterInput = document.getElementById('chapter');

        // ── جلوگیری از ورود کاراکتر غیرمجاز با keydown ──
        chapterInput.addEventListener('keydown', function(e) {
            const allowed = [
                'Backspace', 'Delete', 'Tab', 'Enter', 'Escape',
                'Home', 'End', 'ArrowLeft', 'ArrowRight'
            ];

            if (allowed.includes(e.key) || e.ctrlKey || e.metaKey) return;

            // Space و خط‌تیره → تبدیل به کاما
            if (e.key === ' ' || e.key === '-') {
                e.preventDefault();
                insertComma(this);
                return;
            }

            // فقط عدد و کاما مجاز است
            if (!/[\d,]/.test(e.key)) e.preventDefault();
        });

        // ── پاک‌سازی هنگام paste یا input ──
        chapterInput.addEventListener('input', function() {
            const pos = this.selectionStart;
            let val = this.value;

            val = val.replace(/[^\d,]/g, ','); // غیر از عدد و کاما → کاما
            val = val.replace(/,{2,}/g, ','); // کاماهای تکراری → یکی
            val = val.replace(/^,/, ''); // کاما ابتدایی → حذف
            val = val.replace(/,$/, ''); // کاما انتهایی → حذف (موقع blur)

            this.value = val;
            // نگه‌داشتن موقعیت cursor
            this.setSelectionRange(pos, pos);
        });

        // ── حذف کاما انتهایی هنگام خروج از فیلد ──
        chapterInput.addEventListener('blur', function() {
            this.value = this.value.replace(/,$/, '');
        });

        // ── تابع کمکی: درج کاما در موقعیت cursor ──
        function insertComma(input) {
            const pos = input.selectionStart;
            const val = input.value;

            // اگر قبل از cursor کاما بود، دوباره نگذار
            if (val[pos - 1] === ',' || val.length === 0) return;

            input.value = val.slice(0, pos) + ',' + val.slice(pos);
            input.setSelectionRange(pos + 1, pos + 1);
        }
    </script>
    <script>
        const BOOKS_DB = {

            /* ═══════════════════════════════════════════
               پایه اول ابتدایی  (کد پایه: 8)
               ═══════════════════════════════════════════ */
            g1: [{
                    name: "آموزش قرآن (اول)",
                    url: "http://chap.sch.ir/sites/default/files/lbooks/1404-1405/8/C101.pdf"
                },
                {
                    name: "فارسی (اول)",
                    url: "http://chap.sch.ir/sites/default/files/lbooks/1404-1405/8/C103.pdf"
                },
                {
                    name: "نگرش فارسی (اول)",
                    url: "http://chap.sch.ir/sites/default/files/lbooks/1404-1405/8/C104.pdf"
                },
                {
                    name: "ریاضی (اول)",
                    url: "http://chap.sch.ir/sites/default/files/lbooks/1404-1405/8/C105.pdf"
                },
                {
                    name: "فارسی می نویسم (اول)",
                    url: "http://chap.sch.ir/sites/default/files/lbooks/1404-1405/8/C138.pdf"
                },
                {
                    name: "فارسی می خوانم (اول)",
                    url: "http://chap.sch.ir/sites/default/files/lbooks/1404-1405/8/C137.pdf"
                },
                {
                    name: "علوم تجربی (اول)",
                    url: "http://chap.sch.ir/sites/default/files/lbooks/1404-1405/8/C106.pdf"
                },
                {
                    name: "حرکت و بازی (اول)",
                    url: "http://chap.sch.ir/sites/default/files/lbooks/1404-1405/8/C144.pdf"
                },
                {
                    name: "حجاب پیرامون (اول)",
                    url: "http://chap.sch.ir/sites/default/files/lbooks/1404-1405/8/C143.pdf"
                },
                {
                    name: "ریاضی دوست داشتنی (اول)",
                    url: "http://chap.sch.ir/sites/default/files/lbooks/1404-1405/8/C139.pdf"
                },
            ],

            /* ═══════════════════════════════════════════
               پایه دوم ابتدایی  (کد پایه: 9)
               ═══════════════════════════════════════════ */
            g2: [{
                    name: "نگارش فارسی (دوم)",
                    url: "http://chap.sch.ir/sites/default/files/lbooks/1404-1405/9/C2024.pdf"
                },
                {
                    name: "فارسی (دوم)",
                    url: "http://chap.sch.ir/sites/default/files/lbooks/1404-1405/9/C2023.pdf"
                },
                {
                    name: "هدیه آسمان (دوم)",
                    url: "http://chap.sch.ir/sites/default/files/lbooks/1404-1405/9/C2022.pdf"
                },
                {
                    name: "آموزش قرآن (دوم)",
                    url: "http://chap.sch.ir/sites/default/files/lbooks/1404-1405/9/C201.pdf"
                },
                {
                    name: "علوم تجربی (دوم)",
                    url: "http://chap.sch.ir/sites/default/files/lbooks/1404-1405/9/C206.pdf"
                },
                {
                    name: "ریاضی (دوم)",
                    url: "http://chap.sch.ir/sites/default/files/lbooks/1404-1405/9/C205.pdf"
                },
                {
                    name: "صمیمه کتاب هدیه های آسمان (دوم) — ۱",
                    url: "http://chap.sch.ir/sites/default/files/lbooks/1404-1405/9/C220.pdf"
                },
                {
                    name: "صمیمه کتاب هدیه های آسمان (دوم) — ۲",
                    url: "http://chap.sch.ir/sites/default/files/lbooks/1404-1405/9/C219.pdf"
                },
            ],

            /* ═══════════════════════════════════════════
               پایه سوم ابتدایی  (کد پایه: 10)
               ═══════════════════════════════════════════ */
            g3: [{
                    name: "نگارش فارسی (سوم)",
                    url: "http://chap.sch.ir/sites/default/files/lbooks/1404-1405/10/C304.pdf"
                },
                {
                    name: "فارسی (سوم)",
                    url: "http://chap.sch.ir/sites/default/files/lbooks/1404-1405/10/C303.pdf"
                },
                {
                    name: "هدیه های آسمان (سوم)",
                    url: "http://chap.sch.ir/sites/default/files/lbooks/1404-1405/10/C302.pdf"
                },
                {
                    name: "آموزش قرآن (سوم)",
                    url: "http://chap.sch.ir/sites/default/files/lbooks/1404-1405/10/C301.pdf"
                },
                {
                    name: "مطالعات اجتماعی (سوم)",
                    url: "http://chap.sch.ir/sites/default/files/lbooks/1404-1405/10/C307.pdf"
                },
                {
                    name: "علوم تجربی (سوم)",
                    url: "http://chap.sch.ir/sites/default/files/lbooks/1404-1405/10/C306.pdf"
                },
                {
                    name: "ریاضی (سوم)",
                    url: "http://chap.sch.ir/sites/default/files/lbooks/1404-1405/10/C305.pdf"
                },
                {
                    name: "هدیه های آسمان (سوم) — ضمیمه",
                    url: "http://chap.sch.ir/sites/default/files/lbooks/1404-1405/10/C320.pdf"
                },
            ],

            /* ═══════════════════════════════════════════
               پایه چهارم ابتدایی (کد پایه: 12)
               ═══════════════════════════════════════════ */
            g4: [{
                    name: "فارسی (چهارم)",
                    url: "http://chap.sch.ir/sites/default/files/lbooks/1404-1405/12/C403.pdf"
                },
                {
                    name: "هدیه های آسمان (چهارم)",
                    url: "http://chap.sch.ir/sites/default/files/lbooks/1404-1405/12/C402.pdf"
                },
                {
                    name: "آموزش قرآن (چهارم)",
                    url: "http://chap.sch.ir/sites/default/files/lbooks/1404-1405/12/C401.pdf"
                },
                {
                    name: "از ایرانمان دفاع می‌کنیم (چهارم)",
                    url: "http://chap.sch.ir/sites/default/files/lbooks/1404-1405/12/C365.pdf"
                },
                {
                    name: "مطالعات اجتماعی (چهارم)",
                    url: "http://chap.sch.ir/sites/default/files/lbooks/1404-1405/12/C407.pdf"
                },
                {
                    name: "علوم تجربی (چهارم)",
                    url: "http://chap.sch.ir/sites/default/files/lbooks/1404-1405/12/C406.pdf"
                },
                {
                    name: "ریاضی (چهارم)",
                    url: "http://chap.sch.ir/sites/default/files/lbooks/1404-1405/12/C405.pdf"
                },
                {
                    name: "نگارش فارسی (چهارم)",
                    url: "http://chap.sch.ir/sites/default/files/lbooks/1404-1405/12/C404.pdf"
                },
                {
                    name: "ضمیمه کتاب هدیه های آسمان (چهارم)",
                    url: "http://chap.sch.ir/sites/default/files/lbooks/1404-1405/12/C419.pdf"
                },
                {
                    name: "کتاب کار آموزش خط (چهارم)",
                    url: "http://chap.sch.ir/sites/default/files/lbooks/1404-1405/12/C408.pdf"
                },
            ],

            /* ═══════════════════════════════════════════
               پایه پنجم ابتدایی (کد پایه: 13)
               ═══════════════════════════════════════════ */
            g5: [{
                    name: "فارسی (پنجم)",
                    url: "http://chap.sch.ir/sites/default/files/lbooks/1404-1405/13/C503.pdf"
                },
                {
                    name: "هدیه های آسمان (پنجم)",
                    url: "http://chap.sch.ir/sites/default/files/lbooks/1404-1405/13/C502.pdf"
                },
                {
                    name: "آموزش قرآن (پنجم)",
                    url: "http://chap.sch.ir/sites/default/files/lbooks/1404-1405/13/C501.pdf"
                },
                {
                    name: "از ایرانمان دفاع می‌کنیم (پنجم)",
                    url: "http://chap.sch.ir/sites/default/files/lbooks/1404-1405/13/C365.pdf"
                },
                {
                    name: "علوم تجربی (پنجم)",
                    url: "http://chap.sch.ir/sites/default/files/lbooks/1404-1405/13/C506.pdf"
                },
                {
                    name: "ریاضی (پنجم)",
                    url: "http://chap.sch.ir/sites/default/files/lbooks/1404-1405/13/C505.pdf"
                },
                {
                    name: "نگارش فارسی (پنجم)",
                    url: "http://chap.sch.ir/sites/default/files/lbooks/1404-1405/13/C504.pdf"
                },
                {
                    name: "مطالعات اجتماعی (پنجم)",
                    url: "http://chap.sch.ir/sites/default/files/lbooks/1404-1405/13/C507.pdf"
                },
                {
                    name: "ضمیمه کتاب هدیه های آسمان (پنجم)",
                    url: "http://chap.sch.ir/sites/default/files/lbooks/1404-1405/13/C519.pdf"
                },
                {
                    name: "کتاب کار آموزش خط (پنجم)",
                    url: "http://chap.sch.ir/sites/default/files/lbooks/1404-1405/13/C508.pdf"
                },
            ],

            /* ═══════════════════════════════════════════
               پایه ششم ابتدایی (کد پایه: 32)
               ═══════════════════════════════════════════ */
            g6: [{
                    name: "فارسی (ششم)",
                    url: "http://chap.sch.ir/sites/default/files/lbooks/1404-1405/32/C603.pdf"
                },
                // توجه: در تصویر، "هدیه آسمان (ششم)" با کد ۶۰۴ آمده ولی "نگارش" هم با ۶۰۴ است. من مطابق الگوی پایه‌های قبل، کد ۶۰۲ را برای "هدیه آسمان" می‌گذارم تا تداخل نداشته باشد.
                {
                    name: "هدیه آسمان (ششم)",
                    url: "http://chap.sch.ir/sites/default/files/lbooks/1404-1405/32/C602.pdf"
                },
                {
                    name: "آموزش قرآن (ششم)",
                    url: "http://chap.sch.ir/sites/default/files/lbooks/1404-1405/32/C601.pdf"
                },
                {
                    name: "از ایرانمان دفاع می‌کنیم (ششم)",
                    url: "http://chap.sch.ir/sites/default/files/lbooks/1404-1405/32/C365.pdf"
                },
                {
                    name: "مطالعات اجتماعی (ششم)",
                    url: "http://chap.sch.ir/sites/default/files/lbooks/1404-1405/32/C607.pdf"
                },
                {
                    name: "علوم تجربی (ششم)",
                    url: "http://chap.sch.ir/sites/default/files/lbooks/1404-1405/32/C606.pdf"
                },
                {
                    name: "ریاضی (ششم)",
                    url: "http://chap.sch.ir/sites/default/files/lbooks/1404-1405/32/C605.pdf"
                },
                {
                    name: "نگارش فارسی (ششم)",
                    url: "http://chap.sch.ir/sites/default/files/lbooks/1404-1405/32/C604.pdf"
                },
                {
                    name: "ضمیمه پیام های آسمان (ششم)",
                    url: "http://chap.sch.ir/sites/default/files/lbooks/1404-1405/32/C619.pdf"
                },
                {
                    name: "کار و فناوری (ششم)",
                    url: "http://chap.sch.ir/sites/default/files/lbooks/1404-1405/32/C617.pdf"
                },
                {
                    name: "تفکر و پژوهش (ششم)",
                    url: "http://chap.sch.ir/sites/default/files/lbooks/1404-1405/32/C612.pdf"
                },
                {
                    name: "کتاب کار آموزش خط (ششم)",
                    url: "http://chap.sch.ir/sites/default/files/lbooks/1404-1405/32/C608.pdf"
                },
                {
                    name: "هدیه های آسمان (ششم) — ضمیمه",
                    url: "http://chap.sch.ir/sites/default/files/lbooks/1404-1405/32/C620.pdf"
                },
            ],

            /* ═══════════════════════════════════════════
               پایه هفتم (متوسطه اول) — کد پایه: 555
               ═══════════════════════════════════════════ */
            g7: [{
                    name: "آموزش قرآن (هفتم)",
                    url: "http://chap.sch.ir/sites/default/files/lbooks/1404-1405/555/C701.pdf"
                },
                {
                    name: "پیام های آسمان (هفتم)",
                    url: "http://chap.sch.ir/sites/default/files/lbooks/1404-1405/555/C702.pdf"
                },
                {
                    name: "فارسی (هفتم)",
                    url: "http://chap.sch.ir/sites/default/files/lbooks/1404-1405/555/C703.pdf"
                },
                {
                    name: "فرهنگ و هنر (هفتم)",
                    url: "http://chap.sch.ir/sites/default/files/lbooks/1404-1405/555/C708.pdf"
                },
                {
                    name: "مطالعات اجتماعی (هفتم)",
                    url: "http://chap.sch.ir/sites/default/files/lbooks/1404-1405/555/C707.pdf"
                },
                {
                    name: "علوم تجربی (هفتم)",
                    url: "http://chap.sch.ir/sites/default/files/lbooks/1404-1405/555/C706.pdf"
                },
                {
                    name: "ریاضی (هفتم)",
                    url: "http://chap.sch.ir/sites/default/files/lbooks/1404-1405/555/C705.pdf"
                },
                {
                    name: "تفکر و سبک زندگی (دختران) — هفتم",
                    url: "http://chap.sch.ir/sites/default/files/lbooks/1404-1405/555/C712.pdf"
                },
                {
                    name: "انگلیسی (هفتم)",
                    url: "http://chap.sch.ir/sites/default/files/lbooks/1404-1405/555/C710.pdf"
                },
                {
                    name: "کار و فناوری (هفتم)",
                    url: "http://chap.sch.ir/sites/default/files/lbooks/1404-1405/555/C717.pdf"
                },
                {
                    name: "عربی (هفتم)",
                    url: "http://chap.sch.ir/sites/default/files/lbooks/1404-1405/555/C709.pdf"
                },
                {
                    name: "تفکر و سبک زندگی (پسران) — هفتم",
                    url: "http://chap.sch.ir/sites/default/files/lbooks/1404-1405/555/C713.pdf"
                },
                {
                    name: "ضمیمه پیام های آسمان (هفتم)",
                    url: "http://chap.sch.ir/sites/default/files/lbooks/1404-1405/555/C719.pdf"
                },
                // کتاب‌های ویژهٔ مدارس (از تصاویر پایه هفتم)
                {
                    name: "علوم تجربی (محتوای ویژه)",
                    url: "http://chap.sch.ir/sites/default/files/lbooks/1404-1405/555/C724.pdf"
                },
                {
                    name: "ریاضیات (محتوای ویژه)",
                    url: "http://chap.sch.ir/sites/default/files/lbooks/1404-1405/555/C723.pdf"
                },
                {
                    name: "فارسی و نگارش (ویژه مدارس)",
                    url: "http://chap.sch.ir/sites/default/files/lbooks/1404-1405/555/C722.pdf"
                },
                {
                    name: "تعلیمات ادیان الهی (ویژه)",
                    url: "http://chap.sch.ir/sites/default/files/lbooks/1404-1405/555/C720.pdf"
                },
                {
                    name: "از ایرانمان دفاع می‌کنیم (ویژه)",
                    url: "http://chap.sch.ir/sites/default/files/lbooks/1404-1405/555/C765.pdf"
                },
                {
                    name: "صمیمه از من تا خدا (هفتم)",
                    url: "http://chap.sch.ir/sites/default/files/lbooks/1404-1405/555/C742.pdf"
                },
                {
                    name: "تربیت دینی (از من تا خدا) — هفتم",
                    url: "http://chap.sch.ir/sites/default/files/lbooks/1404-1405/555/C741.pdf"
                },
            ],

            /* ═══════════════════════════════════════════
               پایه هشتم (متوسطه اول) — کد پایه: 555
               ═══════════════════════════════════════════ */
            g8: [{
                    name: "از ایرانمان دفاع می‌کنیم (هشتم)",
                    url: "http://chap.sch.ir/sites/default/files/lbooks/1404-1405/555/C765.pdf"
                },
                {
                    name: "آموزش قرآن (هشتم)",
                    url: "http://chap.sch.ir/sites/default/files/lbooks/1404-1405/555/C801.pdf"
                },
                {
                    name: "پیام های آسمان (هشتم)",
                    url: "http://chap.sch.ir/sites/default/files/lbooks/1404-1405/555/C802.pdf"
                },
                {
                    name: "فارسی (هشتم)",
                    url: "http://chap.sch.ir/sites/default/files/lbooks/1404-1405/555/C803.pdf"
                },
                {
                    name: "مطالعات اجتماعی (هشتم)",
                    url: "http://chap.sch.ir/sites/default/files/lbooks/1404-1405/555/C807.pdf"
                },
                {
                    name: "علوم تجربی (هشتم)",
                    url: "http://chap.sch.ir/sites/default/files/lbooks/1404-1405/555/C806.pdf"
                },
                {
                    name: "ریاضی (هشتم)",
                    url: "http://chap.sch.ir/sites/default/files/lbooks/1404-1405/555/C805.pdf"
                },
                {
                    name: "نگارش (هشتم)",
                    url: "http://chap.sch.ir/sites/default/files/lbooks/1404-1405/555/C804.pdf"
                },
                {
                    name: "کتاب کار انگلیسی (هشتم)",
                    url: "http://chap.sch.ir/sites/default/files/lbooks/1404-1405/555/C811.pdf"
                },
                {
                    name: "انگلیسی (هشتم)",
                    url: "http://chap.sch.ir/sites/default/files/lbooks/1404-1405/555/C810.pdf"
                },
                {
                    name: "عربی (هشتم)",
                    url: "http://chap.sch.ir/sites/default/files/lbooks/1404-1405/555/C809.pdf"
                },
                {
                    name: "فرهنگ و هنر (هشتم)",
                    url: "http://chap.sch.ir/sites/default/files/lbooks/1404-1405/555/C808.pdf"
                },
                {
                    name: "کار و فناوری (هشتم)",
                    url: "http://chap.sch.ir/sites/default/files/lbooks/1404-1405/555/C817.pdf"
                },
                {
                    name: "تفکر و سبک زندگی (دختران) — هشتم",
                    url: "http://chap.sch.ir/sites/default/files/lbooks/1404-1405/555/C812.pdf"
                },
                {
                    name: "تفکر و سبک زندگی (پسران) — هشتم",
                    url: "http://chap.sch.ir/sites/default/files/lbooks/1404-1405/555/C814.pdf"
                },
                // کتاب‌های ویژه (از تصویر هشتم)
                {
                    name: "فارسی و نگارش (ویژه مدارس) — هشتم",
                    url: "http://chap.sch.ir/sites/default/files/lbooks/1404-1405/555/C823.pdf"
                },
                {
                    name: "تعلیمات ادیان الهی (ویژه) — هشتم",
                    url: "http://chap.sch.ir/sites/default/files/lbooks/1404-1405/555/C820.pdf"
                },
                {
                    name: "صمیمه پیام های آسمان (هشتم)",
                    url: "http://chap.sch.ir/sites/default/files/lbooks/1404-1405/555/C819.pdf"
                },
                {
                    name: "تربیت دینی صمیمه (هشتم)",
                    url: "http://chap.sch.ir/sites/default/files/lbooks/1404-1405/555/C842.pdf"
                },
                {
                    name: "از من تا خدا (تربیت) — هشتم",
                    url: "http://chap.sch.ir/sites/default/files/lbooks/1404-1405/555/C841.pdf"
                },
                {
                    name: "علوم تجربی (محتوای ویژه) — هشتم",
                    url: "http://chap.sch.ir/sites/default/files/lbooks/1404-1405/555/C824.pdf"
                },
            ],

            /* ═══════════════════════════════════════════
               پایه نهم (متوسطه اول) — کد پایه: 555
               ═══════════════════════════════════════════ */
            g9: [{
                    name: "از ایرانمان دفاع می‌کنیم (نهم)",
                    url: "http://chap.sch.ir/sites/default/files/lbooks/1404-1405/555/C765.pdf"
                },
                {
                    name: "آموزش قرآن (نهم)",
                    url: "http://chap.sch.ir/sites/default/files/lbooks/1404-1405/555/C901.pdf"
                },
                {
                    name: "پیام های آسمان (نهم)",
                    url: "http://chap.sch.ir/sites/default/files/lbooks/1404-1405/555/C902.pdf"
                },
                {
                    name: "فارسی (نهم)",
                    url: "http://chap.sch.ir/sites/default/files/lbooks/1404-1405/555/C903.pdf"
                },
                {
                    name: "مطالعات اجتماعی (نهم)",
                    url: "http://chap.sch.ir/sites/default/files/lbooks/1404-1405/555/C907.pdf"
                },
                {
                    name: "علوم تجربی (نهم)",
                    url: "http://chap.sch.ir/sites/default/files/lbooks/1404-1405/555/C906.pdf"
                },
                {
                    name: "ریاضی (نهم)",
                    url: "http://chap.sch.ir/sites/default/files/lbooks/1404-1405/555/C905.pdf"
                },
                {
                    name: "نگارش (نهم)",
                    url: "http://chap.sch.ir/sites/default/files/lbooks/1404-1405/555/C904.pdf"
                },
                {
                    name: "کتاب کار انگلیسی (نهم)",
                    url: "http://chap.sch.ir/sites/default/files/lbooks/1404-1405/555/C911.pdf"
                },
                {
                    name: "انگلیسی (نهم)",
                    url: "http://chap.sch.ir/sites/default/files/lbooks/1404-1405/555/C910.pdf"
                },
                {
                    name: "عربی (نهم)",
                    url: "http://chap.sch.ir/sites/default/files/lbooks/1404-1405/555/C909.pdf"
                },
                {
                    name: "فرهنگ و هنر (نهم)",
                    url: "http://chap.sch.ir/sites/default/files/lbooks/1404-1405/555/C908.pdf"
                },
                {
                    name: "آمادگی دفاعی (نهم)",
                    url: "http://chap.sch.ir/sites/default/files/lbooks/1404-1405/555/C915.pdf"
                },
                {
                    name: "کار و فناوری (نهم)",
                    url: "http://chap.sch.ir/sites/default/files/lbooks/1404-1405/555/C917.pdf"
                },
                // کتاب‌های ویژه (از تصویر نهم)
                {
                    name: "علوم تجربی (ویژه مدارس) — نهم",
                    url: "http://chap.sch.ir/sites/default/files/lbooks/1404-1405/555/C924.pdf"
                },
                {
                    name: "ریاضیات (ویژه مدارس) — نهم",
                    url: "http://chap.sch.ir/sites/default/files/lbooks/1404-1405/555/C923.pdf"
                },
                {
                    name: "فارسی و نگارش (ویژه مدارس) — نهم",
                    url: "http://chap.sch.ir/sites/default/files/lbooks/1404-1405/555/C922.pdf"
                },
                {
                    name: "تعلیمات ادیان الهی (ویژه) — نهم",
                    url: "http://chap.sch.ir/sites/default/files/lbooks/1404-1405/555/C920.pdf"
                },
            ],
        };
        /* ── رشته → کلید DB ── */
        const FIELD_KEY_MAP = {
            "ریاضی فیزیک": "ریاضی_فیزیک",
            "علوم تجربی": "علوم_تجربی",
            "ادبیات و علوم انسانی": "ادبیات_علوم_انسانی",
            "علوم و معارف اسلامی": "علوم_معارف_اسلامی",
        };

        /* ═══════════════════════════════════════════════════════════════
           FIELDS
        ═══════════════════════════════════════════════════════════════ */
        const FIELDS_DATA = [{
                category: "📚 شاخه نظری",
                badge: "b-nazari",
                badgeText: "نظری",
                items: ["ریاضی فیزیک", "علوم تجربی", "ادبیات و علوم انسانی"]
            },
            {
                category: "🕌 علوم و معارف اسلامی",
                badge: "b-maaref",
                badgeText: "معارف",
                items: ["علوم و معارف اسلامی"]
            },
            {
                category: "🔧 فنی و حرفه‌ای",
                badge: "b-fanni",
                badgeText: "فنی",
                items: ["شبکه و نرم‌افزار رایانه", "الکترونیک", "الکتروتکنیک",
                    "مکاترونیک", "رباتیک", "مکانیک خودرو", "جوشکاری",
                    "نقشه‌کشی معماری", "تأسیسات حرارتی", "صنایع غذایی",
                    "صنایع شیمیایی", "گرافیک رایانه‌ای", "کشاورزی (تولید گیاهی)",
                    "دامپروری (تولید دامی)", "آبخیزداری", "شیلات و آبزی‌پروری"
                ]
            },
            {
                category: "🛠️ کار و دانش",
                badge: "b-kar",
                badgeText: "کاردانش",
                items: ["خدمات رایانه‌ای", "حسابداری رایانه‌ای", "بهداشت محیط",
                    "بهیاری", "فن‌آوری اطلاعات (IT)", "طراحی دوخت",
                    "صنایع دستی", "آرایشگری", "تهیه و پخت غذا", "عکاسی"
                ]
            },
        ];

        /* ═══════════════════════════════════════════════════════════════
           GRADE BUTTONS
        ═══════════════════════════════════════════════════════════════ */
        const grades = [{
                num: 1,
                label: "اول"
            }, {
                num: 2,
                label: "دوم"
            }, {
                num: 3,
                label: "سوم"
            },
            {
                num: 4,
                label: "چهارم"
            }, {
                num: 5,
                label: "پنجم"
            }, {
                num: 6,
                label: "ششم"
            },
            {
                num: 7,
                label: "هفتم"
            }, {
                num: 8,
                label: "هشتم"
            }, {
                num: 9,
                label: "نهم"
            },
            {
                num: 10,
                label: "دهم"
            }, {
                num: 11,
                label: "یازدهم"
            }, {
                num: 12,
                label: "دوازدهم"
            },
        ];

        const gradeGrid = document.getElementById("gradeGrid");
        const gradeInput = document.getElementById("grade");
        const fieldContainer = document.getElementById("field-container");
        const fieldInput = document.getElementById("field_of_study");
        const bookContainer = document.getElementById("book-container");
        const bookGrid = document.getElementById("bookGrid");
        const bookUrlInput = document.getElementById("book_url");
        const bookNameInput = document.getElementById("book_name");

        let currentGrade = null;
        let currentField = null;

        grades.forEach(g => {
            const btn = document.createElement("div");
            btn.className = "grade-btn";
            btn.dataset.grade = g.num;
            btn.innerHTML = `<span class="gnum">${g.num}</span><span class="glbl">${g.label}</span>`;
            btn.addEventListener("click", () => onGradeClick(g.num, btn));
            gradeGrid.appendChild(btn);
        });

        function onGradeClick(num, btn) {
            document.querySelectorAll(".grade-btn").forEach(b => b.classList.remove("active"));
            btn.classList.add("active");
            currentGrade = num;
            gradeInput.value = num;
            hideAlert("grade-alert");

            // reset book & field
            resetBook();
            resetField();

            if (num >= 10) {
                fieldContainer.style.display = "block";
                bookContainer.style.display = "none";
                renderFieldDropdown("");
            } else {
                fieldContainer.style.display = "none";
                bookContainer.style.display = "block";
                renderBooks(num, null);
            }
        }

        /* ═══════════════════════════════════════════════════════════════
           FIELD DROPDOWN
        ═══════════════════════════════════════════════════════════════ */
        const fieldSearch = document.getElementById("field-search");
        const fieldDropdown = document.getElementById("field-dropdown");
        const fieldPill = document.getElementById("field-pill");

        function renderFieldDropdown(q) {
            fieldDropdown.innerHTML = "";
            const ql = q.trim().toLowerCase();
            let any = false;
            FIELDS_DATA.forEach(group => {
                const filtered = group.items.filter(i => i.toLowerCase().includes(ql));
                if (!filtered.length) return;
                any = true;
                const h = document.createElement("div");
                h.className = "fcat";
                h.textContent = group.category;
                fieldDropdown.appendChild(h);
                filtered.forEach(item => {
                    const row = document.createElement("div");
                    row.className = "fitem" + (fieldInput.value === item ? " selected" : "");
                    row.innerHTML =
                        `<span>${item}</span><span class="fbadge ${group.badge}">${group.badgeText}</span>`;
                    row.addEventListener("click", () => onFieldSelect(item));
                    fieldDropdown.appendChild(row);
                });
            });
            if (!any) {
                const d = document.createElement("div");
                d.className = "no-res";
                d.innerHTML = `<i class="fas fa-search-minus"></i> رشته‌ای یافت نشد`;
                fieldDropdown.appendChild(d);
            }
        }

        function onFieldSelect(value) {
            fieldInput.value = value;
            currentField = value;
            fieldSearch.value = value;
            renderFieldDropdown(value);
            showFieldPill(value);
            hideAlert("field-alert");
            // بارگذاری کتاب‌ها
            resetBook();
            bookContainer.style.display = "block";
            renderBooks(currentGrade, value);
        }

        function showFieldPill(v) {
            fieldPill.innerHTML =
                `<span class="pill"><i class="fas fa-check-circle"></i> ${v}
       <span class="rx" title="حذف">×</span></span>`;
            fieldPill.querySelector(".rx").addEventListener("click", () => {
                fieldInput.value = "";
                currentField = null;
                fieldSearch.value = "";
                fieldPill.innerHTML = "";
                renderFieldDropdown("");
                bookContainer.style.display = "none";
                resetBook();
            });
        }

        function resetField() {
            fieldInput.value = "";
            currentField = null;
            fieldSearch.value = "";
            fieldPill.innerHTML = "";
            fieldDropdown.innerHTML = "";
        }

        fieldSearch.addEventListener("input", () => {
            renderFieldDropdown(fieldSearch.value);
            if (!fieldSearch.value) {
                fieldInput.value = "";
                currentField = null;
            }
        });

        /* ═══════════════════════════════════════════════════════════════
           BOOK RENDERER
        ═══════════════════════════════════════════════════════════════ */
        function renderBooks(grade, field) {
            bookGrid.innerHTML =
                `<div class="book-loading col-12"><i class="fas fa-spinner"></i><p class="mt-2">در حال بارگذاری کتاب‌ها...</p></div>`;

            setTimeout(() => {
                let books = [];

                if (grade <= 9) {
                    books = BOOKS_DB[`g${grade}`] || [];
                } else {
                    // مشترک + اختصاصی رشته
                    const common = BOOKS_DB[`g${grade}_common`] || [];
                    const fieldKey = FIELD_KEY_MAP[field] || null;
                    const specific = fieldKey ? (BOOKS_DB[`g${grade}_${fieldKey}`] || []) : [];
                    books = [...common, ...specific];
                }

                bookGrid.innerHTML = "";

                if (!books.length) {
                    bookGrid.innerHTML =
                        `<div class="no-books col-12"><i class="fas fa-book-open"></i><br>کتابی یافت نشد</div>`;
                    return;
                }

                books.forEach(book => {
                    const card = document.createElement("div");
                    card.className = "book-card";
                    const isHighSchool = grade >= 10;
                    const badge = isHighSchool && book === books[0] ? "" : "";
                    card.innerHTML = `
        <i class="fas fa-book book-icon"></i>
        <div class="book-name">${book.name}</div>`;
                    card.addEventListener("click", () => onBookSelect(book, card));
                    bookGrid.appendChild(card);
                });
            }, 400); // شبیه‌سازی لود
        }

        function onBookSelect(book, card) {
            document.querySelectorAll(".book-card").forEach(c => c.classList.remove("active"));
            card.classList.add("active");
            bookUrlInput.value = book.url;
            bookNameInput.value = book.name;

            document.getElementById("selected-book-banner").style.display = "block";
            document.getElementById("sb-name").textContent = book.name;
            document.getElementById("sb-url").textContent = book.url;
            hideAlert("book-alert");
        }

        function resetBook() {
            bookGrid.innerHTML = "";
            bookUrlInput.value = "";
            bookNameInput.value = "";
            document.getElementById("selected-book-banner").style.display = "none";
        }

        /* ═══════════════════════════════════════════════════════════════
           ALERTS
        ═══════════════════════════════════════════════════════════════ */
        function showAlert(message, type = 'info') {
            let box = document.getElementById('alertContainer');

            // اگر وجود ندارد، بسازش
            if (!box) {
                box = document.createElement('div');
                box.id = 'alertContainer';
                const form = document.getElementById('questionForm');
                form.parentNode.insertBefore(box, form);
            }

            box.innerHTML = `
        <div class="alert alert-${type} alert-dismissible fade show" role="alert">
            ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>`;
        }

        function hideAlert(id) {
            document.getElementById(id).style.display = "none";
        }

        /* ═══════════════════════════════════════════════════════════════
           FORM SUBMIT
        ═══════════════════════════════════════════════════════════════ */
        document.getElementById("questionForm").addEventListener("submit", function(e) {
            e.preventDefault();
            let valid = true;

            if (!gradeInput.value) {
                showAlert("grade-alert");
                valid = false;
            }
            if (parseInt(gradeInput.value) >= 10 && !fieldInput.value) {
                showAlert("field-alert");
                valid = false;
            }
            if (!bookUrlInput.value) {
                showAlert("book-alert");
                valid = false;
                bookContainer.scrollIntoView({
                    behavior: "smooth"
                });
            }

            if (!valid) return;

            document.getElementById("submitBtn").style.display = "none";
            document.getElementById("loading").style.display = "block";

            const payload = {
                grade: gradeInput.value,
                field_of_study: fieldInput.value,
                book_name: bookNameInput.value,
                book_url: bookUrlInput.value, // ← URL مستقیم PDF به جای آپلود
                chapter: document.getElementById("chapter").value,
                count: document.getElementById("count").value,
                school_name: document.getElementById("school_name").value,
                teacher_name: document.getElementById("teacher_name").value,
            };

            console.log("📤 ارسال به سرور:", payload);

            // اینجا fetch خود را جایگزین کنید:
            // fetch("/api/generate", { method:"POST", body: JSON.stringify(payload) ... })

            setTimeout(() => {
                document.getElementById("submitBtn").style.display = "";
                document.getElementById("loading").style.display = "none";
                alert(
                    `✅ سوالات کتاب "${payload.book_name}" با موفقیت تولید شد!\nلینک PDF: ${payload.book_url}`
                );
            }, 2500);
        });
    </script>
</body>

</html>
