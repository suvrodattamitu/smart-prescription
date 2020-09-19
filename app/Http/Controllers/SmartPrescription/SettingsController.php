<?php

namespace App\Http\Controllers\SmartPrescription;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Foundation\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use Auth;

class SettingsController extends Controller
{
    public function changePassword(Request $request){
        try {
            
             $request->validate([
                'current_password' => 'required',
                'new_password' => 'required',
                'confirm_password' => 'required',
                ]);
                
                $pass = Hash::make($request->current_password);

                if ($request->new_password != $request->confirm_password) {
                    $error = \Illuminate\Validation\ValidationException::withMessages([
                        'match_password' => ['Your new password and confirm password does not match. Please try again.'],
                    ]);
                    throw $error;
                }

                if (!Hash::check($request->current_password, Auth::user()->password)) {
                    $error = \Illuminate\Validation\ValidationException::withMessages([
                        'match_password' => ['Your current password does not matches with the password you provided. Please try again.'],
                    ]);
                    throw $error;
                }

                
                //Change Password
                $user = Auth::user();
               
                $user->password = Hash::make($request->new_password);
                $user->save();
                

        }catch (ValidationException $exception) {
            
            return response()->json([
                'message'   => 'error',
                'errors'    => $exception->getMessage()
            ],423);
            
        }
    }

    public function add(){
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required',
            'confirm_password' => 'required',
            ]);
            $pass = Hash::make($request->current_password);

        if ($pass != Auth::user()->passwo­rd) {
            // The passwords matches errors.type[0]
            return response()->json([
                'message'   => 'error',
                'error'     =>  'Your current password does not matches with the password you provided. Please try again.'
            ],423);   
           }

            if(strcmp($request->­current_password == $request->new_password)){
            //Current password and new password are same
            return response()->json([
                'message'   => 'error',
                'error'    =>  'New Password cannot be same as your current password. Please choose a different password.'
            ],423);    
           }
            
            
            //Change Password
            $user = Auth::user();
           
            $user->password = Hash::make($request->new_password);
            $user->save();
    }
}
