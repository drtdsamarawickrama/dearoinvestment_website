export const metadata = {
  title: "Personnel Loans",
  description:
    "Flexible personal loan solutions for salaried individuals and self-employed professionals.",
};

export default function PersonnelLoansPage() {
  return (
    <section className="py-20 bg-gray-50">
      <div className="max-w-6xl mx-auto px-6">
        {/* Title */}
        <h1 className="text-4xl font-bold text-gray-900 mb-6">
          Personnel Loans
        </h1>

        {/* Intro */}
        <p className="text-gray-700 text-lg mb-8">
          Our personnel loan solutions are designed to help individuals meet
          their personal financial needs such as education, medical expenses,
          travel, weddings, or emergency requirements.
        </p>

        {/* Features */}
        <div className="grid md:grid-cols-2 gap-6 mb-10">
          <div className="bg-white p-6 rounded-xl shadow">
            <h3 className="text-xl font-semibold mb-3">
              Loan Features
            </h3>
            <ul className="list-disc pl-5 space-y-2 text-gray-700">
              <li>Quick loan approval</li>
              <li>Minimal documentation</li>
              <li>Attractive interest rates</li>
              <li>Flexible repayment periods</li>
            </ul>
          </div>

          <div className="bg-white p-6 rounded-xl shadow">
            <h3 className="text-xl font-semibold mb-3">
              Eligibility
            </h3>
            <ul className="list-disc pl-5 space-y-2 text-gray-700">
              <li>Salaried employees</li>
              <li>Self-employed professionals</li>
              <li>Government & private sector employees</li>
              <li>Stable income proof required</li>
            </ul>
          </div>
        </div>

        {/* CTA */}
        <a
          href="/contact"
          className="inline-block bg-blue-600 text-white px-7 py-3 rounded-lg font-medium hover:bg-blue-700 transition"
        >
          Apply for Personnel Loan
        </a>
      </div>
    </section>
  );
}
