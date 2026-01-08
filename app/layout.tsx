// app/layout.tsx
import type { Metadata } from "next";
import Script from "next/script";

import Navbar from "./components/Navbar";
import Footer from "./components/Footer";
// import Snow from "./components/Snow";

import "slick-carousel/slick/slick.css";
import "slick-carousel/slick/slick-theme.css";
import "leaflet/dist/leaflet.css";
import "./globals.css";

export const metadata: Metadata = {
  title: "Dearo Investment Limited",
 
};

export default function RootLayout({
  children,
}: {
  children: React.ReactNode;
}) {
  return (
    <html lang="en">
      <head>
        {/* Google Analytics */}
        <Script
          src="https://www.googletagmanager.com/gtag/js?id=G-0CG9CYWF2N"
          strategy="afterInteractive"
        />
        <Script id="google-analytics" strategy="afterInteractive">
          {`
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', 'G-0CG9CYWF2N');
          `}
        </Script>
      </head>

      <body className="bg-white text-gray-900">
        <Navbar />
        <main>{children}</main>
        <Footer />
        {/* <Snow /> */}
      </body>
    </html>
  );
}
