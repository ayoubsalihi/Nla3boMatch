import active_element_slice from './slices/ActiveElement';
import actions_slice from './slices/ActionsSlice';
import global_data_slice from './slices/GlobalDataSlice';
import user_data_Slice from './slices/UserDataSlice';
import { configureStore } from '@reduxjs/toolkit';
import authReducer from './slices/AuthSlice';
export const store = configureStore({
    reducer: {
        auth: authReducer,
      user_data: user_data_Slice,
      global_data: global_data_slice,
      actions: actions_slice,
      active_element: active_element_slice,
    }
  });
  
  
  export type RootState = ReturnType<typeof store.getState>;
  export type AppDispatch = typeof store.dispatch;
  
  export default store;