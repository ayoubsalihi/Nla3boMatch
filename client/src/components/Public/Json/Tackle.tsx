import TacklePlayers from "./Tackle.json"
import Lottie from "lottie-react"

const Tackle = () => {
  return (
    <div>
      <Lottie animationData={TacklePlayers} loop={true}/>
    </div>
  )
}

export default Tackle
