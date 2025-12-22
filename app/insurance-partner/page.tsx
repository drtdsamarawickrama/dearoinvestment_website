import Image from "next/image";

export const metadata = {
  title: "Financial & Insurance Partners | Dearo Investment Limited",
};

export default function InsurancePartnerPage() {
  return (
    <div className="max-w-7xl mx-auto px-4 py-20 space-y-16">

      {/* PAGE HEADER */}
      <div className="text-center max-w-3xl mx-auto">
        <h1 className="text-4xl md:text-5xl font-bold mb-6 text-gray-900">
          Financial & Insurance Partners
        </h1>
        <p className="text-gray-700 text-lg leading-relaxed">
          At Dearo Investment Limited, we work closely with Sri Lanka’s leading
          banks and insurance providers to ensure financial strength,
          operational transparency, and comprehensive risk protection.
        </p>
      </div>

      {/* FIRST ROW: BOC, HNB (center), HNB Assurance */}
      <div className="grid md:grid-cols-3 gap-10 justify-items-center">

        {/* BOC */}
        <div className="bg-white rounded-2xl shadow-lg p-8 flex flex-col items-center text-center max-w-xs">
          <Image
            src="/assests/BOC.jpg"
            alt="boc"
            width={200}
            height={200}
            className="object-contain mb-4"
          />
          <h3 className="text-2xl font-semibold text-gray-900">
            Bank of Ceylon (BOC)
          </h3>
          <p className="text-blue-600 font-medium mb-3">
            Banking & Treasury Partner
          </p>
          <p className="text-gray-700 leading-relaxed">
            Bank of Ceylon supports Dearo’s core banking operations and treasury
            functions, providing secure fund management, transaction processing,
            and regulatory-aligned banking services.
          </p>
        </div>

        {/* HNB - CENTER */}
        <div className="bg-white rounded-2xl shadow-lg p-8 flex flex-col items-center text-center max-w-xs">
          <Image
            src="/assests/hnb.jpg"
            alt="Hatton National Bank Logo"
            width={200}
            height={200}
            className="object-contain mb-4"
          />
          <h3 className="text-2xl font-semibold text-gray-900">
            Hatton National Bank (HNB)
          </h3>
          <p className="text-blue-600 font-medium mb-3">
            Primary Banking Partner
          </p>
          <p className="text-gray-700 leading-relaxed">
            HNB delivers trusted banking, fund management, and payment solutions
            supporting Dearo’s transparent operations and growth.
          </p>
        </div>

        {/* HNB Assurance */}
        <div className="bg-white rounded-2xl shadow-lg p-8 flex flex-col items-center text-center max-w-xs">
          <Image
            src="/assests/hnbA.jpg"
            alt="HNB Assurance Logo"
            width={150}
            height={150}
            className="object-contain mb-4"
          />
          <h3 className="text-2xl font-semibold text-gray-900">
            HNB Assurance
          </h3>
          <p className="text-blue-600 font-medium mb-3">
            Insurance Risk Protection Partner
          </p>
          <p className="text-gray-700 leading-relaxed">
            HNB Assurance provides structured insurance coverage across Dearo’s
            lending activities, mitigating credit and operational risks.
          </p>
        </div>
      </div>

      {/* SECOND ROW: Ceylinco & People Insurance centered */}
      <div className="grid md:grid-cols-2 gap-10 justify-items-center">

        {/* Ceylinco Insurance */}
        <div className="bg-white rounded-2xl shadow-lg p-8 flex flex-col items-center text-center max-w-xs">
          <Image
            src="/assests/ceylinco.jpg"
            alt="Ceylinco Insurance Logo"
            width={90}
            height={90}
            className="object-contain mb-4"
          />
          <h3 className="text-2xl font-semibold text-gray-900">
            Ceylinco Insurance
          </h3>
          <p className="text-blue-600 font-medium mb-3">
            Loan & Asset Insurance Partner
          </p>
          <p className="text-gray-700 leading-relaxed">
            Ceylinco Insurance ensures protection for insured loan portfolios
            through customized insurance solutions.
          </p>
        </div>

        {/* Peoples Insurance */}
        <div className="bg-white rounded-2xl shadow-lg p-8 flex flex-col items-center text-center max-w-xs">
          <Image
            src="/assests/people.jpg"
            alt="People’s Insurance Logo"
            width={100}
            height={100}
            className="object-contain mb-4"
          />
          <h3 className="text-2xl font-semibold text-gray-900">
            People’s Insurance
          </h3>
          <p className="text-blue-600 font-medium mb-3">
            Portfolio Risk Coverage Partner
          </p>
          <p className="text-gray-700 leading-relaxed">
            Enhances portfolio security with additional credit and asset
            protection across lending operations.
          </p>
        </div>

      </div>

      {/* TRUST SECTION */}
      <div className="bg-blue-50 rounded-3xl p-10 text-center">
        <h2 className="text-3xl font-bold mb-6 text-gray-900">
          Strengthening Trust Through Partnerships
        </h2>
        <ul className="grid md:grid-cols-2 gap-4 max-w-3xl mx-auto text-left font-medium text-gray-800">
          <li>✔ Secure fund management</li>
          <li>✔ Comprehensive risk mitigation</li>
          <li>✔ Regulatory compliance</li>
          <li>✔ Sustainable investor returns</li>
        </ul>
      </div>

    </div>
  );
}
