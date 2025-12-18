"use client";

import { Target, Eye, Workflow, Goal } from "lucide-react";

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
  return (
    <section
      id="about"
      className="relative py-24 overflow-hidden bg-white"
    >
      {/* ❄️ Snow Effect */}
      <Snow />

      {/* Background Blobs */}
      <div className="absolute top-0 left-0 w-72 h-72 bg-green-300 opacity-20 rounded-full blur-3xl -z-10"></div>
      <div className="absolute bottom-0 right-0 w-72 h-72 bg-blue-300 opacity-20 rounded-full blur-3xl -z-10"></div>

      <div className="max-w-6xl mx-auto px-6 relative z-10">

        {/* Heading */}
        <h2 className="text-4xl md:text-5xl font-bold text-center mb-10 text-gray-900">
          About Our Company
        </h2>

        {/* Description */}
        <p className="text-lg text-gray-700 leading-relaxed text-center mb-16 max-w-4xl mx-auto">
          Dearo Investment Limited is a fully incorporated public company in Sri Lanka,
          registered under the Companies Act No. 07 of 2007. We provide innovative
          financial services and digital financial solutions supporting SMEs and MSMEs.
        </p>

        {/* Cards */}
        <div className="grid md:grid-cols-2 lg:grid-cols-4 gap-10">

          <div className="p-6 bg-white shadow-lg rounded-2xl border hover:shadow-2xl transition">
            <div className="flex items-center gap-3 mb-4">
              <Target className="text-blue-600" />
              <h3 className="text-xl font-semibold">Our Mission</h3>
            </div>
            <p className="text-gray-700">
              Empowering customers through innovative solutions and service excellence.
            </p>
          </div>

          <div className="p-6 bg-white shadow-lg rounded-2xl border hover:shadow-2xl transition">
            <div className="flex items-center gap-3 mb-4">
              <Eye className="text-purple-600" />
              <h3 className="text-xl font-semibold">Our Vision</h3>
            </div>
            <p className="text-gray-700">
              Inspiring progress through innovation and sustainability.
            </p>
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
      </div>

      {/* ❄️ Snow Styles */}
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
          to {
            transform: translateY(120vh) translateX(40px);
          }
        }
      `}</style>
    </section>
  );
}
