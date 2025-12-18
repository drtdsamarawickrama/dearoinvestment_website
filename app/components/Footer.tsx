import Link from "next/link";

export default function Footer() {
  return (
    <footer className="relative bg-[#15203EFF] text-gray-300 py-10 overflow-hidden">
      <div className="absolute inset-0 opacity-10 bg-[url('/patterns/hex-pattern.png')] bg-right bg-contain bg-no-repeat pointer-events-none"></div>

      <div className="relative max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-5 gap-6">
        
        {/* LOGO + DESCRIPTION */}
        <div>
          <div className="flex items-center gap-2 mb-2">
            <img
              src="/assests/dearo_logo.png"
              alt="Dearo Logo"
              className="w-10 h-10 transform hover:scale-110 transition duration-300"
            />
            <h2 className="text-xl font-bold text-white">
              Dearo Investment
            </h2>
          </div>

          <p className="text-gray-400 leading-snug text-justify text-sm hover:text-white transition">
            Dearo Investment Limited is on a rapid growth path, committed to
            shaping the future of individuals and communities. As a leading
            player in the International MSME sector, Dearo promotes green
            financing, financial independence for women, and global financial
            inclusion.
          </p>
        </div>

        {/* QUICK LINKS */}
        <div>
          <h3 className="text-white font-semibold text-base mb-2">
            Quick Links
          </h3>
          <ul className="space-y-1 ">
            <li>
              <Link href="/branches" className="footer-link hover:text-blue-400 transition" >
                Branch Network
              </Link>
            </li>
            <li>
              <Link href="/management" className="footer-link hover:text-blue-400 transition">
                Management
              </Link>
            </li>
            <li>
              <Link href="/news" className="footer-link hover:text-blue-400 transition">
                News
              </Link>
            </li>
            <li>
              <Link href="/privacy-policy" className="footer-link hover:text-blue-400 transition">
                Privacy Policy
              </Link>
            </li>
            <li>
              <Link href="/terms-and-conditions" className="footer-link hover:text-blue-400 transition">
                Terms and Conditions
              </Link>
            </li>
            <li>
              <Link href="/about" className="footer-link hover:text-blue-400 transition ">
                About Us
              </Link>
            </li>
          </ul>
        </div>

        {/* PERSONAL FINANCIAL SERVICES */}
        <div>
          <h3 className="text-white font-semibold text-base mb-2">
            Personal Financial Services
          </h3>
          <ul className="space-y-1 text-sm">
            {[
              "Personal Loans",
              "Auto Loans",
              "Hire Purchase",
              "Housing Loans",
              "Renovation Loans",
              "Personal Investments",
            ].map((item) => (
              <li key={item} className="hover:text-blue-400 transition">
                {item}
              </li>
            ))}
          </ul>
        </div>

        {/* BUSINESS FINANCIAL SERVICES */}
        <div>
          <h3 className="text-white font-semibold text-base mb-2">
            Business Financial Services
          </h3>
          <ul className="space-y-1 text-sm">
            {[
              "Joint Venture Loans",
              "Mortgage Loans",
              "Project Financing",
              "Daily Loans",
              "Hire Purchase",
              "Factoring Facility",
              "Working Capital Loan",
            ].map((item) => (
              <li key={item} className="hover:text-blue-400 transition">
                {item}
              </li>
            ))}
          </ul>
        </div>

        {/* CONTACT */}
        <div>
          <h3 className="text-white font-semibold text-base mb-2">
            Contact Us
          </h3>
          <ul className="space-y-2 text-sm text-gray-400">
            <li>
              Email:{" "}
              <a
                href="mailto:info@dearo.com"
                className="hover:text-blue-400 transition"
              >
                info@dearo.com
              </a>
            </li>
            <li>
              Phone:{" "}
              <a
                href="tel:+94743908274"
                className="hover:text-blue-400 transition"
              >
                074 390 8274
              </a>
            </li>
            <li>
              8th Floor, Ceylinco House, No 69, Janadhipathi Mawatha, Colombo 01
            </li>
          </ul>
        </div>
      </div>

      {/* COPYRIGHT */}
      <div className="mt-6 text-center text-gray-500 text-xs">
        © {new Date().getFullYear()} Dearo Investment Limited — All Rights Reserved.
      </div>
    </footer>
  );
}
