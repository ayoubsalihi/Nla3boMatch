import { createSlice } from '@reduxjs/toolkit';

type initialState = {
    data_changed: boolean
    route: string | null
}
const initialState : initialState = { 
  data_changed: false, 
  route: null,
}
const actions_slice = createSlice({
  name: 'actions',
  initialState,
  reducers: {
    invoke_action: (state, action) => {
      state.data_changed = true
      state.route = action.payload
    },
    reset_action: (state) => {
      state.data_changed = false
      state.route = null
    }
  },
});

export const { invoke_action, reset_action} = actions_slice.actions;
export default actions_slice.reducer;