// components/StatsSection.tsx
export default function StatsSection() {
  const stats = [
    {
      label: "Branches",
      value: "44+",
      icon: "/assests/icons/branch.png",
    },
    {
      label: "Happy Clients",
      value: "25000+",
      icon: "/assests/icons/clients.png",
    },
    {
      label: "Total Assets",
      value: "2 Bn+",
      icon: "/assests/icons/assets.png",
    },
    {
      label: "Work Force",
      value: "350+",
      icon: "/assests/icons/workforce.png",
    },
  ];

  return (
    <section className="py-20 bg-blue-950">
      <div className="max-w-7xl mx-auto px-20">

        {/* TITLE */}
        <h2 className="text-4xl font-bold text-center text-white mb-12">
          Impact Metrics
        </h2>

        {/* STATS */}
        <div className="flex flex-wrap justify-center gap-20">
          {stats.map((stat, idx) => (
            <div key={idx} className="text-center flex flex-col items-center">

              {/* ICON */}
              <img
                src={stat.icon}
                alt={stat.label}
                className="w-12 h-12 mb-4"
              />

              {/* VALUE */}
              <h3 className="text-4xl font-bold text-white">
                {stat.value}
              </h3>

              {/* LABEL */}
              <p className="text-lg text-white mt-2">
                {stat.label}
              </p>

            </div>
          ))}
        </div>

      </div>
    </section>
  );
}
