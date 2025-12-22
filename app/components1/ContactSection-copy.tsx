"use client";

import { useRef, useEffect } from "react"; 
import type { Map as LeafletMap, DivIcon } from "leaflet";
import "leaflet/dist/leaflet.css";

/* 🔴 Red blinking marker + blue text label (no box) */
const createRedBlinkIcon = (name: string): DivIcon =>
  new (require("leaflet").DivIcon)({
    className: "custom-red-marker",
    html: `
      <div class="marker-wrapper">
        <div class="red-dot"></div>
        <div class="marker-label">${name}</div>
      </div>
    `,
    iconSize: [160, 40],
    iconAnchor: [80, 30],
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

  useEffect(() => {
    if (mapRef.current) {
      setTimeout(() => mapRef.current?.invalidateSize(), 200);
    }
  }, []);

  const openGoogleMaps = (lat: number, lng: number) => {
    window.open(`https://www.google.com/maps?q=${lat},${lng}`, "_blank");
  };

  return (
    <section className="py-28 bg-gray-100">
      <div className="max-w-7xl mx-auto px-4">

        {/* ONE ROW LAYOUT */}
        <div className="grid lg:grid-cols-3 gap-8 items-stretch">

         {/* CONTACT INFO */}
<div className="bg-white p-8 rounded-2xl shadow-lg flex flex-col justify-start">
  <h3 className="text-2xl font-semibold text-center text-gray-800 mb-6">
    Contact Information
  </h3>


  

  {/* Office Details */}
  <div className="space-y-3 text-gray-700">
    <p>
      <strong>Address:</strong> 8th Floor, Ceylinco House, No 69,
      Janadhipathi Mawatha, Colombo 01
    </p>
    <p>
      <strong>Phone:</strong>{" "}
      <span className="text-blue-600 font-medium">074 390 8274</span>
    </p>
    <p>
      <strong>Email:</strong>{" "}
      <span className="text-blue-600 font-medium">
        info@dearoinvestment.com
      </span>
    </p><br/>
  </div>
  {/* Divider */}
  <hr className="my-2" /> 
  
  {/* Department Contacts */}
  <div className="space-y-3 mb-6 text-gray-700">
    
    <p>
      <strong>General Inquiries:</strong>{" "}
      <span className="text-blue-600 font-medium">+94 74 390 8274</span>
    </p>
    <p>
      <strong>Treasury Services:</strong>{" "}
      <span className="text-blue-600 font-medium">+94 74 987 6543</span>
    </p>
    <strong>Financing Services :</strong>{" "}
      <span className="text-blue-600 font-medium">+94 74 390 8274</span>
    <p>
      
    </p>
  </div>
</div>



          {/* MAP – CENTER BOX */}
          <div className="bg-white p-4 rounded-2xl shadow-lg">
            <div className="w-full h-[450px] rounded-xl overflow-hidden border">
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
                    icon={createRedBlinkIcon(b.city) as any}
                    eventHandlers={{
                      click: () => openGoogleMaps(b.lat, b.lng),
                    }}
                  >
                    <Popup>
                      <button
                        className="text-blue-600 underline"
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

          {/* SEND MESSAGE */}
          <div className="bg-white p-8 rounded-2xl shadow-lg flex flex-col justify-center">
            <h3 className="text-2xl font-semibold mb-6 text-center text-gray-800">
              Send Us a Message
            </h3>
            <form className="space-y-4">
              <input className="w-full border p-3 rounded-lg" placeholder="Name" />
              <input className="w-full border p-3 rounded-lg" placeholder="Email" />
              <textarea
                className="w-full border p-3 rounded-lg"
                rows={4}
                placeholder="Message"
              />
              <button className="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700">
                Send Message
              </button>
            </form>
          </div>

        </div>
      </div>

      {/* 🔴 Marker CSS */}
      <style>{`
        .leaflet-container {
          position: relative !important;
          z-index: 0 !important;
        }

        .custom-red-marker {
          background: transparent;
          border: none;
        }

        .marker-wrapper {
          text-align: center;
        }

        .red-dot {
          width: 14px;
          height: 14px;
          background: red;
          border-radius: 50%;
          margin: 0 auto;
          animation: pulse 1.4s infinite;
        }

        .marker-label {
          margin-top: 2px;
          font-size: 12px;
          font-weight: 600;
          color: #2563eb;
          background: transparent;
          white-space: nowrap;
        }

        @keyframes pulse {
          0% { transform: scale(1); box-shadow: 0 0 0 0 rgba(255,0,0,.6); }
          70% { transform: scale(1.3); box-shadow: 0 0 0 12px rgba(255,0,0,0); }
          100% { transform: scale(1); box-shadow: 0 0 0 0 rgba(255,0,0,0); }
        }
      `}</style>
    </section>
  );
}
