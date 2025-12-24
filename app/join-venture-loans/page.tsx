import Image from "next/image";
import { Handshake, Building, ChartLine, Shield } from "lucide-react";

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

      {/* ================= HERO SECTION ================= */}
      <div className="relative w-full h-[300px] md:h-[350px] overflow-hidden">
        <Image
          src="/assests/join1.png" // replace with your hero image
          alt="Join Venture Loans"
          fill
          priority
          className="object-cover object-center"
        />
        <div className="absolute inset-0 bg-black/50 flex items-center justify-end">
          <div className="max-w-6xl mx-auto px-6 text-white text-right">
            <h1 className="text-4xl md:text-5xl font-bold mb-4">
              Join Venture Loans
            </h1>
            <p className="max-w-2xl text-lg text-gray-200">
              Collaborative financial solutions for partners engaging in large-scale projects.
            </p>
          </div>
        </div>
      </div>

      {/* ================= FEATURES ================= */}
      <div className="max-w-6xl mx-auto px-6 py-20 space-y-16">
        <div className="text-center mb-12">
          <h2 className="text-3xl md:text-4xl font-bold text-gray-900">
            Why Choose Our Join Venture Loans?
          </h2>
          <p className="text-gray-700 mt-3 max-w-2xl mx-auto">
            Structured financing, risk-sharing options, and advisory support to empower joint venture projects.
          </p>
        </div>

        <div className="grid md:grid-cols-3 gap-8">
          {features.map((f, idx) => (
            <div key={idx} className="bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl transition transform hover:-translate-y-2">
              <div className="mb-4">{f.icon}</div>
              <h3 className="text-xl font-semibold text-gray-900 mb-2">{f.title}</h3>
              <p className="text-gray-700 text-sm">{f.desc}</p>
            </div>
          ))}
        </div>

        {/* ================= PROCESS ================= */}
        <div>
          <h2 className="text-3xl font-bold text-gray-900 mb-8 text-center">
            Our Loan Process
          </h2>
          <div className="relative flex flex-col md:flex-row md:justify-between items-start md:items-center space-y-6 md:space-y-0 md:space-x-6">
            {process.map((step, idx) => (
              <div key={idx} className="flex items-start md:flex-col md:items-center text-left md:text-center space-x-3 md:space-x-0">
                <div className="w-10 h-10 md:w-12 md:h-12 bg-blue-600 text-white rounded-full flex items-center justify-center font-bold">
                  {idx + 1}
                </div>
                <p className="text-gray-700 max-w-xs">{step}</p>
                {idx !== process.length - 1 && <div className="hidden md:block flex-1 h-1 bg-blue-200 mt-5"></div>}
              </div>
            ))}
          </div>
        </div>

        {/* ================= CTA ================= */}
        <div className="text-center mt-16">
          <h3 className="text-3xl font-bold text-gray-900 mb-4">
            Ready to Partner on a Project?
          </h3>
          <p className="text-gray-700 mb-6 max-w-2xl mx-auto">
            Apply for a Join Venture Loan today and secure structured financing and support for your collaborative business project.
          </p>
         
        </div>
      </div>
    </section>
  );
}
