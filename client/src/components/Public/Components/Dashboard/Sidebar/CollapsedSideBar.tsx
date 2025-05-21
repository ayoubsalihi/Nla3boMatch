import { Link } from 'react-router-dom';
import { MenuGroup } from './MenuData';

interface CollapsedSidebarProps {
  isSidebarOpen: boolean;
  menuData: MenuGroup[];
  hoveredItem: string | null;
  setHoveredItem: (id: string | null) => void;
  openSidebar: () => void;
  handleLogout: () => void;
  toggleSidebar: () => void;
}

const CollapsedSidebar = ({
  isSidebarOpen,
  menuData,
  hoveredItem,
  setHoveredItem,
  openSidebar,
  handleLogout,
  toggleSidebar
}: CollapsedSidebarProps) => {
  return (
<div
  className={`
    fixed inset-y-0 left-0
    w-16
    bg-white shadow-md
    flex flex-col items-center pt-16 pb-4
    transform transition-transform duration-300 ease-in-out
    ${isSidebarOpen ? '-translate-x-full' : 'translate-x-0'}
    z-40
  `}
>
      <button
        onClick={toggleSidebar}
        className="absolute top-4 left-4 p-2 rounded-md hover:bg-gray-200 focus:outline-none transition-all duration-300 ease-in-out"
        aria-label="Toggle Sidebar"
      >
        <svg
          xmlns="http://www.w3.org/2000/svg"
          fill="none"
          viewBox="0 0 24 24"
          strokeWidth={1.5}
          stroke="currentColor"
          className="h-6 w-6 stroke-2 transition-transform duration-300 ease-in-out"
        >
          <path
            strokeLinecap="round"
            strokeLinejoin="round"
            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"
          />
        </svg>
      </button>

      <div className="flex flex-col items-center justify-between h-full">
        <div className="flex flex-col items-center">
          <div className="text-blue-500 font-bold text-2xl">F</div>
          <div className="text-gray-300">...</div>

          {menuData[0].items.map(item => (
            <div key={item.id} className="relative" onMouseEnter={() => setHoveredItem(item.id)} onMouseLeave={() => setHoveredItem(null)}>
              <button
                onClick={openSidebar}
                className="p-2 rounded-md hover:bg-blue-100 cursor-pointer transition-all duration-300 ease-in-out text-gray-600 hover:text-blue-500"
              >
                {item.icon}
              </button>

              {hoveredItem === item.id && (
                <div className="absolute left-16 top-1/2 -translate-y-1/2 bg-gray-800 text-white px-2 py-1 rounded text-sm whitespace-nowrap z-50">
                  {item.label}
                </div>
              )}
            </div>
          ))}

          <div className="text-gray-300">...</div>

          {menuData[1].items.map(item => (
            <div key={item.id} className="relative" onMouseEnter={() => setHoveredItem(item.id)} onMouseLeave={() => setHoveredItem(null)}>
              <button
                onClick={openSidebar}
                className="p-2 rounded-md hover:bg-blue-100 cursor-pointer transition-all duration-300 ease-in-out text-gray-600 hover:text-blue-500"
              >
                {item.icon}
              </button>

              {hoveredItem === item.id && (
                <div className="absolute left-16 top-1/2 -translate-y-1/2 bg-gray-800 text-white px-2 py-1 rounded text-sm whitespace-nowrap z-50">
                  {item.label}
                </div>
              )}
            </div>
          ))}

          <div className="text-gray-300">...</div>

          {menuData[2].items.map(item => (
            <div key={item.id} className="relative" onMouseEnter={() => setHoveredItem(item.id)} onMouseLeave={() => setHoveredItem(null)}>
              <button
                onClick={openSidebar}
                className="p-2 rounded-md hover:bg-blue-100 cursor-pointer transition-all duration-300 ease-in-out text-gray-600 hover:text-blue-500"
              >
                {item.icon}
              </button>

              {hoveredItem === item.id && (
                <div className="absolute left-16 top-1/2 -translate-y-1/2 bg-gray-800 text-white px-2 py-1 rounded text-sm whitespace-nowrap z-50">
                  {item.label}
                </div>
              )}
            </div>
          ))}

          <div className="text-gray-300">...</div>

          {menuData[3].items.map(item => (
            <div key={item.id} className="relative" onMouseEnter={() => setHoveredItem(item.id)} onMouseLeave={() => setHoveredItem(null)}>
              <button
                onClick={openSidebar}
                className="p-2 rounded-md hover:bg-blue-100 cursor-pointer transition-all duration-300 ease-in-out text-gray-600 hover:text-blue-500"
              >
                {item.icon}
              </button>

              {hoveredItem === item.id && (
                <div className="absolute left-16 top-1/2 -translate-y-1/2 bg-gray-800 text-white px-2 py-1 rounded text-sm whitespace-nowrap z-50">
                  {item.label}
                </div>
              )}
            </div>
          ))}
        </div>

        <div className="flex flex-col items-center mb-4 space-y-2">
          <div className="relative" onMouseEnter={() => setHoveredItem('settings')} onMouseLeave={() => setHoveredItem(null)}>
            <Link to="/dashboard/profile">
              <button className="p-2 rounded-md hover:bg-blue-100 cursor-pointer transition-all duration-300 ease-in-out text-gray-600 hover:text-blue-500">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  strokeWidth={1.5}
                  stroke="currentColor"
                  className="h-5 w-5"
                >
                  <path
                    strokeLinecap="round"
                    strokeLinejoin="round"
                    d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 010 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281z"
                  />
                  <path
                    strokeLinecap="round"
                    strokeLinejoin="round"
                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
                  />
                </svg>
              </button>
            </Link>
            {hoveredItem === 'settings' && (
              <div className="absolute left-16 top-1/2 -translate-y-1/2 bg-gray-800 text-white px-2 py-1 rounded text-sm whitespace-nowrap z-50">
                Settings
              </div>
            )}
          </div>

          <div className="relative" onMouseEnter={() => setHoveredItem('logout')} onMouseLeave={() => setHoveredItem(null)}>
            <button
              onClick={handleLogout}
              className="p-2 rounded-md hover:bg-red-100 cursor-pointer transition-all duration-300 ease-in-out text-gray-600 hover:text-red-500"
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                strokeWidth={1.5}
                stroke="currentColor"
                className="h-5 w-5"
              >
                <path
                  strokeLinecap="round"
                  strokeLinejoin="round"
                  d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75"
                />
              </svg>
            </button>
            {hoveredItem === 'logout' && (
              <div className="absolute left-16 top-1/2 -translate-y-1/2 bg-gray-800 text-white px-2 py-1 rounded text-sm whitespace-nowrap z-50">
                Logout
              </div>
            )}
          </div>
        </div>
      </div>
    </div>
  );
};

export default CollapsedSidebar;