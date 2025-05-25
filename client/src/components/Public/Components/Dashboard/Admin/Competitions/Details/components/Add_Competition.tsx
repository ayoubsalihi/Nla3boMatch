import { useDispatch, useSelector } from "react-redux"
import { ReduxState, Team } from "../../../../../../../../interfaces/interfaces"
import { useEffect, useRef, useState } from "react";
import { Group } from "three/src/Three.Core.js";
import { send_request } from "../../../../../../../../helpers/send_request";

interface selectedTeam {
  team_id:number;
}

const Add_Competition = () => {
  const dispatch = useDispatch()
  const globalData = useSelector((state: ReduxState)=> state.global_data)
  // To bring spesific data changes from spesific tables
  const [teams , setTeams] = useState<Team[]>([])
  const [groups , setGroups] = useState<Group[]>([])

  const [selectedTeam , setSelectedTeams] = useState<selectedTeam[]>([])
  const [loading,setLoading] = useState({
    groups : true,
    teams : true,
  })

  // inputs references
  const d_intitule_comp_ref = useRef<HTMLInputElement>(null)
  const d_type_comp_ref = useRef<HTMLInputElement>(null)
  const d_debut_date = useRef<HTMLInputElement>(null)
  const d_finishing_date = useRef<HTMLInputElement>(null)

  // Verifying the existence of data
  useEffect(()=>{
    if (globalData) {
      if (globalData.teams.length > 0) {
        setTeams(globalData.teams)
        setLoading(prev=> ({...prev,teams:false}))
      }
      if (globalData.groups.length > 0) {
        setGroups(globalData.groups)
        setLoading(prev => ({...prev, groups:false}))
      }
    }

    if (!globalData || globalData.teams.length === 0) {
      send_request('GET','teams')
      ?.then((res)=>{
        if (res.status === 200) {
          setTeams(res.data)
        }
      })
      .catch((err)=>console.error("Error fetching data of ", err))
      .finally(()=>{
        setLoading(prev=> ({...prev, teams:false}))
      })
    }

    if (!globalData || globalData.teams.length === 0) {
      send_request('GET','groups')
      ?.then((res)=>{
        if (res.status === 200) {
          setGroups(res.data)
        }
      })
      .catch((err)=>console.error("Error fetching data of ", err))
      .finally(()=>{
        setLoading(prev=> ({...prev, groups:false}))
      })
    }
  },[globalData])
  
  return (
    <div>Add_Competition</div>
  )
}

export default Add_Competition