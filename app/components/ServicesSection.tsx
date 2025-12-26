const services = [
  { 
    title: "Agriculture Loans", 
    description: "Your Insurance Partner for comprehensive coverage and peace of mind.", 
    image: "/assests/agri.jpg",
  },
  { 
    title: "Hire Purchase", 
    description: "Own your Dream Vehicle with flexible Hire Purchase options.", 
    image: "/assests/vehicle.jpg",
  },
  { 
    title: "Gold Loans", 
    description: "Turn your gold into immediate cash.", 
    image: "/assests/goldloan.jpg",
  },
  { 
    title: "SME/Project Loans", 
    description: "Invest today for tomorrow's success.", 
    image: "/assests/sme.jpg",
  },
];

export default function ServicesSection() {
  return (
    <section className="py-16 md:py-20 bg-gray-50">
      <div className="max-w-7xl mx-auto px-6 md:px-20">
        
        {/* TITLE */}
        <h2 className="text-3xl md:text-4xl text-center mb-10 md:mb-12 text-[#182359]">
          <span className="font-extrabold">What</span>{" "}
          <span className="font-semibold">Dearo Offer</span>
        </h2>

        {/* GRID */}
        <div className="grid grid-cols-1 md:grid-cols-2 gap-6">
          {services.map((service, idx) => (
            <div
              key={idx}
              className="flex flex-col sm:flex-row bg-white shadow-lg rounded-2xl hover:shadow-2xl transition-all duration-300 overflow-hidden"
            >
              {/* Image */}
              <div className="w-full sm:w-1/3 h-48 sm:h-56 flex-shrink-0">
                <img
                  src={service.image}
                  alt={service.title}
                  className="w-full h-full object-cover"
                />
              </div>

              {/* Content */}
              <div className="flex-1 p-5 sm:p-6 flex flex-col justify-center">
                <h3 className="text-xl sm:text-2xl font-semibold mb-2 hover:text-blue-500 transition-colors duration-300">
                  {service.title}
                </h3>
                <p className="text-gray-700 text-sm sm:text-base">
                  {service.description}
                </p>
              </div>
            </div>
          ))}
        </div>

      </div>
    </section>
  );
}
