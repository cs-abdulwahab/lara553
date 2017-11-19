<?php

use App\Device;
use App\Events\SensorEvent;
use App\Http\Controllers\Auth;

use App\Http\Controllers\DeviceController;
use App\Http\Controllers\SensorDataController;
use App\Http\Resources\SensorDataResource;
use App\SensorData;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::middleware('auth:api')->get('/user', function (Request $request) {

    return 'ok';
    //return Auth::guard('api')->user()->id;
});

// Route::post('/register', 'UserController@authenticate');
Route::post('register', 'UserController@register');
Route::post('login', 'Auth\UserLoginController@login');
//Route::post('logout', 'Auth\LoginController@logout');*/

Route::post('device/{devicekey}/sensordata', 'DeviceSensorDataController@home')->name('hardsensor.save');
Route::group(['prefix' => 'v1', 'middleware' => 'auth:api'], function () {

    Route::get('/', 'HomeController@push');



    Route::get('/trigger', function () {

        $s = SensorData::first();


        //event(new SensorEvent($s));
        event(new SensorEvent(new  SensorDataResource($s)));

        $ss = new SensorDataResource($s);

        return $ss;

    });


    Route::get('device/{device}/currenttemp', 'DeviceSensorDataController@currenttemp');
//    Route::get('user/{user}/device1/', 'UserDeviceController@index1');
    Route::apiResource('device', 'DeviceController');
    Route::apiResource('device.sensordata', 'DeviceSensorDataController');
    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_api_routes
});



Route::apiResource('user', 'UserController');

/*

Route::get('intrusion', 'IntrusionController@index');
Route::get('intrusion/{intrusion}', 'IntrusionController@show');*/
/*
