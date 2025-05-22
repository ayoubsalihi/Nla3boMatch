import Input from "./Input";
import { FormData } from "../../../interfaces/interfaces";

interface Step2Props {
  formData: FormData;
  setFormData: React.Dispatch<React.SetStateAction<FormData>>;
  nextStep: () => void;
  prevStep: () => void;
  submitForm: () => void;
  backendErrors: Record<string, string>;
}

const Step2 = ({ 
  formData, 
  setFormData, 
  nextStep, 
  prevStep, 
  submitForm,
  backendErrors 
}: Step2Props) => {
  const handleChange = (e: React.ChangeEvent<HTMLInputElement>) => {
    const { name, value } = e.target;
    setFormData(prev => ({ ...prev, [name]: value }));
  };

  const isValid = 
    formData.firstName.trim() !== '' &&
    formData.lastName.trim() !== '' &&
    formData.cin.trim() !== '' &&
    formData.city.trim() !== '' &&
    formData.neighborhood.trim() !== '' &&
    formData.phone.trim() !== '' &&
    formData.email.trim() !== '' &&
    formData.password.trim() !== '' &&
    formData.confirmPassword.trim() !== '' &&
    formData.password === formData.confirmPassword;

  return (
    <div className="w-full max-w-xs">
      <h2 className="text-xl font-semibold mb-6">Personal Information</h2>
      
      {Object.keys(backendErrors).length > 0 && (
        <div className="mb-4 p-3 bg-red-50 text-red-700 rounded-lg text-sm">
          {Object.entries(backendErrors).map(([field, message]) => (
            <p key={field}>{message}</p>
          ))}
        </div>
      )}

      <div className="space-y-4">
        <Input
          name="firstName"
          placeholder="First Name"
          value={formData.firstName}
          onChange={handleChange}
          required
        />
        <Input
          name="lastName"
          placeholder="Last Name"
          value={formData.lastName}
          onChange={handleChange}
          required
        />
        <Input
          name="cin"
          placeholder="CIN"
          value={formData.cin}
          onChange={handleChange}
          required
        />
        <Input
          name="city"
          placeholder="City"
          value={formData.city}
          onChange={handleChange}
          required
        />
        <Input
          name="neighborhood"
          placeholder="Neighborhood"
          value={formData.neighborhood}
          onChange={handleChange}
          required
        />
        <Input
          name="phone"
          type="tel"
          placeholder="Phone (+212XXXXXXXXX)"
          value={formData.phone}
          onChange={handleChange}
          required
          pattern="\+212[0-9]{9}"
          title="Moroccan phone number format: +212XXXXXXXXX"
        />
        <Input
          name="email"
          type="email"
          placeholder="Email"
          value={formData.email}
          onChange={handleChange}
          required
        />
        <Input
          name="password"
          type="password"
          placeholder="Password"
          value={formData.password}
          onChange={handleChange}
          required
        />
        <Input
          name="confirmPassword"
          type="password"
          placeholder="Confirm Password"
          value={formData.confirmPassword}
          onChange={handleChange}
          required
        />
      </div>

      <div className="flex justify-between mt-8">
        <button
          onClick={prevStep}
          className="px-6 py-3 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300"
        >
          Back
        </button>
        <button
          onClick={() => {
            setFormData(prev => ({ ...prev, ...formData }));
            if (formData.role === 'manager') {
              submitForm();
            } else {
              nextStep();
            }
          }}
          disabled={!isValid}
          className={`px-6 py-3 rounded-lg ${
            isValid 
              ? 'bg-green-500 text-white hover:bg-green-600'
              : 'bg-gray-300 text-gray-500 cursor-not-allowed'
          }`}
        >
          {formData.role === 'manager' ? 'Complete Registration' : 'Continue'}
        </button>
      </div>
    </div>
  );
};

export default Step2;