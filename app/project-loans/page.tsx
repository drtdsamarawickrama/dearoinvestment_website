import Image from "next/image";
import { Building, ChartLine, Settings, Clock } from "lucide-react";

export const metadata = {
  title: "Project Loans | Dearo Investment Limited",
  description:
    "Structured project loan solutions to support large-scale developments and long-term investments.",
};

export default function ProjectLoansPage() {
  const features = [
    {
      icon: <Building className="w-8 h-8 text-blue-600" />,
      title: "Construction & Real Estate",
      desc: "Finance large-scale construction and property development projects.",
    },
    {
      icon: <ChartLine className="w-8 h-8 text-blue-600" />,
      title: "Infrastructure Development",
      desc: "Support roads, bridges, utilities, and other infrastructure initiatives.",
    },
    {
      icon: <Settings className="w-8 h-8 text-blue-600" />,
      title: "Manufacturing Projects",
      desc: "Invest in machinery, factories, and production expansion.",
    },
    {
      icon: <Clock className="w-8 h-8 text-blue-600" />,
      title: "Renewable Energy",
      desc: "Fund solar, wind, and other sustainable energy projects.",
    },
  ];

  const process = [
    "Project feasibility assessment",
    "Financial structuring & approval",
    "Loan disbursement in phases",
    "Ongoing monitoring & support",
  ];

  return (
    <section className="bg-gray-50">

      {/* ================= HERO SECTION (VISIBLE ON ALL DEVICES) ================= */}
      <div className="relative w-full h-[300px] md:h-[350px] overflow-hidden">
        <Image
          src="/assests/project1.jpg"
          alt="Project Loans"
          fill
          priority
          className="object-cover object-center"
        />
      </div>

      <div className="text-center mt-6 px-6">
        <h2 className="text-4xl md:text-5xl font-bold mb-4">
          Project Loans
        </h2>
        <p className="max-w-2xl text-lg text-gray-700 mx-auto">
          Structured financing solutions for large-scale developments, construction, and long-term projects.
        </p>
      </div>

      {/* ================= FEATURES ================= */}
      <div className="max-w-6xl mx-auto px-6 py-20 space-y-16">
        <div className="text-center mb-12">
          <h2 className="text-3xl md:text-4xl font-bold text-gray-900">Why Choose Our Project Loans?</h2>
          <p className="text-gray-700 mt-3 max-w-2xl mx-auto">
            Our project loans are designed to empower businesses and developers with flexible, structured financing.
          </p>
        </div>

        <div className="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
          {features.map((f, index) => (
            <div
              key={index}
              className="bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl transition transform hover:-translate-y-2"
            >
              <div className="mb-4">{f.icon}</div>
              <h3 className="text-xl font-semibold text-gray-900 mb-2">{f.title}</h3>
              <p className="text-gray-700 text-sm">{f.desc}</p>
            </div>
          ))}
        </div>

        {/* ================= PROCESS ================= */}
        <div>
          <h2 className="text-3xl font-bold text-gray-900 mb-8 text-center">Our Project Loan Process</h2>
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
            Ready to Start Your Project?
          </h3>
          <p className="text-gray-700 mb-6 max-w-2xl mx-auto">
            Apply for a Project Loan today and secure the financing your large-scale development needs.
          </p>
        </div>
      </div>
    </section>
  );
}
