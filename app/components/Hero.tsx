"use client";

import { useState, useEffect } from "react";

const heroImages = [
  "/assests/slide1.png",
  "/assests/slide2.png"
];





export default function Hero() {
  const [currentIndex, setCurrentIndex] = useState(0);
 

  // Auto-slide every 5 seconds
  useEffect(() => {
    const interval = setInterval(() => {
      console.log(heroImages.length);
      // console.log(prev);
      setCurrentIndex((prev) => (prev + 1) % (heroImages.length));
    }, 5000);
    return () => clearInterval(interval);
  }, []);

  return (
    <section
      className="relative w-full top-20 h-screen bg-cover bg-center flex flex-col justify-center items-center text-center text-white transition-all duration-1000"
      style={{ backgroundImage: `url(${heroImages[currentIndex]})` }}
    >
      {/* Logo Top Left */}
<div className="absolute top-0.5 left-0.5 z-50">
 
</div>

      {/* Dark Overlay */}
      <div className="absolute inset-0  bg-opacity-50"></div>

      {/* Content */}
<div className="relative z-10 max-w-3xl px-10 ml-auto text-right">
  <h1 className="text-5xl md:text-6xl font-bold mb-4 flex flex-col gap-2 items-end">
    <span className="text-blue-500 text-[2rem] md:text-7xl">
      The heartbeat
    </span>
    <span className="text-gray-500 text-[2rem] md:text-7xl ">
      of a nation shaping
    </span>
    <span className="text-gray-800 text-[2rem] md:text-6xl">
      better lives
    </span>
  </h1>

  <p className="text-xl md:text-2xl mb-6 font-bold">
    Providing trusted financial solution for a brighter future.
  </p>

  <div className="flex flex-wrap justify-end gap-4 relative">
    
  </div>
</div>

     
    </section>
  );
}
