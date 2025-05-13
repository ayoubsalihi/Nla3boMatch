
const Input = ({ type, placeholder, className = '' }) => {
  return (
    <input
      type={type}
      placeholder={placeholder}
      className={`w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white ${className}`}
    />
  );
};

export default Input

