// Dashboard JavaScript
class Dashboard {
    constructor() {
        this.currentPage = 'overview';
        this.forms = JSON.parse(localStorage.getItem('savedForms') || '[]');
        this.responses = JSON.parse(localStorage.getItem('formResponses') || '[]');
        this.settings = JSON.parse(localStorage.getItem('dashboardSettings') || '{}');
        this.init();
    }

    init() {
        this.setupNavigation();
        this.setupEventListeners();
        this.loadUserInfo();
        this.loadStats();
        this.loadCharts();
        this.loadRecentActivity();
        this.loadForms();
        this.applyTheme();
    }

    // Setup Navigation
    setupNavigation() {
        const navItems = document.querySelectorAll('.nav-item');
        navItems.forEach(item => {
            item.addEventListener('click', (e) => {
                e.preventDefault();
                const page = item.dataset.page;
                if (page) {
                    this.switchPage(page);
                }
            });
        });

        // Sidebar Toggle for Mobile
        const sidebarToggle = document.getElementById('sidebarToggle');
        if (sidebarToggle) {
            sidebarToggle.addEventListener('click', () => {
                document.querySelector('.dashboard-sidebar').classList.toggle('open');
            });
        }
    }

    // Switch Page
    switchPage(pageName) {
        // Update active nav item
        document.querySelectorAll('.nav-item').forEach(item => {
            item.classList.remove('active');
            if (item.dataset.page === pageName) {
                item.classList.add('active');
            }
        });

        // Update active content page
        document.querySelectorAll('.content-page').forEach(page => {
            page.classList.remove('active');
        });
        document.getElementById(`${pageName}Page`).classList.add('active');

        // Update page title
        const titles = {
            overview: 'داشبورد',
            forms: 'مدیریت فرم‌ها',
            responses: 'پاسخ‌های دریافتی',
            analytics: 'تحلیل و گزارش',
            templates: 'قالب‌های آماده',
            settings: 'تنظیمات',
            help: 'راهنما و پشتیبانی'
        };
        document.querySelector('.page-title').textContent = titles[pageName] || 'داشبورد';

        this.currentPage = pageName;

        // Load page specific data
        if (pageName === 'forms') {
            this.loadForms();
        } else if (pageName === 'responses') {
            this.loadResponses();
        } else if (pageName === 'templates') {
            this.loadTemplates();
        }

        // Close sidebar on mobile
        if (window.innerWidth <= 768) {
            document.querySelector('.dashboard-sidebar').classList.remove('open');
        }
    }

