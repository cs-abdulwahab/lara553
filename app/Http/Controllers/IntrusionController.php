<?php

namespace App\Http\Controllers;

use App\Http\Resources\IntrusionResource;
use App\Http\Resources\IntrusionResourceCollection;
use App\Intrusion;
use Illuminate\Http\Request;

class IntrusionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new IntrusionResourceCollection(Intrusion::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Intrusion $intrusion
     * @return IntrusionResource
     */
    public function show(Intrusion $intrusion)
    {
        return new IntrusionResource($intrusion);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Intrusion $intrusion
     * @return \Illuminate\Http\Response
     */
    public function edit(Intrusion $intrusion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Intrusion $intrusion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Intrusion $intrusion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Intrusion $intrusion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Intrusion $intrusion)
    {
        //
    }
}
