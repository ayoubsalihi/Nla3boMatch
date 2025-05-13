import { useMemo } from "react";
import Slider from "./Slider";
import { GiSoccerBall } from "react-icons/gi";
import { motion } from "framer-motion";
import { FormData } from "../../../interfaces/interfaces";

const SkillSlider = ({ label, value, onChange }: {
  label: string;
  value: number;
  onChange: (value: number) => void;
}) => (
  <div className="mb-6">
    <div className="flex justify-between items-center mb-2">
      <span className="text-sm font-medium text-gray-700">{label}</span>
      <span className="text-sm font-bold text-green-600">{value}</span>
    </div>
    <div className="relative">
      <Slider
        value={value}
        onChange={onChange}
        min={0}
        max={99}
        className="w-full h-3 bg-gradient-to-r from-green-100 to-green-300 rounded-lg appearance-none cursor-pointer"
      />
      <div className="absolute top-1/2 left-0 right-0 h-1 bg-gray-200 -translate-y-1/2 rounded-full pointer-events-none" />
    </div>
  </div>
);

export const FIFAPlayerCard = ({ position, skills }: {
  position: string;
  skills: Record<string, number>;
}) => {
  const numericSkills = useMemo(() => 
    Object.fromEntries(
      Object.entries(skills).map(([k, v]) => [k, Number(v)])
    ), [skills]);

  const overall = useMemo(() => {
    const values = Object.values(numericSkills);
    return values.length > 0 
      ? Math.round(values.reduce((a, b) => a + b, 0) / values.length)
      : 0;
  }, [numericSkills]);

  return (
    <motion.div 
      initial={{ opacity: 0, y: 20 }}
      animate={{ opacity: 1, y: 0 }}
      className="relative bg-gradient-to-br from-green-700 to-green-900 rounded-2xl p-6 text-white w-80 h-96 shadow-2xl overflow-hidden"
    >
      {/* Removed backdrop-blur from position badge */}
      <div className="absolute top-4 right-4 bg-white/10 px-4 py-1 rounded-full text-sm">
        {position.toUpperCase()}
      </div>

      <div className="flex flex-col items-center h-full">
        <div className="text-center mb-6">
          <div className="text-6xl font-bold text-yellow-400">{overall}</div>
          <div className="text-sm uppercase tracking-widest mt-2">Overall</div>
        </div>

        <div className="w-full space-y-4 pb-4"> {/* Added padding-bottom */}
          {Object.entries(numericSkills).map(([skill, value]) => (
            <div key={skill} className="flex items-center">
              <span className="w-24 text-sm uppercase tracking-wide">
                {skill}
              </span>
              <div className="flex-1 h-3 bg-white/10 rounded-full overflow-hidden">
                <div 
                  className="h-full bg-gradient-to-r from-yellow-400 to-amber-500"
                  style={{ 
                    width: `${(value / 99) * 100}%`,
                    boxShadow: '0 2px 8px rgba(251, 191, 36, 0.3)'
                  }}
                />
              </div>
              <span className="w-12 text-right text-yellow-400 font-medium ml-2">
                {value}
              </span>
            </div>
          ))}
        </div>

        {/* Removed bottom blur overlay div */}
        <div className="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 opacity-10">
          <GiSoccerBall className="text-48 text-white" />
        </div>
      </div>
    </motion.div>
  );
};

const Step4 = ({ formData, setFormData, submitForm, prevStep }: {
  formData: FormData;
  setFormData: React.Dispatch<React.SetStateAction<FormData>>;
  submitForm: () => void;
  prevStep: () => void;
}) => {
  const isGoalkeeper = formData.position === "goalkeeper";
  
  const positionLabels = {
    goalkeeper: "Goalkeeper",
    defender: "Defender",
    midfielder: "Midfielder",
    forward: "Striker"
  };

  const skills = useMemo(() => {
    const defaultSkills = isGoalkeeper
      ? ["diving", "reflex", "kicking", "handling", "positioning", "speed"]
      : ["pace", "dribbling", "shooting", "defending", "passing", "physical"];

    return defaultSkills.reduce((acc, skill) => ({
      ...acc,
      [skill]: Number(formData.skills[skill]) || 50
    }), {} as Record<string, number>);
  }, [isGoalkeeper, formData.skills]);

  const handleSkillChange = (skill: string, value: number) => {
    setFormData(prev => ({
      ...prev,
      skills: { 
        ...prev.skills, 
        [skill]: value
      },
    }));
  };

  return (
    <div className="w-full max-w-4xl flex gap-8">
      <div className="flex-1 max-w-md">
        <h2 className="text-2xl font-bold mb-6 text-gray-800">
          Customize Your Skills
          <span className="block text-sm font-normal text-gray-500 mt-1">
            Adjust your player attributes (0-99)
          </span>
        </h2>
        
        <div className="mb-4 p-3 bg-green-50 rounded-lg">
          <p className="text-sm font-semibold text-green-700">
            Selected Position: {" "}
            <span className="font-normal">
              {positionLabels[formData.position] || "Not selected"}
            </span>
          </p>
        </div>

        <div className="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
          {Object.entries(skills).map(([skill, value]) => (
            <SkillSlider
              key={skill}
              label={skill.charAt(0).toUpperCase() + skill.slice(1)}
              value={value}
              onChange={(newValue: number) => handleSkillChange(skill, newValue)}
            />
          ))}
        </div>

        <div className="flex justify-between mt-8">
          <button
            onClick={prevStep}
            className="px-6 py-3 bg-gray-100 text-gray-600 rounded-lg hover:bg-gray-200 transition-colors"
          >
            Back
          </button>
          <button
            onClick={submitForm}
            className="px-6 py-3 bg-green-500 text-white rounded-lg hover:bg-green-600 transition-colors"
          >
            Complete Registration
          </button>
        </div>
      </div>
    </div>
  );
};

export default Step4;