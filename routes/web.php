<?php

use Illuminate\Support\Facades\Route;

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

//medical tests
Route::post('/save-test','SmartPrescription\MedicalTestController@addTest');
Route::get('/tests','SmartPrescription\MedicalTestController@allTests');

Route::post('/save-group','SmartPrescription\MedicineGroupController@addGroup');

Auth::routes();
Route::get('/', function () {
    return view('app');
})->middleware('auth');

Route::get('/{any}', function(){
    return view('app');
})->middleware('auth')->where('any', '.*');

