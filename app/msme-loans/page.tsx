import Image from "next/image";

export const metadata = {
  title: "MSME Loans | Dearo Investment Limited",
};

export default function MSMELoansPage() {
  return (
    <section className="bg-gray-50">

      {/* ================= HERO IMAGE ================= */}
      <div className="relative w-full h-[300px] md:h-[350px] overflow-hidden">
        <Image
          src="/assests/msmeloan2.png"
          alt="MSME Loans"
          fill
          priority
          className="object-cover object-[center_right]"
        />
      </div>

      {/* ================= HERO TEXT ================= */}
      <div className="text-center mt-6 px-4 sm:px-6 md:px-0">
        <h1 className="text-3xl sm:text-4xl md:text-5xl font-bold mb-3 text-gray-900">
          MSME Loans
        </h1>
        <p className="text-xl sm:text-2xl md:text-2xl text-gray-700 max-w-2xl mx-auto">
          Empowering small and medium enterprises with flexible and reliable financing solutions.
        </p>
      </div>

      {/* ================= CONTENT ================= */}
      <div className="max-w-6xl mx-auto px-6 md:px-20 py-14 md:py-20 space-y-16">

        {/* INTRO */}
        <div className="max-w-3xl mx-auto">
          <h2 className="text-2xl md:text-3xl font-bold text-gray-900 mb-5 text-center">
            Empowering MSME Growth
          </h2>
          <p className="text-gray-700 leading-relaxed text-sm md:text-base text-center">
            Our MSME Loan solutions are designed to support entrepreneurs,
            small businesses, and growing enterprises by providing flexible
            financing for working capital, business expansion, asset purchases,
            and operational needs.
          </p>
        </div>

        {/* FEATURES */}
        <div className="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 md:gap-8">
          {[
            "Flexible loan amounts",
            "Competitive interest rates",
            "Quick approval & disbursement",
            "Minimal documentation",
            "Structured repayment plans",
            "Support for new & existing businesses",
          ].map((item, index) => (
            <div
              key={index}
              className="bg-white rounded-2xl p-6 shadow-md hover:shadow-xl transition"
            >
              <h3 className="font-semibold text-base md:text-lg text-gray-900 mb-2">
                ✔ {item}
              </h3>
              <p className="text-gray-700 text-sm">
                Designed to meet your business financing needs efficiently
                and transparently.
              </p>
            </div>
          ))}
        </div>

        {/* ELIGIBILITY & PURPOSE */}
        <div className="grid grid-cols-1 md:grid-cols-2 gap-10 md:gap-12">
          <div>
            <h3 className="text-xl md:text-2xl font-bold text-gray-900 mb-4">
              Eligibility
            </h3>
            <ul className="space-y-3 text-gray-700 list-disc pl-6 text-sm md:text-base">
              <li>Sole proprietors & partnerships</li>
              <li>Small & medium enterprises</li>
              <li>Registered or well-established businesses</li>
              <li>Businesses with stable cash flow</li>
            </ul>
          </div>

          <div>
            <h3 className="text-xl md:text-2xl font-bold text-gray-900 mb-4">
              Loan Purposes
            </h3>
            <ul className="space-y-3 text-gray-700 list-disc pl-6 text-sm md:text-base">
              <li>Working capital requirements</li>
              <li>Business expansion</li>
              <li>Machinery & equipment purchase</li>
              <li>Inventory & operational expenses</li>
            </ul>
          </div>
        </div>

        {/* BENEFITS */}
        <div className="bg-white rounded-3xl p-6 md:p-10 shadow-lg">
          <h3 className="text-xl md:text-2xl font-bold text-gray-900 mb-6 text-center">
            Why Choose Our MSME Loans?
          </h3>

          <div className="grid grid-cols-1 sm:grid-cols-2 gap-4 md:gap-6 text-gray-700 font-medium text-sm md:text-base">
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
          <h3 className="text-2xl md:text-3xl font-bold text-gray-900 mb-4">
            Ready to Grow Your Business?
          </h3>
          <p className="text-gray-700 mb-6 max-w-2xl mx-auto text-sm md:text-base">
            Take the next step toward business success with our MSME Loan
            solutions. Apply today and secure the financing your business needs.
          </p>
        </div>

      </div>
    </section>
  );
}
