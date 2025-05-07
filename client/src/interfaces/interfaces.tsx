import { ActiveElementState } from "../redux/slices/ActiveElement";
import { initialState } from "../redux/slices/GlobalDataSlice";

export interface Player{
    id?: number;
    poste: string;
    user_id?: number;
    team_id?: number;
    created_at?: string | null;
    updated_at?: string | null;
}

export interface User{
    id?: number;
    email: string;
    password: string;
    nom: string;
    prenom: string;
    cin: string;
    type_utilisateur?: 'player' | 'admin' ;
    telephone: string;
    ville_residence: string;
    quartier: string;
    created_at?: string | null;
    updated_at?: string | null;

}

export interface Team{
    id?: number;
    intitule_team: string;
    type_team?: string;
    size_team?: number | string;
    responsable?: string;
    terrain_id?:string;
    created_at?: string | null;
    updated_at?: string | null;

}

export interface Video{
    id?:number;
    intitule: string;
    description: string;
    post_id: number;
    created_at?: string | null;
    updated_at?: string | null;
}

export interface Terrain{
    id?: number;
    intitule_terrain: string;
    created_at?: string | null;
    updated_at?: string | null;
}

export interface TeamChat{
    id?: number;
    team_id?: number;
    created_at?: string | null;
    updated_at?: string | null;
}

export interface Partido{
    id?: number;
    type_match: string;
    level_match: string;
    result: string;
    round: string;
    competition_id?:number;
    team1_id?: number;
    team2_id?: number;
    terrain_id?: number;
    created_at?: string | null;
    updated_at?: string | null;
}

export interface Post{
    description: string;
    type_post: string;
    user_id?: number;
    partido_id?: number;
    competition_id?:number;
    created_at?: string | null;
    updated_at?: string | null;
}

export interface Message{
    id?: number;
    message: string;
    chat_id?: number;
    sender_id?: number;
    team_chat_id?: number;
    created_at?: string | null;
    updated_at?: string | null;
}

export interface InsidePlayer{
    id?:number;
    pace:number;
    dribbling:number;
    shooting:number;
    defending: number;
    passing: number;
    physical:number;
    player_id?: number;
    created_at?: string | null;
    updated_at?: string | null;
}

export interface Image{
    id?: number;
    description: string;
    post_id?:number;
    created_at?: string | null;
    updated_at?: string | null;
}

export interface Group{
    id?: number;
    name_group: string;
    competition_id?: number;
    created_at?: string | null;
    updated_at?: string | null;
}

export interface Goalkeeper{
    id?: number;
    diving: number;
    reflex: number;
    kicking: number;
    handling: number;
    positionning: number;
    player_id?: number;
    created_at?: string | null;
    updated_at?: string | null;
}

export interface Competition{
    id?: number;
    intitule_competition: string;
    type_competition: string;
    date_debut: string;
    date_fin: string;
    created_at?: string | null;
    updated_at?: string | null;
}

export interface Chat{
    id?: number;
    user1_id?: number;
    user2_id: number;
    created_at?: string | null;
    updated_at?: string | null;
}

export interface Admin{
    id?:number;
    user_id?: number;
    created_at?: string | null;
    updated_at?: string | null;
}

export interface Academy{
    id?:number;
    name_academy:string;
    reference : number | string;
    responsable: string;
    type_academy: string;
    terrain_id?: number;
    created_at?: string | null;
    updated_at?: string | null;
}

export interface CompetitionTeamPivot{
    id?: number;
    team_id?: number;
    competition_id?: number;
    created_at?: string | null;
    updated_at?: string | null;
}

export interface GroupTeamPivot{
    id?: number;
    points: number;
    GF: number;
    GA: number;
    GD: number;
    group_id?: number;
    team_id?: number;
    created_at?: string | null;
    updated_at?: string | null;
}

export interface PartidoPlayerPivot{
    id?: number;
    partido_id?: number;
    player_id?: number;
    created_at?: string | null;
    updated_at?: string | null;
}

export interface PartidoTeamPivot{
    id?: number;
    partido_id?: number;
    team_id?: number;
    created_at?: string | null;
    updated_at?: string | null;
}

export interface ReduxState{
    user_data: UserDataState;
    global_data: GlobalDataState;
    actions: ActionsState;
    active_element: ActiveElementState;
}

export interface UserDataState{
    logged: boolean;
    data: User;
}

export type GlobalDataState = {
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
} | null

export type ActionsState = {
    data_changed: boolean
    route: keyof initialState
}

export type Route = 'players' | 'teams' | 'terrains' | 'videos' | 'posts' | 'messages' | 'inside_players' | 'goalkeepers' | 'academies' | 'competitions' | 'groups' | 'chat';
