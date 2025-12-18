import ContactSection from "../components/ContactSection";




export const metadata = {
  title: "Branch Network | Dearo Investment",
};

export default function BranchNetworkPage() {
  return (
    <>
      {/* Page Heading */}
      <section className="bg-[#15203EFF] py-20 text-center">
        <h1 className="text-4xl md:text-5xl font-bold text-white">
          Branch Network
        </h1>
        <p className="mt-4 text-gray-300 max-w-2xl mx-auto">
          Find our branches across Sri Lanka and get in touch with Dearo
          Investment Limited.
        </p>
      </section>

      {/* Connected Component */}
      <ContactSection />
    </>
  );
}
