import { createSlice, PayloadAction } from "@reduxjs/toolkit";
import { WritableDraft } from "immer";
import { Academy, Chat, Competition, Goalkeeper, Group, InsidePlayer, Message, Player, Post, Team, Terrain, Video } from "../../interfaces/interfaces";


type SaveDataPayload<K extends keyof initialState = keyof initialState> = {
    route: K;
    data: initialState[K];
  };
export type initialState = {
    players: Player[];
    teams: Team[];
    terrains: Terrain[];
    videos: Video[];
    posts: Post[];
    messages: Message[];
    inside_players: InsidePlayer[];
    goalkeepers: Goalkeeper[];
    academies: Academy[];
    competitions: Competition[];
    groups: Group[];
    chat: Chat[];
}


const initialState: initialState = {
    players: [],
    teams: [],
    terrains: [],
    videos: [],
    posts: [],
    messages: [],
    inside_players: [],
    goalkeepers: [],
    academies: [],
    competitions: [],
    groups: [],
    chat: []
}

const global_data_slice = createSlice({
    name: "global_data",
    initialState,
    reducers:{
        save_data: <K extends keyof initialState>(state: WritableDraft<initialState>, action: PayloadAction<SaveDataPayload<K>>) => {
            state[action.payload.route] = action.payload.data;
          }
    }
})

export const { save_data} = global_data_slice.actions;
export default global_data_slice.reducer;