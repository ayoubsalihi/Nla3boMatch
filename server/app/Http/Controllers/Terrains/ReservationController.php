<?php

namespace App\Http\Controllers\Terrains;

use App\Http\Controllers\Controller;
use App\Http\Requests\Terrains\StoreReservationRequest;
use App\Http\Requests\Terrains\UpdateReservationRequest;
use App\Models\Terrains\Reservation;
use Illuminate\Support\Facades\Gate;

class ReservationController extends Controller
{
    public function index()
    {
        Gate::authorize('viewAny',Reservation::class);
        $reservations = Reservation::all();
        return response()->json($reservations);
    }

    public function store(StoreReservationRequest $request)
    {
        Gate::authorize('create',Reservation::class);
        $reservation = Reservation::create($request->validated());
        return response()->json($reservation, 201);
    }

    public function show(Reservation $reservation)
    {
        Gate::authorize('view',$reservation);
        return view('reservations.show', compact('reservation'));
    }

    public function update(UpdateReservationRequest $request, Reservation $reservation)
    {
        Gate::authorize('update',$reservation);
        $reservation->update($request->validated());
        return response()->json($reservation);
    }

    public function destroy(Reservation $reservation)
    {
        Gate::authorize('delete',$reservation);
        $reservation->delete();
        return response()->json(['message' => 'Réservation supprimée avec succès.']);
    }
}
