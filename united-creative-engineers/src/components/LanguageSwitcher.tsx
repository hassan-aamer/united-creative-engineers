
import { useLanguage } from "../context/LanguageContext";

const LanguageSwitcher = () => {
  const { language, setLanguage } = useLanguage();

  return (
    <button
      onClick={() => setLanguage(language === 'ar' ? 'en' : 'ar')}
      className="flex items-center justify-center bg-white/20 hover:bg-white/30 text-white border border-white/30 px-3 py-2 rounded-md transition-all"
      aria-label="Switch language"
    >
      <span className="font-medium">{language === 'ar' ? 'English' : 'العربية'}</span>
    </button>
  );
};

export default LanguageSwitcher;
