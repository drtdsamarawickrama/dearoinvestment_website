// app/components/BusinessSectorsSection.tsx
import Link from "next/link";

const sectors = [
  {
    name: "Dearo Engineering (Pvt) Ltd. Construction Services",
    image: "/assests/construction.jpg",
    link: "/engineer",
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

        {/* TITLE */}
        <h2 className="text-3xl sm:text-4xl font-bold text-center mb-12 text-[#182359]">
          Business Sectors
        </h2>

        {/* GRID */}
        <div className="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 sm:gap-8">

          {sectors.map((sector, idx) => {
            const isLast = idx === sectors.length - 1;

            return (
              <div
                key={idx}
                className={isLast ? "md:col-span-3 flex justify-center" : ""}
              >
                {/* CARD (UNCHANGED SIZE & STYLE) */}
                <div className="h-full w-full md:max-w-sm">
                  <div
                    className="bg-white h-full flex flex-col rounded-xl shadow-md overflow-hidden
                               hover:shadow-xl hover:-translate-y-1
                               transition-all duration-300"
                  >
                    {/* IMAGE */}
                    <div className="w-full h-52 sm:h-56 overflow-hidden">
                      <img
                        src={sector.image}
                        alt={sector.name}
                        className="w-full h-full object-cover
                                   transition-transform duration-500 hover:scale-105"
                      />
                    </div>

                    {/* TEXT */}
                    <div className="p-4 flex-1 flex items-center justify-center text-center">
                      {sector.link ? (
                        <Link
                          href={sector.link}
                          className="text-gray-700 font-semibold text-base sm:text-sm md:text-base hover:text-[#182359]"
                        >
                          {sector.name}
                        </Link>
                      ) : (
                        <p className="text-gray-700 font-semibold text-base sm:text-sm md:text-base">
                          {sector.name}
                        </p>
                      )}
                    </div>
                  </div>
                </div>
              </div>
            );
          })}

        </div>

      </div>
    </section>
  );
}
