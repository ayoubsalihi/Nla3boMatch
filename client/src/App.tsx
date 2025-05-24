import { useEffect, useState } from "react";
import { useDispatch, useSelector } from "react-redux";
import { Outlet, useNavigate } from "react-router-dom";
import { save_user_account, logout_user_account } from "./redux/slices/UserDataSlice";
import { send_request } from "./helpers/send_request";
import { RootState } from "./redux/store";
import axios from "axios";
import Cookies from "js-cookie";
import { ReduxState } from "./interfaces/interfaces";
import { save_data } from "./redux/slices/GlobalDataSlice";
import { reset_action } from "./redux/slices/ActionsSlice";

const App: React.FC = () => {
  const dispatch = useDispatch();
  const navigate = useNavigate();
  // const location = useLocation();
  const [loading, setLoading] = useState(true);
  const action_state = useSelector((state: ReduxState) => state.actions)
  const user = useSelector((state: RootState) => state.auth.user);
  const is_logged = useSelector((state: ReduxState) =>  state.user_data.logged)
  useEffect(() => {
    const checkAuth = async () => {
      try {
        // Ensure CSRF cookie is set
        await axios.get(import.meta.env.VITE_CSRF_URL, { withCredentials: true });
        
        // Check auth status
        if (is_logged && user?.type_utilisateur === 'admin') {
          navigate('admin/dashboard')
          return
        }
        const response = await send_request('GET', 'current_user')
        .then((response)=>{
          dispatch(save_user_account(response.data))
          navigate('admin/dashboard')
        })
        dispatch(save_user_account(response.data));
      } catch (error) {
        if (axios.isAxiosError(error) && error.response?.status === 401) {
          Cookies.remove('sanctum_token');
          dispatch(logout_user_account());
          navigate('/login');
        }
      } finally {
        setLoading(false);
      }
    };

    if (!user) checkAuth();
  }, [dispatch, navigate, is_logged , user]);

  useEffect(()=>{
    if (action_state.data_changed && action_state.route) {
      send_request('GET',action_state.route)
      .then((res)=>{
        if (res.status === 200) {
          dispatch(save_data({route:action_state.route, date:res.data}))

        }
        dispatch(reset_action())
      })
    }
  },[action_state,dispatch])

  if (loading) {
    return (
      <div className="w-screen h-screen flex items-center justify-center">
        <div className="animate-spin rounded-full h-12 w-12 border-t-2 border-b-2 border-blue-500"></div>
      </div>
    );
  }

  return (
    <div className="w-screen h-screen overflow-hidden flex flex-col relative">
      <main className="flex-1 overflow-auto">
        <Outlet />
      </main>
    </div>
  );
};

export default App;