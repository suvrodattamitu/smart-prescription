<?php

namespace App\Http\Controllers\SmartPrescription;

use App\Http\Controllers\Controller;
use App\Model\UserDetail;
use App\User;
use Auth;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function getProfile()
    {
        $profile = Auth::user()->with('details')->get();
        return response()->json([
            'profile' => $profile,
        ]);
    }

    public function updateProfile(Request $request)
    {

        //process image here
        $image_name_to_store = '';

        $image = $request->file('image');
        if ($image) {
            //full image name with extension
            $image_name_with_ext = $image->getClientOriginalName();

            //image name without extension
            $image_name_without_ext = pathinfo($image_name_with_ext, PATHINFO_FILENAME);

            //get extension of that image
            $image_ext = $image->getClientOriginalExtension();

            //image name with encription
            $image_name_to_store = $image_name_without_ext . '_' . time() . '_.' . $image_ext;

            //public folder
            $path = public_path('/images/profile');
            $image->move($path, $image_name_to_store);
        }

        $userId = Auth::user()->id;

        $data = [

            'user_id' => $userId,
            'phone' => $request->phone,
            'address' => $request->address,
            'bio' => $request->bio,
            'designation' => $request->designation,
            'gender' => $request->gender,
            'website_url' => $request->website_url,
            'education' => $request->education,

        ];

        User::where('id', $userId)->update(['name' => $request->name]);

        $exists = UserDetail::where('id', $userId)->first();

        if ($exists && !$image_name_to_store) {
            $image_name_to_store = $exists->image;
        }

        $data['image'] = $image_name_to_store;

        if (!$exists) {
            UserDetail::create($data);
        } else {
            UserDetail::where('id', $userId)->update($data);
        }

        return response()->json([
            'message' => 'Updated successfully!',
        ], 200);

    }

}
