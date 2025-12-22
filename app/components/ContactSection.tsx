"use client";

import dynamic from "next/dynamic";

const LeafletMap = dynamic(
  () => import("./LeafletMap"),
  { ssr: false }
);

export default function ContactSection() {
  return (
    <section>
      <h2>Contact Us</h2>
      <LeafletMap />
    </section>
  );
}