<?php

namespace App\Http\Controllers\API;

use App\Models\Frontendtechnology;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendtechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $frontendTechnologies = Frontendtechnology::all();
        return response()->json($frontendTechnologies);
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
            'frontendtechnology' => 'required|string|unique:frontendtechnologies',
        ]);

        $frontendTechnology = Frontendtechnology::create($request->all());

        return response()->json($frontendTechnology, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Frontendtechnology  $frontendTechnology
     * @return \Illuminate\Http\Response
     */
    public function show(Frontendtechnology $frontendTechnology)
    {
        return response()->json($frontendTechnology);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Frontendtechnology  $frontendTechnology
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Frontendtechnology $frontendTechnology)
    {
        $request->validate([
            'frontendtechnology' => 'required|string|unique:frontendtechnologies,frontendtechnology,' . $frontendTechnology->id,
        ]);

        $frontendTechnology->update($request->all());

        return response()->json($frontendTechnology, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Frontendtechnology  $frontendTechnology
     * @return \Illuminate\Http\Response
     */
    public function destroy(Frontendtechnology $frontendTechnology)
    {
        $frontendTechnology->delete();

        return response()->json(null, 204);
    }
}

