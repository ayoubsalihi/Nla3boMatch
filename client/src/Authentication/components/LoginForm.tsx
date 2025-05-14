import Divider from "./Divider";
import GoogleSignInButton from "./GoogleSignIn";
import Input from "./Input";
import SignInButton from "./SignInButton";
import TermsText from "./TermsText";

interface LoginFormProps {
  formData: {
    email: string;
    password: string;
  };
  handleChange: (e: React.ChangeEvent<HTMLInputElement>) => void;
  handleSubmit: (e: React.FormEvent) => void;
  backendErrors: Partial<{
    email: string;
    password: string;
  }>;
  rememberMe: boolean;
  setRememberMe: (value: boolean) => void;
}

const LoginForm = ({
  formData,
  handleChange,
  handleSubmit,
  backendErrors,
  rememberMe,
  setRememberMe,
}: LoginFormProps) => {
  return (
    <div className="w-full max-w-md">
      <div className="w-full flex-1 mt-8">
        <div className="flex flex-col items-center">
          <GoogleSignInButton />
          <Divider text="Or sign in with E-mail" />
          <form onSubmit={handleSubmit} className="w-full space-y-4">
            <Input
              type="email"
              name="email"
              placeholder="Email"
              value={formData.email}
              onChange={handleChange}
              error={backendErrors.email}
            />
            <Input
              type="password"
              name="password"
              placeholder="Password"
              value={formData.password}
              onChange={handleChange}
              error={backendErrors.password}
            />
            
            <div className="flex items-center justify-between">
              <label className="flex items-center">
                <input
                  type="checkbox"
                  checked={rememberMe}
                  onChange={(e) => setRememberMe(e.target.checked)}
                  className="form-checkbox h-4 w-4 text-green-500"
                />
                <span className="ml-2 text-sm text-gray-600">Remember me</span>
              </label>
              <a href="/forgot-password" className="text-sm text-green-600 hover:underline">
                Forgot password?
              </a>
            </div>

            <SignInButton />
            <TermsText />
          </form>
        </div>
      </div>
    </div>
  );
};

export default LoginForm;