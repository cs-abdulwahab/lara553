<?php

use App\Device;
use App\Http\Controllers\Auth;

use App\Http\Controllers\DeviceController;
use App\Http\Controllers\SensorDataController;
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

//Route::apiResource('teacher', 'TeacherController')->middleware('auth:api');

Route::middleware('auth:api')->get('/user', function (Request $request) {

    return 'ok';
    //return Auth::guard('api')->user()->id;
});

// Route::post('/register', 'UserController@authenticate');
Route::post('register', 'UserController@register');
Route::post('login', 'Auth\UserLoginController@login');
//Route::post('logout', 'Auth\LoginController@logout');*/


Route::group(['prefix' => 'v1', 'middleware' => 'auth:api'], function () {
    //  Route::resource('task', 'TasksController');
    //  Route::apiResource('hostel', 'HostelController');
    //  Route::apiResource('faculty', 'FacultyController');

    Route::get('device/{device}/currenttemp', 'DeviceSensorDataController@currenttemp');

    Route::get('user/{user}/device1/', 'UserDeviceController@index1');

    Route::apiResource('device', 'DeviceController');
    Route::apiResource('user.device', 'UserDeviceController');
    Route::apiResource('device.sensordata', 'DeviceSensorDataController');
    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_api_routes
});


Route::apiResource('user', 'UserController');
//Route::get('bus', 'BusController@index');

//Route::apiResource('student', 'StudentController')->middleware('auth:api');


Route::apiResource('survey', 'SurveyController');
/*

Route::get('intrusion', 'IntrusionController@index');
Route::get('intrusion/{intrusion}', 'IntrusionController@show');*/


/*

Route::apiResource('survey.question', 'QuestionController');


Route::apiResource('resturant', 'RestaurantController');
Route::apiResource('mymodel', 'MyModelController');




*/
