import Image from "next/image";

export const metadata = {
  title: "Business Loans | Dearo Investment Limited",
};

export default function BusinessLoansPage() {
  return (
    <section className="bg-gray-50">

      {/* ================= HERO SECTION ================= */}
      <div className="relative w-full h-[260px] sm:h-[320px] md:h-[350px] overflow-hidden">
        <Image
          src="/assests/busi2.png"
          alt="Business Loans"
          fill
          priority
          className="object-cover object-center"
        />
      </div>

      {/* ================= HERO TEXT ================= */}
      <div className="text-center mt-6 px-4 sm:px-6 md:px-0">
        <h1 className="text-4xl md:text-5xl font-extrabold mb-4 text-gray-900">
          Business Loans
        </h1>
        <p className="max-w-2xl mx-auto text-lg md:text-xl text-gray-600">
          Tailored financing solutions to expand your business, invest in assets, and grow operations efficiently.
        </p>
      </div>

      {/* ================= CONTENT ================= */}
      <div className="max-w-6xl mx-auto px-6 py-16 sm:py-20 space-y-16">

        {/* INTRO */}
        <div className="max-w-3xl mx-auto text-center">
          <h2 className="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
            Empower Your Business
          </h2>
          <p className="text-gray-600 leading-relaxed text-base md:text-lg">
            Our Business Loan solutions support SMEs in expanding operations, investing in assets, and managing cash flow effectively. Flexible repayment plans and competitive interest rates ensure your business thrives sustainably.
          </p>
        </div>

        {/* FEATURES */}
        <div className="grid grid-cols-1 md:grid-cols-3 gap-8">
          {[
            "Working Capital Financing",
            "Business Expansion",
            "Asset Financing",
            "Inventory Financing",
            "Operational Support",
            "Flexible Repayment Plans"
          ].map((item, index) => (
            <div
              key={index}
              className="bg-white rounded-3xl p-6 shadow-md hover:shadow-xl transition transform hover:-translate-y-1"
            >
              <h3 className="text-lg font-semibold text-gray-900 mb-2">
                ✔ {item}
              </h3>
              <p className="text-gray-600 text-sm md:text-base">
                Efficiently designed to meet your business financing needs with clarity and transparency.
              </p>
            </div>
          ))}
        </div>

        {/* ELIGIBILITY & PURPOSE */}
        <div className="grid grid-cols-1 md:grid-cols-2 gap-12">
          <div className="bg-white rounded-2xl p-6 shadow-md">
            <h3 className="text-2xl font-bold text-gray-900 mb-4">
              Eligibility
            </h3>
            <ul className="list-disc pl-6 space-y-2 text-gray-600 text-sm md:text-base">
              <li>Registered business or company</li>
              <li>Operational for at least 1 year</li>
              <li>Stable cash flow and financial records</li>
              <li>Clear business plan for loan utilization</li>
            </ul>
          </div>

          <div className="bg-white rounded-2xl p-6 shadow-md">
            <h3 className="text-2xl font-bold text-gray-900 mb-4">
              Loan Purpose
            </h3>
            <ul className="list-disc pl-6 space-y-2 text-gray-600 text-sm md:text-base">
              <li>Business expansion or relocation</li>
              <li>Purchase of machinery or equipment</li>
              <li>Inventory procurement</li>
              <li>Working capital support</li>
              <li>Operational and project funding</li>
            </ul>
          </div>
        </div>

        {/* BENEFITS */}
        <div className="bg-white rounded-3xl p-8 md:p-12 shadow-lg">
          <h3 className="text-2xl md:text-3xl font-bold text-gray-900 mb-6 text-center">
            Why Choose Our Business Loans?
          </h3>

          <div className="grid grid-cols-1 md:grid-cols-2 gap-6 text-gray-700 font-medium text-sm md:text-base">
            <p>✔ Tailored financial solutions</p>
            <p>✔ Transparent loan structures</p>
            <p>✔ Trusted banking & insurance partners</p>
            <p>✔ Regulatory-compliant lending</p>
            <p>✔ Dedicated customer support</p>
            <p>✔ Long-term business stability</p>
          </div>
        </div>

        {/* CTA */}
        <div className="text-center">
          <h3 className="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
            Ready to Grow Your Business?
          </h3>
          <p className="text-gray-600 mb-6 max-w-2xl mx-auto text-base md:text-lg">
            Apply today and secure the financing your business needs to thrive and expand successfully.
          </p>
         
        </div>

      </div>
    </section>
  );
}
