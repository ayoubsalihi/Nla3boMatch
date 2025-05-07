import { useEffect } from "react"
import { useDispatch, useSelector } from "react-redux"
import { ReduxState } from "../interfaces/interfaces" 
import { send_request } from './send_request';
import { initialState, save_data } from "../redux/slices/GlobalDataSlice";

export default function FetchData() {
    const dispatch = useDispatch()
    const user_data = useSelector((state : ReduxState) => state.user_data?.data)
    useEffect(()=>{
        const routes: (keyof initialState)[] = ["academies","chat", "competitions" , "goalkeepers" , "groups", "inside_players", "messages", "players", "posts", "teams", "terrains", "videos"] 
        if(!user_data) return
        const requests = routes.map((route) => send_request('GET', route))
        Promise.allSettled(requests)
            .then((results) => {
            results.forEach((result, index) => {
                if (result.status === "fulfilled") {
                dispatch(save_data({
                    route: routes[index],
                    data: result.value.data
                }))
                } else {
                console.error(`Error fetching ${routes[index]}:`, result.reason)
                }
            })
            })

    }, [user_data, dispatch])
  return (
    <></>
  )
}
