import Image from "next/image";
import { Building, ChartLine, Shield } from "lucide-react";

export const metadata = {
  title: "Join Venture Loans | Dearo Investment Limited",
  description:
    "Financial support for joint venture partnerships and collaborative business projects.",
};

export default function JoinVentureLoansPage() {
  const features = [
    {
      icon: <Building className="w-8 h-8 text-blue-600" />,
      title: "Suitable For",
      desc: "Real estate, manufacturing, infrastructure, and commercial ventures.",
    },
    {
      icon: <ChartLine className="w-8 h-8 text-blue-600" />,
      title: "Key Advantages",
      desc: "Customized financing, transparent terms, risk mitigation, advisory support.",
    },
    {
      icon: <Shield className="w-8 h-8 text-blue-600" />,
      title: "Our Commitment",
      desc: "Ensuring financial stability, compliance, and long-term success of JV projects.",
    },
  ];

  const process = [
    "Submit joint venture proposal",
    "Eligibility & feasibility review",
    "Loan structuring & approval",
    "Disbursement & project monitoring",
  ];

  return (
    <section className="bg-gray-50">

      {/* ================= HERO IMAGE ================= */}
      <div className="relative w-full h-[260px] sm:h-[300px] md:h-[350px] overflow-hidden">
        <Image
          src="/assests/join1.png"
          alt="Join Venture Loans"
          fill
          priority
          className="object-cover object-center"
        />
      </div>

      {/* ================= HERO CONTENT ================= */}
      <div className="max-w-6xl mx-auto px-6 py-10 text-center">
        <h1 className="text-3xl sm:text-4xl md:text-5xl font-bold text-gray-900 mb-4">
          Join Venture Loans
        </h1>
        <p className="max-w-3xl mx-auto text-gray-700 text-base sm:text-lg">
          Collaborative financial solutions for partners engaging in large-scale projects.
        </p>
      </div>

      {/* ================= FEATURES ================= */}
      <div className="max-w-6xl mx-auto px-6 py-16 space-y-16">

        <div className="text-center max-w-3xl mx-auto">
          <h2 className="text-3xl md:text-4xl font-bold text-gray-900">
            Why Choose Our Join Venture Loans?
          </h2>
          <p className="text-gray-700 mt-4">
            Structured financing, risk-sharing options, and advisory support to empower joint venture projects.
          </p>
        </div>

        <div className="grid gap-8 md:grid-cols-3">
          {features.map((f, idx) => (
            <div
              key={idx}
              className="bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl transition transform hover:-translate-y-2"
            >
              <div className="mb-4">{f.icon}</div>
              <h3 className="text-xl font-semibold text-gray-900 mb-2">
                {f.title}
              </h3>
              <p className="text-gray-700 text-sm">{f.desc}</p>
            </div>
          ))}
        </div>

        {/* ================= PROCESS ================= */}
        <div>
          <h2 className="text-3xl font-bold text-gray-900 mb-10 text-center">
            Our Loan Process
          </h2>

          <div className="flex flex-col md:flex-row md:justify-between gap-8">
            {process.map((step, idx) => (
              <div
                key={idx}
                className="flex md:flex-col items-start md:items-center text-left md:text-center gap-4"
              >
                <div className="w-12 h-12 bg-blue-600 text-white rounded-full flex items-center justify-center font-bold">
                  {idx + 1}
                </div>
                <p className="text-gray-700 max-w-xs">{step}</p>
              </div>
            ))}
          </div>
        </div>

        {/* ================= CTA ================= */}
        <div className="text-center pt-10">
          <h3 className="text-3xl font-bold text-gray-900 mb-4">
            Ready to Partner on a Project?
          </h3>
          <p className="text-gray-700 max-w-2xl mx-auto">
            Apply for a Join Venture Loan today and secure structured financing and expert support for your collaborative business project.
          </p>
        </div>

      </div>
    </section>
  );
}
