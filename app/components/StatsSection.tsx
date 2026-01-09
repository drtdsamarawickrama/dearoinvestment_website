"use client";

import { Building2, Users, Wallet, Briefcase } from "lucide-react";
import {
  motion,
  Variants,
  useInView,
  useMotionValue,
  useTransform,
  animate,
} from "framer-motion";
import { useEffect, useRef, useState } from "react";

/* ---------------- Animations ---------------- */
const container: Variants = {
  hidden: {},
  show: {
    transition: { staggerChildren: 0.15 },
  },
};

const item: Variants = {
  hidden: { opacity: 0, y: 18 },
  show: {
    opacity: 1,
    y: 0,
    transition: {
      duration: 0.8,
      ease: [0.16, 1, 0.3, 1],
    },
  },
};

/* ---------- Scroll Count (Responsive) ---------- */
function CountUpOnView({
  value,
  suffix = "",
}: {
  value: number;
  suffix?: string;
}) {
  const ref = useRef<HTMLSpanElement>(null);
  const isInView = useInView(ref, { once: true, margin: "-60px" });

  const motionValue = useMotionValue(0);
  const rounded = useTransform(motionValue, (latest) =>
    Math.floor(latest).toLocaleString()
  );

  // Detect mobile vs desktop
  const [isMobile, setIsMobile] = useState(false);

  useEffect(() => {
    setIsMobile(window.innerWidth < 768);
  }, []);

  useEffect(() => {
    if (!isInView) return;

    const controls = animate(motionValue, value, {
      duration: isMobile ? 2.6 : 2, // 📱 slower, 🖥 faster
      ease: [0.16, 1, 0.3, 1],
    });

    return controls.stop;
  }, [isInView, value, isMobile, motionValue]);

  return (
    <span ref={ref}>
      <motion.span>{rounded}</motion.span>
      {suffix}
    </span>
  );
}

export default function StatsSection() {
  const stats = [
    { label: "Branches", value: 25, suffix: "+", icon: Building2 },
    { label: "Happy Clients", value: 25000, suffix: "+", icon: Users },
    { label: "Total Assets", value: 2, suffix: " Bn+", icon: Wallet },
    { label: "Work Force", value: 350, suffix: "+", icon: Briefcase },
  ];

  return (
    <section className="py-14 sm:py-14 bg-blue-950">
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-20">

        {/* TITLE */}
        <motion.h2
          initial={{ opacity: 0, y: 12 }}
          whileInView={{ opacity: 1, y: 0 }}
          viewport={{ once: true }}
          transition={{ duration: 0.9, ease: [0.16, 1, 0.3, 1] }}
          className="text-3xl md:text-4xl text-center mb-10 md:mb-12 text-[#FFFFFF]"
        >
           <span className="font-extrabold">Impact</span>{" "}
            <span className="font-semibold">Metrics</span>

        </motion.h2>
       

        {/* STATS GRID */}
        <motion.div
          variants={container}
          initial="hidden"
          whileInView="show"
          viewport={{ once: true }}
          className="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 sm:gap-10"
        >
          {stats.map((stat, idx) => {
            const Icon = stat.icon;
            return (
              <motion.div
                key={idx}
                variants={item}
                whileHover={{ y: -4 }}
                className="text-center flex flex-col items-center
                           rounded-2xl p-6 sm:p-7
                           bg-white/5 backdrop-blur-md
                           border border-white/10
                           hover:border-white/20"
              >
                {/* ICON */}
                <div className="mb-4 p-3 sm:p-4 rounded-full bg-white/10">
                  <Icon className="w-7 h-7 sm:w-9 sm:h-9 text-white" />
                </div>

                {/* VALUE */}
                <h3 className="text-2xl sm:text-4xl font-semibold text-white tracking-tight">
                  <CountUpOnView
                    value={stat.value}
                    suffix={stat.suffix}
                  />
                </h3>

                {/* LABEL */}
                <p className="text-sm sm:text-lg text-white/80 mt-2">
                  {stat.label}
                </p>
              </motion.div>
            );
          })}
        </motion.div>

      </div>
    </section>
  );
}
