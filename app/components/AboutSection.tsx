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

  if (flakes.length === 0) return null; // prevents mismatch

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
      title: "Global Finance Awards 2025",
      desc: "Top global financial service provider of the year.",
      img: "/assests/award2.jpeg",
    },
  ];

  return (
    <section id="about" className="relative py-24 overflow-hidden bg-white">
      {/* <Snow /> */}

      {/* Background Blobs */}
      <div className="absolute top-0 left-0 w-72 h-72 bg-green-300 opacity-20 rounded-full blur-3xl -z-10"></div>
      <div className="absolute bottom-0 right-0 w-72 h-72 bg-blue-300 opacity-20 rounded-full blur-3xl -z-10"></div>

      <div className="max-w-6xl mx-auto px-6 relative z-10">
        {/* About Description */}
        <h2 className="text-4xl md:text-5xl font-bold text-center mb-6 text-gray-900">
          About Our Company
        </h2>
        <p className="text-lg text-gray-700 justify-center text-center mb-16 max-w-4xl mx-auto">
          Dearo Investment Ltd was established under the Companies Act No. 07 of 2007 and officially incorporated on 1st September 2022 under registration number PB 262527. Though relatively young, the company has quickly positioned itself as a trusted and forward-looking financial services provider, addressing the growing need for secure, accessible, and well-governed financing solutions.
          Dearo Investment Ltd operates with a strong emphasis on risk management, financial discipline, and stakeholder protection. Robust internal controls and comprehensive risk mitigation frameworks are embedded across all financial activities. As part of this approach, insurance-backed protection mechanisms are implemented to safeguard customers and enhance operational resilience against unforeseen risks.
          With a network of 25 branches islandwide, Dearo Investment Ltd has established a strong nationwide presence, enabling inclusive access to financial services across diverse communities. This extensive reach, combined with professional governance and a commitment to sustainable growth, reinforces the company’s focus on long-term value creation, customer confidence, and financial stability.
        </p>

        {/* Vision / Mission / Goals / Process Boxes */}
        <div className="grid md:grid-cols-2 lg:grid-cols-4 gap-10 mb-20">
          <div className="p-6 bg-white shadow-lg rounded-2xl border hover:shadow-2xl transition">
            <div className="flex items-center gap-3 mb-4">
              <Target className="text-blue-600" />
              <h3 className="text-xl font-semibold">Our Mission</h3>
            </div>
            <p className="text-gray-700">Empowering customers through innovative solutions and service excellence.</p>
          </div>

          <div className="p-6 bg-white shadow-lg rounded-2xl border hover:shadow-2xl transition">
            <div className="flex items-center gap-3 mb-4">
              <Eye className="text-purple-600" />
              <h3 className="text-xl font-semibold">Our Vision</h3>
            </div>
            <p className="text-gray-700">Inspiring progress through innovation and sustainability.</p>
          </div>

          <div className="p-6 bg-white shadow-lg rounded-2xl border hover:shadow-2xl transition">
            <div className="flex items-center gap-3 mb-4">
              <Goal className="text-red-600" />
              <h3 className="text-xl font-semibold">Our Goals</h3>
            </div>
            <ul className="list-disc list-inside text-gray-700 space-y-2">
              <li>Long-term value creation</li>
              <li>Continuous innovation</li>
              <li>Sustainable growth</li>
            </ul>
          </div>

          <div className="p-6 bg-white shadow-lg rounded-2xl border hover:shadow-2xl transition">
            <div className="flex items-center gap-3 mb-4">
              <Workflow className="text-green-600" />
              <h3 className="text-xl font-semibold">Our Process</h3>
            </div>
            <ul className="list-disc list-inside text-gray-700 space-y-2">
              <li>Quality & reliability</li>
              <li>Continuous improvement</li>
              <li>Responsible growth</li>
            </ul>
          </div>
        </div>

        {/* DEARO ACHIEVEMENTS heading */}
        <h2 className="text-4xl md:text-5xl font-bold text-center mb-10 text-gray-900">
          DEARO ACHIEVEMENTS
        </h2>

        {/* Two animated gold images below heading */}
        <div className="flex justify-center gap-6 mb-10">
          <div className="w-100 h-100 rounded-lg overflow-hidden relative bg-white animate-scale">
            <img src="/assests/award2.jpeg" alt="Left" className="w-full h-full object-contain" />
            <div className="absolute top-0 left-0 w-full h-full pointer-events-none gold-shine"></div>
          </div>
          <div className="w-100 h-100 rounded-lg overflow-hidden relative bg-white animate-scale">
            <img src="/assests/award3.jpeg" alt="Right" className="w-full h-full object-contain" />
            <div className="absolute top-0 left-0 w-full h-full pointer-events-none gold-shine"></div>
          </div>
        </div>

        {/* Awards carousel/cards below side images */}
        <div className="relative w-full">
          {/* Arrows */}
          <button
            onClick={scrollLeft}
            className="absolute left-0 top-1/2 transform -translate-y-1/2 bg-white shadow rounded-full w-10 h-10 flex items-center justify-center z-20 hover:bg-gray-100"
          >
            <ChevronLeft />
          </button>
          <button
            onClick={scrollRight}
            className="absolute right-0 top-1/2 transform -translate-y-1/2 bg-white shadow rounded-full w-10 h-10 flex items-center justify-center z-20 hover:bg-gray-100"
          >
            <ChevronRight />
          </button>

          <div
            ref={awardsRef}
            className="flex gap-6 overflow-x-auto scrollbar-hide scroll-smooth px-10 py-4"
          >
            {awards.map((award, idx) => (
              <div
                key={idx}
                className="flex-shrink-0 w-64 bg-white rounded-2xl shadow-lg border p-4 flex flex-col justify-between hover:shadow-2xl transition"
                style={{ minHeight: "500px" }}
              >
                <div className="flex flex-col gap-3">
                  <Award className="text-yellow-500 w-12 h-12 mx-auto" />
                  <h3 className="text-xl font-semibold text-center">{award.title}</h3>
                  <p className="text-gray-700 text-center text-sm">{award.desc}</p>
                </div>
                <div className="w-full h-48 mt-4 overflow-hidden rounded-lg relative bg-gray-100">
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
