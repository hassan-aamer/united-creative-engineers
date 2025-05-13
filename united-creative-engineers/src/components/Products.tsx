
import { useLanguage } from "../context/LanguageContext";

const Products = () => {
  const { t, language } = useLanguage();

  const products = [
    {
      name: t("woodenFloors"),
      imageUrl: "https://images.unsplash.com/photo-1609762751666-c45e2268ae2e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Nnx8d29vZGVuJTIwZmxvb3J8ZW58MHx8MHx8fDA%3D&auto=format&fit=crop&w=500&q=60",
      category: t("floors")
    },
    {
      name: t("modernPaints"),
      imageUrl: "https://images.unsplash.com/photo-1589939705384-5185137a7f0f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8cGFpbnQlMjB3YWxsc3xlbnwwfHwwfHx8MA%3D%3D&auto=format&fit=crop&w=500&q=60",
      category: t("paints")
    },
    {
      name: t("gypsumDecors"),
      imageUrl: "https://images.unsplash.com/photo-1531835551805-16d864c8d311?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8Y2VpbGluZyUyMGRlc2lnbnxlbnwwfHwwfHx8MA%3D%3D&auto=format&fit=crop&w=500&q=60",
      category: t("decors")
    },
    {
      name: t("woodenDoors"),
      imageUrl: "https://images.unsplash.com/photo-1508025690966-2a9a1957da31?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8d29vZGVuJTIwZG9vcnxlbnwwfHwwfHx8MA%3D%3D&auto=format&fit=crop&w=500&q=60",
      category: t("doors")
    },
  ];

  return (
    <section id="products" className="section-padding bg-gray-50" dir={language === 'ar' ? 'rtl' : 'ltr'}>
      <div className="container mx-auto">
        <div className="text-center mb-16">
          <h2 className="text-3xl md:text-4xl font-bold mb-4">{t("productsTitle")}</h2>
          <div className="w-20 h-1 bg-teal mx-auto"></div>
          <p className="mt-6 text-lg text-gray-600 max-w-2xl mx-auto">
            {t("productsDescription")}
          </p>
        </div>

        <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
          {products.map((product, index) => (
            <div key={index} className="bg-white rounded-lg overflow-hidden shadow-lg group">
              <div className="relative overflow-hidden h-64">
                <img 
                  src={product.imageUrl} 
                  alt={product.name}
                  className="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300"
                />
                <div className="absolute top-4 right-4 bg-teal text-white text-sm py-1 px-3 rounded-full">
                  {product.category}
                </div>
              </div>
              <div className="p-4">
                <h3 className="text-xl font-bold mb-2 text-center">{product.name}</h3>
                <div className="flex justify-center mt-2">
                  <a 
                    href="#contact" 
                    className="text-teal hover:underline font-medium"
                  >
                    {t("inquireAboutProduct")}
                  </a>
                </div>
              </div>
            </div>
          ))}
        </div>

        <div className="mt-16 text-center">
          <a 
            href="#contact" 
            className="bg-white text-teal border-2 border-teal px-8 py-3 rounded-md hover:bg-teal hover:text-white transition-all font-belleza text-lg inline-block"
          >
            {t("viewAllProducts")}
          </a>
        </div>
      </div>
    </section>
  );
};

export default Products;
