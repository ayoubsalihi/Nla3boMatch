import './index.css';
import { Provider } from 'react-redux';
import { createBrowserRouter, RouterProvider } from 'react-router-dom';
import store from './redux/store';
import React from 'react';
import App from './App';
import ReactDOM from 'react-dom/client';
import axios from 'axios';
import OverviewStatistics from './components/Public/Components/Dashboard/Admin/Overview/OverviewStatistics';
import UsersLayout from './components/Public/Components/Dashboard/Admin/Users/UsersLayout';
import Players from './components/Public/Json/Players';
import Goalkeepers from './components/Public/Components/Dashboard/Admin/Goalkeepers/Goalkeepers';
import InsidePlayers from './components/Public/Components/Dashboard/Admin/InsidePlayers/InsidePlayers';
import CompetitionsLayout from './components/Public/Components/Dashboard/Admin/Competitions/Details/components/CompetitionsLayout';
import CompetitionDetails from './components/Public/Components/Dashboard/Admin/Competitions/Details/CompetitionDetails';
import CompetitionMatches from './components/Public/Components/Dashboard/Admin/Competitions/CompetitionMatches';
import CompetitionGroups from './components/Public/Components/Dashboard/Admin/Competitions/CompetitionGroups';
// import CompetitonStandings from './components/Public/Components/Dashboard/Admin/Competitions/CompetitonStandings';
import Teams from './components/Public/Components/Dashboard/Admin/Teams/Teams';
import ReservationLayout from './components/Public/Components/Dashboard/Admin/Reservations/ReservationLayout';
import TeamsReservations from './components/Public/Components/Dashboard/Admin/Reservations/TeamsReservations';
import AcademyReservations from './components/Public/Components/Dashboard/Admin/Reservations/AcademyReservations';  
import TimelineReservations from './components/Public/Components/Dashboard/Admin/Reservations/TimelineReservations'; 
// import ReservationsMatches from './components/Public/Components/Dashboard/Admin/Reservations/ReservationsMatches';
import Unauthorized from './components/Errors/Unauthorized';
import NotFound from './components/Errors/NotFound';
import LoginPage from './Authentication/Home';
import HeroPage from './components/Public/HeroPage';
import Dashboard from './components/Public/Components/Dashboard/Dahboard';
import ReservationsMatches from './components/Public/Components/Dashboard/Admin/Reservations/ReservationsMatches';
import CompetitonStandings from './components/Public/Components/Dashboard/Admin/Competitions/CompetitonStandings';

axios.defaults.baseURL = import.meta.env.VITE_API_BASE_URL;
axios.defaults.withCredentials = true;
axios.defaults.timeout = parseInt(import.meta.env.VITE_DEFAULT_TIMEOUT || '10000');

// Admin routes configuration
const adminRoutes = [
  {
    path: 'admin/dashboard',
    element: <Dashboard />,
    children: [
      { index: true, element: <OverviewStatistics /> },
      {
        path: 'users',
        element: <UsersLayout />,
        children: [
          { path: 'players', element: <Players /> },
          { path: 'goalkeepers', element: <Goalkeepers /> },
          { path: 'inside-players', element: <InsidePlayers /> }
        ]
      },
      {
        path: 'competitions',
        element: <CompetitionsLayout />,
        children: [
          { 
            path: ':competitionId',
            element: <CompetitionDetails />,
            children: [
              { path: 'matches', element: <CompetitionMatches /> },
              { path: 'groups', element: <CompetitionGroups /> },
              { path: 'standings', element: <CompetitonStandings /> }
            ]
          }
        ]
      },
      {
        path: 'teams',
        element: <Teams />
      },
      {
        path: 'reservations',
        element: <ReservationLayout />,
        children: [
          { path: 'team-reservations', element: <TeamsReservations /> },
          { path: 'academy-reservations', element: <AcademyReservations /> },
          { path: 'timeline', element: <TimelineReservations /> },
          { path: 'matches', element: <ReservationsMatches /> }
        ]
      }
    ]
  }
];

const router = createBrowserRouter([
  {
    path: '/',
    element: <App />,
    children: [
      { index: true, element: <HeroPage /> },
      { path: 'login', element: <LoginPage /> },
      { path: 'unauthorized', element: <Unauthorized /> },
      ...adminRoutes,
      { path: '*', element: <NotFound /> }
    ]
  }
]);

ReactDOM.createRoot(document.getElementById('root')!).render(
  <React.StrictMode>
    <Provider store={store}>
      <RouterProvider router={router} />
    </Provider>
  </React.StrictMode>
);