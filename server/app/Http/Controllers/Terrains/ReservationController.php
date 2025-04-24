<?php

namespace App\Http\Controllers\Terrains;

use App\Http\Controllers\Controller;
use App\Http\Requests\Terrains\StoreReservationRequest;
use App\Http\Requests\Terrains\UpdateReservationRequest;
use App\Models\Terrains\Reservation;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::all();
        return view('reservations.index', compact('reservations'));
    }

    public function store(StoreReservationRequest $request)
    {
        $reservation = Reservation::create($request->validated());
        return response()->json($reservation, 201);
    }

    public function show($id)
    {
        $reservation = Reservation::findOrFail($id);
        return view('reservations.show', compact('reservation'));
    }

    public function update(UpdateReservationRequest $request, $id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->update($request->validated());
        return response()->json($reservation);
    }

    public function destroy($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->delete();
        return response()->json(['message' => 'Réservation supprimée avec succès.']);
    }
}
