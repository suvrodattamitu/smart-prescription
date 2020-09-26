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

       // echo "Total prescribed ".$prescribed."</br>";
        
        $random = Patient::where('id',1)->first();
        $time = Carbon::now();


        $patients = Patient::where('is_prescribed', 1)
           ->where( 'created_at', '>', Carbon::now()->subDays(7))
           ->count();

          // echo "Total prescribed in last seven days ".$patients."</br>";

           $patients = Patient::where('is_prescribed', 1)
           ->where( 'created_at', '>', Carbon::now()->subDays())
           ->count();

          // echo "Total prescribed today ".$patients."</br>";


           $to = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', '2015-5-5 3:30:34');
           $from = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', $time);
           $diff_in_days = $to->diffInDays($from);

        //$DateTime = date("Y-m-d");

        return response()->json([
            'total_prescribed' => $prescribed
        ],200);

    
    }
}
