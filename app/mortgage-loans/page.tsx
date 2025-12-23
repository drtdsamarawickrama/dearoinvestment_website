export const metadata = {
  title: "Mortgage Loans",
};

import {
  Home,
  Building2,
  Briefcase,
  CreditCard,
  ShieldCheck,
  Clock,
} from "lucide-react";

export default function MortgageLoansPage() {
  return (
    <main className="pt-0">
      {/* ===== HERO SECTION ===== */}
      <section className="bg-gray-50">
        <div className="relative w-full h-[300px] md:h-[520px] overflow-hidden">
          {/* Background Image */}
          <img
            src="/assests/m.jpg"
            alt="Dearo Mortgage Loans"
            className="absolute inset-0 w-full h-full object-cover scale-105"
          />

          {/* Dark Overlay */}
          <div className="absolute inset-0 bg-black/40"></div>

          {/* Right Aligned Text */}
          <div className="relative z-10 h-full flex items-center">
            <div className="max-w-7xl mx-auto px-6 w-full ">
              <div className="max-w-xl text-left">
                <h1 className="text-3xl md:text-5xl font-bold text-white leading-tight">
                  Dearo Mortgage Loans
                </h1>
                <p className="mt-4 text-base md:text-lg text-gray-200">
                  Secure funding against your property with confidence. Dearo
                  Mortgage Loans offer reliable, long-term financing solutions
                  by leveraging the value of your residential, commercial, or
                  land assets—helping you meet major financial goals while
                  maintaining stability and peace of mind.
                </p>
              </div>
            </div>
          </div>
        </div>

        {/* ===== PAGE CONTENT ===== */}
        <div className="max-w-7xl mx-auto px-6 py-16">
          {/* Feature Grid */}
          <div className="grid md:grid-cols-3 gap-8 mb-12">

            {/* Who We Empower */}
            <div className="space-y-6">
              <div className="flex items-center gap-3">
                <Home className="w-8 h-8 text-[#335DD0FF]" />
                <span>Individuals with legally acceptable properties</span>
              </div>
              <div className="flex items-center gap-3">
                <Briefcase className="w-8 h-8 text-[#335DD0FF]" />
                <span>Entrepreneurs and business owners</span>
              </div>
              <div className="flex items-center gap-3">
                <Building2 className="w-8 h-8 text-[#335DD0FF]" />
                <span>Owners of residential, commercial, or land assets</span>
              </div>
            </div>

            {/* How You Can Use the Funds */}
            <div className="space-y-6">
              <div className="flex items-center gap-3">
                <CreditCard className="w-8 h-8 text-[#335DD0FF]" />
                <span>Business expansion & working capital</span>
              </div>
              <div className="flex items-center gap-3">
                <Building2 className="w-8 h-8 text-[#335DD0FF]" />
                <span>Property development or construction</span>
              </div>
              <div className="flex items-center gap-3">
                <Home className="w-8 h-8 text-[#335DD0FF]" />
                <span>Education, medical & major personal expenses</span>
              </div>
              <div className="flex items-center gap-3">
                <CreditCard className="w-8 h-8 text-[#335DD0FF]" />
                <span>Debt consolidation or refinancing</span>
              </div>
            </div>

            {/* Why This Product Works */}
            <div className="space-y-6 text-gray-800">
              <div className="flex justify-between items-center">
                <div>
                  <span className="text-2xl font-bold text-[#335DD0FF]">
                    Higher
                  </span>
                  <p>Loan Amounts</p>
                </div>
                <p>Based on property value</p>
              </div>

              <div className="flex justify-between items-center">
                <div>
                  <span className="text-2xl font-bold text-[#335DD0FF]">
                    Longer
                  </span>
                  <p>Tenures</p>
                </div>
                <p>Comfortable repayments</p>
              </div>

              <div className="flex justify-between items-center">
                <div>
                  <span className="text-2xl font-bold text-[#335DD0FF]">
                    Flexible
                  </span>
                  <p>Repayment</p>
                </div>
                <p>Tailored to income patterns</p>
              </div>

              <div className="flex justify-between items-center">
                <div>
                  <span className="text-2xl font-bold text-[#335DD0FF]">
                    Secure
                  </span>
                  <p>Financing</p>
                </div>
                <p>Asset-backed confidence</p>
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
                <li>Property must have clear legal ownership and title</li>
                <li>Loan value subject to professional valuation</li>
                <li>Insurance coverage on mortgaged property is mandatory</li>
                <li>Repayment tenure depends on income & property type</li>
              </ul>
            </div>

            {/* Documents */}
            <div className="bg-white p-6 rounded-xl shadow">
              <h3 className="text-lg font-semibold text-[#335DD0FF] mb-4">
                What You'll Need to Apply
              </h3>
              <ul className="list-disc pl-5 space-y-2 text-gray-700">
                <li>Completed loan application form</li>
                <li>NIC / Passport / Driving License</li>
                <li>Proof of income & bank statements</li>
                <li>Property deed & legal ownership documents</li>
                <li>Approved valuation report</li>
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
