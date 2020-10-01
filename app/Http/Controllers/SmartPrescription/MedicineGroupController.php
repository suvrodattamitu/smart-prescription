<?php

namespace App\Http\Controllers\SmartPrescription;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\MedicineGroup;
use Illuminate\Foundation\Validation\ValidationException;

class MedicineGroupController extends Controller
{
    public function addGroup( Request $reqeust ) {

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

    public function allGroups() {

        $searchTerm = $_REQUEST['q'];

        $allGroups = [];

        if( $searchTerm && !empty($searchTerm) ) { 
            $allGroups = MedicineGroup::where('name','like',"%$searchTerm%")->latest()->paginate(5);
        }else {
            $allGroups = MedicineGroup::latest()->paginate(5);
        }


        return $allGroups;
    }

    public function editGroup( $id ) {

        $medicineGroup = MedicineGroup::where('id',$id)->first();
        return response()->json([
            'message'   => 'success',
            'medicine_group'   => $medicineGroup
        ],200);

    }

    public function updateGroup( Request $reqeust ) {

        try {

            $reqeust->validate([
                'name'          => 'required',
                'description'   => 'required'
            ]);

            MedicineGroup::where('id',$reqeust->id)->update([
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

    public function deleteGroup($id) {

        MedicineGroup::where('id',$id)->delete();
        return response()->json([
            'message'   => 'success',
        ],200);

    }

}
