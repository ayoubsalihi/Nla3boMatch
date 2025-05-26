import { ReactNode } from 'react';

interface StatusBadgeProps {
  state: 'pending' | 'completed' | 'canceled' | string;
  children?: ReactNode;
  className?: string;
}

export  const StatusBadge = ({ state, children, className = '' }: StatusBadgeProps) => {
  const getStatusClasses = () => {
    switch (state) {
      case 'hold':
      case 'pending':
        return 'bg-yellow-100 text-yellow-800';
      case 'finished':
      case 'completed':
        return 'bg-green-100 text-green-800';
      case 'canceled':
        return 'bg-red-100 text-red-800';
      default:
        return 'bg-gray-100 text-gray-800';
    }
  };

  return (
    <td className={`px-4 py-2 whitespace-nowrap ${className}`}>
      <span className={`px-2 py-1 text-xs rounded-full ${getStatusClasses()}`}>
        {children || state}
      </span>
    </td>
  );
};

export default StatusBadge;