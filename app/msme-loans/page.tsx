import Image from "next/image";

export const metadata = {
  title: "MSME Loans | Dearo Investment Limited",
};

export default function MSMELoansPage() {
  return (
    <section className="bg-gray-50">

   <div className="relative w-full h-[300px] md:h-[350px]">
  <Image
    src="/assests/msmeloan1.png"
    alt="MSME Loans"
    fill
    priority
    className="object-cover object-[center_right]"
  />
  <div className="absolute inset-0 bg-black/50 flex items-start md:items-center justify-end">
    <div className="max-w-6xl mx-auto px-6 mt-12 md:mt-0 text-white text-right">
      <h1 className="text-4xl md:text-5xl font-bold mb-4">
        MSME Loans
      </h1>
      <p className="max-w-2xl text-lg text-gray-200">
        Empowering small and medium enterprises with flexible and reliable financing solutions.
      </p>
    </div>
  </div>
</div>




      {/* ================= CONTENT ================= */}
      <div className="max-w-6xl mx-auto px-20 py-20 space-y-20">

        {/* INTRO */}
        <div className="max-w-3xl">
          <h2 className="text-3xl font-bold text-gray-900 mb-4">
            Empowering MSME Growth
          </h2>
          <p className="text-gray-700 leading-relaxed">
            Our MSME Loan solutions are designed to support entrepreneurs,
            small businesses, and growing enterprises by providing flexible
            financing for working capital, business expansion, asset purchases,
            and operational needs.
          </p>
        </div>

        {/* FEATURES */}
        <div className="grid md:grid-cols-3 gap-8">
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
              <h3 className="font-semibold text-lg text-gray-900 mb-2">
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
        <div className="grid md:grid-cols-2 gap-12">
          <div>
            <h3 className="text-2xl font-bold text-gray-900 mb-4">
              Eligibility
            </h3>
            <ul className="space-y-3 text-gray-700 list-disc pl-6">
              <li>Sole proprietors & partnerships</li>
              <li>Small & medium enterprises</li>
              <li>Registered or well-established businesses</li>
              <li>Businesses with stable cash flow</li>
            </ul>
          </div>

          <div>
            <h3 className="text-2xl font-bold text-gray-900 mb-4">
              Loan Purposes
            </h3>
            <ul className="space-y-3 text-gray-700 list-disc pl-6">
              <li>Working capital requirements</li>
              <li>Business expansion</li>
              <li>Machinery & equipment purchase</li>
              <li>Inventory & operational expenses</li>
            </ul>
          </div>
        </div>

        {/* BENEFITS */}
        <div className="bg-white rounded-3xl p-10 shadow-lg">
          <h3 className="text-2xl font-bold text-gray-900 mb-6 text-center">
            Why Choose Our MSME Loans?
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
            Take the next step toward business success with our MSME Loan
            solutions. Apply today and secure the financing your business needs.
          </p>

         
        </div>

      </div>
    </section>
  );
}
