export const metadata = {
  title: "Investor Invitation | Dearo Investment Limited",
};

export default function InvestorInvitationPage() {
  return (
    <section className="bg-gray-50">
      {/* ================= HERO SECTION ================= */}
      <div className="bg-gradient-to-r from-indigo-900 to-indigo-800 text-white">
        <div className="max-w-7xl mx-auto px-6 py-28 text-center">
          <h1 className="text-4xl md:text-5xl font-bold mb-6">
            Investor Invitation
          </h1>
          <p className="text-lg md:text-xl text-gray-200 max-w-3xl mx-auto">
            At Dearo Investment, we invite visionary investors to join us in
            supporting transformative business opportunities.
          </p>
        </div>
      </div>

      {/* ================= MAIN CONTENT ================= */}
      <div className="max-w-5xl mx-auto px-6 py-20">
        <div className="bg-white rounded-3xl shadow-xl p-8 md:p-12 text-center">
          <p className="text-gray-700 text-base md:text-lg leading-relaxed mb-6">
            Through strategic capital, flexible funding options, and comprehensive
            investment-related support, we create avenues for sustainable growth
            and strong returns.
          </p>
          <p className="text-gray-700 text-base md:text-lg leading-relaxed">
            Partner with us to contribute to innovative projects, drive economic
            impact, and unlock long-term value for both businesses and investors.
          </p>
        </div>
      </div>
    </section>
  );
}
