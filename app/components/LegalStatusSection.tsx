export default function LegalStatusSection() {
  return (
    <section className="py-16 sm:py-20 bg-gray-50">
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-20">
        <div className="flex flex-col md:flex-row items-center gap-8 md:gap-10">
          {/* Image */}
          <div className="w-full md:w-1/2">
            <img
              src="/assests/legal1.jpg"
              alt="Legal Status"
              className="w-full h-auto rounded-2xl shadow-lg object-cover"
            />
          </div>

          {/* Text Content */}
          <div className="w-full md:w-1/2 bg-white p-6 sm:p-8 rounded-2xl shadow-lg">
            <p className="text-gray-700 leading-relaxed mb-4 text-base sm:text-lg">
              <span className="font-semibold">
                Company duly incorporated in the Democratic Socialist Republic of Sri Lanka and registered under the Companies Act no 07 of 2007 as a public limited company.
              </span>
            </p>

            <p className="text-gray-700 leading-relaxed text-base sm:text-lg">
              We are a registered Loans and Hire Purchase Company with the Act No 29 of 1982 Consumer Credit, Law of Contract, Registration of Documents Act 2022 No. 32 (as amended), Debt Recovery Act, Mortgage Act, Bills of Exchange Ordinance Act, and Stamp Duty Act.
            </p>
          </div>
        </div>
      </div>
    </section>
  );
}
