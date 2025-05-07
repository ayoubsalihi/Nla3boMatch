import Coach from "../Json/Coach"

const Choose = () => {
  return (
    <div className="relative px-4 py-16 md:py-24 z-50 bg-white">
      <div className="max-w-7xl mx-auto">
        <h1 className='text-gray-900 text-4xl md:text-5xl font-bold mb-12 text-center'>
          Why Managers Choose Us?
        </h1>
        
        <div className="grid lg:grid-cols-2 gap-8 lg:gap-16 items-center">
          {/* Text Content */}
          <div className="space-y-6 lg:pr-8">
            <h2 className="text-gray-800 text-2xl md:text-3xl font-semibold leading-tight">
              At Nla3bo Match, we don’t just build tools—we build transformations. 
              <span className="block mt-3 text-lg font-medium text-gray-600">
                Here’s how we’re redefining stadium management:
              </span>
            </h2>

            <blockquote className="pl-4 border-l-4 border-slate-950 italic text-gray-600 md:text-lg">
              "Since implementing this platform, we've increased facility utilization by 40% while cutting admin time in half. 
              The automated conflict resolution alone has saved us 15 weekly hours in double-booking headaches."
              <cite className="not-italic block mt-3 font-bold text-gray-900">
                - Majed Iblalen, Stadium Manager
              </cite>
            </blockquote>

            <p className="text-gray-600 md:text-lg leading-relaxed">
              Our AI-powered scheduling detects double-bookings in real-time and suggests 
              conflict resolutions – before they become problems.
            </p>
          </div>
          <div className="relative h-full min-h-[400px] lg:min-h-[500px] flex items-center justify-center">
            <Coach />
          </div>
        </div>
      </div>
    </div>
  )
}

export default Choose