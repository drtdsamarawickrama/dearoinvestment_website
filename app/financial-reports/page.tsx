export const metadata = {
  title: "Financial Reports | Dearo Investment Limited",
};

export default function FinancialReportsPage() {
  return (
    <section className="bg-gray-50">
      {/* HERO */}
      <div className="bg-gradient-to-r from-gray-900 to-gray-800 text-white">
        <div className="max-w-7xl mx-auto px-6 py-24 text-center">
          <h1 className="text-4xl md:text-5xl font-bold mb-6">
            Financial Reports
          </h1>
          <p className="text-lg md:text-xl text-gray-300 max-w-3xl mx-auto">
            Transparency You Can Trust
          </p>
        </div>
      </div>

      {/* INTRO */}
      <div className="max-w-7xl mx-auto px-6 py-20">
        <div className="max-w-4xl mx-auto text-center mb-16">
          <p className="text-gray-700 text-lg leading-relaxed">
            At <strong>Dearo Investment Limited</strong>, we believe in complete
            financial transparency. Our financial reports provide a clear view
            of our performance, risk management practices, and growth
            strategy—ensuring investors and stakeholders have the insights they
            need to make informed decisions.
          </p>
        </div>

        {/* REPORT DETAILS */}
        <div className="mb-20">
          <h2 className="text-3xl font-bold text-center mb-12">
            What You’ll Find in Our Reports
          </h2>

          <div className="grid gap-8 md:grid-cols-2 lg:grid-cols-4">
            {[
              {
                title: "Annual & Quarterly Financial Statements",
                text: "Balance sheets, income statements, and cash flow statements prepared under international accounting standards.",
              },
              {
                title: "Performance Highlights",
                text: "Key metrics, growth trends, and financial ratios reflecting operational efficiency and profitability.",
              },
              {
                title: "Risk & Compliance Overview",
                text: "Credit, market, and operational risk insights with mitigation strategies and regulatory compliance.",
              },
              {
                title: "Investment & Portfolio Reports",
                text: "Analysis of lending portfolios, sector exposure, and ESG impact outcomes.",
              },
            ].map((item, i) => (
              <div
                key={i}
                className="bg-white p-8 rounded-xl shadow-sm border hover:shadow-md transition"
              >
                <h3 className="text-xl font-semibold mb-3">{item.title}</h3>
                <p className="text-gray-600 leading-relaxed">{item.text}</p>
              </div>
            ))}
          </div>
        </div>

        {/* YEAR WISE DOWNLOADS */}
        <div className="mb-20">
          <h2 className="text-3xl font-bold text-center mb-12">
            Download Financial Reports by Year
          </h2>

          <div className="grid gap-8 md:grid-cols-3">
            {/* 2025 */}
            <div className="bg-white p-10 rounded-2xl border shadow-sm text-center">
              <h3 className="text-2xl font-bold mb-4">2025</h3>
              <p className="text-gray-600 mb-4  justify-center">
                Total Assets - 1721.14 Mn <br/>
               Started Capital - 100 Mn<br/>
               Directors Contribution For Shares - 552 Mn<br/>
               Liabilities - 828.44 Mn (Directors Loans and Deferred Intrest)<br/>
               Total Equity -768.7 Mn<br/>
               Profit & Loss After tax - 55.39 Mn
              </p>
              <div className="flex flex-col gap-3">
                <button className="px-6 py-3 bg-gray-900 text-white rounded-lg font-semibold hover:bg-gray-800 transition">
                  Download Annual Report
                </button>
               
              </div>
            </div>

            {/* 2024 */}
            <div className="bg-white p-10 rounded-2xl border shadow-sm text-center">
              <h3 className="text-2xl font-bold mb-4">2024</h3>
              <p className="text-gray-600 mb-6">
              Total Assets - 849.90 Mn
               Started Capital - 100 Mn
               Directors Contribution For Shares - 552 Mn
               Total Equity - 713.34 Mn
               Profit & Loss After tax - 45.95 Mn
              </p>
              <div className="flex flex-col gap-3">
                <button className="px-6 py-3 bg-gray-900 text-white rounded-lg font-semibold hover:bg-gray-800 transition">
                  Download Annual Report
                </button>
                
              </div>
            </div>

            {/* 2023 */}
            <div className="bg-white p-10 rounded-2xl border shadow-sm text-center">
              <h3 className="text-2xl font-bold mb-4">2023</h3>
              <p className="text-gray-600 mb-6">
               Total Assets - 595.3 Mn
               Started Capital - 100 Mn
               Directors Contribution For Shares - 470 Mn
               Total Equity - 585.3 Mn
               Profit & Loss After tax - 15.3 Mn 
              </p>
              <div className="flex flex-col gap-3">
                <button className="px-6 py-3 bg-gray-900 text-white rounded-lg font-semibold hover:bg-gray-800 transition">
                  Download Annual Report
                </button>
                
              </div>
            </div>
          </div>
        </div>

        {/* FOOTER CTA */}
        <div className="bg-white border rounded-2xl p-12 text-center shadow-sm">
          <h2 className="text-3xl font-bold mb-4">
            Need More Information?
          </h2>
          <p className="text-gray-700 max-w-3xl mx-auto mb-8">
            For historical reports, customized disclosures, or investor
            inquiries, please contact our investor relations team.
          </p>
          <button className="px-8 py-4 bg-gray-900 text-white rounded-lg font-semibold hover:bg-gray-800 transition">
            Contact Investor Relations
          </button>
        </div>
      </div>
    </section>
  );
}
