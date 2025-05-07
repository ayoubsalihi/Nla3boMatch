import GirlF from "./Girl.json"
import Lottie from "lottie-react" 

const Girl = () => {
  return (
    <div>
      <Lottie animationData={GirlF} loop={true}/>
    </div>
  )
}

export default Girl
