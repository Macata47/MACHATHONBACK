<?php

namespace App\Http\Controllers\API;

use App\Models\Bootcamp;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BootcampController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bootcamps = Bootcamp::all();
        return response()->json($bootcamps);
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
            'bootcamp' => 'required|string|unique:bootcamps',
        ]);

        $bootcamp = Bootcamp::create($request->all());

        return response()->json($bootcamp, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bootcamp  $bootcamp
     * @return \Illuminate\Http\Response
     */
    public function show(Bootcamp $bootcamp)
    {
        return response()->json($bootcamp);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bootcamp  $bootcamp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bootcamp $bootcamp)
    {
        $request->validate([
            'bootcamp' => 'required|string|unique:bootcamps,bootcamp,' . $bootcamp->id,
        ]);

        $bootcamp->update($request->all());

        return response()->json($bootcamp, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bootcamp  $bootcamp
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bootcamp $bootcamp)
    {
        $bootcamp->delete();

        return response()->json(null, 204);
    }
}

