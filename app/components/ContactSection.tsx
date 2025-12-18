"use client";

import { useRef, useEffect } from "react";
import { MapContainer, TileLayer, Marker, Popup } from "react-leaflet";
import type { Map as LeafletMap, DivIcon } from "leaflet";
import "leaflet/dist/leaflet.css";

// 🔴 Custom Marker
const createYellowIcon = (name: string): DivIcon =>
  new (require("leaflet").DivIcon)({
    className: "custom-yellow-marker-with-label",
    html: `
      <div class="pulse-marker"></div>
      <span class="branch-label">${name}</span>
    `,
    iconSize: [140, 40],
    iconAnchor: [10, 10],
  });

export default function ContactSection() {
  const mapRef = useRef<LeafletMap | null>(null);

  const branches = [ 
    { city: "Dehiattakandiya", lat: 7.567, lng: 81.85 },
    { city: "Batticaloa", lat: 7.711, lng: 81.678 },
    { city: "Dambulla", lat: 7.86, lng: 80.65 },
    { city: "Embilipitiya", lat: 6.45, lng: 80.35 },
    { city: "Hungama", lat: 6.983, lng: 81.083 },
    { city: "Nelliady", lat: 9.779, lng: 80.145 },
    { city: "Head Office - Colombo", lat: 6.927, lng: 79.861 },
    { city: "Chunnakam", lat: 9.788, lng: 80.036 },
    { city: "Thissamaharama", lat: 6.186, lng: 81.103 },
    { city: "Trincomalee", lat: 8.587, lng: 81.215 },
    { city: "Thirukkovil", lat: 7.215, lng: 81.9 },
    { city: "Kokkaddicholai", lat: 7.711, lng: 81.65 },
    { city: "Chenkalady", lat: 7.7, lng: 81.75 },
    { city: "Kaluwanchikudy", lat: 7.65, lng: 81.833 },
    { city: "Vavunatheevu", lat: 8.405, lng: 79.79 },
    { city: "Muthur", lat: 8.39, lng: 81.4 },
    { city: "Mannar", lat: 8.983, lng: 79.9 },
    { city: "Kinniya", lat: 8.566, lng: 81.35 },
    { city: "Mahiyanganaya", lat: 7.16, lng: 81.033 },
    { city: "Kalmunai", lat: 7.4, lng: 81.83 },
    { city: "Vavuniya", lat: 8.754, lng: 80.5 },
    { city: "Kanthale", lat: 8.2, lng: 81.2 },
    { city: "Polonnaruwa", lat: 7.933, lng: 81 },
    { city: "Ampara", lat: 7.3, lng: 81.67 },
  ];

  // ✅ Force Leaflet resize
  useEffect(() => {
    if (mapRef.current) {
      setTimeout(() => mapRef.current?.invalidateSize(), 200);
    }
  }, []);

  // ✅ Open Google Maps
  const openGoogleMaps = (lat: number, lng: number) => {
    window.open(`https://www.google.com/maps?q=${lat},${lng}`, "_blank");
  };

  return (
    <section className="py-28 bg-gray-100">
      <div className="max-w-7xl mx-auto px-4">
        <div className="grid md:grid-cols-3 gap-8">

          {/* CONTACT INFO + MAP */}
          <div className="bg-white p-8 rounded-2xl shadow-lg flex flex-col gap-8">
            <h3 className="text-2xl font-semibold text-gray-800 text-center">
              Contact Information
            </h3>
            <p><strong>Address:</strong>We are located at 8th floor, Ceylinco House, No 69,Janadhipathi Mawatha, Colombo 01</p>
            <p><strong>Phone:</strong> 074 390 8274</p>
            <p><strong>Email:</strong> info@dearoinvestment.com</p>

            <div className="w-full h-[400px] rounded-xl overflow-hidden border">
              <MapContainer
                center={[7.8731, 80.7718]}
                zoom={7}
                scrollWheelZoom={false}
                className="w-full h-full"
                ref={mapRef}
              >
                <TileLayer url="https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png" />
                {branches.map((b, i) => (
                  <Marker
                    key={i}
                    position={[b.lat, b.lng]}
                    icon={createYellowIcon(b.city) as any}
                    eventHandlers={{
                      click: () => openGoogleMaps(b.lat, b.lng),
                    }}
                  >
                    <Popup>
                      <button
                        className="text-blue-600 underline font-medium"
                        onClick={() => openGoogleMaps(b.lat, b.lng)}
                      >
                        Open in Google Maps
                      </button>
                    </Popup>
                  </Marker>
                ))}
              </MapContainer>
            </div>
          </div>

          {/* OUR BRANCHES */}
          <div className="bg-white p-8 rounded-2xl shadow-lg">
            <h3 className="text-2xl font-semibold mb-6 text-gray-800 text-center">
              Our Branches
            </h3>

            <div className="grid grid-cols-2 gap-3">
              {branches.map((b, i) => (
                <button
                  key={i}
                  onClick={() => openGoogleMaps(b.lat, b.lng)}
                  className="text-left px-4 py-2 rounded-lg border border-blue-200
                             bg-blue-50 text-blue-800 font-medium
                             hover:bg-blue-600 hover:text-white
                             transition-all duration-200 shadow-sm"
                >
                  {b.city}
                </button>
              ))}
            </div>
          </div>

          {/* SEND MESSAGE */}
          <div className="bg-white p-8 rounded-2xl shadow-lg">
            <h3 className="text-2xl font-semibold mb-6 text-gray-800 text-center">
              Send Us a Message
            </h3>
            <form className="space-y-4">
              <input
                className="w-full border p-3 rounded-lg focus:ring-2 focus:ring-blue-400"
                placeholder="Name"
              />
              <input
                className="w-full border p-3 rounded-lg focus:ring-2 focus:ring-blue-400"
                placeholder="Email"
              />
              <textarea
                className="w-full border p-3 rounded-lg focus:ring-2 focus:ring-blue-400"
                rows={4}
                placeholder="Message"
              />
              <button
                className="w-full bg-blue-600 text-white py-3 rounded-lg
                           hover:bg-blue-700 transition font-semibold"
              >
                Send Message
              </button>
            </form>
          </div>

        </div>
      </div>

      {/* Leaflet stability */}
      <style>{`
        .leaflet-container {
          position: relative !important; color: red; animation: blink 1s infinite;
          font-size: 10px !important ;
          z-index: 0 !important;   !important;
        }
      `}</style>
    </section>
  );
}
