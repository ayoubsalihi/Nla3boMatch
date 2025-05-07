import { Link as ScrollLink } from 'react-scroll';
import Players from '../Json/Players';
const InformativeSection = () => {
  return (
    <section className="pt-32 pb-20 container mx-auto px-6 relative z-50">
        <div className="flex flex-col lg:flex-row items-center justify-between gap-12">
          <div className="lg:w-1/2 space-y-6" data-aos="fade-right">
            <h1 className="text-5xl font-bold text-gray-800 leading-tight">
              Connect & Play Football <br/>
              <span className="text-green-600">With Local Players</span>
            </h1>
            <p className="text-xl text-gray-600">
              Find players, organize matches, and enjoy the game you love. 
              Whether you're a casual player or competitive team, we've got you covered.
            </p>
            <div className="flex gap-4">
              <ScrollLink
                to="features"
                smooth={true}
                className="bg-green-600 text-white px-8 py-3 rounded-lg text-lg hover:bg-green-700 cursor-pointer"
              >
                Find Players Now
              </ScrollLink>
            </div>
          </div>
          
          <div className="lg:w-1/2" data-aos="fade-left">
            <Players/>
          </div>
        </div>
      </section>
  )
}

export default InformativeSection;
