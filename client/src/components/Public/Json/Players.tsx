import Lottie from "lottie-react"
import Player from "./Players.json"
const Players = () => {
  return (
    <div>
      <Lottie animationData={Player} loop={true}/>
    </div>
  )
}

export default Players
