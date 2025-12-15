"use client";
import { useState } from "react";

export default function LoginPage() {
  const [phone, setPhone] = useState("");
  const [password, setPassword] = useState("");
  const [remember, setRemember] = useState(false);
  const [showPassword, setShowPassword] = useState(false);
  const [loading, setLoading] = useState(false);

  const handleSubmit = (e: React.FormEvent) => {
    e.preventDefault();
    setLoading(true);

    // Simulate API call
    setTimeout(() => {
      console.log({ phone, password, remember });
      setLoading(false);
      alert("Signed in successfully!");
    }, 1500);
  };

  return (
    <div className="min-h-screen bg-white flex flex-col items-center justify-center px-4">
      {/* Top Header */}
      <div className="bg-[#061D77] text-white pt-10 pb-16 px-6 w-full rounded-b-[32px] ">
        <h1 className="text-3xl font-semibold">Hello Guest!</h1>
      </div>

      {/* Form Container */}
      <div className="-mt-10 w-full max-w-md">
        <div className="bg-white rounded-3xl shadow-lg p-6 md:p-8 relative">
          {/* Top Image */}
          <div className="flex justify-center -mt-16 mb-4">
            <img
              src="/assests/dearo_logo.png" // Replace with your image path
              alt="Dearo Logo"
              className="w-24 h-24 rounded-full border-4 border-white shadow-lg"
            />
          </div>

          <h2 className="text-xl font-semibold text-[#061D77] text-center">Welcome to DEARO</h2>
          <p className="text-sm text-gray-500 mt-1 text-center">Unlock Innovation – Sign In to Shape the Future</p>

          {/* Form */}
          <form onSubmit={handleSubmit} className="space-y-4 mt-4">
            <div>
              <label className="block text-xs text-gray-500 mb-1">Phone Number</label>
              <input
                type="tel"
                className="w-full rounded-xl bg-[#E8E5FF] px-4 py-3 text-sm outline-none border border-transparent focus:border-[#061D77] focus:ring-1 focus:ring-[#061D77]"
                placeholder="Phone Number"
                value={phone}
                onChange={(e) => setPhone(e.target.value)}
                required
              />
            </div>

            <div>
              <label className="block text-xs text-gray-500 mb-1">Password</label>
              <div className="relative">
                <input
                  type={showPassword ? "text" : "password"}
                  className="w-full rounded-xl bg-[#E8E5FF] px-4 py-3 text-sm pr-10 outline-none border border-transparent focus:border-[#061D77] focus:ring-1 focus:ring-[#061D77]"
                  placeholder="Password"
                  value={password}
                  onChange={(e) => setPassword(e.target.value)}
                  required
                />
                <button
                  type="button"
                  className="absolute inset-y-0 right-3 flex items-center text-gray-500 text-xs"
                  onClick={() => setShowPassword((v) => !v)}
                >
                  {showPassword ? "Hide" : "Show"}
                </button>
              </div>
            </div>

            <div className="flex items-center justify-between text-xs mt-1">
              <label className="flex items-center gap-2">
                <input type="checkbox" checked={remember} onChange={(e) => setRemember(e.target.checked)} className="w-4 h-4" />
                <span>Remember Me</span>
              </label>
              <button type="button" className="text-[#061D77] font-semibold hover:underline">Forgot Password?</button>
            </div>

            {/* Enhanced Sign In Button */}
            <button
              type="submit"
              className={`w-full mt-4 py-3 rounded-xl font-semibold text-sm flex items-center justify-center gap-2 transition-all duration-300 
                ${loading ? "bg-blue-400 cursor-not-allowed" : "bg-[#061D77] hover:bg-blue-700 text-white"}`}
              disabled={loading}
            >
              {loading ? (
                <>
                  <svg className="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle className="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" strokeWidth="4"></circle>
                    <path className="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z"></path>
                  </svg>
                  Signing In...
                </>
              ) : (
                "SIGN IN"
              )}
            </button>
          </form>
        </div>
      </div>
    </div>
  );
}
