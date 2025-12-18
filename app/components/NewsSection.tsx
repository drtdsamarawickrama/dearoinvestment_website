"use client";

import Link from "next/link";

export default function NewsSection() {
  const newsItems = [
    {
      title: "Dehiaththkandiya Branch Opening",
      image: "/assests/dehiaththa.jpg",
      slug: "dehiaththkandiya-branch-opening",
    },
    {
      title: "Polonnaruwa Branch Opening",
      image: "/assests/polonnaruwa.jpg",
      slug: "polonnaruwa-branch-opening",
    },
    {
      title: "Ampara Branch Opening",
      image: "/assests/ampara.jpg",
      slug: "ampara-branch-opening",
    },
    {
      title: "Trincomalee Branch Opening",
      image: "/assests/trincomalee.jpg",
      slug: "trincomalee-branch-opening",
    },
  ];

  return (
    <section className="py-20 bg-gray-50">
      <div className="max-w-7xl mx-auto px-4">
        {/* Title */}
        <h2 className="text-4xl font-bold mb-12 text-center">
          Dearo News
        </h2>

        {/* NEWS GRID */}
        <div className="grid grid-cols-1 md:grid-cols-2 gap-8">
          {newsItems.map((news) => (
            <div
              key={news.slug}
              className="bg-blue-100 p-4 rounded-2xl shadow-md border border-blue-500 hover:shadow-xl transition-all flex flex-col"
            >
              {/* Image */}
              <div className="w-full h-64 overflow-hidden rounded-2xl mb-4 group">
                <img
                  src={news.image}
                  alt={news.title}
                  className="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                />
              </div>

              {/* Title */}
              <h3 className="text-2xl font-semibold text-gray-900 mb-4 text-center">
                {news.title}
              </h3>

              {/* Button */}
              <Link
                href={`/news/${news.slug}`}
                className="mt-auto mx-auto px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 hover:scale-105 transition-transform"
              >
                More Details
              </Link>
            </div>
          ))}
        </div>
      </div>
    </section>
  );
}
