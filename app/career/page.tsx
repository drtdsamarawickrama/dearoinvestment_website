export const metadata = {
  title: "Dearo Career",
};

export default function CareerPage() {
  return (
    <main className="w-full">
      {/* Full-width image with reduced height and text overlay */}
      <div className="relative w-full h-64 md:h-80 lg:h-96">
        <img
          src="/assests/career.jpg"
          alt="Dearo Career Banner"
          className="w-full h-full object-cover"
        />
        {/* Overlay text */}
        <div className="absolute inset-0 flex flex-col justify-center items-center text-center px-4">
          <h1 className="text-3xl md:text-4xl font-bold text-white drop-shadow-lg mb-2">
            Join Our Team
          </h1>
          <p className="text-white text-base md:text-lg drop-shadow-md max-w-2xl">
            Explore exciting career opportunities at Dearo Investment. We are looking for talented and motivated individuals to grow with us.
          </p>
        </div>
      </div>

      {/* Job listings */}
      <div className="max-w-6xl mx-auto p-6">
        {/* New title */}
        <h2 className="text-2xl font-bold text-blue-900 mb-6 text-center">
          Current Job Openings
        </h2>

        <div className="space-y-8">
          {/* Software Developer Card */}
          <div className="relative p-6 border rounded-xl shadow hover:shadow-lg transition">
            <h3 className="text-xl font-bold mb-2">Software Developer</h3>
            <p className="text-gray-700 mb-2">Location: Colombo | Full-time</p>
            <p className="text-gray-600 mb-4">
              Join our IT team to build innovative financial solutions for our clients.
            </p>
            <button className="absolute top-6 right-6 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
              Apply Now
            </button>
          </div>

          {/* Marketing Executive Card */}
          <div className="relative p-6 border rounded-xl shadow hover:shadow-lg transition">
            <h3 className="text-xl font-bold mb-2">Marketing Executive</h3>
            <p className="text-gray-700 mb-2">Location: Colombo | Full-time</p>
            <p className="text-gray-600 mb-4">
              Help us expand our brand presence and connect with our valued customers.
            </p>
            <button className="absolute top-6 right-6 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
              Apply Now
            </button>
          </div>
        </div>
      </div>
    </main>
  );
}
