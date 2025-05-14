import { useState } from "react";
import LoginForm from "./components/LoginForm";
import RightImageSection from "./components/RightImageSection";
import SignUpForm from "./components/SIgnUp/SIgnUp";
import { motion } from "framer-motion";
import { FormData } from "../interfaces/interfaces";
import BackgroundBalls from "../components/Public/Animation/Background";
import { useDispatch } from "react-redux";
import { useNavigate } from "react-router-dom";
import axios, { AxiosError } from "axios";
import Cookies from "js-cookie";
import { send_request } from "../helpers/send_request";
import { save_user_account } from "../redux/slices/UserDataSlice";

interface LoginFormData {
  email: string;
  password: string;
}

interface BackendErrorResponse {
  errors: {
    [key: string]: string[];
  };
}

const LoginPage = () => {
  const dispatch = useDispatch();
  const navigate = useNavigate();
  const [loginFormData, setLoginFormData] = useState<LoginFormData>({
    email: '',
    password: '',
  });
  const [backendErrors, setBackendErrors] = useState<Partial<LoginFormData>>({});
  const [rememberMe, setRememberMe] = useState(false);
  const [isSignUp, setIsSignUp] = useState(false);
  const [signupFormData, setSignupFormData] = useState<FormData>({
    role: "",
    position: "",
    firstName: "",
    lastName: "",
    cin: "",
    city: "",
    neighborhood: "",
    phone: "",
    email: "",
    password: "",
    confirmPassword: "",
    skills: {},
  });
  const [currentStep, setCurrentStep] = useState(1);

  const handleLoginChange = (e: React.ChangeEvent<HTMLInputElement>) => {
    setLoginFormData({ ...loginFormData, [e.target.name]: e.target.value });
  };

  const handleAuthError = (
    error: unknown,
    errorSetter: (errors: Partial<LoginFormData>) => void
  ) => {
    if (axios.isAxiosError(error)) {
      const axiosError = error as AxiosError<BackendErrorResponse>;
      if (axiosError.response?.status === 422) {
        const errors = axiosError.response.data?.errors || {};
        const newErrors: Partial<LoginFormData> = {};
        Object.entries(errors).forEach(([field, messages]) => {
          const key = field as keyof LoginFormData;
          newErrors[key] = messages[0];
        });
        errorSetter(newErrors);
      }
    }
  };

  const handleLoginSubmit = async (e: React.FormEvent) => {
    e.preventDefault();
    setBackendErrors({});

    try {
      await axios.get(import.meta.env.VITE_CSRF_URL, { withCredentials: true });
      const response = await send_request('POST', 'login', loginFormData);
      
      if (response?.data.token) {
        Cookies.set('sanctum_token', response.data.token, {
          expires: rememberMe ? 30 : 7,
          secure: import.meta.env.PROD,
          sameSite: 'lax'
        });
        
        dispatch(save_user_account(response.data.user));
        navigate('/dashboard');
      }
    } catch (error) {
      handleAuthError(error, setBackendErrors);
    }
  };

  const handleSignupSubmit = async () => {
    try {
      const basePayload = {
        nom: signupFormData.lastName,
        prenom: signupFormData.firstName,
        email: signupFormData.email,
        password: signupFormData.password,
        password_confirmation: signupFormData.confirmPassword,
        type_utilisateur: 'player',
        cin: signupFormData.cin,
        telephone: signupFormData.phone,
        ville_residence: signupFormData.city,
        quartier: signupFormData.neighborhood,
        poste: signupFormData.position,
      };

      const positionPayload = signupFormData.position === 'GK' ? {
        diving: signupFormData.skills.diving || 0,
        reflex: signupFormData.skills.reflex || 0,
        handling: signupFormData.skills.handling || 0,
        kicking: signupFormData.skills.kicking || 0,
        positionning: signupFormData.skills.positioning || 0,
        speed: signupFormData.skills.speed || 0
      } : {
        pace: signupFormData.skills.pace || 0,
        dribbling: signupFormData.skills.dribbling || 0,
        shooting: signupFormData.skills.shooting || 0,
        defending: signupFormData.skills.defending || 0,
        passing: signupFormData.skills.passing || 0,
        physical: signupFormData.skills.physical || 0
      };

      const finalPayload = {
        ...basePayload,
        ...positionPayload
      };

      Object.keys(finalPayload).forEach(key => {
        if (finalPayload[key] === undefined) delete finalPayload[key];
      });

      // Get CSRF cookie
      await axios.get(import.meta.env.VITE_CSRF_URL, { withCredentials: true });
      
      const response = await send_request('POST', 'register', finalPayload);

      if (response?.data.token) {
        Cookies.set('sanctum_token', response.data.token, {
          secure: import.meta.env.PROD,
          sameSite: 'lax'
        });
        
        const userResponse = await send_request('GET', 'user');
        dispatch(save_user_account(userResponse.data));
        navigate('/dashboard');
      }
    } catch (error) {
      if (axios.isAxiosError(error) && error.response?.status === 422) {
        const errors = error.response.data.errors;
        setBackendErrors(prev => ({
          ...prev,
          ...Object.fromEntries(
            Object.entries(errors).map(([key, val]) => [key, val[0]])
          )
        }));
      }
    }
  };


  return (
    <div className="min-h-screen bg-gray-100 flex items-center justify-center p-4 relative">
      <BackgroundBalls />
      <div className="w-full max-w-6xl bg-white rounded-2xl shadow-lg flex flex-col lg:flex-row relative z-10">
        <div className="w-full lg:w-1/2 p-8 sm:p-12">
          <div className="flex justify-between items-start mb-8">
            <div className="text-3xl font-bold text-green-600">
              Nla<span className="text-green-800">3</span>boMatch
            </div>
            <div className="flex gap-2">
              <button onClick={() => setIsSignUp(false)} className={`px-4 py-2 rounded-lg ${!isSignUp ? 'bg-green-100 text-green-700' : 'hover:bg-gray-100'}`}>
                Log In
              </button>
              <button onClick={() => setIsSignUp(true)} className={`px-4 py-2 rounded-lg ${isSignUp ? 'bg-green-100 text-green-700' : 'hover:bg-gray-100'}`}>
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
                setFormData={setSignupFormData}
                setCurrentStep={setCurrentStep}
                submitForm={handleSignupSubmit}
              />
            ) : (
              <LoginForm
                formData={loginFormData}
                handleChange={handleLoginChange}
                handleSubmit={handleLoginSubmit}
                backendErrors={backendErrors}
                rememberMe={rememberMe}
                setRememberMe={setRememberMe}
              />
            )}
          </motion.div>
        </div>

        <div className="hidden lg:flex w-1/2 bg-green-50 rounded-r-2xl overflow-hidden relative">
          <RightImageSection 
            showCard={isSignUp && currentStep === 4}
            formData={signupFormData}
          />
        </div>
      </div>
    </div>
  );
};

export default LoginPage;