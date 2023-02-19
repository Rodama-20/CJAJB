<?php

namespace App\Http\Controllers;

use App\Models\Club;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ClubController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $clubs = Club::all();

        return response($clubs, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): Response
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'code' => 'required|max:255|unique:clubs',
        ]);

        $club = Club::create($request->all());

        return response($club, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): Response
    {
        $club = Club::findOrFail($id);

        return response($club, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): Response
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'code' => 'required|max:255|unique:clubs',
        ]);

        $club = Club::findOrFail($id);
        $club->update($request->all());

        return response($club, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): Response
    {
        Club::destroy($id);

        return response(null, 204);
    }
}
