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
    <section className="py-20 bg-gray-50">
      <div className="max-w-7xl mx-auto px-20">
        
        {/* TITLE */}
        <h2 className="text-4xl text-center mb-12 text-[#182359]">
          <span className="font-extrabold">What</span>{" "}
          <span className="font-semibold">Dearo Offer</span>
        </h2>

        {/* Two columns */}
        <div className="flex flex-col md:flex-row gap-6">
          
          {/* Left Column */}
          <div className="md:w-1/2 flex flex-col gap-6">
            {services.slice(0, 2).map((service, idx) => (
              <div
                key={idx}
                className="flex h-56 bg-white shadow-lg rounded-2xl hover:shadow-2xl transition-all duration-300 overflow-hidden"
              >
                {/* Image */}
                <div className="w-1/3 h-full flex-shrink-0">
                  <img
                    src={service.image}
                    alt={service.title}
                    className="w-full h-full object-cover"
                  />
                </div>

                {/* Content */}
                <div className="w-2/3 p-6 flex flex-col justify-center h-full">
                  <h3 className="text-2xl font-semibold mb-2 hover:text-blue-500 transition-colors duration-300">
                    {service.title}
                  </h3>
                  <p className="text-gray-700">
                    {service.description}
                  </p>
                </div>
              </div>
            ))}
          </div>

          {/* Right Column */}
          <div className="md:w-1/2 flex flex-col gap-6">
            {services.slice(2).map((service, idx) => (
              <div
                key={idx}
                className="flex h-56 bg-white shadow-lg rounded-2xl hover:shadow-2xl transition-all duration-300 overflow-hidden"
              >
                {/* Image */}
                <div className="w-1/3 h-full flex-shrink-0">
                  <img
                    src={service.image}
                    alt={service.title}
                    className="w-full h-full object-cover"
                  />
                </div>

                {/* Content */}
                <div className="w-2/3 p-6 flex flex-col justify-center h-full">
                  <h3 className="text-2xl font-semibold mb-2 hover:text-blue-500 transition-colors duration-300">
                    {service.title}
                  </h3>
                  <p className="text-gray-700">
                    {service.description}
                  </p>
                </div>
              </div>
            ))}
          </div>

        </div>
      </div>
    </section>
  );
}
