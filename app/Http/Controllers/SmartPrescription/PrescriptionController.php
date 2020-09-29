<?php

namespace App\Http\Controllers\SmartPrescription;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\Prescription;
use App\Model\PrescriptionMedicalTestDetail;
use App\Model\PrescriptionMedicineDetail;
use App\Model\Patient;
use App\Model\Medicine;

class PrescriptionController extends Controller
{
    public function getPrescriptionByPrescriptionId($prescriptionId) {
        
        $prescription = Prescription::where('id',$prescriptionId)->with('patient','prescription_tests.test','prescription_medicines.medicine','prescription_medicines.medicine.type')->first();
        return response()->json([
            'message'       => 'success',
            'prescription'  => $prescription
        ],200);

    }

    public function getPrescriptionsByPatientId($patientId) {

        $patient = Patient::where('id',$patientId)->with('prescriptions')->first();
        return response()->json([
            'message'       => 'success',
            'patient'  => $patient
        ],200);

    }

    public function patientDetails($patientId) {

        $patientDetails = Patient::where('id',$patientId)->first();

        return response()->json([
            'message'   => 'success',
            'patient_details'    => $patientDetails
        ],200);

    }

    public function addPrescription( Request $request,$patientId ) {
        
        //add data to prescription table first
        $prescriptionId = Prescription::create([
            'patient_id' => $patientId,
            'suggestion' => $request->suggestion
        ])->id;

        //add data to prescription_medical_test_details table

        foreach($request->medical_tests as $test ) {
            if ($test['medical_test_id']) {
                PrescriptionMedicalTestDetail::create([
                    'prescription_id'   => $prescriptionId,
                    'medical_test_id'   => $test['medical_test_id'],
                    'description'       => $test['description']
                ]);
            }
        }

        //add data to prescription_medicine_details table
        foreach ($request->medicine_details as $medicine_detail) {
            if ($medicine_detail['medicine_id']) {
                PrescriptionMedicineDetail::create([
                    'prescription_id'       => $prescriptionId,
                    'medicine_id'           => $medicine_detail['medicine_id'],
                    'eating_time_breakfast' => ($medicine_detail['eating_time_breakfast']) ? $medicine_detail['eating_time_breakfast'] : 0,
                    'eating_time_lunch'     => ($medicine_detail['eating_time_lunch']) ? $medicine_detail['eating_time_lunch'] : 0,
                    'eating_time_dinner'    => ($medicine_detail['eating_time_dinner']) ? $medicine_detail['eating_time_dinner'] : 0,
                    'eating_term'           => $medicine_detail['eating_term'],
                    'days'                  => $medicine_detail['days'],
                    'duration'              => $medicine_detail['duration'],
                ]);
            }
        }

        Patient::where('id',$patientId)->update([
            'is_prescribed' => 1
        ]);

        return response()->json([
            'message'   => 'Prescription added successfully!!'
        ],200);

    }

    public function updatePrescription( Request $request,$prescriptionId ) {

        //update data to prescription table first
        Prescription::where('id',$prescriptionId)->update([
            'suggestion' => $request->suggestion
        ]);
        
        PrescriptionMedicalTestDetail::where('prescription_id',$prescriptionId)->delete();
        foreach($request->medical_tests as $test ) {
            if ($test['medical_test_id']) {
                PrescriptionMedicalTestDetail::create([
                    'prescription_id'   => $prescriptionId,
                    'medical_test_id'   => $test['medical_test_id'],
                    'description'       => $test['description']
                ]);
            }
        }

        //add data to prescription_medicine_details table
        PrescriptionMedicineDetail::where('prescription_id',$prescriptionId)->delete();

        foreach ($request->medicine_details as $medicine_detail) {
            if ($medicine_detail['medicine_id']) {
                PrescriptionMedicineDetail::create([
                    'prescription_id'       => $prescriptionId,
                    'medicine_id'           => $medicine_detail['medicine_id'],
                    'eating_time_breakfast' => ($medicine_detail['eating_time_breakfast']) ? $medicine_detail['eating_time_breakfast'] : 0,
                    'eating_time_lunch'     => ($medicine_detail['eating_time_lunch']) ? $medicine_detail['eating_time_lunch'] : 0,
                    'eating_time_dinner'    => ($medicine_detail['eating_time_dinner']) ? $medicine_detail['eating_time_dinner'] : 0,
                    'eating_term'           => $medicine_detail['eating_term'],
                    'days'                  => $medicine_detail['days'],
                    'duration'              => $medicine_detail['duration'],
                ]);
            }
        }

        return response()->json([
            'message'   => 'Prescription added successfully!!'
        ],200);

    }

    public function findMedicine( Request $request ) {
        $medicines = Medicine::where('name','like','%'.$request->name.'%')->with('type')->get();
        return response()->json([
            'message'   => 'success',
            'medicines'  => $medicines
        ],200);
    }

    public function editPrescription( $prescriptionId ) {

        $prescription = Prescription::where('id',$prescriptionId)->with('patient','prescription_tests.test','prescription_medicines.medicine')->first();
        return response()->json([
            'message'       => 'success',
            'prescription'  => $prescription
        ],200);

    }

    public function deletePrescription( $prescriptionId ) {

        PrescriptionMedicalTestDetail::where('prescription_id',$prescriptionId)->delete();
        PrescriptionMedicineDetail::where('prescription_id',$prescriptionId)->delete();
        Prescription::where('id',$prescriptionId)->delete();

        return response()->json([
            'message'           => 'success',
        ],200);

    }
    
}
