import { useDispatch } from "react-redux";
import { set_active_element } from "../../../../../../../../redux/slices/ActiveElement";
import Action_Btns from "../../../Global_Components/Action_Btns";
import StatusBadge from "./StatusBadge";
import { Competition } from "../../../../../../../../interfaces/interfaces";

interface Props {
    competition: Competition;
}

const Table_tr_command: React.FC<Props> = ({ command }) => {
    const dispatch = useDispatch();
    const formatTotalCost = () => {
        const cost = Number(command.total_cost);
        return isNaN(cost) ? '0.00 MAD' : `${cost.toFixed(2)} MAD`;
    };

    const openDetailsModal = () => {
        dispatch(set_active_element({
            current_element: command,
            element_type: 'command',
            action_type: 'view',
            model_is_open: true,
            modal_width: 'md',
            modal_height: 'auto',
            show_footer: false,
            show_header: true,
            custom_class: 'bg-white',
            title: `Fish Types in Command #${command.id}`
        }));
    };


    const openActionModal = (action: 'edit' | 'delete') => {
        dispatch(set_active_element({
            current_element: command,
            element_type: 'command',
            action_type: action,
            model_is_open: true,
            modal_width: 'md',
            modal_height: 'auto',
            show_footer: true,
            show_header: true,
            custom_class: 'bg-white'
        }));
    };

    return (
        <tr className="hover:bg-gray-50">
            <td className="px-4 py-2 whitespace-nowrap">{command.id}</td>
            <td className="px-4 py-2 whitespace-nowrap">{command.date}</td>

            <StatusBadge state={command.state} />
            
            <td className="px-4 py-2 whitespace-nowrap font-medium">
                {formatTotalCost()}
            </td>
            <td className="px-4 py-2 whitespace-nowrap">
                {new Date(command.created_at || '').toLocaleDateString()}
            </td>
            <td className="px-4 py-2 whitespace-nowrap">
                {new Date(command.updated_at || '').toLocaleDateString()}
            </td>
            <td className="px-6 py-4 space-x-2 whitespace-nowrap">
                <div className="flex items-center gap-2">
                    <Action_Btns openModal={openActionModal} />
                    <button 
                        onClick={openDetailsModal}
                        className="p-1 text-blue-600 hover:text-blue-800"
                        title="View fish types"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="black" className="size-6">
                            <path d="M11.625 16.5a1.875 1.875 0 1 0 0-3.75 1.875 1.875 0 0 0 0 3.75Z" />
                            <path fillRule="evenodd" d="M5.625 1.5H9a3.75 3.75 0 0 1 3.75 3.75v1.875c0 1.036.84 1.875 1.875 1.875H16.5a3.75 3.75 0 0 1 3.75 3.75v7.875c0 1.035-.84 1.875-1.875 1.875H5.625a1.875 1.875 0 0 1-1.875-1.875V3.375c0-1.036.84-1.875 1.875-1.875Zm6 16.5c.66 0 1.277-.19 1.797-.518l1.048 1.048a.75.75 0 0 0 1.06-1.06l-1.047-1.048A3.375 3.375 0 1 0 11.625 18Z" clipRule="evenodd" />
                            <path d="M14.25 5.25a5.23 5.23 0 0 0-1.279-3.434 9.768 9.768 0 0 1 6.963 6.963A5.23 5.23 0 0 0 16.5 7.5h-1.875a.375.375 0 0 1-.375-.375V5.25Z" />
                        </svg>
                    </button>
                </div>
            </td>
        </tr>
    );
};

export default Table_tr_command;