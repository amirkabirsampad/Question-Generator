<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>فرم ساز حرفه‌ای</title>
    <style>
        /* Toggle menu button for mobile */
        .toggle-menu-btn {
            display: none;
            width: 100%;
            background: #4299e1;
            color: white;
            border: none;
            border-radius: 8px;
            padding: 0.75rem 1rem;
            font-size: 1rem;
            font-family: inherit;
            font-weight: 600;
            cursor: pointer;
            margin-bottom: 0.5rem;
            transition: background 0.2s;
            align-items: center;
            justify-content: flex-start;
            gap: 0.5rem;
        }

        .toggle-menu-btn.active {
            background: #ed8936;
        }

        @media (max-width: 900px) {
            .toggle-menu-btn {
                display: flex;
            }

            .sidebar-content,
            .properties-panel-content {
                display: none;
                width: 100%;
            }

            .sidebar-content[style*="display: block"],
            .properties-panel-content[style*="display: block"] {
                display: block !important;
            }

            .sidebar h3,
            .properties-panel h3 {
                display: none;
            }
        }

        /* Step Navigation */
        .step-navigation {
            display: flex;
            gap: 0.5rem;
            margin-bottom: 1rem;
            flex-wrap: wrap;
            justify-content: center;
        }

        .step-btn {
            background: #4299e1;
            color: white;
            border: none;
            border-radius: 8px;
            padding: 0.5rem 1.25rem;
            font-size: 1rem;
            font-family: inherit;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .step-btn.active {
            background: #ed8936;
            color: white;
            box-shadow: 0 0 0 3px rgba(237, 137, 54, 0.15);
        }

        .step-btn:hover {
            background: #3182ce;
        }

        /* Responsive for step navigation and modal field items */
        @media (max-width: 768px) {
            .step-navigation {
                flex-direction: column;
                gap: 0.75rem;
                margin-bottom: 1rem;
            }

            .step-btn {
                width: 100%;
                font-size: 0.95rem;
                padding: 0.75rem 1rem;
            }

            .field-items-modal {
                grid-template-columns: 1fr 1fr;
                gap: 0.5rem;
            }
        }

        @media (max-width: 500px) {
            .modal-body {
                min-width: auto;
                width: 98vw;
                padding: 1rem;
            }

            .field-items-modal {
                grid-template-columns: 1fr;
                gap: 0.5rem;
            }

            .step-btn {
                font-size: 0.9rem;
                padding: 0.5rem 0.5rem;
            }
        }

        .field-items-modal {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
            gap: 1rem;
            margin-top: 1rem;
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
            min-height: 100vh;
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

        /* App Container */
        .app-container {
            height: 100vh;
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
            position: relative;
            overflow: hidden;
        }


        @keyframes slideRight {

            0%,
            100% {
                transform: translateX(-100%);
            }

            50% {
                transform: translateX(100%);
            }
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

        .header-divider {
            width: 1px;
            height: 24px;
            background: rgba(255, 255, 255, 0.2);
            margin: 0 0.25rem;
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
        }

        .btn-secondary {
            background: linear-gradient(135deg, #718096 0%, #4a5568 100%);
            color: white;
        }

        .btn-success {
            background: linear-gradient(135deg, #48bb78 0%, #38a169 100%);
            color: white;
        }

        .btn-info {
            background: linear-gradient(135deg, #38b2ac 0%, #319795 100%);
            color: white;
        }

        .btn-danger {
            background: linear-gradient(135deg, #f56565 0%, #e53e3e 100%);
            color: white;
        }

        .btn-gradient {
            background: var(--primary-gradient);
            color: white;
            font-weight: 700;
        }

        .btn-outline {
            background: transparent;
            border: 2px solid var(--border-color);
            color: var(--text-primary);
        }

        .btn-outline:hover {
            background: var(--bg-color);
        }

        .btn-sm {
            padding: 0.4rem 0.9rem;
            font-size: 0.875rem;
        }

        /* Main Layout */
        .app-main {
            flex: 1;
            display: flex;
            overflow: hidden;
        }

        /* Sidebar */
        .sidebar {
            width: 300px;
            background: var(--bg-color);
            border-left: 1px solid var(--border-color);
            padding: 1.5rem;
            overflow-y: auto;
        }

        .sidebar-header {
            margin-bottom: 1.5rem;
        }

        .sidebar-header h3 {
            margin-bottom: 1rem;
            color: var(--text-primary);
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 1.1rem;
        }

        .search-field {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 2px solid var(--border-color);
            border-radius: 10px;
            font-family: inherit;
            font-size: 0.9rem;
            transition: all 0.3s ease;
        }

        .search-field:focus {
            outline: none;
            border-color: #4299e1;
            box-shadow: 0 0 0 3px rgba(66, 153, 225, 0.1);
        }

        .field-category {
            margin-bottom: 1.5rem;
        }

        .category-title {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.75rem 1rem;
            background: linear-gradient(135deg, rgba(66, 153, 225, 0.1) 0%, rgba(102, 126, 234, 0.1) 100%);
            border-radius: 10px;
            margin-bottom: 0.75rem;
            font-weight: 700;
            color: var(--text-primary);
            font-size: 0.9rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .category-title:hover {
            background: linear-gradient(135deg, rgba(66, 153, 225, 0.15) 0%, rgba(102, 126, 234, 0.15) 100%);
            transform: translateX(-2px);
        }

        .category-title i {
            font-size: 1rem;
            color: #4299e1;
        }

        .field-items {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .field-item {
            background: white;
            padding: 0.9rem 1rem;
            border-radius: 10px;
            border: 2px solid var(--border-color);
            cursor: grab;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            display: flex;
            align-items: center;
            gap: 0.75rem;
            box-shadow: var(--shadow-sm);
            position: relative;
            overflow: hidden;
        }

        .field-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 3px;
            height: 100%;
            background: var(--primary-gradient);
            transform: scaleY(0);
            transition: transform 0.3s ease;
        }

        .field-item:hover::before {
            transform: scaleY(1);
        }

        .field-item:hover {
            border-color: #4299e1;
            transform: translateX(-4px);
            box-shadow: var(--shadow-md);
        }

        .field-item:active {
            cursor: grabbing;
            transform: scale(0.98);
        }

        .field-icon {
            width: 36px;
            height: 36px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
            color: white;
            flex-shrink: 0;
        }

        /* Gradient Colors for Field Icons */
        .text-gradient {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .email-gradient {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        }

        .number-gradient {
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        }

        .tel-gradient {
            background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
        }

        .password-gradient {
            background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);
        }

        .textarea-gradient {
            background: linear-gradient(135deg, #30cfd0 0%, #330867 100%);
        }

        .select-gradient {
            background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%);
        }

        .checkbox-gradient {
            background: linear-gradient(135deg, #ff9a9e 0%, #fecfef 100%);
        }

        .radio-gradient {
            background: linear-gradient(135deg, #ffecd2 0%, #fcb69f 100%);
        }

        .file-gradient {
            background: linear-gradient(135deg, #ff6e7f 0%, #bfe9ff 100%);
        }

        .date-gradient {
            background: linear-gradient(135deg, #e0c3fc 0%, #8ec5fc 100%);
        }

        .datetime-gradient {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        }

        .range-gradient {
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        }

        .color-gradient {
            background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);
        }

        .url-gradient {
            background: linear-gradient(135deg, #30cfd0 0%, #330867 100%);
        }

        .search-gradient {
            background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%);
        }

        .hidden-gradient {
            background: linear-gradient(135deg, #d299c2 0%, #fef9d7 100%);
        }

        .heading-gradient {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .paragraph-gradient {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        }

        .divider-gradient {
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        }

        .fieldset-gradient {
            background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
        }

        .field-item span {
            font-weight: 600;
            color: var(--text-primary);
            font-size: 0.9rem;
        }

        /* Canvas */
        .canvas-container {
            flex: 1;
            padding: 1.5rem;
            background: var(--bg-color);
            display: flex;
            flex-direction: column;
        }

        .canvas-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
            padding: 1rem;
            background: white;
            border-radius: 12px;
            box-shadow: var(--shadow-sm);
        }

        .canvas-header-left {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .canvas-header h3 {
            color: var(--text-primary);
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 1.1rem;
        }

        .field-counter {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 0.3rem 0.8rem;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .canvas-actions {
            display: flex;
            gap: 0.5rem;
        }

        .canvas {
            flex: 1;
            background: white;
            border-radius: 16px;
            border: 3px dashed var(--border-color);
            padding: 2rem;
            min-height: 500px;
            position: relative;
            overflow-y: auto;
            transition: all 0.3s ease;
            background-image:
                repeating-linear-gradient(0deg, transparent, transparent 19px, rgba(66, 153, 225, 0.03) 19px, rgba(66, 153, 225, 0.03) 20px),
                repeating-linear-gradient(90deg, transparent, transparent 19px, rgba(66, 153, 225, 0.03) 19px, rgba(66, 153, 225, 0.03) 20px);
        }

        .canvas.show-grid {
            background-image:
                repeating-linear-gradient(0deg, transparent, transparent 19px, rgba(66, 153, 225, 0.1) 19px, rgba(66, 153, 225, 0.1) 20px),
                repeating-linear-gradient(90deg, transparent, transparent 19px, rgba(66, 153, 225, 0.1) 19px, rgba(66, 153, 225, 0.1) 20px);
        }

        .canvas-placeholder {
            text-align: center;
            color: var(--text-secondary);
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 80%;
            max-width: 500px;
        }

        .placeholder-icon {
            font-size: 4rem;
            margin-bottom: 1rem;
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: pulse 2s ease-in-out infinite;
        }

        @keyframes pulse {

            0%,
            100% {
                opacity: 1;
                transform: scale(1);
            }

            50% {
                opacity: 0.7;
                transform: scale(1.05);
            }
        }

        .canvas-placeholder h4 {
            font-size: 1.5rem;
            color: var(--text-primary);
            margin-bottom: 0.5rem;
            font-weight: 700;
        }

        .canvas-placeholder p {
            font-size: 1rem;
            font-weight: 400;
            margin-bottom: 2rem;
        }

        .placeholder-features {
            display: flex;
            justify-content: center;
            gap: 1.5rem;
            margin-top: 2rem;
        }

        .feature-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.85rem;
            color: var(--text-secondary);
        }

        .feature-item i {
            color: #48bb78;
            font-size: 1rem;
        }

        .canvas.drag-over {
            border-color: #4299e1;
            background-color: rgba(66, 153, 225, 0.05);
            box-shadow: inset 0 0 40px rgba(66, 153, 225, 0.1);
        }

        /* Form Elements in Canvas */
        .form-element {
            margin-bottom: 1.5rem;
            padding: 1.25rem;
            border: 2px solid transparent;
            border-radius: 12px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            background: linear-gradient(135deg, rgba(248, 250, 252, 1) 0%, rgba(241, 245, 249, 1) 100%);
            box-shadow: var(--shadow-sm);
        }

        .form-element::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
            background: var(--primary-gradient);
            border-radius: 12px 0 0 12px;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .form-element:hover::before {
            opacity: 0.5;
        }

        .form-element.selected::before {
            opacity: 1;
        }

        .form-element:hover {
            border-color: rgba(66, 153, 225, 0.3);
            box-shadow: var(--shadow-md);
            transform: translateX(-2px);
        }

        .form-element.selected {
            border-color: #ed8936;
            background: linear-gradient(135deg, rgba(255, 250, 240, 1) 0%, rgba(254, 243, 199, 1) 100%);
            box-shadow: 0 0 0 4px rgba(237, 137, 54, 0.15);
            transform: translateX(-2px);
        }

        .form-element .element-actions {
            position: absolute;
            top: -12px;
            left: 12px;
            display: none;
            gap: 0.35rem;
            animation: slideIn 0.3s ease;
        }

        .form-element:hover .element-actions,
        .form-element.selected .element-actions {
            display: flex;
        }

        .element-btn {
            width: 32px;
            height: 32px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.85rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
        }

        .element-btn:hover {
            transform: translateY(-2px) scale(1.05);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.25);
        }

        .element-btn:active {
            transform: translateY(0) scale(0.95);
        }

        .element-btn.edit-btn {
            background: linear-gradient(135deg, #4299e1 0%, #3182ce 100%);
            color: white;
        }

        .element-btn.copy-btn {
            background: linear-gradient(135deg, #38b2ac 0%, #319795 100%);
            color: white;
        }

        .element-btn.move-up-btn {
            background: linear-gradient(135deg, #ed8936 0%, #dd6b20 100%);
            color: white;
        }

        .element-btn.move-down-btn {
            background: linear-gradient(135deg, #f6ad55 0%, #ed8936 100%);
            color: white;
        }

        .element-btn.delete-btn {
            background: linear-gradient(135deg, #f56565 0%, #e53e3e 100%);
            color: white;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: #2d3748;
        }

        .form-control {
            width: 100%;
            padding: 0.75rem;
            border: 2px solid #e2e8f0;
            border-radius: 8px;
            font-family: inherit;
            transition: border-color 0.3s ease;
            background: white;
        }

        .form-control:focus {
            outline: none;
            border-color: #4299e1;
            box-shadow: 0 0 0 3px rgba(66, 153, 225, 0.1);
        }

        .required-indicator {
            color: #f56565;
            margin-right: 0.25rem;
        }

        /* Properties Panel */
        .properties-panel {
            width: 340px;
            background: var(--bg-color);
            border-right: 1px solid var(--border-color);
            padding: 0;
            overflow-y: auto;
            display: flex;
            flex-direction: column;
        }

        .properties-header {
            padding: 1.5rem;
            background: white;
            border-bottom: 1px solid var(--border-color);
            position: sticky;
            top: 0;
            z-index: 10;
        }

        .properties-header h3 {
            margin-bottom: 1rem;
            color: var(--text-primary);
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 1.1rem;
        }

        .properties-tabs {
            display: flex;
            gap: 0.5rem;
        }

        .tab-btn {
            flex: 1;
            padding: 0.6rem 0.8rem;
            background: transparent;
            border: 2px solid var(--border-color);
            border-radius: 8px;
            cursor: pointer;
            font-family: inherit;
            font-weight: 600;
            font-size: 0.8rem;
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 0.25rem;
            color: var(--text-secondary);
        }

        .tab-btn i {
            font-size: 1.2rem;
        }

        .tab-btn.active {
            background: var(--primary-gradient);
            color: white;
            border-color: transparent;
        }

        .tab-btn:hover:not(.active) {
            background: rgba(66, 153, 225, 0.1);
            border-color: #4299e1;
        }

        .properties-content {
            padding: 1.5rem;
            flex: 1;
        }

        .no-selection {
            text-align: center;
            color: var(--text-secondary);
            padding: 3rem 1rem;
        }

        .no-selection-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: wiggle 2s ease-in-out infinite;
        }

        @keyframes wiggle {

            0%,
            100% {
                transform: rotate(0deg);
            }

            25% {
                transform: rotate(-10deg);
            }

            75% {
                transform: rotate(10deg);
            }
        }

        .no-selection h4 {
            font-size: 1.1rem;
            color: var(--text-primary);
            margin-bottom: 0.5rem;
            font-weight: 700;
        }

        .no-selection p {
            font-size: 0.9rem;
            line-height: 1.6;
        }

        .property-group {
            margin-bottom: 1.5rem;
            padding: 1rem;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        .property-group h4 {
            margin-bottom: 1rem;
            color: #2d3748;
            font-weight: 600;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .property-item {
            margin-bottom: 1rem;
        }

        .property-item:last-child {
            margin-bottom: 0;
        }

        .property-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: #4a5568;
            font-size: 0.875rem;
        }

        .property-input {
            width: 100%;
            padding: 0.5rem;
            border: 1px solid #e2e8f0;
            border-radius: 6px;
            font-family: inherit;
            font-size: 0.875rem;
        }

        .property-input:focus {
            outline: none;
            border-color: #4299e1;
        }

        .checkbox-group {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .checkbox-group input[type="checkbox"] {
            width: auto;
        }

        /* Option Management */
        .options-container {
            margin-top: 0.5rem;
        }

        .option-item {
            display: flex;
            gap: 0.5rem;
            margin-bottom: 0.5rem;
            align-items: center;
        }

        .option-item input {
            flex: 1;
        }

        .option-item button {
            width: 32px;
            height: 32px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f56565;
            color: white;
            font-size: 0.75rem;
        }

        .add-option-btn {
            width: 100%;
            padding: 0.5rem;
            border: 2px dashed #cbd5e0;
            background: transparent;
            border-radius: 6px;
            cursor: pointer;
            color: #718096;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .add-option-btn:hover {
            border-color: #4299e1;
            color: #4299e1;
            background: #ebf8ff;
        }

        /* Modal */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
            z-index: 1000;
            backdrop-filter: blur(8px);
            animation: fadeIn 0.3s ease;
        }

        .modal.show {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .modal-content {
            background: white;
            border-radius: 20px;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.25);
            max-width: 90vw;
            max-height: 90vh;
            overflow: hidden;
            animation: modalSlideIn 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
        }

        .modal-content::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: var(--primary-gradient);
        }

        @keyframes modalSlideIn {
            from {
                opacity: 0;
                transform: scale(0.85) translateY(-30px);
            }

            to {
                opacity: 1;
                transform: scale(1) translateY(0);
            }
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 2rem;
            border-bottom: 2px solid var(--border-color);
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.05) 0%, rgba(118, 75, 162, 0.05) 100%);
        }

        .modal-header h3 {
            color: var(--text-primary);
            font-weight: 700;
            font-size: 1.4rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .modal-header h3 i {
            width: 40px;
            height: 40px;
            background: var(--primary-gradient);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
        }

        .modal-close {
            width: 40px;
            height: 40px;
            border: none;
            background: linear-gradient(135deg, #f56565 0%, #e53e3e 100%);
            color: white;
            border-radius: 10px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            font-size: 1.1rem;
        }

        .modal-close:hover {
            transform: scale(1.1) rotate(90deg);
            box-shadow: 0 4px 12px rgba(245, 101, 101, 0.4);
        }

        .modal-body {
            padding: 2rem;
            max-height: 70vh;
            overflow-y: auto;
            min-width: 600px;
        }

        /* Preview Modal Specific */
        #previewContent {
            background: #f8fafc;
            border-radius: 8px;
            padding: 2rem;
        }

        #previewContent .preview-form {
            background: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        /* Templates Grid */
        .templates-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 2rem;
        }

        .template-card {
            background: white;
            border: 2px solid var(--border-color);
            border-radius: 16px;
            padding: 2rem;
            cursor: pointer;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .template-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: var(--primary-gradient);
            transform: scaleX(0);
            transition: transform 0.3s ease;
        }

        .template-card:hover::before {
            transform: scaleX(1);
        }

        .template-card:hover {
            border-color: transparent;
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(66, 153, 225, 0.2);
        }

        .template-icon {
            font-size: 3.5rem;
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 1.5rem;
            animation: float 3s ease-in-out infinite;
        }

        .template-title {
            font-size: 1.35rem;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 0.75rem;
        }

        .template-description {
            color: var(--text-secondary);
            font-size: 0.95rem;
            line-height: 1.6;
        }

        .template-fields {
            margin-top: 1.5rem;
            padding-top: 1.5rem;
            border-top: 2px solid var(--border-color);
        }

        .template-field-count {
            font-size: 0.85rem;
            color: var(--text-secondary);
            font-weight: 600;
            background: var(--bg-color);
            padding: 0.5rem 1rem;
            border-radius: 20px;
            display: inline-block;
        }

        /* Saved Forms */
        .saved-forms {
            display: grid;
            gap: 1rem;
        }

        .saved-form-item {
            background: #f8fafc;
            padding: 1.5rem;
            border-radius: 8px;
            border: 2px solid #e2e8f0;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .saved-form-item:hover {
            border-color: #4299e1;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(66, 153, 225, 0.15);
        }

        .saved-form-title {
            font-weight: 600;
            color: #2d3748;
            margin-bottom: 0.5rem;
        }

        .saved-form-meta {
            color: #718096;
            font-size: 0.875rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .saved-form-actions {
            display: flex;
            gap: 0.5rem;
        }

        .saved-form-actions button {
            padding: 0.25rem 0.5rem;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 0.75rem;
            transition: all 0.3s ease;
        }

        /* Validation Messages */
        .validation-message {
            color: #f56565;
            font-size: 0.875rem;
            margin-top: 0.25rem;
            display: none;
        }

        .form-control.invalid {
            border-color: #f56565;
            box-shadow: 0 0 0 3px rgba(245, 101, 101, 0.1);
        }

        .form-control.invalid+.validation-message {
            display: block;
        }

        /* Fieldset Styling */
        .fieldset-element {
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.05) 0%, rgba(118, 75, 162, 0.05) 100%);
            border: 2px dashed rgba(102, 126, 234, 0.3);
        }

        .fieldset-element:hover {
            border-color: rgba(102, 126, 234, 0.5);
        }

        .fieldset-group {
            border: 2px solid var(--border-color);
            border-radius: 12px;
            padding: 1.5rem;
            background: white;
        }

        .fieldset-title {
            font-size: 1.2rem;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 0.5rem;
            padding: 0.5rem 1rem;
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .fieldset-description {
            color: var(--text-secondary);
            margin-bottom: 1rem;
            font-size: 0.9rem;
            line-height: 1.6;
        }

        .fieldset-fields {
            margin-top: 1rem;
        }

        .fieldset-add-field {
            margin-top: 1rem;
            padding-top: 1rem;
            border-top: 2px dashed var(--border-color);
            text-align: center;
        }

        .add-field-to-group {
            background: linear-gradient(135deg, rgba(66, 153, 225, 0.1) 0%, rgba(102, 126, 234, 0.1) 100%);
            border: 2px dashed #4299e1;
            color: #4299e1;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .add-field-to-group:hover {
            background: linear-gradient(135deg, #4299e1 0%, #667eea 100%);
            border-color: transparent;
            color: white;
            transform: translateY(-2px);
        }

        /* Responsive Design */
        @media (max-width: 1200px) {
            .properties-panel {
                width: 280px;
            }

            .modal-body {
                min-width: 500px;
            }
        }

        @media (max-width: 1024px) {
            .header-brand .brand-subtitle {
                display: none;
            }

            .sidebar {
                width: 260px;
            }

            .properties-panel {
                width: 300px;
            }
        }

        @media (max-width: 768px) {
            .app-main {
                flex-direction: column;
            }

            .sidebar,
            .properties-panel {
                width: 100%;
                max-height: 280px;
                min-height: 150px;
                padding: 1rem;
            }

            .header-content {
                flex-direction: column;
                gap: 1rem;
                align-items: stretch;
            }

            .header-brand {
                justify-content: center;
            }

            .header-actions {
                width: 100%;
                justify-content: center;
                flex-wrap: wrap;
                gap: 0.5rem;
            }

            .btn span {
                display: none;
            }

            .btn {
                min-width: auto;
                padding: 0.7rem;
            }

            .canvas-container {
                padding: 1rem;
            }

            .canvas {
                padding: 1.5rem;
                min-height: 400px;
            }

            .canvas-placeholder {
                position: static;
                transform: none;
                margin: 2rem auto;
                padding: 1.5rem 1rem;
                width: 100%;
            }

            .placeholder-icon {
                font-size: 3rem;
            }

            .canvas-placeholder h4 {
                font-size: 1.2rem;
            }

            .canvas-placeholder p {
                font-size: 0.9rem;
            }

            .placeholder-features {
                flex-direction: column;
                gap: 0.75rem;
            }

            .modal-body {
                min-width: auto;
                width: 95vw;
                padding: 1.5rem;
            }

            .modal-header h3 {
                font-size: 1.1rem;
            }

            .templates-grid {
                grid-template-columns: 1fr;
                gap: 1rem;
            }

            .field-category {
                margin-bottom: 1rem;
            }

            .properties-tabs {
                flex-direction: column;
            }

            .tab-btn {
                flex-direction: row;
                justify-content: center;
            }
        }

        @media (max-width: 480px) {
            .brand-icon {
                width: 40px;
                height: 40px;
                font-size: 1.2rem;
            }

            .brand-text h1 {
                font-size: 1.2rem;
            }

            .btn-icon {
                width: 36px;
                height: 36px;
                padding: 0.5rem;
            }

            .canvas {
                padding: 1rem;
            }

            .modal-header {
                padding: 1rem;
            }

            .modal-body {
                padding: 1rem;
            }

            .notification {
                right: 10px;
                top: 10px;
                min-width: auto;
                max-width: calc(100vw - 20px);
            }
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb {
            background: #cbd5e0;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #a0aec0;
        }

        /* Notification System */
        .notification {
            position: fixed;
            top: 20px;
            right: 20px;
            background: white;
            padding: 1rem 1.5rem;
            border-radius: 12px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
            display: flex;
            align-items: center;
            gap: 0.75rem;
            z-index: 10000;
            transform: translateX(400px);
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            min-width: 250px;
        }

        .notification.show {
            transform: translateX(0);
        }

        .notification i {
            font-size: 1.5rem;
        }

        .notification-success {
            border-left: 4px solid #48bb78;
        }

        .notification-success i {
            color: #48bb78;
        }

        .notification-error {
            border-left: 4px solid #f56565;
        }

        .notification-error i {
            color: #f56565;
        }

        .notification-info {
            border-left: 4px solid #4299e1;
        }

        .notification-info i {
            color: #4299e1;
        }

        .notification span {
            font-weight: 600;
            color: var(--text-primary);
        }

        /* Active Button States */
        .btn.active {
            background: var(--primary-gradient);
            color: white;
        }

        /* Animations */
        .fade-in {
            animation: fadeIn 0.3s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .slide-in {
            animation: slideIn 0.3s ease;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(-20px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
    </style>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
</head>

<body>
    <div class="app-container">
        <!-- Header -->
        <header class="app-header">
            <div class="header-content">
                <div class="header-brand">
                    <div class="brand-icon">
                        <i class="fas fa-brain"></i>
                    </div>
                    <div class="brand-text">
                        <h1>سوال ساز هوشمند</h1>
                        <span class="brand-subtitle"> تولید سوال با هوش مصنوعی</span>
                    </div>
                </div>
                <div class="header-actions">
                    <button class="btn btn-icon" id="undoBtn" title="بازگشت (Ctrl+Z)">
                        <i class="fas fa-undo"></i>
                    </button>
                    <button class="btn btn-icon" id="redoBtn" title="جلو (Ctrl+Y)">
                        <i class="fas fa-redo"></i>
                    </button>
                    <div class="header-divider"></div>
                    <button class="btn btn-secondary" id="templatesBtn">
                        <i class="fas fa-layer-group"></i>
                        <span>قالب‌ها</span>
                    </button>
                    <button class="btn btn-secondary" id="previewBtn">
                        <i class="fas fa-eye"></i>
                        <span>پیش‌نمایش</span>
                    </button>
                    <button class="btn btn-success" id="saveBtn">
                        <i class="fas fa-print"></i>
                        <span>چاپ</span>
                    </button>
                    <!-- <button class="btn btn-primary" id="loadBtn">
                        <i class="fas fa-folder-open"></i>
                        <span>بارگذاری</span>
                    </button>
                    <button class="btn btn-gradient" id="exportBtn">
                        <i class="fas fa-download"></i>
                        <span>صادر کردن</span>
                    </button> -->
                    <div class="header-divider"></div>
                    <a href="dashboard.html" class="btn btn-icon" title="داشبورد مدیریتی">
                        <i class="fas fa-chart-line"></i>
                    </a>
                    <button class="btn btn-icon" id="themeToggle" title="تغییر تم">
                        <i class="fas fa-moon"></i>
                    </button>
                </div>
            </div>
        </header>

        <div class="app-main">
            <!-- Sidebar - فیلد ها -->
            <aside class="sidebar">
                <div class="sidebar-header">
                    <h3><i class="fas fa-puzzle-piece"></i> المنت‌های فرم</h3>
                    <input type="text" class="search-field" id="searchFields" placeholder="جستجوی فیلد...">
                </div>

                <!-- دسته‌بندی: فیلدهای پایه -->
                <div class="field-category">
                    <div class="category-title">
                        <i class="fas fa-keyboard"></i>
                        <span>فیلدهای ورودی</span>
                    </div>
                    <div class="field-items" data-category="input">
                        <div class="field-item" draggable="true" data-type="text" data-category="input">
                            <div class="field-icon text-gradient">
                                <i class="fas fa-font"></i>
                            </div>
                            <span>فیلد متنی</span>
                        </div>
                        <!-- <div class="field-item" draggable="true" data-type="textarea" data-category="input">
                            <div class="field-icon textarea-gradient">
                                <i class="fas fa-align-left"></i>
                            </div>
                            <span>متن چندخطی</span>
                        </div> -->
                    </div>
                    <div class="field-items" data-category="selection">
                        <div class="field-item" draggable="true" data-type="radio" data-category="selection">
                            <div class="field-icon radio-gradient">
                                <i class="fas fa-dot-circle"></i>
                            </div>
                            <span>رادیو باتن</span>
                        </div>
                    </div>
                </div>




            </aside>


            <main class="canvas-container">
                <!-- Step Navigation (multi-step forms) -->
                <div id="stepNav" class="step-navigation" style="display:none;"></div>
                <div class="canvas-header">
                    <div class="canvas-header-left">
                        <h3><i class="fas fa-drafting-compass"></i> طراحی فرم</h3>
                        <span class="field-counter" id="fieldCounter">0 فیلد</span>
                    </div>
                    <div class="canvas-actions">
                        <button class="btn btn-sm btn-outline" id="gridToggle" title="نمایش شبکه">
                            <i class="fas fa-th"></i>
                        </button>
                        <button class="btn btn-sm btn-outline" id="responsiveMode" title="حالت موبایل">
                            <i class="fas fa-mobile-alt"></i>
                        </button>
                        <button class="btn btn-sm btn-danger" id="clearBtn">
                            <i class="fas fa-trash"></i>
                            <span>پاک کردن همه</span>
                        </button>
                    </div>
                </div>
                <div class="canvas" id="formCanvas">
                    <div class="canvas-placeholder">
                        <div class="placeholder-icon">
                            <i class="fas fa-hand-pointer"></i>
                        </div>
                        <h4>شروع طراحی فرم</h4>
                        <p>فیلدهای مورد نظر را از سمت راست بکشید و اینجا رها کنید</p>
                        <div class="placeholder-features">
                            <div class="feature-item">
                                <i class="fas fa-check-circle"></i>
                                <span>Drag & Drop ساده</span>
                            </div>
                            <div class="feature-item">
                                <i class="fas fa-check-circle"></i>
                                <span>قالب‌های آماده</span>
                            </div>
                            <div class="feature-item">
                                <i class="fas fa-check-circle"></i>
                                <span>پیش‌نمایش زنده</span>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <!-- Modal انتخاب نوع فیلد برای افزودن به گروه -->
            <div class="modal" id="addFieldToGroupModal">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3><i class="fas fa-plus"></i> انتخاب نوع فیلد</h3>
                        <button class="modal-close" id="closeAddFieldToGroupModal">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="field-items field-items-modal">
                            <!-- گزینه‌های فیلد اینجا قرار می‌گیرند -->
                        </div>
                    </div>
                </div>
            </div>

            <!-- Properties Panel - تنظیمات فیلد -->
            <aside class="properties-panel">
                <div class="properties-header">
                    <h3><i class="fas fa-cog"></i> تنظیمات فیلد</h3>
                </div>
                <div class="properties-content" id="propertiesContent">
                    <div class="no-selection">
                        <div class="no-selection-icon">
                            <i class="fas fa-hand-pointer"></i>
                        </div>
                        <h4>هیچ فیلدی انتخاب نشده</h4>
                        <p>فیلدی را از فرم انتخاب کنید تا تنظیمات آن در اینجا نمایش داده شود</p>
                    </div>
                </div>
            </aside>
            <button class="toggle-menu-btn" id="togglePropertiesBtn">
                <i class="fas fa-sliders-h"></i> تنظیمات فیلد
            </button>
        </div>
    </div>

    <!-- Modal برای قالب‌ها -->
    <div class="modal" id="templatesModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3><i class="fas fa-layer-group"></i> قالب‌های آماده</h3>
                <button class="modal-close" id="closeTemplates">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="templates-grid" id="templatesGrid">
                    <!-- قالب‌ها اینجا نمایش داده می‌شوند -->
                </div>
            </div>
        </div>
    </div>

    <!-- Modal برای پیش‌نمایش -->
    <div class="modal" id="previewModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3><i class="fas fa-eye"></i> پیش‌نمایش فرم</h3>
                <button class="modal-close" id="closePreview">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body" id="previewContent">
                <!-- پیش‌نمایش فرم اینجا نمایش داده می‌شود -->
            </div>
        </div>
    </div>

    <!-- Modal برای بارگذاری -->
    <div class="modal" id="loadModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3><i class="fas fa-folder-open"></i> بارگذاری فرم</h3>
                <button class="modal-close" id="closeLoad">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="saved-forms" id="savedForms">
                    <!-- لیست فرم‌های ذخیره شده -->
                </div>
            </div>
        </div>
    </div>

    <script>
        // فرم ساز حرفه‌ای - اسکریپت اصلی
        class FormBuilder {
            constructor() {
                this.canvas = document.getElementById('formCanvas');
                this.propertiesContent = document.getElementById('propertiesContent');
                this.fieldCounter = 0;
                this.selectedElement = null;
                this.formData = [];
                this.steps = [{
                    id: 1,
                    title: 'مرحله ۱',
                    fields: []
                }];
                this.currentStep = 1;
                this.conditions = [];
                this.multiStepMode = false;
                this.history = [];
                this.historyIndex = -1;
                this.init();
            }

            init() {
                this.setupDragAndDrop();
                this.setupEventListeners();
                this.setupModalEvents();
                this.loadSavedForms();
                this.setupStepNavigation();
                this.setupNewFeatures();
            }

            // قابلیت‌های جدید
            setupNewFeatures() {
                // Undo/Redo
                document.getElementById('undoBtn').addEventListener('click', () => this.undo());
                document.getElementById('redoBtn').addEventListener('click', () => this.redo());

                // Dark Mode Toggle
                document.getElementById('themeToggle').addEventListener('click', () => this.toggleTheme());

                // Grid Toggle
                document.getElementById('gridToggle').addEventListener('click', () => this.toggleGrid());

                // Responsive Mode
                document.getElementById('responsiveMode').addEventListener('click', () => this.toggleResponsiveMode());

                // Search Fields
                document.getElementById('searchFields').addEventListener('input', (e) => this.searchFields(e.target
                    .value));

                // Keyboard Shortcuts
                document.addEventListener('keydown', (e) => this.handleKeyboardShortcuts(e));

                // Update Field Counter
                this.updateFieldCounter();

                // Load Theme Preference
                const savedTheme = localStorage.getItem('formBuilderTheme') || 'light';
                if (savedTheme === 'dark') {
                    document.body.classList.add('dark-mode');
                    document.getElementById('themeToggle').innerHTML = '<i class="fas fa-sun"></i>';
                }
            }

            // Undo Function
            undo() {
                if (this.historyIndex > 0) {
                    this.historyIndex--;
                    this.formData = JSON.parse(JSON.stringify(this.history[this.historyIndex]));
                    this.renderForm();
                    this.showNotification('بازگشت انجام شد', 'success');
                }
            }

            // Redo Function
            redo() {
                if (this.historyIndex < this.history.length - 1) {
                    this.historyIndex++;
                    this.formData = JSON.parse(JSON.stringify(this.history[this.historyIndex]));
                    this.renderForm();
                    this.showNotification('جلو رفتن انجام شد', 'success');
                }
            }

            // Save to History
            saveToHistory() {
                // حذف تاریخچه‌های بعدی در صورت وجود
                this.history = this.history.slice(0, this.historyIndex + 1);
                this.history.push(JSON.parse(JSON.stringify(this.formData)));
                this.historyIndex++;

                // محدود کردن تاریخچه به 50 مورد
                if (this.history.length > 50) {
                    this.history.shift();
                    this.historyIndex--;
                }
            }

            // Save to LocalStorage
            saveToLocalStorage() {
                // 1. دریافت داده‌ها از localStorage
                let data = localStorage.getItem('examDataForEditor');

                // 2. تبدیل رشته JSON به شیء جاوااسکریپتی (اگر داده‌ها به صورت JSON ذخیره شده‌اند)
                if (data) {
                    data = JSON.parse(data); // تبدیل رشته به شیء
                } else {
                    // اگر داده‌ای وجود ندارد، یک شیء جدید بسازید
                    data = {
                        id: 'edited',
                        name: 'Edited Form',
                        data: {},
                        createdAt: new Date().toISOString(),
                        updatedAt: new Date().toISOString()
                    };
                }

                // 3. فقط بخش مورد نظر را تغییر دهید (مثال: تغییر نام)
                data.data = this.formData; // فقط نام را تغییر می‌دهی
                data.updatedAt = new Date().toISOString();
                // 5. دوباره در localStorage ذخیره کنید
                localStorage.setItem('examDataForEditor', JSON.stringify(data));
            }

            // Toggle Theme
            toggleTheme() {
                document.body.classList.toggle('dark-mode');
                const isDark = document.body.classList.contains('dark-mode');
                document.getElementById('themeToggle').innerHTML = isDark ? '<i class="fas fa-sun"></i>' :
                    '<i class="fas fa-moon"></i>';
                localStorage.setItem('formBuilderTheme', isDark ? 'dark' : 'light');
                this.showNotification(isDark ? 'حالت تاریک فعال شد' : 'حالت روشن فعال شد', 'info');
            }

            // Toggle Grid
            toggleGrid() {
                this.canvas.classList.toggle('show-grid');
                const btn = document.getElementById('gridToggle');
                btn.classList.toggle('active');
                this.showNotification(this.canvas.classList.contains('show-grid') ? 'شبکه فعال شد' : 'شبکه غیرفعال شد',
                    'info');
            }

            // Toggle Responsive Mode
            toggleResponsiveMode() {
                this.canvas.classList.toggle('responsive-mode');
                const btn = document.getElementById('responsiveMode');
                btn.classList.toggle('active');
                if (this.canvas.classList.contains('responsive-mode')) {
                    this.canvas.style.maxWidth = '375px';
                    this.canvas.style.margin = '0 auto';
                    this.showNotification('حالت موبایل فعال شد', 'info');
                } else {
                    this.canvas.style.maxWidth = 'none';
                    this.canvas.style.margin = '0';
                    this.showNotification('حالت دسکتاپ فعال شد', 'info');
                }
            }

            // Search Fields
            searchFields(query) {
                const items = document.querySelectorAll('.field-item');
                const lowerQuery = query.toLowerCase();

                items.forEach(item => {
                    const text = item.textContent.toLowerCase();
                    if (text.includes(lowerQuery)) {
                        item.style.display = 'flex';
                    } else {
                        item.style.display = 'none';
                    }
                });
            }

            // Update Field Counter
            updateFieldCounter() {
                const counter = document.getElementById('fieldCounter');
                if (counter) {
                    counter.textContent = `${this.formData.length} فیلد`;
                }
            }

            // Keyboard Shortcuts
            handleKeyboardShortcuts(e) {
                // Ctrl+Z: Undo
                if (e.ctrlKey && e.key === 'z') {
                    e.preventDefault();
                    this.undo();
                }
                // Ctrl+Y: Redo
                if (e.ctrlKey && e.key === 'y') {
                    e.preventDefault();
                    this.redo();
                }
                // Ctrl+S: Save
                if (e.ctrlKey && e.key === 's') {
                    e.preventDefault();
                    this.saveForm();
                }
                // Delete: حذف فیلد انتخاب شده
                if (e.key === 'Delete' && this.selectedElement) {
                    e.preventDefault();
                    const fieldId = this.selectedElement.dataset.fieldId;
                    this.deleteField(fieldId);
                }
                // Escape: لغو انتخاب
                if (e.key === 'Escape') {
                    this.deselectAll();
                }
            }

            // Show Notification
            showNotification(message, type = 'info') {
                // حذف نوتیفیکیشن‌های قبلی
                const existing = document.querySelector('.notification');
                if (existing) existing.remove();

                const notification = document.createElement('div');
                notification.className = `notification notification-${type}`;
                notification.innerHTML = `
            <i class="fas fa-${type === 'success' ? 'check-circle' : type === 'error' ? 'times-circle' : 'info-circle'}"></i>
            <span>${message}</span>
        `;
                document.body.appendChild(notification);

                setTimeout(() => notification.classList.add('show'), 10);
                setTimeout(() => {
                    notification.classList.remove('show');
                    setTimeout(() => notification.remove(), 300);
                }, 3000);
            }
            // راه‌اندازی ناوبری مراحل
            setupStepNavigation() {
                // اضافه کردن دکمه‌های مرحله اگر multiStepMode فعال باشد
                if (!document.getElementById('stepNav')) {
                    const nav = document.createElement('div');
                    nav.id = 'stepNav';
                    nav.className = 'step-navigation';
                    nav.style.display = 'none';
                    this.canvas.parentNode.insertBefore(nav, this.canvas);
                }
                this.renderStepNavigation();
            }

            renderStepNavigation() {
                const nav = document.getElementById('stepNav');
                if (!nav) return;
                if (!this.multiStepMode) {
                    nav.style.display = 'none';
                    return;
                }
                nav.style.display = 'flex';
                nav.innerHTML = this.steps.map(step => `
            <button class="btn btn-sm step-btn${step.id === this.currentStep ? ' active' : ''}" data-step="${step.id}">
                ${step.title}
            </button>
        `).join('');
                nav.querySelectorAll('.step-btn').forEach(btn => {
                    btn.onclick = () => {
                        this.currentStep = parseInt(btn.dataset.step);
                        this.renderForm();
                    };
                });
            }

            // راه‌اندازی Drag & Drop
            setupDragAndDrop() {
                // تابع برای attach کردن event listeners به field items
                const attachDragListeners = () => {
                    const fieldItems = document.querySelectorAll('.field-item');
                    fieldItems.forEach(item => {
                        // اگر قبلاً listener داشته باشد، دوباره اضافه نکن
                        if (!item.hasAttribute('data-drag-listener')) {
                            item.addEventListener('dragstart', (e) => {
                                e.dataTransfer.setData('text/plain', item.dataset.type);
                                e.dataTransfer.effectAllowed = 'copy';
                            });
                            item.setAttribute('data-drag-listener', 'true');
                        }
                    });
                };

                // اول، listeners را attach کن
                attachDragListeners();

                // حالا MutationObserver برای مراقبت از DOM
                const sidebarContainer = document.querySelector('.sidebar');
                if (sidebarContainer) {
                    const observer = new MutationObserver(() => {
                        attachDragListeners();
                    });
                    observer.observe(sidebarContainer, {
                        childList: true,
                        subtree: true
                    });
                }

                this.canvas.addEventListener('dragover', (e) => {
                    e.preventDefault();
                    e.dataTransfer.dropEffect = 'copy';
                    this.canvas.classList.add('drag-over');
                });

                this.canvas.addEventListener('dragleave', () => {
                    this.canvas.classList.remove('drag-over');
                });

                this.canvas.addEventListener('drop', (e) => {
                    e.preventDefault();
                    this.canvas.classList.remove('drag-over');

                    const fieldType = e.dataTransfer.getData('text/plain');
                    this.addField(fieldType);
                });
            }

            // راه‌اندازی Event Listeners
            setupEventListeners() {
                // دکمه‌های هدر
                document.getElementById('templatesBtn').addEventListener('click', () => this.showTemplatesModal());
                document.getElementById('previewBtn').addEventListener('click', () => this.showPreview());
                document.getElementById('saveBtn').addEventListener('click', () => this.saveForm());
                // document.getElementById('loadBtn').addEventListener('click', () => this.showLoadModal());
                // document.getElementById('exportBtn').addEventListener('click', () => this.exportForm());
                // document.getElementById('clearBtn').addEventListener('click', () => this.clearCanvas());

                // کلیک روی canvas برای انتخاب
                this.canvas.addEventListener('click', (e) => {
                    if (e.target === this.canvas) {
                        this.deselectAll();
                    }
                });
            }

            // راه‌اندازی Modal Events
            setupModalEvents() {
                // Templates Modal
                document.getElementById('closeTemplates').addEventListener('click', () => {
                    document.getElementById('templatesModal').classList.remove('show');
                    console.log('Templates modal closed');
                });

                // Preview Modal
                document.getElementById('closePreview').addEventListener('click', () => {
                    document.getElementById('previewModal').classList.remove('show');
                });

                // Load Modal
                document.getElementById('closeLoad').addEventListener('click', () => {
                    document.getElementById('loadModal').classList.remove('show');
                });

                // بستن modal با کلیک خارج از آن
                document.querySelectorAll('.modal').forEach(modal => {
                    modal.addEventListener('click', (e) => {
                        if (e.target === modal) {
                            modal.classList.remove('show');
                        }
                    });
                });
            }

            // اضافه کردن فیلد جدید
            addField(type, parentGroupId = null) {
                this.fieldCounter++;
                const fieldId = `field_${this.fieldCounter}`;

                // حذف placeholder اگر وجود داشته باشد
                const placeholder = this.canvas.querySelector('.canvas-placeholder');
                if (placeholder) {
                    placeholder.style.display = 'none';
                }

                const fieldData = this.createFieldData(type, fieldId);

                // ذخیره در تاریخچه
                this.saveToHistory();

                if (type === 'fieldset') {
                    fieldData.fields = [];
                    fieldData.title = 'عنوان گروه';
                    fieldData.description = '';
                    this.formData.push(fieldData);
                    const fieldElement = this.createFieldsetElement(fieldData);
                    this.canvas.appendChild(fieldElement);
                    this.selectElement(fieldElement, fieldData);
                } else if (parentGroupId) {
                    // اضافه کردن فیلد به گروه
                    const group = this.formData.find(f => f.id === parentGroupId);
                    if (group && group.type === 'fieldset') {
                        group.fields.push(fieldData);
                        const groupElement = document.querySelector(`[data-field-id="${group.id}"] .fieldset-fields`);
                        if (groupElement) {
                            const fieldElement = this.createFieldElement(fieldData, group.id);
                            groupElement.appendChild(fieldElement);
                            this.selectElement(fieldElement, fieldData);
                        }
                    }
                } else if (this.multiStepMode) {
                    // افزودن فیلد به مرحله فعلی
                    const step = this.steps.find(s => s.id === this.currentStep);
                    if (step) {
                        step.fields.push(fieldData);
                        this.renderForm();
                    }
                } else {
                    this.formData.push(fieldData);
                    const fieldElement = this.createFieldElement(fieldData);
                    this.canvas.appendChild(fieldElement);
                    this.selectElement(fieldElement, fieldData);
                }

                // به‌روزرسانی شمارنده فیلدها
                this.updateFieldCounter();

                // نمایش نوتیفیکیشن
                this.showNotification('فیلد با موفقیت اضافه شد', 'success');
            }

            // ایجاد داده‌های فیلد
            createFieldData(type, id) {
                const baseData = {
                    id: id,
                    type: type,
                    label: this.getDefaultLabel(type),
                    name: `field_${this.fieldCounter}`,
                    placeholder: '',
                    required: false,
                    className: '',
                    validation: {
                        minLength: '',
                        maxLength: '',
                        pattern: ''
                    }
                };

                // اضافه کردن ویژگی‌های خاص هر نوع فیلد
                switch (type) {
                    case 'select':
                    case 'radio':
                    case 'checkbox':
                        baseData.options = [{
                                value: 'option1',
                                label: 'گزینه ۱'
                            },
                            {
                                value: 'option2',
                                label: 'گزینه ۲'
                            }
                        ];
                        break;
                    case 'number':
                    case 'range':
                        baseData.min = '';
                        baseData.max = '';
                        baseData.step = '';
                        break;
                    case 'file':
                        baseData.accept = '';
                        baseData.multiple = false;
                        break;
                    case 'fieldset':
                        baseData.fields = [];
                        baseData.title = 'عنوان گروه';
                        baseData.description = '';
                        break;
                }

                return baseData;
            }
            // ایجاد المنت fieldset (گروه)
            createFieldsetElement(fieldsetData) {
                const element = document.createElement('div');
                element.className = 'form-element fieldset-element';
                element.dataset.fieldId = fieldsetData.id;

                element.innerHTML = `
            <div class="element-actions">
                <button class="element-btn edit-btn" title="ویرایش">
                    <i class="fas fa-edit"></i>
                </button>
                <button class="element-btn copy-btn" title="کپی">
                    <i class="fas fa-copy"></i>
                </button>
                <button class="element-btn move-up-btn" title="انتقال به بالا">
                    <i class="fas fa-arrow-up"></i>
                </button>
                <button class="element-btn move-down-btn" title="انتقال به پایین">
                    <i class="fas fa-arrow-down"></i>
                </button>
                <button class="element-btn delete-btn" title="حذف">
                    <i class="fas fa-trash"></i>
                </button>
            </div>
            <fieldset class="fieldset-group">
                <legend class="fieldset-title">${fieldsetData.title}</legend>
                <div class="fieldset-description">${fieldsetData.description}</div>
                <div class="fieldset-fields"></div>
                <div class="fieldset-add-field">
                    <button class="btn btn-sm btn-primary add-field-to-group" type="button">افزودن فیلد به گروه</button>
                </div>
            </fieldset>
        `;

                // دکمه‌های اکشن
                const editBtn = element.querySelector('.edit-btn');
                const copyBtn = element.querySelector('.copy-btn');
                const moveUpBtn = element.querySelector('.move-up-btn');
                const moveDownBtn = element.querySelector('.move-down-btn');
                const deleteBtn = element.querySelector('.delete-btn');

                editBtn.addEventListener('click', (e) => {
                    e.stopPropagation();
                    this.selectElement(element, fieldsetData);
                });
                copyBtn.addEventListener('click', (e) => {
                    e.stopPropagation();
                    this.duplicateField(fieldsetData);
                });
                moveUpBtn.addEventListener('click', (e) => {
                    e.stopPropagation();
                    this.moveFieldUp(fieldsetData.id);
                });
                moveDownBtn.addEventListener('click', (e) => {
                    e.stopPropagation();
                    this.moveFieldDown(fieldsetData.id);
                });
                deleteBtn.addEventListener('click', (e) => {
                    e.stopPropagation();
                    this.deleteField(fieldsetData.id);
                });

                // افزودن فیلد به گروه
                const addFieldBtn = element.querySelector('.add-field-to-group');
                addFieldBtn.addEventListener('click', () => {
                    // نمایش منوی انتخاب نوع فیلد
                    this.showAddFieldToGroupMenu(fieldsetData.id);
                });

                // اضافه کردن فیلدهای گروه
                const fieldsContainer = element.querySelector('.fieldset-fields');
                fieldsetData.fields.forEach(field => {
                    const fieldElement = this.createFieldElement(field, fieldsetData.id);
                    fieldsContainer.appendChild(fieldElement);
                });

                // انتخاب گروه با کلیک
                element.addEventListener('click', (e) => {
                    e.stopPropagation();
                    this.selectElement(element, fieldsetData);
                });

                return element;
            }

            // نمایش منوی انتخاب نوع فیلد برای افزودن به گروه
            showAddFieldToGroupMenu(groupId) {
                const modal = document.getElementById('addFieldToGroupModal');
                const closeBtn = document.getElementById('closeAddFieldToGroupModal');
                const itemsContainer = modal.querySelector('.field-items-modal');

                // لیست انواع فیلدها (همان sidebar)
                const fieldTypes = [{
                        type: 'text',
                        icon: 'fas fa-font',
                        label: 'فیلد متنی'
                    },
                    {
                        type: 'email',
                        icon: 'fas fa-envelope',
                        label: 'ایمیل'
                    },
                    {
                        type: 'number',
                        icon: 'fas fa-hashtag',
                        label: 'عدد'
                    },
                    {
                        type: 'tel',
                        icon: 'fas fa-phone',
                        label: 'تلفن'
                    },
                    {
                        type: 'password',
                        icon: 'fas fa-lock',
                        label: 'رمز عبور'
                    },
                    {
                        type: 'textarea',
                        icon: 'fas fa-align-left',
                        label: 'متن چندخطی'
                    },
                    {
                        type: 'select',
                        icon: 'fas fa-list',
                        label: 'لیست کشویی'
                    },
                    {
                        type: 'checkbox',
                        icon: 'fas fa-check-square',
                        label: 'چک باکس'
                    },
                    {
                        type: 'radio',
                        icon: 'fas fa-dot-circle',
                        label: 'رادیو باتن'
                    },
                    {
                        type: 'file',
                        icon: 'fas fa-file-upload',
                        label: 'آپلود فایل'
                    },
                    {
                        type: 'date',
                        icon: 'fas fa-calendar',
                        label: 'تاریخ'
                    },
                    {
                        type: 'range',
                        icon: 'fas fa-sliders-h',
                        label: 'محدوده'
                    },
                    {
                        type: 'datetime-local',
                        icon: 'fas fa-clock',
                        label: 'تاریخ و زمان'
                    },
                    {
                        type: 'color',
                        icon: 'fas fa-palette',
                        label: 'انتخاب رنگ'
                    },
                    {
                        type: 'url',
                        icon: 'fas fa-link',
                        label: 'آدرس وب'
                    },
                    {
                        type: 'search',
                        icon: 'fas fa-search',
                        label: 'جستجو'
                    },
                    {
                        type: 'hidden',
                        icon: 'fas fa-eye-slash',
                        label: 'فیلد مخفی'
                    },
                    {
                        type: 'heading',
                        icon: 'fas fa-heading',
                        label: 'عنوان'
                    },
                    {
                        type: 'paragraph',
                        icon: 'fas fa-paragraph',
                        label: 'متن توضیحی'
                    },
                    {
                        type: 'divider',
                        icon: 'fas fa-minus',
                        label: 'خط جداکننده'
                    }
                ];

                // پاک‌سازی و ساخت گزینه‌ها
                itemsContainer.innerHTML = '';
                fieldTypes.forEach(ft => {
                    const item = document.createElement('div');
                    item.className = 'field-item';
                    item.innerHTML = `<i class="${ft.icon}"></i><span>${ft.label}</span>`;
                    item.addEventListener('click', () => {
                        modal.classList.remove('show');
                        this.addField(ft.type, groupId);
                    });
                    itemsContainer.appendChild(item);
                });

                // نمایش modal
                modal.classList.add('show');
                closeBtn.onclick = () => {
                    modal.classList.remove('show');
                };
            }

            // دریافت برچسب پیش‌فرض
            getDefaultLabel(type) {
                const labels = {
                    text: 'فیلد متنی',
                    email: 'آدرس ایمیل',
                    number: 'عدد',
                    tel: 'شماره تلفن',
                    password: 'رمز عبور',
                    textarea: 'متن چندخطی',
                    select: 'لیست کشویی',
                    checkbox: 'چک باکس',
                    radio: 'انتخاب رادیویی',
                    file: 'آپلود فایل',
                    date: 'تاریخ',
                    range: 'محدوده',
                    'datetime-local': 'تاریخ و زمان',
                    color: 'انتخاب رنگ',
                    url: 'آدرس وب',
                    search: 'جستجو',
                    hidden: 'فیلد مخفی',
                    heading: 'عنوان',
                    paragraph: 'متن توضیحی',
                    divider: 'خط جداکننده'
                };
                return labels[type] || 'فیلد';
            }

            // ایجاد المنت فیلد در DOM
            createFieldElement(fieldData, parentGroupId = null) {
                const element = document.createElement('div');
                element.className = 'form-element';
                element.dataset.fieldId = fieldData.id;

                element.innerHTML = `
            <div class="element-actions">
                <button class="element-btn edit-btn" title="ویرایش">
                    <i class="fas fa-edit"></i>
                </button>
                <button class="element-btn copy-btn" title="کپی">
                    <i class="fas fa-copy"></i>
                </button>
                <button class="element-btn move-up-btn" title="انتقال به بالا">
                    <i class="fas fa-arrow-up"></i>
                </button>
                <button class="element-btn move-down-btn" title="انتقال به پایین">
                    <i class="fas fa-arrow-down"></i>
                </button>
                <button class="element-btn delete-btn" title="حذف">
                    <i class="fas fa-trash"></i>
                </button>
            </div>
            ${this.generateFieldHTML(fieldData)}
        `;

                // Event listeners برای دکمه‌ها
                const editBtn = element.querySelector('.edit-btn');
                const copyBtn = element.querySelector('.copy-btn');
                const moveUpBtn = element.querySelector('.move-up-btn');
                const moveDownBtn = element.querySelector('.move-down-btn');
                const deleteBtn = element.querySelector('.delete-btn');

                editBtn.addEventListener('click', (e) => {
                    e.stopPropagation();
                    this.selectElement(element, fieldData);
                });

                copyBtn.addEventListener('click', (e) => {
                    e.stopPropagation();
                    this.duplicateField(fieldData);
                });

                moveUpBtn.addEventListener('click', (e) => {
                    e.stopPropagation();
                    if (parentGroupId) {
                        this.moveFieldUpInGroup(parentGroupId, fieldData.id);
                    } else {
                        this.moveFieldUp(fieldData.id);
                    }
                });

                moveDownBtn.addEventListener('click', (e) => {
                    e.stopPropagation();
                    if (parentGroupId) {
                        this.moveFieldDownInGroup(parentGroupId, fieldData.id);
                    } else {
                        this.moveFieldDown(fieldData.id);
                    }
                });

                deleteBtn.addEventListener('click', (e) => {
                    e.stopPropagation();
                    if (parentGroupId) {
                        this.deleteFieldInGroup(parentGroupId, fieldData.id);
                    } else {
                        this.deleteField(fieldData.id);
                    }
                });

                // انتخاب فیلد با کلیک
                element.addEventListener('click', (e) => {
                    e.stopPropagation();
                    this.selectElement(element, fieldData);
                });

                return element;
            }
            // جابجایی فیلد در گروه به بالا
            moveFieldUpInGroup(groupId, fieldId) {
                const group = this.formData.find(f => f.id === groupId);
                if (!group || group.type !== 'fieldset') return;
                const idx = group.fields.findIndex(f => f.id === fieldId);
                if (idx > 0) {
                    [group.fields[idx], group.fields[idx - 1]] = [group.fields[idx - 1], group.fields[idx]];
                    this.renderForm();
                }
            }

            // جابجایی فیلد در گروه به پایین
            moveFieldDownInGroup(groupId, fieldId) {
                const group = this.formData.find(f => f.id === groupId);
                if (!group || group.type !== 'fieldset') return;
                const idx = group.fields.findIndex(f => f.id === fieldId);
                if (idx < group.fields.length - 1) {
                    [group.fields[idx], group.fields[idx + 1]] = [group.fields[idx + 1], group.fields[idx]];
                    this.renderForm();
                }
            }

            // حذف فیلد از گروه
            deleteFieldInGroup(groupId, fieldId) {
                const group = this.formData.find(f => f.id === groupId);
                if (!group || group.type !== 'fieldset') return;
                group.fields = group.fields.filter(f => f.id !== fieldId);
                this.renderForm();
                this.deselectAll();
            }

            // تولید HTML فیلد
            generateFieldHTML(fieldData) {
                let html = `
            <div class="form-group">
                <label class="form-label">
                    ${fieldData.required ? '<span class="required-indicator">*</span>' : ''}
                    ${fieldData.label}
                </label>
        `;

                switch (fieldData.type) {
                    case 'textarea':
                        html +=
                            `<textarea class="form-control" placeholder="${fieldData.placeholder}" ${fieldData.required ? 'required' : ''}></textarea>`;
                        break;

                    case 'select':
                        html += `<select class="form-control" ${fieldData.required ? 'required' : ''}>`;
                        if (fieldData.placeholder) {
                            html += `<option value="">${fieldData.placeholder}</option>`;
                        }
                        fieldData.options.forEach(option => {
                            html += `<option value="${option.value}">${option.label}</option>`;
                        });
                        html += `</select>`;
                        break;

                    case 'radio':
                        fieldData.options.forEach((option, index) => {
                            html += `
                        <div class="form-check">
                            <input type="radio" id="${fieldData.id}_${index}" name="${fieldData.name}" value="${option.value}" class="form-check-input" ${fieldData.required ? 'required' : ''}>
                            <label class="form-check-label" for="${fieldData.id}_${index}">${option.label}</label>
                        </div>
                    `;
                        });
                        break;

                    case 'checkbox':
                        if (fieldData.options && fieldData.options.length > 1) {
                            fieldData.options.forEach((option, index) => {
                                html += `
                            <div class="form-check">
                                <input type="checkbox" id="${fieldData.id}_${index}" name="${fieldData.name}[]" value="${option.value}" class="form-check-input">
                                <label class="form-check-label" for="${fieldData.id}_${index}">${option.label}</label>
                            </div>
                        `;
                            });
                        } else {
                            html += `
                        <div class="form-check">
                            <input type="checkbox" id="${fieldData.id}" name="${fieldData.name}" class="form-check-input" ${fieldData.required ? 'required' : ''}>
                            <label class="form-check-label" for="${fieldData.id}">${fieldData.placeholder || 'تأیید می‌کنم'}</label>
                        </div>
                    `;
                        }
                        break;

                    default:
                        // فیلدهای خاص
                        if (fieldData.type === 'heading') {
                            html +=
                                `<h3 style="color: #2d3748; margin: 0;">${fieldData.placeholder || fieldData.label}</h3>`;
                        } else if (fieldData.type === 'paragraph') {
                            html +=
                                `<p style="color: #718096; margin: 0; line-height: 1.6;">${fieldData.placeholder || 'متن توضیحی در اینجا قرار می‌گیرد.'}</p>`;
                        } else if (fieldData.type === 'divider') {
                            html +=
                                `<hr style="border: none; height: 2px; background: linear-gradient(to right, #e2e8f0, #cbd5e0, #e2e8f0); margin: 1rem 0;">`;
                        } else {
                            // فیلدهای معمولی
                            const inputAttrs = [];
                            if (fieldData.placeholder) inputAttrs.push(`placeholder="${fieldData.placeholder}"`);
                            if (fieldData.required) inputAttrs.push('required');
                            if (fieldData.min) inputAttrs.push(`min="${fieldData.min}"`);
                            if (fieldData.max) inputAttrs.push(`max="${fieldData.max}"`);
                            if (fieldData.step) inputAttrs.push(`step="${fieldData.step}"`);
                            if (fieldData.accept) inputAttrs.push(`accept="${fieldData.accept}"`);
                            if (fieldData.multiple) inputAttrs.push('multiple');

                            html += `<input type="${fieldData.type}" class="form-control" ${inputAttrs.join(' ')}>`;
                        }
                        break;
                }

                html += `</div>`;
                return html;
            }

            // انتخاب المنت
            selectElement(element, fieldData) {
                this.deselectAll();
                element.classList.add('selected');
                this.selectedElement = element;
                this.showProperties(fieldData);
            }

            // لغو انتخاب همه المنت‌ها
            deselectAll() {
                document.querySelectorAll('.form-element.selected').forEach(el => {
                    el.classList.remove('selected');
                });
                this.selectedElement = null;
                this.hideProperties();
            }

            // نمایش پنل ویژگی‌ها
            showProperties(fieldData) {
                const html = this.generatePropertiesHTML(fieldData);
                this.propertiesContent.innerHTML = html;
                this.setupPropertyEvents(fieldData);
            }

            // مخفی کردن پنل ویژگی‌ها
            hideProperties() {
                this.propertiesContent.innerHTML = `
            <div class="no-selection">
                <i class="fas fa-hand-pointer"></i>
                <p>فیلدی را انتخاب کنید تا تنظیمات آن نمایش داده شود</p>
            </div>
        `;
            }

            // تولید HTML پنل ویژگی‌ها
            generatePropertiesHTML(fieldData) {
                let html = `
            <div class="property-group">
                <h4>تنظیمات کلی</h4>
                <div class="property-item">
                    <label class="property-label">برچسب فیلد</label>
                    <input type="text" class="property-input" data-property="label" value="${fieldData.label}">
                </div>
                <div class="property-item">
                    <label class="property-label">نام فیلد</label>
                    <input type="text" class="property-input" data-property="name" value="${fieldData.name}">
                </div>
                <div class="property-item">
                    <label class="property-label">متن راهنما (Placeholder)</label>
                    <input type="text" class="property-input" data-property="placeholder" value="${fieldData.placeholder}">
                </div>
                <div class="property-item">
                    <div class="checkbox-group">
                        <input type="checkbox" class="property-input" data-property="required" ${fieldData.required ? 'checked' : ''}>
                        <label class="property-label">اجباری</label>
                    </div>
                </div>
                <div class="property-item">
                    <label class="property-label">کلاس CSS</label>
                    <input type="text" class="property-input" data-property="className" value="${fieldData.className}">
                </div>
            </div>
        `;

                // اضافه کردن تنظیمات خاص هر نوع فیلد
                if (['select', 'radio', 'checkbox'].includes(fieldData.type)) {
                    html += this.generateOptionsHTML(fieldData);
                }

                if (['number', 'range'].includes(fieldData.type)) {
                    html += `
                <div class="property-group">
                    <h4>تنظیمات عددی</h4>
                    <div class="property-item">
                        <label class="property-label">حداقل مقدار</label>
                        <input type="number" class="property-input" data-property="min" value="${fieldData.min || ''}">
                    </div>
                    <div class="property-item">
                        <label class="property-label">حداکثر مقدار</label>
                        <input type="number" class="property-input" data-property="max" value="${fieldData.max || ''}">
                    </div>
                    <div class="property-item">
                        <label class="property-label">گام (Step)</label>
                        <input type="number" class="property-input" data-property="step" value="${fieldData.step || ''}">
                    </div>
                </div>
            `;
                }

                if (fieldData.type === 'file') {
                    html += `
                <div class="property-group">
                    <h4>تنظیمات فایل</h4>
                    <div class="property-item">
                        <label class="property-label">نوع فایل‌های مجاز</label>
                        <input type="text" class="property-input" data-property="accept" value="${fieldData.accept || ''}" placeholder=".jpg,.png,.pdf">
                    </div>
                    <div class="property-item">
                        <div class="checkbox-group">
                            <input type="checkbox" class="property-input" data-property="multiple" ${fieldData.multiple ? 'checked' : ''}>
                            <label class="property-label">انتخاب چند فایل</label>
                        </div>
                    </div>
                </div>
            `;
                }

                html += `
            <div class="property-group">
                <h4>اعتبارسنجی</h4>
                <div class="property-item">
                    <label class="property-label">حداقل طول</label>
                    <input type="number" class="property-input" data-property="validation.minLength" value="${fieldData.validation.minLength}">
                </div>
                <div class="property-item">
                    <label class="property-label">حداکثر طول</label>
                    <input type="number" class="property-input" data-property="validation.maxLength" value="${fieldData.validation.maxLength}">
                </div>
                <div class="property-item">
                    <label class="property-label">الگو (RegEx)</label>
                    <input type="text" class="property-input" data-property="validation.pattern" value="${fieldData.validation.pattern}">
                </div>
            </div>
        `;

                return html;
            }

            // تولید HTML گزینه‌ها
            generateOptionsHTML(fieldData) {
                let html = `
            <div class="property-group">
                <h4>گزینه‌ها</h4>
                <div class="options-container">
        `;

                fieldData.options.forEach((option, index) => {
                    html += `
                <div class="option-item">
                    <input type="text" class="property-input option-label" data-option-index="${index}" data-option-property="label" value="${option.label}" placeholder="برچسب گزینه">
                    <input type="text" class="property-input option-value" data-option-index="${index}" data-option-property="value" value="${option.value}" placeholder="مقدار گزینه">
                    <button type="button" class="remove-option" data-option-index="${index}">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            `;
                });

                html += `
                    <button type="button" class="add-option-btn">
                        <i class="fas fa-plus"></i> افزودن گزینه
                    </button>
                </div>
            </div>
        `;

                return html;
            }

            // راه‌اندازی Event های پنل ویژگی‌ها
            setupPropertyEvents(fieldData) {
                // تغییر ویژگی‌های کلی
                this.propertiesContent.querySelectorAll('.property-input').forEach(input => {
                    input.addEventListener('input', (e) => {
                        this.updateFieldProperty(fieldData, e.target.dataset.property, e.target.type ===
                            'checkbox' ? e.target.checked : e.target.value);
                    });
                });

                // مدیریت گزینه‌ها
                this.setupOptionEvents(fieldData);
            }

            // راه‌اندازی Event های گزینه‌ها
            setupOptionEvents(fieldData) {
                // تغییر گزینه‌ها
                this.propertiesContent.querySelectorAll('.option-label, .option-value').forEach(input => {
                    input.addEventListener('input', (e) => {
                        const index = parseInt(e.target.dataset.optionIndex);
                        const property = e.target.dataset.optionProperty;
                        fieldData.options[index][property] = e.target.value;
                        this.updateFieldElement(fieldData);
                    });
                });

                // حذف گزینه
                this.propertiesContent.querySelectorAll('.remove-option').forEach(btn => {
                    btn.addEventListener('click', (e) => {
                        const index = parseInt(e.target.closest('.remove-option').dataset.optionIndex);
                        fieldData.options.splice(index, 1);
                        this.updateFieldElement(fieldData);
                        this.showProperties(fieldData);
                    });
                });

                // اضافه کردن گزینه
                const addBtn = this.propertiesContent.querySelector('.add-option-btn');
                if (addBtn) {
                    addBtn.addEventListener('click', () => {
                        fieldData.options.push({
                            value: `option${fieldData.options.length + 1}`,
                            label: `گزینه ${fieldData.options.length + 1}`
                        });
                        this.updateFieldElement(fieldData);
                        this.showProperties(fieldData);
                    });
                }
            }

            // به‌روزرسانی ویژگی فیلد
            updateFieldProperty(fieldData, property, value) {
                if (property.includes('.')) {
                    const props = property.split('.');
                    fieldData[props[0]][props[1]] = value;
                } else {
                    fieldData[property] = value;
                }
                this.updateFieldElement(fieldData);
            }

            // به‌روزرسانی المنت فیلد در DOM
            updateFieldElement(fieldData) {
                const element = document.querySelector(`[data-field-id="${fieldData.id}"]`);
                if (element) {
                    const formGroup = element.querySelector('.form-group');
                    formGroup.outerHTML = this.generateFieldHTML(fieldData);
                }
            }

            // حذف فیلد
            deleteField(fieldId) {
                if (confirm('آیا از حذف این فیلد مطمئن هستید؟')) {
                    // حذف از DOM
                    const element = document.querySelector(`[data-field-id="${fieldId}"]`);
                    if (element) {
                        element.remove();
                    }

                    // حذف از داده‌ها
                    this.formData = this.formData.filter(field => field.id !== fieldId);

                    // نمایش placeholder اگر فرم خالی شد
                    if (this.formData.length === 0) {
                        this.canvas.querySelector('.canvas-placeholder').style.display = 'block';
                    }

                    // لغو انتخاب
                    this.deselectAll();
                }
            }

            // کپی کردن فیلد
            duplicateField(originalField) {
                this.fieldCounter++;
                const newFieldId = `field_${this.fieldCounter}`;

                // کپی کردن داده‌های فیلد
                const newFieldData = JSON.parse(JSON.stringify(originalField));
                newFieldData.id = newFieldId;
                newFieldData.name = `field_${this.fieldCounter}`;
                newFieldData.label = newFieldData.label + ' (کپی)';

                // پیدا کردن موقعیت فیلد اصلی
                const originalIndex = this.formData.findIndex(field => field.id === originalField.id);

                // اضافه کردن فیلد جدید بعد از فیلد اصلی
                this.formData.splice(originalIndex + 1, 0, newFieldData);

                // ایجاد المنت جدید
                const fieldElement = this.createFieldElement(newFieldData);

                // پیدا کردن المنت اصلی و اضافه کردن المنت جدید بعد از آن
                const originalElement = document.querySelector(`[data-field-id="${originalField.id}"]`);
                originalElement.parentNode.insertBefore(fieldElement, originalElement.nextSibling);

                // انتخاب فیلد جدید
                this.selectElement(fieldElement, newFieldData);

                // انیمیشن ورود
                fieldElement.classList.add('fade-in');
            }

            // انتقال فیلد به بالا
            moveFieldUp(fieldId) {
                const fieldIndex = this.formData.findIndex(field => field.id === fieldId);

                if (fieldIndex > 0) {
                    // جابجایی در آرایه داده‌ها
                    [this.formData[fieldIndex], this.formData[fieldIndex - 1]] = [this.formData[fieldIndex - 1], this
                        .formData[fieldIndex]
                    ];

                    // بازسازی نمایش
                    this.renderForm();
                }
            }

            // انتقال فیلد به پایین
            moveFieldDown(fieldId) {
                const fieldIndex = this.formData.findIndex(field => field.id === fieldId);

                if (fieldIndex < this.formData.length - 1) {
                    // جابجایی در آرایه داده‌ها
                    [this.formData[fieldIndex], this.formData[fieldIndex + 1]] = [this.formData[fieldIndex + 1], this
                        .formData[fieldIndex]
                    ];

                    // بازسازی نمایش
                    this.renderForm();
                }
            }

            // پاک کردن کل canvas
            clearCanvas() {
                if (this.formData.length === 0) return;

                if (confirm('آیا از پاک کردن کل فرم مطمئن هستید؟')) {
                    this.formData = [];
                    this.canvas.innerHTML = `
                <div class="canvas-placeholder">
                    <i class="fas fa-plus-circle"></i>
                    <p>فیلدهای مورد نظر را از سمت راست بکشید و اینجا رها کنید</p>
                </div>
            `;
                    this.deselectAll();
                }
            }

            // نمایش پیش‌نمایش
            showPreview() {
                const previewContent = document.getElementById('previewContent');
                const formHTML = this.generatePreviewHTML();

                previewContent.innerHTML = `
            <div class="preview-form">
                <h3>پیش‌نمایش فرم</h3>
                <form id="previewForm">
                    ${formHTML}
                    <button type="submit" class="btn btn-primary">ارسال فرم</button>
                </form>
            </div>
        `;

                // اضافه کردن validation به فرم preview
                this.setupPreviewValidation();

                document.getElementById('previewModal').classList.add('show');
            }

            // تولید HTML پیش‌نمایش
            generatePreviewHTML() {
                if (this.formData.length === 0) {
                    return '<p>هیچ فیلدی در فرم وجود ندارد.</p>';
                }

                return this.formData.map(field => this.generateFieldHTML(field)).join('');
            }

            // تولید HTML استایل‌دار برای export
            generateStyledFormHTML() {
                if (this.formData.length === 0) {
                    return '<p>هیچ فیلدی در فرم وجود ندارد.</p>';
                }

                return this.formData.map(field => this.generateStyledFieldHTML(field)).join('');
            }

            // تولید HTML استایل‌دار برای هر فیلد
            generateStyledFieldHTML(fieldData) {
                let html = `
            <div class="form-group field-${fieldData.type}">
                <label class="form-label">
                    ${fieldData.required ? '<span class="required-indicator">*</span>' : ''}
                    ${fieldData.label}
                </label>
        `;

                switch (fieldData.type) {
                    case 'textarea':
                        html +=
                            `<textarea class="form-control" name="${fieldData.name}" placeholder="${fieldData.placeholder}" ${fieldData.required ? 'required' : ''}></textarea>`;
                        break;

                    case 'select':
                        html +=
                            `<select class="form-control" name="${fieldData.name}" ${fieldData.required ? 'required' : ''}>`;
                        if (fieldData.placeholder) {
                            html += `<option value="">${fieldData.placeholder}</option>`;
                        }
                        fieldData.options.forEach(option => {
                            html += `<option value="${option.value}">${option.label}</option>`;
                        });
                        html += `</select>`;
                        break;

                    case 'radio':
                        fieldData.options.forEach((option, index) => {
                            html += `
                        <div class="form-check">
                            <input type="radio" id="${fieldData.id}_${index}" name="${fieldData.name}" value="${option.value}" ${fieldData.required ? 'required' : ''}>
                            <label class="form-check-label" for="${fieldData.id}_${index}">${option.label}</label>
                        </div>
                    `;
                        });
                        break;

                    case 'checkbox':
                        if (fieldData.options && fieldData.options.length > 1) {
                            fieldData.options.forEach((option, index) => {
                                html += `
                            <div class="form-check">
                                <input type="checkbox" id="${fieldData.id}_${index}" name="${fieldData.name}[]" value="${option.value}">
                                <label class="form-check-label" for="${fieldData.id}_${index}">${option.label}</label>
                            </div>
                        `;
                            });
                        } else {
                            html += `
                        <div class="form-check">
                            <input type="checkbox" id="${fieldData.id}" name="${fieldData.name}" ${fieldData.required ? 'required' : ''}>
                            <label class="form-check-label" for="${fieldData.id}">${fieldData.placeholder || 'تأیید می‌کنم'}</label>
                        </div>
                    `;
                        }
                        break;

                    default:
                        // فیلدهای خاص
                        if (fieldData.type === 'heading') {
                            html +=
                                `<h3 style="color: #2d3748; margin: 0;">${fieldData.placeholder || fieldData.label}</h3>`;
                        } else if (fieldData.type === 'paragraph') {
                            html +=
                                `<p style="color: #718096; margin: 0; line-height: 1.6;">${fieldData.placeholder || 'متن توضیحی در اینجا قرار می‌گیرد.'}</p>`;
                        } else if (fieldData.type === 'divider') {
                            html +=
                                `<hr style="border: none; height: 2px; background: linear-gradient(to right, #e2e8f0, #cbd5e0, #e2e8f0); margin: 1rem 0;">`;
                        } else {
                            // فیلدهای معمولی
                            const inputAttrs = [];
                            inputAttrs.push(`name="${fieldData.name}"`);
                            if (fieldData.placeholder) inputAttrs.push(`placeholder="${fieldData.placeholder}"`);
                            if (fieldData.required) inputAttrs.push('required');
                            if (fieldData.min) inputAttrs.push(`min="${fieldData.min}"`);
                            if (fieldData.max) inputAttrs.push(`max="${fieldData.max}"`);
                            if (fieldData.step) inputAttrs.push(`step="${fieldData.step}"`);
                            if (fieldData.accept) inputAttrs.push(`accept="${fieldData.accept}"`);
                            if (fieldData.multiple) inputAttrs.push('multiple');

                            html += `<input type="${fieldData.type}" class="form-control" ${inputAttrs.join(' ')}>`;
                        }
                        break;
                }

                html += `</div>`;
                return html;
            }

            // راه‌اندازی validation برای پیش‌نمایش
            setupPreviewValidation() {
                const previewForm = document.getElementById('previewForm');
                if (!previewForm) return;

                previewForm.addEventListener('submit', (e) => {
                    e.preventDefault();

                    let isValid = true;
                    const formData = new FormData(previewForm);
                    const results = {};

                    // اعتبارسنجی فیلدها
                    this.formData.forEach(field => {
                        const value = formData.get(field.name);

                        // بررسی required
                        if (field.required && (!value || value.trim() === '')) {
                            isValid = false;
                            this.showValidationError(field.name, 'این فیلد اجباری است');
                            return;
                        }

                        // بررسی validation rules
                        if (value && field.validation) {
                            if (field.validation.minLength && value.length < parseInt(field.validation
                                    .minLength)) {
                                isValid = false;
                                this.showValidationError(field.name,
                                    `حداقل ${field.validation.minLength} کاراکتر وارد کنید`);
                                return;
                            }

                            if (field.validation.maxLength && value.length > parseInt(field.validation
                                    .maxLength)) {
                                isValid = false;
                                this.showValidationError(field.name,
                                    `حداکثر ${field.validation.maxLength} کاراکتر مجاز است`);
                                return;
                            }

                            if (field.validation.pattern && !new RegExp(field.validation.pattern).test(
                                    value)) {
                                isValid = false;
                                this.showValidationError(field.name, 'فرمت وارد شده صحیح نیست');
                                return;
                            }
                        }

                        results[field.name] = value;
                    });

                    if (isValid) {
                        alert('فرم با موفقیت ارسال شد!\n\nداده‌های ارسالی:\n' + JSON.stringify(results, null,
                            2));
                    }
                });
            }

            // نمایش خطای validation
            showValidationError(fieldName, message) {
                const field = document.querySelector(`[name="${fieldName}"]`);
                if (field) {
                    field.classList.add('invalid');

                    let errorElement = field.parentNode.querySelector('.validation-message');
                    if (!errorElement) {
                        errorElement = document.createElement('div');
                        errorElement.className = 'validation-message';
                        field.parentNode.appendChild(errorElement);
                    }
                    errorElement.textContent = message;
                    errorElement.style.display = 'block';

                    // حذف خطا هنگام تغییر مقدار
                    field.addEventListener('input', () => {
                        field.classList.remove('invalid');
                        errorElement.style.display = 'none';
                    }, {
                        once: true
                    });
                }
            }

            // ذخیره فرم و تولید PDF
            async saveForm() {
                // ذخیره تغییرات فعلی در localStorage
                this.saveToLocalStorage();

                try {
                    // دریافت داده‌ها از localStorage

                    const examData = JSON.parse(localStorage.getItem('examDataForEditor') || '{}');
                    const pdfData = JSON.parse(localStorage.getItem('dataforpdf') || '{}');

                    if (!examData.data || examData.data.length === 0) {
                        alert('هیچ سوالی برای تولید PDF وجود ندارد!');
                        return;
                    }

                    // نمایش لودینگ
                    this.showNotification('در حال تولید PDF...', 'info');

                    // ارسال درخواست به بک‌اند
                    const response = await fetch('/generatepdf', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({
                            questions: examData.data,
                            subject: pdfData.subject,
                            grade: pdfData.grade,
                            chapter: pdfData.chapter,
                            school_name: pdfData.schoolName,
                            teacher_name: pdfData.teacherName,
                            exam_name: examData.name
                        })
                    });

                    if (response.ok) {
                        const html = await response.text();

                        // باز کردن HTML در پنجره جدید برای پرینت
                        const newWindow = window.open('', '_blank');
                        newWindow.document.write(html);
                        newWindow.document.close();

                        // منتظر بارگذاری و سپس پرینت
                        newWindow.onload = () => {
                            setTimeout(() => {
                                newWindow.print();
                                // newWindow.close(); // کاربر خودش ببنده
                            }, 500);
                        };

                        this.showNotification(
                            '✅ HTML آزمون آماده پرینت است! از منوی پرینت مرورگر، "Save as PDF" را انتخاب کنید.',
                            'success');
                    } else {
                        // در صورت خطا، سعی کن JSON بخوانیم
                        const errorText = await response.text();
                        try {
                            const error = JSON.parse(errorText);
                            throw new Error(error.error || 'خطا در تولید HTML');
                        } catch {
                            throw new Error('خطا در تولید HTML: ' + errorText);
                        }
                    }
                } catch (error) {
                    console.error('❌ خطا در تولید HTML:', error);
                    this.showNotification('خطا در تولید HTML: ' + error.message, 'error');
                }
            }

            // نمایش modal بارگذاری
            showLoadModal() {
                this.loadSavedForms();
                document.getElementById('loadModal').classList.add('show');
            }

            // بارگذاری فرم‌های ذخیره شده
            loadSavedForms() {
                const savedForms = JSON.parse(localStorage.getItem('savedForms') || '[]');
                const container = document.getElementById('savedForms');

                if (savedForms.length === 0) {
                    container.innerHTML = '<p>هیچ فرم ذخیره شده‌ای وجود ندارد.</p>';
                    return;
                }

                container.innerHTML = savedForms.map(form => `
            <div class="saved-form-item" data-form-id="${form.id}">
                <div class="saved-form-title">${form.name}</div>
                <div class="saved-form-meta">
                    <span>تاریخ ایجاد: ${form.createdAt}</span>
                    <div class="saved-form-actions">
                        <button class="btn btn-sm btn-primary load-form-btn" data-form-id="${form.id}">بارگذاری</button>
                        <button class="btn btn-sm btn-danger delete-form-btn" data-form-id="${form.id}">حذف</button>
                    </div>
                </div>
            </div>
        `).join('');

                // Event listeners برای دکمه‌ها
                container.querySelectorAll('.load-form-btn').forEach(btn => {
                    btn.addEventListener('click', (e) => {
                        e.stopPropagation();
                        this.loadForm(parseInt(btn.dataset.formId));
                    });
                });

                container.querySelectorAll('.delete-form-btn').forEach(btn => {
                    btn.addEventListener('click', (e) => {
                        e.stopPropagation();
                        this.deleteSavedForm(parseInt(btn.dataset.formId));
                    });
                });
            }

            // بارگذاری فرم
            loadForm() {
                // سعی کن هر دو فرمت (قدیمی و جدید) رو بخون
                const savedData = localStorage.getItem('examDataForEditor');
                console.log(typeof savedData);
                if (!savedData) {
                    console.warn('⚠️ هیچ فرم برای بارگذاری وجود ندارد');
                    return;
                }

                try {
                    const form = JSON.parse(savedData);

                    if (!form || Object.keys(form).length === 0) {
                        alert('فرم مورد نظر یافت نشد!');
                        return;
                    }

                    if (this.formData.length > 0) {
                        if (!confirm('فرم فعلی پاک شده و فرم جدید بارگذاری می‌شود. آیا مطمئن هستید؟')) {
                            return;
                        }
                    }

                    // پاک کردن فرم فعلی
                    this.clearCanvas();

                    // بارگذاری داده‌های جدید بر اساس فرمت
                    if (form.data && Array.isArray(form.data)) {
                        // فرمت قدیمی (SavedForms)
                        this.formData = form.data;
                        this.fieldCounter = Math.max(...this.formData.map(f => parseInt(f.id.split('_')[1]))) || 0;
                    } else if (form.questions && Array.isArray(form.questions)) {
                        // فرمت جدید (از index.html - سوالات)
                        console.log('✅ بارگذاری سوالات:', form.questions);
                        // می‌توانید سوالات رو به فرم تبدیل کنید یا برای نمایش استفاده کنید
                        this.formData = form.questions.map((q, idx) => ({
                            id: `field_${idx + 1}`,
                            type: q.type || 'text',
                            label: q.question || `سوال ${idx + 1}`,
                            value: q.question || '',
                            placeholder: 'سوال',
                            required: false
                        }));
                        this.fieldCounter = this.formData.length;
                    }

                    this.renderForm();
                    this.showNotification('✅ فرم با موفقیت بارگذاری شد', 'success');
                } catch (e) {
                    console.error('❌ خطا در بارگذاری فرم:', e);
                    alert('خطا در بارگذاری فرم: ' + e.message);
                }
            }

            // نمایش فرم بارگذاری شده
            renderForm() {
                // حذف placeholder
                const placeholder = this.canvas.querySelector('.canvas-placeholder');
                if (placeholder) {
                    placeholder.style.display = 'none';
                }

                // پاک کردن canvas
                this.canvas.innerHTML = '';

                if (this.multiStepMode) {
                    // نمایش فقط فیلدهای مرحله فعلی
                    const step = this.steps.find(s => s.id === this.currentStep);
                    if (step) {
                        step.fields.forEach(fieldData => {
                            if (fieldData.type === 'fieldset') {
                                const fieldsetElement = this.createFieldsetElement(fieldData);
                                this.canvas.appendChild(fieldsetElement);
                            } else {
                                const fieldElement = this.createFieldElement(fieldData);
                                this.canvas.appendChild(fieldElement);
                            }
                        });
                    }
                    this.renderStepNavigation();
                } else {
                    // اضافه کردن فیلدها و گروه‌ها
                    this.formData.forEach(fieldData => {
                        if (fieldData.type === 'fieldset') {
                            const fieldsetElement = this.createFieldsetElement(fieldData);
                            this.canvas.appendChild(fieldsetElement);
                        } else {
                            const fieldElement = this.createFieldElement(fieldData);
                            this.canvas.appendChild(fieldElement);
                        }
                    });
                }
            }

            // حذف فرم ذخیره شده
            deleteSavedForm(formId) {
                if (!confirm('آیا از حذف این فرم مطمئن هستید؟')) return;

                const savedForms = JSON.parse(localStorage.getItem('savedForms') || '[]');
                const updatedForms = savedForms.filter(f => f.id !== formId);
                localStorage.setItem('savedForms', JSON.stringify(updatedForms));

                this.loadSavedForms();
                alert('فرم حذف شد!');
            }

            // صادر کردن فرم
            exportForm() {
                if (this.formData.length === 0) {
                    alert('فرم خالی است! ابتدا فیلدهایی اضافه کنید.');
                    return;
                }

                const html = this.generatePrintHTML();
                this.downloadFile('form.html', html, 'text/html');
            }

            // نمایش modal قالب‌ها
            showTemplatesModal() {
                this.loadTemplates();
                document.getElementById('templatesModal').classList.add('show');
            }

            // بارگذاری قالب‌های آماده
            loadTemplates() {
                const templates = this.getTemplates();
                const container = document.getElementById('templatesGrid');

                container.innerHTML = templates.map(template => `
            <div class="template-card" data-template-id="${template.id}">
                <div class="template-icon">
                    <i class="${template.icon}"></i>
                </div>
                <div class="template-title">${template.name}</div>
                <div class="template-description">${template.description}</div>
                <div class="template-fields">
                    <div class="template-field-count">${template.fields.length} فیلد</div>
                </div>
            </div>
        `).join('');

                // Event listeners برای قالب‌ها
                container.querySelectorAll('.template-card').forEach(card => {
                    card.addEventListener('click', () => {
                        const templateId = card.dataset.templateId;
                        this.loadTemplate(templateId);
                    });
                });
            }

            // دریافت قالب‌های آماده
            getTemplates() {
                return [{
                        id: 'contact',
                        name: 'فرم تماس',
                        description: 'فرم ساده برای تماس با شما شامل نام، ایمیل، تلفن و پیام',
                        icon: 'fas fa-envelope',
                        fields: [{
                                type: 'heading',
                                label: 'تماس با ما',
                                placeholder: 'تماس با ما'
                            },
                            {
                                type: 'paragraph',
                                label: 'توضیحات',
                                placeholder: 'لطفاً اطلاعات خود را جهت تماس وارد کنید.'
                            },
                            {
                                type: 'text',
                                label: 'نام و نام خانوادگی',
                                placeholder: 'نام کامل خود را وارد کنید',
                                required: true
                            },
                            {
                                type: 'email',
                                label: 'آدرس ایمیل',
                                placeholder: 'example@domain.com',
                                required: true
                            },
                            {
                                type: 'tel',
                                label: 'شماره تلفن',
                                placeholder: '09123456789',
                                required: true
                            },
                            {
                                type: 'select',
                                label: 'موضوع تماس',
                                options: [{
                                        value: 'support',
                                        label: 'پشتیبانی'
                                    },
                                    {
                                        value: 'sales',
                                        label: 'فروش'
                                    },
                                    {
                                        value: 'general',
                                        label: 'عمومی'
                                    }
                                ],
                                required: true
                            },
                            {
                                type: 'textarea',
                                label: 'پیام شما',
                                placeholder: 'متن پیام خود را اینجا بنویسید...',
                                required: true
                            }
                        ]
                    },
                    {
                        id: 'registration',
                        name: 'فرم ثبت‌نام',
                        description: 'فرم کاملی برای ثبت‌نام کاربران شامل اطلاعات شخصی و حساب کاربری',
                        icon: 'fas fa-user-plus',
                        fields: [{
                                type: 'heading',
                                label: 'ثبت‌نام',
                                placeholder: 'ایجاد حساب کاربری جدید'
                            },
                            {
                                type: 'divider'
                            },
                            {
                                type: 'text',
                                label: 'نام',
                                placeholder: 'نام خود را وارد کنید',
                                required: true
                            },
                            {
                                type: 'text',
                                label: 'نام خانوادگی',
                                placeholder: 'نام خانوادگی خود را وارد کنید',
                                required: true
                            },
                            {
                                type: 'email',
                                label: 'آدرس ایمیل',
                                placeholder: 'ایمیل معتبر وارد کنید',
                                required: true
                            },
                            {
                                type: 'password',
                                label: 'رمز عبور',
                                placeholder: 'حداقل ۸ کاراکتر',
                                required: true
                            },
                            {
                                type: 'password',
                                label: 'تکرار رمز عبور',
                                placeholder: 'رمز عبور را مجدداً وارد کنید',
                                required: true
                            },
                            {
                                type: 'tel',
                                label: 'شماره موبایل',
                                placeholder: '09123456789',
                                required: true
                            },
                            {
                                type: 'date',
                                label: 'تاریخ تولد',
                                required: false
                            },
                            {
                                type: 'radio',
                                label: 'جنسیت',
                                options: [{
                                        value: 'male',
                                        label: 'مرد'
                                    },
                                    {
                                        value: 'female',
                                        label: 'زن'
                                    }
                                ],
                                required: false
                            },
                            {
                                type: 'checkbox',
                                label: 'شرایط و قوانین',
                                placeholder: 'قوانین و مقررات را می‌پذیرم',
                                required: true
                            }
                        ]
                    },
                    {
                        id: 'survey',
                        name: 'فرم نظرسنجی',
                        description: 'قالب نظرسنجی برای جمع‌آوری نظرات و بازخوردهای کاربران',
                        icon: 'fas fa-poll',
                        fields: [{
                                type: 'heading',
                                label: 'نظرسنجی',
                                placeholder: 'نظر شما برای ما مهم است'
                            },
                            {
                                type: 'paragraph',
                                label: 'توضیحات',
                                placeholder: 'لطفاً چند دقیقه از وقت خود را صرف پاسخ به این سوالات کنید.'
                            },
                            {
                                type: 'text',
                                label: 'نام (اختیاری)',
                                placeholder: 'نام خود را وارد کنید',
                                required: false
                            },
                            {
                                type: 'email',
                                label: 'ایمیل (اختیاری)',
                                placeholder: 'example@domain.com',
                                required: false
                            },
                            {
                                type: 'range',
                                label: 'میزان رضایت کلی',
                                min: '1',
                                max: '10',
                                step: '1'
                            },
                            {
                                type: 'radio',
                                label: 'چگونه ما را شناختید؟',
                                options: [{
                                        value: 'search',
                                        label: 'موتورهای جستجو'
                                    },
                                    {
                                        value: 'social',
                                        label: 'شبکه‌های اجتماعی'
                                    },
                                    {
                                        value: 'friend',
                                        label: 'معرفی دوستان'
                                    },
                                    {
                                        value: 'ads',
                                        label: 'تبلیغات'
                                    }
                                ],
                                required: true
                            },
                            {
                                type: 'checkbox',
                                label: 'خدمات مورد استفاده',
                                options: [{
                                        value: 'product1',
                                        label: 'محصول ۱'
                                    },
                                    {
                                        value: 'product2',
                                        label: 'محصول ۲'
                                    },
                                    {
                                        value: 'product3',
                                        label: 'محصول ۳'
                                    },
                                    {
                                        value: 'support',
                                        label: 'پشتیبانی'
                                    }
                                ],
                                required: false
                            },
                            {
                                type: 'textarea',
                                label: 'پیشنهادات و انتقادات',
                                placeholder: 'نظرات خود را اینجا بنویسید...',
                                required: false
                            }
                        ]
                    },
                    {
                        id: 'order',
                        name: 'فرم سفارش',
                        description: 'فرم سفارش آنلاین برای فروشگاه‌های اینترنتی',
                        icon: 'fas fa-shopping-cart',
                        fields: [{
                                type: 'heading',
                                label: 'فرم سفارش',
                                placeholder: 'اطلاعات سفارش خود را وارد کنید'
                            },
                            {
                                type: 'divider'
                            },
                            {
                                type: 'text',
                                label: 'نام و نام خانوادگی',
                                placeholder: 'نام کامل',
                                required: true
                            },
                            {
                                type: 'tel',
                                label: 'شماره تماس',
                                placeholder: '09123456789',
                                required: true
                            },
                            {
                                type: 'email',
                                label: 'ایمیل',
                                placeholder: 'example@domain.com',
                                required: true
                            },
                            {
                                type: 'textarea',
                                label: 'آدرس کامل',
                                placeholder: 'آدرس دقیق برای ارسال...',
                                required: true
                            },
                            {
                                type: 'text',
                                label: 'کد پستی',
                                placeholder: '1234567890',
                                required: true
                            },
                            {
                                type: 'select',
                                label: 'شهر',
                                options: [{
                                        value: 'tehran',
                                        label: 'تهران'
                                    },
                                    {
                                        value: 'isfahan',
                                        label: 'اصفهان'
                                    },
                                    {
                                        value: 'shiraz',
                                        label: 'شیراز'
                                    },
                                    {
                                        value: 'mashhad',
                                        label: 'مشهد'
                                    },
                                    {
                                        value: 'other',
                                        label: 'سایر شهرها'
                                    }
                                ],
                                required: true
                            },
                            {
                                type: 'radio',
                                label: 'روش ارسال',
                                options: [{
                                        value: 'normal',
                                        label: 'ارسال عادی (۳-۵ روز کاری)'
                                    },
                                    {
                                        value: 'express',
                                        label: 'ارسال فوری (۱-۲ روز کاری)'
                                    }
                                ],
                                required: true
                            },
                            {
                                type: 'radio',
                                label: 'روش پرداخت',
                                options: [{
                                        value: 'online',
                                        label: 'پرداخت آنلاین'
                                    },
                                    {
                                        value: 'cash',
                                        label: 'پرداخت در محل'
                                    }
                                ],
                                required: true
                            },
                            {
                                type: 'textarea',
                                label: 'توضیحات اضافی',
                                placeholder: 'توضیحات تکمیلی درباره سفارش...',
                                required: false
                            }
                        ]
                    }
                ];
            }

            // بارگذاری قالب
            loadTemplate(templateId) {
                const templates = this.getTemplates();
                const template = templates.find(t => t.id === templateId);

                if (!template) {
                    alert('قالب مورد نظر یافت نشد!');
                    return;
                }

                if (this.formData.length > 0) {
                    if (!confirm('فرم فعلی پاک شده و قالب جدید بارگذاری می‌شود. آیا مطمئن هستید؟')) {
                        return;
                    }
                }

                // پاک کردن فرم فعلی
                this.clearCanvas();

                // بارگذاری فیلدهای قالب
                this.fieldCounter = 0;
                this.formData = [];

                template.fields.forEach(fieldTemplate => {
                    this.fieldCounter++;
                    const fieldId = `field_${this.fieldCounter}`;

                    const fieldData = {
                        ...fieldTemplate,
                        id: fieldId,
                        name: fieldTemplate.name || `field_${this.fieldCounter}`,
                        validation: fieldTemplate.validation || {
                            minLength: '',
                            maxLength: '',
                            pattern: ''
                        }
                    };

                    this.formData.push(fieldData);
                });

                // نمایش فیلدها
                this.renderForm();

                // بستن modal
                document.getElementById('templatesModal').classList.remove('show');

                alert(`قالب "${template.name}" با موفقیت بارگذاری شد!`);
            }
 // دانلود فایل
            downloadFile(filename, content, mimeType) {
                const blob = new Blob([content], {
                    type: mimeType
                });
                const url = URL.createObjectURL(blob);
                const a = document.createElement('a');
                a.href = url;
                a.download = filename;
                a.click();
                URL.revokeObjectURL(url);
            }
        }

        document.addEventListener('DOMContentLoaded', () => {
            console.log('🔄 شروع بارگذاری فرم ساز...');

            // ============================================
            // ۱. منوی موبایل (با چک وجود المان)
            // ============================================
            const sidebarBtn = document.getElementById('toggleSidebarBtn');
            const sidebarContent = document.getElementById('sidebarContent');
            const propertiesBtn = document.getElementById('togglePropertiesBtn');
            const propertiesContent = document.getElementById('propertiesPanelContent');

            function toggleMenu(content, btn) {
                if (window.innerWidth <= 900 && content && btn) {
                    content.style.display = (content.style.display === 'none' || !content.style.display) ? 'block' :
                        'none';
                    btn.classList.toggle('active');
                }
            }

            if (sidebarBtn && sidebarContent) {
                sidebarBtn.addEventListener('click', () => toggleMenu(sidebarContent, sidebarBtn));
            }
            if (propertiesBtn && propertiesContent) {
                propertiesBtn.addEventListener('click', () => toggleMenu(propertiesContent, propertiesBtn));
            }

            function handleResize() {
                if (window.innerWidth <= 900) {
                    if (sidebarContent) sidebarContent.style.display = 'none';
                    if (propertiesContent) propertiesContent.style.display = 'none';
                } else {
                    if (sidebarContent) sidebarContent.style.display = 'block';
                    if (propertiesContent) propertiesContent.style.display = 'block';
                }
            }
            window.addEventListener('resize', handleResize);
            handleResize();

            // ============================================
            // ۲. راه‌اندازی فرم‌ساز
            // ============================================
            const formBuilder = new FormBuilder();

            // ============================================
            // ۳. بارگذاری از localStorage
            // ============================================
            try {
                const raw = localStorage.getItem('examDataForEditor');
                console.log('📦 محتوای خام localStorage:', raw);

                if (!raw) {
                    console.log('ℹ️ هیچ داده‌ای در localStorage وجود ندارد');
                    return;
                }

                const data = JSON.parse(raw);
                console.log('✅ داده پارس شده:', data);

                let fields = null;

                // فرمت فعلی تو (data)
                if (data.data && Array.isArray(data.data)) {
                    fields = data.data;
                    console.log('📌 فرمت data شناسایی شد، تعداد فیلد:', fields.length);
                }
                // فرمت questions (اگر بعداً استفاده کردی)
                else if (data.questions && Array.isArray(data.questions)) {
                    fields = data.questions.map((q, idx) => {
                        let fieldType = 'text';
                        if (q.type === 'multiple_choice' || q.type === 'radio') fieldType = 'radio';
                        else if (q.type === 'textarea') fieldType = 'textarea';

                        return {
                            id: q.id || `field_${idx + 1}`,
                            type: fieldType,
                            label: q.question || q.label || `سوال ${idx + 1}`,
                            name: q.name || `question_${idx + 1}`,
                            placeholder: q.placeholder || '',
                            required: q.required !== false,
                            options: (q.options || []).map((opt, i) => ({
                                value: typeof opt === 'string' ? `option${i + 1}` : (opt
                                    .value || `option${i + 1}`),
                                label: typeof opt === 'string' ? opt : (opt.label || opt.text ||
                                    `گزینه ${i + 1}`)
                            })),
                            className: '',
                            validation: q.validation || {
                                minLength: '',
                                maxLength: '',
                                pattern: ''
                            }
                        };
                    });
                    console.log('📌 فرمت questions شناسایی شد، تعداد فیلد:', fields.length);
                }

                if (fields && fields.length > 0) {
                    // اطمینان از وجود validation برای همه فیلدها
                    fields = fields.map(f => ({
                        ...f,
                        validation: f.validation || {
                            minLength: '',
                            maxLength: '',
                            pattern: ''
                        },
                        options: f.options || [],
                        className: f.className || '',
                        placeholder: f.placeholder || '',
                        required: !!f.required
                    }));

                    formBuilder.formData = fields;
                    formBuilder.fieldCounter = fields.length;

                    // رندر کردن
                    formBuilder.renderForm();
                    formBuilder.updateFieldCounter();
                    formBuilder.saveToHistory();

                    console.log('🎉 فرم با موفقیت رندر شد. تعداد فیلدها:', formBuilder.formData.length);
                    formBuilder.showNotification(`✅ ${fields.length} سوال بارگذاری شد`, 'success');
                } else {
                    console.warn('⚠️ هیچ فیلدی برای نمایش پیدا نشد');
                }

            } catch (err) {
                console.error('❌ خطا در بارگذاری فرم:', err);
                formBuilder.showNotification('❌ خطا در بارگذاری داده‌ها', 'error');
            }
        });
    </script>
</body>

</html>
