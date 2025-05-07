const BackgroundBalls = () => {
    return (
      <div className="absolute h-full inset-0 overflow-hidden z-0">
        {/* Green Ball */}
        <div 
          className="absolute w-[1000px] h-[800px] rounded-full bg-green-200/30 blur-[100px] top-1/4 left-1/4"
          style={{ 
            animation: 'floatingRotate 12s linear infinite',
            transform: 'translate(-30%, -30%)'
          }}
        />
        {/* Orange Ball */}
        <div 
          className="absolute w-[1000px] h-[800px] rounded-full bg-orange-200/30 blur-[100px] bottom-1/4 right-1/4"
          style={{ 
            animation: 'floatingRotate 16s linear infinite reverse',
            transform: 'translate(30%, 30%)'
          }}
        />
      </div>
    );
  };

  export default BackgroundBalls