
document.addEventListener('DOMContentLoaded', function() {
    // Set current year in footer
    document.getElementById('currentYear').textContent = new Date().getFullYear();
    
    // Initialize Lucide icons
    lucide.createIcons();
    
    // Initialize language
    let currentLanguage = 'ar';
    loadTranslations();
    
    // Navbar scroll effect
    const navbar = document.getElementById('mainNav');
    window.addEventListener('scroll', function() {
        if (window.scrollY > 50) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    });
    
    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            
            const targetId = this.getAttribute('href');
            if (targetId === '#') return;
            
            const targetElement = document.querySelector(targetId);
            if (targetElement) {
                const navbarHeight = document.getElementById('mainNav').offsetHeight;
                const targetPosition = targetElement.getBoundingClientRect().top + window.pageYOffset - navbarHeight;
                
                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });
                
                // Close mobile menu if open
                const navbarToggler = document.querySelector('.navbar-toggler');
                const navbarCollapse = document.querySelector('.navbar-collapse');
                if (navbarCollapse.classList.contains('show')) {
                    navbarToggler.click();
                }
            }
        });
    });
    
    // Language switcher
    const languageSwitcher = document.getElementById('languageSwitcher');
    languageSwitcher.addEventListener('click', function() {
        currentLanguage = currentLanguage === 'ar' ? 'en' : 'ar';
        applyLanguage(currentLanguage);
    });
    
    // Contact form submission (placeholder)
    const contactForm = document.getElementById('contactForm');
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();
            alert(translations[currentLanguage].formSubmitted || 'Form submitted successfully!');
        });
    }
    
    // Translations object
    function loadTranslations() {
        window.translations = {
            ar: {
                // Navbar
                "services": "الخدمات",
                "products": "المنتجات",
                "contact": "تواصل معنا",
                "about": "من نحن",
                "callUs": "اتصل بنا",
                
                // Hero
                "bestFinishingServices": "أفضل خدمات التشطيبات",
                "forHomeOrBusiness": "لمنزلك أو شركتك",
                "qualityDescription": "نقدم خدمات تشطيب متكاملة بأعلى جودة وأفضل الأسعار لتحويل رؤيتك إلى واقع",
                "contactUs": "تواصل معنا",
                "exploreServices": "استكشف خدماتنا",
                
                // Services
                "servicesTitle": "خدماتنا",
                "servicesDescription": "نقدم مجموعة متكاملة من خدمات التشطيب عالية الجودة لتلبية احتياجاتك المختلفة",
                "homeFinishing": "تشطيبات المنازل",
                "homeFinishingDesc": "نقدم خدمات تشطيب متكاملة للمنازل والشقق بأعلى جودة، من البداية حتى التسليم",
                "commercialFinishing": "تشطيبات تجارية",
                "commercialFinishingDesc": "خدمات تشطيب احترافية للمكاتب والمتاجر والمساحات التجارية بتصميمات عصرية",
                "maintenanceServices": "خدمات الصيانة",
                "maintenanceServicesDesc": "صيانة دورية وطارئة لجميع أعمال التشطيبات مع ضمان الجودة والسرعة في التنفيذ",
                "requestService": "اطلب الخدمة",
                "getFreeQuote": "احصل على عرض سعر مجاني",
                
                // Products
                "productsTitle": "منتجاتنا",
                "productsDescription": "نقدم مجموعة متنوعة من المنتجات عالية الجودة لتشطيب منزلك أو شركتك",
                "woodenFloors": "أرضيات خشبية",
                "modernPaints": "دهانات حديثة",
                "gypsumDecors": "ديكورات جبسية",
                "woodenDoors": "أبواب خشبية",
                "floors": "أرضيات",
                "paints": "دهانات",
                "decors": "ديكورات",
                "doors": "أبواب",
                "inquireAboutProduct": "استفسر عن المنتج",
                "viewAllProducts": "استعرض جميع المنتجات",
                
                // About
                "aboutTitle": "من نحن",
                "aboutDesc1": "شركة متخصصة في مجال التشطيبات والديكورات الداخلية منذ أكثر من 10 سنوات. نعمل على تقديم أفضل الحلول المتكاملة للتصميم والتنفيذ لمشاريع المنازل والشركات.",
                "aboutDesc2": "نعتمد على فريق متكامل من المهندسين والفنيين ذوي الخبرة العالية، ونستخدم أحدث التقنيات والمواد في تنفيذ مشاريعنا لضمان الجودة والدقة في العمل.",
                "highQuality": "الجودة العالية",
                "professionalTeam": "فريق محترف",
                "wideExperience": "خبرة واسعة",
                "completedProjects": "مشروع منجز",
                "yearsExperience": "سنوات خبرة",
                "engineers": "مهندس وفني",
                "happyClients": "عميل سعيد",
                
                // Contact
                "contactTitle": "تواصل معنا",
                "contactDesc": "نحن هنا للإجابة على استفساراتك وتقديم المساعدة. يمكنك التواصل معنا من خلال النموذج أدناه",
                "callUs": "اتصل بنا",
                "email": "البريد الإلكتروني",
                "address": "العنوان",
                "streetAddress": "شارع الرياض، المدينة، البلد",
                "workingHours": "ساعات العمل",
                "sunToThu": "الأحد - الخميس",
                "friday": "الجمعة",
                "saturday": "السبت",
                "closed": "مغلق",
                "name": "الاسم",
                "enterName": "أدخل اسمك",
                "enterEmail": "أدخل بريدك الإلكتروني",
                "subject": "الموضوع",
                "enterSubject": "أدخل موضوع الرسالة",
                "message": "الرسالة",
                "enterMessage": "أدخل رسالتك هنا",
                "sendMessage": "إرسال الرسالة",
                "formSubmitted": "تم إرسال النموذج بنجاح!",
                
                // Footer
                "footerAbout": "شركة متخصصة في مجال التشطيبات والديكورات الداخلية بخبرة أكثر من 10 سنوات في تنفيذ المشاريع المختلفة",
                "quickLinks": "روابط سريعة",
                "ourServices": "خدماتنا",
                "homeFinishing": "تشطيبات المنازل",
                "commercialFinishing": "تشطيبات تجارية",
                "maintenanceServices": "خدمات الصيانة",
                "interiorDesign": "تصميم داخلي",
                "newsletter": "النشرة الإخبارية",
                "newsletterDesc": "اشترك في نشرتنا الإخبارية للحصول على آخر الأخبار والعروض",
                "subscribe": "اشتراك",
                "allRightsReserved": "جميع الحقوق محفوظة"
            },
            en: {
                // Navbar
                "services": "Services",
                "products": "Products",
                "contact": "Contact",
                "about": "About",
                "callUs": "Call Us",
                
                // Hero
                "bestFinishingServices": "Best Finishing Services",
                "forHomeOrBusiness": "For Your Home or Business",
                "qualityDescription": "We provide comprehensive finishing services with high quality and best prices to turn your vision into reality",
                "contactUs": "Contact Us",
                "exploreServices": "Explore Our Services",
                
                // Services
                "servicesTitle": "Our Services",
                "servicesDescription": "We offer a complete range of high-quality finishing services to meet your various needs",
                "homeFinishing": "Home Finishing",
                "homeFinishingDesc": "We provide comprehensive finishing services for homes and apartments with the highest quality, from start to finish",
                "commercialFinishing": "Commercial Finishing",
                "commercialFinishingDesc": "Professional finishing services for offices, shops, and commercial spaces with modern designs",
                "maintenanceServices": "Maintenance Services",
                "maintenanceServicesDesc": "Regular and emergency maintenance for all finishing works with guaranteed quality and quick execution",
                "requestService": "Request Service",
                "getFreeQuote": "Get a Free Quote",
                
                // Products
                "productsTitle": "Our Products",
                "productsDescription": "We offer a variety of high-quality products for finishing your home or business",
                "woodenFloors": "Wooden Floors",
                "modernPaints": "Modern Paints",
                "gypsumDecors": "Gypsum Decorations",
                "woodenDoors": "Wooden Doors",
                "floors": "Floors",
                "paints": "Paints",
                "decors": "Decors",
                "doors": "Doors",
                "inquireAboutProduct": "Inquire About Product",
                "viewAllProducts": "View All Products",
                
                // About
                "aboutTitle": "About Us",
                "aboutDesc1": "A company specializing in finishing and interior decorations with over 10 years of experience in implementing various projects.",
                "aboutDesc2": "We rely on an integrated team of highly experienced engineers and technicians, and we use the latest technologies and materials in implementing our projects to ensure quality and accuracy in work.",
                "highQuality": "High Quality",
                "professionalTeam": "Professional Team",
                "wideExperience": "Wide Experience",
                "completedProjects": "Completed Projects",
                "yearsExperience": "Years Experience",
                "engineers": "Engineers & Technicians",
                "happyClients": "Happy Clients",
                
                // Contact
                "contactTitle": "Contact Us",
                "contactDesc": "We're here to answer your inquiries and provide assistance. You can contact us through the form below",
                "callUs": "Call Us",
                "email": "Email",
                "address": "Address",
                "streetAddress": "Riyadh Street, City, Country",
                "workingHours": "Working Hours",
                "sunToThu": "Sunday - Thursday",
                "friday": "Friday",
                "saturday": "Saturday",
                "closed": "Closed",
                "name": "Name",
                "enterName": "Enter your name",
                "enterEmail": "Enter your email",
                "subject": "Subject",
                "enterSubject": "Enter message subject",
                "message": "Message",
                "enterMessage": "Enter your message here",
                "sendMessage": "Send Message",
                "formSubmitted": "Form submitted successfully!",
                
                // Footer
                "footerAbout": "A company specializing in finishing and interior decorations with over 10 years of experience in implementing various projects.",
                "quickLinks": "Quick Links",
                "ourServices": "Our Services",
                "homeFinishing": "Home Finishing",
                "commercialFinishing": "Commercial Finishing",
                "maintenanceServices": "Maintenance Services",
                "interiorDesign": "Interior Design",
                "newsletter": "Newsletter",
                "newsletterDesc": "Subscribe to our newsletter to get the latest news and offers",
                "subscribe": "Subscribe",
                "allRightsReserved": "All Rights Reserved"
            }
        };
    }
    
    // Apply language
    function applyLanguage(lang) {
        document.documentElement.lang = lang;
        document.documentElement.dir = lang === 'ar' ? 'rtl' : 'ltr';
        
        // Update language switcher text
        languageSwitcher.textContent = lang === 'ar' ? 'English' : 'العربية';
        
        // Translate all elements with data-i18n attribute
        document.querySelectorAll('[data-i18n]').forEach(element => {
            const key = element.getAttribute('data-i18n');
            if (translations[lang][key]) {
                element.textContent = translations[lang][key];
            }
        });
        
        // Translate placeholders
        document.querySelectorAll('[data-i18n-placeholder]').forEach(element => {
            const key = element.getAttribute('data-i18n-placeholder');
            if (translations[lang][key]) {
                element.placeholder = translations[lang][key];
            }
        });
        
        // Update CSS classes for RTL/LTR specific styling if needed
        if (lang === 'ar') {
            document.body.classList.add('rtl');
            document.body.classList.remove('ltr');
        } else {
            document.body.classList.add('ltr');
            document.body.classList.remove('rtl');
        }
    }
});
