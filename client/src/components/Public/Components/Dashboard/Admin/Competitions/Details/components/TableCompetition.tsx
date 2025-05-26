import { useDispatch, useSelector } from "react-redux";
import Pagination from "./Pagination";
import Toolbar from "./Toolbar";
import Table_tr_command from "./Table_Tr_Competition";
// import Skelton_loader from "../../../Global_Components/Skelton_loader";
import { useEffect, useState } from "react";
import { useSearchParams } from "react-router-dom";
import { Competition } from "../../../../../../../../interfaces/interfaces";
// import { first_page } from "../../../../redux/slices/HelperSlice";

export default function TableCompetition() {
    const commands = useSelector((state: ReduxState) => state.global_data?.commands || []);
    const headings = [
        'id',
        'date',
        'state',
        'total cost',
        'created_at',
        'updated_at',
        'Actions'
    ];

      const [searchParams] = useSearchParams();
      const query = searchParams.get("query")?.toLowerCase() || "";
    //   const filter = searchParams.get("f")?.toLowerCase() || "";
    
      const current_page = useSelector((state : ReduxState) => state.helper_state.pagination)
    
      const [filtered, set_filtered] = useState<Competition[]>([])
      const dispatch = useDispatch()

        useEffect(()=>{
          const filtered = (commands ?? []).filter((command) => {
            const matchesQuery = [
              command.id, 
              command.date, 
              command.state, 
              command.total_cost, 
              command.created_at, 
            ]
            .map(value => String(value).toLowerCase())
            .some(field => field.includes(query));
            // const matchesFilter = filter=='all' || command.current_state.toLowerCase().includes(filter);
            return matchesQuery;
          });
          set_filtered(filtered)
          console.log(filtered)
          
        }, [commands,query])
        useEffect(()=>{
          dispatch(first_page())
        },[query])
    return (
        <div className="w-full space-y-4">
            <Toolbar />
            <div className="rounded-md">
                <table className="min-w-full divide-y divide-gray-200">
                    <thead className="bg-gray-500 top-0 z-10">
                        <tr>
                            {headings.map((heading) => (
                                <th
                                    key={heading}
                                    scope="col"
                                    className="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider bg-gray-100"
                                >
                                    {heading}
                                </th>
                            ))}
                        </tr>
                    </thead>
                    <tbody className="bg-white divide-y divide-gray-200">
                        {
                            filtered.length == 0
                            ? <Skelton_loader columns_counter={7}/>
                            : filtered.map((command, index) => {
                                if(index < current_page.start || index > current_page.end) return
                                return <Table_tr_command key={command.id} command={command} />
                            }
                            )
                        }
                    </tbody>
                </table>
            </div>
            <Pagination/>
        </div>
    );
}