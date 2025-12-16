export default function ContactSection() {
  return (
    <section className="py-24 bg-gradient-to-b from-blue-50 to-gray-100">
      <div className="max-w-7xl mx-auto px-6">

        {/* Title */}
        <h2 className="text-4xl md:text-5xl font-bold text-center mb-14 text-gray-900">
          Contact Us
        </h2>

        {/* Grid Layout */}
        <div className="grid md:grid-cols-3 gap-12">

          {/* LEFT: Contact Info */}
          <div className="bg-white shadow-xl p-8 rounded-2xl border border-gray-200 hover:shadow-2xl transition-all duration-300">
            <h3 className="text-2xl font-semibold mb-6 text-gray-800">
              Contact Information
            </h3>

            <p className="text-gray-700 mb-3">
              <strong>Address:</strong> 8th floor, Ceylinco House, No 69, Janadhipathi Mawatha, Colombo 01
            </p>

            <p className="text-gray-700 mb-3">
              <strong>Phone:</strong> 074 390 8274
            </p>

            <p className="text-gray-700 mb-6">
              <strong>Email:</strong> info@dearoinvestment.com
            </p>

            <div className="rounded-xl overflow-hidden shadow-md">
              <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63374.14405981386!2d79.8115564!3d6.934996699999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae2591104772201%3A0x93d8df984b6be179!2sCeylinco%20House%2C%2069%20Janadhipathi%20Mawatha%2C%20Colombo%2001!5e0!3m2!1sen!2slk!4v1707048123456"
                width="100%"
                height="350"
                style={{ border: 0 }}
                allowFullScreen
                loading="lazy"
                referrerPolicy="no-referrer-when-downgrade"
              ></iframe>
            </div>
          </div>

          {/* RIGHT: Two separate boxes */}
          <div className="md:col-span-2 flex flex-col md:flex-row gap-6">

            {/* Box 1: Message Form */}
            <div className="flex-1 bg-white shadow-xl p-8 rounded-2xl border border-gray-200 hover:shadow-2xl transition-all duration-300">
              <h3 className="text-2xl font-semibold mb-6 text-gray-800">
                Send Us a Message
              </h3>

              <form className="space-y-5">
                <input
                  type="text"
                  placeholder="Your Name"
                  className="w-full border border-gray-300 rounded-lg px-4 py-3 focus:border-blue-600 focus:ring-2 focus:ring-blue-200 transition"
                />

                <input
                  type="email"
                  placeholder="Your Email"
                  className="w-full border border-gray-300 rounded-lg px-4 py-3 focus:border-blue-600 focus:ring-2 focus:ring-blue-200 transition"
                />

                <textarea
                  rows={5}
                  placeholder="Your Message"
                  className="w-full border border-gray-300 rounded-lg px-4 py-3 focus:border-blue-600 focus:ring-2 focus:ring-blue-200 transition"
                ></textarea>

                <button
                  type="submit"
                  className="w-full bg-blue-600 text-white py-3 rounded-lg text-lg font-medium hover:bg-blue-700 transition"
                >
                  Send Message
                </button>
              </form>
            </div>

           {/* Box 2: Sri Lanka Map Image */}
<div className="flex-1 bg-white shadow-xl p-6 rounded-2xl border border-gray-200 hover:shadow-2xl transition-all duration-300 flex flex-col items-center justify-center">

  {/* Title */}
  <h3 className="text-2xl font-semibold mb-6 text-gray-800">
    Our Branches
  </h3>

  {/* Map Image */}
  <img
    src="/assests/sl.png" // replace with your map image
    alt="Sri Lanka Map"
    className="w-full h-auto rounded-lg"
  />

</div>


          </div>

        </div>
      </div>
    </section>
  );
}
