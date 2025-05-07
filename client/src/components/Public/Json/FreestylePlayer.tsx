import Freestyle from "./Freestyle.json"
import Lottie from "lottie-react"

const FreestylePlayer = () => {
  return (
    <div>
      <Lottie animationData={Freestyle} loop={true}/>
    </div>
  )
}

export default FreestylePlayer
