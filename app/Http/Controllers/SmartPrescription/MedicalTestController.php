<?php

namespace App\Http\Controllers\SmartPrescription;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\MedicalTest;
use Illuminate\Foundation\Validation\ValidationException;

class MedicalTestController extends Controller
{
    public function allTests() {
       
        $allTests = MedicalTest::all();

        return response()->json([
            'message'           => 'success',
            'medicine_tests'    => $allTests
        ],200);

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
}
