import { Link } from 'react-router-dom';
import { SubMenuItem } from './MenuData';

interface SubMenuItemProps {
  item: SubMenuItem;
  level: number;
}

const SubMenuItemComponent = ({ item }: SubMenuItemProps) => {

  return (
    <div key={item.id} className="w-full">
      {item.link ? (
        <Link to={item.link}>
          <div className={`flex items-center justify-between py-2 pl-8 pr-3 cursor-pointer hover:bg-blue-50 rounded-md transition-all duration-300 ease-in-out`}>
            <div className="flex items-center gap-2">
              <span className="text-gray-700">{item.label}</span>
            </div>
          </div>
        </Link>
      ) : (
        <div className={`flex items-center justify-between py-2 pl-8 pr-3 cursor-pointer hover:bg-blue-50 rounded-md transition-all duration-300 ease-in-out`}>
          <div className="flex items-center gap-2">
            <span className="text-gray-700">{item.label}</span>
          </div>
        </div>
      )}
    </div>
  );
};

export default SubMenuItemComponent;