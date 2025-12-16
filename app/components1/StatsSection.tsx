// components/StatsSection.tsx
export default function StatsSection() {
  const stats = [
    { label: 'Branches', value: '44+' },
    { label: 'Happy Clients', value: '25000+' },
    { label: 'Total Assets', value: '2 Bn+' },
    { label: 'Work Force', value: '350+' },
  ];

  return (
    <section className="py-16 bg-blue-950 ">
      <div className="max-w-7xl mx-auto px-20 flex justify-center gap-30">
        {stats.map((stat, idx) => (
          <div key={idx} className="text-center">
            <h3 className="text-4xl font-bold text-white">{stat.value}</h3>
            <p className="text-lg text-white mt-2">{stat.label}</p>
          </div>
        ))}
      </div>
    </section>
  );
}
