export const metadata = {
  title: "Dearo Corporate Management",
};

export default function ManagementPage() {
  const management = [
    {
      name: "Mr. Prasanna Sanjeewa Ranasinghe",
      title: "Excicutive Director / Chief Executive Officer",
      img: "/assests/team-prasanna.jpg",
    },
    {
      name: "Mr. Niranjan Warnasooriya",
      title: "Non Board Director / Deputy Chief Executive Officer",
      img: "/assests/team-niranjan-warnasooriya.jpg",
    },
    {
      name: "Mr. Upul Edirisooriya",
      title: "Non Independent Executive Director",
      img: "/assests/team-upul.jpg",
    },
    {
      name: "Mr. Prabash Gunarathne",
      title: "Non Independent Executive Director / Operations",
      img: "/assests/team-prabhash.jpg",
    },
    {
      name: "Mr. Arun Kumar",
      title: "Non Independent Executive Director",
      img: "/assests/",
    },  {
      name: "Mr. Tharindu Dananjaya",
      title: "Non Board Director/ Chief Information Officer",
      img: "/assests/team-tharindu.jpg",
    },
  ];

  return (
    <>
      {/* 🔹 HERO IMAGE */}
      <div className="relative w-full h-[300px] md:h-[420px]">
        <img
          src="/assests/room.jpg"
          alt="Board of Directors"
          className="w-full h-full object-cover"
        />
        <div className="absolute inset-0 bg-black/60 flex flex-col items-center justify-center text-center px-4">
          <h1 className="text-3xl md:text-4xl font-bold text-white mb-3">
            Board of Directors
          </h1>
          <p className="text-gray-200 max-w-2xl">
            Guided by vision and innovation, our leaders have played a key role in
            driving Dearo Investment’s growth and success.
          </p>
        </div>
      </div>

      {/* 🔹 MEMBERS SECTION */}
      <main className="max-w-6xl mx-auto p-6 mt-14 space-y-16">

        {/* 🔹 FIRST ROW – 3 MEMBERS */}
        <div className="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-10">
          {management.slice(0, 3).map((person) => (
            <div
              key={person.name}
              className="flex flex-col items-center text-center"
            >
              <img
                src={person.img}
                alt={person.name}
                className="w-40 h-40 md:w-48 md:h-48 object-cover rounded-xl shadow-md hover:scale-105 transition-transform duration-300"
              />
              <h2 className="mt-4 text-xl font-bold text-gray-800">
                {person.name}
              </h2>
              <p className="text-gray-600 font-medium">
                {person.title}
              </p>
            </div>
          ))}
        </div>

        {/* 🔹 SECOND ROW – 2 MEMBERS CENTERED */}
        <div className="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-10 ">
          {management.slice(3,6).map((person) => (
            <div
              key={person.name}
              className="flex flex-col items-center text-center"
            >
              <img
                src={person.img}
                alt={person.name}
                className="w-40 h-40 md:w-48 md:h-48 object-cover rounded-xl shadow-md hover:scale-105 transition-transform duration-300"
              />
              <h2 className="mt-4 text-xl font-bold text-gray-800">
                {person.name}
              </h2>
              <p className="text-gray-600 font-medium">
                {person.title}
              </p>
            </div>
          ))}
        </div>

      </main>
    </>
  );
}
