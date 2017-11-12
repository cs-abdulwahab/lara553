<?php

namespace App\Http\Controllers;

use App\Device;
use App\Http\Resources\DeviceResourceCollection;
use Carbon\Carbon;
use DummyFullModelClass;
use App\User;
use Illuminate\Http\Request;

class UserDeviceController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @param  \App\User $user
     * @return DeviceResourceCollection
     */
    public function index1(User $user)
    {
        /*
                return Carbon::now()->addSecond(60)-> diffForHumans();
                return Carbon::parse( '2017-03-09 15:56:18'  )->diffForHumans();

                return Carbon::today();

                return 'asd';*/

        return new DeviceResourceCollection($user->devices);
    }


    /**
     * Display a listing of the resource.
     *
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        return $user->devices;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
        //  first check if  Device already exist ?

        // if yes then  a
        // some other person is trying to add  it   in that case  show message that this already registered with  name
        // or   Owner is trying to re ad this device in that case   show message that this device is already added  refresh your screeen

        // if not then add

        $d = new Device($request->all());

        return $user->devices()->save($d);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User $user
     * @param  \DummyFullModelClass $DummyModelVariable
     * @return \Illuminate\Http\Response
     */
    public function show(User $user, DummyModelClass $DummyModelVariable)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User $user
     * @param  \DummyFullModelClass $DummyModelVariable
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user, DummyModelClass $DummyModelVariable)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\User $user
     * @param  \DummyFullModelClass $DummyModelVariable
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user, DummyModelClass $DummyModelVariable)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User $user
     * @param  \DummyFullModelClass $DummyModelVariable
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user, DummyModelClass $DummyModelVariable)
    {
        //
    }
}
