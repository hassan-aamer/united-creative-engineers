
import React, { createContext, useState, useContext, ReactNode } from 'react';

type Language = 'ar' | 'en';

interface LanguageContextType {
  language: Language;
  setLanguage: (lang: Language) => void;
  t: (key: string) => string;
}

const translations = {
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
    "completedProjects": "+500 مشروع منجز",
    "yearsExperience": "+10 سنوات خبرة",
    "engineers": "+50 مهندس وفني",
    "happyClients": "+300 عميل سعيد",
    
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
    
    // Footer
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
    "completedProjects": "+500 Completed Projects",
    "yearsExperience": "+10 Years Experience",
    "engineers": "+50 Engineers & Technicians",
    "happyClients": "+300 Happy Clients",
    
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
    
    // Footer
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

const LanguageContext = createContext<LanguageContextType>({
  language: 'ar',
  setLanguage: () => {},
  t: (key: string) => key
});

export const LanguageProvider = ({ children }: { children: ReactNode }) => {
  const [language, setLanguage] = useState<Language>('ar');

  const t = (key: string) => {
    return translations[language][key as keyof typeof translations[typeof language]] || key;
  };

  return (
    <LanguageContext.Provider value={{ language, setLanguage, t }}>
      {children}
    </LanguageContext.Provider>
  );
};

export const useLanguage = () => useContext(LanguageContext);
