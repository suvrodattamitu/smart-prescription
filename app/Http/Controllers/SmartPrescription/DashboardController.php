<?php

namespace App\Http\Controllers\SmartPrescription;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Patient;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function dashboard(){
        $prescribed = Patient::where('is_prescribed', 1)->count();

        $totalPatients = Patient::select("*")->get()->count();


        $prescribed_today = Patient::where('is_prescribed', 1)
           ->where( 'created_at', '>', Carbon::now()->subDays(1))
           ->count();
        

        $patients_today = Patient::where( 'created_at', '>', Carbon::now()->subDays(1))->count();





    
        

        // $patients = Patient::where('is_prescribed', 1)
        //    ->where( 'created_at', '>', Carbon::now()->subDays(7))
        //    ->count();

          // echo "Total prescribed in last seven days ".$patients."</br>";

        //    $patients = Patient::where('is_prescribed', 1)
        //    ->where( 'created_at', '>', Carbon::now()->subDays())
        //    ->count();

          // echo "Total prescribed today ".$patients."</br>";


        //    $to = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', '2015-5-5 3:30:34');
        //    $from = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', $time);
        //    $diff_in_days = $to->diffInDays($from);

        //$DateTime = date("Y-m-d");

        return response()->json([
            'total_prescribed' => $prescribed,
            'total_patients' => $totalPatients,
            'prescribed_today' => $prescribed_today,
            'patients_today' => $patients_today,
        ],200);

    
    }
}
