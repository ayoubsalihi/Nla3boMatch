import { useState } from "react";
import LoginForm from "./components/LoginForm";
import RightImageSection from "./components/RightImageSection";
import SignUpForm from "./components/SIgnUp/SIgnUp";
import { motion } from "framer-motion";
import { FormData } from "../interfaces/interfaces";
import BackgroundBalls from "../components/Public/Animation/Background";

const LoginPage = () => {
  const [isSignUp, setIsSignUp] = useState(false);
  const [formData, setFormData] = useState<FormData>({
    role: "",
    position: "",
    firstName: "",
    lastName: "",
    cin: "",
    city: "",
    neighborhood: "",
    email: "",
    password: "",
    confirmPassword: "",
    skills: {},
  });
  const [currentStep, setCurrentStep] = useState(1);

  return (
    <div className="min-h-screen bg-gray-100 flex items-center justify-center p-4 relative">
      <BackgroundBalls/>
      <div className="w-full max-w-6xl bg-white rounded-2xl shadow-lg flex flex-col lg:flex-row relative z-10">
        {/* Left Form Section */}
        <div className="w-full lg:w-1/2 p-8 sm:p-12">
          <div className="flex justify-between items-start mb-8">
            <div className="text-3xl font-bold text-green-600">
              Nla<span className="text-green-800">3</span>boMatch
            </div>
            <div className="flex gap-2">
              <button
                onClick={() => setIsSignUp(false)}
                className={`px-4 py-2 rounded-lg ${
                  !isSignUp ? 'bg-green-100 text-green-700' : 'hover:bg-gray-100'
                }`}
              >
                Log In
              </button>
              <button
                onClick={() => setIsSignUp(true)}
                className={`px-4 py-2 rounded-lg ${
                  isSignUp ? 'bg-green-100 text-green-700' : 'hover:bg-gray-100'
                }`}
              >
                Sign Up
              </button>
            </div>
          </div>

          <motion.div
            key={isSignUp ? "signup" : "login"}
            initial={{ opacity: 0, y: 20 }}
            animate={{ opacity: 1, y: 0 }}
            transition={{ duration: 0.3 }}
            className="flex justify-center items-center"
          >
            {isSignUp ? (
              <SignUpForm 
                onSwitchToLogin={() => setIsSignUp(false)}
                setFormData={setFormData}
                setCurrentStep={setCurrentStep}
              />
            ) : (
              <LoginForm />
            )}
          </motion.div>
        </div>

        {/* Right Image Section */}
        <div className="hidden lg:flex w-1/2 bg-green-50 rounded-r-2xl overflow-hidden relative">
          <RightImageSection 
            showCard={isSignUp && currentStep === 4}
            formData={formData}
          />
        </div>
      </div>
    </div>
  );
};

export default LoginPage;