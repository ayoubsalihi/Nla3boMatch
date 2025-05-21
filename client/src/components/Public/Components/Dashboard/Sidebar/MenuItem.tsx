import { Link } from 'react-router-dom';
import { MenuItem } from './MenuData';
import SubMenuItemComponent from './SubMenuItem';

interface MenuItemProps {
  item: MenuItem;
  isExpanded: (itemId: string) => boolean;
  toggleExpand: (itemId: string) => void;
}

const MenuItemComponent = ({ item, isExpanded, toggleExpand }: MenuItemProps) => {
  const hasChildren = item.children && item.children.length > 0;
  const isItemExpanded = isExpanded(item.id);

  return (
    <div key={item.id} className="w-full">
      {item.link && !hasChildren ? (
        <Link to={item.link}>
          <div className="flex items-center justify-between p-2 hover:bg-blue-50 rounded-md cursor-pointer transition-all duration-300 ease-in-out">
            <div className="flex items-center gap-3">
              <span className="text-blue-500">{item.icon}</span>
              <span className="text-gray-700">{item.label}</span>
            </div>
          </div>
        </Link>
      ) : (
        <div
          className="flex items-center justify-between p-2 hover:bg-blue-50 rounded-md cursor-pointer transition-all duration-300 ease-in-out"
          onClick={() => toggleExpand(item.id)}
        >
          <div className="flex items-center gap-3">
            <span className="text-blue-500">{item.icon}</span>
            <span className="text-gray-700">{item.label}</span>
          </div>
          {hasChildren && (
            <svg
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              strokeWidth={1.5}
              stroke="currentColor"
              className={`h-4 w-4 transition-transform duration-300 ease-in-out ${isItemExpanded ? 'rotate-180' : ''}`}
            >
              <path strokeLinecap="round" strokeLinejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
            </svg>
          )}
        </div>
      )}

      {hasChildren && (
        <div className={`overflow-hidden transition-all duration-300 ease-in-out ${isItemExpanded ? 'max-h-96 opacity-100' : 'max-h-0 opacity-0'}`}>
          {item.children?.map(child => (
            <SubMenuItemComponent key={child.id} item={child} level={1} />
          ))}
        </div>
      )}
    </div>
  );
};

export default MenuItemComponent;