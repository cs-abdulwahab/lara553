<?php

namespace App\Http\Controllers;

use App\Events\SensorEvent;
use App\Http\Resources\SensorDataResource;
use App\Http\Resources\SensorDataResourceCollection;
use App\SensorData;
use App\User;
use Carbon\Carbon;
use DummyFullModelClass;
use App\Device;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        //TODO : Instead of taking the last  3 values of the the device
        $ar = $device->sensordata->reverse()->take(3);

        //return $ar;

        return new SensorDataResourceCollection($ar);

        //return Collection::unwrap($ar  );


        //      return SensorData::where('device_id','33')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param SensorData $sensorData
     * @return \Illuminate\Http\Response
     */
    public function create(SensorData $sensorData)
    {
        //
    }

    public function home(Request $request, $devicekey)
    {
        $device = Device::all()->where('devicekey', $devicekey)->first();

        if ($device != null) {

            if ($device->isActive()) {

                $s = new SensorData($request->all());
                $s->setSensorDt(Carbon::now()->toDateTimeString());

                $sensorvalues = $device->sensordata()->save($s);


               //TODO: on every device save data  SEND data of all the devices
                event(new SensorEvent(new  SensorDataResource($sensorvalues)));

                return $sensorvalues;

            } else {
                return ' in some json  device is not active222';
            }

        } else {

            //TODO : Create a log  that some one has problem in configuring
            return 'no device exist with this name = ' . $devicekey;

        }


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

        if ($device->isActive()) {
            $s = new SensorData($request->all());
            return $device->sensordata()->save($s);

        } else {
            return ' in some json  device is not active';
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Device $device
     * @param SensorData $sensorData
     * @return \Illuminate\Http\Response
     */
    public function show(Device $device, SensorData $sensorData)
    {
        return $device->sensordata;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param SensorData $sensorData
     * @return \Illuminate\Http\Response
     * @internal param Device $device
     */
    public function edit(SensorData $sensorData)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param SensorData $sensorData
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SensorData $sensorData)
    {
        // TODO Update SensorDataValue   according to the action taken against  it
        // as a false alarm or as a testing alarm   or a sensor fluctuation

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param SensorData $sensorData
     * @return \Illuminate\Http\Response
     * @internal param Device $device
     */
    public function destroy(SensorData $sensorData)
    {
        //TODO: Softdelete the sensordata
        //SensorData::destroy($sensorData);
    }
}
