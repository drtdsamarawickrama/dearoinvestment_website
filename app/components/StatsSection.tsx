// components/StatsSection.tsx
import { Building2, Users, Wallet, Briefcase } from "lucide-react";

export default function StatsSection() {
  const stats = [
    {
      label: "Branches",
      value: "25+",
      icon: Building2,
    },
    {
      label: "Happy Clients",
      value: "25,000+",
      icon: Users,
    },
    {
      label: "Total Assets",
      value: "2 Bn+",
      icon: Wallet,
    },
    {
      label: "Work Force",
      value: "350+",
      icon: Briefcase,
    },
  ];

  return (
    <section className="py-10 bg-blue-950">
      <div className="max-w-7xl mx-auto px-6">

        {/* TITLE */}
        <h2 className="text-4xl font-bold text-center text-white mb-8">
          Impact Metrics
        </h2>

        {/* STATS */}
        <div className="flex flex-wrap justify-center gap-50">
          {stats.map((stat, idx) => {
            const Icon = stat.icon;
            return (
              <div
                key={idx}
                className="text-center flex flex-col items-center"
              >

                {/* ICON */}
                <div className="mb-4 p-4 rounded-full bg-white/10">
                  <Icon className="w-10 h-10 text-white" />
                </div>

                {/* VALUE */}
                <h3 className="text-4xl font-bold text-white">
                  {stat.value}
                </h3>

                {/* LABEL */}
                <p className="text-lg text-white mt-2">
                  {stat.label}
                </p>

              </div>
            );
          })}
        </div>

      </div>
    </section>
  );
}
