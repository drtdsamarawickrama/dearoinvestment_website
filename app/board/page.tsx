"use client";

export default function BoardMembersPage() {
  const boardMembers = [
    {
      name: "Mr. Nalin Kumara",
      title: "Regional Manager – Uva and East",
      img: "/assests/team-nalin.jpg",
      
    },
    {
      name: "Mr. Dilshan Nuwantha",
      title: "Assistant Manager – Operations",
      img: "/assests/team-dilshan-nuwantha.jpg",
      
    },
    {
      name: "Mr. Rajitha Madushanka",
      title: "Regional Manager – North Central",
      img: "/assests/team-rajitha.jpg",
      description: "",
    },
    {
      name: "Mr. Asitha Suranjith",
      title: "Manager – Investment",
      img: "/assests/team-asitha-suranjith.jpg",
      
    },
    {
      name: "Mrs. Nishadi Saumaya",
      title: "Manager – Ampara",
      img: "/assests/team-nishadi-saumaya.jpg",
      
    },
  ];

  return (
    <div className="px-6 py-10 max-w-6xl mx-auto">
      <h1 className="text-3xl font-semibold text-gray-900 mb-8">
        Dearo <span className="text-blue-900">Management</span>
      </h1>

      <div className="grid md:grid-cols-2 gap-10">
        {boardMembers.map((member, index) => (
          <div key={index} className="flex gap-6 items-center">
            {/* Profile Image */}
            <img
              src={member.img}
              alt={member.name}
              className="w-28 h-28 object-cover rounded-xl shadow-md"
            />

            {/* Name and Title */}
            <div>
              <h2 className="text-lg font-semibold text-gray-900">{member.name}</h2>
              <p className="text-sm text-gray-700">{member.title}</p>

              {/* Optional Description */}
              {member.description && (
                <p className="text-gray-700 text-sm mt-1">{member.description}</p>
              )}
            </div>
          </div>
        ))}
      </div>
    </div>
  );
}
