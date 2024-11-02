<?php

use Illuminate\Support\Facades\Route;

// Route::post('/register-user', 'SmartPrescription\RegisterController@create');


Route::get('/dashboard', 'SmartPrescription\DashboardController@dashboard');

//medical tests
Route::post('/save-test', 'SmartPrescription\MedicalTestController@addTest');
Route::get('/tests', 'SmartPrescription\MedicalTestController@allTests');
Route::get('/all-test-lists', 'SmartPrescription\MedicalTestController@allTestLists');
Route::delete('/delete-test/{id}', 'SmartPrescription\MedicalTestController@deleteTest');
Route::get('/test/{id}', 'SmartPrescription\MedicalTestController@editTest');
Route::post('/update-test', 'SmartPrescription\MedicalTestController@updateTest');

//medicine groups
Route::post('/save-group', 'SmartPrescription\MedicineGroupController@addGroup');
Route::get('/groups', 'SmartPrescription\MedicineGroupController@allGroups');
Route::get('/group/{id}', 'SmartPrescription\MedicineGroupController@editGroup');
Route::post('/update-group', 'SmartPrescription\MedicineGroupController@updateGroup');
Route::delete('/delete-group/{id}', 'SmartPrescription\MedicineGroupController@deleteGroup');

//medicine types
Route::post('/save-type', 'SmartPrescription\MedicineTypeController@addType');
Route::get('/types', 'SmartPrescription\MedicineTypeController@allTypes');
Route::get('/type/{id}', 'SmartPrescription\MedicineTypeController@editType');
Route::post('/update-type', 'SmartPrescription\MedicineTypeController@updateType');
Route::delete('/delete-type/{id}', 'SmartPrescription\MedicineTypeController@deleteType');

//companies
Route::post('/save-company', 'SmartPrescription\CompanyController@addCompany');
Route::get('/companies', 'SmartPrescription\CompanyController@allCompanies');
Route::get('/company/{id}', 'SmartPrescription\CompanyController@editCompany');
Route::post('/update-company', 'SmartPrescription\CompanyController@updateCompany');
Route::delete('/delete-company/{id}', 'SmartPrescription\CompanyController@deleteCompany');

//patient 
Route::post('/save-patient', 'SmartPrescription\PatientController@addPatient');
Route::get('/patients', 'SmartPrescription\PatientController@allPatients');
Route::get('/patient/{id}', 'SmartPrescription\PatientController@editPatient');
Route::get('/get-patient/{id}', 'SmartPrescription\PatientController@getPatient');
Route::post('/update-patient', 'SmartPrescription\PatientController@updatePatient');
Route::delete('/delete-patient/{id}', 'SmartPrescription\PatientController@deletePatient');

//medicines
Route::get('/download', 'SmartPrescription\MedicineController@downloadMedicine');
Route::get('/get-additional-medicine-data', 'SmartPrescription\MedicineController@getAdditionalMedicineData');
Route::post('/save-medicine', 'SmartPrescription\MedicineController@addMedicine');
Route::get('/medicines', 'SmartPrescription\MedicineController@allMedicines');
Route::get('/medicine/{id}', 'SmartPrescription\MedicineController@editMedicine');
Route::post('/update-medicine', 'SmartPrescription\MedicineController@updateMedicine');
Route::delete('/delete-medicine/{id}', 'SmartPrescription\MedicineController@deleteMedicine');

//profiles
Route::get('/get-profile', 'SmartPrescription\ProfileController@getProfile');
Route::post('/update-profile', 'SmartPrescription\ProfileController@updateProfile');

//settings 
Route::post('/change-password','SmartPrescription\SettingsController@changePassword');
Route::get('/get-header-footer','SmartPrescription\SettingsController@getHeaderFooter');
Route::post('/update-header-footer','SmartPrescription\SettingsController@updateHeaderFooter');


//prescriptions 
Route::get('/patient-details/{patient_id}','SmartPrescription\PrescriptionController@patientDetails');
Route::post('/add-prescription/{patient_id}','SmartPrescription\PrescriptionController@addPrescription');
Route::delete('/prescription/{prescription_id}','SmartPrescription\PrescriptionController@deletePrescription');
Route::post('/update-prescription/{prescription_id}','SmartPrescription\PrescriptionController@updatePrescription');

Route::post('/find-medicine','SmartPrescription\PrescriptionController@findMedicine');
Route::get('/get-prescription/{prescription_id}','SmartPrescription\PrescriptionController@getPrescriptionByPrescriptionId');
Route::get('/prescriptions/{patient_id}','SmartPrescription\PrescriptionController@getPrescriptionsByPatientId');


Auth::routes();
Route::get('/', function () {
    return view('app');
})->middleware('auth');

Route::get('/{any}', function () {
    return view('app');
})->middleware('auth')->where('any', '.*');
