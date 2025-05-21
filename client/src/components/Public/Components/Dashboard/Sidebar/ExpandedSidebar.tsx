import { Link } from 'react-router-dom';
import { MenuGroup } from './MenuData';
import MenuItemComponent from './MenuItem';

interface ExpandedSidebarProps {
  isSidebarOpen: boolean;
  menuData: MenuGroup[];
  isExpanded: (itemId: string) => boolean;
  toggleExpand: (itemId: string) => void;
  toggleSidebar: () => void;
  handleLogout: () => void;
}

const ExpandedSidebar = ({
  isSidebarOpen,
  menuData,
  isExpanded,
  toggleExpand,
  toggleSidebar,
  handleLogout
}: ExpandedSidebarProps) => {
  return (
<div
  className={`
    fixed inset-y-0 left-0
    w-[270px]
    bg-white shadow-lg
    transform transition-transform duration-300 ease-in-out
    ${isSidebarOpen ? 'translate-x-0' : '-translate-x-full'}
    z-50
  `}
>
      <div className="h-full w-full p-4 flex flex-col overflow-y-auto">
        {/* Close Icon */}
        <button
          onClick={toggleSidebar}
          className="absolute top-4 right-4 p-2 rounded-md hover:bg-gray-200 focus:outline-none transition-all duration-300 ease-in-out"
        >
          <svg
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            strokeWidth={1.5}
            stroke="currentColor"
            className="h-6 w-6 stroke-2"
          >
            <path
              strokeLinecap="round"
              strokeLinejoin="round"
              d="M6 18L18 6M6 6l12 12"
            />
          </svg>
        </button>

        <div className="mb-6 flex items-center gap-2 p-2">
          <div className="text-blue-500 text-2xl font-bold">F</div>
          <h5 className="text-xl font-medium text-blue-600">SEIF-EDDINE FISH</h5>
        </div>

        {menuData.map((group, index) => (
          <div key={index} className="mb-4">
            <h6 className="text-xs font-medium text-gray-500 mb-2 px-2">{group.heading}</h6>
            <div className="space-y-1">
              {group.items.map(item => (
                <MenuItemComponent
                  key={item.id}
                  item={item}
                  isExpanded={isExpanded}
                  toggleExpand={toggleExpand}
                />
              ))}
            </div>
          </div>
        ))}

        {/* Profile Section */}
        <div className="mt-auto bg-blue-50 p-4 rounded-md flex items-center gap-3">
          <div className="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-500">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              strokeWidth={1.5}
              stroke="currentColor"
              className="h-6 w-6"
            >
              <path
                strokeLinecap="round"
                strokeLinejoin="round"
                d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"
              />
            </svg>
          </div>
          <div>
            <h6 className="text-base font-medium">Admin</h6>
            <p className="text-sm text-gray-500">Administrator</p>
          </div>
        </div>

        {/* Logout Section */}
        <div className="mt-4 flex justify-between">
          <Link to="/dashboard/profile" className="flex-1 mr-2">
            <button className="w-full flex items-center justify-center gap-2 py-2 px-4 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-md transition-all duration-300 ease-in-out">
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
              <span>Settings</span>
            </button>
          </Link>

          <button
            onClick={handleLogout}
            className="flex-1 ml-2 flex items-center justify-center gap-2 py-2 px-4 bg-red-50 hover:bg-red-100 text-red-600 rounded-md transition-all duration-300 ease-in-out"
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
            <span>Logout</span>
          </button>
        </div>
      </div>
    </div>
  );
};

export default ExpandedSidebar;