
import { Phone, Mail, Building } from "lucide-react";
import { useLanguage } from "../context/LanguageContext";

const Contact = () => {
  const { t, language } = useLanguage();

  return (
    <section id="contact" className="section-padding bg-gray-50" dir={language === 'ar' ? 'rtl' : 'ltr'}>
      <div className="container mx-auto">
        <div className="text-center mb-16">
          <h2 className="text-3xl md:text-4xl font-bold mb-4">{t("contactTitle")}</h2>
          <div className="w-20 h-1 bg-teal mx-auto"></div>
          <p className="mt-6 text-lg text-gray-600 max-w-2xl mx-auto">
            {t("contactDesc")}
          </p>
        </div>

        <div className="grid grid-cols-1 lg:grid-cols-5 gap-8">
          <div className="lg:col-span-2 space-y-6">
            <div className="bg-white p-6 rounded-lg shadow-md">
              <div className="flex items-center gap-4 mb-6">
                <div className="w-12 h-12 rounded-full bg-teal/10 flex items-center justify-center">
                  <Phone className="h-6 w-6 text-teal" />
                </div>
                <div>
                  <h3 className="text-lg font-bold">{t("callUs")}</h3>
                  <p className="text-gray-600">+123 456 7890</p>
                </div>
              </div>
              
              <div className="flex items-center gap-4 mb-6">
                <div className="w-12 h-12 rounded-full bg-teal/10 flex items-center justify-center">
                  <Mail className="h-6 w-6 text-teal" />
                </div>
                <div>
                  <h3 className="text-lg font-bold">{t("email")}</h3>
                  <p className="text-gray-600">info@finishco.com</p>
                </div>
              </div>
              
              <div className="flex items-center gap-4">
                <div className="w-12 h-12 rounded-full bg-teal/10 flex items-center justify-center">
                  <Building className="h-6 w-6 text-teal" />
                </div>
                <div>
                  <h3 className="text-lg font-bold">{t("address")}</h3>
                  <p className="text-gray-600">{t("streetAddress")}</p>
                </div>
              </div>
            </div>
            
            <div className="bg-white p-6 rounded-lg shadow-md">
              <h3 className="text-xl font-bold mb-4">{t("workingHours")}</h3>
              <ul className="space-y-2">
                <li className="flex justify-between">
                  <span className="text-gray-600">{t("sunToThu")}</span>
                  <span>9:00 ص - 5:00 م</span>
                </li>
                <li className="flex justify-between">
                  <span className="text-gray-600">{t("friday")}</span>
                  <span>{t("closed")}</span>
                </li>
                <li className="flex justify-between">
                  <span className="text-gray-600">{t("saturday")}</span>
                  <span>10:00 ص - 2:00 م</span>
                </li>
              </ul>
            </div>
          </div>
          
          <div className="lg:col-span-3">
            <form className="bg-white p-8 rounded-lg shadow-md">
              <div className="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-6">
                <div className={language === 'ar' ? "text-right" : "text-left"}>
                  <label htmlFor="name" className="block mb-2 text-gray-800 font-medium">
                    {t("name")}
                  </label>
                  <input
                    type="text"
                    id="name"
                    className="w-full border border-gray-300 rounded-md px-4 py-3 focus:outline-none focus:ring-2 focus:ring-teal/50 focus:border-teal"
                    placeholder={t("enterName")}
                  />
                </div>
                
                <div className={language === 'ar' ? "text-right" : "text-left"}>
                  <label htmlFor="email" className="block mb-2 text-gray-800 font-medium">
                    {t("email")}
                  </label>
                  <input
                    type="email"
                    id="email"
                    className="w-full border border-gray-300 rounded-md px-4 py-3 focus:outline-none focus:ring-2 focus:ring-teal/50 focus:border-teal"
                    placeholder={t("enterEmail")}
                  />
                </div>
              </div>
              
              <div className={`mb-6 ${language === 'ar' ? "text-right" : "text-left"}`}>
                <label htmlFor="subject" className="block mb-2 text-gray-800 font-medium">
                  {t("subject")}
                </label>
                <input
                  type="text"
                  id="subject"
                  className="w-full border border-gray-300 rounded-md px-4 py-3 focus:outline-none focus:ring-2 focus:ring-teal/50 focus:border-teal"
                  placeholder={t("enterSubject")}
                />
              </div>
              
              <div className={`mb-6 ${language === 'ar' ? "text-right" : "text-left"}`}>
                <label htmlFor="message" className="block mb-2 text-gray-800 font-medium">
                  {t("message")}
                </label>
                <textarea
                  id="message"
                  rows={5}
                  className="w-full border border-gray-300 rounded-md px-4 py-3 focus:outline-none focus:ring-2 focus:ring-teal/50 focus:border-teal resize-none"
                  placeholder={t("enterMessage")}
                ></textarea>
              </div>
              
              <button
                type="submit"
                className="w-full bg-teal text-white py-3 rounded-md hover:bg-opacity-90 transition-all font-medium text-lg"
              >
                {t("sendMessage")}
              </button>
            </form>
          </div>
        </div>
      </div>
    </section>
  );
};

export default Contact;
