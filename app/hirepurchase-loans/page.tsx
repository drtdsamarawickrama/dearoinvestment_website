export const metadata = {
  title: "Hire Purchase Loans",
};

import {
  Car,
  Truck,
  Tractor,
} from "lucide-react";

export default function HirePurchaseLoansPage() {
  return (
    <main className="pt-0">
      {/* ===== HERO SECTION ===== */}
      <section className="bg-gray-50">
        {/* Hero Image */}
        <div className="w-full overflow-hidden">
          <img
            src="/assests/hire.jpg"
            alt="Dearo Hire Purchase"
            className="w-full h-[300px] md:h-[420px] object-cover"
          />
        </div>

        {/* Text Below Image */}
        <div className="max-w-3xl mx-auto px-6 py-8 md:py-12 text-center">
          <h1 className="text-3xl md:text-5xl font-bold text-gray-900 leading-tight">
            Dearo Hire Purchase
          </h1>
          <p className="mt-4 text-base md:text-lg text-gray-700">
            Owning your dream vehicle or essential equipment is now within
            reach. Dearo Investment Limited Hire Purchase offers fast,
            flexible, and tailor-made financing solutions for new, used,
            or pre-owned vehicles and machinery—so you can move forward
            with confidence.
          </p>
        </div>

        {/* ===== PAGE CONTENT ===== */}
        <div className="max-w-7xl mx-auto px-6 py-16">
          {/* Feature Grid */}
          <div className="grid md:grid-cols-3 gap-8 mb-12">

            {/* Who We Empower */}
            <div className="space-y-6">
              <div className="flex items-center gap-3">
                <Car className="w-8 h-8 text-[#335DD0FF]" />
                <span>Personal and family vehicles</span>
              </div>
              <div className="flex items-center gap-3">
                <Truck className="w-8 h-8 text-[#335DD0FF]" />
                <span>Commercial & income-generating vehicles</span>
              </div>
              <div className="flex items-center gap-3">
                <Tractor className="w-8 h-8 text-[#335DD0FF]" />
                <span>Machinery & equipment for business growth</span>
              </div>
            </div>

            {/* How You Can Use the Funds */}
            <div className="space-y-6">
              <div className="flex items-center gap-3">
                <Car className="w-8 h-8 text-[#335DD0FF]" />
                <span>Passenger vehicles – Cars, Vans, SUVs, Motorbikes</span>
              </div>
              <div className="flex items-center gap-3">
                <Truck className="w-8 h-8 text-[#335DD0FF]" />
                <span>Commercial vehicles – Buses, Lorries, Trucks, Trailers</span>
              </div>
              <div className="flex items-center gap-3">
                <Tractor className="w-8 h-8 text-[#335DD0FF]" />
                <span>Machinery, construction & agricultural equipment</span>
              </div>
            </div>

            {/* Why This Product Works */}
            <div className="space-y-6 text-gray-800">
              <div className="flex justify-between items-center">
                <div>
                  <span className="text-2xl font-bold text-[#335DD0FF]">
                    Flexible
                  </span>
                  <p>Financing</p>
                </div>
                <p>With or without guarantors</p>
              </div>

              <div className="flex justify-between items-center">
                <div>
                  <span className="text-2xl font-bold text-[#335DD0FF]">
                    Up to
                  </span>
                  <p>Eligible Value</p>
                </div>
                <p>Funding based on asset value</p>
              </div>

              <div className="flex justify-between items-center">
                <div>
                  <span className="text-2xl font-bold text-[#335DD0FF]">
                    Flexible
                  </span>
                  <p>Repayment</p>
                </div>
                <p>Reducing Balance or EMI</p>
              </div>

              <div className="flex justify-between items-center">
                <div>
                  <span className="text-2xl font-bold text-[#335DD0FF]">
                    In-House
                  </span>
                  <p>Insurance</p>
                </div>
                <p>Special premium rates</p>
              </div>
            </div>
          </div>

          {/* Info Section */}
          <div className="grid md:grid-cols-2 gap-8">

            {/* Important */}
            <div className="bg-white p-6 rounded-xl shadow">
              <h3 className="text-lg font-semibold text-[#335DD0FF] mb-4">
                Important to Know Before You Apply
              </h3>
              <ul className="list-disc pl-5 space-y-2 text-gray-700">
                <li>Hire Purchase limits depend on asset value & type</li>
                <li>Repayment terms aligned with cash flow & income source</li>
                <li>Insurance coverage is mandatory</li>
                <li>Insurance can be arranged through Dearo Investment</li>
                <li>Terms vary based on customer profile & asset category</li>
              </ul>
            </div>

            {/* Documents */}
            <div className="bg-white p-6 rounded-xl shadow">
              <h3 className="text-lg font-semibold text-[#335DD0FF] mb-4">
                What You'll Need to Apply
              </h3>
              <ul className="list-disc pl-5 space-y-2 text-gray-700">
                <li>NIC / Driving License / Passport</li>
                <li>Billing proof</li>
                <li>Business Registration (if applicable)</li>
                <li>Bank statements – last 3 months</li>
                <li>Additional income proof (if available)</li>
                <li>Customer selfie, vehicle & premises photos</li>
                <li>System Ledger Report (for existing facilities)</li>
              </ul>
            </div>

          </div>
        </div>
      </section>
    </main>
  );
}
