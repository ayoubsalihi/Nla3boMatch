// import { useDispatch } from "react-redux"
// import { first_page, last_page, next_page, prev_page } from "../../../../redux/slices/HelperSlice"
import { Competition } from "../../../../../../../../interfaces/interfaces"


export default function Pagination() {
//   const dispatch = useDispatch()
//   function prevPage() {
//     dispatch(prev_page())
//   }
//   function nextPage() {
//     dispatch(next_page(filtered_data.length))
//   }
  return (
  <div className="flex items-center justify-between gap-2">
    <div className="flex items-center gap-1">
      <button
        className="w-10 h-10 flex items-center justify-center rounded-md border border-gray-300 bg-white hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none"
        aria-label="First page"
        // onClick={()=>{dispatch(first_page())}}
      >
        «
      </button>

      <button
        className="w-10 h-10 flex items-center justify-center rounded-md border border-gray-300 bg-white hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none"
        aria-label="Previous page"
        // onClick={prevPage}
      >
        ‹
      </button>

      <button
        className="w-10 h-10 flex items-center justify-center rounded-md text-sm font-medium border text-white border-gray-300 bg-black hover:bg-black-300"
      >
        1
      </button>
      <button
        className="w-10 h-10 flex items-center justify-center rounded-md text-sm font-medium border border-gray-300 text-white border-gray-300 bg-black hover:bg-black-300"
      >
        2
      </button>
      <button
        className="w-10 h-10 flex items-center justify-center rounded-md text-sm font-medium border border-gray-300 text-white border-gray-300 bg-black hover:bg-black-300"
      >
        3
      </button>

      <button
        className="w-10 h-10 flex items-center justify-center rounded-md border border-gray-300 bg-white hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none"
        aria-label="Next page"
        // onClick={nextPage}
    >
        ›
      </button>

      <button
        className="w-10 h-10 flex items-center justify-center rounded-md border border-gray-300 bg-white hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none"
        aria-label="Last page"
        onClick={()=>{
        //   dispatch(last_page(filtered_data.length))
        }}
      >
        »
      </button>
    </div>

    <div className="flex items-center gap-2">
      <span className="text-sm text-gray-500">Rows per page:</span>
      <select
        defaultValue="10"
        className="w-16 h-10 border border-gray-300 rounded-md px-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
      >
        <option value="5">5</option>
        <option value="10">10</option>
        <option value="20">20</option>
        <option value="50">50</option>
        <option value="100">100</option>
      </select>
    </div>
  </div>
  )
  }
  