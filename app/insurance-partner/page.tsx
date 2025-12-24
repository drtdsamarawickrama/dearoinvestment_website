import Image from "next/image";

export const metadata = {
  title: "Financial & Insurance Partners | Dearo Investment Limited",
};

/* ================= TYPES ================= */
interface PartnerCardProps {
  image: string;
  alt: string;
  title: string;
  role: string;
  description: string;
}

/* ================= CARD COMPONENT ================= */
function PartnerCard({
  image,
  alt,
  title,
  role,
  description,
}: PartnerCardProps) {
  return (
    <div
      className="bg-white rounded-3xl shadow-lg p-8 flex flex-col items-center text-center
                 transition-all hover:-translate-y-2 hover:shadow-2xl
                 max-w-xs w-full h-full"
    >
      {/* IMAGE AREA – FIXED HEIGHT */}
      <div className="relative w-full h-[120px] mb-6 flex items-center justify-center">
        <Image
          src={image}
          alt={alt}
          fill
          sizes="200px"
          className="object-contain"
        />
      </div>

      {/* CONTENT AREA */}
      <div className="flex flex-col flex-1">
        <h3 className="text-2xl font-semibold text-gray-900 mb-2">
          {title}
        </h3>

        <p className="text-blue-600 font-medium mb-3">
          {role}
        </p>

        <p className="text-gray-700 leading-relaxed mt-auto">
          {description}
        </p>
      </div>
    </div>
  );
}

/* ================= PAGE ================= */
export default function PartnersPage() {
  return (
    <div className="max-w-7xl mx-auto px-4 py-20 space-y-24">

      {/* FINANCIAL PARTNERS */}
      <section className="space-y-12">
        <div className="text-center max-w-2xl mx-auto">
          <h2 className="text-4xl font-bold text-gray-900 mb-4">
            Financial Partners
          </h2>
          <p className="text-gray-700">
            Our banking partners provide secure fund management, seamless
            transactions, and strategic financial support.
          </p>
        </div>

        <div className="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-10 items-stretch justify-items-center">
          <PartnerCard
            image="/assests/boci.png"
            alt="Bank of Ceylon"
            title="Bank of Ceylon (BOC)"
            role="Banking & Treasury Partner"
            description="BOC supports our treasury operations and ensures secure banking services aligned with regulatory standards."
          />

          <PartnerCard
            image="/assests/hnb.png"
            alt="Hatton National Bank"
            title="Hatton National Bank (HNB)"
            role="Primary Banking Partner"
            description="HNB provides trusted financial solutions and transaction support, enabling transparency and sustainable growth."
          />

          <PartnerCard
            image="/assests/selan.png"
            alt="Seylan Bank"
            title="Seylan Bank"
            role="Banking Partner"
            description="Seylan Bank supports our core banking operations with reliable and efficient financial services."
          />
        </div>
      </section>

      {/* INSURANCE PARTNERS */}
      <section className="space-y-12">
        <div className="text-center max-w-2xl mx-auto">
          <h2 className="text-4xl font-bold text-gray-900 mb-4">
            Insurance Partners
          </h2>
          <p className="text-gray-700">
            Our insurance partners provide comprehensive risk coverage and
            protection.
          </p>
        </div>

        <div className="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-10 items-stretch justify-items-center">
          <PartnerCard
            image="/assests/hnbA.jpg"
            alt="HNB Assurance"
            title="HNB Assurance"
            role="Insurance Risk Protection Partner"
            description="Provides structured insurance coverage mitigating operational and credit risks."
          />

          <PartnerCard
            image="/assests/people.jpg"
            alt="People’s Insurance"
            title="People’s Insurance"
            role="Portfolio Risk Coverage Partner"
            description="Enhances portfolio security with additional credit and asset protection."
          />

          <PartnerCard
            image="/assests/janashakthi.webp"
            alt="Janashakthi Insurance"
            title="Janashakthi Insurance"
            role="Life & General Insurance Partner"
            description="Provides life and general insurance solutions supporting long-term stability."
          />
        </div>
      </section>

      {/* TRUST SECTION */}
      <section className="bg-blue-50 rounded-3xl p-10 text-center">
        <h2 className="text-3xl font-bold mb-6 text-gray-900">
          Strengthening Trust Through Partnerships
        </h2>

        <ul className="grid md:grid-cols-2 gap-4 max-w-3xl mx-auto text-left font-medium text-gray-800">
          <li>✔ Secure fund management</li>
          <li>✔ Comprehensive risk mitigation</li>
          <li>✔ Regulatory compliance</li>
          <li>✔ Sustainable investor returns</li>
        </ul>
      </section>

    </div>
  );
}
