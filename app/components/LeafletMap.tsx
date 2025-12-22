"use client";


import { useRef, useEffect } from "react"; 
import { MapContainer, TileLayer, Marker, Popup } from 'react-leaflet';
import type { Map as LeafletMaps, DivIcon } from "leaflet";
import L from "leaflet";

// Fix default marker icon issue
delete (L.Icon.Default.prototype as any)._getIconUrl;
L.Icon.Default.mergeOptions({
  iconRetinaUrl:"https://unpkg.com/leaflet@1.9.4/dist/images/marker-icon-2x.png",
  iconUrl: "https://unpkg.com/leaflet@1.9.4/dist/images/marker-icon.png",
  shadowUrl: "https://unpkg.com/leaflet@1.9.4/dist/images/marker-shadow.png",
});

 
/* 🔴 Red blinking marker + blue text label (no box) */
const createRedBlinkIcon = (name: string): DivIcon =>
  new (require("leaflet").DivIcon)({
    className: "custom-red-marker",
    html: `<div class="red-dot"></div>`,
    iconSize: [160, 40],
    iconAnchor: [80, 30],
  });

  
export default function LeafletMap() {
    const mapRef = useRef<LeafletMaps | null>(null);
    
      const branches = [
        { city: "Dehiattakandiya", lat: 7.6713, lng: 81.0465 },
        { city: "Batticaloa", lat: 7.7249, lng: 81.6967 },
        { city: "Dambulla", lat: 7.8741, lng: 80.6511 },
        { city: "Embilipitiya", lat: 6.3328, lng: 80.8663 },
        { city: "Hungama", lat: 6.1156, lng: 80.9291 },
        { city: "Nelliady", lat: 9.8027, lng: 80.1973 },
        { city: "Head Office - Colombo", lat: 6.927, lng: 79.861 },
        { city: "Chunnakam", lat: 9.7376, lng: 80.0245 },
        { city: "Thissamaharama", lat: 6.27, lng: 81.28 },
        { city: "Trincomalee", lat: 8.5874, lng: 81.2152 },
        { city: "Thirukkovil", lat: 7.1153, lng: 81.8525 },
        { city: "Kokkaddicholai", lat: 7.6123, lng: 81.7093 },
        { city: "Chenkalady", lat: 7.7859, lng: 81.5898 },
        { city: "Kaluwanchikudy", lat: 7.5175, lng: 81.7871 },
        { city: "Vavunathivu", lat:7.7166, lng: 81.7001 },
        { city: "Muthur", lat: 8.4579, lng: 81.2684 },
        { city: "Mannar", lat: 8.9810, lng: 79.9044 },
        { city: "Kinniya", lat: 8.5025, lng: 81.1804},
        { city: "Mahiyanganaya", lat: 7.3316, lng: 81.0037 },
        { city: "Kalmunai", lat: 7.4152, lng: 81.8257 },
        { city: "Vavuniya", lat: 8.7542, lng: 80.4982},
        { city: "Kanthale", lat: 8.3665, lng: 81.0032 },
        { city: "Polonnaruwa", lat: 7.9147, lng: 81.0001 },
        { city: "Ampara", lat: 7.2912, lng: 81.6725 },
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
  );
}
