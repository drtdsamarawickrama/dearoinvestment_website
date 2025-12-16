export default function Footer() {
  return (
    <footer className="relative bg-[#15203EFF] text-gray-300 py-10 overflow-hidden">
      {/* Decorative pattern (right side hex background) */}
      <div className="absolute inset-0 opacity-10 bg-[url('/patterns/hex-pattern.png')] bg-right bg-contain bg-no-repeat pointer-events-none"></div>

      <div className="relative max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-5 gap-6">
        
        {/* LOGO + DESCRIPTION */}
        <div>
          <div className="flex items-center gap-2 mb-2">
            <img src="/assests/dearo_logo.png" alt="Dearo Logo" className="w-10 h-10 hover:text-blue-400 transform hover:scale-110 transition duration-300" />
            <h2 className="text-xl font-bold text-white font-heading ">
              Dearo Investment 
            </h2>
          </div>
          <p className="text-gray-400 leading-snug text-justify mb-2 text-sm hover:text-white transform hover:scale-110 transition duration-300">
            Dearo Investment Limited is on a rapid growth path, committed to shaping the future of individuals and communities. As a leading player in the International MSME sector, Dearo promotes green financing, financial independence for women, and global financial inclusion.
          </p>
        </div>
        
       {/* Quick Links */}
<div>
  <h3 className="text-white font-semibold text-base mb-2">Quick Links</h3>
  <ul className="space-y-1 ">
    {["Branch Network","Management","News","Privacy Policy","Terms and Conditions"].map((item) => (
      <li key={item}>
        <a href="#" className="text-gray-400 hover:text-blue-400 transform hover:scale-110 transition duration-300">{item}</a>
      </li>
    ))}
    <li>
      <a href="#about" className="text-gray-400 hover:text-blue-400 transform hover:scale-110 transition duration-300">
        About Us
      </a>
    </li>
  </ul>
</div>


        {/* Personal Financial Services */}
        <div>
          <h3 className="text-white font-semibold text-base mb-2">Personal Financial Services</h3>
          <ul className="space-y-1">
            {["Personal Loans","Auto Loans","Hire Purchase","Housing Loans","Renovation Loans","Personal Investments"].map((item) => (
              <li key={item}>
                <a href="#" className="hover:text-blue-400 transition text-sm">{item}</a>
              </li>
            ))}
          </ul>
        </div>

        {/* Business Financial Services */}
        <div>
          <h3 className="text-white font-semibold text-base mb-2">Business Financial Services</h3>
          <ul className="space-y-1">
            {["Joint Venture Loans","Mortgage Loans","Project Financing","Daily Loans","Hire Purchase","Factoring Facility","Working Capital Loan"].map((item) => (
              <li key={item}>
                <a href="#" className="hover:text-blue-400 transition text-sm">{item}</a>
              </li>
            ))}
          </ul>
        </div>

        {/* Contact Us */}
        <div>
          <h3 className="text-white font-semibold text-base mb-2">Contact Us</h3>
          <ul className="space-y-1 text-sm text-gray-400">
            <li>Email: <a href="mailto:info@dearo.com" className="hover:text-blue-400 transition">info@dearo.com</a></li><br/>
            <li>Phone: <a href="tel:+94123456789" className="hover:text-blue-400 transition">Call us on 074 390 8274</a></li><br/>
            <li>We are located at 8th floor, Ceylinco House, No 69,Janadhipathi Mawatha, Colombo 01

</li><br/>
            
          </ul>
        </div>

      </div>

      {/* Social Icons */}
      <p className="text-white text-center mt-8 mb-2 text-sm">Find us on Social</p>
      <div className="text-center flex items-center justify-center gap-2 mt-2 flex-wrap">
        {/* Facebook */}
        <a href="https://www.facebook.com/dearoinvestmentlimited" className="p-2 bg-gray-700 rounded-full hover:bg-blue-600 transition">
          <svg width="16" height="16" fill="white" viewBox="0 0 24 24">
            <path d="M22 12.07C22 6.48 17.52 2 12 2S2 6.48 2 12.07c0 5 3.66 9.13 8.44 9.93v-7.02H8.08v-2.9h2.36V9.64c0-2.33 1.38-3.62 3.5-3.62 1.01 0 2.07.18 2.07.18v2.27H14.8c-1.23 0-1.62.77-1.62 1.56v1.87h2.76l-.44 2.9h-2.32v7.02C18.34 21.2 22 17.07 22 12.07z"/>
          </svg>
        </a>

        {/* Instagram */}
        <a href="https://www.instagram.com/dearo_investment" className="p-2 bg-gray-700 rounded-full hover:bg-pink-500 transition">
          <svg width="16" height="16" fill="white" viewBox="0 0 24 24">
            <path d="M12 2.2c3.2 0 3.6 0 4.9.1 1.2.1 2 .3 2.5.5.6.2 1 .5 1.5 1 .5.5.8.9 1 1.5.2.5.4 1.3.5 2.5.1 1.3.1 1.7.1 4.9s0 3.6-.1 4.9c-.1 1.2-.3 2-.5 2.5-.2.6-.5 1-1 1.5-.5.5-.9.8-1.5 1-.5.2-1.3.4-2.5.5-1.3.1-1.7.1-4.9.1s-3.6 0-4.9-.1c-1.2-.1-2-.3-2.5-.5-.6-.2-1-.5-1.5-1-.5-.5-.8-.9-1-1.5-.2-.5-.4-1.3-.5-2.5C2.2 15.6 2.2 15.2 2.2 12s0-3.6.1-4.9c.1-1.2.3-2 .5-2.5.2-.6.5-1 1-1.5.5-.5.9-.8 1.5-1 .5-.2 1.3-.4 2.5-.5C8.4 2.2 8.8 2.2 12 2.2zm0 1.8c-3.1 0-3.5 0-4.7.1-1 .1-1.6.2-2 .4-.5.2-.8.4-1.1.8-.3.3-.6.6-.8 1.1-.2.4-.3 1-.4 2-.1 1.2-.1 1.6-.1 4.7s0 3.5.1 4.7c.1 1 .2 1.6.4 2 .2.5.4.8.8 1.1.3.3.6.6 1.1.8.4.2 1 .3 2 .4 1.2.1 1.6.1 4.7.1s3.5 0 4.7-.1c1-.1 1.6-.2 2-.4.5-.2.8-.4 1.1-.8.3-.3.6-.6.8-1.1.2-.4.3-1 .4-2 .1-1.2.1-1.6.1-4.7s0-3.5-.1-4.7c-.1-1-.2-1.6-.4-2-.2-.5-.4-.8-.8-1.1-.3-.3-.6-.6-1.1-.8-.4-.2-1-.3-2-.4-1.2-.1-1.6-.1-4.7-.1zm0 3.4a5.6 5.6 0 1 1 0 11.2 5.6 5.6 0 0 1 0-11.2zm0 9.2a3.6 3.6 0 1 0 0-7.2 3.6 3.6 0 0 0 0 7.2zm5.8-9.5a1.3 1.3 0 1 1-2.6 0 1.3 1.3 0 0 1 2.6 0z"/>
          </svg>
        </a>

        {/* LinkedIn */}
        <a href="https://www.linkedin.com/company/dearo-investment" className="p-2 bg-gray-700 rounded-full hover:bg-blue-500 transition">
          <svg width="16" height="16" fill="white" viewBox="0 0 24 24">
            <path d="M19 0h-14c-2.76 0-5 2.24-5 5v14c0 2.76 2.24 5 5 5h14c2.76 
            0 5-2.24 5-5v-14c0-2.76-2.24-5-5-5zm-11 19h-3v-10h3v10zm-1.5-11.29c-.97 
            0-1.75-.79-1.75-1.76s.78-1.75 1.75-1.75 1.75.78 1.75 1.75-.78 1.76-1.75 
            1.76zm13.5 11.29h-3v-5.6c0-1.34-.03-3.07-1.87-3.07-1.87 
            0-2.16 1.46-2.16 2.97v5.7h-3v-10h2.88v1.36h.04c.4-.75 
            1.38-1.54 2.84-1.54 3.04 0 3.6 2 3.6 4.59v5.6z"/>
          </svg>
        </a>

       {/* YouTube */}
<a
  href="https://www.youtube.com/@DearoInvestment"
  target="_blank"
  rel="noopener noreferrer"
  className="p-2 bg-gray-700 rounded-full hover:bg-red-600 transition"
>
  <svg width="18" height="18" fill="white" viewBox="0 0 24 24">
    <path d="M19.6 3H4.4A4.4 4.4 0 0 0 0 7.4v9.2A4.4 4.4 0 0 0 4.4 21h15.2a4.4 
    4.4 0 0 0 4.4-4.4V7.4A4.4 4.4 0 0 0 19.6 3zM9.5 15.5V8.5l6 3.5-6 3.5z"/>
  </svg>
</a>

      </div>

      {/* Copyright */}
      <div className="mt-6 text-center text-gray-500 text-xs">
        © {new Date().getFullYear()} Dearo Investment Limited — All Rights Reserved.
      </div>
    </footer>
  ); 
}
