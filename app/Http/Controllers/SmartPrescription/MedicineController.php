<?php

namespace App\Http\Controllers\SmartPrescription;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\Medicine;
use App\Model\MedicineGroup;
use App\Model\MedicineType;
use App\Model\Company;

use Illuminate\Foundation\Validation\ValidationException;

class MedicineController extends Controller
{
    public function getAdditionalMedicineData() {

        $types      = MedicineType::all();
        $companies  = Company::all();
        $groups     = MedicineGroup::all();

        return response()->json([
            'message'   => 'success',
            'types'     => $types,
            'companies' => $companies,
            'groups'    => $groups,
        ],200);

    }

    public function allMedicines() {
        
        $searchTerm = $_REQUEST['q'];
        $allMedicines = array();
        $Query = Medicine::with(['group','company','type']);
        
        if ($searchTerm) {
            $Query = $Query->whereHas('group', function ($query) use ($searchTerm) {
                $query->where('name', 'like', '%'.$searchTerm.'%');
            });
        }

        if ($searchTerm) {
            $Query = $Query->orWhereHas('company', function ($query) use ($searchTerm) {
                $query->where('name', 'like', '%'.$searchTerm.'%');
            });
        }

        if ($searchTerm) {
            $Query = $Query->orWhereHas('type', function ($query) use ($searchTerm) {
                $query->where('name', 'like', '%'.$searchTerm.'%');
            });
        }

        if ($searchTerm) {
            $Query = $Query->orWhere('name', 'like', "%$searchTerm%");
            $Query = $Query->orWhere('description', 'like', "%$searchTerm%");
        }

        $allMedicines     = $Query->latest()->paginate(5);

        return $allMedicines;

    }

    public function addMedicine( Request $request ) {

        try {

            $request->validate([
                'name'          => 'required',
                'description'   => 'required',
                'group'         => 'required',
                'company'       => 'required',
                'type'          => 'required'
            ]);

            Medicine::create([
                'name'          => $request->name,
                'description'   => $request->description,
                'group_id'      => $request->group,
                'type_id'       => $request->type,
                'company_id'    => $request->company
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

    public function editMedicine( $id ) {

        $medicine   = Medicine::where('id',$id)->with('group','type','company')->first();
        $types      = MedicineType::all();
        $companies  = Company::all();
        $groups     = MedicineGroup::all();

        return response()->json([
            'message'   => 'success',
            'types'     => $types,
            'companies' => $companies,
            'groups'    => $groups,
            'medicine'  => $medicine
        ],200);

    }

    public function updateMedicine( Request $request ) {

        try {

            $request->validate([
                'name'          => 'required',
                'description'   => 'required',
                'group'         => 'required',
                'company'       => 'required',
                'type'          => 'required'
            ]);

            Medicine::where('id',$request->id)->update([
                'name'          => $request->name,
                'description'   => $request->description,
                'group_id'      => $request->group,
                'type_id'       => $request->type,
                'company_id'    => $request->company
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

    public function deleteMedicine($id) {

        Medicine::where('id',$id)->delete();
        return response()->json([
            'message'   => 'success',
        ],200);

    }
}
