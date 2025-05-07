import { createSlice } from '@reduxjs/toolkit';


type initialState = {
    logged: boolean,
    data: object | null,
} | null


const initialState: initialState = {
    logged: false,
    data: null,
}

const user_data_Slice = createSlice({
    name: 'user_data',
    initialState,
    reducers: {
        save_user_account: (state, action) => {
            state.logged = true;
            state.data = action.payload;
        },

        logout_user_account: (state) => {
            state.logged = false;
            state.data = null;
        }
    }
})

export const { save_user_account, logout_user_account } = user_data_Slice.actions;
export default user_data_Slice.reducer;