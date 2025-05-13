
import { ArrowRight } from "lucide-react";
import { useLanguage } from "../context/LanguageContext";

const Hero = () => {
  const { t, language } = useLanguage();
  
  return (
    <section className="relative bg-cream min-h-screen flex items-center" dir={language === 'ar' ? 'rtl' : 'ltr'}>
      <div className="absolute inset-0 bg-gradient-to-r from-black/40 to-black/10 z-10"></div>
      <div className="container mx-auto px-4 z-20 relative">
        <div className={`max-w-3xl ${language === 'ar' ? 'mr-auto text-right' : 'ml-auto text-left'}`}>
          <h1 className="text-4xl md:text-5xl lg:text-6xl font-bold text-white leading-tight mb-6">
            {t("bestFinishingServices")}
            <span className="block text-teal">{t("forHomeOrBusiness")}</span>
          </h1>
          <p className={`text-xl text-white/90 mb-8 max-w-xl ${language === 'ar' ? 'mr-auto' : 'ml-auto'}`}>
            {t("qualityDescription")}
          </p>
          <div className={`flex flex-col sm:flex-row gap-4 ${language === 'ar' ? 'justify-end' : 'justify-start'}`}>
            <a
              href="#contact"
              className={`bg-teal hover:bg-teal/90 text-white px-6 py-3 rounded-md transition-all font-belleza text-lg flex items-center justify-center sm:justify-between gap-2 w-full sm:w-auto ${language === 'ar' ? 'flex-row-reverse' : ''}`}
            >
              <span>{t("contactUs")}</span>
              <ArrowRight size={16} className={language === 'ar' ? 'rotate-180' : ''} />
            </a>
            <a
              href="#services"
              className="bg-white/20 hover:bg-white/30 text-white border border-white/30 px-6 py-3 rounded-md transition-all font-belleza text-lg w-full sm:w-auto text-center"
            >
              {t("exploreServices")}
            </a>
          </div>
        </div>
      </div>
      <div className="absolute bottom-8 left-0 right-0 flex justify-center">
        <a 
          href="#services" 
          className="w-10 h-10 rounded-full bg-white flex items-center justify-center animate-bounce"
        >
          <svg 
            xmlns="http://www.w3.org/2000/svg" 
            className="h-6 w-6 text-teal" 
            fill="none" 
            viewBox="0 0 24 24"
            stroke="currentColor"
          >
            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M19 14l-7 7m0 0l-7-7m7 7V3" />
          </svg>
        </a>
      </div>
    </section>
  );
};

export default Hero;
