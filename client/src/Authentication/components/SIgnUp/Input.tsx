import { forwardRef } from "react";

const Input = forwardRef((props: React.InputHTMLAttributes<HTMLInputElement>, ref: React.Ref<HTMLInputElement>) => {
  return (
    <input
      {...props}
      ref={ref}
      className={`w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white ${
        props.className || ''
      }`}
    />
  );
});

Input.displayName = "Input";

export default Input;