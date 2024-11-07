<?php
namespace App\Http\Controllers\SmartPrescription;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidationException;
use App\Model\Company;

class CompanyController extends Controller
{
    public function allCompanies(Request $reqeust) {
        $searchTerm = $reqeust->get('q');
        $page = $reqeust->get('page');
        $paginate = $reqeust->get('paginate');

        $query = Company::select('*');
        if (!empty($searchTerm)) {
            $query = Company::where('name','like',"%$searchTerm%")->orWhere('description', 'like', "%$searchTerm%");
        }

        $total = $query->count();
        $allCompanies = $query->orderBy('id', 'desc')->offset($paginate * ($page-1))->limit($paginate)->get();
        
        return response()->json([
            'message'   => 'success',
            'companies' => $allCompanies,
            'total' => $total
        ],200);
    }

    public function addCompany(Request $reqeust) {
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
        } catch (ValidationException $exception) {
            return response()->json([
                'message'   => 'error',
                'errors'    => $exception->getMessage()
            ],423);
        }
    }

    public function editCompany($id) {
        $Company = Company::where('id',$id)->first();
        return response()->json([
            'message'   => 'success',
            'company'   => $Company
        ],200);
    }

    public function updateCompany(Request $reqeust) {
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
        } catch (ValidationException $exception) {
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