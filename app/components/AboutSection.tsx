"use client";

import { Target, Eye, Workflow, Goal, Award, ChevronLeft, ChevronRight } from "lucide-react";
import { useRef } from "react";

/* ❄️ Snow Component */
function Snow() {
  return (
    <div className="snow-container">
      {Array.from({ length: 120 }).map((_, i) => (
        <span
          key={i}
          className="snowflake"
          style={{
            left: `${Math.random() * 100}%`,
            animationDuration: `${10 + Math.random() * 20}s`,
            animationDelay: `${Math.random() * 10}s`,
            fontSize: `${10 + Math.random() * 14}px`,
            opacity: Math.random(),
          }}
        >
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
      <Snow />

      {/* Background Blobs */}
      <div className="absolute top-0 left-0 w-72 h-72 bg-green-300 opacity-20 rounded-full blur-3xl -z-10"></div>
      <div className="absolute bottom-0 right-0 w-72 h-72 bg-blue-300 opacity-20 rounded-full blur-3xl -z-10"></div>

      <div className="max-w-6xl mx-auto px-6 relative z-10">
        {/* Heading */}
        <h2 className="text-4xl md:text-5xl font-bold text-center mb-10 text-gray-900">
          DEARO ACHIEVEMENTS
        </h2>

        {/* Two animated gold images below heading */}
        <div className="flex justify-center gap-30 mb-2">
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

      {/* ❄️ Snow & Shine Styles */}
      <style>{`
        .snow-container {
          pointer-events: none;
          position: fixed;
          inset: 0;
          z-index: 50;
          overflow: hidden;
        }

        .snowflake {
          position: absolute;
          top: -10%;
          color: white;
          animation-name: snow-fall;
          animation-timing-function: linear;
          animation-iteration-count: infinite;
          filter: drop-shadow(0 0 3px rgba(255,255,255,0.6));
        }

        @keyframes snow-fall {
          to { transform: translateY(120vh) translateX(40px); }
        }

        .scrollbar-hide::-webkit-scrollbar { display: none; }
        .scrollbar-hide { -ms-overflow-style: none; scrollbar-width: none; }

        /* Silver shine for award images */
        .shine {
          background: linear-gradient(120deg, rgba(255, 255, 255, 0.0) 0%, rgba(255, 255, 255, 0.4) 50%, rgba(255, 255, 255, 0.0) 100%);
          transform: translateX(-100%) rotate(20deg);
          animation: shine 2s infinite;
        }
        @keyframes shine { 0% { transform: translateX(-100%) rotate(20deg); } 100% { transform: translateX(200%) rotate(20deg); } }

        /* Gold shine for side images */
        .gold-shine {
          background: linear-gradient(120deg, rgba(255, 215, 0, 0.0) 0%, rgba(255, 215, 0, 0.5) 50%, rgba(255, 215, 0, 0.0) 100%);
          transform: translateX(-100%) rotate(20deg);
          animation: goldShine 3s infinite;
        }
        @keyframes goldShine { 0% { transform: translateX(-100%) rotate(20deg); } 100% { transform: translateX(200%) rotate(20deg); } }

        /* Scale/pulse animation for side images */
        @keyframes scalePulse {
          0% { transform: scale(0.8); }
          50% { transform: scale(1); }
          100% { transform: scale(0.8); }
        }
        .animate-scale {
          animation: scalePulse 3s infinite ease-in-out;
        }
      `}</style>
    </section>
  );
}
