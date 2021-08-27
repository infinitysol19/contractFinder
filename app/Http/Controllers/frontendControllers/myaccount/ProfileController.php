<?php

namespace App\Http\Controllers\frontendControllers\myaccount;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
class ProfileController extends Controller
{
    


     public function index(){


        return view('frontend.myaccount.index')->with('template','profile');
    }






public function UpdateUserFront(Request $req){




$req->validate([
'first_name' => ['required', 'string', 'max:255'],
'last_name' => ['required', 'string', 'max:255'],
'phone_number' => ['required', 'max:255'],
'password' => ['required', 'string', 'min:8'],

]);




$addUser = User::findOrFail(Auth::user()->id);
$addUser->first_name = $req->first_name;
$addUser->last_name = $req->last_name;
$addUser->company = $req->company;
$addUser->phone_number = $req->phone_number;
$addUser->password_show=$req->password;
$addUser->industry_sector=$req->industry_sector;
$addUser->number_of_employees=$req->number_of_employees;
$addUser->turnover=$req->turnover;
$addUser->company_post_code=$req->company_post_code;
if (!empty($req->password)) {
$addUser->password = Hash::make($req->password);
}
$addUser->save();

return redirect()->back()->with('message','User Updated Successfully');

    }




    public function UpdateUserProfilePic(Request $request)
    {
       
    

        $org = $request->file('profile_pic');
        if (!empty($org)) {
            $org_image = $request->file('profile_pic');
            $org= time() . uniqid(). '.' .$org_image->getClientOriginalExtension();
            $destinationPath = public_path('/frontend/images/');
            $org_image->move($destinationPath, $org);
        }else {
            
             $org=$request->profile_pic_hidden; 
        }


      $addUser = User::findOrFail(Auth::user()->id);
      $addUser->image =$org; 
     $addUser->save();

    return redirect()->back()->with('message','Profile Picture Updated Successfully');
    }



}
