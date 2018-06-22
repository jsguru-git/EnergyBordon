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

define('SESS_USER_ID',              'SESS_USER_ID');
define('SESS_USER_NAME',            'SESS_USER_NAME');
define('SESS_PASSWORD',             'SESS_PASSWORD');

Route::get('/', function () {
    return view('login');
});

Route::get('/login', function() {

    return view('login');
});

Route::get('/sign-up', function() {
    return view('signUp');
});

Route::get('/main-board', function() {
    return view('mainBoard');
});

Route::get('/dashboard', function() {
    return view('DashBoard');
});

Route::get('/view_cost', function() {
    return view('ViewCost');
});

Route::get('/energy_data', function() {
    return view('EnergyData');
});

Route::post("/login",           'LoginController@login');
Route::post("/sign-up",         'LoginController@signUp');
Route::post("/main-board",      'LoginController@mainBoard');
Route::get("/setting",          'LoginController@setting');
Route::get("/get-data",         'LoginController@getData');
Route::post("/get_inf",         'LoginController@viewCost');
Route::post("/cost_setting",    'LoginController@cost_setting');
Route::post("/get_cost_inf",    'LoginController@get_cost');
// added newly
// Route::get("/get-house-info",   'HouseInfoController@getHouseInfo');