    // Setup Event Listeners
    setupEventListeners() {
        // Theme Toggle
        document.getElementById('themeToggle').addEventListener('click', () => {
            this.toggleTheme();
        });

        // Logout
        document.getElementById('logoutBtn').addEventListener('click', () => {
            this.logout();
        });

        // Search Forms
        const searchForms = document.getElementById('searchForms');
        if (searchForms) {
            searchForms.addEventListener('input', (e) => {
                this.searchForms(e.target.value);
            });
        }

        // Filter Forms
        const filterForms = document.getElementById('filterForms');
        if (filterForms) {
            filterForms.addEventListener('change', (e) => {
                this.filterForms(e.target.value);
            });
        }

        // Save Settings
        const saveSettings = document.getElementById('saveSettings');
        if (saveSettings) {
            saveSettings.addEventListener('click', () => {
                this.saveSettings();
            });
        }

        // Quick Actions
        document.querySelectorAll('[data-action]').forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.preventDefault();
                const action = btn.dataset.action;
                this.handleQuickAction(action);
            });
        });
    }

    // Load User Info
    loadUserInfo() {
        const userName = localStorage.getItem('userName') || 'کاربر مهمان';
        document.getElementById('userName').textContent = userName;
        const displayName = document.getElementById('displayName');
        if (displayName) {
            displayName.value = userName;
        }
    }

    // Load Stats
    loadStats() {
        const stats = this.calculateStats();
        
        document.getElementById('totalForms').textContent = stats.totalForms;
        document.getElementById('totalResponses').textContent = stats.totalResponses;
        document.getElementById('totalViews').textContent = stats.totalViews;
        document.getElementById('conversionRate').textContent = stats.conversionRate + '%';
        document.getElementById('formCount').textContent = stats.totalForms;
        document.getElementById('responseCount').textContent = stats.totalResponses;
    }

    // Calculate Stats
    calculateStats() {
        const totalForms = this.forms.length;
        const totalResponses = this.responses.length;
        const totalViews = this.forms.reduce((sum, form) => sum + (form.views || 0), 0);
        const conversionRate = totalViews > 0 ? Math.round((totalResponses / totalViews) * 100) : 0;

        return {
            totalForms,
            totalResponses,
            totalViews,
            conversionRate
        };
    }

    // Load Charts
    loadCharts() {
        this.loadResponsesChart();
        this.loadFormsChart();
    }

    // Load Responses Chart
    loadResponsesChart() {
        const ctx = document.getElementById('responsesChart');
        if (!ctx) return;

        // Generate sample data for last 7 days
        const labels = [];
        const data = [];
        for (let i = 6; i >= 0; i--) {
            const date = new Date();
            date.setDate(date.getDate() - i);
            labels.push(date.toLocaleDateString('fa-IR', { month: 'short', day: 'numeric' }));
            data.push(Math.floor(Math.random() * 50) + 10);
        }

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'تعداد پاسخ',
                    data: data,
                    borderColor: 'rgb(102, 126, 234)',
                    backgroundColor: 'rgba(102, 126, 234, 0.1)',
                    tension: 0.4,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    }

    // Load Forms Chart
    loadFormsChart() {
        const ctx = document.getElementById('formsChart');
        if (!ctx) return;

        const formNames = this.forms.slice(0, 5).map(f => f.name || 'بدون نام');
        const formResponses = this.forms.slice(0, 5).map(() => Math.floor(Math.random() * 100));

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: formNames,
                datasets: [{
                    label: 'تعداد پاسخ',
                    data: formResponses,
                    backgroundColor: [
                        'rgba(102, 126, 234, 0.8)',
                        'rgba(118, 75, 162, 0.8)',
                        'rgba(72, 187, 120, 0.8)',
                        'rgba(237, 137, 54, 0.8)',
                        'rgba(66, 153, 225, 0.8)'
                    ],
                    borderRadius: 8
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    }

    // Load Recent Activity
    loadRecentActivity() {
        const activityList = document.getElementById('activityList');
        if (!activityList) return;

        const activities = [
            { icon: 'fas fa-plus-circle', color: '#667eea', title: 'فرم جدید ایجاد شد', desc: 'فرم "تماس با ما" ایجاد شد', time: '5 دقیقه پیش' },
            { icon: 'fas fa-inbox', color: '#48bb78', title: 'پاسخ جدید دریافت شد', desc: 'یک پاسخ جدید در فرم "ثبت‌نام"', time: '15 دقیقه پیش' },
            { icon: 'fas fa-edit', color: '#ed8936', title: 'فرم ویرایش شد', desc: 'فرم "نظرسنجی" به‌روزرسانی شد', time: '1 ساعت پیش' },
            { icon: 'fas fa-download', color: '#4299e1', title: 'خروجی گرفته شد', desc: 'داده‌های فرم "سفارش" صادر شد', time: '2 ساعت پیش' },
            { icon: 'fas fa-trash', color: '#f56565', title: 'فرم حذف شد', desc: 'فرم "قدیمی" حذف شد', time: '3 ساعت پیش' }
        ];

        activityList.innerHTML = activities.map(activity => `
            <div class="activity-item">
                <div class="activity-icon" style="background: ${activity.color}">
                    <i class="${activity.icon}"></i>
                </div>
                <div class="activity-content">
                    <h4>${activity.title}</h4>
                    <p>${activity.desc}</p>
                </div>
                <div class="activity-time">${activity.time}</div>
            </div>
        `).join('');
    }

    // Load Forms
    loadForms() {
        const formsGrid = document.getElementById('formsGrid');
        if (!formsGrid) return;

        if (this.forms.length === 0) {
            formsGrid.innerHTML = `
                <div style="grid-column: 1/-1; text-align: center; padding: 3rem;">
                    <i class="fas fa-inbox" style="font-size: 4rem; color: var(--text-muted); margin-bottom: 1rem;"></i>
                    <h3 style="color: var(--text-secondary);">هیچ فرمی وجود ندارد</h3>
                    <p style="color: var(--text-muted); margin-top: 0.5rem;">برای شروع، اولین فرم خود را ایجاد کنید</p>
                    <a href="index.html" class="btn btn-primary" style="margin-top: 1rem;">
                        <i class="fas fa-plus"></i>
                        ایجاد فرم جدید
                    </a>
                </div>
            `;
            return;
        }

        formsGrid.innerHTML = this.forms.map(form => `
            <div class="form-card" data-form-id="${form.id}">
                <div class="form-card-header">
                    <div class="form-card-title">${form.name}</div>
                    <div class="form-card-meta">
                        <span><i class="fas fa-calendar"></i> ${form.createdAt || 'نامشخص'}</span>
                        <span><i class="fas fa-edit"></i> ${form.updatedAt || 'نامشخص'}</span>
                    </div>
                </div>
                <div class="form-card-body">
                    <div class="form-card-stats">
                        <div class="form-stat">
                            <i class="fas fa-file-alt"></i>
                            <span>${form.data?.length || 0} فیلد</span>
                        </div>
                        <div class="form-stat">
                            <i class="fas fa-inbox"></i>
                            <span>${Math.floor(Math.random() * 50)} پاسخ</span>
                        </div>
                        <div class="form-stat">
                            <i class="fas fa-eye"></i>
                            <span>${Math.floor(Math.random() * 200)} بازدید</span>
                        </div>
                    </div>
                    <div class="form-card-actions">
                        <button class="icon-btn" onclick="dashboard.editForm(${form.id})" title="ویرایش">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="icon-btn" onclick="dashboard.duplicateForm(${form.id})" title="کپی">
                            <i class="fas fa-copy"></i>
                        </button>
                        <button class="icon-btn" onclick="dashboard.exportForm(${form.id})" title="صادر کردن">
                            <i class="fas fa-download"></i>
                        </button>
                        <button class="icon-btn" onclick="dashboard.deleteForm(${form.id})" title="حذف">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </div>
            </div>
        `).join('');
    }

    // Load Responses
    loadResponses() {
        const responsesTable = document.getElementById('responsesTable');
        if (!responsesTable) return;

        if (this.responses.length === 0) {
            responsesTable.innerHTML = `
                <div style="text-align: center; padding: 3rem;">
                    <i class="fas fa-inbox" style="font-size: 4rem; color: var(--text-muted); margin-bottom: 1rem;"></i>
                    <h3 style="color: var(--text-secondary);">هیچ پاسخی دریافت نشده است</h3>
                    <p style="color: var(--text-muted); margin-top: 0.5rem;">پاسخ‌های دریافتی از فرم‌های شما در اینجا نمایش داده می‌شود</p>
                </div>
            `;
            return;
        }

        // Display responses table
        responsesTable.innerHTML = `
            <table style="width: 100%; background: var(--bg-primary); border-radius: 12px; overflow: hidden;">
                <thead style="background: var(--bg-secondary);">
                    <tr>
                        <th style="padding: 1rem; text-align: right;">شناسه</th>
                        <th style="padding: 1rem; text-align: right;">نام فرم</th>
                        <th style="padding: 1rem; text-align: right;">تاریخ</th>
                        <th style="padding: 1rem; text-align: right;">عملیات</th>
                    </tr>
                </thead>
                <tbody>
                    ${this.responses.map((response, index) => `
                        <tr style="border-top: 1px solid var(--border-color);">
                            <td style="padding: 1rem;">#${index + 1}</td>
                            <td style="padding: 1rem;">${response.formName || 'نامشخص'}</td>
                            <td style="padding: 1rem;">${response.date || 'نامشخص'}</td>
                            <td style="padding: 1rem;">
                                <button class="icon-btn" onclick="dashboard.viewResponse(${response.id})">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="icon-btn" onclick="dashboard.deleteResponse(${response.id})">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    `).join('')}
                </tbody>
            </table>
        `;
    }

    // Load Templates
    loadTemplates() {
        const templatesGrid = document.getElementById('templatesGrid');
        if (!templatesGrid) return;

        const templates = [
            { id: 'contact', name: 'فرم تماس', icon: 'fas fa-envelope', desc: 'فرم ساده برای تماس با شما' },
            { id: 'registration', name: 'فرم ثبت‌نام', icon: 'fas fa-user-plus', desc: 'ثبت‌نام کاربران جدید' },
            { id: 'survey', name: 'نظرسنجی', icon: 'fas fa-poll', desc: 'جمع‌آوری نظرات کاربران' },
            { id: 'order', name: 'فرم سفارش', icon: 'fas fa-shopping-cart', desc: 'سفارش آنلاین محصولات' }
        ];

        templatesGrid.innerHTML = `
            <div style="grid-column: 1/-1; margin-bottom: 2rem;">
                <p style="color: var(--text-secondary);">با استفاده از قالب‌های آماده، می‌توانید به سرعت فرم‌های حرفه‌ای ایجاد کنید</p>
            </div>
            ${templates.map(template => `
                <div class="form-card" onclick="dashboard.useTemplate('${template.id}')">
                    <div class="form-card-header" style="text-align: center; padding: 2rem;">
                        <i class="${template.icon}" style="font-size: 3rem; color: var(--primary); margin-bottom: 1rem;"></i>
                        <div class="form-card-title">${template.name}</div>
                        <p style="color: var(--text-secondary); font-size: 0.9rem; margin-top: 0.5rem;">${template.desc}</p>
                    </div>
                    <div class="form-card-body" style="text-align: center;">
                        <button class="btn btn-primary" style="width: 100%;">
                            <i class="fas fa-plus"></i>
                            استفاده از قالب
                        </button>
                    </div>
                </div>
            `).join('')}
        `;
    }

    // Form Actions
    editForm(formId) {
        window.location.href = `index.html?edit=${formId}`;
    }

    duplicateForm(formId) {
        const form = this.forms.find(f => f.id === formId);
        if (form) {
            const newForm = JSON.parse(JSON.stringify(form));
            newForm.id = Date.now();
            newForm.name = form.name + ' (کپی)';
            this.forms.push(newForm);
            localStorage.setItem('savedForms', JSON.stringify(this.forms));
            this.loadForms();
            this.showNotification('فرم با موفقیت کپی شد', 'success');
        }
    }

    exportForm(formId) {
        const form = this.forms.find(f => f.id === formId);
        if (form) {
            const dataStr = JSON.stringify(form, null, 2);
            const dataBlob = new Blob([dataStr], { type: 'application/json' });
            const url = URL.createObjectURL(dataBlob);
            const link = document.createElement('a');
            link.href = url;
            link.download = `${form.name}.json`;
            link.click();
            URL.revokeObjectURL(url);
            this.showNotification('فرم صادر شد', 'success');
        }
    }

    deleteForm(formId) {
        if (confirm('آیا از حذف این فرم مطمئن هستید؟')) {
            this.forms = this.forms.filter(f => f.id !== formId);
            localStorage.setItem('savedForms', JSON.stringify(this.forms));
            this.loadForms();
            this.loadStats();
            this.showNotification('فرم حذف شد', 'success');
        }
    }

    useTemplate(templateId) {
        window.location.href = `index.html?template=${templateId}`;
    }

    // Search Forms
    searchForms(query) {
        const cards = document.querySelectorAll('.form-card');
        const lowerQuery = query.toLowerCase();
        
        cards.forEach(card => {
            const title = card.querySelector('.form-card-title').textContent.toLowerCase();
            if (title.includes(lowerQuery)) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
    }

    // Filter Forms
    filterForms(filter) {
        // Implementation for filtering forms
        console.log('Filter:', filter);
    }

    // Quick Actions
    handleQuickAction(action) {
        switch (action) {
            case 'import':
                this.importForm();
                break;
            case 'export':
                this.exportAllData();
                break;
            case 'backup':
                this.backupData();
                break;
        }
    }

    importForm() {
        const input = document.createElement('input');
        input.type = 'file';
        input.accept = '.json';
        input.onchange = (e) => {
            const file = e.target.files[0];
            const reader = new FileReader();
            reader.onload = (event) => {
                try {
                    const form = JSON.parse(event.target.result);
                    form.id = Date.now();
                    this.forms.push(form);
                    localStorage.setItem('savedForms', JSON.stringify(this.forms));
                    this.loadForms();
                    this.loadStats();
                    this.showNotification('فرم با موفقیت وارد شد', 'success');
                } catch (error) {
                    this.showNotification('خطا در وارد کردن فرم', 'error');
                }
            };
            reader.readAsText(file);
        };
        input.click();
    }

    exportAllData() {
        const data = {
            forms: this.forms,
            responses: this.responses,
            settings: this.settings,
            exportDate: new Date().toISOString()
        };
        const dataStr = JSON.stringify(data, null, 2);
        const dataBlob = new Blob([dataStr], { type: 'application/json' });
        const url = URL.createObjectURL(dataBlob);
        const link = document.createElement('a');
        link.href = url;
        link.download = `form-builder-backup-${Date.now()}.json`;
        link.click();
        URL.revokeObjectURL(url);
        this.showNotification('داده‌ها صادر شد', 'success');
    }

    backupData() {
        this.exportAllData();
    }

    // Theme
    toggleTheme() {
        document.body.classList.toggle('dark-mode');
        const isDark = document.body.classList.contains('dark-mode');
        document.getElementById('themeToggle').innerHTML = isDark ? '<i class="fas fa-sun"></i>' : '<i class="fas fa-moon"></i>';
        localStorage.setItem('dashboardTheme', isDark ? 'dark' : 'light');
        this.showNotification(isDark ? 'حالت تاریک فعال شد' : 'حالت روشن فعال شد', 'info');
    }

    applyTheme() {
        const theme = localStorage.getItem('dashboardTheme') || 'light';
        if (theme === 'dark') {
            document.body.classList.add('dark-mode');
            document.getElementById('themeToggle').innerHTML = '<i class="fas fa-sun"></i>';
        }
    }

    // Settings
    saveSettings() {
        const displayName = document.getElementById('displayName').value;
        const userEmail = document.getElementById('userEmail').value;
        const themeSelect = document.getElementById('themeSelect').value;
        const primaryColor = document.getElementById('primaryColor').value;
        
        localStorage.setItem('userName', displayName);
        document.getElementById('userName').textContent = displayName;
        
        this.settings = {
            displayName,
            userEmail,
            theme: themeSelect,
            primaryColor,
            notifyResponse: document.getElementById('notifyResponse').checked,
            notifyEmail: document.getElementById('notifyEmail').checked
        };
        
        localStorage.setItem('dashboardSettings', JSON.stringify(this.settings));
        this.showNotification('تنظیمات ذخیره شد', 'success');
    }

    // Logout
    logout() {
        if (confirm('آیا می‌خواهید از حساب کاربری خود خارج شوید؟')) {
            localStorage.removeItem('userName');
            window.location.reload();
        }
    }

    // Notification
    showNotification(message, type = 'info') {
        const existing = document.querySelector('.notification');
        if (existing) existing.remove();
        
        const notification = document.createElement('div');
        notification.className = `notification notification-${type}`;
        notification.innerHTML = `
            <i class="fas fa-${type === 'success' ? 'check-circle' : type === 'error' ? 'times-circle' : 'info-circle'}"></i>
            <span>${message}</span>
        `;
        
        notification.style.cssText = `
            position: fixed;
            top: 20px;
            right: 20px;
            background: var(--bg-primary);
            padding: 1rem 1.5rem;
            border-radius: 12px;
            box-shadow: var(--shadow-lg);
            display: flex;
            align-items: center;
            gap: 0.75rem;
            z-index: 10000;
            transform: translateX(400px);
            transition: transform 0.3s ease;
        `;
        
        if (type === 'success') {
            notification.style.borderLeft = '4px solid var(--success)';
        } else if (type === 'error') {
            notification.style.borderLeft = '4px solid var(--danger)';
        } else {
            notification.style.borderLeft = '4px solid var(--info)';
        }
        
        document.body.appendChild(notification);
        
        setTimeout(() => notification.style.transform = 'translateX(0)', 10);
        setTimeout(() => {
            notification.style.transform = 'translateX(400px)';
            setTimeout(() => notification.remove(), 300);
        }, 3000);
    }
}

// Initialize Dashboard
let dashboard;
document.addEventListener('DOMContentLoaded', () => {
    dashboard = new Dashboard();
});
