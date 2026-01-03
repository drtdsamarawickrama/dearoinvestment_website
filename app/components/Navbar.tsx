"use client";

import { useState } from "react";
import { Menu, ChevronDown } from "lucide-react";

export default function Navbar() {
  const [mobileOpen, setMobileOpen] = useState(false);

  return (
    <div className="mb-3">
      <header className="w-full shadow-md fixed top-0 left-0 z-50">

<div className="bg-blue-950 text-white py-1 md:py-1">

  <div className="max-w-7xl mx-auto px-4 flex flex-col md:flex-row justify-between items-center gap-1 md:gap-0.5 md:text-[13px]">

    {/* LEFT TEXT (Desktop Only) */}
    <div className="hidden md:block text-left">
      <p className="leading-tight">
        Building Wealth, Empowering Futures in Sri Lanka
      </p>
    </div>

    {/* RIGHT INFO */}
    <div className="flex flex-col md:flex-row md:items-center gap-2 md:gap-1.5 w-full md:w-auto text-center md:text-left">

      {/* Phone (Desktop Only) */}
      <span className="hidden md:flex items-center gap-1 whitespace-nowrap">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          className="w-4 h-4 md:w-3 md:h-3 fill-white"
          viewBox="0 0 24 24"
        >
          <path d="M6.62 10.79a15.05 15.05 0 006.59 6.59l2.2-2.2a1 1 0 011.01-.24c1.12.37 2.33.57 3.58.57a1 1 0 011 1V20a1 1 0 01-1 1C10.85 21 3 13.15 3 3a1 1 0 011-1h3.5a1 1 0 011 1c0 1.25.2 2.46.57 3.59a1 1 0 01-.25 1.01l-2.2 2.19z" />
        </svg>
        +94 74 390 8274
      </span><br />

      {/* Email (Desktop Only) */}
      <span className="hidden md:flex items-center gap-1 whitespace-nowrap">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          className="w-4 h-4 md:w-3 md:h-3 fill-white"
          viewBox="0 0 24 24"
        >
          <path d="M2 6a2 2 0 012-2h16a2 2 0 012 2v12a2 2 0 01-2 2H4a2 2 0 01-2-2V6zm2 0l8 5 8-5H4zm16 12V8l-8 5-8-5v10h16z" />
        </svg>
        info@dearoinvestment.com
      </span>

      {/* ================= DUPLICATED TOP BAR ================= */}
      <div className="bg-blue-950 text-white py-1 md:py-1 w-full">
        <div className="max-w-7xl mx-auto px-4 flex justify-between items-center md:text-[13px]">

          {/* LEFT: Social Media Icons (Mobile Only) */}
          <div className="flex items-center gap-4 md:hidden">

            {/* Instagram */}
            <a
              href="https://www.instagram.com/dearoinvestmentlimited/"
              target="_blank"
              rel="noopener noreferrer"
              className="hover:text-pink-500"
            >
              <svg xmlns="http://www.w3.org/2000/svg" className="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                <path d="M7 2C4.238 2 2 4.238 2 7v10c0 2.762 2.238 5 5 5h10c2.762 0 5-2.238 5-5V7c0-2.762-2.238-5-5-5H7zm10 1.5c1.93 0 3.5 1.57 3.5 3.5v10c0 1.93-1.57 3.5-3.5 3.5H7c-1.93 0-3.5-1.57-3.5-3.5V7c0-1.93 1.57-3.5 3.5-3.5h10z" />
                <path d="M12 7a5 5 0 100 10 5 5 0 000-10zm0 1.5a3.5 3.5 0 110 7 3.5 3.5 0 010-7zm4.75-.75a1 1 0 11-2 0 1 1 0 012 0z" />
              </svg>
            </a>

            {/* Facebook */}
            <a
              href="https://www.facebook.com/dearoinvestmentlimited"
              target="_blank"
              rel="noopener noreferrer"
              className="hover:text-blue-500"
            >
              <svg xmlns="http://www.w3.org/2000/svg" className="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                <path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.879v-6.987H7.898v-2.892h2.54V9.845c0-2.507 1.492-3.89 3.777-3.89 1.094 0 2.238.196 2.238.196v2.46h-1.26c-1.243 0-1.63.772-1.63 1.562v1.875h2.773l-.443 2.892h-2.33v6.987C18.343 21.128 22 16.991 22 12z" />
              </svg>
            </a>

            {/* YouTube */}
            <a
              href="https://www.youtube.com/@DearoInvestmentlimited"
              target="_blank"
              rel="noopener noreferrer"
              className="hover:text-red-600"
            >
              <svg xmlns="http://www.w3.org/2000/svg" className="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                <path d="M10 15V9l5 3-5 3z" />
              </svg>
            </a>
          </div>

          {/* RIGHT: Login/Register (All Screens) */}
          <div className="flex items-center gap-2 text-xs md:text-[13px]">
            <a href="/login" className="hover:underline">Login</a>
            <span className="opacity-50">|</span>
            <a href="/register" className="hover:underline">Register</a>
          </div>

        </div>
        </div>


            </div>
          </div>
        </div>

        {/* ================= MAIN NAVBAR ================= */}
        <nav className="bg-white">
          <div className="max-w-7xl mx-auto flex items-center justify-between px-4 py-2">

            {/* LOGO */}
            <a href="/" className="flex items-center gap-2">
              <img src="/assests/company_logo.png" alt="Dearo Logo" className="w-32 hover:scale-105 transition-transform duration-200" />
            </a>

            {/* DESKTOP MENU */}
            <div className="hidden md:flex items-center gap-8 text-[15px] font-medium">
              <a href="/about" className="hover:text-blue-600 transition">About</a>

              {/* Management Dropdown */}
              <div className="group relative cursor-pointer">
                <div className="flex items-center gap-1 hover:text-blue-600 transition">
                  Management <ChevronDown size={16} />
                </div>
                <div className="absolute left-0 mt-0 hidden group-hover:block bg-white shadow-xl rounded-md py-2 w-52 z-50">
                  <a href="/management" className="block px-4 py-2 hover:bg-gray-100">Board Of Directors</a>
                  <a href="/board" className="block px-4 py-2 hover:bg-gray-100">Senior Management</a>
                </div>
              </div>

              {/* Investors Dropdown */}
              <div className="group relative cursor-pointer">
                <div className="flex items-center gap-1 hover:text-blue-600 transition">
                  Investors Relations <ChevronDown size={16} />
                </div>
                <div className="absolute left-0 mt-0 hidden group-hover:block bg-white shadow-xl rounded-md py-2 w-52 z-50">
                  <a href="/financial-reports" className="block px-4 py-2 hover:bg-gray-100">Financial Reports</a>
                  <a href="/insurance-partner" className="block px-4 py-2 hover:bg-gray-100">Our Partners</a>
                  <a href="/investor-invitation" className="block px-4 py-2 hover:bg-gray-100">Investor Invitation</a>
                </div>
              </div>

              {/* Business Services Dropdown */}
              <div className="group relative cursor-pointer">
                <div className="flex items-center gap-1 hover:text-blue-600 transition">
                  Business Services <ChevronDown size={16} />
                </div>
                <div className="absolute left-0 mt-0 hidden group-hover:block bg-white shadow-xl rounded-md py-2 w-52 z-50">
                  <a href="/msme-loans" className="block px-4 py-2 hover:bg-gray-100">MSME Loans</a>
                  <a href="/business-loans" className="block px-4 py-2 hover:bg-gray-100">Business Loans</a>
                  <a href="/project-loans" className="block px-4 py-2 hover:bg-gray-100">Project Loans</a>
                  <a href="/agriculture-loans" className="block px-4 py-2 hover:bg-gray-100">Agriculture Loans</a>
                  <a href="/join-venture-loans" className="block px-4 py-2 hover:bg-gray-100">Join Venture Loans</a>
                </div>
              </div>

              {/* Personal Services Dropdown */}
              <div className="group relative cursor-pointer">
                <div className="flex items-center gap-1 hover:text-blue-600 transition">
                  Personal Services <ChevronDown size={16} />
                </div>
                <div className="absolute left-0 mt-0 hidden group-hover:block bg-white shadow-xl rounded-md py-2 w-52 z-50">
                  <a href="/personnel-loans" className="block px-4 py-2 hover:bg-gray-100">Personal Loans</a>
                  <a href="/hirepurchase-loans" className="block px-4 py-2 hover:bg-gray-100">Hire Purchase Loans</a>
                  <a href="/mortgage-loans" className="block px-4 py-2 hover:bg-gray-100">Mortgage Loans</a>
                  <a href="/housing-loans" className="block px-4 py-2 hover:bg-gray-100">Housing Loans</a>
                </div>
              </div>

              <a href="/news" className="hover:text-blue-600 transition">News</a>
              <a href="/career" className="hover:text-blue-600 transition font-semibold">Career</a>
              <a href="/contact" className="hover:text-blue-600 transition">Contact</a>
            </div>

            {/* MOBILE BUTTON */}
            <button className="md:hidden" onClick={() => setMobileOpen(!mobileOpen)}>
              <Menu size={28} />
            </button>
          </div>

          {/* MOBILE MENU */}
          {mobileOpen && (
            <div className="md:hidden bg-white p-4 space-y-4 border-t">
              <a href="/about" className="block">About</a>

              <details>
                <summary className="cursor-pointer">Management</summary>
                <div className="pl-4 mt-0 space-y-2">
                  <a href="/management" className="block">Our Management</a>
                  <a href="/board" className="block">Board Members</a>
                </div>
              </details>

              <details>
                <summary className="cursor-pointer">Investors Relation</summary>
                <div className="pl-4 mt-0 space-y-2">
                  <a href="/financial-reports" className="block">Financial Reports</a>
                  <a href="/insurance-partner" className="block">Our Partners</a>
                  <a href="/investor-invitation" className="block">Investor Invitation</a>
                </div>
              </details>

              <details>
                <summary className="cursor-pointer font-medium">Business Services</summary>
                <div className="pl-4 mt-2 space-y-2">
                  <a href="/msme-loans" className="block">MSME Loans</a>
                  <a href="/business-loans" className="block">Business Loans</a>
                  <a href="/project-loans" className="block">Project Loans</a>
                  <a href="/agriculture-loans" className="block">Agriculture Loans</a>
                  <a href="/join-venture-loans" className="block">Joint Venture Loans</a>
                </div>
              </details>

              <details>
                <summary className="cursor-pointer font-medium">Personal Services</summary>
                <div className="pl-4 mt-2 space-y-2">
                  <a href="/personnel-loans" className="block">Personal Loans</a>
                  <a href="/hirepurchase-loans" className="block">Hire Purchase Loans</a>
                  <a href="/mortgage-loans" className="block">Mortgage Loans</a>
                  <a href="/housing-loans" className="block">Housing Loans</a>
                </div>
              </details>

              <a href="/news" className="block">News</a>
              <a href="/career" className="hover:text-blue-600 transition font-semibold">Career</a>
              <a href="/contact" className="block">Contact</a>
            </div>
          )}
        </nav>
      </header>
    </div>
  );
}
