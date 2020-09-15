<?php

namespace App\Http\Controllers\SmartPrescription;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Patient;
use Illuminate\Foundation\Validation\ValidationException;

class PatientController extends Controller
{
    public function addPatient( Request $reqeust ) {

        try {

            $reqeust->validate([
                'name'             => 'required',
                'visiting_no'      => 'required',
                'age'              => 'required',
                'regi_no'          => 'required',
                'gender'           => 'required',
                'marital_status'   => 'required',
                'address'          => 'required',
                'mobile'           => 'required',
                'height'           => 'required',
                'weight'           => 'required',
                'c_c'              => 'required',
                'on_exam'          => 'required',
                'p_a_exam'         => 'required',
            ]);

            Patient::create([
                'name'  => $reqeust->name,
                'visiting_no'  => $reqeust->visiting_no,
                'age'  => $reqeust->age,
                'regi_no'  => $reqeust->regi_no,
                'gender'  => $reqeust->gender,
                'marital_status'  => $reqeust->marital_status,
                'address'  => $reqeust->address,
                'mobile'  => $reqeust->mobile,
                'height'  => $reqeust->height,
                'weight'  => $reqeust->weight,
                'c_c'  => $reqeust->c_c,
                'on_exam'  => $reqeust->on_exam,
                'p_a_exam'  => $reqeust->p_a_exam,
            ]);

            return response()->json([
                'message'   => 'success',
            ],200);

        }catch (ValidationException $exception) {
            
            return response()->json([
                'message'   => 'error',
                'errors'    => $exception->getMessage()
            ],423);
            
        }
        
    }

    public function allPatients() {
        $allPatients = Patient::all();

        return response()->json([
            'message'           => 'success',
            'patients'   => $allPatients
        ],200);
    }

    public function editPatient( $id ) {

        $patient = Patient::where('id',$id)->first();
        return response()->json([
            'message'   => 'success',
            'patient'   => $patient
        ],200);

    }

    public function updatePatient( Request $reqeust ) {

        try {

            $reqeust->validate([
                'name'             => 'required',
                'visiting_no'      => 'required',
                'age'              => 'required',
                'regi_no'          => 'required',
                'gender'           => 'required',
                'marital_status'   => 'required',
                'address'          => 'required',
                'mobile'           => 'required',
                'height'           => 'required',
                'weight'           => 'required',
                'c_c'              => 'required',
                'on_exam'          => 'required',
                'p_a_exam'         => 'required',
            ]);

            Patient::where('id',$reqeust->id)->update([
                'name'  => $reqeust->name,
                'visiting_no'  => $reqeust->visiting_no,
                'age'  => $reqeust->age,
                'regi_no'  => $reqeust->regi_no,
                'gender'  => $reqeust->gender,
                'marital_status'  => $reqeust->marital_status,
                'address'  => $reqeust->address,
                'mobile'  => $reqeust->mobile,
                'height'  => $reqeust->height,
                'weight'  => $reqeust->weight,
                'c_c'  => $reqeust->c_c,
                'on_exam'  => $reqeust->on_exam,
                'p_a_exam'  => $reqeust->p_a_exam,
            ]);

            return response()->json([
                'message'   => 'success',
            ],200);

        }catch (ValidationException $exception) {
            
            return response()->json([
                'message'   => 'error',
                'errors'    => $exception->getMessage()
            ],423);
            
        }
        
    }

    public function deletePatient($id) {
        Patient::where('id',$id)->delete();
        return response()->json([
            'message'   => 'success',
        ],200);

    }
}
