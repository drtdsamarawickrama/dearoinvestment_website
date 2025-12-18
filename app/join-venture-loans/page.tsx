export const metadata = {
  title: "Join Venture Loans",
  description:
    "Financial support for joint venture partnerships and collaborative business projects.",
};

export default function JoinVentureLoansPage() {
  return (
    <section className="py-20 bg-gray-50">
      <div className="max-w-6xl mx-auto px-6">
        {/* Title */}
        <h1 className="text-4xl font-bold text-gray-900 mb-6">
          Join Venture Loans
        </h1>

        {/* Description */}
        <p className="text-gray-700 text-lg mb-8">
          Our joint venture loan solutions help partners collaborate on large-scale
          projects by providing structured financing, risk-sharing options, and
          strategic financial planning.
        </p>

        {/* Content */}
        <div className="grid md:grid-cols-3 gap-6 mb-10">
          <div className="bg-white p-6 rounded-xl shadow">
            <h3 className="font-semibold text-xl mb-3">
              Suitable For
            </h3>
            <ul className="list-disc pl-5 text-gray-700 space-y-2">
              <li>Real estate developments</li>
              <li>Manufacturing partnerships</li>
              <li>Infrastructure projects</li>
              <li>Commercial ventures</li>
            </ul>
          </div>

          <div className="bg-white p-6 rounded-xl shadow">
            <h3 className="font-semibold text-xl mb-3">
              Key Advantages
            </h3>
            <ul className="list-disc pl-5 text-gray-700 space-y-2">
              <li>Customized financing structures</li>
              <li>Transparent partnership terms</li>
              <li>Risk mitigation strategies</li>
              <li>Professional advisory support</li>
            </ul>
          </div>

          <div className="bg-white p-6 rounded-xl shadow">
            <h3 className="font-semibold text-xl mb-3">
              Our Commitment
            </h3>
            <p className="text-gray-700">
              We work closely with all stakeholders to ensure financial stability,
              compliance, and long-term success of joint venture projects.
            </p>
          </div>
        </div>

        {/* CTA */}
        <a
          href="/contact"
          className="inline-block bg-blue-600 text-white px-7 py-3 rounded-lg font-medium hover:bg-blue-700 transition"
        >
          Discuss Your Joint Venture
        </a>
      </div>
    </section>
  );
}
