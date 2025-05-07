import { Link } from "react-router-dom"

const Header = () => {
  return (
    <header className=" relative w-full top-0 bg-white/80 backdrop-blur-sm shadow-md z-50">
            <nav className="container mx-auto px-6 py-4 flex justify-between items-center">
              <div className="text-2xl font-bold text-green-600">Nla<span className="text-green-800">3</span>boMatch</div>
              <div className="space-x-6">
                <Link to={"/login"} className="text-green-600 hover:text-green-700">
                  Login
                </Link>
                <Link
                  to={"/signup"}
                  className="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700"
                >
                  Sign Up
                </Link>
              </div>
            </nav>
        </header>
  )
}

export default Header
