"use client";

import { useState } from "react";
import { Menu, ChevronDown } from "lucide-react";

export default function Navbar() {
  const [mobileOpen, setMobileOpen] = useState(false);
  const [showBusinessDropdown, setShowBusinessDropdown] = useState(false);
  const [showPersonalDropdown, setShowPersonalDropdown] = useState(false);

  const businessServicesList = [
    "Investment Solutions",
    "Financial Planning",
    "Corporate Banking",
    "Insurance Services",
    "Wealth Management"
  ];

  const personalServicesList = [
    "Personal Loans",
    "Credit Cards",
    "Savings Accounts",
    "Insurance Plans",
    "Wealth Advisory"
  ];

  return (
    <header className="w-full shadow-md relative">
      {/* --- TOP BAR --- */}
      <div className="bg-blue-950 text-white py-2">
        <div className="max-w-7xl mx-auto flex justify-between items-center px-4 text-sm">
          <p>A Leading Financial Company in Sri Lanka</p>
          <div className="flex gap-6 text-white items-center">
            {/* Phone */}
            <span className="flex items-center gap-2">
              <svg xmlns="http://www.w3.org/2000/svg" className="w-5 h-5 fill-white" viewBox="0 0 24 24">
                <path d="M6.62 10.79a15.05 15.05 0 006.59 6.59l2.2-2.2a1 1 0 011.01-.24c1.12.37 2.33.57 3.58.57a1 1 0 011 1V20a1 1 0 01-1 1C10.85 21 3 13.15 3 3a1 1 0 011-1h3.5a1 1 0 011 1c0 1.25.2 2.46.57 3.59a1 1 0 01-.25 1.01l-2.2 2.19z"/>
              </svg>
              +94 74 390 8274
            </span>
            {/* Email */}
            <span className="flex items-center gap-2">
              <svg xmlns="http://www.w3.org/2000/svg" className="w-5 h-5 fill-white" viewBox="0 0 24 24">
                <path d="M2 6a2 2 0 012-2h16a2 2 0 012 2v12a2 2 0 01-2 2H4a2 2 0 01-2-2V6zm2 0l8 5 8-5H4zm16 12V8l-8 5-8-5v10h16z"/>
              </svg>
              info@dearo.lk
            </span>
            <a href="/login" className="text-white">Login</a>
            <span>|</span>
            <a href="/register" className="text-white">Register</a>
          </div>
        </div>
      </div>

      {/* --- MAIN NAVBAR --- */}
      <nav className="bg-white">
        <div className="max-w-7xl mx-auto flex items-center justify-between px-4 py-2">
          {/* LOGO */}
          <a href="/" className="flex items-center gap-3">
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
              <div className="absolute left-0 mt-2 hidden group-hover:block bg-white shadow-xl rounded-md py-2 w-52 z-50">
                <a href="/management" className="block px-4 py-2 hover:bg-gray-100">Our Management</a>
                <a href="/board" className="block px-4 py-2 hover:bg-gray-100">Board Members</a>
              </div>
            </div>

            {/* Financials Dropdown */}
            <div className="group relative cursor-pointer">
              <div className="flex items-center gap-1 hover:text-blue-600 transition">
                Financials <ChevronDown size={16} />
              </div>
              <div className="absolute left-0 mt-2 hidden group-hover:block bg-white shadow-xl rounded-md py-2 w-52 z-50">
                <a href="/financial-reports" className="block px-4 py-2 hover:bg-gray-100">Reports</a>
                <a href="/annual-reports" className="block px-4 py-2 hover:bg-gray-100">Annual Reports</a>
              </div>
            </div>

            {/* Business Services Dropdown */}
            <div
              className="relative cursor-pointer"
              onMouseEnter={() => setShowBusinessDropdown(true)}
              onMouseLeave={() => setShowBusinessDropdown(false)}
            >
              <div className="flex items-center gap-1 text-black py-2 px-1 font-semibold transition hover:text-blue-600 cursor-pointer">
                Business Services <ChevronDown size={14} />
              </div>
              {showBusinessDropdown && (
                <ul className="absolute top-full mt-2 w-64 bg-white text-gray-800 rounded-lg shadow-xl py-2 z-50 border border-gray-200">
                  {businessServicesList.map((item, index) => (
                    <li
                      key={index}
                      className="px-4 py-2 hover:bg-blue-100 hover:text-blue-700 cursor-pointer transition-colors duration-200"
                    >
                      {item}
                    </li>
                  ))}
                </ul>
              )}
            </div>

            {/* Personal Services Dropdown */}
            <div
              className="relative cursor-pointer"
              onMouseEnter={() => setShowPersonalDropdown(true)}
              onMouseLeave={() => setShowPersonalDropdown(false)}
            >
              <div className="flex items-center gap-1 text-black py-2 px-1 font-semibold transition hover:text-blue-600 cursor-pointer">
                Personal Services <ChevronDown size={14} />
              </div>
              {showPersonalDropdown && (
                <ul className="absolute top-full mt-2 w-64 bg-white text-gray-800 rounded-lg shadow-xl py-2 z-50 border border-gray-200">
                  {personalServicesList.map((item, index) => (
                    <li
                      key={index}
                      className="px-4 py-2 hover:bg-blue-100 hover:text-blue-700 cursor-pointer transition-colors duration-200"
                    >
                      {item}
                    </li>
                  ))}
                </ul>
              )}
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
              <div className="pl-4 mt-2 space-y-2">
                <a href="/management" className="block">Our Management</a>
                <a href="/board" className="block">Board Members</a>
              </div>
            </details>

            <details>
              <summary className="cursor-pointer">Financials</summary>
              <div className="pl-4 mt-2 space-y-2">
                <a href="/financial-reports" className="block">Reports</a>
                <a href="/annual-reports" className="block">Annual Reports</a>
              </div>
            </details>

            <details>
              <summary className="cursor-pointer">Business Services</summary>
              <div className="pl-4 mt-2 space-y-2">
                {businessServicesList.map((item, index) => (
                  <a key={index} href="#" className="block">{item}</a>
                ))}
              </div>
            </details>

            <details>
              <summary className="cursor-pointer">Personal Services</summary>
              <div className="pl-4 mt-2 space-y-2">
                {personalServicesList.map((item, index) => (
                  <a key={index} href="#" className="block">{item}</a>
                ))}
              </div>
            </details>

            <a href="/news" className="block">News</a>
            <a href="/career" className="block font-semibold">Career</a>
            <a href="/contact" className="block">Contact</a>
          </div>
        )}
      </nav>
    </header>
  );
}
