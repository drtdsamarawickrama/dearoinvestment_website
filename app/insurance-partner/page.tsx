import Image from "next/image";

export const metadata = {
  title: "Financial & Insurance Partners | Dearo Investment Limited",
};

export default function PartnersPage() {
  return (
    <div className="max-w-7xl mx-auto px-4 py-20 space-y-24">

      {/* PAGE HEADER */}
      
      {/* FINANCIAL PARTNERS SECTION */}
      <section className="space-y-12">
        <div className="text-center mb-10">
          <h2 className="text-4xl font-bold text-gray-900 mb-4">
            Financial Partners
          </h2>
          <p className="text-gray-700 max-w-2xl mx-auto">
            Our banking partners provide secure fund management, seamless transactions, and strategic financial support to drive our growth and operations.
          </p>
        </div>

        <div className="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-10 justify-items-center">
          {/* BOC */}
          <div className="bg-white rounded-3xl shadow-lg p-8 flex flex-col items-center text-center transition-transform hover:-translate-y-2 hover:shadow-2xl max-w-xs">
            <Image src="/assests/BOC.jpg" alt="BOC" width={180} height={180} className="object-contain mb-4" />
            <h3 className="text-2xl font-semibold text-gray-900">Bank of Ceylon (BOC)</h3>
            <p className="text-blue-600 font-medium mb-3">Banking & Treasury Partner</p>
            <p className="text-gray-700 leading-relaxed">
              BOC supports our treasury operations and ensures secure banking services aligned with regulatory standards.
            </p>
          </div>

          {/* HNB */}
          <div className="bg-white rounded-3xl shadow-lg p-8 flex flex-col items-center text-center transition-transform hover:-translate-y-2 hover:shadow-2xl max-w-xs">
            <Image src="/assests/hnb.jpg" alt="HNB" width={180} height={180} className="object-contain mb-4" />
            <h3 className="text-2xl font-semibold text-gray-900">Hatton National Bank (HNB)</h3>
            <p className="text-blue-600 font-medium mb-3">Primary Banking Partner</p>
            <p className="text-gray-700 leading-relaxed">
              HNB provides trusted financial solutions and transaction support, enabling transparency and growth.
            </p>
          </div>

          {/* Seylan Bank */}
          <div className="bg-white rounded-3xl shadow-lg p-8 flex flex-col items-center text-center transition-transform hover:-translate-y-2 hover:shadow-2xl max-w-xs">
            <Image src="/assests/seylan.jpg" alt="Seylan Bank" width={180} height={180} className="object-contain mb-4" />
            <h3 className="text-2xl font-semibold text-gray-900">Seylan Bank</h3>
            <p className="text-blue-600 font-medium mb-3">Banking Partner</p>
            <p className="text-gray-700 leading-relaxed">
              Seylan Bank supports our core banking operations, providing robust and reliable financial services.
            </p>
          </div>
        </div>
      </section>

      {/* INSURANCE PARTNERS SECTION */}
      <section className="space-y-12">
        <div className="text-center mb-10">
          <h2 className="text-4xl font-bold text-gray-900 mb-4">
            Insurance Partners
          </h2>
          <p className="text-gray-700 max-w-2xl mx-auto">
            Our insurance partners provide comprehensive risk coverage, protecting our loans, assets, and operations with innovative solutions.
          </p>
        </div>

        <div className="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-10 justify-items-center">
          {/* HNB Assurance */}
          <div className="bg-white rounded-3xl shadow-lg p-8 flex flex-col items-center text-center transition-transform hover:-translate-y-2 hover:shadow-2xl max-w-xs">
            <Image src="/assests/hnbA.jpg" alt="HNB Assurance" width={150} height={150} className="object-contain mb-4" />
            <h3 className="text-2xl font-semibold text-gray-900">HNB Assurance</h3>
            <p className="text-blue-600 font-medium mb-3">Insurance Risk Protection Partner</p>
            <p className="text-gray-700 leading-relaxed">
              Provides structured insurance coverage mitigating operational and credit risks across our lending activities.
            </p>
          </div>

          {/* People’s Insurance */}
          <div className="bg-white rounded-3xl shadow-lg p-8 flex flex-col items-center text-center transition-transform hover:-translate-y-2 hover:shadow-2xl max-w-xs">
            <Image src="/assests/people.jpg" alt="People’s Insurance" width={120} height={120} className="object-contain mb-4" />
            <h3 className="text-2xl font-semibold text-gray-900">People’s Insurance</h3>
            <p className="text-blue-600 font-medium mb-3">Portfolio Risk Coverage Partner</p>
            <p className="text-gray-700 leading-relaxed">
              Enhances portfolio security with additional credit and asset protection.
            </p>
          </div>

          {/* Janashakthi Insurance */}
          <div className="bg-white rounded-3xl shadow-lg p-8 flex flex-col items-center text-center transition-transform hover:-translate-y-2 hover:shadow-2xl max-w-xs">
            <Image src="/assests/janashakthi.jpg" alt="Janashakthi Insurance" width={140} height={140} className="object-contain mb-4" />
            <h3 className="text-2xl font-semibold text-gray-900">Janashakthi Insurance</h3>
            <p className="text-blue-600 font-medium mb-3">Life & General Insurance Partner</p>
            <p className="text-gray-700 leading-relaxed">
              Provides life and general insurance solutions supporting long-term financial stability.
            </p>
          </div>
        </div>
      </section>

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
