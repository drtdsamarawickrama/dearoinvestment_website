"use client";

import Link from "next/link";

interface NewsItem {
  title: string;
  image: string;
  slug: string;
}

const newsItems: NewsItem[] = [
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
    title: "Chenkalady Branch Opening",
    image: "/assests/Checn.jpg",
    slug: "chenkalady-branch-opening",
  },{
    title: "Batticolo Branch Opening",
    image: "/assests/baticolo.jpg",
    slug: "batticolo-branch-opening",
  },
 
];

export default function NewsPagecontent() {
  return (
    <div className="px-6 py-10">
      {/* Grid Container */}
      <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        {newsItems.map((news) => (
          <div
            key={news.slug}
            className="bg-blue-100 p-4 rounded-2xl shadow-md border border-blue-500 hover:shadow-xl flex flex-col"
          >
            <div className="w-full h-64 overflow-hidden rounded-2xl mb-4">
              <img
                src={news.image}
                alt={news.title}
                className="w-full h-full object-cover transition-transform duration-500 hover:scale-105"
              />
            </div>

            <h3 className="text-2xl font-semibold text-gray-900 mb-4 text-center">
              {news.title}
            </h3>

            <Link
              href={`/news/${news.slug}`}
              className="mt-auto mx-auto px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition"
            >
              More Details
            </Link>
          </div>
        ))}
      </div>
    </div>
  );
}
