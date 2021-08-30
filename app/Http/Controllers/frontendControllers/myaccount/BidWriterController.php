<?php

namespace App\Http\Controllers\frontendControllers\myaccount;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Request_Qoutes;
class BidWriterController extends Controller
{
    public function index(){


        return view('frontend.myaccount.index')->with('template','bidwriter');
    }





 public function bidWriterFrontPost(Request $request)
{
   

  
  
  $validatedData = $request->validate([
    'link_to_tendor' => ['required'],
    'tender_worth' => ['required'],
    'tender_colse_data' => ['required'],
    'tender_sector' => ['required'],

]);


   $reqQuotes=Request_Qoutes::create($request->except('_token'));

   if ($reqQuotes) {
    return redirect()->back()->with('message','Bid Writing Quotes Submit Successfully');
   }



}


}
