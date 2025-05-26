import { useState } from "react"

import Button_Add_Command from "./Button_Add_Competition"
import SearchInput from "../../../Global_Components/SearchInput"
import { send_request } from "../../../../helper_functions/requests_functions"

export default function Toolbar() {
  const [activeTab, setActiveTab] = useState("All")

  const tabs = ["All", "Authorized", "Pending", "Declined"]


  async function downloadCSV(){
    try {
      const response = await send_request('GET', 'export-csv/commands', null, true);
      
      const blob = new Blob([response.data], { type: 'text/csv' });
      const url = window.URL.createObjectURL(blob);
  
      const a = document.createElement('a');
      a.href = url;
      a.download = 'data.csv';
      a.click();
  
      window.URL.revokeObjectURL(url);
    } catch (err) {
      console.error("Error fetching CSV:", err);
    }
  };
  return (
    <div className="flex flex-col sm:flex-row justify-between items-center gap-4 w-full">
      <div className="flex space-x-1">
        {tabs.map((tab) => (
          <button
            key={tab}
            onClick={() => setActiveTab(tab)}
            className={`px-4 py-2 rounded-md text-sm font-medium transition-colors ${
              activeTab === tab ? "bg-gray-900 text-white" : "bg-white text-gray-700 hover:bg-gray-100"
            }`}
          >
            {tab}
          </button>
        ))}
      </div>

      <div className="flex items-center gap-2">
        <div className="relative flex">
         
         <SearchInput placeholder="Search fish types..." className="pl-8 h-9 w-full sm:w-[250px] rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:border-transparent"/>
        </div>

        <button className="flex items-center h-9 px-3 rounded-md border border-gray-300 text-sm font-medium hover:bg-gray-50">
          <svg className="h-4 w-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" strokeWidth="2">
            <path strokeLinecap="round" strokeLinejoin="round" d="M3 4a2 2 0 012-2h14a2 2 0 012 2v16a2 2 0 01-2 2H5a2 2 0 01-2-2V4z" />
          </svg>
          Filters
        </button>

        <button onClick={downloadCSV} className="export_btn hover_btn_effect">
          <svg className="h-4 w-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" strokeWidth="2">
            <path strokeLinecap="round" strokeLinejoin="round" d="M4 4h16M4 12h16M4 20h16" />
          </svg>
          Export
        </button>
        <Button_Add_Command />
      </div>
    </div>
  )
}