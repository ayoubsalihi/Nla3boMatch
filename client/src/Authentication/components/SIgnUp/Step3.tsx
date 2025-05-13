import {  GiDefensiveWall, GiGoalKeeper, GiSoccerBall, GiSoccerKick } from "react-icons/gi";
import { motion } from "framer-motion";

const PositionCard = ({ icon: Icon, label, value, selected, onChange }) => (
  <motion.label
    whileHover={{ scale: 1.05 }}
    className={`flex items-center p-6 border-2 rounded-lg cursor-pointer ${
      selected ? "border-green-500 bg-green-50" : "border-gray-200"
    }`}
  >
    <input
      type="radio"
      name="position"
      value={value}
      checked={selected}
      onChange={() => onChange(value)}
      className="hidden"
    />
    <Icon className={`text-3xl mr-4 ${selected ? "text-green-500" : ""}`} />
    <span className="font-medium">{label}</span>
  </motion.label>
);

const Step3 = ({ formData, setFormData, nextStep, prevStep }) => {
  const handleChange = (value: string) => {
    setFormData({ ...formData, position: value });
  };

  const isValid = formData.position !== "";

  return (
    <div className="flex flex-col items-center">
      <h2 className="text-xl font-semibold mb-6">Select Your Position</h2>
      <div className="w-full max-w-xs space-y-4">
        <PositionCard
          icon={GiGoalKeeper}
          label="Goalkeeper"
          value="goalkeeper"
          selected={formData.position === "goalkeeper"}
          onChange={handleChange}
        />
        <PositionCard
          icon={GiDefensiveWall}
          label="Defender"
          value="defender"
          selected={formData.position === "defender"}
          onChange={handleChange}
        />
        <PositionCard
          icon={GiSoccerBall}
          label="Midfielder"
          value="midfielder"
          selected={formData.position === "midfielder"}
          onChange={handleChange}
        />
        <PositionCard
          icon={GiSoccerKick}
          label="Forward"
          value="forward"
          selected={formData.position === "forward"}
          onChange={handleChange}
        />
      </div>
      <div className="flex justify-between w-full max-w-xs mt-8">
        <button
          onClick={prevStep}
          className="px-6 py-3 bg-gray-200 text-gray-700 rounded-lg"
        >
          Back
        </button>
        <button
          onClick={nextStep}
          disabled={!isValid}
          className="px-6 py-3 bg-green-500 text-white rounded-lg disabled:bg-gray-300 disabled:cursor-not-allowed"
        >
          Continue
        </button>
      </div>
    </div>
  );
};

export default Step3;