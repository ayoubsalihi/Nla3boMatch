import { useDispatch, useSelector } from "react-redux"
import { ReduxState, Team } from "../../../../../../../../interfaces/interfaces"
import { useState } from "react";

interface selectedTeam {
  team_id:number;
}

const Add_Competition = () => {
  const dispatch = useDispatch()
  const globalData = useSelector((state: ReduxState)=> state.global_data)
  const [teams , setTeams] = useState<Team[]>([])
  const 
  const [selectedTeam , setSelectedTeams] = useState<selectedTeam[]>([])
  const [loading,setLoading] = useState({

  })
  return (
    <div>Add_Competition</div>
  )
}

export default Add_Competition