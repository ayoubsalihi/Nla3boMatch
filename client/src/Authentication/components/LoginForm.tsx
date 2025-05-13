import Divider from "./Divider";
import GoogleSignInButton from "./GoogleSignIn";
import Input from "./Input";
import SignInButton from "./SignInButton";
import TermsText from "./TermsText";

const LoginForm = () => {
  return (
    <div className="w-full max-w-md">
      <div className="w-full flex-1 mt-8">
        <div className="flex flex-col items-center">
          <GoogleSignInButton />
          <Divider text="Or sign in with Cartesian E-mail" />
          <div className="w-full space-y-4">
            <Input type="email" placeholder="Email" />
            <Input type="password" placeholder="Password" />
            <SignInButton />
            <TermsText />
          </div>
        </div>
      </div>
    </div>
  );
};

export default LoginForm;