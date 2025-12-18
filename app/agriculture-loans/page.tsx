export const metadata = {
  title: "Agriculture Loans",
  description:
    "Flexible agriculture loan solutions to support farmers, agribusinesses, and rural development.",
};

export default function AgricultureLoansPage() {
  return (
    <section className="py-20 bg-gray-50">
      <div className="max-w-6xl mx-auto px-6">
        {/* Title */}
        <h1 className="text-4xl font-bold text-gray-900 mb-6">
          Agriculture Loans
        </h1>

        {/* Description */}
        <p className="text-gray-700 text-lg mb-8">
          Our agriculture loan facilities are designed to empower farmers and
          agribusinesses by providing reliable financial support for cultivation,
          equipment, livestock, and rural development projects.
        </p>

        {/* Features */}
        <div className="grid md:grid-cols-2 gap-6 mb-10">
          <div className="bg-white p-6 rounded-xl shadow">
            <h3 className="font-semibold text-xl mb-3">
              Loan Benefits
            </h3>
            <ul className="list-disc pl-5 text-gray-700 space-y-2">
              <li>Crop cultivation financing</li>
              <li>Machinery & equipment purchase</li>
              <li>Livestock & dairy farming support</li>
              <li>Seasonal & long-term loan options</li>
            </ul>
          </div>

          <div className="bg-white p-6 rounded-xl shadow">
            <h3 className="font-semibold text-xl mb-3">
              Why Choose Us
            </h3>
            <ul className="list-disc pl-5 text-gray-700 space-y-2">
              <li>Competitive interest rates</li>
              <li>Flexible repayment plans</li>
              <li>Quick approval process</li>
              <li>Expert financial guidance</li>
            </ul>
          </div>
        </div>

        {/* CTA */}
        <a
          href="/contact"
          className="inline-block bg-green-600 text-white px-7 py-3 rounded-lg font-medium hover:bg-green-700 transition"
        >
          Apply for Agriculture Loan
        </a>
      </div>
    </section>
  );
}
