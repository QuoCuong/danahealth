<?php

use Illuminate\Http\Request;

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

//authentication
Route::post('register', 'Auth\AuthController@register');
Route::post('login', 'Auth\AuthController@login');
Route::group(['middleware' => 'jwt.auth'], function () {
    Route::get('auth', 'Auth\AuthController@user');
    Route::post('logout', 'Auth\AuthController@logout');
});
Route::middleware('jwt.refresh')->get('token/refresh', 'Auth\AuthController@refresh');

//medicine groups
Route::get('medicine-groups', 'MedicineGroupController@index');
Route::get('medicine-groups/subs', 'MedicineGroupController@subs');
Route::get('medicine-groups/{slug}/medicines', 'MedicineGroupController@listMedicines');

//medicines
Route::get('medicines', 'MedicineController@index');
Route::get('medicines/search', 'MedicineController@search');
Route::get('medicines/{medicine}', 'MedicineController@show');

//cities
Route::get('cities', 'CityController@index');
Route::get('cities/{city}/districts', 'CityController@districts');

//prescription
Route::group(['middleware' => 'jwt.auth'], function () {
    Route::post('/order-prescription', 'PrescriptionController@store');
});
