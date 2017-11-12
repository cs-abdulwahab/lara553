<?php

namespace App\Http\Controllers;

use App\SensorData;
use Carbon\Carbon;
use DummyFullModelClass;
use App\Device;
use Illuminate\Http\Request;

class DeviceSensorDataController extends Controller
{

    public function currenttemp(Request $request, Device $device)
    {

        $data = $device->sensordata->last();

        $data->temp = rand(30, 31);
        $data->humidity = rand(83, 85);
        $data->setSensorDt(Carbon::now()->toDateTimeString());
        $data->save();

        return $data;


    }


    /**
     * Display a listing of the resource.
     *
     * @param  \App\Device $device
     * @return \Illuminate\Http\Response
     */
    public function index(Device $device)
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Device $device
     * @return \Illuminate\Http\Response
     */
    public function create(Device $device)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Device $device
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Device $device)
    {

        $s = new SensorData($request->all());

        return $device->sensordata()->save($s);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Device $device
     * @param  \DummyFullModelClass $DummyModelVariable
     * @return \Illuminate\Http\Response
     */
    public function show(Device $device, DummyModelClass $DummyModelVariable)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Device $device
     * @param  \DummyFullModelClass $DummyModelVariable
     * @return \Illuminate\Http\Response
     */
    public function edit(Device $device, DummyModelClass $DummyModelVariable)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Device $device
     * @param  \DummyFullModelClass $DummyModelVariable
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Device $device, DummyModelClass $DummyModelVariable)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Device $device
     * @param  \DummyFullModelClass $DummyModelVariable
     * @return \Illuminate\Http\Response
     */
    public function destroy(Device $device, DummyModelClass $DummyModelVariable)
    {
        //
    }
}
