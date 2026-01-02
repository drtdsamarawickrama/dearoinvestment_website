"use client";

import { useState, useEffect } from "react";

const slides = [
  {
    image: "/assests/slide1.png",
    title: ["The heartbeat", "of a nation shaping", "better lives"],
    subtitle: "Providing trusted financial solution for a brighter future.",
    align: "right",
  },
  {
    image: "/assests/slide2.png",
    title: ["Empowering", "Sri Lanka’s", "Financial Growth"],
    subtitle: "Your trusted partner in every financial journey.",
    align: "left",
  },
];

export default function Hero() {
  const [currentIndex, setCurrentIndex] = useState(0);

  useEffect(() => {
    const interval = setInterval(() => {
      setCurrentIndex((prev) => (prev + 1) % slides.length);
    }, 5000);
    return () => clearInterval(interval);
  }, []);

  const isLeft = slides[currentIndex].align === "left";

  return (
    <section
      key={currentIndex}
      className="relative w-full mt-20 h-[60vh] sm:h-[70vh] md:h-[80vh] lg:h-screen bg-cover bg-center flex items-center transition-all duration-1000"
      style={{ backgroundImage: `url(${slides[currentIndex].image})` }}
    >
      {/* Overlay */}
      <div className="absolute inset-0 bg-black/30" />

      {/* Content */}
      <div
        className={`relative z-10 w-full max-w-4xl px-6 sm:px-10 text-white
          ${isLeft ? "mr-auto text-left animate-slide-left" : "ml-auto text-right animate-slide-right"}
        `}
      >
        {/* Title */}
        <h1
          className={`font-bold mb-3 flex flex-col gap-2
            ${isLeft ? "items-start" : "items-end"}
          `}
        >
          <span className="text-3xl sm:text-4xl md:text-5xl lg:text-6xl xl:text-7xl leading-snug">
            {slides[currentIndex].title[0]}
          </span>
          <span className="text-3xl sm:text-4xl md:text-5xl lg:text-6xl xl:text-7xl leading-snug">
            {slides[currentIndex].title[1]}
          </span>
          <span className="text-2xl sm:text-3xl md:text-4xl lg:text-5xl xl:text-6xl leading-snug">
            {slides[currentIndex].title[2]}
          </span>
        </h1>

        {/* Subtitle - RIGHT under title */}
        <p
          className={`text-base sm:text-lg md:text-xl lg:text-2xl font-semibold text-gray-200 max-w-md
            ${isLeft ? "text-left" : "text-right ml-auto"}
          `}
        >
          {slides[currentIndex].subtitle}
        </p>
      </div>
    </section>
  );
}
