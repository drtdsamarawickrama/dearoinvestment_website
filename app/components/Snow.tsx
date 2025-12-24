"use client";

import { useEffect } from "react";

export default function Snow() {
  useEffect(() => {
    const container = document.createElement("div");
    container.className = "snow-container";
    container.style.position = "fixed";
    container.style.top = "0";
    container.style.left = "0";
    container.style.width = "100%";
    container.style.height = "100%";
    container.style.pointerEvents = "none";
    container.style.overflow = "hidden";
    container.style.zIndex = "9999";
    document.body.appendChild(container);

    const snowflakes: HTMLSpanElement[] = [];
    const totalFlakes = 150;

    for (let i = 0; i < totalFlakes; i++) {
      const snowflake = document.createElement("span");
      snowflake.innerHTML = ".";
      snowflake.style.position = "absolute";
      snowflake.style.top = "-50px";
      snowflake.style.left = Math.random() * 100 + "vw";
      snowflake.style.fontSize = 8 + Math.random() * 24 + "px";
      snowflake.style.opacity = (0.3 + Math.random() * 0.7).toString();
      snowflake.style.color = "white";
      snowflake.style.textShadow = "0 0 6px rgba(255,255,255,0.8)";
      snowflake.style.pointerEvents = "none";
      snowflake.style.willChange = "transform";

      // animation duration and delay must be strings with 's'
      const duration = 5 + Math.random() * 10;
      const delay = Math.random() * 10;

      snowflake.style.animation = `fall-${i} ${duration}s linear ${delay}s infinite`;

      const keyframes = `
        @keyframes fall-${i} {
          0% { transform: translateY(0) translateX(0); }
          50% { transform: translateY(50vh) translateX(${Math.random() * 30 - 15}px); }
          100% { transform: translateY(100vh) translateX(${Math.random() * 60 - 30}px); }
        }
      `;
      const styleSheet = document.styleSheets[0] as CSSStyleSheet;
      styleSheet.insertRule(keyframes, styleSheet.cssRules.length);

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
