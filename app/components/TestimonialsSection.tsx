"use client";

import { useEffect, useRef, useState } from "react";

declare global {
  interface Window {
    YT: any;
    onYouTubeIframeAPIReady: () => void;
  }
}

/* ---------------- Reusable YouTube Video ---------------- */
function YouTubeVideo({
  videoId,
  title,
}: {
  videoId: string;
  title: string;
}) {
  const playerRef = useRef<any>(null);
  const iframeId = `yt-${videoId}`;
  const [muted, setMuted] = useState(true);

  useEffect(() => {
    if (window.YT && window.YT.Player) {
      createPlayer();
      return;
    }

    const script = document.createElement("script");
    script.src = "https://www.youtube.com/iframe_api";
    document.body.appendChild(script);

    window.onYouTubeIframeAPIReady = createPlayer;

    function createPlayer() {
      playerRef.current = new window.YT.Player(iframeId, {
        events: {
          onReady: (e: any) => e.target.mute(),
        },
      });
    }

    return () => {
      playerRef.current?.destroy?.();
    };
  }, [iframeId]);

  const toggleMute = () => {
    if (!playerRef.current) return;
    muted ? playerRef.current.unMute() : playerRef.current.mute();
    setMuted(!muted);
  };

  return (
    <div className="relative">
      <iframe
        id={iframeId}
        className="w-full h-[315px] md:h-[350px]"
        src={`https://www.youtube.com/embed/${videoId}?autoplay=1&mute=1&loop=1&playlist=${videoId}&controls=1&rel=0`}
        title={title}
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
        allowFullScreen
      />
      <button
        onClick={toggleMute}
        className="absolute top-4 right-4 bg-white px-3 py-1 rounded shadow text-sm"
      >
        {muted ? "Unmute" : "Mute"}
      </button>
    </div>
  );
}

/* ---------------- Main Section ---------------- */
export default function TestimonialsSection() {
  return (
    <section className="py-20 bg-gray-50">
      <div className="max-w-8xl mx-auto px-4">

        {/* Video 1 */}
        <div className="flex flex-col md:flex-row items-center mb-16">
          <div className="w-full md:w-1/2 mb-6 md:mb-0">
            <YouTubeVideo
              videoId="7z5peiI6Dss"
              title="Dearo Investment Overview"
            />
          </div>
          <div className="w-full md:w-1/2 md:pl-8">
            <h3 className="text-2xl font-bold text-[#182359] text-center mb-6">
              A Trusted Partner for Sustainable Investments
            </h3>
            <p className="text-gray-700 text-justify">
              Dearo Investment Limited empowers entrepreneurs, SMEs, and
              individuals across Sri Lanka through accessible business and
              investment support. With a strong commitment to sustainability
              and community impact, Dearo enables long-term economic growth.
            </p>
          </div>
        </div>

        {/* Video 2 */}
        <div className="flex flex-col md:flex-row items-center">
          <div className="w-full md:w-1/2 md:pr-8 mb-6 md:mb-0 order-last md:order-first">
            <h3 className="text-2xl font-bold text-[#182359] text-center mb-6">
              Growing Agriculture, Empowering Farmers
            </h3>
            <p className="text-gray-700 text-justify">
              Dearo’s Agri Development Support initiative strengthens Sri
              Lanka’s agricultural sector through structured, sustainable
              development solutions that enhance productivity and rural
              prosperity.
            </p>
          </div>
          <div className="w-full md:w-1/2">
            <YouTubeVideo
              videoId="UxdckDrFK6I"
              title="Dearo Agri Development"
            />
          </div>
        </div>

      </div>
    </section>
  );
}
