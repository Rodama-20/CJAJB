<?php

namespace App\Http\Controllers;

use App\Models\Athlete;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AthleteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $athletes = Athlete::all();

        return response($athletes, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): Response
    {
        $this->validate($request, [
            'first_name'  => 'required|max:255',
            'last_name'   => 'required|max:255',
            'birth_date'  => 'required|date|before:today',
            'is_men'      => 'required|boolean',
            'nationality' => 'required|max:3',
            'email'       => 'required|email|unique:athletes',
            'club_id'     => 'required|exists:clubs,id',
        ]);

        $athlete = Athlete::create($request->all());

        return response($athlete, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): Response
    {
        $athlete = Athlete::findOrFail($id);

        return response($athlete, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): Response
    {
        $this->validate($request, [
            'first_name'  => 'required|max:255',
            'last_name'   => 'required|max:255',
            'birth_date'  => 'required|date|before:today',
            'is_men'      => 'required|boolean',
            'nationality' => 'required|max:3',
            'email'       => 'required|email|unique:athletes',
            'club_id'     => 'required|exists:clubs,id',
        ]);
        $athlete = Athlete::findOrFail($id);
        $athlete->update($request->all());

        return response($athlete, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): Response
    {
        Athlete::destroy($id);

        return response(null, 204);
    }
}
