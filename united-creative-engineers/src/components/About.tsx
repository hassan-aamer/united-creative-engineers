
import { Users, Briefcase, Info } from "lucide-react";
import { useLanguage } from "../context/LanguageContext";

const About = () => {
  const { t, language } = useLanguage();
  
  const stats = [
    { value: "+500", label: t("completedProjects") },
    { value: "+10", label: t("yearsExperience") },
    { value: "+50", label: t("engineers") },
    { value: "+300", label: t("happyClients") },
  ];

  return (
    <section id="about" className="section-padding bg-white" dir={language === 'ar' ? 'rtl' : 'ltr'}>
      <div className="container mx-auto">
        <div className="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
          <div className={`order-2 ${language === 'ar' ? 'lg:order-1' : 'lg:order-2'}`}>
            <h2 className={`text-3xl md:text-4xl font-bold mb-6 ${language === 'ar' ? 'lg:text-right' : 'lg:text-left'}`}>
              {t("aboutTitle")}
            </h2>
            <div className={`w-20 h-1 bg-teal mb-6 ${language === 'ar' ? 'lg:mr-0 lg:ml-auto' : 'lg:ml-0 lg:mr-auto'}`}></div>
            
            <p className={`text-gray-600 mb-6 text-lg ${language === 'ar' ? 'lg:text-right' : 'lg:text-left'}`}>
              {t("aboutDesc1")}
            </p>
            
            <p className={`text-gray-600 mb-8 text-lg ${language === 'ar' ? 'lg:text-right' : 'lg:text-left'}`}>
              {t("aboutDesc2")}
            </p>
            
            <div className="space-y-4">
              <div className={`flex items-center gap-3 ${language === 'ar' ? 'lg:justify-end' : 'lg:justify-start'}`}>
                {language === 'ar' ? (
                  <>
                    <span className="text-lg font-medium">{t("highQuality")}</span>
                    <div className="w-10 h-10 rounded-full bg-teal/10 flex items-center justify-center">
                      <Info className="h-5 w-5 text-teal" />
                    </div>
                  </>
                ) : (
                  <>
                    <div className="w-10 h-10 rounded-full bg-teal/10 flex items-center justify-center">
                      <Info className="h-5 w-5 text-teal" />
                    </div>
                    <span className="text-lg font-medium">{t("highQuality")}</span>
                  </>
                )}
              </div>
              
              <div className={`flex items-center gap-3 ${language === 'ar' ? 'lg:justify-end' : 'lg:justify-start'}`}>
                {language === 'ar' ? (
                  <>
                    <span className="text-lg font-medium">{t("professionalTeam")}</span>
                    <div className="w-10 h-10 rounded-full bg-teal/10 flex items-center justify-center">
                      <Users className="h-5 w-5 text-teal" />
                    </div>
                  </>
                ) : (
                  <>
                    <div className="w-10 h-10 rounded-full bg-teal/10 flex items-center justify-center">
                      <Users className="h-5 w-5 text-teal" />
                    </div>
                    <span className="text-lg font-medium">{t("professionalTeam")}</span>
                  </>
                )}
              </div>
              
              <div className={`flex items-center gap-3 ${language === 'ar' ? 'lg:justify-end' : 'lg:justify-start'}`}>
                {language === 'ar' ? (
                  <>
                    <span className="text-lg font-medium">{t("wideExperience")}</span>
                    <div className="w-10 h-10 rounded-full bg-teal/10 flex items-center justify-center">
                      <Briefcase className="h-5 w-5 text-teal" />
                    </div>
                  </>
                ) : (
                  <>
                    <div className="w-10 h-10 rounded-full bg-teal/10 flex items-center justify-center">
                      <Briefcase className="h-5 w-5 text-teal" />
                    </div>
                    <span className="text-lg font-medium">{t("wideExperience")}</span>
                  </>
                )}
              </div>
            </div>
          </div>
          
          <div className={`order-1 ${language === 'ar' ? 'lg:order-2' : 'lg:order-1'}`}>
            <div className="grid grid-cols-2 gap-6">
              {stats.map((stat, index) => (
                <div 
                  key={index}
                  className="bg-cream p-6 rounded-lg text-center"
                >
                  <h3 className="text-3xl font-bold text-teal mb-2">{stat.value}</h3>
                  <p className="text-gray-600">{stat.label}</p>
                </div>
              ))}
            </div>
          </div>
        </div>
      </div>
    </section>
  );
};

export default About;
