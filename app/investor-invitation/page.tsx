export const metadata = {
  title: "Investor Invitation | Dearo Investment Limited",
};

export default function InvestorInvitationPage() {
  return (
    <section className="bg-gray-50">
      {/* HERO SECTION */}
      <div className="bg-gradient-to-r from-indigo-900 to-indigo-800 text-white">
        <div className="max-w-7xl mx-auto px-6 py-28 text-center relative overflow-hidden">
          <h1 className="text-4xl md:text-5xl font-bold mb-6 relative z-10">
            Investor Invitation
          </h1>
          <p className="text-lg md:text-xl text-gray-300 max-w-3xl mx-auto relative z-10">
            Partner With a High-Growth, Impact-Driven Financial Institution
          </p>
          <span className="absolute -bottom-10 left-1/2 transform -translate-x-1/2 w-60 h-1 bg-white rounded-full opacity-20 animate-pulse"></span>
        </div>
      </div>

      {/* INTRO SECTION */}
      <div className="max-w-7xl mx-auto px-6 py-20">
        <div className="max-w-4xl mx-auto text-center mb-16">
          <p className="text-gray-700 text-lg md:text-xl leading-relaxed">
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
          <h2 className="text-3xl md:text-4xl font-bold text-center mb-12">
            Why Invest With Dearo?
          </h2>

          <div className="grid gap-8 md:grid-cols-2 lg:grid-cols-4">
            {[
              {
                title: "Attractive & Predictable Returns",
                desc: "Structured investment models delivering competitive and consistent returns, supported by transparent reporting aligned with international standards."
              },
              {
                title: "Robust Risk Management",
                desc: "Advanced credit assessment, collateral-backed lending, and portfolio insurance strategies safeguard capital and minimize exposure."
              },
              {
                title: "Scalable Growth Strategy",
                desc: "Expansion into 25+ branches and international markets including Kenya and the Philippines, powered by digital transformation."
              },
              {
                title: "Impact-Driven Investing",
                desc: "Focus on SMEs, agriculture, and underserved communities, delivering measurable financial, social, and ESG impact."
              }
            ].map((card, i) => (
              <div
                key={i}
                className="bg-white p-8 rounded-xl shadow-lg border border-gray-200 hover:shadow-2xl hover:scale-105 transform transition duration-300"
              >
                <h3 className="text-xl font-semibold mb-3 text-indigo-900">
                  {card.title}
                </h3>
                <p className="text-gray-600 leading-relaxed">{card.desc}</p>
              </div>
            ))}
          </div>
        </div>

        {/* CTA SECTION */}
        <div className="bg-gradient-to-r from-indigo-900 to-indigo-700 rounded-3xl p-12 text-center shadow-lg text-white relative overflow-hidden">
          <h2 className="text-3xl md:text-4xl font-bold mb-4">
            Join Our Global Growth Journey
          </h2>
          <p className="max-w-3xl mx-auto mb-8 leading-relaxed text-gray-100">
            Dearo invites foreign and institutional investors to explore
            opportunities for secure, high-quality returns while contributing to
            inclusive economic development. Partner with us to grow your capital
            responsibly and strategically.
          </p>
          <a
            href="#contact"
            className="inline-block bg-white text-indigo-900 font-semibold px-8 py-4 rounded-full shadow-lg hover:bg-gray-100 transition"
          >
            Contact Us
          </a>
          <span className="absolute -top-10 -right-10 w-40 h-40 bg-white opacity-10 rounded-full animate-pulse"></span>
          <span className="absolute -bottom-10 -left-10 w-40 h-40 bg-white opacity-10 rounded-full animate-pulse"></span>
        </div>
      </div>
    </section>
  );
}
