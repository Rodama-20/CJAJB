<?php

namespace App\Http\Controllers;

use App\Models\Venue;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class VenueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $venues = Venue::all();

        return response($venues, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): Response
    {
        $this->validate($request, [
            'name'                 => 'required|max:255',
            'lane_count'           => 'required|integer',
            'straight_lane_count'  => 'required|integer',
            'indoor'               => 'required|boolean',
        ]);

        $venue = Venue::create($request->all());

        return response($venue, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): Response
    {
        $venue = Venue::findOrFail($id);

        return response($venue, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): Response
    {
        $this->validate($request, [
            'name'                 => 'required|max:255',
            'lane_count'           => 'required|integer',
            'straight_lane_count'  => 'required|integer',
            'indoor'               => 'required|boolean',
        ]);

        $venue = Venue::findOrFail($id);
        $venue->update($request->all());

        return response($venue, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): Response
    {
        Venue::destroy($id);

        return response(null, 204);
    }
}
