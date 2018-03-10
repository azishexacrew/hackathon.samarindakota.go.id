<?php

use Illuminate\Http\Request;
use App\Models\User;
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
    return $request->user();
});

//Route JWT Auth
Route::post('/auth/token', 'TokenController@auth');
Route::get('/auth/refresh', 'TokenController@refresh');
Route::get('/auth/token/invalidate', 'TokenController@invalidate');

//Route Profile
Route::get('/', function (){
    $user = User::with('profil')->first();
    return response()->json(['data'=>$user]);
});

Route::group(['prefix' => 'report'], function (){

    //Route Reportpersonal
    Route::group(['prefix' => 'personal', 'namespace' => 'API\Report\Personal'], function (){
        Route::get('/reportpersonal', 'ReportpersonalController@index');
        Route::post('/reportpersonal/create', 'ReportpersonalController@store');
        Route::post('/reportpersonal/edit/{id}', 'ReportpersonalController@update');
        Route::delete('/reportpersonal/delete/{id}', 'ReportpersonalController@destroy');
        Route::get('/reportpersonal/{id}', 'ReportpersonalController@getPersonalreport');
    });
});

Route::group(['prefix' => 'data', 'namespace' => 'API\Data'], function(){

    //Route TPS
    Route::get('/tps', 'TpsController@index');
    Route::post('/tps/create', 'TpsController@store');
    Route::post('/tps/edit/{id}', 'TpsController@update');
    Route::delete('/tps/delete/{id}', 'TpsController@destroy');
    Route::get('/tps/{id}', 'TpsController@show');

    //Route Angkutan
    Route::get('/angkutan', 'AngkutanController@index');
    Route::post('/angkutan/create', 'AngkutanController@store');
    Route::post('/angkutan/edit/{id}', 'AngkutanController@update');
    Route::delete('/angkutan/delete/{id}', 'AngkutanController@destroy');
    Route::get('/angkutan/{id}', 'AngkutanController@show');
});

Route::group(['prefix' => 'data'], function(){
    Route::group(['prefix' => 'rute', 'namespace' => 'API\Data\Rute'], function (){

        //Route Rute
        Route::get('/rute', 'RuteController@index');
        Route::post('/rute/create', 'RuteController@store');
        Route::post('/rute/edit/{id}', 'RuteController@update');
        Route::delete('/rute/delete/{id}', 'RuteController@destroy');
        Route::get('/rute/{id}', 'RuteController@show');

        //Route Rute Detail
        Route::get('/rutedetail', 'RutedetailController@index');
        Route::post('/rutedetail/create', 'RutedetailController@store');
        Route::post('/rutedetail/edit/{id}', 'RutedetailController@update');
        Route::delete('/rutedetail/delete/{id}', 'RutedetailController@destroy');
        Route::get('/rutedetail/{id}', 'RutedetailController@show');

        //Route Rute Track
        Route::get('/rutetrack', 'RutetrackController@index');
        Route::post('/rutetrack/create', 'RutetrackController@store');
        Route::post('/rutetrack/edit/{id}', 'RutetrackController@update');
        Route::delete('/rutetrack/delete/{id}', 'RutetrackController@destroy');
        Route::get('/rutetrack/{id}', 'RutetrackController@show');
    });
});