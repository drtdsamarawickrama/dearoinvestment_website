import Image from "next/image";
import { Leaf, Tractor, Droplet, Sun } from "lucide-react"; // example icons

export const metadata = {
  title: "Agriculture Loans | Dearo Investment Limited",
  description:
    "Flexible agriculture loan solutions to support farmers, agribusinesses, and rural development.",
};

export default function AgricultureLoansPage() {
  const features = [
    { icon: <Leaf className="w-8 h-8 text-green-600" />, title: "Crop Cultivation", desc: "Financing for seasonal and commercial crop cultivation." },
    { icon: <Tractor className="w-8 h-8 text-green-600" />, title: "Machinery & Equipment", desc: "Support for purchasing tractors, tools, and modern farming equipment." },
    { icon: <Droplet className="w-8 h-8 text-green-600" />, title: "Livestock & Dairy", desc: "Loans for cattle, poultry, and dairy farming operations." },
    { icon: <Sun className="w-8 h-8 text-green-600" />, title: "Rural Development", desc: "Empowering rural agribusinesses and infrastructure projects." },
  ];

  const process = [
    "Submit loan application",
    "Eligibility & documentation review",
    "Loan approval & disbursement",
    "Ongoing support & monitoring",
  ];

  return (
    <section className="bg-gray-50">

      {/* ================= HERO IMAGE ================= */}
      <div className="relative w-full h-[300px] md:h-[350px] overflow-hidden">
        <Image
          src="/assests/agrits.png" // replace with your image
          alt="Agriculture Loans"
          fill
          priority
          className="object-cover object-center"
        />
      </div>

      {/* ================= HERO TEXT (Centered) ================= */}
      <div className="text-center mt-6 px-4 sm:px-6 md:px-0">
        <h2 className="text-4xl md:text-5xl font-bold mb-4 text-gray-900">
          Agriculture Loans
        </h2>
        <p className="max-w-2xl mx-auto text-lg md:text-xl text-gray-700">
          Flexible financing solutions for farmers, agribusinesses, and rural development.
        </p>
      </div>

      {/* ================= FEATURES ================= */}
      <div className="max-w-6xl mx-auto px-6 py-20 space-y-16">
        <div className="text-center mb-12">
          <h2 className="text-3xl md:text-4xl font-bold text-gray-900">Why Choose Our Agriculture Loans?</h2>
          <p className="text-gray-700 mt-3 max-w-2xl mx-auto">
            Our agriculture loans are designed to empower farmers and agribusinesses with reliable, structured financing.
          </p>
        </div>

        <div className="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
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
          <h2 className="text-3xl font-bold text-gray-900 mb-8 text-center">Our Agriculture Loan Process</h2>
          <div className="relative flex flex-col md:flex-row md:justify-between items-start md:items-center space-y-6 md:space-y-0 md:space-x-6">
            {process.map((step, idx) => (
              <div key={idx} className="flex items-start md:flex-col md:items-center text-left md:text-center space-x-3 md:space-x-0">
                <div className="w-10 h-10 md:w-12 md:h-12 bg-green-600 text-white rounded-full flex items-center justify-center font-bold">
                  {idx + 1}
                </div>
                <p className="text-gray-700 max-w-xs">{step}</p>
                {idx !== process.length - 1 && <div className="hidden md:block flex-1 h-1 bg-green-200 mt-5"></div>}
              </div>
            ))}
          </div>
        </div>

        {/* ================= CTA ================= */}
        <div className="text-center mt-16">
          <h3 className="text-3xl font-bold text-gray-900 mb-4">Ready to Grow Your Agribusiness?</h3>
          <p className="text-gray-700 mb-6 max-w-2xl mx-auto">
            Apply for an Agriculture Loan today and secure the financial support your farm or agribusiness needs.
          </p>
        </div>
      </div>
    </section>
  );
}
