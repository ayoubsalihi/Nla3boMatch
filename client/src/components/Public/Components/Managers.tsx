
import FreestylePlayer from '../Json/FreestylePlayer';

const ManagersSerction = () => {
  return (
    <div className=" px-4 py-12 z-50">
      <div className="grid lg:grid-cols-2 gap-12 lg:max-w-6xl max-w-2xl mx-auto">
        <div className="text-left">
        <FreestylePlayer/>
        </div>
        <div>
          <h1 className="text-slate-900 text-3xl font-bold mb-6">Simplify, Manage, Grow</h1>
          <p className="mb-4 text-sm text-slate-500 leading-relaxed">Take control of your facility’s schedule with our intuitive booking system. Manage reservations, set pricing, and automate confirmations—all in one place. Maximize occupancy and reduce admin headaches.</p>
          <p className="mb-4 text-sm text-slate-500 leading-relaxed">From local tournaments to national competitions, our platform helps you promote events, sell tickets, and coordinate teams. Attract crowds, boost revenue, and become the go-to venue for sports in your community.</p>
          <p className="text-sm text-slate-500 leading-relaxed">Offer teams and leagues a seamless experience by integrating their schedules, payments, and communication tools into your stadium’s profile. Build long-term partnerships and foster loyalty.</p><p className="text-sm text-slate-500 leading-relaxed">Create professional tournament pages in minutes with customizable templates and sponsor integration</p>
          <p className="text-sm text-slate-500 leading-relaxed">Manage team registrations, waivers, and schedules through integrated dashboards</p>
          <p className="text-sm text-slate-500 leading-relaxed">In-app broadcast system for schedule changes, weather alerts, and facility updates</p>
        </div>
      </div>
    </div>
  )
}

export default ManagersSerction
