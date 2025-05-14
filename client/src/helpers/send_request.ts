import axios from "axios";
import Cookies from "js-cookie";
import { Route } from "../interfaces/interfaces";


type MethodType = 'POST' | 'GET' | 'PUT' | 'PATCH' | 'DELETE'
export function send_request(method: MethodType, route : Route | string, data ?: object ) {
    const config = {
        headers: {
          Authorization: `Bearer ${Cookies.get('sanctum_token')}`
        },
        withCredentials: true,
        baseURL: import.meta.env.VITE_API_BASE_URL,
        timeout: parseInt(import.meta.env.VITE_DEFAULT_TIMEOUT || '10000')
    };
    
    if(method == 'GET'){
        return axios.get(
            'http://localhost:8000/api/'+route,
            config
        )
    }
    else if(method == 'POST'){
        return axios.post(
            'http://localhost:8000/api/'+route,
            data,
            config
        )
    }
    else if(method == 'PUT'){
        return axios.put(
            'http://localhost:8000/api/'+route,
            data,
            config
        )
    }
    else if(method == 'PATCH'){
        return axios.patch(
            'http://localhost:8000/api/'+route,
            data,
            config
        )
    }
    else if(method == 'DELETE'){
        return axios.delete(
            'http://localhost:8000/api/'+route,
            config
        )
    }
    else {
        throw new Error(`Unsupported method: ${method}`);
    }
}
