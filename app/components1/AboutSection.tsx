// app/components/AboutSection.tsx
import { Target, Eye, Workflow, Goal } from "lucide-react";

export default function AboutSection() {
  return (
    <section
      id="about"
      className="py-24 relative overflow-hidden 
                "
    >
      {/* Soft Floating Background Shapes */}
      <div className="absolute top-0 left-0 w-72 h-72 bg-green-300 opacity-20 rounded-full blur-3xl -z-10"></div>
      <div className="absolute bottom-0 right-0 w-72 h-72 bg-blue-300 opacity-20 rounded-full blur-3xl -z-10"></div>

      <div className="max-w-6xl mx-auto px-6">
        
        {/* Heading */}
        <h2 className="text-4xl md:text-5xl font-bold text-center mb-10 text-gray-900">
          About Our Company
        </h2>

        {/* Main Description */}
        <p className="text-lg text-gray-700 leading-relaxed text-center mb-16 max-w-4xl mx-auto">
          Dearo Investment Limited is a fully incorporated public company in Sri Lanka,
          registered under the Companies Act No. 07 of 2007. We are dedicated to providing
          innovative financial services and digital financial solutions that support the
          SME and MSME sectors. Our subsidiaries operate across key economic sectors
          including finance, leisure, agriculture, construction, real estate, manufacturing,
          technology, and strategic investments.
        </p>

        {/* Grid Sections */}
        <div className="grid md:grid-cols-2 lg:grid-cols-4 gap-10">

          {/* Mission */}
          <div className="p-6 bg-white shadow-lg rounded-2xl border hover:shadow-2xl transition-all duration-300">
            <div className="flex items-center gap-3 mb-4">
              <Target className="text-blue-600" />
              <h3 className="text-xl font-semibold">Our Mission</h3>
            </div>
            <p className="text-gray-700">
              Empowering customers by delivering innovative solutions and exceptional
              services while nurturing a culture of collaboration and growth.
            </p>
          </div>

          {/* Vision */}
          <div className="p-6 bg-white shadow-lg rounded-2xl border hover:shadow-2xl transition-all duration-300">
            <div className="flex items-center gap-3 mb-4">
              <Eye className="text-purple-600" />
              <h3 className="text-xl font-semibold">Our Vision</h3>
            </div>
            <p className="text-gray-700">
              To inspire progress through innovation and sustainability, creating a brighter
              financial future for individuals and businesses.
            </p>
          </div>

          {/* Goals */}
          <div className="p-6 bg-white shadow-lg rounded-2xl border hover:shadow-2xl transition-all duration-300">
            <div className="flex items-center gap-3 mb-4">
              <Goal className="text-red-600" />
              <h3 className="text-xl font-semibold">Our Goals</h3>
            </div>
            <ul className="list-disc list-inside text-gray-700 space-y-2">
              <li>Deliver high-quality financial solutions and long-term value.</li>
              <li>Drive continuous innovation across our services.</li>
              <li>Create a positive impact through sustainable growth.</li>
            </ul>
          </div>

          {/* Process */}
          <div className="p-6 bg-white shadow-lg rounded-2xl border hover:shadow-2xl transition-all duration-300">
            <div className="flex items-center gap-3 mb-4">
              <Workflow className="text-green-600" />
              <h3 className="text-xl font-semibold">Our Process</h3>
            </div>
            <ul className="list-disc list-inside text-gray-700 space-y-2">
              <li>Focus on quality, reliability, and customer satisfaction.</li>
              <li>Continuous innovation to remain competitive.</li>
              <li>Strong commitment to sustainability and responsibility.</li>
            </ul>
          </div>

        </div>
      </div>
    </section>
  );
}
