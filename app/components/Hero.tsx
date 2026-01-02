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
  const [fade, setFade] = useState(true);

  useEffect(() => {
    const interval = setInterval(() => {
      setFade(false); // start fade out
      setTimeout(() => {
        setCurrentIndex((prev) => (prev + 1) % slides.length);
        setFade(true); // fade in
      }, 500); // fade duration
    }, 5000); // slide duration
    return () => clearInterval(interval);
  }, []);

  const slide = slides[currentIndex];
  const isLeft = slide.align === "left";

  return (
    <section
      className="relative w-full mt-20 h-[60vh] sm:h-[70vh] md:h-[80vh] lg:h-screen overflow-hidden flex items-center transition-all duration-500"
      style={{
        backgroundImage: `url(${slide.image})`,
        backgroundSize: "cover",
        backgroundRepeat: "no-repeat",
        backgroundPosition: "center center",
      }}
    >
      {/* Overlay */}
      <div className="absolute inset-0 bg-black/30" />

      {/* Content */}
      <div
        className={`relative z-10 w-full max-w-4xl px-6 sm:px-10 text-white transition-opacity duration-500 ${
          fade ? "opacity-100" : "opacity-0"
        } ${isLeft ? "mr-auto text-left" : "ml-auto text-right"}`}
      >
        {/* Title */}
        <h1
          className={`font-bold mb-3 flex flex-col gap-2 ${
            isLeft ? "items-start" : "items-end"
          }`}
        >
          {slide.title.map((line, idx) => (
            <span
              key={idx}
              className="text-3xl sm:text-4xl md:text-5xl lg:text-6xl xl:text-7xl leading-snug"
            >
              {line}
            </span>
          ))}
        </h1>

        {/* Subtitle */}
        <p
          className={`text-base sm:text-lg md:text-xl lg:text-2xl font-semibold text-gray-200 max-w-md ${
            isLeft ? "text-left" : "text-right ml-auto"
          }`}
        >
          {slide.subtitle}
        </p>
      </div>
    </section>
  );
}
