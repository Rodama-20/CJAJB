<?php

namespace App\Http\Controllers;

use App\Models\Discipline;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DisciplineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $discipline = Discipline::all();

        return response($discipline, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): Response
    {
        $this->validate($request, [
            'name'         => 'required|max:255',
            'order'        => 'required|integer',
            'heat_size'    => 'required|integer',
            'relay_size'   => 'required|integer',
            'call_time'    => 'required|date',
            'meeting_time' => 'required|date',
            'length'       => 'required|integer',
        ]);

        $discipline = Discipline::create($request->all());

        return response($discipline, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): Response
    {
        $discipline = Discipline::findOrFail($id);

        return response($discipline, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): Response
    {
        $this->validate($request, [
            'name'         => 'required|max:255',
            'order'        => 'required|integer',
            'heat_size'    => 'required|integer',
            'relay_size'   => 'required|integer',
            'call_time'    => 'required|date',
            'meeting_time' => 'required|date',
            'length'       => 'required|integer',
        ]);

        $discipline = Discipline::findOrFail($id);
        $discipline->update($request->all());

        return response($discipline, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): Response
    {
        Discipline::destroy($id);

        return response(null, 204);
    }
}
