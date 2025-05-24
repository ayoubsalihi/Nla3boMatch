import { send_request } from '../helpers/send_request';
import { Route } from '../interfaces/interfaces';
import { AppDispatch } from './store';
import { save_data } from './slices/GlobalDataSlice';

export const fetchDashboardData = () => async (dispatch: AppDispatch) => {
    const routes: Route[] = [
        'academies',
        'chat',
        'competitions',
        'goalkeepers',
        'groups',
        'inside_players',
        'messages',
        'players',
        'posts',
        'teams',
        'terrains',
        'videos',
    ];
  
    try {
      const responses = await Promise.all(
        routes.map(route => send_request('GET', route))
      );
  
      routes.forEach((route, index) => {
        if (responses[index].status === 200) {
          dispatch(save_data({ route, data: responses[index].data }));
        }
      });
    } catch (error) {
      console.error('Error fetching dashboard data:', error);
    }
  };
  