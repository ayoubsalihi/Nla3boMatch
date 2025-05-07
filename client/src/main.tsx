import './index.css'
import { Provider } from 'react-redux'
import { createBrowserRouter, RouterProvider } from 'react-router-dom'
import store from './redux/store'
import React from 'react'
import App from './App'
import Unauthorized from './components/Errors/ErrorBoundary'
import ReactDOM from 'react-dom/client'
import Login from './components/Errors/Login'
import HeroPage from './components/Public/HeroPage'

const router = createBrowserRouter([
  {
    path: '/',
    element: <App/>,
    children:[
      {index:true, element: <HeroPage /> },
      {path:'login',element:<Login/>},
      {path:'unauthorized',element:<Unauthorized/>},
      {}
    ]
  }
])

ReactDOM.createRoot(document.getElementById('root')!).render(
  <React.StrictMode>
    <Provider store={store}>
      <RouterProvider router={router} />
    </Provider>
  </React.StrictMode>
)
