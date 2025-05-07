import Girl from "../Json/Girl"

const PlayersSection = () => {
  return (
    <div className=" px-4 py-12 z-50">
      <h1 className='text-gray-950 text-7xl font-bold mb-16 text-center pb-4'>About us</h1>
      <div className="grid lg:grid-cols-2 gap-12 lg:max-w-6xl max-w-2xl mx-auto">
        <div className="text-left">
          <h1 className="text-slate-900 text-3xl font-bold mb-6">Connect, Play, Compete</h1>
          <p className="mb-4 text-sm text-slate-500 leading-relaxed">Whether you’re looking for a pickup game or building a competitive team, our app connects you with like-minded players in your area. Say goodbye to empty slots on the field—find teammates, join groups, and never play alone again.</p>
          <p className="mb-4 text-sm text-slate-500 leading-relaxed">From casual kickabouts to league-level tournaments, our tools let you schedule matches, set locations, and invite players with a few taps. Customize rules, track RSVPs, and focus on the game—we handle the logistics.</p>
          <p className="text-sm text-slate-500 leading-relaxed">No matter your skill level or passion, we’ve got you covered. Casual players can enjoy stress-free games, while competitive teams access advanced features like stats tracking, rankings, and event promotion.</p>
        </div>
        <div>
          <Girl/>
        </div>
      </div>
    </div>
  )
}

export default PlayersSection
