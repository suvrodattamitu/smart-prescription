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
    public function patientDetails($patientId) {

        $patientDetails = Patient::where('id',$patientId)->first();

        return response()->json([
            'message'   => 'success',
            'patient_details'    => $patientDetails
        ],200);

    }

    public function addPrescription( Request $request,$patientId ) {

        return $request->all();

        //add data to prescription table first
        $prescriptionId = Prescription::create([
            'patient_id' => $patientId,
            'suggestion' => $request->suggestion
        ])->id;

        //add data to prescription_medical_test_details table

        foreach($request->medical_tests as $test ) {
            PrescriptionMedicalTestDetail::create([
                'prescription_id'   => $prescriptionId,
                'medical_test_id'   => $test->medical_test_id,
                'description'       => $test->description
            ]);
        }

        //add data to prescription_medicine_details table
        PrescriptionMedicineDetail::create([
            'prescription_id'       => $prescriptionId,
            'type_id'               => $request->type_id,
            'medicine_id'           => $request->medicine_id,
            'eating_time_breakfast' => $request->eating_time_breakfast,
            'eating_time_lunch'     => $request->eating_time_lunch,
            'eating_time_dinner'    => $request->eating_time_dinner,
            'eating_term'           => $request->eating_term,
            'days'                  => $request->days,
            'duration'              => $request->duration,
        ]);

        return response()->json([
            'message'   => 'Prescription added successfully!!'
        ],200);

    }

    public function findMedicine( Request $request ) {
        $medicines = Medicine::where('name','like','%'.$request->name.'%')->get();
        return response()->json([
            'message'   => 'success',
            'medicines'  => $medicines
        ]);
    }
}