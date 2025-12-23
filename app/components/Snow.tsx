"use client";

import { useEffect } from "react";

export default function Snow() {
  useEffect(() => {
    const container = document.createElement("div");
    container.className = "snow-container";
    document.body.appendChild(container);

    const snowflakes: HTMLSpanElement[] = [];

    for (let i = 0; i < 120; i++) {
      const snowflake = document.createElement("span");
      snowflake.className = "snowflake";

      snowflake.style.left = Math.random() * 100 + "vw";
      snowflake.style.animationDuration = 5 + Math.random() * 10 + "s";
      snowflake.style.opacity = Math.random().toString();
      snowflake.style.fontSize = 10 + Math.random() * 20 + "px";

      snowflake.innerHTML = "❄";
      container.appendChild(snowflake);
      snowflakes.push(snowflake);
    }

    return () => {
      snowflakes.forEach((flake) => flake.remove());
      container.remove();
    };
  }, []);

  return null;
}
