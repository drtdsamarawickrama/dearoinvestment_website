"use client";

export default function BoardMembersPage() {
  const boardMembers = [
    {
      name: "Mr. Asitha Suranjith",
      title: "Head Of Investment and Treasury",
      img: "/assests/management/team-asitha-suranjith.jpg",
      
    },{
      name: "Mr. Deepal Piris",
      title: "Head Of Finance ",
      img: "/assests/management/deepal.jpeg",
      
    },{
      name: "Mrs. D.M.N.N Dassanayaka",
      title: "Head Of HR  ",
      img: "/assests/management/D.M.N.N Dassanayaka.jpeg",
      
    },{
      name: "Mr. Nalin Kumara",
      title: "Chief Manager – Branch Operations",
      img: "/assests/management/team-nalin.jpg",
      
    },
    {
      name: "Mr. Dilshan Nuwantha",
      title: "Senior Manager – Branch Development",
      img: "/assests/management/team-dilshan-nuwantha.jpg",
      
    }, {
      name: "Mrs. Nishadi Saumaya",
      title: "Senior Manager – Region 01",
      img: "/assests/management/team-nishadi-saumaya.jpg",
      
    }, {
      name: "Mrs. Rex",
      title: "Senior Manager – Region 01",
      img: "/assests/management/A Rex Senior Manager.jpeg",
      
    },{
      name: "Mr. Sumith Weerawardene",
      title: "Zonal Manager ",
      img: "/assests/management/sumith.jpeg",
      
    },{
      name: "Mr. Mahesh Gunarathna ",
      title: "Manager Audit ",
      img: "/assests/management/Mahesh Gunarathna Manager Audit.jpeg",
      
    },{
      name: "Mr. Mohomed Nifri",
      title: "Manager Branch Operation and Development ",
      img: "/assests/management/M.A.M Nifri Manager Branch Operation & Development.jpeg",
      
    },
    {
      name: "Mr. Rajitha Madushanka",
      title: "Chief Manager Asset Lending – Leasing",
      img: "/assests/management/team-rajitha.jpg",
      description: "",
    },
    
   {
      name: "Mr. Chathura Ubesekara ",
      title: "Senior Manager Down South Region",
      img: "/assests/management/chathura.jpeg",
      
    },{
      name: "Mrs. Vakeeshvary ",
      title: "Branch Manager – Chenkalady",
      img: "/assests/management/Vakeeshvary Branch Manager Chenkalady.jpeg",
      
    },{
      name: "Mr. Sockalingam Priyatharshan",
      title: " Branch Manager – Batticaloa",
      img: "/assests/management/Sockalingam Priyatharshan Branch Manager.jpeg",
      
    },{
      name: "Mr. Harsha Priyankara",
      title: "Branch Manager – Mahiyanganaya",
      img: "/assests/management/harsha.jpeg",
      
    },{
      name: "Mr. Iresh Udayanga",
      title: "Branch Manager – Polonnaruwa",
      img: "/assests/management/iresh.jpeg",
      
    }
  ];

  return (
    <div className="px-6 py-10 max-w-6xl mx-auto">
      <h1 className="text-3xl font-semibold text-gray-900 mb-8">
        Dearo <span className="text-blue-900">Management</span>
      </h1>

      <div className="grid md:grid-cols-3 gap-10">
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
