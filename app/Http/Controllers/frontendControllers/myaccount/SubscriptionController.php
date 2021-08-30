<?php

namespace App\Http\Controllers\frontendControllers\myaccount;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\usersubscription;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use URL;
use Auth;
use Session;
use Redirect;
use Input;
use Stripe;

class SubscriptionController extends Controller
{
     public function index(){


        return view('frontend.myaccount.index')->with('template','mangeuser');
    }





    



public function changesubscription(Request $request)
{


     if ($request->package_id==1) {
        

     }else{


       $validator = Validator::make($request->all(),[
           
            'card_number' => ['required'],
            'card_cvc' => ['required'],
            'card_expiry_month' => ['required'],
            'card_expiry_year' => ['required'],
        ]); 





     }
         
        
 if ($validator->fails())
{
     return response()->json(['status'=>'fail','errors'=>$validator->errors()->all()]);
 }
        




if ($request->package_id==1) {





    $usersubscriptionCount = usersubscription::where('user_id',Auth::user()->id)->first();
    if ($usersubscriptionCount->count()>0) {


      $usersubscriptionCount->package_id=$request->package_id;
      $usersubscriptionCount->package_start_date=gmdate("Y-m-d H:i:s");
      $usersubscriptionCount->package_end_date=date('Y-m-d H:i:s',strtotime(date('Y-m-d H:i:s',strtotime(gmdate("Y-m-d H:i:s")))."100 year"));
      $usersubscriptionCount->save();  
       


    }else{


      $usersubscription = new usersubscription;
      $usersubscription->user_id=Auth::user()->id;
      $usersubscription->package_id=$request->package_id;
      $usersubscription->package_start_date=gmdate("Y-m-d H:i:s");
      $usersubscription->package_end_date=date('Y-m-d H:i:s',strtotime(date('Y-m-d H:i:s',strtotime(gmdate("Y-m-d H:i:s")))."100 year"));
      $usersubscription->save();
    


    }  

return response()->json(['status'=>'success','success'=>"Subscription Done SuccessFully...!",'redirect'=>'/dashboard']); 
}else{

 $stripe = Stripe::setApiKey(config('custom_env_Variables.STRIPE_SECRET'));


try {


 $token = $stripe->tokens()->create([
 'card' => [
 'number' => $request->card_number,
 'exp_month' => $request->card_expiry_month,
 'exp_year' => $request->card_expiry_year,
 'cvc' => $request->card_cvc,
 ],
 ]);
if (!isset($token['id'])) {


 return response()->json(['status'=>'fail','error'=>"Please Enter The Correct Details Of Your Account."]);
 }


 $charge = $stripe->charges()->create([
 'card' => $token['id'],
 'currency' => 'USD',
 'amount' =>$request->package_price,
 'description' => 'Payment from contractfinderpro.infinitysol.co',
 ]);


  
 if($charge['status'] == 'succeeded') {

   
   
   


  
    
    $usersubscriptionCount = usersubscription::where('user_id',Auth::user()->id)->first();
    if ($usersubscriptionCount->count()>0) {

      $usersubscriptionCount->package_id=$request->package_id;
      $usersubscriptionCount->package_start_date=gmdate("Y-m-d H:i:s");
      $usersubscriptionCount->package_end_date=date('Y-m-d H:i:s',strtotime(date('Y-m-d H:i:s',strtotime(gmdate("Y-m-d H:i:s")))."1 month"));


    $usersubscriptionCount->card_number=$request->card_number;

    $usersubscriptionCount->card_cvc=$request->card_cvc;

    $usersubscriptionCount->card_expiry_month=$request->card_expiry_month;

    $usersubscriptionCount->card_expiry_year=$request->card_expiry_year;

    $usersubscriptionCount->charg_id=$charge['id'];

      $usersubscriptionCount->save();  
       
    }else{
      $usersubscription = new usersubscription;
      $usersubscription->user_id=Auth::user()->id;
      $usersubscription->package_id=$request->package_id;
      $usersubscription->package_start_date=gmdate("Y-m-d H:i:s");
      $usersubscription->package_end_date=date('Y-m-d H:i:s',strtotime(date('Y-m-d H:i:s',strtotime(gmdate("Y-m-d H:i:s")))."1 month"));

    $usersubscription->card_number=$request->card_number;

    $usersubscription->card_cvc=$request->card_cvc;

    $usersubscription->card_expiry_month=$request->card_expiry_month;

    $usersubscription->card_expiry_year=$request->card_expiry_year;

    $usersubscription->charg_id=$charge['id'];

      $usersubscription->save();
    
    }  

   
    
 


 } else {
return response()->json(['status'=>'fail','error'=>"Payment Not Done.Please Enter The Correct Details Of Your Account."]);
 }
 










 } catch (Exception $e) {
          

            return response()->json(['status'=>'fail','error'=>$e->getMessage()]);

           
        } catch(\Cartalyst\Stripe\Exception\CardErrorException $e) {

            return response()->json(['status'=>'fail','error'=>$e->getMessage()]);

           
        } catch(\Cartalyst\Stripe\Exception\MissingParameterException $e) {
            

            return response()->json(['status'=>'fail','error'=>$e->getMessage()]);
        }








return response()->json(['status'=>'success','success'=>"Subscription Done SuccessFully...!",'redirect'=>'/dashboard']); 

 }


        


    }



}
