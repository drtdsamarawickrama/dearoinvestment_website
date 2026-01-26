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

/* ================= ANIMATION VARIANTS ================= */

const container: Variants = {
  hidden: {},
  show: {
    transition: {
      staggerChildren: 0.18,
      delayChildren: 0.12,
    },
  },
};

const item: Variants = {
  hidden: {
    opacity: 0,
    y: 12,
    scale: 0.96,
  },
  show: {
    opacity: 1,
    y: 0,
    scale: 1,
    transition: {
      duration: 0.9,
      ease: [0.22, 1, 0.36, 1], // premium ease
    },
  },
};

/* ================= COUNT UP COMPONENT ================= */

function CountUpOnView({
  value,
  suffix = "",
}: {
  value: number;
  suffix?: string;
}) {
  const ref = useRef<HTMLSpanElement>(null);
  const isInView = useInView(ref, { once: true, margin: "-80px" });

  const motionValue = useMotionValue(0);
  const rounded = useTransform(motionValue, (latest) =>
    Math.floor(latest).toLocaleString()
  );

  const [isMobile, setIsMobile] = useState(false);

  useEffect(() => {
    setIsMobile(window.innerWidth < 768);
  }, []);

  useEffect(() => {
    if (!isInView) return;

    const controls = animate(motionValue, value, {
      duration: isMobile ? 2.4 : 1.9,
      ease: [0.22, 1, 0.36, 1],
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

/* ================= MAIN COMPONENT ================= */

export default function StatsSection() {
  const stats = [
    { label: "Branches", value: 25, suffix: "+", icon: Building2 },
    { label: "Happy Clients", value: 25000, suffix: "+", icon: Users },
    { label: "Total Assets", value: 2, suffix: " Bn+", icon: Wallet },
    { label: "Work Force", value: 350, suffix: "+", icon: Briefcase },
  ];

  return (
    <section className="py-14 sm:py-16 bg-blue-950">
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-20">

        {/* ================= TITLE ================= */}
        <motion.h2
          initial={{ opacity: 0, y: 10 }}
          whileInView={{ opacity: 1, y: 0 }}
          viewport={{ once: true, margin: "-80px" }}
          transition={{
            duration: 1,
            ease: [0.22, 1, 0.36, 1],
          }}
          className="text-3xl md:text-4xl text-center mb-10 md:mb-12 text-white"
        >
          <span className="font-extrabold">Impact</span>{" "}
          <span className="font-semibold">Metrics</span>
        </motion.h2>

        {/* ================= STATS GRID ================= */}
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
                whileHover={{
                  y: -2,
                  transition: { duration: 0.25, ease: "easeOut" },
                }}
                className="flex flex-col items-center text-center
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
