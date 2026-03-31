<?php

namespace App\Http\Controllers;

use App\Http\Resources\FlightCollection;
use App\Http\Resources\FlightResource;
use App\Models\Flight;
use Illuminate\Http\Request;

class FlightController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $flights = Flight::paginate(10);

        return FlightResource::collection($flights);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            // أضف باقي الحقول حسب جدولك
        ]);

        $flight = Flight::create($validated);

        return new FlightResource($flight);
    }

    /**
     * Display the specified resource.
     */
    public function show(Flight $flight)
    {
        return new FlightResource($flight);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Flight $flight)
    {
        $validated = $request->validate([
            'name' => 'sometimes|string|max:255',
        ]);

        $flight->update($validated);

        return new FlightResource($flight);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Flight $flight)
    {
        $flight->delete();

        return response()->json([
            'message' => 'Flight deleted successfully'
        ]);
    }
}