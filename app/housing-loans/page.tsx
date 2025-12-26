export const metadata = {
  title: "Housing Loans",
};

import {
  Home,
  Building2,
  Hammer,
  CreditCard,
  ShieldCheck,
  Clock,
} from "lucide-react";

export default function HousingLoansPage() {
  return (
    <main className="pt-0">
      {/* ===== HERO SECTION ===== */}
      {/* Hero Image */}
      <section className="bg-gray-50">
        <div className="w-full overflow-hidden">
          <img
            src="/assests/house.jpg"
            alt="Dearo Housing Loans"
            className="w-full h-[300px] md:h-[420px] object-cover"
          />
        </div>

        {/* Text Below Image */}
        <div className="max-w-3xl mx-auto px-6 py-8 md:py-12 text-center">
          <h1 className="text-3xl md:text-5xl font-bold text-gray-900 leading-tight">
            Dearo Housing Loans
          </h1>
          <p className="mt-4 text-base md:text-lg text-gray-700">
            Turn your dream of owning a home into reality with Dearo
            Housing Loans. We provide secure, long-term financing
            solutions to help you build, purchase, or renovate your
            home—backed by transparent terms and dependable service you
            can trust.
          </p>
        </div>

        {/* ===== PAGE CONTENT ===== */}
        <div className="max-w-7xl mx-auto px-6 py-16">
          {/* Grid */}
          <div className="grid md:grid-cols-3 gap-8 mb-12">

            {/* Who We Empower */}
            <div className="space-y-6">
              <div className="flex items-center gap-3">
                <Home className="w-8 h-8 text-[#335DD0FF]" />
                <span>Salaried individuals & families</span>
              </div>
              <div className="flex items-center gap-3">
                <Building2 className="w-8 h-8 text-[#335DD0FF]" />
                <span>Self-employed professionals</span>
              </div>
              <div className="flex items-center gap-3">
                <ShieldCheck className="w-8 h-8 text-[#335DD0FF]" />
                <span>Residential property owners</span>
              </div>
            </div>

            {/* How You Can Use the Funds */}
            <div className="space-y-6">
              <div className="flex items-center gap-3">
                <Home className="w-8 h-8 text-[#335DD0FF]" />
                <span>Purchase new or existing houses</span>
              </div>
              <div className="flex items-center gap-3">
                <Hammer className="w-8 h-8 text-[#335DD0FF]" />
                <span>House construction on owned land</span>
              </div>
              <div className="flex items-center gap-3">
                <Building2 className="w-8 h-8 text-[#335DD0FF]" />
                <span>Renovations, extensions & improvements</span>
              </div>
              <div className="flex items-center gap-3">
                <CreditCard className="w-8 h-8 text-[#335DD0FF]" />
                <span>Refinancing existing housing loans</span>
              </div>
            </div>

            {/* Why This Product Works */}
            <div className="space-y-6 text-gray-800">
              <div className="flex justify-between items-center">
                <div>
                  <span className="text-2xl font-bold text-[#335DD0FF]">
                    Longer
                  </span>
                  <p>Tenures</p>
                </div>
                <p>Lower monthly installments</p>
              </div>

              <div className="flex justify-between items-center">
                <div>
                  <span className="text-2xl font-bold text-[#335DD0FF]">
                    Aligned
                  </span>
                  <p>Loan Value</p>
                </div>
                <p>Based on income & property value</p>
              </div>

              <div className="flex justify-between items-center">
                <div>
                  <span className="text-2xl font-bold text-[#335DD0FF]">
                    Flexible
                  </span>
                  <p>Repayment</p>
                </div>
                <p>Cash-flow based structures</p>
              </div>

              <div className="flex justify-between items-center">
                <div>
                  <span className="text-2xl font-bold text-[#335DD0FF]">
                    Secure
                  </span>
                  <p>Financing</p>
                </div>
                <p>Property-backed assurance</p>
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
                <li>Property must be residential with clear ownership</li>
                <li>Loan approval subject to valuation & legal checks</li>
                <li>Property insurance is mandatory</li>
                <li>Tenure depends on age, income & loan structure</li>
              </ul>
            </div>

            {/* Documents */}
            <div className="bg-white p-6 rounded-xl shadow">
              <h3 className="text-lg font-semibold text-[#335DD0FF] mb-4">
                What You'll Need to Apply
              </h3>
              <ul className="list-disc pl-5 space-y-2 text-gray-700">
                <li>Completed housing loan application form</li>
                <li>NIC / Passport / Driving License</li>
                <li>Proof of income & recent bank statements</li>
                <li>Property deeds & ownership documents</li>
                <li>Approved valuation report</li>
                <li>Building plans (if applicable)</li>
                <li>Address verification documents</li>
                <li>Insurance documents (if available)</li>
              </ul>
            </div>

          </div>
        </div>
      </section>
    </main>
  );
}
