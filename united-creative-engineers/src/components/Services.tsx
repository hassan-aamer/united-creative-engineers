
import { Wrench, Building, Home } from "lucide-react";
import { useLanguage } from "../context/LanguageContext";

const Services = () => {
  const { t, language } = useLanguage();

  const services = [
    {
      icon: <Home className="h-12 w-12 text-teal" />,
      title: t("homeFinishing"),
      description: t("homeFinishingDesc"),
    },
    {
      icon: <Building className="h-12 w-12 text-teal" />,
      title: t("commercialFinishing"),
      description: t("commercialFinishingDesc"),
    },
    {
      icon: <Wrench className="h-12 w-12 text-teal" />,
      title: t("maintenanceServices"),
      description: t("maintenanceServicesDesc"),
    },
  ];

  return (
    <section id="services" className="section-padding bg-white" dir={language === 'ar' ? 'rtl' : 'ltr'}>
      <div className="container mx-auto">
        <div className="text-center mb-16">
          <h2 className="text-3xl md:text-4xl font-bold mb-4">{t("servicesTitle")}</h2>
          <div className="w-20 h-1 bg-teal mx-auto"></div>
          <p className="mt-6 text-lg text-gray-600 max-w-2xl mx-auto">
            {t("servicesDescription")}
          </p>
        </div>

        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
          {services.map((service, index) => (
            <div 
              key={index} 
              className="bg-white p-8 rounded-lg shadow-lg hover:shadow-xl transition-shadow border border-gray-100 text-center group"
            >
              <div className="flex justify-center mb-6">
                {service.icon}
              </div>
              <h3 className="text-xl font-bold mb-3">{service.title}</h3>
              <p className="text-gray-600">{service.description}</p>
              <div className="mt-6">
                <a 
                  href="#contact" 
                  className="inline-block text-teal font-medium hover:underline"
                >
                  {t("requestService")}
                </a>
              </div>
            </div>
          ))}
        </div>
        
        <div className="mt-16 text-center">
          <a 
            href="#contact" 
            className="bg-teal text-white px-8 py-3 rounded-md hover:bg-opacity-90 transition-all font-belleza text-lg inline-block"
          >
            {t("getFreeQuote")}
          </a>
        </div>
      </div>
    </section>
  );
};

export default Services;
