"use client";

import { useRef } from "react";
import { MapContainer, TileLayer, Marker, Popup } from "react-leaflet";
import type { Map as LeafletMap, DivIcon } from "leaflet";
import "leaflet/dist/leaflet.css";

// Create highlighted yellow pulsing marker with label
const createYellowIcon = (name: string): DivIcon =>
  new (require("leaflet").DivIcon)({
    className: "custom-yellow-marker-with-label",
    html: `
      <div class="pulse-marker"></div>
      <span class="branch-label">${name}</span>
    `,
    iconSize: [150, 50],
    iconAnchor: [10, 10],
  });

export default function ContactSection() {
  const mapRef = useRef<LeafletMap | null>(null);

  const branches = [
    { city: "Dehiattakandiya", lat: 7.567, lng: 81.850 },
    { city: "Batticaloa", lat: 7.711, lng: 81.678 },
    { city: "Dambulla", lat: 7.860, lng: 80.650 },
    { city: "Embilipitiya", lat: 6.450, lng: 80.350 },
    { city: "Hungama", lat: 6.983, lng: 81.083 },
    { city: "Nelliady", lat: 9.779, lng: 80.145 },
    { city: "Head Office - Colombo", lat: 6.927, lng: 79.861 },
    { city: "Chunnakam", lat: 9.788, lng: 80.036 },
    { city: "Thissamaharama", lat: 6.186, lng: 81.103 },
    { city: "Trincomalee", lat: 8.587, lng: 81.215 },
    { city: "Thirukkovil", lat: 7.215, lng: 81.900 },
    { city: "Kokkaddicholai", lat: 7.711, lng: 81.650 },
    { city: "Chenkalady", lat: 7.700, lng: 81.750 },
    { city: "Kaluwanchikudy", lat: 7.650, lng: 81.833 },
    { city: "Vavunatheevu", lat: 8.405, lng: 79.790 },
    { city: "Muthur", lat: 8.390, lng: 81.400 },
    { city: "Mannar", lat: 8.983, lng: 79.900 },
    { city: "Kinniya", lat: 8.566, lng: 81.350 },
    { city: "Mahiyanganaya", lat: 7.160, lng: 81.033 },
    { city: "Kalmunai", lat: 7.400, lng: 81.830 },
    { city: "Vavuniya", lat: 8.754, lng: 80.500 },
    { city: "Kanthale", lat: 8.200, lng: 81.200 },
    { city: "Polonnaruwa", lat: 7.933, lng: 81.000 },
    { city: "Ampara", lat: 7.300, lng: 81.670 },
  ];

  return (
    <section className="py-24 bg-gradient-to-b from-blue-50 to-gray-100">
      <div className="max-w-7xl mx-auto px-6">
        <div className="grid md:grid-cols-3 gap-12">
          {/* LEFT: Contact Info */}
          <div className="bg-white shadow-xl p-8 rounded-2xl border border-gray-200 hover:shadow-2xl transition-all duration-300">
            <h3 className="text-2xl font-semibold mb-6 text-gray-800">
              Contact Information
            </h3>
            <p className="text-gray-700 mb-3">
              <strong>Address:</strong> 8th floor, Ceylinco House, No 69,
              Janadhipathi Mawatha, Colombo 01
            </p>
            <p className="text-gray-700 mb-3">
              <strong>Phone:</strong> 074 390 8274
            </p>
            <p className="text-gray-700 mb-6">
              <strong>Email:</strong> info@dearoinvestment.com
            </p>
          </div>

          {/* RIGHT: Form + Map */}
          <div className="md:col-span-2 flex flex-col md:flex-row gap-6">
            {/* Box 1: Message Form */}
            <div className="flex-1 bg-white shadow-xl p-8 rounded-2xl border border-gray-200 hover:shadow-2xl transition-all duration-300">
              <h3 className="text-2xl font-semibold mb-6 text-gray-800">
                Send Us a Message
              </h3>
              <form className="space-y-5">
                <input
                  type="text"
                  placeholder="Your Name"
                  className="w-full border border-gray-300 rounded-lg px-4 py-3 focus:border-blue-600 focus:ring-2 focus:ring-blue-200 transition"
                />
                <input
                  type="email"
                  placeholder="Your Email"
                  className="w-full border border-gray-300 rounded-lg px-4 py-3 focus:border-blue-600 focus:ring-2 focus:ring-blue-200 transition"
                />
                <textarea
                  rows={5}
                  placeholder="Your Message"
                  className="w-full border border-gray-300 rounded-lg px-4 py-3 focus:border-blue-600 focus:ring-2 focus:ring-blue-200 transition"
                ></textarea>
                <button
                  type="submit"
                  className="w-full bg-blue-600 text-white py-3 rounded-lg text-lg font-medium hover:bg-blue-700 transition"
                >
                  Send Message
                </button>
              </form>
            </div>

            {/* Box 2: Interactive Map */}
            <div className="flex-1 bg-white shadow-xl p-6 rounded-2xl border border-gray-200 hover:shadow-2xl transition-all duration-300 flex flex-col items-center justify-center">
              <h3 className="text-2xl font-semibold mb-6 text-gray-800">
                Our Branches
              </h3>

              <MapContainer
                center={[7.8731, 80.7718]}
                zoom={7}
                scrollWheelZoom={false}
                doubleClickZoom={false}
  touchZoom={false}
                className="w-full h-96 rounded-lg flex-1 bg-white shadow-xl p-6 rounded-2xl border border-gray-200 hover:shadow-2xl transition-all duration-300 flex flex-col items-center justify-center"
                ref={mapRef}
              >
                <TileLayer url="https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png" />
                {branches.map((branch, idx) => (
                  <Marker
                    key={idx}
                    position={[branch.lat, branch.lng]}
                    icon={createYellowIcon(branch.city) as any}
                  >
                    <Popup>{branch.city}</Popup>
                  </Marker>
                ))}
              </MapContainer>
            </div>
          </div>
        </div>
      </div>

      {/* Global style injection for Leaflet DivIcon */}
      <style>{`
        .custom-yellow-marker-with-label .pulse-marker {
          width: 20px;
          height: 20px;
          background: red;
          border-radius: 50%;
          border: 2px solid white;
          animation: pulse 1.2s infinite;
          display: inline-block;
          vertical-align: middle;
          position: relative;
        }

        .custom-yellow-marker-with-label .pulse-marker::after {
          content: "";
          width: 5px;
          height: 5px;
          border-radius: 50%;
          position: absolute;
          top: 0;
          left: 0;
          background: rgba(255, 255, 0, 0.4);
          animation: pulse 1.2s infinite;
        }

        .custom-yellow-marker-with-label .branch-label {
          margin-left: 10px;
          font-weight: bold;
          color: yellow;
          text-shadow: 0 0 4px black;
          vertical-align: middle;
          white-space: nowrap;
          animation: pulse-text 1.2s infinite;
        }

        @keyframes pulse {
          0% { transform: scale(0.8); opacity: 0.7; }
          50% { transform: scale(1.5); opacity: 0; }
          100% { transform: scale(0.8); opacity: 0.7; }
        }

        @keyframes pulse-text {
          0% { opacity: 0.7; }
          50% { opacity: 1; }
          100% { opacity: 0.7; }
        }
      `}</style>
    </section>
  );
}
