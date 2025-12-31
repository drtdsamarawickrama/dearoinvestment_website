const sectors = [
  {
    name: "Dearo Engineering (Pvt) Ltd.Construction Services",
    image: "/assests/construction.jpg",
  },
  {
    name: "Agriculture & Plantation - Dearo Agri",
    image: "/assests/agri1.jpg",
  },
  {
    name: "Prawn Hatchery - Dearo Agri",
    image: "/assests/prown-hatchery.jpg",
  },
  {
    name: "Education Services - Dearo Education",
    image: "/assests/edu.jpg",
  },
  {
    name: "Business and Legal Services",
    image: "/assests/legal.jpg",
  },
  {
    name: "Agriculture Export - Dearo Exports",
    image: "/assests/export.jpg",
  },
  {
    name: "Auto Mobile Sector - Dearo Auto",
    image: "/assests/automobile.jpg",
  },
];

export default function BusinessSectorsSection() {
  return (
    <section className="py-16 sm:py-20 bg-gray-50">
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-20">
        <h2 className="text-3xl sm:text-4xl font-bold text-center mb-12 text-[#182359]">
          Business Sectors
        </h2>

        {/* Grid for first 6 items */}
        <div className="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 sm:gap-8 mb-6">
          {sectors.slice(0, 6).map((sector, idx) => (
            <div
              key={idx}
              className="bg-white flex flex-col rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-all duration-300"
            >
              {/* Image */}
              <div className="w-full h-48 sm:h-52 md:h-56">
                <img
                  src={sector.image}
                  alt={sector.name}
                  className="w-full h-full object-cover"
                />
              </div>

              {/* Text */}
              <div className="p-4 flex-1 flex items-center justify-center text-center">
                <p className="text-gray-700 font-semibold text-base sm:text-sm md:text-base">
                  {sector.name}
                </p>
              </div>
            </div>
          ))}
        </div>

        {/* Centered last item */}
        <div className="flex justify-center">
          <div className="w-full sm:w-2/3 md:w-1/3 bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-all duration-300 flex flex-col">
            <div className="w-full h-48 sm:h-52 md:h-56">
              <img
                src={sectors[6].image}
                alt={sectors[6].name}
                className="w-full h-full object-cover"
              />
            </div>
            <div className="p-4 flex-1 flex items-center justify-center text-center">
              <p className="text-gray-700 font-semibold text-base sm:text-sm md:text-base">
                {sectors[6].name}
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>
  );
}
