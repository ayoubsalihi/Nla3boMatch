import { createSlice } from "@reduxjs/toolkit";
import { Academy, Admin, Competition, Goalkeeper, Group, Image, InsidePlayer, Message, Partido, Player, Post, Team, Terrain, User, Video } from "../../interfaces/interfaces";

type ModalSize = 'sm' | 'md' | 'lg' | 'xl' | 'full' | '2xl' | '3xl' | '4xl' | '5xl' | '6xl' | '7xl';

export type ActiveElementState = {
    current_element: Player | User | InsidePlayer | Goalkeeper | Team | Terrain | Academy | Group | Partido | Admin | Competition | Image | Video | Message | Post | null,
    element_type: 'player' | 'user' | 'inside_player' | 'goalkeeper' | 'team' | 'terrain' | 'academy' | 'group' | 'partido' | 'admin' | 'competition' | 'image' | 'video' | 'message' | 'post' | null,
    action_type: 'create' | 'update' | 'delete' | 'read' | null,
    model_is_open: boolean,
    modal_size: ModalSize,
    modal_width: ModalSize,
    modal_height: string,
    show_footer: boolean,
    show_header: boolean,
    custom_class: string,
    currentRowId?: number,
}

const initialState: ActiveElementState = {
    current_element: null,
    element_type: null,
    action_type: null,
    model_is_open: false,
    modal_size: 'md',
    modal_width: 'md',
    modal_height: 'auto',
    show_footer: true,
    show_header: true,
    custom_class: '',
}

const active_element_slice = createSlice({
    name: 'active_element',
    initialState,
    reducers: {
        set_active_element: (state, action) => {
            state.current_element = action.payload.current_element;
            state.element_type = action.payload.element_type;
            state.action_type = action.payload.action_type;
            state.model_is_open = true;
            if (action.payload.modal_width) state.modal_width = action.payload.modal_width
            if (action.payload.modal_height) state.modal_height = action.payload.modal_height
            if (action.payload.show_footer !== undefined) state.show_footer = action.payload.show_footer
            if (action.payload.show_header !== undefined) state.show_header = action.payload.show_header
            if (action.payload.custom_class) state.custom_class = action.payload.custom_class
        },
        reset_active_element: (state) => {
            state.current_element = null;
            state.element_type = null;
            state.action_type = null;
            state.model_is_open = false;
            state.modal_width = initialState.modal_width;
            state.modal_height = initialState.modal_height;
            state.show_footer = initialState.show_footer;
            state.show_header = initialState.show_header;
            state.custom_class = initialState.custom_class;

        },
        update_modal_style: (state, action) => {
            if (action.payload.modal_width) state.modal_width = action.payload.modal_width;
            if (action.payload.modal_height) state.modal_height = action.payload.modal_height;
            if (action.payload.show_footer !== undefined) state.show_footer = action.payload.show_footer;
            if (action.payload.show_header !== undefined) state.show_header = action.payload.show_header;
            if (action.payload.custom_class) state.custom_class = action.payload.custom_class;
        }
    },
});

export const { set_active_element, reset_active_element, update_modal_style } = active_element_slice.actions;
export default active_element_slice.reducer;