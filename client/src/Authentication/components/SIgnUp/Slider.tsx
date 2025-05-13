import { forwardRef } from "react";

interface SliderProps extends React.InputHTMLAttributes<HTMLInputElement> {
  onChange: (value: number) => void;
}

const Slider = forwardRef<HTMLInputElement, SliderProps>(
  ({ onChange, ...props }, ref) => {
    const handleChange = (e: React.ChangeEvent<HTMLInputElement>) => {
      onChange(Number(e.target.value));
    };

    return (
      <input
        type="range"
        ref={ref}
        onChange={handleChange}
        className={`h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer ${props.className}`}
        {...props}
      />
    );
  }
);

Slider.displayName = "Slider";

export default Slider;