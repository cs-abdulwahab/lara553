<?php

namespace App\Http\Controllers;

use App\Device;
use App\Exceptions\SampleException;
use App\User;
use http\Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeviceController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Device::all();
    }

    /*
        public function registerDevice(User $user, Request $request)
        {
            ['devicekey', 'name', 'status', 'user_id'];

            return 'register device' . $user->email;
        }*/


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

        throw new SampleException;

        // you should validate before storing

        $user = Auth::guard('api')->user();
        $request->merge(['user_id' => $user->id]);

        $d = Device::where('devicekey', $request->devicekey   )->first();

        if ($d != null) {
            echo 'condition true';
        } else {

            echo 'condition false ';

        }

        /*

        try {

            Device::create($request->all());

        } catch (Exception $exception) {
            // report($exception);
            // echo $exception->getMessage();
            //throw new CustomException($exception->getMessage());

            return false;*/

//

        $d = Device::where('devicekey', $request->devicekey)->first();

        return $d;


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Device $device
     * @return \Illuminate\Http\Response
     */
    public function show(Device $device)
    {
        // in the backend  it will find the device from the Device Elequont Model
        // and it will search by id by default

        return $device;

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Device $device
     * @return \Illuminate\Http\Response
     */
    public function edit(Device $device)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Device $device
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Device $device)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Device $device
     * @return \Illuminate\Http\Response
     */
    public function destroy(Device $device)
    {
        Device::destroy($device);
    }
}
