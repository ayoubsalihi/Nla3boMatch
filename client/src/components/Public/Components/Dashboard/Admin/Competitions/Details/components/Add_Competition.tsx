import { useDispatch, useSelector } from "react-redux";
import { ReduxState, Team, Player, Goalkeeper, InsidePlayer } from "../../../../../../../../interfaces/interfaces";
import { useEffect, useRef, useState } from "react";
import { Group } from "three/src/Three.Core.js";
import { send_request } from "../../../../../../../../helpers/send_request";

interface SelectedTeam {
  team_id: number;
}

interface ConstructedTeam {
  intitule_team: string;
  players: {
    poste: 'GK' | 'DEF' | 'MID' | 'FOR';
    firstName: string;
    lastName: string;
    cin: string;
    email: string;
    password: string;
    skills: Record<string, number>;
  }[];
}

const Add_Competition = () => {
  const dispatch = useDispatch();
  const globalData = useSelector((state: ReduxState) => state.global_data);
  const [teams, setTeams] = useState<Team[]>([]);
  const [groups, setGroups] = useState<Group[]>([]);
  const [selectedTeams, setSelectedTeams] = useState<SelectedTeam[]>([]);
  const [constructedTeams, setConstructedTeams] = useState<ConstructedTeam[]>([]);
  const [loading, setLoading] = useState({ groups: true, teams: true });
  const [errors, setErrors] = useState<string[]>([]);

  // Refs for competition inputs
  const intituleRef = useRef<HTMLInputElement>(null);
  const typeRef = useRef<HTMLSelectElement>(null);
  const debutDateRef = useRef<HTMLInputElement>(null);
  const finishingDateRef = useRef<HTMLInputElement>(null);

  useEffect(() => {
    const fetchInitialData = async () => {
      try {
        if (globalData) {
          if (globalData.teams.length > 0) setTeams(globalData.teams);
          if (globalData.groups.length > 0) setGroups(globalData.groups);
          return;
        }

        const [teamsRes, groupsRes] = await Promise.all([
          send_request('GET', 'teams'),
          send_request('GET', 'groups')
        ]);

        if (teamsRes?.status === 200) setTeams(teamsRes.data);
        if (groupsRes?.status === 200) setGroups(groupsRes.data);
      } catch (error) {
        console.error("Error fetching data:", error);
      } finally {
        setLoading({ groups: false, teams: false });
      }
    };

    fetchInitialData();
  }, [globalData]);

  const handleTeamToggle = (teamId: number) => {
    setSelectedTeams(prev => 
      prev.some(t => t.team_id === teamId)
        ? prev.filter(t => t.team_id !== teamId)
        : [...prev, { team_id: teamId }]
    );
  };

  const addNewTeam = () => {
    setConstructedTeams(prev => [
      ...prev,
      {
        intitule_team: `New Team ${prev.length + 1}`,
        players: []
      }
    ]);
  };

  const addPlayerToTeam = (teamIndex: number) => {
    setConstructedTeams(prev => {
      const updated = [...prev];
      updated[teamIndex].players.push({
        poste: 'GK',
        firstName: '',
        lastName: '',
        cin: '',
        email: '',
        password: '',
        skills: {}
      });
      return updated;
    });
  };

  const validateForm = (): boolean => {
    const newErrors: string[] = [];
    const currentDate = new Date();

    // Competition validation
    if (!intituleRef.current?.value) newErrors.push("Competition name is required");
    if (!typeRef.current?.value) newErrors.push("Competition type is required");
    
    const startDate = new Date(debutDateRef.current?.value || '');
    const endDate = new Date(finishingDateRef.current?.value || '');
    if (!debutDateRef.current?.value) newErrors.push("Start date is required");
    if (!finishingDateRef.current?.value) newErrors.push("End date is required");
    if (startDate >= endDate) newErrors.push("End date must be after start date");
    if (startDate < currentDate) newErrors.push("Start date cannot be in the past");

    // Teams validation
    if (teams.length > 0) {
      if (selectedTeams.length < 2) newErrors.push("At least 2 teams must be selected");
    } else {
      constructedTeams.forEach((team, index) => {
        if (!team.intitule_team) newErrors.push(`Team ${index + 1} must have a name`);
        
        const gkCount = team.players.filter(p => p.poste === 'GK').length;
        const fieldPlayers = team.players.length - gkCount;
        
        if (gkCount !== 1) newErrors.push(`Team ${index + 1} must have exactly 1 goalkeeper`);
        if (fieldPlayers !== 5) newErrors.push(`Team ${index + 1} must have exactly 5 field players`);

        team.players.forEach((player, pIndex) => {
          if (!player.firstName) newErrors.push(`Team ${index + 1} Player ${pIndex + 1}: First name required`);
          if (!player.lastName) newErrors.push(`Team ${index + 1} Player ${pIndex + 1}: Last name required`);
          if (!player.cin) newErrors.push(`Team ${index + 1} Player ${pIndex + 1}: CIN required`);
          if (!player.email) newErrors.push(`Team ${index + 1} Player ${pIndex + 1}: Email required`);
          if (!player.password) newErrors.push(`Team ${index + 1} Player ${pIndex + 1}: Password required`);

          const skills = player.poste === 'GK' 
            ? ['diving', 'reflex', 'kicking', 'handling', 'positioning', 'speed']
            : ['pace', 'dribbling', 'shooting', 'defending', 'passing', 'physical'];

          skills.forEach(skill => {
            const value = player.skills[skill];
            if (value === undefined || value < 0 || value > 100) {
              newErrors.push(`Team ${index + 1} Player ${pIndex + 1}: Invalid ${skill} value (0-100)`);
            }
          });
        });
      });
    }

    setErrors(newErrors);
    return newErrors.length === 0;
  };

  const handleSubmit = async (e: React.FormEvent) => {
    e.preventDefault();
    setErrors([]);

    if (!validateForm()) return;

    try {
      const competitionData = {
        intitule_competition: intituleRef.current?.value,
        type_competition: typeRef.current?.value,
        date_debut: debutDateRef.current?.value,
        date_fin: finishingDateRef.current?.value,
        teams: selectedTeams,
        constructed_teams: constructedTeams
      };

      const res = await send_request('POST', 'competitions', competitionData);
      
      if (res?.status === 201) {
        // Handle success
        console.log('Competition created successfully');
        // Reset form
        setSelectedTeams([]);
        setConstructedTeams([]);
        if (intituleRef.current) intituleRef.current.value = '';
        if (typeRef.current) typeRef.current.value = 'league';
        if (debutDateRef.current) debutDateRef.current.value = '';
        if (finishingDateRef.current) finishingDateRef.current.value = '';
      }
    } catch (error) {
      console.error('Error creating competition:', error);
      setErrors(['Failed to create competition. Please try again.']);
    }
  };

  const updatePlayerField = (
    teamIndex: number,
    playerIndex: number,
    field: string,
    value: string | number
  ) => {
    setConstructedTeams(prev => {
      const updated = [...prev];
      const player = updated[teamIndex].players[playerIndex];
      
      if (typeof value === 'string') {
        (player as any)[field] = value;
      } else {
        player.skills[field] = value;
      }

      return updated;
    });
  };

  if (loading.teams || loading.groups) {
    return <div>Loading...</div>;
  }

  return (
    <form onSubmit={handleSubmit} className="max-w-4xl mx-auto p-6 bg-white rounded-lg shadow-md">
      <h2 className="text-2xl font-bold mb-6">Create New Competition</h2>

      {/* Competition Details */}
      <div className="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
        <div className="space-y-2">
          <label className="block font-medium">Competition Name</label>
          <input
            ref={intituleRef}
            placeholder="Enter competition name"
            className="w-full p-2 border rounded focus:ring-2 focus:ring-blue-500"
            required
          />
        </div>

        <div className="space-y-2">
          <label className="block font-medium">Competition Type</label>
          <select
            ref={typeRef}
            className="w-full p-2 border rounded focus:ring-2 focus:ring-blue-500"
            required
          >
            <option value="league">League</option>
            <option value="cup">Cup</option>
          </select>
        </div>

        <div className="space-y-2">
          <label className="block font-medium">Start Date</label>
          <input
            type="date"
            ref={debutDateRef}
            className="w-full p-2 border rounded focus:ring-2 focus:ring-blue-500"
            required
          />
        </div>

        <div className="space-y-2">
          <label className="block font-medium">End Date</label>
          <input
            type="date"
            ref={finishingDateRef}
            className="w-full p-2 border rounded focus:ring-2 focus:ring-blue-500"
            required
          />
        </div>
      </div>

      {/* Team Selection */}
      {teams.length > 0 ? (
        <div className="mb-8">
          <h3 className="text-xl font-semibold mb-4">Select Participating Teams</h3>
          <div className="grid grid-cols-1 sm:grid-cols-2 gap-3">
            {teams.map(team => (
              <div
                key={team.id}
                className={`p-3 border rounded cursor-pointer transition-colors ${
                  selectedTeams.some(t => t.team_id === team.id)
                    ? 'bg-blue-50 border-blue-500'
                    : 'hover:bg-gray-50'
                }`}
                onClick={() => handleTeamToggle(team.id!)}
              >
                <div className="flex items-center">
                  <input
                    type="checkbox"
                    checked={selectedTeams.some(t => t.team_id === team.id)}
                    className="mr-2"
                    readOnly
                  />
                  <span className="font-medium">{team.intitule_team}</span>
                </div>
              </div>
            ))}
          </div>
        </div>
      ) : (
        <div className="mb-8">
          <div className="flex justify-between items-center mb-4">
            <h3 className="text-xl font-semibold">Construct New Teams</h3>
            <button
              type="button"
              onClick={addNewTeam}
              className="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600"
            >
              Add Team
            </button>
          </div>

          {constructedTeams.map((team, teamIndex) => (
            <div key={teamIndex} className="mb-6 p-4 border rounded-lg bg-gray-50">
              <div className="flex items-center gap-2 mb-4">
                <input
                  value={team.intitule_team}
                  onChange={e => {
                    const newTeams = [...constructedTeams];
                    newTeams[teamIndex].intitule_team = e.target.value;
                    setConstructedTeams(newTeams);
                  }}
                  placeholder="Team name"
                  className="flex-1 p-2 border rounded font-medium"
                />
                <button
                  type="button"
                  onClick={() => addPlayerToTeam(teamIndex)}
                  className="bg-green-500 text-white px-3 py-1 rounded text-sm"
                >
                  Add Player
                </button>
              </div>

              <div className="space-y-3">
                {team.players.map((player, playerIndex) => (
                  <div key={playerIndex} className="p-3 border rounded bg-white">
                    <div className="grid grid-cols-1 md:grid-cols-2 gap-3 mb-3">
                      <select
                        value={player.poste}
                        onChange={e => updatePlayerField(
                          teamIndex,
                          playerIndex,
                          'poste',
                          e.target.value as 'GK' | 'DEF' | 'MID' | 'FOR'
                        )}
                        className="p-1 border rounded"
                      >
                        <option value="GK">Goalkeeper</option>
                        <option value="DEF">Defender</option>
                        <option value="MID">Midfielder</option>
                        <option value="FOR">Forward</option>
                      </select>

                      <div className="grid grid-cols-2 gap-2">
                        <input
                          placeholder="First Name"
                          value={player.firstName}
                          onChange={e => updatePlayerField(teamIndex, playerIndex, 'firstName', e.target.value)}
                          className="p-1 border rounded"
                        />
                        <input
                          placeholder="Last Name"
                          value={player.lastName}
                          onChange={e => updatePlayerField(teamIndex, playerIndex, 'lastName', e.target.value)}
                          className="p-1 border rounded"
                        />
                      </div>

                      <input
                        placeholder="CIN"
                        value={player.cin}
                        onChange={e => updatePlayerField(teamIndex, playerIndex, 'cin', e.target.value)}
                        className="p-1 border rounded"
                      />
                      <input
                        placeholder="Email"
                        type="email"
                        value={player.email}
                        onChange={e => updatePlayerField(teamIndex, playerIndex, 'email', e.target.value)}
                        className="p-1 border rounded"
                      />
                      <input
                        placeholder="Password"
                        type="password"
                        value={player.password}
                        onChange={e => updatePlayerField(teamIndex, playerIndex, 'password', e.target.value)}
                        className="p-1 border rounded"
                      />
                    </div>

                    <div className="grid grid-cols-2 md:grid-cols-3 gap-2 mt-2">
                      {Object.entries(
                        player.poste === 'GK' ? {
                          diving: 'Diving',
                          reflex: 'Reflex',
                          kicking: 'Kicking',
                          handling: 'Handling',
                          positioning: 'Positioning',
                          speed: 'Speed'
                        } : {
                          pace: 'Pace',
                          dribbling: 'Dribbling',
                          shooting: 'Shooting',
                          defending: 'Defending',
                          passing: 'Passing',
                          physical: 'Physical'
                        }
                      ).map(([skill, label]) => (
                        <div key={skill} className="flex items-center gap-1">
                          <span className="text-sm w-20">{label}:</span>
                          <input
                            type="number"
                            min="0"
                            max="100"
                            value={player.skills[skill] || ''}
                            onChange={e => updatePlayerField(
                              teamIndex,
                              playerIndex,
                              skill,
                              parseInt(e.target.value)
                            )}
                            className="w-16 p-1 border rounded"
                            placeholder="0-100"
                          />
                        </div>
                      ))}
                    </div>
                  </div>
                ))}
              </div>
            </div>
          ))}
        </div>
      )}

      {/* Errors */}
      {errors.length > 0 && (
        <div className="mb-4 p-4 bg-red-50 border border-red-200 rounded">
          {errors.map((error, index) => (
            <p key={index} className="text-red-600 text-sm">• {error}</p>
          ))}
        </div>
      )}

      <div className="flex justify-end">
        <button
          type="submit"
          className="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700"
        >
          Create Competition
        </button>
      </div>
    </form>
  );
};

export default Add_Competition;