import React, { useEffect, useRef, useState } from 'react';

const Index: React.FC = () => {
    const [darkMode, setDarkMode] = useState<boolean>(false);
    const [activeFaq, setActiveFaq] = useState<number | null>(null);

    // Dark Mode - Load from localStorage on mount
    useEffect(() => {
        if (localStorage.getItem('darkMode') === 'enabled') {
            setDarkMode(true);
        }
    }, []);

    // Apply dark mode class to body
    useEffect(() => {
        if (darkMode) {
            document.body.classList.add('dark-mode');
            localStorage.setItem('darkMode', 'enabled');
        } else {
            document.body.classList.remove('dark-mode');
            localStorage.setItem('darkMode', 'disabled');
        }
    }, [darkMode]);

    // Set HTML lang and dir
    useEffect(() => {
        document.documentElement.lang = 'fa';
        document.documentElement.dir = 'rtl';
    }, []);

    // Scroll Animation
    useEffect(() => {
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

        const handleHeaderScroll = () => {
            const header = document.querySelector('.header');
            if (header) {
                if (window.scrollY > 50) {
                    header.classList.add('scrolled');
                } else {
                    header.classList.remove('scrolled');
                }
            }
        };

        window.addEventListener('scroll', animateOnScroll);
        window.addEventListener('scroll', handleHeaderScroll);
        animateOnScroll();

        return () => {
            window.removeEventListener('scroll', animateOnScroll);
            window.removeEventListener('scroll', handleHeaderScroll);
        };
    }, []);

    // Smooth Scroll for Anchor Links
    useEffect(() => {
        const handleAnchorClick = (e: Event) => {
            const anchor = e.currentTarget as HTMLAnchorElement;
            const href = anchor.getAttribute('href');
            if (href && href.startsWith('#')) {
                e.preventDefault();
                const target = document.querySelector(href);
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start',
                    });
                }
            }
        };

        const anchors = document.querySelectorAll('a[href^="#"]');
        anchors.forEach(anchor => {
            anchor.addEventListener('click', handleAnchorClick);
        });

        return () => {
            anchors.forEach(anchor => {
                anchor.removeEventListener('click', handleAnchorClick);
            });
        };
    }, []);

    const toggleDarkMode = () => {
        setDarkMode(prev => !prev);
    };

    const toggleFaq = (index: number) => {
        setActiveFaq(prev => (prev === index ? null : index));
    };

    const faqData = [
        {
            question: 'آیا واقعاً رایگان است؟',
            answer:
                'بله! نسخه رایگان به شما امکان تولید 5 سوال در هر آزمون را می‌دهد. برای تعداد بیشتر می‌توانید پلن حرفه‌ای را انتخاب کنید.',
        },
        {
            question: 'چه نوع فایل‌هایی پشتیبانی می‌شود؟',
            answer:
                'در حال حاضر فقط فایل‌های PDF با حداکثر حجم 16 مگابایت پشتیبانی می‌شوند. به زودی فرمت‌های دیگر اضافه خواهند شد.',
        },
        {
            question: 'سوالات چقدر دقیق هستند؟',
            answer:
                'هوش مصنوعی ما با دقت بالا سوالات تولید می‌کند، اما همیشه توصیه می‌کنیم قبل از استفاده نهایی، سوالات را بررسی و در صورت نیاز ویرایش کنید.',
        },
        {
            question: 'آیا فایل‌های من امن هستند؟',
            answer:
                'بله! فایل های پس از پردازش از سرورهای ما حذف می‌شوند و هیچ نسخه‌ای از آن‌ها نگهداری نمی‌شود.',
        },
        {
            question: 'آیا می‌توانم سوالات را ویرایش کنم؟',
            answer:
                'بله! پس از تولید سوالات، به ویرایشگر آنلاین منتقل می‌شوید که می‌توانید سوالات را ویرایش، حذف یا تغییر دهید.',
        },
    ];

    return (
        <>
            {/* Header */}
            <header className="app-header">
                <div className="header-content">
                    <div className="header-brand">
                        <div className="brand-icon">
                            <i className="fas fa-brain"></i>
                        </div>
                        <div className="brand-text">
                            <h1>سوال‌ساز هوشمند</h1>
                            <div className="brand-subtitle">تولید سوال با هوش مصنوعی</div>
                        </div>
                    </div>
                    <div className="header-actions">
                        <button
                            className="btn btn-icon"
                            id="darkModeToggle"
                            title="تغییر تم"
                            onClick={toggleDarkMode}
                        >
                            <i className={darkMode ? 'fas fa-sun' : 'fas fa-moon'}></i>
                        </button>
                        <a href="/form" className="btn btn-secondary">
                            <i className="fas fa-book"></i> تولید سوال
                        </a>
                    </div>
                </div>
            </header>

            {/* Hero Section */}
            <section className="hero">
                <div className="hero-content">
                    <h1>تولید سوالات آزمون با هوش مصنوعی 🧠</h1>
                    <p>
                        PDF درس خود را آپلود کنید، در عرض چند ثانیه سوالات حرفه‌ای دریافت کنید!
                        <br />
                        بدون نیاز به ثبت‌نام، کاملاً رایگان
                    </p>
                    <div className="hero-cta">
                        <a href="/form" className="btn btn-white">
                            <i className="fas fa-rocket"></i> همین الان شروع کنید
                        </a>
                        <a
                            href="#how-it-works"
                            className="btn btn-outline"
                            style={{ color: 'white', borderColor: 'white' }}
                        >
                            <i className="fas fa-play-circle"></i> نحوه کار
                        </a>
                    </div>
                </div>
            </section>

            {/* Stats Section */}
            <section className="stats">
                <div className="stats-container">
                    <div className="stat-item animate-on-scroll">
                        <div className="stat-number">12,500+</div>
                        <div className="stat-label">سوال تولید شده</div>
                    </div>
                    <div className="stat-item animate-on-scroll">
                        <div className="stat-number">1,250+</div>
                        <div className="stat-label">معلم راضی</div>
                    </div>
                    <div className="stat-item animate-on-scroll">
                        <div className="stat-number">4.8/5</div>
                        <div className="stat-label">امتیاز کاربران</div>
                    </div>
                    <div className="stat-item animate-on-scroll">
                        <div className="stat-number">30 ثانیه</div>
                        <div className="stat-label">سرعت تولید</div>
                    </div>
                </div>
            </section>

            {/* Features Section */}
            <section className="features" id="features">
                <div className="section-header">
                    <h2 className="section-title">چرا سوال‌ساز هوشمند؟</h2>
                    <p className="section-subtitle">
                        ابزاری حرفه‌ای برای معلمان و اساتید برای صرفه‌جویی در وقت
                    </p>
                </div>
                <div className="features-grid">
                    <div className="feature-card animate-on-scroll">
                        <div className="feature-icon">
                            <i className="fas fa-magic"></i>
                        </div>
                        <h3>هوش مصنوعی پیشرفته</h3>
                        <p>
                            با استفاده از آخرین تکنولوژی‌های AI، سوالات با کیفیت بالا و متنوع تولید
                            می‌کنیم
                        </p>
                    </div>
                    <div className="feature-card animate-on-scroll">
                        <div className="feature-icon">
                            <i className="fas fa-bolt"></i>
                        </div>
                        <h3>سرعت بالا</h3>
                        <p>در کمتر از 30 ثانیه، آزمون کامل شما آماده دانلود است</p>
                    </div>
                    <div className="feature-card animate-on-scroll">
                        <div className="feature-icon">
                            <i className="fas fa-check-double"></i>
                        </div>
                        <h3>تنوع سوالات</h3>
                        <p>سوالات تستی، تشریحی، جاخالی و درست/غلط در یک پلتفرم</p>
                    </div>
                    <div className="feature-card animate-on-scroll">
                        <div className="feature-icon">
                            <i className="fas fa-file-pdf"></i>
                        </div>
                        <h3>خروجی PDF وA4 برای امتحان </h3>
                        <p>فایل PDF با فرمت استاندارد و آماده چاپ دریافت کنید</p>
                    </div>
                    <div className="feature-card animate-on-scroll">
                        <div className="feature-icon">
                            <i className="fas fa-edit"></i>
                        </div>
                        <h3>ویرایشگر آنلاین</h3>
                        <p>قبل از دانلود، سوالات را ویرایش و شخصی‌سازی کنید</p>
                    </div>
                    <div className="feature-card animate-on-scroll">
                        <div className="feature-icon">
                            <i className="fas fa-lock"></i>
                        </div>
                        <h3>امنیت کامل</h3>
                        <p>فایل‌های شما بلافاصله پس از پردازش حذف می‌شوند</p>
                    </div>
                </div>
            </section>

            {/* How It Works */}
            <section className="how-it-works" id="how-it-works">
                <div className="section-header">
                    <h2 className="section-title">چطور کار می‌کند؟</h2>
                    <p className="section-subtitle">فقط 3 قدم تا دریافت آزمون آماده</p>
                </div>
                <div className="steps-container">
                    <div className="step animate-on-scroll">
                        <div className="step-number">1</div>
                        <div className="step-content">
                            <h3>PDF درس را آپلود کنید</h3>
                            <p>
                                فایل PDF جزوه یا کتاب درسی خود را در سیستم بارگذاری کنید. حداکثر حجم
                                16 مگابایت
                            </p>
                        </div>
                    </div>
                    <div className="step animate-on-scroll">
                        <div className="step-number">2</div>
                        <div className="step-content">
                            <h3>تنظیمات را انتخاب کنید</h3>
                            <p>تعداد سوالات، نوع سوالات و سایر جزئیات آزمون را مشخص کنید</p>
                        </div>
                    </div>
                    <div className="step animate-on-scroll">
                        <div className="step-number">3</div>
                        <div className="step-content">
                            <h3>دانلود PDF</h3>
                            <p>
                                پس از تولید، سوالات را ویرایش کنید و فایل PDF نهایی را دانلود کنید
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            {/* Pricing */}
            <section className="pricing" id="pricing">
                <div className="section-header">
                    <h2 className="section-title">پلن‌های قیمت‌گذاری</h2>
                    <p className="section-subtitle">برای هر نیازی، یک پلن مناسب داریم</p>
                </div>
                <div className="pricing-grid">
                    <div className="pricing-card animate-on-scroll">
                        <h3>رایگان</h3>
                        <div className="pricing-price">0 تومان</div>
                        <div className="pricing-period">برای همیشه</div>
                        <ul className="pricing-features">
                            <li>
                                <i className="fas fa-check"></i> 5 سوال در هر آزمون
                            </li>
                            <li>
                                <i className="fas fa-check"></i> تمام انواع سوالات
                            </li>
                            <li>
                                <i className="fas fa-check"></i> خروجی PDF
                            </li>
                            <li>
                                <i className="fas fa-check"></i> ویرایشگر آنلاین
                            </li>
                        </ul>
                        <a href="/form" className="btn btn-outline">
                            شروع رایگان
                        </a>
                    </div>
                    <div className="pricing-card featured animate-on-scroll">
                        <div className="pricing-badge">محبوب‌ترین</div>
                        <h3>حرفه‌ای</h3>
                        <div className="pricing-price">199,000 تومان</div>
                        <div className="pricing-period">ماهانه</div>
                        <ul className="pricing-features">
                            <li>
                                <i className="fas fa-check"></i> 50 سوال در هر آزمون
                            </li>
                            <li>
                                <i className="fas fa-check"></i> تمام انواع سوالات
                            </li>
                            <li>
                                <i className="fas fa-check"></i> خروجی PDF
                            </li>
                            <li>
                                <i className="fas fa-check"></i> ویرایشگر پیشرفته
                            </li>
                            <li>
                                <i className="fas fa-check"></i> پشتیبانی اختصاصی
                            </li>
                        </ul>
                        <a href="/form" className="btn btn-primary">
                            شروع کنید
                        </a>
                    </div>
                    <div className="pricing-card animate-on-scroll">
                        <h3>سازمانی</h3>
                        <div className="pricing-price">تماس بگیرید</div>
                        <div className="pricing-period">سفارشی</div>
                        <ul className="pricing-features">
                            <li>
                                <i className="fas fa-check"></i> نامحدود
                            </li>
                            <li>
                                <i className="fas fa-check"></i> API اختصاصی
                            </li>
                            <li>
                                <i className="fas fa-check"></i> سفارشی‌سازی کامل
                            </li>
                            <li>
                                <i className="fas fa-check"></i> آموزش تیم
                            </li>
                            <li>
                                <i className="fas fa-check"></i> پشتیبانی 24/7
                            </li>
                        </ul>
                        <a href="#" className="btn btn-outline">
                            تماس با ما
                        </a>
                    </div>
                </div>
            </section>

            {/* Testimonials */}
            <section className="testimonials">
                <div className="section-header">
                    <h2 className="section-title">نظرات کاربران</h2>
                    <p className="section-subtitle">معلمان درباره سوال‌ساز چه می‌گویند</p>
                </div>
                <div className="testimonials-grid">
                    <div className="testimonial-card animate-on-scroll">
                        <div className="testimonial-rating">
                            <i className="fas fa-star"></i>
                            <i className="fas fa-star"></i>
                            <i className="fas fa-star"></i>
                            <i className="fas fa-star"></i>
                            <i className="fas fa-star"></i>
                        </div>
                        <p className="testimonial-text">
                            "قبلاً ساعت‌ها برای تهیه سوالات وقت می‌گذاشتم. الان با سوال‌ساز هوشمند،
                            در چند دقیقه آزمون آماده دارم!"
                        </p>
                        <div className="testimonial-author">
                            <div className="author-avatar">م</div>
                            <div className="author-info">
                                <h4>مریم احمدی</h4>
                                <p>دبیر ریاضی - تهران</p>
                            </div>
                        </div>
                    </div>
                    <div className="testimonial-card animate-on-scroll">
                        <div className="testimonial-rating">
                            <i className="fas fa-star"></i>
                            <i className="fas fa-star"></i>
                            <i className="fas fa-star"></i>
                            <i className="fas fa-star"></i>
                            <i className="fas fa-star"></i>
                        </div>
                        <p className="testimonial-text">
                            "سوالات تولید شده واقعاً با کیفیت و متنوع هستند. دانش‌آموزانم هم از تنوع
                            سوالات راضی‌اند."
                        </p>
                        <div className="testimonial-author">
                            <div className="author-avatar">ع</div>
                            <div className="author-info">
                                <h4>علی رضایی</h4>
                                <p>دبیر فیزیک - مشهد</p>
                            </div>
                        </div>
                    </div>
                    <div className="testimonial-card animate-on-scroll">
                        <div className="testimonial-rating">
                            <i className="fas fa-star"></i>
                            <i className="fas fa-star"></i>
                            <i className="fas fa-star"></i>
                            <i className="fas fa-star"></i>
                            <i className="fas fa-star"></i>
                        </div>
                        <p className="testimonial-text">
                            "ابزاری عالی برای معلمان! ویرایشگر آنلاین هم که داره خیلی کارآمده. به
                            همه توصیه می‌کنم."
                        </p>
                        <div className="testimonial-author">
                            <div className="author-avatar">ز</div>
                            <div className="author-info">
                                <h4>زهرا کریمی</h4>
                                <p>دبیر شیمی - اصفهان</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            {/* FAQ */}
            <section className="faq" id="faq">
                <div className="section-header">
                    <h2 className="section-title">سوالات متداول</h2>
                    <p className="section-subtitle">پاسخ سوالات رایج درباره سوال‌ساز</p>
                </div>
                <div className="faq-container">
                    {faqData.map((item, index) => (
                        <div
                            key={index}
                            className={`faq-item animate-on-scroll ${
                                activeFaq === index ? 'active' : ''
                            }`}
                        >
                            <div className="faq-question" onClick={() => toggleFaq(index)}>
                                <span>{item.question}</span>
                                <i className="fas fa-chevron-down"></i>
                            </div>
                            <div className="faq-answer">
                                <div className="faq-answer-content">{item.answer}</div>
                            </div>
                        </div>
                    ))}
                </div>
            </section>

            {/* CTA Section */}
            <section className="cta">
                <div className="cta-content">
                    <h2>همین الان شروع کنید! 🚀</h2>
                    <p>هزاران معلم به ما اعتماد کرده‌اند. شما هم بپیوندید!</p>
                    <a href="/form" className="btn btn-white btn-lg">
                        <i className="fas fa-rocket"></i> تولید سوال رایگان
                    </a>
                </div>
            </section>

            {/* Footer */}
            <footer className="footer">
                <div className="footer-content">
                    <div className="footer-section">
                        <h3>
                            <i className="fas fa-brain"></i> سوال‌ساز هوشمند
                        </h3>
                        <p style={{ color: 'rgba(255,255,255,0.7)', lineHeight: 1.8 }}>
                            ابزار هوشمند تولید سوالات آزمون برای معلمان و اساتید. صرفه‌جویی در وقت،
                            افزایش کیفیت.
                        </p>
                    </div>
                    <div className="footer-section">
                        <h3>دسترسی سریع</h3>
                        <ul className="footer-links">
                            <li>
                                <a href="#features">ویژگی‌ها</a>
                            </li>
                            <li>
                                <a href="#how-it-works">نحوه کار</a>
                            </li>
                            <li>
                                <a href="#pricing">قیمت‌ها</a>
                            </li>
                            <li>
                                <a href="#faq">سوالات متداول</a>
                            </li>
                        </ul>
                    </div>
                    <div className="footer-section">
                        <h3>پشتیبانی</h3>
                        <ul className="footer-links">
                            <li>
                                <a href="#">راهنما</a>
                            </li>
                            <li>
                                <a href="#">تماس با ما</a>
                            </li>
                            <li>
                                <a href="#">گزارش مشکل</a>
                            </li>
                            <li>
                                <a href="#">درخواست ویژگی</a>
                            </li>
                        </ul>
                    </div>
                    <div className="footer-section">
                        <h3>قوانین</h3>
                        <ul className="footer-links">
                            <li>
                                <a href="#">حریم خصوصی</a>
                            </li>
                            <li>
                                <a href="#">شرایط استفاده</a>
                            </li>
                            <li>
                                <a href="#">سیاست بازپرداخت</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div className="footer-bottom">
                    <p>© 2024 سوال‌ساز هوشمند. تمامی حقوق محفوظ است.</p>
                </div>
            </footer>
        </>
    );
};

export default Index;
