"use client";

import { useState } from "react";
import Head from "next/head";

export default function CareerPage() {
  const [openImage, setOpenImage] = useState<string | null>(null);

  return (
    <>
      {/* Page Title */}
      <Head>
        <title>Dearo Career</title>
      </Head>

      <main className="w-full">
        {/* Banner */}
        <div className="relative w-full h-64 md:h-80 lg:h-96">
          <img
            src="/assests/career.jpg"
            alt="Dearo Career Banner"
            className="w-full h-full object-cover"
          />
          <div className="absolute inset-0 flex flex-col justify-center items-center text-center px-4 bg-black/40">
            <h1 className="text-3xl md:text-4xl font-bold text-white mb-2">
              Join Our Team
            </h1>
            <p className="text-white text-base md:text-lg max-w-2xl">
              Explore exciting career opportunities at Dearo Investment. We are
              looking for talented and motivated individuals to grow with us.
            </p>
          </div>
        </div>

        {/* Job listings */}
        <div className="max-w-6xl mx-auto p-6">
          <h2 className="text-2xl font-bold text-blue-900 mb-6 text-center">
            Current Job Openings
          </h2>

          <div className="space-y-8">
            {/* Graphic Designer */}
            <div className="relative p-6 border rounded-xl shadow hover:shadow-lg transition">
              <h3 className="text-xl font-bold mb-2">Graphic Designer</h3>
              <p className="text-gray-700 mb-2">
                Location: Colombo | Full-time
              </p>
              <p className="text-gray-600 mb-4">
                Join our IT team to build innovative financial solutions for our
                clients.
              </p>
              <button
                onClick={() => setOpenImage("/assests/grapic.png")}
                className="absolute top-6 right-6 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition"
              >
                Apply Now
              </button>
            </div>

            {/* Marketing Executive */}
            <div className="relative p-6 border rounded-xl shadow hover:shadow-lg transition">
              <h3 className="text-xl font-bold mb-2">  JUNIOR EXECUTIVE</h3>
              <p className="text-gray-700 mb-2">
                Island wide | Full-time
              </p>
              <p className="text-gray-600 mb-4">
                Help us expand our brand presence and connect with our valued
                customers.
              </p>
              <button
                onClick={() =>
                  setOpenImage("/assests/mar.jpg")
                }
                className="absolute top-6 right-6 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition"
              >
                Apply Now
              </button>
            </div> 
            <div className="relative p-6 border rounded-xl shadow hover:shadow-lg transition">
              <h3 className="text-xl font-bold mb-2"> Senior Executive </h3>
              <p className="text-gray-700 mb-2">
                Island wide | Full-time
              </p>
              <p className="text-gray-600 mb-4">
                Help us expand our brand presence and connect with our valued
                customers.
              </p>
              <button
                onClick={() =>
                  setOpenImage("/assests/sen.jpg")
                }
                className="absolute top-6 right-6 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition"
              >
                Apply Now
              </button>
            </div>
            <div className="relative p-6 border rounded-xl shadow hover:shadow-lg transition">
              <h3 className="text-xl font-bold mb-2">Marketing Officer </h3>
              <p className="text-gray-700 mb-2">
               East region | Full-time
              </p>
              <p className="text-gray-600 mb-4">
               Join our marketing team to drive impactful campaigns and engage with our audience.
              </p>
              <button
                onClick={() =>
                  setOpenImage("/assests/Marketing.jpg")
                }
                className="absolute top-6 right-6 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition"
              >
                Apply Now
              </button>
            </div>
          </div>
        </div>

        {/* MODAL WITH SCROLL + ANIMATION */}
        {openImage && (
          <div
            className="fixed inset-0 z-50 flex items-center justify-center bg-black/70 px-4 animate-popup-bg"
            onClick={() => setOpenImage(null)}
          >
            <div
              className="relative bg-white rounded-xl shadow-2xl p-4 max-w-lg w-full max-h-[90vh] overflow-y-auto animate-popup"
              onClick={(e) => e.stopPropagation()}
            >
              {/* Close button */}
              <button
                onClick={() => setOpenImage(null)}
                className="absolute -top-3 -right-3 bg-white text-black rounded-full w-8 h-8 flex items-center justify-center shadow hover:bg-gray-100"
              >
                ✕
              </button>

              {/* Poster Box */}
              <div className="border rounded-lg overflow-hidden">
                <img
                  src={openImage}
                  alt="Job Poster"
                  className="w-full h-auto object-contain"
                />
              </div>
            </div>
          </div>
        )}
      </main>
    </>
  );
}
