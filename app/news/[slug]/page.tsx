"use client";

import { useParams } from "next/navigation";
import Link from "next/link";

const newsItems = [
  {
    title: "Dehiaththkandiya Branch Opening",
    image: "/assests/dehiaththa.jpg",
    slug: "dehiaththkandiya-branch-opening",
    overlayTitle: "Dearo Investment දෙහිඅත්තකණ්ඩිය නව ශාඛාව",
    content: `
DEARO investment ආයතනයේ නව ශාඛාවක් 2024 මැයි 20 දින දෙහිඅත්තකණ්ඩිය නගරයේදී විවෘත විය. ...
    `,
  },
  {
    title: "Polonnaruwa Branch Opening",
    image: "/assests/polonnaruwa.jpg",
    slug: "polonnaruwa-branch-opening",
    overlayTitle: "Dearo Investment පොලොන්නරුව ශාඛාව විවෘත කිරීම",
    content: `
මෙමගින් ග්‍රාමීය ජනතාවගේ ජීවන තත්ත්වය නගා සිටුවීමට අවශ්‍ය ව්‍යාපාර ණය, ...
    `,
  },
];

export default function NewsDetailPage() {
  const { slug } = useParams();
  const news = newsItems.find((item) => item.slug === slug);

  if (!news) {
    return (
      <div className="max-w-4xl mx-auto p-6 text-center">
        <h1 className="text-3xl font-bold mb-4">News Not Found</h1>
      </div>
    );
  }

  return (
    <div className="max-w-4xl mx-auto p-6 space-y-6">
      <h1 className="text-3xl font-bold">{news.title}</h1>

      <img
        src={news.image}
        alt={news.title}
        className="w-full h-96 object-cover rounded-2xl"
      />

      {/* Bold centered text under image */}
      <h2 className="text-center font-bold text-x3mt-4">
        {news.overlayTitle}
      </h2>

      <div
        className="text-gray-700 whitespace-pre-line mt-4"
        dangerouslySetInnerHTML={{ __html: news.content.replace(/\n/g, "<br/>") }}
      />

      <Link
        href="/news"
        className="inline-block mt-4 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700"
      >
        Back to News
      </Link>
    </div>
  );
}
