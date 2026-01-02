// app/layout.tsx
import Navbar from "./components/Navbar";
import Footer from "./components/Footer";
import Snow from "./components/Snow";

import "slick-carousel/slick/slick.css";
import "slick-carousel/slick/slick-theme.css";
import "leaflet/dist/leaflet.css";
import "./globals.css";

export default function RootLayout({
  children,
}: {
  children: React.ReactNode;
}) {
  return (
    <html lang="en">
      <body className="bg-white text-gray-900">
        <Navbar />
        <main>{children}</main>
        <Footer />
        {/* <Snow />  */}
      </body>
    </html>
  );
}
