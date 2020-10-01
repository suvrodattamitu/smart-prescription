<?php

namespace App\Http\Controllers\SmartPrescription;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\MedicalTest;
use Illuminate\Foundation\Validation\ValidationException;

class MedicalTestController extends Controller
{
    public function allTests() {

        $searchTerm = $_REQUEST['q'];

        $allTests = array();

        if( $searchTerm ){
            $allTests = MedicalTest::where('name','like',"%$searchTerm%")->latest()->paginate(5);
        }else{
            $allTests = MedicalTest::latest()->paginate(5);
        }
       
        

        // return response()->json([
        //     'message'           => 'success',
        //     'medical_tests'    => $allTests,
        //     'search'=> $searchTerm
        // ],200);

        return $allTests;

    }

    public function addTest( Request $reqeust ) {

        try {

            $reqeust->validate([
                'name'          => 'required',
                'description'   => 'required'
            ]);

            MedicalTest::create([
                'name'          => $reqeust->name,
                'description'   => $reqeust->description,
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

    public function editTest( $id ) {

        $medicalTest = MedicalTest::where('id',$id)->first();
        return response()->json([
            'message'   => 'success',
            'medical_test'   => $medicalTest
        ],200);

    }

    public function updateTest( Request $reqeust ) {

        try {

            $reqeust->validate([
                'name'          => 'required',
                'description'   => 'required'
            ]);

            MedicalTest::where('id',$reqeust->id)->update([
                'name'          => $reqeust->name,
                'description'   => $reqeust->description,
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

    public function deleteTest($id) {

        MedicalTest::where('id',$id)->delete();
        return response()->json([
            'message'   => 'success',
        ],200);

    }
}
