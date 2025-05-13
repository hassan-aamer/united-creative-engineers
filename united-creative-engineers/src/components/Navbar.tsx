
import { useState, useEffect } from "react";
import { Menu, X } from "lucide-react";
import LanguageSwitcher from "./LanguageSwitcher";
import { useLanguage } from "../context/LanguageContext";

const Navbar = () => {
  const [isMenuOpen, setIsMenuOpen] = useState(false);
  const [isScrolled, setIsScrolled] = useState(false);
  const { t, language } = useLanguage();

  useEffect(() => {
    const handleScroll = () => {
      if (window.scrollY > 50) {
        setIsScrolled(true);
      } else {
        setIsScrolled(false);
      }
    };
    
    window.addEventListener("scroll", handleScroll);
    return () => window.removeEventListener("scroll", handleScroll);
  }, []);

  const navLinks = [
    { name: t("services"), href: "#services" },
    { name: t("products"), href: "#products" },
    { name: t("contact"), href: "#contact" },
    { name: t("about"), href: "#about" },
  ];

  const rtlClass = language === 'ar' ? 'rtl:space-x-reverse' : '';

  return (
    <nav 
      className={`fixed top-0 left-0 right-0 z-50 transition-all duration-300 ${
        isScrolled 
          ? "bg-white shadow-md py-2" 
          : "bg-transparent py-4"
      }`}
      dir={language === 'ar' ? 'rtl' : 'ltr'}
    >
      <div className="container mx-auto flex items-center justify-between px-4">
        <div className="flex items-center">
          <a href="/" className="text-2xl font-spartan font-bold text-teal">
            FinishCo
          </a>
        </div>

        {/* Desktop Navigation */}
        <div className="hidden md:flex items-center space-x-8 rtl:space-x-reverse">
          <div className={`flex space-x-8 ${rtlClass}`}>
            {navLinks.map((link, index) => (
              <a 
                key={index}
                href={link.href} 
                className="font-belleza text-lg hover:text-teal transition-colors"
              >
                {link.name}
              </a>
            ))}
          </div>
          <a 
            href="#contact" 
            className="bg-teal text-white px-6 py-2 rounded-md hover:bg-opacity-90 transition-all font-belleza"
          >
            {t("callUs")}
          </a>
          <LanguageSwitcher />
        </div>

        {/* Mobile Menu Button */}
        <div className="md:hidden flex items-center space-x-4 rtl:space-x-reverse">
          <LanguageSwitcher />
          <button 
            onClick={() => setIsMenuOpen(!isMenuOpen)}
            className="text-gray-800 hover:text-teal"
          >
            {isMenuOpen ? <X size={24} /> : <Menu size={24} />}
          </button>
        </div>
      </div>

      {/* Mobile Menu */}
      {isMenuOpen && (
        <div className="md:hidden bg-white shadow-lg absolute top-full left-0 right-0">
          <div className="flex flex-col px-4 py-4 space-y-4 text-right">
            {navLinks.map((link, index) => (
              <a 
                key={index}
                href={link.href} 
                className="block py-2 font-belleza text-lg hover:text-teal transition-colors"
                onClick={() => setIsMenuOpen(false)}
              >
                {link.name}
              </a>
            ))}
            <a 
              href="#contact" 
              className="bg-teal text-white px-6 py-2 rounded-md hover:bg-opacity-90 transition-all font-belleza text-center"
              onClick={() => setIsMenuOpen(false)}
            >
              {t("callUs")}
            </a>
          </div>
        </div>
      )}
    </nav>
  );
};

export default Navbar;
