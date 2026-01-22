import Image from "next/image";
import { Leaf, Tractor, Droplet, Sun } from "lucide-react"; // example icons



export default function AgricultureLoansPage() {
  const features = [
    { icon: <Leaf className="w-8 h-8 text-green-600" />, title: "Crop Cultivation",  },
    { icon: <Tractor className="w-8 h-8 text-green-600" />, title: "Machinery & Equipment", },
    { icon: <Droplet className="w-8 h-8 text-green-600" />, title: "Livestock & Dairy", },
    { icon: <Sun className="w-8 h-8 text-green-600" />, title: "Rural Development", },
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
          Agriculture Capital Investment
        </h2>
        <p className="max-w-2xl mx-auto text-lg md:text-xl text-gray-700">
          Flexible funding solutions for farmers, agribusinesses, and rural development.
        </p>
      </div>

      {/* ================= FEATURES ================= */}
      <div className="max-w-6xl mx-auto px-6 py-20 space-y-16">
        <div className="text-center mb-12">
          <h2 className="text-3xl md:text-4xl font-bold text-gray-900">Why Choose Our Agriculture Capital Investment ?</h2>
          <p className="text-gray-700 mt-3 max-w-2xl mx-auto">
           We provide flexible capital solutions for farmers, agribusinesses, and rural development initiatives, enabling growth, modernization, and sustainable impact across the agricultural sector.
          </p>
        </div>

        <div className="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
          {features.map((f, idx) => (
            <div key={idx} className="bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl transition transform hover:-translate-y-2">
              <div className="mb-4">{f.icon}</div>
              <h3 className="text-xl font-semibold text-gray-900 mb-2">{f.title}</h3>
             
            </div>
          ))}
        </div>

       
        

        {/* ================= CTA ================= */}
        <div className="text-center mt-16">
          <h3 className="text-3xl font-bold text-gray-900 mb-4">Ready to Grow Your Agri business ?</h3>
          <p className="text-gray-700 mb-6 max-w-2xl mx-auto">
            Apply for an Agriculture Capital Investment today and secure the funding support your farm or agribusiness needs.
          </p>
        </div>
      </div>
    </section>
  );
}
