<?php

namespace App\Http\Controllers\SmartPrescription;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\Prescription;
use App\Model\PrescriptionMedicalTestDetail;
use App\Model\PrescriptionMedicineDetail;
use App\Model\Patient;

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

        //add data to prescription table first
        $prescriptionId = Prescription::create([
            'patient_id' => $patientId,
            'suggestion' => $request->suggestion
        ])->id;

        //add data to prescription_medical_test_details table
        PrescriptionMedicalTestDetail::create([
            'prescription_id'   => $prescriptionId,
            'medical_test_id'   => $request->medical_test_id,
            'description'       => $request->description
        ]);

        //add data to prescription_medicine_details table
        PrescriptionMedicineDetail::create([
            'prescription_id'   => $prescriptionId,
            'type_id'           => $request->type_id,
            'medicine_id'       => $request->medicine_id,
            'eating_time'       => $request->eating_time,
            'eating_term'       => $request->eating_term,
            'days'              => $request->days,
            'duration'          => $request->duration,
            'medical_test_name' => $request->medical_test_name,
        ]);

        return response()->json([
            'message'   => 'Prescription added successfully!!'
        ],200);

    }
}
