export const metadata = {
  title: "MSME Loans",
};

export default function MSMELoansPage() {
  return (
    <section className="py-20 bg-gray-50">
      <div className="max-w-6xl mx-auto px-6">
        <h1 className="text-4xl font-bold mb-6 text-gray-900">
          MSME Loans
        </h1>

        <p className="text-gray-700 mb-6">
          Our MSME loan solutions are designed to support small and medium
          enterprises with flexible financing options, competitive interest
          rates, and quick approvals.
        </p>

        <ul className="space-y-3 text-gray-700 list-disc pl-6">
          <li>Working capital financing</li>
          <li>Low interest rates</li>
          <li>Flexible repayment options</li>
          <li>Minimal documentation</li>
        </ul>

        <div className="mt-8">
          <a
            href="/contact"
            className="inline-block bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition"
          >
            Apply Now
          </a>
        </div>
      </div>
    </section>
  );
}
