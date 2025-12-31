"use client";
import { Target, Eye, Workflow, Goal, Award, ChevronLeft, ChevronRight } from "lucide-react";
import { useRef } from "react";
import { useEffect, useState } from "react";

type SnowStyle = {
  left: string;
  animationDuration: string;
  animationDelay: string;
  fontSize: string;
  opacity: number;
};

function Snow() {
  const [flakes, setFlakes] = useState<SnowStyle[]>([]);

  useEffect(() => {
    const generated = Array.from({ length: 120 }).map(() => ({
      left: `${Math.random() * 100}%`,
      animationDuration: `${10 + Math.random() * 20}s`,
      animationDelay: `${Math.random() * 10}s`,
      fontSize: `${10 + Math.random() * 14}px`,
      opacity: Math.random(),
    }));

    setFlakes(generated);
  }, []);

  if (flakes.length === 0) return null;

  return (
    <div className="snow-container">
      {flakes.map((style, i) => (
        <span key={i} className="snowflake" style={style}>
          ❄
        </span>
      ))}
    </div>
  );
}

export default function AboutSection() {
  const awardsRef = useRef<HTMLDivElement>(null);

  const scrollLeft = () => {
    awardsRef.current?.scrollBy({ left: -300, behavior: "smooth" });
  };

  const scrollRight = () => {
    awardsRef.current?.scrollBy({ left: 300, behavior: "smooth" });
  };

  const awards = [
    {
      title: "Peoples Excellency Awards 2024",
      desc: "The best entrepreneur finance company of the year. The best customer care service of the year. The excellence in work place leadership award of the year. The best joint venture finance company.",
      img: "/assests/AW1.jpg",
    },
    {
      title: "Iconic Awards 2024",
      desc: "The best investment product provider. The best customer service excellence of the year. The best projects finance company of the year. The best developing investment company of the year.",
      img: "/assests/AW5.jpg",
    },
    {
      title: "Asia Miracle Awards 2024",
      desc: "Best development finance company of the year. Best humanity and social development service provider.",
      img: "/assests/AW3.jpg",
    },
    {
      title: "BWIO USAAwards 2025",
      desc: "The best projects finance company of the year. The best entrepreneur finance company of the year.",
      img: "/assests/AW4.jpg",
    },
    {
      title: "Iconic Awards Bangkok 2025",
      desc: "The best workplace of the year. The fastest growing micro finance company in Sri Lanka. The best investment product provider of the year. The best in business finance innovation award of the year. The best entrepreneur finance company of the year",
      img: "/assests/AW2.jpg",
    },
    {
      title: "People's Excellency Awards 2025",
      desc: "The best SME Service Provider in Sri Lanka.",
      img: "/assests/people award 2025.jpeg",
    },
  ];

  return (
    <section id="about" className="relative py-16 sm:py-24 overflow-hidden bg-white">
      {/* Snow <Snow /> */}

      {/* Background Blobs */}
      <div className="absolute top-0 left-0 w-56 sm:w-72 h-56 sm:h-72 bg-green-300 opacity-20 rounded-full blur-3xl -z-10"></div>
      <div className="absolute bottom-0 right-0 w-56 sm:w-72 h-56 sm:h-72 bg-blue-300 opacity-20 rounded-full blur-3xl -z-10"></div>

      <div className="max-w-6xl mx-auto px-4 sm:px-6 lg:px-10 relative z-10">
        {/* About Description */}
        <h2 className="text-3xl sm:text-4xl md:text-5xl font-bold text-center mb-6 text-gray-900">
          About Our Company
        </h2>
        <p className="text-base sm:text-lg text-gray-700 text-center mb-12 sm:mb-16 max-w-4xl mx-auto">
          Dearo Investment Ltd was established under the Companies Act No. 07 of 2007 and officially incorporated on 1st September 2022 under registration number PB 262527. Though relatively young, the company has quickly positioned itself as a trusted and forward-looking financial services provider, addressing the growing need for secure, accessible, and well-governed financing solutions.
          Dearo Investment Ltd operates with a strong emphasis on risk management, financial discipline, and stakeholder protection. Robust internal controls and comprehensive risk mitigation frameworks are embedded across all financial activities. As part of this approach, insurance-backed protection mechanisms are implemented to safeguard customers and enhance operational resilience against unforeseen risks.
          With a network of 25 branches islandwide, Dearo Investment Ltd has established a strong nationwide presence, enabling inclusive access to financial services across diverse communities. This extensive reach, combined with professional governance and a commitment to sustainable growth, reinforces the company’s focus on long-term value creation, customer confidence, and financial stability.
        </p>

        {/* Vision / Mission / Goals / Process Boxes */}
        <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 sm:gap-8 mb-16 sm:mb-20">
          <div className="p-4 sm:p-6 bg-white shadow-lg rounded-2xl border hover:shadow-2xl transition">
            <div className="flex items-center gap-3 mb-3">
              <Target className="text-blue-600 w-6 h-6 sm:w-7 sm:h-7" />
              <h3 className="text-lg sm:text-xl font-semibold">Our Mission</h3>
            </div>
            <p className="text-gray-700 text-sm sm:text-base">Empowering customers through innovative solutions and service excellence.</p>
          </div>

          <div className="p-4 sm:p-6 bg-white shadow-lg rounded-2xl border hover:shadow-2xl transition">
            <div className="flex items-center gap-3 mb-3">
              <Eye className="text-purple-600 w-6 h-6 sm:w-7 sm:h-7" />
              <h3 className="text-lg sm:text-xl font-semibold">Our Vision</h3>
            </div>
            <p className="text-gray-700 text-sm sm:text-base">Inspiring progress through innovation and sustainability.</p>
          </div>

          <div className="p-4 sm:p-6 bg-white shadow-lg rounded-2xl border hover:shadow-2xl transition">
            <div className="flex items-center gap-3 mb-3">
              <Goal className="text-red-600 w-6 h-6 sm:w-7 sm:h-7" />
              <h3 className="text-lg sm:text-xl font-semibold">Our Goals</h3>
            </div>
            <ul className="list-disc list-inside text-gray-700 text-sm sm:text-base space-y-1">
              <li>Long-term value creation</li>
              <li>Continuous innovation</li>
              <li>Sustainable growth</li>
            </ul>
          </div>

          <div className="p-4 sm:p-6 bg-white shadow-lg rounded-2xl border hover:shadow-2xl transition">
            <div className="flex items-center gap-3 mb-3">
              <Workflow className="text-green-600 w-6 h-6 sm:w-7 sm:h-7" />
              <h3 className="text-lg sm:text-xl font-semibold">Our Process</h3>
            </div>
            <ul className="list-disc list-inside text-gray-700 text-sm sm:text-base space-y-1">
              <li>Quality & reliability</li>
              <li>Continuous improvement</li>
              <li>Responsible growth</li>
            </ul>
          </div>
        </div>

        {/* DEARO ACHIEVEMENTS heading */}
        <h2 className="text-3xl sm:text-4xl md:text-5xl font-bold text-center mb-6 sm:mb-10 text-gray-900">
          DEARO ACHIEVEMENTS
        </h2>

        {/* Two animated gold images */}
        <div className="flex flex-col sm:flex-row justify-center gap-4 sm:gap-6 mb-8 sm:mb-10">
          <div className="w-full sm:w-48 h-48 rounded-lg overflow-hidden relative bg-white animate-scale">
            <img src="/assests/award2.jpeg" alt="Left" className="w-full h-full object-contain" />
            <div className="absolute top-0 left-0 w-full h-full pointer-events-none gold-shine"></div>
          </div>
          <div className="w-full sm:w-48 h-48 rounded-lg overflow-hidden relative bg-white animate-scale">
            <img src="/assests/award3.jpeg" alt="Right" className="w-full h-full object-contain" />
            <div className="absolute top-0 left-0 w-full h-full pointer-events-none gold-shine"></div>
          </div>
        </div>

        {/* Awards carousel/cards */}
        <div className="relative w-full">
          {/* Arrows */}
          <button
            onClick={scrollLeft}
            className="absolute left-2 top-1/2 transform -translate-y-1/2 bg-white shadow rounded-full w-10 h-10 flex items-center justify-center z-20 hover:bg-gray-100"
          >
            <ChevronLeft className="w-5 h-5" />
          </button>
          <button
            onClick={scrollRight}
            className="absolute right-2 top-1/2 transform -translate-y-1/2 bg-white shadow rounded-full w-10 h-10 flex items-center justify-center z-20 hover:bg-gray-100"
          >
            <ChevronRight className="w-5 h-5" />
          </button>

          <div
            ref={awardsRef}
            className="flex gap-4 sm:gap-6 overflow-x-auto scrollbar-hide scroll-smooth px-2 sm:px-6 py-4"
          >
            {awards.map((award, idx) => (
              <div
                key={idx}
                className="flex-shrink-0 w-64 sm:w-72 md:w-80 bg-white rounded-2xl shadow-lg border p-4 flex flex-col justify-between hover:shadow-2xl transition"
                style={{ minHeight: "500px" }}
              >
                <div className="flex flex-col gap-2 sm:gap-3">
                  <Award className="text-yellow-500 w-10 h-10 mx-auto" />
                  <h3 className="text-lg sm:text-xl font-semibold text-center">{award.title}</h3>
                  <p className="text-gray-700 text-sm sm:text-base text-center">{award.desc}</p>
                </div>
                <div className="w-full h-48 sm:h-56 mt-4 overflow-hidden rounded-lg relative bg-gray-100">
                  <img
                    src={award.img}
                    alt={award.title}
                    className="w-full h-full object-contain"
                  />
                  <div className="absolute top-0 left-0 w-full h-full pointer-events-none shine"></div>
                </div>
              </div>
            ))}
          </div>
        </div>
      </div>
    </section>
  );
}
