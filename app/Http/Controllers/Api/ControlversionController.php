<?php

namespace App\Http\Controllers\API;

use App\Models\Controlversion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ControlversionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $controlVersions = Controlversion::all();
        return response()->json($controlVersions);
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
            'controlversion' => 'required|string|unique:controlversiones',
        ]);

        $controlVersion = Controlversion::create($request->all());

        return response()->json($controlVersion, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Controlversion  $controlVersion
     * @return \Illuminate\Http\Response
     */
    public function show(Controlversion $controlVersion)
    {
        return response()->json($controlVersion);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Controlversion  $controlVersion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Controlversion $controlVersion)
    {
        $request->validate([
            'controlversion' => 'required|string|unique:controlversiones,controlversion,' . $controlVersion->id,
        ]);

        $controlVersion->update($request->all());

        return response()->json($controlVersion, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Controlversion  $controlVersion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Controlversion $controlVersion)
    {
        $controlVersion->delete();

        return response()->json(null, 204);
    }
}
