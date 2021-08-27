<?php

namespace App\Http\Controllers\frontendControllers\myaccount;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
class DashboardController extends Controller
{
    public function index(){


        return view('frontend.myaccount.index')->with('template','dashboard');
    }



     public function userSettings(Request $request)
    {
       
    

      $addUser = User::findOrFail(Auth::user()->id);
      $addUser->setting =json_encode($request->permissions); 
     $addUser->save();

    return redirect()->back()->with('message','Settings Updated Successfully');
    }
}
