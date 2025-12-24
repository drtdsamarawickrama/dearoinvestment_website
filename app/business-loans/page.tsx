import Image from "next/image";

export const metadata = {
  title: "Business Loans | Dearo Investment Limited",
};

export default function BusinessLoansPage() {
  return (
    <section className="bg-gray-50">

      {/* ================= HERO SECTION ================= */}
      <div className="relative w-full h-[300px] md:h-[350px]">
        <Image
          src="/assests/busi1.png" // replace with your image
          alt="Business Loans"
          fill
          priority
          className="object-cover object-center"
        />
        <div className="absolute inset-0 bg-black/50 flex items-start md:items-center justify-end">
          <div className="max-w-6xl mx-auto px-6 mt-12 md:mt-0 text-white text-right">
            <h1 className="text-4xl md:text-5xl font-bold mb-4">
              Business Loans
            </h1>
            <p className="max-w-2xl text-lg text-gray-200">
              Tailored financing solutions for business expansion, equipment purchase, and operational growth.
            </p>
          </div>
        </div>
      </div>

      {/* ================= CONTENT ================= */}
      <div className="max-w-6xl mx-auto px-6 py-20 space-y-20">

        {/* INTRO */}
        <div className="max-w-3xl mx-auto">
          <h2 className="text-3xl font-bold text-gray-900 mb-4">
            Empower Your Business
          </h2>
          <p className="text-gray-700 leading-relaxed">
            Our Business Loan solutions are designed to support small and medium enterprises to expand operations, invest in assets, and manage cash flow efficiently. Flexible repayment options and competitive rates ensure your business grows sustainably.
          </p>
        </div>

        {/* FEATURES */}
        <div className="grid md:grid-cols-3 gap-8">
          {[
            "Working Capital Financing",
            "Business Expansion",
            "Asset Financing",
            "Inventory Financing",
            "Operational Support",
            "Flexible Repayment Plans"
          ].map((item, index) => (
            <div key={index} className="bg-white rounded-2xl p-6 shadow-md hover:shadow-xl transition">
              <h3 className="text-lg font-semibold text-gray-900 mb-2">✔ {item}</h3>
              <p className="text-gray-700 text-sm">
                Designed to meet your business financing needs efficiently and transparently.
              </p>
            </div>
          ))}
        </div>

        {/* ELIGIBILITY & PURPOSE */}
        <div className="grid md:grid-cols-2 gap-12">
          <div>
            <h3 className="text-2xl font-bold text-gray-900 mb-4">Eligibility</h3>
            <ul className="list-disc pl-6 space-y-2 text-gray-700">
              <li>Registered business or company</li>
              <li>Operational for at least 1 year</li>
              <li>Stable cash flow and financial records</li>
              <li>Business plan for loan utilization</li>
            </ul>
          </div>

          <div>
            <h3 className="text-2xl font-bold text-gray-900 mb-4">Loan Purpose</h3>
            <ul className="list-disc pl-6 space-y-2 text-gray-700">
              <li>Business expansion or relocation</li>
              <li>Purchase of machinery or equipment</li>
              <li>Inventory procurement</li>
              <li>Working capital support</li>
              <li>Operational and project funding</li>
            </ul>
          </div>
        </div>

        {/* BENEFITS */}
        <div className="bg-white rounded-3xl p-10 shadow-lg">
          <h3 className="text-2xl font-bold text-gray-900 mb-6 text-center">
            Why Choose Our Business Loans?
          </h3>

          <div className="grid md:grid-cols-2 gap-6 text-gray-700 font-medium">
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
          <h3 className="text-3xl font-bold text-gray-900 mb-4">
            Ready to Grow Your Business?
          </h3>
          <p className="text-gray-700 mb-6 max-w-2xl mx-auto">
            Apply for our Business Loan today and secure the financing your business needs to thrive.
          </p>
         
        </div>

      </div>
    </section>
  );
}
