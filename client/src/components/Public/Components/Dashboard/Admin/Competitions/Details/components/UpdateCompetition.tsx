import { useEffect, useRef, useState } from "react";
import { useParams, useNavigate } from "react-router-dom";
import { useDispatch, useSelector } from "react-redux";
import { ReduxState, Team, Competition } from "../../../../../../../../interfaces/interfaces";
import { send_request } from "../../../../../../../../helpers/send_request";

interface SelectedTeam {
  team_id: number;
}

interface ConstructedTeam {
  intitule_team: string;
  players: {
    id?: number;
    poste: 'GK' | 'DEF' | 'MID' | 'FOR';
    firstName: string;
    lastName: string;
    cin: string;
    email: string;
    password: string;
    skills: Record<string, number>;
  }[];
}

const UpdateCompetition = () => {
  const { competitionId } = useParams();
  const navigate = useNavigate();
  const dispatch = useDispatch();
  const globalData = useSelector((state: ReduxState) => state.global_data);
  
  const [initialData, setInitialData] = useState<Competition | null>(null);
  const [teams, setTeams] = useState<Team[]>([]);
  const [selectedTeams, setSelectedTeams] = useState<SelectedTeam[]>([]);
  const [constructedTeams, setConstructedTeams] = useState<ConstructedTeam[]>([]);
  const [errors, setErrors] = useState<string[]>([]);
  const [isLoading, setIsLoading] = useState(true);
  const [originalTeams, setOriginalTeams] = useState<number[]>([]);

  // Refs
  const intituleRef = useRef<HTMLInputElement>(null);
  const typeRef = useRef<HTMLSelectElement>(null);
  const debutDateRef = useRef<HTMLInputElement>(null);
  const finishingDateRef = useRef<HTMLInputElement>(null);

  useEffect(() => {
    const fetchCompetitionData = async () => {
      try {
        const [compRes, teamsRes] = await Promise.all([
          send_request('GET', `competitions/${competitionId}`),
          send_request('GET', 'teams')
        ]);

        if (compRes?.status === 200 && teamsRes?.status === 200) {
          const competition = compRes.data.competition;
          const compTeams = compRes.data.teams;
          
          setInitialData(competition);
          setTeams(teamsRes.data);
          
          if (compTeams.length > 0) {
            setSelectedTeams(compTeams.map(t => ({ team_id: t.id! })));
            setOriginalTeams(compTeams.map(t => t.id!));
          } else {
            const constructedTeams = await Promise.all(
              compRes.data.constructed_teams.map(async (ct: any) => {
                const teamWithPlayers = await Promise.all(
                  ct.players.map(async (player: any) => {
                    const skillsRes = await send_request('GET', `players/${player.id}/skills`);
                    return {
                      ...player,
                      skills: skillsRes?.data || {}
                    };
                  })
                );
                return {
                  ...ct,
                  players: teamWithPlayers
                };
              })
            );
            setConstructedTeams(constructedTeams);
          }
        }
      } catch (error) {
        console.error('Error fetching data:', error);
        setErrors(['Failed to load competition data']);
      } finally {
        setIsLoading(false);
      }
    };

    fetchCompetitionData();
  }, [competitionId]);

  const handleTeamToggle = (teamId: number) => {
    if (hasCompetitionStarted()) return;
    
    setSelectedTeams(prev => 
      prev.some(t => t.team_id === teamId)
        ? prev.filter(t => t.team_id !== teamId)
        : [...prev, { team_id: teamId }]
    );
  };

  const hasCompetitionStarted = (): boolean => {
    if (!initialData) return false;
    const startDate = new Date(initialData.date_debut);
    return new Date() > startDate;
  };

  const validateForm = (): boolean => {
    const newErrors: string[] = [];
    
    if (!intituleRef.current?.value) {
      newErrors.push("Competition name is required");
    }

    if (hasCompetitionStarted()) {
      newErrors.push("Cannot update competition after it has started");
      return false;
    }

    if (selectedTeams.length > 0) {
      if (selectedTeams.length < 2) {
        newErrors.push("At least 2 teams must be selected");
      }
    } else {
      constructedTeams.forEach((team, index) => {
        if (!team.intitule_team) {
          newErrors.push(`Team ${index + 1} must have a name`);
        }

        const gkCount = team.players.filter(p => p.poste === 'GK').length;
        const fieldPlayers = team.players.length - gkCount;
        
        if (gkCount !== 1) newErrors.push(`Team ${index + 1} must have exactly 1 goalkeeper`);
        if (fieldPlayers !== 5) newErrors.push(`Team ${index + 1} must have exactly 5 field players`);

        team.players.forEach((player, pIndex) => {
          if (!player.firstName) newErrors.push(`Team ${index + 1} Player ${pIndex + 1}: First name required`);
          if (!player.lastName) newErrors.push(`Team ${index + 1} Player ${pIndex + 1}: Last name required`);
          if (!player.cin) newErrors.push(`Team ${index + 1} Player ${pIndex + 1}: CIN required`);
          if (!player.email) newErrors.push(`Team ${index + 1} Player ${pIndex + 1}: Email required`);
          
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
        constructed_teams: constructedTeams,
        original_teams: originalTeams
      };

      const res = await send_request('PUT', `competitions/${competitionId}`, competitionData);
      
      if (res?.status === 200) {
        navigate(`/competitions/${competitionId}`);
        // Dispatch update action if using Redux
        // dispatch(updateCompetition(res.data));
      }
    } catch (error) {
      console.error('Error updating competition:', error);
      setErrors(['Failed to update competition. Please try again.']);
    }
  };

  const updatePlayerField = (
    teamIndex: number,
    playerIndex: number,
    field: string,
    value: string | number
  ) => {
    if (hasCompetitionStarted()) return;

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

  const addNewTeam = () => {
    if (hasCompetitionStarted()) return;
    
    setConstructedTeams(prev => [
      ...prev,
      {
        intitule_team: `New Team ${prev.length + 1}`,
        players: []
      }
    ]);
  };

  const addPlayerToTeam = (teamIndex: number) => {
    if (hasCompetitionStarted()) return;

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

  if (isLoading) {
    return <div className="text-center p-8">Loading competition data...</div>;
  }

  if (!initialData) {
    return <div className="text-center p-8 text-red-500">Competition not found</div>;
  }

  return (
    <form onSubmit={handleSubmit} className="max-w-4xl mx-auto p-6 bg-white rounded-lg shadow-md">
      <h2 className="text-2xl font-bold mb-6">Update Competition</h2>

      <div className="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
        <div className="space-y-2">
          <label className="block font-medium">Competition Name</label>
          <input
            ref={intituleRef}
            defaultValue={initialData.intitule_competition}
            className="w-full p-2 border rounded focus:ring-2 focus:ring-blue-500"
            required
          />
        </div>

        <div className="space-y-2">
          <label className="block font-medium">Competition Type</label>
          <select
            ref={typeRef}
            defaultValue={initialData.type_competition}
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
            defaultValue={initialData.date_debut}
            className="w-full p-2 border rounded focus:ring-2 focus:ring-blue-500"
            required
          />
        </div>

        <div className="space-y-2">
          <label className="block font-medium">End Date</label>
          <input
            type="date"
            ref={finishingDateRef}
            defaultValue={initialData.date_fin}
            className="w-full p-2 border rounded focus:ring-2 focus:ring-blue-500"
            required
          />
        </div>
      </div>

      {teams.length > 0 ? (
        <div className="mb-8">
          <h3 className="text-xl font-semibold mb-4">Participating Teams</h3>
          <div className="grid grid-cols-1 sm:grid-cols-2 gap-3">
            {teams.map(team => (
              <div
                key={team.id}
                className={`p-3 border rounded ${
                  selectedTeams.some(t => t.team_id === team.id)
                    ? 'bg-blue-50 border-blue-500'
                    : 'bg-gray-50'
                } ${
                  hasCompetitionStarted() ? 'opacity-50 cursor-not-allowed' : 'cursor-pointer hover:bg-gray-100'
                }`}
                onClick={() => !hasCompetitionStarted() && handleTeamToggle(team.id!)}
              >
                <div className="flex items-center">
                  <input
                    type="checkbox"
                    checked={selectedTeams.some(t => t.team_id === team.id)}
                    className="mr-2"
                    disabled={hasCompetitionStarted()}
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
            <h3 className="text-xl font-semibold">Constructed Teams</h3>
            <button
              type="button"
              onClick={addNewTeam}
              className={`bg-blue-500 text-white px-4 py-2 rounded ${
                hasCompetitionStarted() ? 'opacity-50 cursor-not-allowed' : 'hover:bg-blue-600'
              }`}
              disabled={hasCompetitionStarted()}
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
                  className="flex-1 p-2 border rounded font-medium"
                  disabled={hasCompetitionStarted()}
                />
                <button
                  type="button"
                  onClick={() => addPlayerToTeam(teamIndex)}
                  className={`bg-green-500 text-white px-3 py-1 rounded text-sm ${
                    hasCompetitionStarted() ? 'opacity-50 cursor-not-allowed' : ''
                  }`}
                  disabled={hasCompetitionStarted()}
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
                        disabled={hasCompetitionStarted()}
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
                          disabled={hasCompetitionStarted()}
                        />
                        <input
                          placeholder="Last Name"
                          value={player.lastName}
                          onChange={e => updatePlayerField(teamIndex, playerIndex, 'lastName', e.target.value)}
                          className="p-1 border rounded"
                          disabled={hasCompetitionStarted()}
                        />
                      </div>

                      <input
                        placeholder="CIN"
                        value={player.cin}
                        onChange={e => updatePlayerField(teamIndex, playerIndex, 'cin', e.target.value)}
                        className="p-1 border rounded"
                        disabled={hasCompetitionStarted()}
                      />
                      <input
                        placeholder="Email"
                        type="email"
                        value={player.email}
                        onChange={e => updatePlayerField(teamIndex, playerIndex, 'email', e.target.value)}
                        className="p-1 border rounded"
                        disabled={hasCompetitionStarted()}
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
                            disabled={hasCompetitionStarted()}
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

      {errors.length > 0 && (
        <div className="mb-4 p-4 bg-red-50 border border-red-200 rounded">
          {errors.map((error, index) => (
            <p key={index} className="text-red-600 text-sm">• {error}</p>
          ))}
        </div>
      )}

      <div className="flex justify-end gap-4">
        <button
          type="button"
          onClick={() => navigate(-1)}
          className="bg-gray-500 text-white px-6 py-2 rounded hover:bg-gray-600"
        >
          Cancel
        </button>
        <button
          type="submit"
          className="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700"
        >
          Update Competition
        </button>
      </div>
    </form>
  );
};

export default UpdateCompetition;