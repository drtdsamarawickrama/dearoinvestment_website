export const metadata = {
  title: "Project Loans",
  description:
    "Structured project loan solutions to support large-scale developments and long-term investments.",
};

export default function ProjectLoansPage() {
  return (
    <section className="py-20 bg-gray-50">
      <div className="max-w-6xl mx-auto px-6">
        {/* Title */}
        <h1 className="text-4xl font-bold text-gray-900 mb-6">
          Project Loans
        </h1>

        {/* Description */}
        <p className="text-gray-700 text-lg mb-8">
          Our project loan facilities are designed to finance large-scale
          developments such as construction, infrastructure, manufacturing,
          and commercial projects with customized repayment structures.
        </p>

        {/* Content Sections */}
        <div className="grid md:grid-cols-2 gap-6 mb-10">
          <div className="bg-white p-6 rounded-xl shadow">
            <h3 className="font-semibold text-xl mb-3">
              Project Loan Coverage
            </h3>
            <ul className="list-disc pl-5 text-gray-700 space-y-2">
              <li>Construction & real estate projects</li>
              <li>Infrastructure development</li>
              <li>Manufacturing & industrial projects</li>
              <li>Renewable energy initiatives</li>
            </ul>
          </div>

          <div className="bg-white p-6 rounded-xl shadow">
            <h3 className="font-semibold text-xl mb-3">
              Key Benefits
            </h3>
            <ul className="list-disc pl-5 text-gray-700 space-y-2">
              <li>Customized financing structures</li>
              <li>Long-term repayment options</li>
              <li>Competitive interest rates</li>
              <li>Dedicated project advisory support</li>
            </ul>
          </div>
        </div>

        {/* Process */}
        <div className="bg-white p-6 rounded-xl shadow mb-10">
          <h3 className="font-semibold text-xl mb-3">
            Our Project Loan Process
          </h3>
          <ol className="list-decimal pl-5 text-gray-700 space-y-2">
            <li>Project feasibility assessment</li>
            <li>Financial structuring & approval</li>
            <li>Loan disbursement in phases</li>
            <li>Ongoing monitoring & support</li>
          </ol>
        </div>

        {/* CTA */}
        <a
          href="/contact"
          className="inline-block bg-indigo-600 text-white px-7 py-3 rounded-lg font-medium hover:bg-indigo-700 transition"
        >
          Apply for Project Loan
        </a>
      </div>
    </section>
  );
}
