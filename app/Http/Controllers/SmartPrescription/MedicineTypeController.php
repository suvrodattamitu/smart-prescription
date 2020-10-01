<?php

namespace App\Http\Controllers\SmartPrescription;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\MedicineType;
use Illuminate\Foundation\Validation\ValidationException;

class MedicineTypeController extends Controller
{
    public function addType( Request $reqeust ) {

        try {

            $reqeust->validate([
                'name'          => 'required',
            ]);

            MedicineType::create([
                'name'  => $reqeust->name,
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

    public function allTypes() {

        $searchTerm = $_REQUEST['q'];
        $allTypes = [];

        if( $searchTerm ) { 
            $allTypes = MedicineType::where('name','like',"%$searchTerm%")->latest()->paginate(5);
        }else {
            $allTypes = MedicineType::latest()->paginate(5);
        }
        
        return $allTypes;

    }

    public function editType( $id ) {

        $medicineType = MedicineType::where('id',$id)->first();
        return response()->json([
            'message'   => 'success',
            'medicine_type'   => $medicineType
        ],200);

    }

    public function updateType( Request $reqeust ) {

        try {

            $reqeust->validate([
                'name'          => 'required',
            ]);

            MedicineType::where('id',$reqeust->id)->update([
                'name'          => $reqeust->name,
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

    public function deleteType($id) {

        MedicineType::where('id',$id)->delete();
        return response()->json([
            'message'   => 'success',
        ],200);

    }
}
