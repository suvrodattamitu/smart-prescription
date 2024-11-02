<?php

namespace App\Http\Controllers\SmartPrescription;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\Medicine;
use App\Model\MedicineGroup;
use App\Model\MedicineType;
use App\Model\Company;

use Illuminate\Foundation\Validation\ValidationException;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Carbon;

class MedicineController extends Controller
{
    public function downloadMedicine() {
        $url = "https://dgdagov.info/administrator/components/com_jcode/source/serverProcessing.php";

        // Data to send in the POST request
        $data = [
            'action' => 'getDrugCompanyDatabaseData',
        ];

        // $ch = curl_init();
        // curl_setopt($ch, CURLOPT_URL, $url);
        // curl_setopt($ch, CURLOPT_POST, true);
        // curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data)); // Encode data as URL-encoded string
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Return the response as a string

        // $response = curl_exec($ch);

        // Check for errors
        // if (curl_errno($ch)) {
        //     // Error handling
        //     $error_message = curl_error($ch);
        //     curl_close($ch);
        //     return "cURL Error: " . $error_message;
        // }

        // Close cURL
        // curl_close($ch);
        // $data = json_decode($response, true);

        // $medicines = isset($data['aaData']) ? $data['aaData'] : [];

        $medicines = [
            [
                "1",
                "Advanced Chemical Industries Limited",
                "Acical    500",
                "Calcium Carbonate",
                "1250 mg",
                "Tablet",
                "4.01 Tk",
                "Human",
                "005-0297-062"
            ],
            [
                "1",
                "Advanced Chemical Industries Limited",
                "Acical    500",
                "Calcium Carbonate",
                "1250 mg",
                "Tablet",
                "4.01 Tk",
                "Human",
                "005-0297-062"
            ],
            [
                "2",
                "Advanced Chemical Industries Limited",
                "Acicot",
                "Dexamethasone",
                "1 mg/ml",
                "Eye and Ear Drops",
                "65.00 Tk",
                "Human",
                "005-0240-052"
            ]
        ];

        $types = [];
        $duplicateType = [];

        $companies = [];
        $hasCompany = [];

        $groups = [];
        $duplicateGroup = [];

        $formatted_medicines = [];

        $now = date('Y-m-d H:i:s');
        
        //https://fb.watch/vARBGT_AMH/
        foreach($medicines as $medicine) {
            $human = $medicine[7];

            if(!empty($human) && strtolower($human) === 'human') {
                $company = isset($medicine[1]) ? $medicine[1] : '';
                if (!isset($hasCompany[$company])) {
                    array_push($companies, ['name' => $company, 'updated_at' => $now, 'created_at' => $now ]);
                    $hasCompany[$company] = 1;
                }

                $name = isset($medicine[2]) ? $medicine[2] : '';
                $power = isset($medicine[4]) ? $medicine[4] : '';

                $type = isset($medicine[5]) ? $medicine[5] : '';
                if (!isset($duplicateType[$type])) {
                    array_push($types, ['name' => $type, 'updated_at' => $now, 'created_at' => $now ]);
                    $duplicateType[$type] = 1;
                }

                $group = isset($medicine[3]) ? $medicine[3] : '';
                if (!isset($duplicateGroup[$group])) {
                    array_push($groups, ['name' => $group, 'updated_at' => $now, 'created_at' => $now ]);
                    $duplicateGroup[$group] = 1;
                }
            }
        }
        
        //first insert types
        // MedicineType::insert($types); 

        //second insert groups
        // MedicineGroup::insert($groups);

        //third insert companies
        //Company::insert($companies);

        return response()->json([
            'message'   => 'success',
            'types' => $types,
            'groups' => $groups,
            'companies' => $companies,
            'data' => $medicines,
        ],200);
    }

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
