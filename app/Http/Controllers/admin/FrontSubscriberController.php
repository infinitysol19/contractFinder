<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use DataTables; 
use App\Models\Subscriber; 
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;
use CH;
use Mail;
class FrontSubscriberController extends Controller
{
     public function index()
    {
        //unlink(public_path('/img/').'1603980152.jpg');
        return view('admin.subscriber.dashboard');
    }



      public function subscriber_admin_ajax(Request $request)
    {
        
            return datatables()
                ->of(
                    Subscriber::where('is_softdel', 'no')
                        ->latest()
                        ->get()
                )->setRowClass(function ($data) {
    return 'customvalueofemailget';
})->addColumn(
                    'status',
                    function ($data) {
                        if ($data->status == 'on') {
                            $label = '<span class="label label-success">yes</span>';
                        } else {
                            $label = '<span class="label label-danger">No</span>';
                        }

                        return $label;
                    }
                )->addColumn(
                    'action',
                    function ($data) {
                        $button = ' ';

                        $button .= '<div>
                   
                
                    <a class="dropdown-item" href="' . route('edit_subscriber_admin', ['id' => Crypt::encrypt($data->id)]) . '"><i class="dw dw-edit2"></i></a>
                   
                    <button class="dropdown-item deleteAuction btn-danger btn-block"   del-id=' . $data->id . '><i class="dw dw-delete-3"></i></button>
                  </div>
                </div>';
                        return $button;
                    }
                )->rawColumns(['action', 'status'])
                ->make(true);
        
    }


 

     public function add_subscriber_admin()
    {
        return view('admin.subscriber.add');
    }

    public function insert_subscriber_admin(Request $request)

 
 
    {

         

        $request->validate(
            [
                'email' =>'required|email|unique:subscriber','create_datetime' => 'required','status' => 'required',
            ]
        );

       
            $insert = Subscriber::create(
                [
                    'email' => $request->email,'description' => $request->description, 'create_datetime' =>date("Y-m-d H:i:s", strtotime($request->create_datetime)),'status' =>$request->status
                ]
            );

            if ($insert) {
                return redirect()->back()
                    ->with('message', $insert->email . 'Add SuccessFully...!');
            }
       
    }

    public function edit_subscriber_admin($id)
    {
        $sub_id = Crypt::decrypt($id);

        $auction = Subscriber::findOrFail($sub_id);

        return view('admin.subscriber.edit')->with('subscriber', $auction);
    }


    
    public function update_subscriber_admin(Request $request)
    {
     

    $check=Subscriber::where('email',$request->email)->count();
   
     if ($check==0 || $check==1) {
        
     

      $request->validate(
            [
                'email' =>'required','create_datetime' => 'required','status' => 'required',
            ]
        );

       
        $updateFind = Subscriber::find(Crypt::decrypt($request->sub_id));
        $updateFind->update(
            [
                   
                    'email' => $request->email,'description' => $request->description, 'create_datetime' =>date("Y-m-d H:i:s", strtotime($request->create_datetime)) ,'status' =>$request->status
                ]
        );

        if ($updateFind) {
            return redirect()->back()
                ->with('message', $request->email . 'updated SuccessFully...!');
        }


    }else{

    return redirect()->back()
                ->with('error', $request->email . 'Alredy Exist Email must Be unique');
     

    }
    } 

    public function delete_subscriber_admin_ajax(Request $request)
    {
        $subscriber =Subscriber::findOrFail($request->sub_id);
        $subscriber->delete();
        if ($subscriber) {
            return response()->json(['status' => 'ok', 'id' => $request->sub_id]);
        } else {
            return response()
                ->json(['status' => 'error']);
        }
    }



    public function sendmail_subscriber_admin_ajax(Request $request){


     foreach ($request->favorite as $value) {


         $to_name =$request->subject;
          $to_email =$value['email'];
          $data = array("body" =>$request->content,'subject'=>$request->subject,'app_url'=>config('custom_env_Variables.APP_URL'),'logo'=>config('custom_env_Variables.APP_URL').'/admin/vender/images/'.config('custom_env_Variables.SITE_LOGO'));
          
          Mail::send('emails.subscriber', $data, function($message) use ($to_name, $to_email,$request) {
          $message->to($to_email, $to_name) 
            ->subject($request->subject);
          $message->from( config('custom_env_Variables.MAIL_FROM_ADDRESS'),config('custom_env_Variables.MAIL_FROM_NAME'));
           });


       
     }

        return response()
                ->json(['status'=>'ok']); 
     

    }




    public function postSubscribeFront(Request $request)
    {
         $already=Subscriber::where('email', $request->subsemail)->where('status','on')->count();
       

          if ($already>0) {
            return json_encode(['status'=>'exist']);
          }else {

          
         $already2=Subscriber::where('email', $request->subsemail)->where('status','off')->count();

         if ($already2>0) {

           $to_name1 =$request->subsemail;
               $to_email1 =$request->subsemail;


          $data1 = array('subject'=>config('custom_env_Variables.APP_NAME').' Subscriber Verification','app_url'=>config('custom_env_Variables.APP_URL'),'logo'=>config('custom_env_Variables.APP_URL').'/admin/vender/images/'.config('custom_env_Variables.SITE_LOGO'),'suburl'=>config('custom_env_Variables.APP_URL').'/doneSubscription/'.$request->subsemail);
          
          Mail::send('emails.subscriber', $data1, function($message) use ($to_name1, $to_email1) {
          $message->to($to_email1, $to_name1) 
            ->subject(config('custom_env_Variables.APP_NAME').' Subscriber Verification');
          $message->from( config('custom_env_Variables.MAIL_FROM_ADDRESS'),config('custom_env_Variables.MAIL_FROM_NAME'));
           });

          return json_encode(['status'=>'resend']); 
         }else {


            $insert = Subscriber::create(
                [
                    'email' => $request->subsemail,'create_datetime' => $request->create_datetime,'status'=>'off'
                ]
            ); 

                $to_name1 =$request->subsemail;
               $to_email1 =$request->subsemail;


          $data1 = array('subject'=>config('custom_env_Variables.APP_NAME').' Subscriber Verification','app_url'=>config('custom_env_Variables.APP_URL'),'logo'=>config('custom_env_Variables.APP_URL').'/admin/vender/images/'.config('custom_env_Variables.SITE_LOGO'),'suburl'=>config('custom_env_Variables.APP_URL').'/doneSubscription/'.$request->subsemail);
          
          Mail::send('emails.subscriber', $data1, function($message) use ($to_name1, $to_email1) {
          $message->to($to_email1, $to_name1) 
            ->subject(config('custom_env_Variables.APP_NAME').' Subscriber Verification');
          $message->from( config('custom_env_Variables.MAIL_FROM_ADDRESS'),config('custom_env_Variables.MAIL_FROM_NAME'));
           });

              return json_encode(['status'=>'ok']); 
           
         }


          
        
          }
    }




    public function doneSubscription($email){

    if (Subscriber::where('email',$email)->where('status','on')->count()>0) {
     
    }else {
     Subscriber::where('email',$email)->update(['status'=>'on']);
    }


      return view('frontend.subscriptionDone.done')->with('subemail',$email);
    }

}
