import { useDispatch } from "react-redux";
import { send_request } from "../../../../helper_functions/requests_functions";
import { invoke_action } from "../../../../redux/slices/ActionsSlice";

export default function Delete_command({id}: {id: number}){
    const dispatch = useDispatch();

    const confirmDelete = async () => {
        try {
            await send_request('DELETE', `commands/${id}`);
            dispatch(invoke_action('commands'));
        } catch (err) {
            alert(err.response?.data?.message || 'Could not delete.');
        }
    };

    return(
        <div className="space-y-4">
      <p>Are you sure you want to delete command #{id}?</p>
      <div className="flex justify-end space-x-3">

        <button
          onClick={confirmDelete}
          className="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700"
        >
          Delete
        </button>
      </div>
    </div>
    )
}