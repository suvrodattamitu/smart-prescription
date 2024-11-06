<?php

namespace App\Http\Controllers\SmartPrescription;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\Company;
use Illuminate\Foundation\Validation\ValidationException;

class CompanyController extends Controller
{
    public function allCompanies(Request $reqeust) {
        $searchTerm = $reqeust->get('q');
        $perPage = $reqeust->get('per_page');
        $pageSize = $reqeust->get('page_size');

        $query = Company::select('*');
        if (!empty($searchTerm)) {
            $query = Company::where('name','like',"%$searchTerm%")->orWhere('description', 'like', "%$searchTerm%");
        }

        $total = $query->count();
        $allCompanies = $query->offset($perPage * ($pageSize-1))->limit($perPage)->get();
        
        return response()->json([
            'message'   => 'success',
            'perPage' => $perPage,
            'pageSize' => $pageSize,
            'companies' => $allCompanies,
            'total' => $total
        ],200);

        //return $allCompanies;

    }

    public function addCompany( Request $reqeust ) {

        try {

            $reqeust->validate([
                'name'          => 'required',
                'description'   => 'required'
            ]);

            Company::create([
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

    public function editCompany( $id ) {

        $Company = Company::where('id',$id)->first();
        return response()->json([
            'message'   => 'success',
            'company'   => $Company
        ],200);

    }

    public function updateCompany( Request $reqeust ) {

        try {

            $reqeust->validate([
                'name'          => 'required',
                'description'   => 'required'
            ]);

            Company::where('id',$reqeust->id)->update([
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

    public function deleteCompany($id) {

        Company::where('id',$id)->delete();
        return response()->json([
            'message'   => 'success',
        ],200);

    }
}
