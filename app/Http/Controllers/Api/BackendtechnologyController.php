<?php

namespace App\Http\Controllers\API;

use App\Models\Backendtechnology;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BackendtechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $backendTechnologies = Backendtechnology::all();
        return response()->json($backendTechnologies);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'backendtechnology' => 'required|string|unique:backendtechnologies',
        ]);

        $backendTechnology = Backendtechnology::create($request->all());

        return response()->json($backendTechnology, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Backendtechnology  $backendTechnology
     * @return \Illuminate\Http\Response
     */
    public function show(Backendtechnology $backendTechnology)
    {
        return response()->json($backendTechnology);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Backendtechnology  $backendTechnology
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Backendtechnology $backendTechnology)
    {
        $request->validate([
            'backendtechnology' => 'required|string|unique:backendtechnologies,backendtechnology,' . $backendTechnology->id,
        ]);

        $backendTechnology->update($request->all());

        return response()->json($backendTechnology, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Backendtechnology  $backendTechnology
     * @return \Illuminate\Http\Response
     */
    public function destroy(Backendtechnology $backendTechnology)
    {
        $backendTechnology->delete();

        return response()->json(null, 204);
    }
}

