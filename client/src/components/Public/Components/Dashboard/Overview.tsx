  import { useState, useEffect, useCallback } from 'react';
  import { useDispatch } from 'react-redux';
  import { logout_user_account } from '../../../../redux/slices/UserDataSlice';
  import { menuData } from './Sidebar/MenuData';
  import CollapsedSidebar from './Sidebar/CollapsedSideBar';
  import ExpandedSidebar from './Sidebar/ExpandedSidebar';

  interface SidebarProps {
    onSidebarToggle: (isOpen: boolean) => void;
  }

  const Sidebar = ({ onSidebarToggle }: SidebarProps) => {
    const dispatch = useDispatch();
    const [isSidebarOpen, setIsSidebarOpen] = useState(false);
    const [expandedItems, setExpandedItems] = useState<string[]>([]);
    const [hoveredItem, setHoveredItem] = useState<string | null>(null);

    const toggleExpand = (itemId: string) => {
      setExpandedItems(prev =>
        prev.includes(itemId)
          ? prev.filter(id => id !== itemId)
          : [...prev, itemId]
      );
    };

    const isExpanded = (itemId: string) => expandedItems.includes(itemId);

    const toggleSidebar = useCallback(() => {
      const newState = !isSidebarOpen;
      setIsSidebarOpen(newState);
      onSidebarToggle(newState);
    }, [isSidebarOpen, onSidebarToggle]);

    const openSidebar = useCallback(() => {
      if (!isSidebarOpen) {
        setIsSidebarOpen(true);
        onSidebarToggle(true);
      }
    }, [isSidebarOpen, onSidebarToggle]);

    const handleLogout = useCallback(() => {
      dispatch(logout_user_account());
    }, [dispatch]);

    useEffect(() => {
      const handleEsc = (event: KeyboardEvent) => {
        if (event.key === 'Escape' && isSidebarOpen) {
          toggleSidebar();
        }
      };

      window.addEventListener('keydown', handleEsc);
      return () => {
        window.removeEventListener('keydown', handleEsc);
      };
    }, [isSidebarOpen, toggleSidebar]);

    return (
      <>
        <CollapsedSidebar
          isSidebarOpen={isSidebarOpen}
          menuData={menuData}
          hoveredItem={hoveredItem}
          setHoveredItem={setHoveredItem}
          openSidebar={openSidebar}
          handleLogout={handleLogout}
          toggleSidebar={toggleSidebar}
        />
        
        <ExpandedSidebar
          isSidebarOpen={isSidebarOpen}
          menuData={menuData}
          isExpanded={isExpanded}
          toggleExpand={toggleExpand}
          toggleSidebar={toggleSidebar}
          handleLogout={handleLogout}
        />
      </>
    );
  };

  export default Sidebar;