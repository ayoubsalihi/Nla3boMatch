import { useDispatch, useSelector } from "react-redux";
import { RootState } from "../../../../../../../../redux/store";
import { useEffect, useState } from "react";
import { Competition } from "../../../../../../../../interfaces/interfaces";


type ModalSize = 'sm' | 'md' | 'lg' | 'xl' | 'full' | '2xl' | '3xl' | '4xl' | '5xl' | '6xl' | '7xl';
const CompetitionDetailsModal = () => {
    const ActiveElement = useSelector((state: RootState) => state.active_element);
    const dispatch = useDispatch();
    const [loading, setLoading] = useState(true);
    useEffect(() => {
        if (ActiveElement.model_is_open && ActiveElement.action_type === 'read') {
            const timer = setTimeout(() => {
                setLoading(false);
            }, 500);
            return () => clearTimeout(timer);
        }
    }, [ActiveElement.model_is_open, ActiveElement.action_type]);

    if (!ActiveElement.model_is_open) return null;

    const sizeClasses: Record<ModalSize, string> = {
        sm: 'w-[300px]',
        md: 'w-[500px]',
        lg: 'w-[800px]',
        xl: 'w-[1140px]',
        '2xl': 'w-[1300px]',
        '3xl': 'w-[1500px]',
        '4xl': 'w-[1700px]',
        '5xl': 'w-[1900px]',
        '6xl': 'w-[2100px]',
        '7xl': 'w-[2300px]',
        full: 'w-full'
    };

    const widthClass = sizeClasses[ActiveElement.modal_width as ModalSize] || sizeClasses.md;
    
    if (
        ActiveElement.action_type !== 'create' &&
        (!ActiveElement.current_element || !ActiveElement.current_element.id)
    ) return null;

    const competition = ActiveElement.current_element as Competition;
  return (
    <div className="fixed inset-0 z-50 flex items-center justify-center p-4">
            <div 
                className="fixed inset-0 backdrop-blur-sm bg-black/30 transition-opacity duration-300"
                onClick={() => dispatch(reset_active_element())}
                aria-hidden="true"
            />
            <div 
                className={`relative bg-white rounded-lg shadow-xl overflow-hidden transform transition-all ${widthClass} ${ActiveElement.custom_class}`}
                style={{ 
                    height: ActiveElement.modal_height,
                    animation: 'modalFadeIn 0.3s ease-out'
                }}
            >
                {ActiveElement.show_header && (
                    <div className="px-6 py-4 border-b border-gray-200 bg-gray-50 flex justify-between items-center">
                        <h3 className="text-lg font-semibold text-gray-900">
                            {ActiveElement.action_type === 'add' && 'Add New Command'}
                            {ActiveElement.action_type === 'edit' && 'Edit Command'}
                            {ActiveElement.action_type === 'delete' && 'Delete Command'}
                            {ActiveElement.action_type === 'view' && `Command Details #${command.id}`}
                        </h3>
                        <button
                            onClick={() => dispatch(reset_active_element())}
                            className="text-gray-400 hover:text-gray-500 focus:outline-none"
                            aria-label="Close"
                        >
                            <XMarkIcon className="h-6 w-6" />
                        </button>
                    </div>
                )}
                <div className="p-6 overflow-y-auto max-h-[calc(100vh-200px)]">
                    {ActiveElement.action_type === 'update' ? (
                        <Update_competition />
                    ) : ActiveElement.action_type === 'create' ? (
                        <Add_competition />
                    ) : ActiveElement.action_type === 'delete' ? (
                        <Delete_competition id={competition.id!} />
                    ) : (
                        <View_competition competition={competition} loading={loading} />
                    )}
                </div>
            </div>
        </div>
  )
}

export default CompetitionDetailsModal