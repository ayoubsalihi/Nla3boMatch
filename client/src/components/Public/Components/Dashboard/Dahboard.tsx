import { useEffect, useState } from 'react';
import { Outlet } from 'react-router-dom';
import Sidebar from './Overview';
import {  useDispatch, useSelector } from 'react-redux';
import { fetchDashboardData } from '../../../../redux/thunks';
import { ReduxState } from '../../../../interfaces/interfaces';

const Dashboard = () => {
  const [, setIsSidebarOpen] = useState(false);
  const dispatch = useDispatch()
  const global_data = useSelector((state: ReduxState) => state.global_data);
  const handleSidebarToggle = (isOpen: boolean) => {
    setIsSidebarOpen(isOpen);
  };

  useEffect(() => {
    console.log('Fetching dashboard data...');
    dispatch(fetchDashboardData());
  }, [dispatch]);

  useEffect(() => {
    console.log('Global Data:', global_data);
  }, [global_data]);

  return (
    <div className="min-h-screen bg-gray-50 flex">
      <Sidebar onSidebarToggle={handleSidebarToggle} />

      <main className="min-h-screen flex-grow  pl-16">

        <div className="p-6">
          <h1 className="text-2xl font-bold mb-6">Dashboard</h1>
          <Outlet />
        </div>
      </main>
    </div>
  );
};

export default Dashboard;