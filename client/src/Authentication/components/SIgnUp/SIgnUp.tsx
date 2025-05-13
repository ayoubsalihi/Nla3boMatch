import { useState, useEffect } from "react";
import { motion } from "framer-motion";
import { FiUser, FiShield, FiFileText, FiSliders } from "react-icons/fi";
import Step1 from "./SignUpSteps";
import Step2 from "./Step2";
import Step3 from "./Step3";
import Step4 from "./Step4";
import { FormData } from "../../../interfaces/interfaces";

interface SignUpFormProps {
  onSwitchToLogin: () => void;
  setFormData: React.Dispatch<React.SetStateAction<FormData>>;
  setCurrentStep: React.Dispatch<React.SetStateAction<number>>;
}

const SignUpForm = ({ onSwitchToLogin, setFormData, setCurrentStep }: SignUpFormProps) => {
  const [step, setStep] = useState(1);
  const [localFormData, setLocalFormData] = useState<FormData>({
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

  // Sync local form data with parent
  useEffect(() => {
    setFormData(localFormData);
  }, [localFormData, setFormData]);

  const steps = [
    { number: 1, icon: FiUser, label: "Role" },
    { number: 2, icon: FiFileText, label: "Details" },
    { number: 3, icon: FiShield, label: "Position" },
    { number: 4, icon: FiSliders, label: "Skills" },
  ];

  const handleStepChange = (newStep: number) => {
    setStep(newStep);
    setCurrentStep(newStep);
  };

  return (
    <div className="mt-12 flex flex-col items-center">
      <div className="w-full flex-1 mt-8">
        <div className="flex justify-center mb-8">
          {steps.map(({ number, icon: Icon, label }) => (
            <div key={number} className="flex flex-col items-center mx-4">
              <div
                className={`w-8 h-8 rounded-full flex items-center justify-center ${
                  step >= number ? "bg-green-500 text-white" : "bg-gray-200"
                }`}
              >
                {step > number ? <Icon className="w-4 h-4" /> : number}
              </div>
              <span className="text-xs mt-2 text-gray-600">{label}</span>
            </div>
          ))}
        </div>

        <motion.div
          key={step}
          initial={{ opacity: 0, x: 20 }}
          animate={{ opacity: 1, x: 0 }}
          exit={{ opacity: 0, x: -20 }}
          transition={{ duration: 0.3 }}
        >
          {step === 1 && (
            <Step1
              formData={localFormData}
              setFormData={setLocalFormData}
              nextStep={() => handleStepChange(2)}
            />
          )}
          {step === 2 && (
            <Step2
              formData={localFormData}
              setFormData={setLocalFormData}
              nextStep={() => handleStepChange(3)}
              prevStep={() => handleStepChange(1)}
            />
          )}
          {step === 3 && (
            <Step3
              formData={localFormData}
              setFormData={setLocalFormData}
              nextStep={() => handleStepChange(4)}
              prevStep={() => handleStepChange(2)}
            />
          )}
          {step === 4 && (
            <Step4
              formData={localFormData}
              setFormData={setLocalFormData}
              submitForm={() => {
                // Handle form submission after connecting with Db
              }}
              prevStep={() => handleStepChange(3)}
            />
          )}
        </motion.div>

        <p className="mt-6 text-xs text-gray-600 text-center">
          Already have an account?{" "}
          <button
            onClick={onSwitchToLogin}
            className="text-green-500 hover:underline"
          >
            Log In
          </button>
        </p>
      </div>
    </div>
  );
};

export default SignUpForm;