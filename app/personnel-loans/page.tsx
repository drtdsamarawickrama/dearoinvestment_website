"use client";

import {
  Home,
  Users,
  Award,
  Activity,
  Building,
  CreditCard,
  UserCheck,
} from "lucide-react";

export default function CommunityLoanPage() {
  return (
    <main className="pt-0">
      {/* ===== HERO SECTION ===== */}
      <section className="bg-gray-50">
        <div className="relative w-full h-[300px] md:h-[420px] overflow-hidden">
          {/* Background Image */}
          <img
            src="/assests/personal.jpg"
            alt="Dearo Personal Loans"
            className="absolute inset-0 w-full h-full object-cover scale-105"
          />

          {/* Dark Overlay */}
          <div className="absolute inset-0 bg-black/40"></div>

          {/* Left Aligned Text */}
          <div className="relative z-10 h-full flex items-center">
            <div className="max-w-7xl mx-auto px-6 w-full">
              <div className="max-w-xl text-left">
                <h1 className="text-3xl md:text-5xl font-bold text-white leading-tight">
                  Dearo Personal Loans
                </h1>
                <p className="mt-4 text-base md:text-lg text-gray-200">
                  Fulfill your dreams and manage your financial needs effortlessly
                  with a Personal Loan from Dearo Investment. Whether it’s for
                  education, home improvements, or personal milestones, we make it
                  easy to access funds when you need them.
                </p>
              </div>
            </div>
          </div>
        </div>

        {/* ===== PAGE CONTENT ===== */}
        <div className="max-w-7xl mx-auto px-6 py-16">
          {/* Features Grid */}
          <div className="grid md:grid-cols-3 gap-8 mb-12">
            {/* How You Can Use the Funds */}
            <div className="space-y-6">
              <div className="flex items-center gap-3">
                <Home className="w-8 h-8 text-[#335DD0FF]" />
                <span>Home improvements and renovations</span>
              </div>
              <div className="flex items-center gap-3">
                <Users className="w-8 h-8 text-[#335DD0FF]" />
                <span>Education and professional development</span>
              </div>
              <div className="flex items-center gap-3">
                <Activity className="w-8 h-8 text-[#335DD0FF]" />
                <span>Major life events or personal milestones</span>
              </div>
              <div className="flex items-center gap-3">
                <Award className="w-8 h-8 text-[#335DD0FF]" />
                <span>Other personal needs requiring immediate funds</span>
              </div>
            </div>

            {/* Why This Product Works for You */}
            <div className="space-y-6">
              <div className="flex items-center gap-3">
                <CreditCard className="w-8 h-8 text-[#335DD0FF]" />
                <span>Flexible repayment options (EMI or Reducing Balance)</span>
              </div>
              <div className="flex items-center gap-3">
                <Users className="w-8 h-8 text-[#335DD0FF]" />
                <span>Quick processing with efficient fund delivery</span>
              </div>
              <div className="flex items-center gap-3">
                <Building className="w-8 h-8 text-[#335DD0FF]" />
                <span>Responsible lending aligned with income plans</span>
              </div>
              <div className="flex items-center gap-3">
                <UserCheck className="w-8 h-8 text-[#335DD0FF]" />
                <span>Loan tenure structured before retirement</span>
              </div>
            </div>

            {/* Key Loan Conditions */}
            <div className="space-y-6 text-gray-800">
              <div className="flex justify-between items-center">
                <div>
                  <span className="text-2xl font-bold text-[#335DD0FF]">
                    Rs 75,000/-
                  </span>
                  <p>Minimum Monthly Income</p>
                </div>
                <p>Eligibility requirement</p>
              </div>

              <div className="flex justify-between items-center">
                <div>
                  <span className="text-2xl font-bold text-[#335DD0FF]">
                    5 Years
                  </span>
                  <p>Maximum Tenure</p>
                </div>
                <p>Depends on age & service</p>
              </div>

              <div className="flex justify-between items-center">
                <div>
                  <span className="text-2xl font-bold text-[#335DD0FF]">
                    Mandatory
                  </span>
                  <p>Salary Routing</p>
                </div>
                <p>Commercial Bank account</p>
              </div>

              <div className="flex justify-between items-center">
                <div>
                  <span className="text-2xl font-bold text-[#335DD0FF]">
                    Required
                  </span>
                  <p>Retirement Clearance</p>
                </div>
                <p>Loan must settle before retirement</p>
              </div>
            </div>
          </div>

          {/* Info Section */}
          <div className="grid md:grid-cols-2 gap-8">
            {/* Important to Know */}
            <div className="bg-white p-6 rounded-xl shadow">
              <h3 className="text-lg font-semibold text-[#335DD0FF] mb-4">
                Important to Know Before You Apply
              </h3>
              <ul className="list-disc pl-5 space-y-2 text-gray-700">
                <li>Minimum monthly income: Rs 150,000/-</li>
                <li>Loan must be fully repaid before retirement</li>
                <li>Maximum repayment period: 5 years</li>
                <li>Salary must be credited to a Commercial Bank account</li>
              </ul>
            </div>

            {/* Documents */}
            <div className="bg-white p-6 rounded-xl shadow">
              <h3 className="text-lg font-semibold text-[#335DD0FF] mb-4">
                What You'll Need to Apply
              </h3>
              <ul className="list-disc pl-5 space-y-2 text-gray-700">
                <li>Completed loan application form</li>
                <li>Employer letter (employment, salary & deductions)</li>
                <li>Bank statements – past 6 months</li>
                <li>Salary slips – past 3 months</li>
                <li>NIC / Passport / Driving License</li>
                <li>Address verification documents</li>
                <li>Guarantor documents (if applicable)</li>
                <li>Educational or professional certificates (if available)</li>
              </ul>
            </div>
          </div>
        </div>
      </section>
    </main>
  );
}
