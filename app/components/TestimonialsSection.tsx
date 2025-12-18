"use client";

import { useEffect, useRef, useState } from "react";

export default function TestimonialsSection() {
  const player1Ref = useRef<any>(null);
  const player2Ref = useRef<any>(null);
  const [muted1, setMuted1] = useState(true);
  const [muted2, setMuted2] = useState(true);

  // Load YouTube API
  useEffect(() => {
    const tag = document.createElement("script");
    tag.src = "https://www.youtube.com/iframe_api";
    const firstScriptTag = document.getElementsByTagName("script")[0];
    firstScriptTag.parentNode?.insertBefore(tag, firstScriptTag);

    // @ts-ignore
    window.onYouTubeIframeAPIReady = () => {
      // @ts-ignore
      player1Ref.current = new window.YT.Player("player1", {
        events: {
          onReady: (event: any) => event.target.mute(),
        },
      });

      // @ts-ignore
      player2Ref.current = new window.YT.Player("player2", {
        events: {
          onReady: (event: any) => event.target.mute(),
        },
      });
    };
  }, []);

  const toggleMute = (player: any, muted: boolean, setMuted: any) => {
    if (player) {
      if (muted) player.unMute();
      else player.mute();
      setMuted(!muted);
    }
  };

  return (
    <section className="py-20 bg-gray-50">
      <div className="max-w-7xl mx-auto px-4 text-center">
       

        {/* First Video */}
        <div className="flex flex-col md:flex-row items-center mb-12">
          <div className="w-full md:w-1/2 mb-6 md:mb-0 relative">
            <iframe
              id="player1"
              className="w-full h-[315px] md:h-[350px]"
              src="https://www.youtube.com/embed/7z5peiI6Dss?autoplay=1&loop=1&mute=1&controls=1&rel=0"
              title="YouTube video player"
              allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
              allowFullScreen
            ></iframe>
            <button
              onClick={() => toggleMute(player1Ref.current, muted1, setMuted1)}
              className="absolute top-4 right-4 bg-white text-gray-800 px-3 py-1 rounded shadow"
            >
              {muted1 ? "Unmute" : "Mute"}
            </button>
          </div>
          <div className="w-full md:w-1/2 md:pl-8 text-left">
            <h3 className="text-2xl text-center font-bold mb-10 text-[#182359] ">A Trusted Partner for Sustainable Investments</h3>
            <p className="text-gray-700 text-justify">
             Dearo Investment Limited is dedicated to empowering entrepreneurs, SMEs, and individuals across Sri Lanka through accessible and reliable financial solutions. With a strong focus on sustainable growth, community impact, and professional guidance, Dearo supports business development and investment opportunities that contribute to long-term economic progress.
            </p>
          </div>
        </div>

        {/* Second Video */}
        <div className="flex flex-col md:flex-row items-center">
          <div className="w-full md:w-1/2 md:pr-8 text-left mb-6 md:mb-0 order-last md:order-first">
            <h3 className="text-2xl text-[#182359] font-bold text-center mb-10">Growing Agriculture, Empowering Farmers</h3>
            <p className="text-gray-700 text-justify">
           Dearo Investment Limited’s Agri Financing initiative demonstrates the company’s commitment to supporting farmers through tailored agricultural financing solutions. The initiative highlights Dearo’s role in empowering the farming community by providing financial support that enhances agricultural productivity and promotes sustainable prosperity in rural areas of Sri Lanka.
            </p>
          </div>
          <div className="w-full md:w-1/2 relative">
            <iframe
              id="player2"
              className="w-full h-[315px] md:h-[350px]"
              src="https://www.youtube.com/embed/UxdckDrFK6I?autoplay=1&loop=1&mute=1&controls=1&rel=0"
              title="YouTube video player"
              allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
              allowFullScreen
            ></iframe>
            <button
              onClick={() => toggleMute(player2Ref.current, muted2, setMuted2)}
              className="absolute top-4 right-4 bg-white text-gray-800 px-3 py-1 rounded shadow"
            >
              {muted2 ? "Unmute" : "Mute"}
            </button>
          </div>
        </div>
      </div>
    </section>
  );
}
