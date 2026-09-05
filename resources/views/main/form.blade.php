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
                            class="fas fa-moon"></i> </button> <a href="main/editor" class="btn btn-secondary"> <i
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
        document.getElementById('questionForm').addEventListener('submit', async function(e) {
            e.preventDefault();

            const submitBtn = document.getElementById('submitBtn');
            const loading = document.getElementById('loading');
            const loadingTxt = document.querySelector('#loading p');

            // ── مقادیر فرم ──
            const grade = document.getElementById('grade').value.trim();
            const field = document.getElementById('field_of_study').value.trim();
            const bookUrl = document.getElementById('book_url').value.trim(); // ← مسیر txt local
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

                // ── مرحله ۱: خواندن مستقیم فایل txt ──
                loadingTxt.innerText = '📄 در حال خواندن متن کتاب...';
                const response = await fetch(bookUrl);
                if (!response.ok) throw new Error(`فایل کتاب یافت نشد (${response.status})`);

                const extractedText = await response.text();

                if (!extractedText || extractedText.trim().length < 50)
                    throw new Error('متن کتاب خالی یا ناقص است.');

                console.log('📖 طول متن:', extractedText.length, 'کاراکتر');

                // ── مرحله ۲: ساخت پرامپت ──
                loadingTxt.innerText = '🧠 در حال ساخت پرامپت...';
                const prompt = buildPrompt(extractedText, bookName, grade, field, chapter, count);

                // ── مرحله ۳: ارسال به AI ──
                loadingTxt.innerText = '⏳ هوش مصنوعی در حال تولید سوالات...';
                const aiResponse = await ai(prompt);

                // ── مرحله ۴: پارس JSON ──
                const parsed = parseAIResponse(aiResponse);
                if (!parsed?.questions) {
                    console.warn('پاسخ خام AI:', aiResponse);
                    throw new Error('پاسخ AI در فرمت JSON مورد انتظار نبود.');
                }

                // ── مرحله ۵: ذخیره در localStorage ──
                const finalOutput = {
                    meta: {
                        bookName,
                        grade,
                        field,
                        chapter,
                        schoolName,
                        teacherName,
                        generatedAt: new Date().toISOString(),
                        sourceFile: bookUrl,
                    },
                    questions: parsed.questions
                };
                localStorage.setItem('ai_quiz_output', JSON.stringify(finalOutput, null, 2));

                // ── مرحله ۶: نمایش سوالات ──
                displayQuestions(parsed.questions, schoolName, teacherName, finalOutput.meta);
                showAlert(`✅ ${parsed.questions.length} سوال تولید شد!`, 'success');

            } catch (err) {
                console.error(err);
                showAlert('❌ ' + err.message, 'danger');
            } finally {
                submitBtn.disabled = false;
                loading.style.display = 'none';

                const alertEl = document.getElementById('alertContainer');
                if (alertEl) alertEl.style.display = '';
            }
        });


        // ══ فیلتر ورودی فصل — عدد + کاما ══════════════════════════
        const chapterInput = document.getElementById('chapter');

        chapterInput.addEventListener('keydown', function(e) {
            const allowed = ['Backspace', 'Delete', 'Tab', 'Enter', 'Escape', 'Home', 'End', 'ArrowLeft',
                'ArrowRight'
            ];
            if (allowed.includes(e.key) || e.ctrlKey || e.metaKey) return;

            if (e.key === ' ' || e.key === '-') {
                e.preventDefault();
                insertComma(this);
                return;
            }

            if (!/[\d,]/.test(e.key)) e.preventDefault();
        });

        chapterInput.addEventListener('input', function() {
            const pos = this.selectionStart;
            let val = this.value;

            val = val.replace(/[^\d,]/g, ',');
            val = val.replace(/,{2,}/g, ',');
            val = val.replace(/^,/, '');

            this.value = val;
            this.setSelectionRange(pos, pos);
        });

        chapterInput.addEventListener('blur', function() {
            this.value = this.value.replace(/,$/, '');
        });

        function insertComma(input) {
            const pos = input.selectionStart;
            const val = input.value;
            if (val[pos - 1] === ',' || val.length === 0) return;
            input.value = val.slice(0, pos) + ',' + val.slice(pos);
            input.setSelectionRange(pos + 1, pos + 1);
        }
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
        /* ═══════════════════════════════════════════════════════════════
       BOOKS DATABASE — همگام با BOOKS پایتون
       مسیر لوکال: asset/ketabhaye_darsi_txt_1404-1405/...
    ═══════════════════════════════════════════════════════════════ */

        // تابع کمکی برای ساخت URL لوکال
        const localPath = (folder, filename) =>
            `{{ asset('asset/ketabhaye_darsi_txt_1404-1405/${folder}/${filename}.txt') }}`;

        const BOOKS_DB = {

            /* ═══════════════════════════════════════════
               پایه اول ابتدایی
               ═══════════════════════════════════════════ */
            g1: [{
                    name: "آموزش قرآن (اول)",
                    url: localPath("ebtedaei/paye_1_avval", "amoozesh_quran_avval")
                },
                {
                    name: "فارسی (اول)",
                    url: localPath("ebtedaei/paye_1_avval", "farsi_avval")
                },
                {
                    name: "نگارش فارسی (اول)",
                    url: localPath("ebtedaei/paye_1_avval", "negaresh_farsi_avval")
                },
                {
                    name: "ریاضی (اول)",
                    url: localPath("ebtedaei/paye_1_avval", "riazi_avval")
                },
                {
                    name: "فارسی می‌نویسم (اول)",
                    url: localPath("ebtedaei/paye_1_avval", "farsi_minevisam_avval")
                },
                {
                    name: "فارسی می‌خوانم (اول)",
                    url: localPath("ebtedaei/paye_1_avval", "farsi_mikhoonam_avval")
                },
                {
                    name: "علوم تجربی (اول)",
                    url: localPath("ebtedaei/paye_1_avval", "oloom_avval")
                },
                {
                    name: "حرکت و بازی (اول)",
                    url: localPath("ebtedaei/paye_1_avval", "harekat_bazi_avval")
                },
                {
                    name: "حجاب پیرامون (اول)",
                    url: localPath("ebtedaei/paye_1_avval", "hejab_piramon_avval")
                },
                {
                    name: "ریاضی دوست‌داشتنی (اول)",
                    url: localPath("ebtedaei/paye_1_avval", "riazi_doostdashtani_avval")
                },
            ],

            /* ═══════════════════════════════════════════
               پایه دوم ابتدایی
               ═══════════════════════════════════════════ */
            g2: [{
                    name: "نگارش فارسی (دوم)",
                    url: localPath("ebtedaei/paye_2_dovvom", "negaresh_farsi_dovvom")
                },
                {
                    name: "فارسی (دوم)",
                    url: localPath("ebtedaei/paye_2_dovvom", "farsi_dovvom")
                },
                {
                    name: "هدیه‌های آسمان (دوم)",
                    url: localPath("ebtedaei/paye_2_dovvom", "hadiye_aseman_dovvom")
                },
                {
                    name: "آموزش قرآن (دوم)",
                    url: localPath("ebtedaei/paye_2_dovvom", "amoozesh_quran_dovvom")
                },
                {
                    name: "علوم تجربی (دوم)",
                    url: localPath("ebtedaei/paye_2_dovvom", "oloom_dovvom")
                },
                {
                    name: "ریاضی (دوم)",
                    url: localPath("ebtedaei/paye_2_dovvom", "riazi_dovvom")
                },
                {
                    name: "ضمیمه هدیه‌های آسمان (دوم) — ۱",
                    url: localPath("ebtedaei/paye_2_dovvom", "zamime_hadiye_aseman_dovvom_1")
                },
                {
                    name: "ضمیمه هدیه‌های آسمان (دوم) — ۲",
                    url: localPath("ebtedaei/paye_2_dovvom", "zamime_hadiye_aseman_dovvom_2")
                },
            ],

            /* ═══════════════════════════════════════════
               پایه سوم ابتدایی
               ═══════════════════════════════════════════ */
            g3: [{
                    name: "نگارش فارسی (سوم)",
                    url: localPath("ebtedaei/paye_3_sevvom", "negaresh_farsi_sevvom")
                },
                {
                    name: "فارسی (سوم)",
                    url: localPath("ebtedaei/paye_3_sevvom", "farsi_sevvom")
                },
                {
                    name: "هدیه‌های آسمان (سوم)",
                    url: localPath("ebtedaei/paye_3_sevvom", "hadiye_aseman_sevvom")
                },
                {
                    name: "آموزش قرآن (سوم)",
                    url: localPath("ebtedaei/paye_3_sevvom", "amoozesh_quran_sevvom")
                },
                {
                    name: "مطالعات اجتماعی (سوم)",
                    url: localPath("ebtedaei/paye_3_sevvom", "motaleaat_sevvom")
                },
                {
                    name: "علوم تجربی (سوم)",
                    url: localPath("ebtedaei/paye_3_sevvom", "oloom_sevvom")
                },
                {
                    name: "ریاضی (سوم)",
                    url: localPath("ebtedaei/paye_3_sevvom", "riazi_sevvom")
                },
                {
                    name: "ضمیمه هدیه‌های آسمان (سوم)",
                    url: localPath("ebtedaei/paye_3_sevvom", "zamime_hadiye_aseman_sevvom")
                },
            ],

            /* ═══════════════════════════════════════════
               پایه چهارم ابتدایی
               ═══════════════════════════════════════════ */
            g4: [{
                    name: "فارسی (چهارم)",
                    url: localPath("ebtedaei/paye_4_chaharom", "farsi_chaharom")
                },
                {
                    name: "هدیه‌های آسمان (چهارم)",
                    url: localPath("ebtedaei/paye_4_chaharom", "hadiye_aseman_chaharom")
                },
                {
                    name: "آموزش قرآن (چهارم)",
                    url: localPath("ebtedaei/paye_4_chaharom", "amoozesh_quran_chaharom")
                },
                {
                    name: "از ایرانمان دفاع می‌کنیم (چهارم)",
                    url: localPath("ebtedaei/paye_4_chaharom", "az_iranman_defa_chaharom")
                },
                {
                    name: "مطالعات اجتماعی (چهارم)",
                    url: localPath("ebtedaei/paye_4_chaharom", "motaleaat_chaharom")
                },
                {
                    name: "علوم تجربی (چهارم)",
                    url: localPath("ebtedaei/paye_4_chaharom", "oloom_chaharom")
                },
                {
                    name: "ریاضی (چهارم)",
                    url: localPath("ebtedaei/paye_4_chaharom", "riazi_chaharom")
                },
                {
                    name: "نگارش فارسی (چهارم)",
                    url: localPath("ebtedaei/paye_4_chaharom", "negaresh_farsi_chaharom")
                },
                {
                    name: "ضمیمه هدیه‌های آسمان (چهارم)",
                    url: localPath("ebtedaei/paye_4_chaharom", "zamime_hadiye_chaharom")
                },
                {
                    name: "کتاب کار آموزش خط (چهارم)",
                    url: localPath("ebtedaei/paye_4_chaharom", "ketabkar_khat_chaharom")
                },
            ],

            /* ═══════════════════════════════════════════
               پایه پنجم ابتدایی
               ═══════════════════════════════════════════ */
            g5: [{
                    name: "فارسی (پنجم)",
                    url: localPath("ebtedaei/paye_5_panjom", "farsi_panjom")
                },
                {
                    name: "هدیه‌های آسمان (پنجم)",
                    url: localPath("ebtedaei/paye_5_panjom", "hadiye_aseman_panjom")
                },
                {
                    name: "آموزش قرآن (پنجم)",
                    url: localPath("ebtedaei/paye_5_panjom", "amoozesh_quran_panjom")
                },
                {
                    name: "از ایرانمان دفاع می‌کنیم (پنجم)",
                    url: localPath("ebtedaei/paye_5_panjom", "az_iranman_defa_panjom")
                },
                {
                    name: "علوم تجربی (پنجم)",
                    url: localPath("ebtedaei/paye_5_panjom", "oloom_panjom")
                },
                {
                    name: "ریاضی (پنجم)",
                    url: localPath("ebtedaei/paye_5_panjom", "riazi_panjom")
                },
                {
                    name: "نگارش فارسی (پنجم)",
                    url: localPath("ebtedaei/paye_5_panjom", "negaresh_farsi_panjom")
                },
                {
                    name: "مطالعات اجتماعی (پنجم)",
                    url: localPath("ebtedaei/paye_5_panjom", "motaleaat_panjom")
                },
                {
                    name: "ضمیمه هدیه‌های آسمان (پنجم)",
                    url: localPath("ebtedaei/paye_5_panjom", "zamime_hadiye_panjom")
                },
                {
                    name: "کتاب کار آموزش خط (پنجم)",
                    url: localPath("ebtedaei/paye_5_panjom", "ketabkar_khat_panjom")
                },
            ],

            /* ═══════════════════════════════════════════
               پایه ششم ابتدایی
               ═══════════════════════════════════════════ */
            g6: [{
                    name: "فارسی (ششم)",
                    url: localPath("ebtedaei/paye_6_sheshom", "farsi_sheshom")
                },
                {
                    name: "هدیه‌های آسمان (ششم)",
                    url: localPath("ebtedaei/paye_6_sheshom", "hadiye_aseman_sheshom")
                },
                {
                    name: "آموزش قرآن (ششم)",
                    url: localPath("ebtedaei/paye_6_sheshom", "amoozesh_quran_sheshom")
                },
                {
                    name: "از ایرانمان دفاع می‌کنیم (ششم)",
                    url: localPath("ebtedaei/paye_6_sheshom", "az_iranman_defa_sheshom")
                },
                {
                    name: "مطالعات اجتماعی (ششم)",
                    url: localPath("ebtedaei/paye_6_sheshom", "motaleaat_sheshom")
                },
                {
                    name: "علوم تجربی (ششم)",
                    url: localPath("ebtedaei/paye_6_sheshom", "oloom_sheshom")
                },
                {
                    name: "ریاضی (ششم)",
                    url: localPath("ebtedaei/paye_6_sheshom", "riazi_sheshom")
                },
                {
                    name: "نگارش فارسی (ششم)",
                    url: localPath("ebtedaei/paye_6_sheshom", "negaresh_farsi_sheshom")
                },
                {
                    name: "ضمیمه پیام‌های آسمان (ششم)",
                    url: localPath("ebtedaei/paye_6_sheshom", "zamime_payam_aseman_sheshom")
                },
                {
                    name: "کار و فناوری (ششم)",
                    url: localPath("ebtedaei/paye_6_sheshom", "kar_fanavari_sheshom")
                },
                {
                    name: "تفکر و پژوهش (ششم)",
                    url: localPath("ebtedaei/paye_6_sheshom", "tafakkor_pajoohesh_sheshom")
                },
                {
                    name: "کتاب کار آموزش خط (ششم)",
                    url: localPath("ebtedaei/paye_6_sheshom", "ketabkar_khat_sheshom")
                },
                {
                    name: "ضمیمه هدیه‌های آسمان (ششم)",
                    url: localPath("ebtedaei/paye_6_sheshom", "zamime_hadiye_sheshom")
                },
            ],

            /* ═══════════════════════════════════════════
               پایه هفتم (متوسطه اول)
               ═══════════════════════════════════════════ */
            g7: [{
                    name: "آموزش قرآن (هفتم)",
                    url: localPath("motavassete_avval/paye_7_haftom", "amoozesh_quran_haftom")
                },
                {
                    name: "پیام‌های آسمان (هفتم)",
                    url: localPath("motavassete_avval/paye_7_haftom", "payam_aseman_haftom")
                },
                {
                    name: "فارسی (هفتم)",
                    url: localPath("motavassete_avval/paye_7_haftom", "farsi_haftom")
                },
                {
                    name: "فرهنگ و هنر (هفتم)",
                    url: localPath("motavassete_avval/paye_7_haftom", "farhang_honar_haftom")
                },
                {
                    name: "مطالعات اجتماعی (هفتم)",
                    url: localPath("motavassete_avval/paye_7_haftom", "motaleaat_haftom")
                },
                {
                    name: "علوم تجربی (هفتم)",
                    url: localPath("motavassete_avval/paye_7_haftom", "oloom_haftom")
                },
                {
                    name: "ریاضی (هفتم)",
                    url: localPath("motavassete_avval/paye_7_haftom", "riazi_haftom")
                },
                {
                    name: "تفکر و سبک زندگی (دختران) — هفتم",
                    url: localPath("motavassete_avval/paye_7_haftom", "tafakkor_dokhtaran_haftom")
                },
                {
                    name: "انگلیسی (هفتم)",
                    url: localPath("motavassete_avval/paye_7_haftom", "englisi_haftom")
                },
                {
                    name: "کار و فناوری (هفتم)",
                    url: localPath("motavassete_avval/paye_7_haftom", "kar_fanavari_haftom")
                },
                {
                    name: "عربی (هفتم)",
                    url: localPath("motavassete_avval/paye_7_haftom", "arabi_haftom")
                },
                {
                    name: "تفکر و سبک زندگی (پسران) — هفتم",
                    url: localPath("motavassete_avval/paye_7_haftom", "tafakkor_pesaran_haftom")
                },
                {
                    name: "ضمیمه پیام‌های آسمان (هفتم)",
                    url: localPath("motavassete_avval/paye_7_haftom", "zamime_payam_haftom")
                },
                {
                    name: "علوم تجربی (ویژه) — هفتم",
                    url: localPath("motavassete_avval/paye_7_haftom", "oloom_vizhe_haftom")
                },
                {
                    name: "ریاضی (ویژه) — هفتم",
                    url: localPath("motavassete_avval/paye_7_haftom", "riazi_vizhe_haftom")
                },
                {
                    name: "فارسی (ویژه) — هفتم",
                    url: localPath("motavassete_avval/paye_7_haftom", "farsi_vizhe_haftom")
                },
                {
                    name: "تعلیمات ادیان الهی (ویژه) — هفتم",
                    url: localPath("motavassete_avval/paye_7_haftom", "adyan_vizhe_haftom")
                },
                {
                    name: "از ایرانمان دفاع می‌کنیم (هفتم)",
                    url: localPath("motavassete_avval/paye_7_haftom", "az_iranman_defa_haftom")
                },
                {
                    name: "ضمیمه از من تا خدا (هفتم)",
                    url: localPath("motavassete_avval/paye_7_haftom", "zamime_az_man_ta_khoda")
                },
                {
                    name: "تربیت دینی (هفتم)",
                    url: localPath("motavassete_avval/paye_7_haftom", "tarbiat_dini_haftom")
                },
            ],

            /* ═══════════════════════════════════════════
               پایه هشتم (متوسطه اول)
               ═══════════════════════════════════════════ */
            g8: [{
                    name: "از ایرانمان دفاع می‌کنیم (هشتم)",
                    url: localPath("motavassete_avval/paye_8_hashtom", "az_iranman_defa_hashtom")
                },
                {
                    name: "آموزش قرآن (هشتم)",
                    url: localPath("motavassete_avval/paye_8_hashtom", "amoozesh_quran_hashtom")
                },
                {
                    name: "پیام‌های آسمان (هشتم)",
                    url: localPath("motavassete_avval/paye_8_hashtom", "payam_aseman_hashtom")
                },
                {
                    name: "فارسی (هشتم)",
                    url: localPath("motavassete_avval/paye_8_hashtom", "farsi_hashtom")
                },
                {
                    name: "مطالعات اجتماعی (هشتم)",
                    url: localPath("motavassete_avval/paye_8_hashtom", "motaleaat_hashtom")
                },
                {
                    name: "علوم تجربی (هشتم)",
                    url: localPath("motavassete_avval/paye_8_hashtom", "oloom_hashtom")
                },
                {
                    name: "ریاضی (هشتم)",
                    url: localPath("motavassete_avval/paye_8_hashtom", "riazi_hashtom")
                },
                {
                    name: "نگارش (هشتم)",
                    url: localPath("motavassete_avval/paye_8_hashtom", "negaresh_hashtom")
                },
                {
                    name: "کتاب کار انگلیسی (هشتم)",
                    url: localPath("motavassete_avval/paye_8_hashtom", "ketabkar_englisi_hashtom")
                },
                {
                    name: "انگلیسی (هشتم)",
                    url: localPath("motavassete_avval/paye_8_hashtom", "englisi_hashtom")
                },
                {
                    name: "عربی (هشتم)",
                    url: localPath("motavassete_avval/paye_8_hashtom", "arabi_hashtom")
                },
                {
                    name: "فرهنگ و هنر (هشتم)",
                    url: localPath("motavassete_avval/paye_8_hashtom", "farhang_honar_hashtom")
                },
                {
                    name: "کار و فناوری (هشتم)",
                    url: localPath("motavassete_avval/paye_8_hashtom", "kar_fanavari_hashtom")
                },
                {
                    name: "تفکر و سبک زندگی (دختران) — هشتم",
                    url: localPath("motavassete_avval/paye_8_hashtom", "tafakkor_dokhtaran_hashtom")
                },
                {
                    name: "تفکر و سبک زندگی (پسران) — هشتم",
                    url: localPath("motavassete_avval/paye_8_hashtom", "tafakkor_pesaran_hashtom")
                },
                {
                    name: "فارسی (ویژه) — هشتم",
                    url: localPath("motavassete_avval/paye_8_hashtom", "farsi_vizhe_hashtom")
                },
                {
                    name: "تعلیمات ادیان الهی (ویژه) — هشتم",
                    url: localPath("motavassete_avval/paye_8_hashtom", "adyan_vizhe_hashtom")
                },
                {
                    name: "ضمیمه پیام‌های آسمان (هشتم)",
                    url: localPath("motavassete_avval/paye_8_hashtom", "zamime_payam_hashtom")
                },
                {
                    name: "تربیت دینی (ضمیمه) — هشتم",
                    url: localPath("motavassete_avval/paye_8_hashtom", "tarbiat_dini_zamime_hashtom")
                },
                {
                    name: "از من تا خدا (هشتم)",
                    url: localPath("motavassete_avval/paye_8_hashtom", "az_man_ta_khoda_hashtom")
                },
                {
                    name: "علوم تجربی (ویژه) — هشتم",
                    url: localPath("motavassete_avval/paye_8_hashtom", "oloom_vizhe_hashtom")
                },
            ],

            /* ═══════════════════════════════════════════
               پایه نهم (متوسطه اول)
               ═══════════════════════════════════════════ */
            g9: [{
                    name: "از ایرانمان دفاع می‌کنیم (نهم)",
                    url: localPath("motavassete_avval/paye_9_nohom", "az_iranman_defa_nohom")
                },
                {
                    name: "آموزش قرآن (نهم)",
                    url: localPath("motavassete_avval/paye_9_nohom", "amoozesh_quran_nohom")
                },
                {
                    name: "پیام‌های آسمان (نهم)",
                    url: localPath("motavassete_avval/paye_9_nohom", "payam_aseman_nohom")
                },
                {
                    name: "فارسی (نهم)",
                    url: localPath("motavassete_avval/paye_9_nohom", "farsi_nohom")
                },
                {
                    name: "مطالعات اجتماعی (نهم)",
                    url: localPath("motavassete_avval/paye_9_nohom", "motaleaat_nohom")
                },
                {
                    name: "علوم تجربی (نهم)",
                    url: localPath("motavassete_avval/paye_9_nohom", "oloom_nohom")
                },
                {
                    name: "ریاضی (نهم)",
                    url: localPath("motavassete_avval/paye_9_nohom", "riazi_nohom")
                },
                {
                    name: "نگارش (نهم)",
                    url: localPath("motavassete_avval/paye_9_nohom", "negaresh_nohom")
                },
                {
                    name: "کتاب کار انگلیسی (نهم)",
                    url: localPath("motavassete_avval/paye_9_nohom", "ketabkar_englisi_nohom")
                },
                {
                    name: "انگلیسی (نهم)",
                    url: localPath("motavassete_avval/paye_9_nohom", "englisi_nohom")
                },
                {
                    name: "عربی (نهم)",
                    url: localPath("motavassete_avval/paye_9_nohom", "arabi_nohom")
                },
                {
                    name: "فرهنگ و هنر (نهم)",
                    url: localPath("motavassete_avval/paye_9_nohom", "farhang_honar_nohom")
                },
                {
                    name: "آمادگی دفاعی (نهم)",
                    url: localPath("motavassete_avval/paye_9_nohom", "amadegi_defaei_nohom")
                },
                {
                    name: "کار و فناوری (نهم)",
                    url: localPath("motavassete_avval/paye_9_nohom", "kar_fanavari_nohom")
                },
                {
                    name: "علوم تجربی (ویژه) — نهم",
                    url: localPath("motavassete_avval/paye_9_nohom", "oloom_vizhe_nohom")
                },
                {
                    name: "ریاضی (ویژه) — نهم",
                    url: localPath("motavassete_avval/paye_9_nohom", "riazi_vizhe_nohom")
                },
                {
                    name: "فارسی (ویژه) — نهم",
                    url: localPath("motavassete_avval/paye_9_nohom", "farsi_vizhe_nohom")
                },
                {
                    name: "تعلیمات ادیان الهی (ویژه) — نهم",
                    url: localPath("motavassete_avval/paye_9_nohom", "adyan_vizhe_nohom")
                },
            ],

            /* ═══════════════════════════════════════════
               پایه دهم — ریاضی فیزیک
               ═══════════════════════════════════════════ */
            g10_riazi_fizik: [{
                    name: "عربی، زبان قرآن (۱)",
                    url: localPath("motavassete_dovvom/paye_10_dahom/riazi_fizik", "arabi_1_riazi")
                },
                {
                    name: "دین و زندگی (۱)",
                    url: localPath("motavassete_dovvom/paye_10_dahom/riazi_fizik", "din_zendegi_1_riazi")
                },
                {
                    name: "نگارش (۱)",
                    url: localPath("motavassete_dovvom/paye_10_dahom/riazi_fizik", "negaresh_1_riazi")
                },
                {
                    name: "فارسی (۱)",
                    url: localPath("motavassete_dovvom/paye_10_dahom/riazi_fizik", "farsi_1_riazi")
                },
                {
                    name: "هندسه (۱)",
                    url: localPath("motavassete_dovvom/paye_10_dahom/riazi_fizik", "hendese_1")
                },
                {
                    name: "ریاضی (۱)",
                    url: localPath("motavassete_dovvom/paye_10_dahom/riazi_fizik", "riazi_1_riazi")
                },
                {
                    name: "فیزیک (۱)",
                    url: localPath("motavassete_dovvom/paye_10_dahom/riazi_fizik", "fizik_1_riazi")
                },
                {
                    name: "آزمایشگاه علوم (۱)",
                    url: localPath("motavassete_dovvom/paye_10_dahom/riazi_fizik", "azmayeshgah_1_riazi")
                },
                {
                    name: "آمادگی دفاعی",
                    url: localPath("motavassete_dovvom/paye_10_dahom/riazi_fizik", "amadegi_defaei_dahom_riazi")
                },
                {
                    name: "انگلیسی (۱)",
                    url: localPath("motavassete_dovvom/paye_10_dahom/riazi_fizik", "englisi_1_riazi")
                },
                {
                    name: "تعلیمات ادیان الهی (۱)",
                    url: localPath("motavassete_dovvom/paye_10_dahom/riazi_fizik", "adyan_1_riazi")
                },
                {
                    name: "تفکر و سواد رسانه‌ای",
                    url: localPath("motavassete_dovvom/paye_10_dahom/riazi_fizik", "tafakkor_savad_rasaneyi_riazi")
                },
                {
                    name: "کارگاه کارآفرینی",
                    url: localPath("motavassete_dovvom/paye_10_dahom/riazi_fizik", "kargah_karafariini_riazi")
                },
                {
                    name: "از ایرانمان دفاع می‌کنیم",
                    url: localPath("motavassete_dovvom/paye_10_dahom/riazi_fizik", "az_iranman_defa_riazi")
                },
            ],

            /* ═══════════════════════════════════════════
               پایه دهم — علوم تجربی
               ═══════════════════════════════════════════ */
            g10_tajrobi: [{
                    name: "عربی، زبان قرآن (۱)",
                    url: localPath("motavassete_dovvom/paye_10_dahom/oloom_tajrobi", "arabi_1_tajrobi")
                },
                {
                    name: "دین و زندگی (۱)",
                    url: localPath("motavassete_dovvom/paye_10_dahom/oloom_tajrobi", "din_zendegi_1_tajrobi")
                },
                {
                    name: "نگارش (۱)",
                    url: localPath("motavassete_dovvom/paye_10_dahom/oloom_tajrobi", "negaresh_1_tajrobi")
                },
                {
                    name: "فارسی (۱)",
                    url: localPath("motavassete_dovvom/paye_10_dahom/oloom_tajrobi", "farsi_1_tajrobi")
                },
                {
                    name: "آمادگی دفاعی",
                    url: localPath("motavassete_dovvom/paye_10_dahom/oloom_tajrobi", "amadegi_defaei_tajrobi")
                },
                {
                    name: "فیزیک (۱)",
                    url: localPath("motavassete_dovvom/paye_10_dahom/oloom_tajrobi", "fizik_1_tajrobi")
                },
                {
                    name: "ریاضی (۱)",
                    url: localPath("motavassete_dovvom/paye_10_dahom/oloom_tajrobi", "riazi_1_tajrobi")
                },
                {
                    name: "شیمی (۱)",
                    url: localPath("motavassete_dovvom/paye_10_dahom/oloom_tajrobi", "shimi_1_tajrobi")
                },
                {
                    name: "آزمایشگاه علوم (۱)",
                    url: localPath("motavassete_dovvom/paye_10_dahom/oloom_tajrobi", "azmayeshgah_1_tajrobi")
                },
                {
                    name: "زمین‌شناسی (۱)",
                    url: localPath("motavassete_dovvom/paye_10_dahom/oloom_tajrobi", "zaminshenaasi_1")
                },
                {
                    name: "انگلیسی (۱)",
                    url: localPath("motavassete_dovvom/paye_10_dahom/oloom_tajrobi", "englisi_1_tajrobi")
                },
                {
                    name: "تعلیمات ادیان الهی (۱)",
                    url: localPath("motavassete_dovvom/paye_10_dahom/oloom_tajrobi", "adyan_1_tajrobi")
                },
                {
                    name: "تفکر و سواد رسانه‌ای",
                    url: localPath("motavassete_dovvom/paye_10_dahom/oloom_tajrobi",
                        "tafakkor_savad_rasaneyi_tajrobi")
                },
                {
                    name: "کارگاه کارآفرینی",
                    url: localPath("motavassete_dovvom/paye_10_dahom/oloom_tajrobi", "kargah_karafariini_tajrobi")
                },
                {
                    name: "از ایرانمان دفاع می‌کنیم",
                    url: localPath("motavassete_dovvom/paye_10_dahom/oloom_tajrobi", "az_iranman_defa_tajrobi")
                },
            ],

            /* ═══════════════════════════════════════════
               پایه دهم — ادبیات و علوم انسانی
               ═══════════════════════════════════════════ */
            g10_ensani: [{
                    name: "دین و زندگی (۱)",
                    url: localPath("motavassete_dovvom/paye_10_dahom/oloom_ensani", "din_zendegi_1_ensani")
                },
                {
                    name: "علوم و فنون ادبی (۱)",
                    url: localPath("motavassete_dovvom/paye_10_dahom/oloom_ensani", "oloom_fonon_adabi_1")
                },
                {
                    name: "نگارش (۱)",
                    url: localPath("motavassete_dovvom/paye_10_dahom/oloom_ensani", "negaresh_1_ensani")
                },
                {
                    name: "فارسی (۱)",
                    url: localPath("motavassete_dovvom/paye_10_dahom/oloom_ensani", "farsi_1_ensani")
                },
                {
                    name: "جغرافیای ایران",
                    url: localPath("motavassete_dovvom/paye_10_dahom/oloom_ensani", "joghrafiyaye_iran")
                },
                {
                    name: "آمادگی دفاعی",
                    url: localPath("motavassete_dovvom/paye_10_dahom/oloom_ensani", "amadegi_defaei_ensani")
                },
                {
                    name: "ریاضی و آمار (۱)",
                    url: localPath("motavassete_dovvom/paye_10_dahom/oloom_ensani", "riazi_amar_1")
                },
                {
                    name: "عربی، زبان قرآن (۱)",
                    url: localPath("motavassete_dovvom/paye_10_dahom/oloom_ensani", "arabi_1_ensani")
                },
                {
                    name: "اقتصاد",
                    url: localPath("motavassete_dovvom/paye_10_dahom/oloom_ensani", "eghtesad")
                },
                {
                    name: "جامعه‌شناسی (۱)",
                    url: localPath("motavassete_dovvom/paye_10_dahom/oloom_ensani", "jameeshenaasi_1")
                },
                {
                    name: "تاریخ (۱) ایران و جهان",
                    url: localPath("motavassete_dovvom/paye_10_dahom/oloom_ensani", "tarikh_1_iran_jahan")
                },
                {
                    name: "تفکر و سواد رسانه‌ای",
                    url: localPath("motavassete_dovvom/paye_10_dahom/oloom_ensani",
                        "tafakkor_savad_rasaneyi_ensani")
                },
                {
                    name: "منطق",
                    url: localPath("motavassete_dovvom/paye_10_dahom/oloom_ensani", "manteg")
                },
                {
                    name: "تعلیمات ادیان الهی (۱)",
                    url: localPath("motavassete_dovvom/paye_10_dahom/oloom_ensani", "adyan_1_ensani")
                },
                {
                    name: "از ایرانمان دفاع می‌کنیم",
                    url: localPath("motavassete_dovvom/paye_10_dahom/oloom_ensani", "az_iranman_defa_ensani")
                },
                {
                    name: "انگلیسی (۱)",
                    url: localPath("motavassete_dovvom/paye_10_dahom/oloom_ensani", "englisi_1_ensani")
                },
            ],

            /* ═══════════════════════════════════════════
               پایه دهم — علوم و معارف اسلامی
               ═══════════════════════════════════════════ */
            g10_maaref: [{
                    name: "عربی، زبان قرآن (۱)",
                    url: localPath("motavassete_dovvom/paye_10_dahom/maaref_eslami", "arabi_1_maaref")
                },
                {
                    name: "علوم و فنون ادبی (۱)",
                    url: localPath("motavassete_dovvom/paye_10_dahom/maaref_eslami", "oloom_fonon_adabi_1_maaref")
                },
                {
                    name: "نگارش (۱)",
                    url: localPath("motavassete_dovvom/paye_10_dahom/maaref_eslami", "negaresh_1_maaref")
                },
                {
                    name: "فارسی (۱)",
                    url: localPath("motavassete_dovvom/paye_10_dahom/maaref_eslami", "farsi_1_maaref")
                },
                {
                    name: "جامعه‌شناسی (۱)",
                    url: localPath("motavassete_dovvom/paye_10_dahom/maaref_eslami", "jameeshenaasi_1_maaref")
                },
                {
                    name: "جغرافیای ایران",
                    url: localPath("motavassete_dovvom/paye_10_dahom/maaref_eslami", "joghrafiyaye_iran_maaref")
                },
                {
                    name: "آمادگی دفاعی",
                    url: localPath("motavassete_dovvom/paye_10_dahom/maaref_eslami", "amadegi_defaei_maaref")
                },
                {
                    name: "ریاضی و آمار (۱)",
                    url: localPath("motavassete_dovvom/paye_10_dahom/maaref_eslami", "riazi_amar_1_maaref")
                },
                {
                    name: "اقتصاد",
                    url: localPath("motavassete_dovvom/paye_10_dahom/maaref_eslami", "eghtesad_maaref")
                },
                {
                    name: "کارگاه کارآفرینی",
                    url: localPath("motavassete_dovvom/paye_10_dahom/maaref_eslami", "kargah_karafariini_maaref")
                },
                {
                    name: "منطق",
                    url: localPath("motavassete_dovvom/paye_10_dahom/maaref_eslami", "manteg_maaref")
                },
                {
                    name: "انگلیسی (۱)",
                    url: localPath("motavassete_dovvom/paye_10_dahom/maaref_eslami", "englisi_1_maaref")
                },
                {
                    name: "اصول عقاید (۱)",
                    url: localPath("motavassete_dovvom/paye_10_dahom/maaref_eslami", "osool_aghaed_1")
                },
                {
                    name: "احکام (۱) پسران",
                    url: localPath("motavassete_dovvom/paye_10_dahom/maaref_eslami", "ahkam_1_pesaran")
                },
                {
                    name: "تفکر و سواد رسانه‌ای",
                    url: localPath("motavassete_dovvom/paye_10_dahom/maaref_eslami",
                        "tafakkor_savad_rasaneyi_maaref")
                },
                {
                    name: "تاریخ اسلام (۱)",
                    url: localPath("motavassete_dovvom/paye_10_dahom/maaref_eslami", "tarikh_eslam_1")
                },
                {
                    name: "علوم و معارف قرآنی (۱)",
                    url: localPath("motavassete_dovvom/paye_10_dahom/maaref_eslami", "oloom_maaref_qurani_1")
                },
                {
                    name: "اخلاق اسلامی (۱)",
                    url: localPath("motavassete_dovvom/paye_10_dahom/maaref_eslami", "akhlagh_eslami_1")
                },
                {
                    name: "از ایرانمان دفاع می‌کنیم",
                    url: localPath("motavassete_dovvom/paye_10_dahom/maaref_eslami", "az_iranman_defa_maaref")
                },
                {
                    name: "احکام (۱) در دسترس",
                    url: localPath("motavassete_dovvom/paye_10_dahom/maaref_eslami", "ahkam_1_dastras")
                },
            ],

            /* ═══════════════════════════════════════════
               پایه دهم — فنی و حرفه‌ای
               ═══════════════════════════════════════════ */
            g10_fanni: [{
                    name: "از ایرانمان دفاع می‌کنیم",
                    url: localPath("motavassete_dovvom/paye_10_dahom/fanni_herfei", "az_iranman_defa_fanni")
                },
                {
                    name: "تعلیمات ادیان الهی (۱)",
                    url: localPath("motavassete_dovvom/paye_10_dahom/fanni_herfei", "adyan_1_fanni")
                },
                {
                    name: "جغرافیای ایران",
                    url: localPath("motavassete_dovvom/paye_10_dahom/fanni_herfei", "joghrafiyaye_iran_fanni")
                },
                {
                    name: "دین و زندگی (۱)",
                    url: localPath("motavassete_dovvom/paye_10_dahom/fanni_herfei", "din_zendegi_1_fanni")
                },
                {
                    name: "الزامات محیط کار",
                    url: localPath("motavassete_dovvom/paye_10_dahom/fanni_herfei", "elzamat_mohit_kar")
                },
                {
                    name: "انگلیسی (۱)",
                    url: localPath("motavassete_dovvom/paye_10_dahom/fanni_herfei", "englisi_1_fanni")
                },
                {
                    name: "فارسی و نگارش (۱)",
                    url: localPath("motavassete_dovvom/paye_10_dahom/fanni_herfei", "farsi_negaresh_1_fanni")
                },
                {
                    name: "عربی، زبان قرآن (۱)",
                    url: localPath("motavassete_dovvom/paye_10_dahom/fanni_herfei", "arabi_1_fanni")
                },
                {
                    name: "هوش مصنوعی",
                    url: localPath("motavassete_dovvom/paye_10_dahom/fanni_herfei", "hoosh_masnooi")
                },
                {
                    name: "ریاضی (۱)",
                    url: localPath("motavassete_dovvom/paye_10_dahom/fanni_herfei", "riazi_1_fanni")
                },
            ],

            /* ═══════════════════════════════════════════
               پایه دهم — کار و دانش
               ═══════════════════════════════════════════ */
            g10_kardanesh: [{
                    name: "از ایرانمان دفاع می‌کنیم",
                    url: localPath("motavassete_dovvom/paye_10_dahom/kar_danesh", "az_iranman_defa_kardanesh")
                },
                {
                    name: "تعلیمات ادیان الهی (۱)",
                    url: localPath("motavassete_dovvom/paye_10_dahom/kar_danesh", "adyan_1_kardanesh")
                },
                {
                    name: "جغرافیای ایران",
                    url: localPath("motavassete_dovvom/paye_10_dahom/kar_danesh", "joghrafiyaye_iran_kardanesh")
                },
                {
                    name: "دین و زندگی (۱)",
                    url: localPath("motavassete_dovvom/paye_10_dahom/kar_danesh", "din_zendegi_1_kardanesh")
                },
                {
                    name: "الزامات محیط کار",
                    url: localPath("motavassete_dovvom/paye_10_dahom/kar_danesh", "elzamat_mohit_kar_kardanesh")
                },
                {
                    name: "انگلیسی (۱)",
                    url: localPath("motavassete_dovvom/paye_10_dahom/kar_danesh", "englisi_1_kardanesh")
                },
                {
                    name: "فارسی و نگارش (۱)",
                    url: localPath("motavassete_dovvom/paye_10_dahom/kar_danesh", "farsi_negaresh_1_kardanesh")
                },
                {
                    name: "عربی، زبان قرآن (۱)",
                    url: localPath("motavassete_dovvom/paye_10_dahom/kar_danesh", "arabi_1_kardanesh")
                },
                {
                    name: "هوش مصنوعی",
                    url: localPath("motavassete_dovvom/paye_10_dahom/kar_danesh", "hoosh_masnooi_kardanesh")
                },
            ],

            /* ═══════════════════════════════════════════
               پایه یازدهم — ریاضی فیزیک
               ═══════════════════════════════════════════ */
            g11_riazi_fizik: [{
                    name: "دین و زندگی (۲)",
                    url: localPath("motavassete_dovvom/paye_11_yazdahom/riazi_fizik", "din_zendegi_2_riazi")
                },
                {
                    name: "نگارش (۲)",
                    url: localPath("motavassete_dovvom/paye_11_yazdahom/riazi_fizik", "negaresh_2_riazi")
                },
                {
                    name: "فارسی (۲)",
                    url: localPath("motavassete_dovvom/paye_11_yazdahom/riazi_fizik", "farsi_2_riazi")
                },
                {
                    name: "هندسه (۲)",
                    url: localPath("motavassete_dovvom/paye_11_yazdahom/riazi_fizik", "hendese_2")
                },
                {
                    name: "شیمی (۲)",
                    url: localPath("motavassete_dovvom/paye_11_yazdahom/riazi_fizik", "shimi_2_riazi")
                },
                {
                    name: "فیزیک (۲)",
                    url: localPath("motavassete_dovvom/paye_11_yazdahom/riazi_fizik", "fizik_2_riazi")
                },
                {
                    name: "عربی، زبان قرآن (۲)",
                    url: localPath("motavassete_dovvom/paye_11_yazdahom/riazi_fizik", "arabi_2_riazi")
                },
                {
                    name: "تاریخ معاصر",
                    url: localPath("motavassete_dovvom/paye_11_yazdahom/riazi_fizik", "tarikh_moaser_riazi")
                },
                {
                    name: "آزمایشگاه علوم (۲)",
                    url: localPath("motavassete_dovvom/paye_11_yazdahom/riazi_fizik", "azmayeshgah_2_riazi")
                },
                {
                    name: "آمار و احتمال",
                    url: localPath("motavassete_dovvom/paye_11_yazdahom/riazi_fizik", "amar_ehtimal")
                },
                {
                    name: "حسابان (۱)",
                    url: localPath("motavassete_dovvom/paye_11_yazdahom/riazi_fizik", "hesaban_1")
                },
                {
                    name: "زمین‌شناسی",
                    url: localPath("motavassete_dovvom/paye_11_yazdahom/riazi_fizik", "zaminshenaasi_riazi")
                },
                {
                    name: "کتاب کار انگلیسی (۲)",
                    url: localPath("motavassete_dovvom/paye_11_yazdahom/riazi_fizik", "ketabkar_englisi_2_riazi")
                },
                {
                    name: "انگلیسی (۲)",
                    url: localPath("motavassete_dovvom/paye_11_yazdahom/riazi_fizik", "englisi_2_riazi")
                },
                {
                    name: "تعلیمات ادیان الهی (۲)",
                    url: localPath("motavassete_dovvom/paye_11_yazdahom/riazi_fizik", "adyan_2_riazi")
                },
                {
                    name: "انسان و محیط زیست",
                    url: localPath("motavassete_dovvom/paye_11_yazdahom/riazi_fizik", "ensan_mohit_zist_riazi")
                },
            ],

            /* ═══════════════════════════════════════════
               پایه یازدهم — علوم تجربی
               ═══════════════════════════════════════════ */
            g11_tajrobi: [{
                    name: "نگارش (۲)",
                    url: localPath("motavassete_dovvom/paye_11_yazdahom/oloom_tajrobi", "negaresh_2_tajrobi")
                },
                {
                    name: "فارسی (۲)",
                    url: localPath("motavassete_dovvom/paye_11_yazdahom/oloom_tajrobi", "farsi_2_tajrobi")
                },
                {
                    name: "دین و زندگی (۲)",
                    url: localPath("motavassete_dovvom/paye_11_yazdahom/oloom_tajrobi", "din_zendegi_2_tajrobi")
                },
                {
                    name: "زیست‌شناسی (۲)",
                    url: localPath("motavassete_dovvom/paye_11_yazdahom/oloom_tajrobi", "zistshenasi_2")
                },
                {
                    name: "ریاضی (۲)",
                    url: localPath("motavassete_dovvom/paye_11_yazdahom/oloom_tajrobi", "riazi_2_tajrobi")
                },
                {
                    name: "شیمی (۲)",
                    url: localPath("motavassete_dovvom/paye_11_yazdahom/oloom_tajrobi", "shimi_2_tajrobi")
                },
                {
                    name: "عربی، زبان قرآن (۲)",
                    url: localPath("motavassete_dovvom/paye_11_yazdahom/oloom_tajrobi", "arabi_2_tajrobi")
                },
                {
                    name: "انگلیسی (۲)",
                    url: localPath("motavassete_dovvom/paye_11_yazdahom/oloom_tajrobi", "englisi_2_tajrobi")
                },
                {
                    name: "تاریخ معاصر",
                    url: localPath("motavassete_dovvom/paye_11_yazdahom/oloom_tajrobi", "tarikh_moaser_tajrobi")
                },
                {
                    name: "آزمایشگاه علوم (۲)",
                    url: localPath("motavassete_dovvom/paye_11_yazdahom/oloom_tajrobi", "azmayeshgah_2_tajrobi")
                },
                {
                    name: "فیزیک (۲)",
                    url: localPath("motavassete_dovvom/paye_11_yazdahom/oloom_tajrobi", "fizik_2_tajrobi")
                },
                {
                    name: "تعلیمات ادیان الهی (۲)",
                    url: localPath("motavassete_dovvom/paye_11_yazdahom/oloom_tajrobi", "adyan_2_tajrobi")
                },
                {
                    name: "ضمیمه دین و زندگی (۲)",
                    url: localPath("motavassete_dovvom/paye_11_yazdahom/oloom_tajrobi",
                        "zamime_din_zendegi_2_tajrobi")
                },
                {
                    name: "زمین‌شناسی",
                    url: localPath("motavassete_dovvom/paye_11_yazdahom/oloom_tajrobi", "zaminshenaasi_tajrobi")
                },
                {
                    name: "کتاب کار انگلیسی (۲)",
                    url: localPath("motavassete_dovvom/paye_11_yazdahom/oloom_tajrobi",
                        "ketabkar_englisi_2_tajrobi")
                },
                {
                    name: "انسان و محیط زیست",
                    url: localPath("motavassete_dovvom/paye_11_yazdahom/oloom_tajrobi", "ensan_mohit_zist_tajrobi")
                },
                {
                    name: "هنر",
                    url: localPath("motavassete_dovvom/paye_11_yazdahom/oloom_tajrobi", "honar_tajrobi")
                },
            ],

            /* ═══════════════════════════════════════════
               پایه یازدهم — ادبیات و علوم انسانی
               ═══════════════════════════════════════════ */
            g11_ensani: [{
                    name: "علوم و فنون ادبی (۲)",
                    url: localPath("motavassete_dovvom/paye_11_yazdahom/oloom_ensani", "oloom_fonon_adabi_2")
                },
                {
                    name: "نگارش (۲)",
                    url: localPath("motavassete_dovvom/paye_11_yazdahom/oloom_ensani", "negaresh_2_ensani")
                },
                {
                    name: "فارسی (۲)",
                    url: localPath("motavassete_dovvom/paye_11_yazdahom/oloom_ensani", "farsi_2_ensani")
                },
                {
                    name: "جغرافیا (۲)",
                    url: localPath("motavassete_dovvom/paye_11_yazdahom/oloom_ensani", "joghrafiya_2")
                },
                {
                    name: "ریاضی و آمار (۲)",
                    url: localPath("motavassete_dovvom/paye_11_yazdahom/oloom_ensani", "riazi_amar_2")
                },
                {
                    name: "عربی، زبان قرآن (۲)",
                    url: localPath("motavassete_dovvom/paye_11_yazdahom/oloom_ensani", "arabi_2_ensani")
                },
                {
                    name: "دین و زندگی (۲)",
                    url: localPath("motavassete_dovvom/paye_11_yazdahom/oloom_ensani", "din_zendegi_2_ensani")
                },
                {
                    name: "تاریخ (۲)",
                    url: localPath("motavassete_dovvom/paye_11_yazdahom/oloom_ensani", "tarikh_2")
                },
                {
                    name: "جامعه‌شناسی (۲)",
                    url: localPath("motavassete_dovvom/paye_11_yazdahom/oloom_ensani", "jameeshenaasi_2")
                },
                {
                    name: "روان‌شناسی",
                    url: localPath("motavassete_dovvom/paye_11_yazdahom/oloom_ensani", "ravanshenasi")
                },
                {
                    name: "فلسفه (۱)",
                    url: localPath("motavassete_dovvom/paye_11_yazdahom/oloom_ensani", "falsafe_1")
                },
                {
                    name: "تعلیمات ادیان الهی (۲)",
                    url: localPath("motavassete_dovvom/paye_11_yazdahom/oloom_ensani", "adyan_2_ensani")
                },
                {
                    name: "کتاب کار انگلیسی (۲)",
                    url: localPath("motavassete_dovvom/paye_11_yazdahom/oloom_ensani", "ketabkar_englisi_2_ensani")
                },
                {
                    name: "انگلیسی (۲)",
                    url: localPath("motavassete_dovvom/paye_11_yazdahom/oloom_ensani", "englisi_2_ensani")
                },
                {
                    name: "انسان و محیط زیست",
                    url: localPath("motavassete_dovvom/paye_11_yazdahom/oloom_ensani", "ensan_mohit_zist_ensani")
                },
                {
                    name: "هنر",
                    url: localPath("motavassete_dovvom/paye_11_yazdahom/oloom_ensani", "honar_ensani")
                },
                {
                    name: "ضمیمه دین و زندگی (۲)",
                    url: localPath("motavassete_dovvom/paye_11_yazdahom/oloom_ensani", "tasmimat_din_zendegi_2")
                },
            ],

            /* ═══════════════════════════════════════════
               پایه یازدهم — علوم و معارف اسلامی
               ═══════════════════════════════════════════ */
            g11_maaref: [{
                    name: "علوم و فنون ادبی (۲)",
                    url: localPath("motavassete_dovvom/paye_11_yazdahom/maaref_eslami",
                        "oloom_fonon_adabi_2_maaref")
                },
                {
                    name: "نگارش (۲)",
                    url: localPath("motavassete_dovvom/paye_11_yazdahom/maaref_eslami", "negaresh_2_maaref")
                },
                {
                    name: "فارسی (۲)",
                    url: localPath("motavassete_dovvom/paye_11_yazdahom/maaref_eslami", "farsi_2_maaref")
                },
                {
                    name: "ریاضی و آمار (۲)",
                    url: localPath("motavassete_dovvom/paye_11_yazdahom/maaref_eslami", "riazi_amar_2_maaref")
                },
                {
                    name: "عربی، زبان قرآن (۲)",
                    url: localPath("motavassete_dovvom/paye_11_yazdahom/maaref_eslami", "arabi_2_maaref")
                },
                {
                    name: "روان‌شناسی",
                    url: localPath("motavassete_dovvom/paye_11_yazdahom/maaref_eslami", "ravanshenasi_maaref")
                },
                {
                    name: "اخلاق اسلامی (۲)",
                    url: localPath("motavassete_dovvom/paye_11_yazdahom/maaref_eslami", "akhlagh_eslami_2")
                },
                {
                    name: "احکام (۲)",
                    url: localPath("motavassete_dovvom/paye_11_yazdahom/maaref_eslami", "ahkam_2")
                },
                {
                    name: "انسان و محیط زیست",
                    url: localPath("motavassete_dovvom/paye_11_yazdahom/maaref_eslami", "ensan_mohit_zist_maaref")
                },
                {
                    name: "علوم و معارف قرآنی (۲)",
                    url: localPath("motavassete_dovvom/paye_11_yazdahom/maaref_eslami", "oloom_maaref_qurani_2")
                },
                {
                    name: "تاریخ اسلام (۲)",
                    url: localPath("motavassete_dovvom/paye_11_yazdahom/maaref_eslami", "tarikh_eslam_2")
                },
                {
                    name: "کتاب کار انگلیسی (۲)",
                    url: localPath("motavassete_dovvom/paye_11_yazdahom/maaref_eslami", "ketabkar_englisi_2_maaref")
                },
                {
                    name: "انگلیسی (۲)",
                    url: localPath("motavassete_dovvom/paye_11_yazdahom/maaref_eslami", "englisi_2_maaref")
                },
                {
                    name: "هنر",
                    url: localPath("motavassete_dovvom/paye_11_yazdahom/maaref_eslami", "honar_maaref")
                },
                {
                    name: "علوم و معارف حقوقی (۲)",
                    url: localPath("motavassete_dovvom/paye_11_yazdahom/maaref_eslami", "oloom_maaref_hoghooghi_2")
                },
            ],

            /* ═══════════════════════════════════════════
               پایه یازدهم — فنی و حرفه‌ای
               ═══════════════════════════════════════════ */
            g11_fanni: [{
                    name: "انسان و محیط زیست",
                    url: localPath("motavassete_dovvom/paye_11_yazdahom/fanni_herfei", "ensan_mohit_zist_fanni")
                },
                {
                    name: "تعلیمات ادیان الهی (۲)",
                    url: localPath("motavassete_dovvom/paye_11_yazdahom/fanni_herfei", "adyan_2_fanni")
                },
                {
                    name: "هنر",
                    url: localPath("motavassete_dovvom/paye_11_yazdahom/fanni_herfei", "honar_fanni")
                },
                {
                    name: "کارگاه نوآوری و کارآفرینی",
                    url: localPath("motavassete_dovvom/paye_11_yazdahom/fanni_herfei", "kargah_noavari_fanni")
                },
                {
                    name: "انگلیسی (۲)",
                    url: localPath("motavassete_dovvom/paye_11_yazdahom/fanni_herfei", "englisi_2_fanni")
                },
                {
                    name: "فارسی و نگارش (۲)",
                    url: localPath("motavassete_dovvom/paye_11_yazdahom/fanni_herfei", "farsi_negaresh_2_fanni")
                },
                {
                    name: "عربی، زبان قرآن (۲)",
                    url: localPath("motavassete_dovvom/paye_11_yazdahom/fanni_herfei", "arabi_2_fanni")
                },
                {
                    name: "ریاضی (۲)",
                    url: localPath("motavassete_dovvom/paye_11_yazdahom/fanni_herfei", "riazi_2_fanni")
                },
                {
                    name: "تفکر و سواد رسانه‌ای",
                    url: localPath("motavassete_dovvom/paye_11_yazdahom/fanni_herfei",
                        "tafakkor_savad_rasaneyi_fanni")
                },
                {
                    name: "دین و زندگی (۲)",
                    url: localPath("motavassete_dovvom/paye_11_yazdahom/fanni_herfei", "din_zendegi_2_fanni")
                },
            ],

            /* ═══════════════════════════════════════════
               پایه یازدهم — کار و دانش
               ═══════════════════════════════════════════ */
            g11_kardanesh: [{
                    name: "انسان و محیط زیست",
                    url: localPath("motavassete_dovvom/paye_11_yazdahom/kar_danesh", "ensan_mohit_zist_kardanesh")
                },
                {
                    name: "تعلیمات ادیان الهی (۲)",
                    url: localPath("motavassete_dovvom/paye_11_yazdahom/kar_danesh", "adyan_2_kardanesh")
                },
                {
                    name: "دین و زندگی (۲)",
                    url: localPath("motavassete_dovvom/paye_11_yazdahom/kar_danesh", "din_zendegi_2_kardanesh")
                },
                {
                    name: "هنر",
                    url: localPath("motavassete_dovvom/paye_11_yazdahom/kar_danesh", "honar_kardanesh")
                },
                {
                    name: "فارسی و نگارش (۲)",
                    url: localPath("motavassete_dovvom/paye_11_yazdahom/kar_danesh", "farsi_negaresh_2_kardanesh")
                },
                {
                    name: "انگلیسی (۲)",
                    url: localPath("motavassete_dovvom/paye_11_yazdahom/kar_danesh", "englisi_2_kardanesh")
                },
                {
                    name: "عربی، زبان قرآن (۲)",
                    url: localPath("motavassete_dovvom/paye_11_yazdahom/kar_danesh", "arabi_2_kardanesh")
                },
                {
                    name: "تفکر و سواد رسانه‌ای",
                    url: localPath("motavassete_dovvom/paye_11_yazdahom/kar_danesh",
                        "tafakkor_savad_rasaneyi_kardanesh")
                },
                {
                    name: "تاریخ معاصر",
                    url: localPath("motavassete_dovvom/paye_11_yazdahom/kar_danesh", "tarikh_moaser_kardanesh")
                },
            ],

            /* ═══════════════════════════════════════════
               پایه دوازدهم — ریاضی فیزیک
               ═══════════════════════════════════════════ */
            g12_riazi_fizik: [{
                    name: "عربی، زبان قرآن (۳)",
                    url: localPath("motavassete_dovvom/paye_12_davazdahom/riazi_fizik", "arabi_3_riazi")
                },
                {
                    name: "دین و زندگی (۳)",
                    url: localPath("motavassete_dovvom/paye_12_davazdahom/riazi_fizik", "din_zendegi_3_riazi")
                },
                {
                    name: "نگارش (۳)",
                    url: localPath("motavassete_dovvom/paye_12_davazdahom/riazi_fizik", "negaresh_3_riazi")
                },
                {
                    name: "فارسی (۳)",
                    url: localPath("motavassete_dovvom/paye_12_davazdahom/riazi_fizik", "farsi_3_riazi")
                },
                {
                    name: "حسابان (۲)",
                    url: localPath("motavassete_dovvom/paye_12_davazdahom/riazi_fizik", "hesaban_2")
                },
                {
                    name: "هندسه (۳)",
                    url: localPath("motavassete_dovvom/paye_12_davazdahom/riazi_fizik", "hendese_3")
                },
                {
                    name: "شیمی (۳)",
                    url: localPath("motavassete_dovvom/paye_12_davazdahom/riazi_fizik", "shimi_3_riazi")
                },
                {
                    name: "فیزیک (۳)",
                    url: localPath("motavassete_dovvom/paye_12_davazdahom/riazi_fizik", "fizik_3_riazi")
                },
                {
                    name: "ریاضیات گسسته",
                    url: localPath("motavassete_dovvom/paye_12_davazdahom/riazi_fizik", "riazi_gossaste")
                },
                {
                    name: "هویت اجتماعی",
                    url: localPath("motavassete_dovvom/paye_12_davazdahom/riazi_fizik", "hoviyyat_ejtemaei_riazi")
                },
                {
                    name: "تعلیمات ادیان الهی (۳)",
                    url: localPath("motavassete_dovvom/paye_12_davazdahom/riazi_fizik", "adyan_3_riazi")
                },
                {
                    name: "مدیریت خانواده و سبک زندگی (۱)",
                    url: localPath("motavassete_dovvom/paye_12_davazdahom/riazi_fizik",
                        "modiriyyat_khanevade_1_riazi")
                },
                {
                    name: "مدیریت خانواده و سبک زندگی (۲)",
                    url: localPath("motavassete_dovvom/paye_12_davazdahom/riazi_fizik",
                        "modiriyyat_khanevade_2_riazi")
                },
                {
                    name: "کتاب کار انگلیسی (۳)",
                    url: localPath("motavassete_dovvom/paye_12_davazdahom/riazi_fizik", "ketabkar_englisi_3_riazi")
                },
                {
                    name: "انگلیسی (۳)",
                    url: localPath("motavassete_dovvom/paye_12_davazdahom/riazi_fizik", "englisi_3_riazi")
                },
            ],

            /* ═══════════════════════════════════════════
               پایه دوازدهم — علوم تجربی
               ═══════════════════════════════════════════ */
            g12_tajrobi: [{
                    name: "فارسی (۳)",
                    url: localPath("motavassete_dovvom/paye_12_davazdahom/oloom_tajrobi", "farsi_3_tajrobi")
                },
                {
                    name: "عربی، زبان قرآن (۳)",
                    url: localPath("motavassete_dovvom/paye_12_davazdahom/oloom_tajrobi", "arabi_3_tajrobi")
                },
                {
                    name: "نگارش (۳)",
                    url: localPath("motavassete_dovvom/paye_12_davazdahom/oloom_tajrobi", "negaresh_3_tajrobi")
                },
                {
                    name: "دین و زندگی (۳)",
                    url: localPath("motavassete_dovvom/paye_12_davazdahom/oloom_tajrobi", "din_zendegi_3_tajrobi")
                },
                {
                    name: "زیست‌شناسی (۳)",
                    url: localPath("motavassete_dovvom/paye_12_davazdahom/oloom_tajrobi", "zistshenasi_3")
                },
                {
                    name: "ریاضی (۳)",
                    url: localPath("motavassete_dovvom/paye_12_davazdahom/oloom_tajrobi", "riazi_3_tajrobi")
                },
                {
                    name: "شیمی (۳)",
                    url: localPath("motavassete_dovvom/paye_12_davazdahom/oloom_tajrobi", "shimi_3_tajrobi")
                },
                {
                    name: "فیزیک (۳)",
                    url: localPath("motavassete_dovvom/paye_12_davazdahom/oloom_tajrobi", "fizik_3_tajrobi")
                },
                {
                    name: "مدیریت خانواده و سبک زندگی (۳)",
                    url: localPath("motavassete_dovvom/paye_12_davazdahom/oloom_tajrobi",
                        "modiriyyat_khanevade_3_tajrobi")
                },
                {
                    name: "مدیریت خانواده و سبک زندگی (۴)",
                    url: localPath("motavassete_dovvom/paye_12_davazdahom/oloom_tajrobi",
                        "modiriyyat_khanevade_4_tajrobi")
                },
                {
                    name: "کتاب کار انگلیسی (۳)",
                    url: localPath("motavassete_dovvom/paye_12_davazdahom/oloom_tajrobi",
                        "ketabkar_englisi_3_tajrobi")
                },
                {
                    name: "انگلیسی (۳)",
                    url: localPath("motavassete_dovvom/paye_12_davazdahom/oloom_tajrobi", "englisi_3_tajrobi")
                },
                {
                    name: "سلامت و بهداشت",
                    url: localPath("motavassete_dovvom/paye_12_davazdahom/oloom_tajrobi", "salamat_behdash_tajrobi")
                },
            ],

            /* ═══════════════════════════════════════════
               پایه دوازدهم — ادبیات و علوم انسانی
               ═══════════════════════════════════════════ */
            g12_ensani: [{
                    name: "فارسی (۳)",
                    url: localPath("motavassete_dovvom/paye_12_davazdahom/oloom_ensani", "farsi_3_ensani")
                },
                {
                    name: "دین و زندگی (۳)",
                    url: localPath("motavassete_dovvom/paye_12_davazdahom/oloom_ensani", "din_zendegi_3_ensani")
                },
                {
                    name: "نگارش (۳)",
                    url: localPath("motavassete_dovvom/paye_12_davazdahom/oloom_ensani", "negaresh_3_ensani")
                },
                {
                    name: "جامعه‌شناسی (۳)",
                    url: localPath("motavassete_dovvom/paye_12_davazdahom/oloom_ensani", "jameeshenaasi_3")
                },
                {
                    name: "ریاضی و آمار (۳)",
                    url: localPath("motavassete_dovvom/paye_12_davazdahom/oloom_ensani", "riazi_amar_3")
                },
                {
                    name: "جغرافیا (۳)",
                    url: localPath("motavassete_dovvom/paye_12_davazdahom/oloom_ensani", "joghrafiya_3")
                },
                {
                    name: "تحلیل فرهنگی",
                    url: localPath("motavassete_dovvom/paye_12_davazdahom/oloom_ensani", "tahlil_farhangi")
                },
                {
                    name: "کتاب کار انگلیسی (۳)",
                    url: localPath("motavassete_dovvom/paye_12_davazdahom/oloom_ensani",
                        "ketabkar_englisi_3_ensani")
                },
                {
                    name: "انگلیسی (۳)",
                    url: localPath("motavassete_dovvom/paye_12_davazdahom/oloom_ensani", "englisi_3_ensani")
                },
                {
                    name: "تعلیمات ادیان الهی (۳)",
                    url: localPath("motavassete_dovvom/paye_12_davazdahom/oloom_ensani", "adyan_3_ensani")
                },
                {
                    name: "سلامت و بهداشت",
                    url: localPath("motavassete_dovvom/paye_12_davazdahom/oloom_ensani", "salamat_behdash_ensani")
                },
                {
                    name: "مدیریت خانواده و سبک زندگی (۵)",
                    url: localPath("motavassete_dovvom/paye_12_davazdahom/oloom_ensani",
                        "modiriyyat_khanevade_5_ensani")
                },
                {
                    name: "مدیریت خانواده و سبک زندگی (۶)",
                    url: localPath("motavassete_dovvom/paye_12_davazdahom/oloom_ensani",
                        "modiriyyat_khanevade_6_ensani")
                },
                {
                    name: "فلسفه (۲)",
                    url: localPath("motavassete_dovvom/paye_12_davazdahom/oloom_ensani", "falsafe_2_ensani")
                },
            ],

            /* ═══════════════════════════════════════════
               پایه دوازدهم — علوم و معارف اسلامی
               ═══════════════════════════════════════════ */
            g12_maaref: [{
                    name: "عربی، زبان قرآن (۳)",
                    url: localPath("motavassete_dovvom/paye_12_davazdahom/maaref_eslami", "arabi_3_maaref")
                },
                {
                    name: "نگارش (۳)",
                    url: localPath("motavassete_dovvom/paye_12_davazdahom/maaref_eslami", "negaresh_3_maaref")
                },
                {
                    name: "فارسی (۳)",
                    url: localPath("motavassete_dovvom/paye_12_davazdahom/maaref_eslami", "farsi_3_maaref")
                },
                {
                    name: "ریاضی و آمار (۳)",
                    url: localPath("motavassete_dovvom/paye_12_davazdahom/maaref_eslami", "riazi_amar_3_maaref")
                },
                {
                    name: "انگلیسی (۳)",
                    url: localPath("motavassete_dovvom/paye_12_davazdahom/maaref_eslami", "englisi_3_maaref")
                },
                {
                    name: "اصول عقاید (۳)",
                    url: localPath("motavassete_dovvom/paye_12_davazdahom/maaref_eslami", "osool_aghaed_3")
                },
                {
                    name: "فلسفه (۲)",
                    url: localPath("motavassete_dovvom/paye_12_davazdahom/maaref_eslami", "falsafe_2_maaref")
                },
                {
                    name: "تحلیل فرهنگی",
                    url: localPath("motavassete_dovvom/paye_12_davazdahom/maaref_eslami", "tahlil_farhangi_maaref")
                },
                {
                    name: "اخلاق اسلامی (۳)",
                    url: localPath("motavassete_dovvom/paye_12_davazdahom/maaref_eslami", "akhlagh_eslami_3")
                },
                {
                    name: "روش استنباط احکام (۳)",
                    url: localPath("motavassete_dovvom/paye_12_davazdahom/maaref_eslami", "ravesh_estenbat_ahkam_3")
                },
                {
                    name: "کتاب کار انگلیسی (۳)",
                    url: localPath("motavassete_dovvom/paye_12_davazdahom/maaref_eslami",
                        "ketabkar_englisi_3_maaref")
                },
                {
                    name: "علوم و معارف قرآنی (۳)",
                    url: localPath("motavassete_dovvom/paye_12_davazdahom/maaref_eslami", "oloom_maaref_qurani_3")
                },
                {
                    name: "مدیریت خانواده و سبک زندگی (۷)",
                    url: localPath("motavassete_dovvom/paye_12_davazdahom/maaref_eslami",
                        "modiriyyat_khanevade_7_maaref")
                },
                {
                    name: "مدیریت خانواده و سبک زندگی (۸)",
                    url: localPath("motavassete_dovvom/paye_12_davazdahom/maaref_eslami",
                        "modiriyyat_khanevade_8_maaref")
                },
                {
                    name: "سلامت و بهداشت",
                    url: localPath("motavassete_dovvom/paye_12_davazdahom/maaref_eslami", "salamat_behdash_maaref")
                },
                {
                    name: "تاریخ (۳)",
                    url: localPath("motavassete_dovvom/paye_12_davazdahom/maaref_eslami", "tarikh_3_maaref")
                },
                {
                    name: "علوم و فنون ادبی (۳)",
                    url: localPath("motavassete_dovvom/paye_12_davazdahom/maaref_eslami",
                        "oloom_fonon_adabi_3_maaref")
                },
            ],

            /* ═══════════════════════════════════════════
               پایه دوازدهم — فنی و حرفه‌ای
               ═══════════════════════════════════════════ */
            g12_fanni: [{
                    name: "مدیریت خانواده و سبک زندگی",
                    url: localPath("motavassete_dovvom/paye_12_davazdahom/fanni_herfei",
                        "modiriyyat_khanevade_fanni")
                },
                {
                    name: "تعلیمات ادیان الهی (۳)",
                    url: localPath("motavassete_dovvom/paye_12_davazdahom/fanni_herfei", "adyan_3_fanni")
                },
                {
                    name: "هویت اجتماعی",
                    url: localPath("motavassete_dovvom/paye_12_davazdahom/fanni_herfei", "hoviyyat_ejtemaei_fanni")
                },
                {
                    name: "دین و زندگی (۳)",
                    url: localPath("motavassete_dovvom/paye_12_davazdahom/fanni_herfei", "din_zendegi_3_fanni")
                },
                {
                    name: "عربی، زبان قرآن (۳)",
                    url: localPath("motavassete_dovvom/paye_12_davazdahom/fanni_herfei", "arabi_3_fanni")
                },
                {
                    name: "اخلاق حرفه‌ای",
                    url: localPath("motavassete_dovvom/paye_12_davazdahom/fanni_herfei", "akhlagh_herfei_fanni")
                },
                {
                    name: "سلامت و بهداشت",
                    url: localPath("motavassete_dovvom/paye_12_davazdahom/fanni_herfei", "salamat_behdash_fanni")
                },
                {
                    name: "مدیریت خانواده و سبک زندگی (۲)",
                    url: localPath("motavassete_dovvom/paye_12_davazdahom/fanni_herfei",
                        "modiriyyat_khanevade_2_fanni")
                },
                {
                    name: "فارسی و نگارش (۳)",
                    url: localPath("motavassete_dovvom/paye_12_davazdahom/fanni_herfei", "farsi_negaresh_3_fanni")
                },
                {
                    name: "آمادگی دفاعی",
                    url: localPath("motavassete_dovvom/paye_12_davazdahom/fanni_herfei", "amadegi_defaei_fanni")
                },
            ],

            /* ═══════════════════════════════════════════
               پایه دوازدهم — کار و دانش
               ═══════════════════════════════════════════ */
            g12_kardanesh: [{
                    name: "مدیریت خانواده و سبک زندگی",
                    url: localPath("motavassete_dovvom/paye_12_davazdahom/kar_danesh",
                        "modiriyyat_khanevade_kardanesh")
                },
                {
                    name: "تعلیمات ادیان الهی (۳)",
                    url: localPath("motavassete_dovvom/paye_12_davazdahom/kar_danesh", "adyan_3_kardanesh")
                },
                {
                    name: "هویت اجتماعی",
                    url: localPath("motavassete_dovvom/paye_12_davazdahom/kar_danesh",
                        "hoviyyat_ejtemaei_kardanesh")
                },
                {
                    name: "دین و زندگی (۳)",
                    url: localPath("motavassete_dovvom/paye_12_davazdahom/kar_danesh", "din_zendegi_3_kardanesh")
                },
                {
                    name: "مدیریت خانواده و سبک زندگی (۲)",
                    url: localPath("motavassete_dovvom/paye_12_davazdahom/kar_danesh",
                        "modiriyyat_khanevade_2_kardanesh")
                },
                {
                    name: "اخلاق حرفه‌ای",
                    url: localPath("motavassete_dovvom/paye_12_davazdahom/kar_danesh", "akhlagh_herfei_kardanesh")
                },
                {
                    name: "سلامت و بهداشت",
                    url: localPath("motavassete_dovvom/paye_12_davazdahom/kar_danesh", "salamat_behdash_kardanesh")
                },
                {
                    name: "عربی، زبان قرآن (۳)",
                    url: localPath("motavassete_dovvom/paye_12_davazdahom/kar_danesh", "arabi_3_kardanesh")
                },
                {
                    name: "فارسی و نگارش (۳)",
                    url: localPath("motavassete_dovvom/paye_12_davazdahom/kar_danesh", "farsi_negaresh_3_kardanesh")
                },
                {
                    name: "آمادگی دفاعی",
                    url: localPath("motavassete_dovvom/paye_12_davazdahom/kar_danesh", "amadegi_defaei_kardanesh")
                },
            ],
        };

        /* ═══════════════════════════════════════════════════════════════
           FIELD KEY MAP — نگاشت رشته به کلید BOOKS_DB
        ═══════════════════════════════════════════════════════════════ */
        const FIELD_KEY_MAP = {
            "ریاضی فیزیک": "riazi_fizik",
            "علوم تجربی": "tajrobi",
            "ادبیات و علوم انسانی": "ensani",
            "علوم و معارف اسلامی": "maaref",
            "فنی و حرفه‌ای": "fanni",
            "کار و دانش": "kardanesh",
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
