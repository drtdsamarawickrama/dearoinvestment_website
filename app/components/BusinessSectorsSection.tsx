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
    <section className="py-20 bg-gray-50">
      <div className="max-w-7xl mx-auto px-20">
        <h2 className="text-4xl font-bold text-center mb-12  text-[#182359]">Business Sectors</h2>

        {/* Grid for first 6 items */}
        <div className="grid md:grid-cols-3 gap-8 mb-6">
          {sectors.slice(0, 6).map((sector, idx) => (
            <div
              key={idx}
              className="bg-white flex flex-col rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-all duration-300"
            >
              {/* Image */}
              <div className="w-full h-40">
                <img
                  src={sector.image}
                  alt={sector.name}
                  className="w-full h-full object-cover"
                />
              </div>
              
              {/* Text */}
              <div className="p-4 flex-1 flex items-center justify-center text-center">
                <p className="text-gray-700 font-semibold text-base">
                  {sector.name}
                </p>
              </div>
            </div>
          ))}
        </div>

        {/* Centered last item */}
        <div className="flex justify-center">
          <div className="w-full md:w-1/3 bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-all duration-300 flex flex-col">
            <div className="w-full h-40">
              <img
                src={sectors[6].image}
                alt={sectors[6].name}
                className="w-full h-full object-cover"
              />
            </div>
            <div className="p-4 flex-1 flex items-center justify-center text-center">
              <p className="text-gray-700 font-semibold text-base">
                {sectors[6].name}
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>
  );
}
