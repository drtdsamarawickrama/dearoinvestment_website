export const metadata = {
  title: "Investor Invitation | Dearo Investment Limited",
};

export default function InvestorInvitationPage() {
  return (
    <section className="bg-gray-50">
      {/* HERO SECTION */}
      <div className="bg-gradient-to-r from-gray-900 to-gray-800 text-white">
        <div className="max-w-7xl mx-auto px-6 py-24 text-center">
          <h1 className="text-4xl md:text-5xl font-bold mb-6">
            Investor Invitation
          </h1>
          <p className="text-lg md:text-xl text-gray-300 max-w-3xl mx-auto">
            Partner With a High-Growth, Impact-Driven Financial Institution
          </p>
        </div>
      </div>

      {/* INTRO SECTION */}
      <div className="max-w-7xl mx-auto px-6 py-20">
        <div className="max-w-4xl mx-auto text-center mb-16">
          <p className="text-gray-700 text-lg leading-relaxed">
            <strong>Dearo Investment Limited</strong> welcomes foreign investors,
            institutional partners, and strategic stakeholders to participate in
            a fast-growing non-bank financial services institution in Sri Lanka
            and beyond. Our disciplined risk management, diversified lending
            portfolio, and strong governance framework position Dearo as a
            compelling opportunity for investors seeking stable returns and
            sustainable growth.
          </p>
        </div>

        {/* WHY INVEST */}
        <div className="mb-20">
          <h2 className="text-3xl font-bold text-center mb-12">
            Why Invest With Dearo?
          </h2>

          <div className="grid gap-8 md:grid-cols-2 lg:grid-cols-4">
            {/* CARD 1 */}
            <div className="bg-white p-8 rounded-xl shadow-sm border hover:shadow-md transition">
              <h3 className="text-xl font-semibold mb-3">
                Attractive & Predictable Returns
              </h3>
              <p className="text-gray-600 leading-relaxed">
                Structured investment models delivering competitive and
                consistent returns, supported by transparent reporting aligned
                with international standards.
              </p>
            </div>

            {/* CARD 2 */}
            <div className="bg-white p-8 rounded-xl shadow-sm border hover:shadow-md transition">
              <h3 className="text-xl font-semibold mb-3">
                Robust Risk Management
              </h3>
              <p className="text-gray-600 leading-relaxed">
                Advanced credit assessment, collateral-backed lending, and
                portfolio insurance strategies safeguard capital and minimize
                exposure.
              </p>
            </div>

            {/* CARD 3 */}
            <div className="bg-white p-8 rounded-xl shadow-sm border hover:shadow-md transition">
              <h3 className="text-xl font-semibold mb-3">
                Scalable Growth Strategy
              </h3>
              <p className="text-gray-600 leading-relaxed">
                Expansion into 30+ branches and international markets including
                Kenya and the Philippines, powered by digital transformation.
              </p>
            </div>

            {/* CARD 4 */}
            <div className="bg-white p-8 rounded-xl shadow-sm border hover:shadow-md transition">
              <h3 className="text-xl font-semibold mb-3">
                Impact-Driven Investing
              </h3>
              <p className="text-gray-600 leading-relaxed">
                Focus on SMEs, agriculture, and underserved communities,
                delivering measurable financial, social, and ESG impact.
              </p>
            </div>
          </div>
        </div>

        {/* CTA SECTION */}
        <div className="bg-white border rounded-2xl p-12 text-center shadow-sm">
          <h2 className="text-3xl font-bold mb-4">
            Join Our Global Growth Journey
          </h2>
          <p className="text-gray-700 max-w-3xl mx-auto mb-8 leading-relaxed">
            Dearo invites foreign and institutional investors to explore
            opportunities for secure, high-quality returns while contributing to
            inclusive economic development. Partner with us to grow your capital
            responsibly and strategically.
          </p>

        
        </div>
      </div>
    </section>
  );
}