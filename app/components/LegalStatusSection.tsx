export default function LegalStatusSection() {
  return (
    <section className="py-16 sm:py-24 bg-gray-50">
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-20">
        <div className="grid grid-cols-1 md:grid-cols-2 gap-10 items-center">

          {/* Image */}
          <div className="relative">
            <img
              src="/assests/legal1.jpg"
              alt="Legal Status"
              className="w-full h-full rounded-2xl object-cover shadow-xl"
            />
            {/* Accent Overlay */}
            <div className="absolute inset-0 rounded-2xl ring-1 ring-black/5" />
          </div>

          {/* Content */}
          <div className="bg-white rounded-2xl shadow-xl p-6 sm:p-10">
            
            {/* Section Title */}
            <div className="mb-6">
              <span className="inline-block text-sm font-semibold text-blue-600 uppercase tracking-wide mb-2">
                Legal & Compliance
              </span>
              <h2 className="text-3xl sm:text-4xl font-bold text-gray-900 leading-tight">
                Legal Status
              </h2>
              <div className="mt-3 h-1 w-16 bg-blue-600 rounded-full" />
            </div>

            {/* Text */}
            <p className="text-gray-700 leading-relaxed mb-5 text-base sm:text-lg">
              <span className="font-semibold text-gray-900">
                Company duly incorporated in the Democratic Socialist Republic of Sri Lanka
              </span>{" "}
              and registered under the Companies Act No. 07 of 2007 as a Public Limited Company.
            </p>

            <p className="text-gray-700 leading-relaxed text-base sm:text-lg">
              We are a registered Loans and Hire Purchase Company operating under the Consumer Credit Act No. 29 of 1982, Law of Contract, Registration of Documents Act No. 32 of 2022 (as amended), Debt Recovery Act, Mortgage Act, Bills of Exchange Ordinance, and Stamp Duty Act.
            </p>
          </div>
        </div>
      </div>
    </section>
  );
}
