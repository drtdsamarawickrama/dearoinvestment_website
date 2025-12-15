export default function CustomerServiceSection() {
  const services = [
    "We offer a wide range of services specifically designed to meet the unique needs of each client. Whether you are an individual or a business, our solutions are tailored to provide maximum value, ensuring that every client receives personalized attention and support.",
    "Our experienced and dedicated team is committed to delivering high-quality services with a strong focus on innovation, efficiency, and professionalism. We continuously strive to improve our processes and adopt the latest tools and techniques to serve our clients better.",
    "Our customer service team is available around the clock, 24/7, to provide timely, reliable, and effective support. From answering questions to resolving issues quickly, we ensure that every client feels heard, valued, and supported throughout their journey with Dearo.",
  ];

  return (
    <section className="py-20 bg-gray-50">
      <div className="max-w-7xl mx-auto px-20 text-center">
        <h2 className="text-4xl font-bold mb-8 text-gray-800">Dearo Customer Service</h2>
        
        
        <div className="bg-gradient-to-l from-blue-100 to-blue-700 text-white p-10 rounded-3xl shadow-xl">
          <ul className="space-y-6 text-left">
            {services.map((service, idx) => (
              <li key={idx} className="flex items-start gap-4">
                <span className="text-white font-semibold text-4xl mt-1">•</span>
                <p className="text-black text-lg leading-relaxed">{service}</p>
              </li>
            ))}
          </ul>
        </div>
      </div>
    </section>
  );
}
