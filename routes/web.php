<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//use App\Http\Controllers\SurveyController;

use App\Events\SensorEvent;
use App\SensorData;
use ConsoleTVs\Charts\Facades\Charts;
use Illuminate\Support\Facades\Route;

/*Route::get('/', function () {
    return view('welcome');
});*/



Route::get(
    '/a', function () {
    /*
        $data['message'] = 'hello world';
        $pusher->trigger('my-channel', 'my-event', $data);
    */


    $s = SensorData::first();

    broadcast(new SensorEvent($s))->toOthers();
    event(new SensorEvent($s));

    echo 'echo ';


    dd();


    $aa = Charts::create('temp', 'canvas-gauges')
        ->title('My nice chart')
        ->elementLabel('My nice label')
        ->values([65, 0, 100])
        ->responsive(false)
        ->height(500)
        ->width(200);
    /*  $a[1] = Charts::create('gauge', 'canvas-gauges')
          ->title('My nice chart')
          ->elementLabel('My nice label')
          ->values([65, 0, 100])
          ->responsive(false)
          ->height(300)
          ->width(0);*/
    $c = Charts::multi('line', 'highcharts')
        ->title('My nice chart')
        ->labels(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'])
        ->colors(['#2196F3', '#F44336'])
        ->dataset('John', [3, 4, 3, 5, 4, 10, 12])
        ->dataset('Jane', [1, 3, 4, 3, 3, 5, 4])
        ->dataset('sJane', [3, 2, 1, 5, 9, 5, 4])
        ->dataset('asd', [5, 6, 8, 7, 3, 5, 4]);
    //  return view('vendor.d3');
    return view('vendor.d3')->with('aa', $aa);

});


Route::group(['middleware' => 'auth'], function () {
    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
    Route::get('test', function () {
        $data = [];
        return view('test', $data);
    })->name('test');

});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
