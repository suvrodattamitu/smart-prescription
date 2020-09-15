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
Route::delete('/delete-test/{id}','SmartPrescription\MedicalTestController@deleteTest');
Route::get('/test/{id}','SmartPrescription\MedicalTestController@editTest');
Route::post('/update-test','SmartPrescription\MedicalTestController@updateTest');

//medicine groups
Route::post('/save-group','SmartPrescription\MedicineGroupController@addGroup');
Route::get('/groups','SmartPrescription\MedicineGroupController@allGroups');
Route::get('/group/{id}','SmartPrescription\MedicineGroupController@editGroup');
Route::post('/update-group','SmartPrescription\MedicineGroupController@updateGroup');
Route::delete('/delete-group/{id}','SmartPrescription\MedicineGroupController@deleteGroup');

//medicine types
Route::post('/save-type','SmartPrescription\MedicineTypeController@addType');
Route::get('/types','SmartPrescription\MedicineTypeController@allTypes');
Route::get('/type/{id}','SmartPrescription\MedicineTypeController@editType');
Route::post('/update-type','SmartPrescription\MedicineTypeController@updateType');
Route::delete('/delete-type/{id}','SmartPrescription\MedicineTypeController@deleteType');

//companies
Route::post('/save-company','SmartPrescription\CompanyController@addCompany');
Route::get('/companies','SmartPrescription\CompanyController@allCompanies');
Route::get('/company/{id}','SmartPrescription\CompanyController@editCompany');
Route::post('/update-company','SmartPrescription\CompanyController@updateCompany');
Route::delete('/delete-company/{id}','SmartPrescription\CompanyController@deleteCompany');

//patient
Route::post('/save-patient','SmartPrescription\PatientController@addPatient');
Route::get('/patients','SmartPrescription\PatientController@allPatients');
Route::get('/patient/{id}','SmartPrescription\PatientController@editPatient');
Route::post('/update-patient','SmartPrescription\PatientController@updatePatient');
Route::delete('/delete-patient/{id}','SmartPrescription\PatientController@deletePatient');

//medicines
Route::get('/get-additional-medicine-data','SmartPrescription\MedicineController@getAdditionalMedicineData');
Route::post('/save-medicine','SmartPrescription\MedicineController@addMedicine');
Route::get('/medicines','SmartPrescription\MedicineController@allMedicines');
Route::get('/medicine/{id}','SmartPrescription\MedicineController@editMedicine');
Route::post('/update-medicine','SmartPrescription\MedicineController@updateMedicine');
Route::delete('/delete-medicine/{id}','SmartPrescription\MedicineController@deleteMedicine');

Auth::routes();
Route::get('/',function () {
    return view('app');
})->middleware('auth');

Route::get('/{any}', function(){
    return view('app');
})->middleware('auth')->where('any', '.*');

