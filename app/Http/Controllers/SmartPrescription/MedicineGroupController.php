<?php

namespace App\Http\Controllers\SmartPrescription;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\MedicineGroup;
use Illuminate\Foundation\Validation\ValidationException;

class MedicineGroupController extends Controller
{
    public function addGroup( Reqeust $reqeust ) {

        try {

            $reqeust->validate([
                'name'          => 'required',
                'description'   => 'required'
            ]);

            MedicineGroup::create([
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
