<?php

use App\Http\Controllers\Auth;
use Illuminate\Http\Request;
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

Route::post('login','Auth\UserLoginController@login');
//Route::post('logout', 'Auth\LoginController@logout');*/


Route::group(['prefix' => 'v1', 'middleware' => 'auth:api'], function () {
    //    Route::resource('task', 'TasksController');
    Route::apiResource('hostel', 'HostelController');
   // Route::apiResource('faculty', 'FacultyController');

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_api_routes
});
/*
Route::apiResource('survey', 'SurveyController');
Route::apiResource('survey.question', 'QuestionController');


Route::apiResource('resturant', 'RestaurantController');
Route::apiResource('mymodel', 'MyModelController');




*/
