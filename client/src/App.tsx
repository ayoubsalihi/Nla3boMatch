import { useEffect, useState } from "react";
import { useDispatch, useSelector } from "react-redux";
import { Outlet, useNavigate, useLocation } from "react-router-dom";
import { save_user_account } from "./redux/slices/UserDataSlice";
import { send_request } from "./helpers/send_request";
import { RootState } from "./redux/store";

const App: React.FC = () => {
  const dispatch = useDispatch();
  const navigate = useNavigate();
  const location = useLocation();
  const [loading, setLoading] = useState(true);
  const user = useSelector((state: RootState) => state.auth.user);

  useEffect(() => {
    const checkAuth = async () => {
      try {
        // Only check auth if we don't already have a user
        if (!user) {
          const response = await send_request('GET', 'current_user');
          dispatch(save_user_account(response.data));
        }
      } catch (error) {
        console.error('Authentication check failed:', error);
      } finally {
        setLoading(false);
      }
    };

    checkAuth();
  }, [dispatch, user]); // Add user to dependencies

  useEffect(() => {
    // Handle redirection based on user state
    if (!loading) {
      const isPublicRoute = ['/', '/auth/login', '/auth/register'].includes(location.pathname);
      const isProtectedRoute = location.pathname.startsWith('/admin') || 
                              location.pathname.startsWith('/user');

      if (user) {
        // Redirect logged-in users from public routes
        if (isPublicRoute) {
          navigate(user.type_utilisateur === 'admin' ? '/admin' : '/user');
        }
      } else {
        // Redirect unauthenticated users from protected routes
        if (isProtectedRoute) {
          navigate('/auth/login', { state: { from: location } });
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