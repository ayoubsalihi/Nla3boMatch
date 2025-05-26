import { useDispatch } from "react-redux";
import { set_active_element } from "../../../../redux/slices/ActiveElement";

export default function Button_Add_Command(){
    const dispatch = useDispatch();

    const openAddModal = () => {
    dispatch(set_active_element({
        current_element: null,
        element_type: 'command',
        action_type: 'add',
        modal_width: 'md',
        modal_height: 'auto',
        show_footer: true,
        show_header: true,
        custom_class: 'bg-white',
    }));
    };

    return(
        <div className="flex">
        <button
            onClick={openAddModal}
            className="px-4 py-2 bg-gray-900 text-white hover:bg-gray-800 rounded-lg transition cursor-pointer"
        >
            Add command
        </button>
    </div>
    )
}