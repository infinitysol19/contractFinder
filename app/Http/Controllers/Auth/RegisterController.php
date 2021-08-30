<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\usersubscription;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use URL;
use Auth;
use Session;
use Redirect;
use Input;
use Stripe;
 
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }







    public function customize_register(Request $request){


     if ($request->package_id==1) {
         $validator = Validator::make($request->all(),[
            
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone_number'=>['required'],
            
        ]);

     }else{


       $validator = Validator::make($request->all(),[
            // 'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone_number'=>['required'],
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



    
    $addUser = new User;
    $addUser->first_name = $request->first_name;
    $addUser->last_name = $request->last_name;
    $addUser->company = $request->company;
    $addUser->phone_number = $request->phone_number;
    $addUser->email = $request->email;
    $addUser->password = Hash::make($request->password);
    $addUser->password_show=$request->password;
    $addUser->industry_sector=$request->industry_sector;
    $addUser->number_of_employees=$request->number_of_employees;
    $addUser->turnover=$request->turnover;
    $addUser->company_post_code=$request->company_post_code;
    $addUser->save();
   


   if ($addUser->id) {

    $usersubscriptionCount = usersubscription::where('user_id',$addUser->id);
    if ($usersubscriptionCount->count()>0) {


      $usersubscriptionCount->package_id=$request->package_id;
      $usersubscriptionCount->package_start_date=gmdate("Y-m-d H:i:s");
      $usersubscriptionCount->package_end_date=date('Y-m-d H:i:s',strtotime(date('Y-m-d H:i:s',strtotime(gmdate("Y-m-d H:i:s")))."100 year"));
      $usersubscriptionCount->save();  
       


    }else{


      $usersubscription = new usersubscription;
      $usersubscription->user_id=$addUser->id;
      $usersubscription->package_id=$request->package_id;
      $usersubscription->package_start_date=gmdate("Y-m-d H:i:s");
      $usersubscription->package_end_date=date('Y-m-d H:i:s',strtotime(date('Y-m-d H:i:s',strtotime(gmdate("Y-m-d H:i:s")))."100 year"));
      $usersubscription->save();
    


    }  

   }
    
   $credentials = array(
    'email' =>$request->email,
    'password' =>$request->password
);

if (Auth::attempt($credentials)) {
  return response()->json(['status'=>'success','success'=>"Subscription Done SuccessFully...!",'redirect'=>'/dashboard']);  
}else{
return response()->json(['status'=>'success','success'=>"Subscription Done SuccessFully...!",'redirect'=>'/dashboard']); 

}

   




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

   
    $addUser = new User;
    $addUser->first_name = $request->first_name;
    $addUser->last_name = $request->last_name;
    $addUser->company = $request->company;
    $addUser->phone_number = $request->phone_number;
    $addUser->email = $request->email;
    $addUser->password = Hash::make($request->password);
    $addUser->password_show=$request->password;
    $addUser->industry_sector=$request->industry_sector;
    $addUser->number_of_employees=$request->number_of_employees;
    $addUser->turnover=$request->turnover;
    $addUser->company_post_code=$request->company_post_code;
    $addUser->save();
   


   if ($addUser->id) {
    
    $usersubscriptionCount = usersubscription::where('user_id',$addUser->id);
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
      $usersubscription->user_id=$addUser->id;
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

   }
    
   $credentials = array(
    'email' =>$request->email,
    'password' =>$request->password
);

if (Auth::attempt($credentials)) {
  return response()->json(['status'=>'success','success'=>"Subscription Done SuccessFully...!",'redirect'=>'/dashboard']);  
}else{
return response()->json(['status'=>'success','success'=>"Subscription Done SuccessFully...!",'redirect'=>'/dashboard']); 

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










 }


        


    }
}
