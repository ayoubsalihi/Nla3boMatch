const Divider = ({ text }) => {
  return (
    <div className="my-12 border-b text-center">
      <div className="leading-none px-2 inline-block text-sm text-gray-600 tracking-wide font-medium bg-white transform translate-y-1/2">
        {text}
      </div>
    </div>
  );
};

export default Divider