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
    public $user;

    /**
     * DeviceController constructor.
     */
    public function __construct()
    {
        $this->user = Auth::guard('api')->user();

    }


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
        // 'device controller save';

        //throw new SampleException;

        // TODO: you should validate before storing

        $user = $this->user;

//        $request->merge(['user_id' => $user->id]);

        $device = Device::where('devicekey', $request->devicekey)->first();

        //TODO:  Generate appropriate response
        if ($device == null) {

            $d = new Device($request->all());
            return $user->devices()->save($d);

        }  else {

            //  Check out the methods below and generate appropriate response
            //  entering  already added device   by   same user
            //  entering  already added device   by   Different User

            if (Auth::user()->id == $device->user_id) {
                return response(['msg' => 'Device Already Existed(1) by you ',
                    'owner' => $device->user_id,
                ], 422);

            } else {
                return response(['msg' => 'Device Already Existed(2) by someone else',
                    'owner' => $device->user_id,
                ], 422);

            }
        }

        $d = Device::where('devicekey', $request->devicekey)->first();

        // return $d;


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

        $device->status = $request->status;
        $device->save();
        //TODO : if save then  ok else error response
        return $device;

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
