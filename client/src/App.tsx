import { useEffect, useState } from "react";
import { useDispatch, useSelector } from "react-redux";
import { Outlet, useNavigate, useLocation } from "react-router-dom";
import { save_user_account, logout_user_account } from "./redux/slices/UserDataSlice";
import { send_request } from "./helpers/send_request";
import { RootState } from "./redux/store";
import axios from "axios";
import Cookies from "js-cookie";

const App: React.FC = () => {
  const dispatch = useDispatch();
  const navigate = useNavigate();
  const location = useLocation();
  const [loading, setLoading] = useState(true);
  const user = useSelector((state: RootState) => state.auth.user);
  
  useEffect(() => {
    const checkAuth = async () => {
      try {
        // Ensure CSRF cookie is set
        await axios.get(import.meta.env.VITE_CSRF_URL, { withCredentials: true });
        
        // Check auth status
        const response = await send_request('GET', 'current_user');
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
  }, [dispatch, navigate, user]);

  useEffect(() => {
    if (!loading) {
      const isPublicRoute = ['/', '/login', '/register'].includes(location.pathname);
      const isAdminRoute = location.pathname.startsWith('/admin');

      if (user) {
        // Redirect admins from public routes to dashboard
        if (isPublicRoute && user.type_utilisateur === 'admin') {
          navigate('/admin/dashboard');
        }
        // Prevent non-admins from accessing admin routes
        if (isAdminRoute && user.type_utilisateur !== 'admin') {
          navigate('/unauthorized');
        }
      } else {
        // Redirect unauthenticated users trying to access protected routes
        if (isAdminRoute) {
          navigate('/login', { state: { from: location } });
        }
      }
    }
  }, [user, loading, location, navigate]);

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