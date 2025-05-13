import { FaUserTie, FaFutbol } from "react-icons/fa";
import { motion } from "framer-motion";

const RadioCard = ({ icon: Icon, label, value, selected, onChange }) => (
  <motion.label
    whileHover={{ scale: 1.05 }}
    className={`flex items-center p-6 border-2 rounded-lg cursor-pointer ${
      selected ? "border-green-500 bg-green-50" : "border-gray-200"
    }`}
  >
    <input
      type="radio"
      name="role"
      value={value}
      checked={selected}
      onChange={() => onChange(value)}
      className="hidden"
    />
    <Icon className={`text-3xl mr-4 ${selected ? "text-green-500" : ""}`} />
    <span className="font-medium">{label}</span>
  </motion.label>
);

const Step1 = ({ formData, setFormData, nextStep }) => {
  const handleChange = (value: string) => {
    setFormData({ ...formData, role: value });
  };

  const isValid = formData.role !== "";

  return (
    <div className="flex flex-col items-center">
      <h2 className="text-xl font-semibold mb-6">Are you a Player or Manager?</h2>
      <div className="w-full max-w-xs space-y-4">
        <RadioCard
          icon={FaFutbol}
          label="Player"
          value="player"
          selected={formData.role === "player"}
          onChange={handleChange}
        />
        <RadioCard
          icon={FaUserTie}
          label="Manager"
          value="manager"
          selected={formData.role === "manager"}
          onChange={handleChange}
        />
      </div>
      <button
        onClick={nextStep}
        disabled={!isValid}
        className="mt-8 px-6 py-3 bg-green-500 text-white rounded-lg disabled:bg-gray-300 disabled:cursor-not-allowed"
      >
        Continue
      </button>
    </div>
  );
};

export default Step1;