<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdminUser;
use App\Charts\UserChart;
use Illuminate\Support\Facades\Auth;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;
use Mail; 
class DashboardController extends Controller
{

public function __construct()
{

$this->middleware('guest:admin')->except(['logout','admin_dashboard']);
}
public function index()
{
 
return view('admin.login');
}   

public function admin_dashboard()
{


      $chart_options = [
     'chart_title' => 'Users by Week',
    'report_type' => 'group_by_date',
    'model' => 'App\Models\User',
    'group_by_field' => 'created_at',
    'group_by_period' => 'week',
    'chart_type' => 'bar',
    ];

    $chart1 = new LaravelChart($chart_options);


   $chart_options2 = [
    'chart_title' => 'Api Data by Week', 
    'report_type' => 'group_by_date',
    'model' => 'App\Models\apidata',
    'group_by_field' => 'created_at',
    'group_by_period' => 'week',
    'chart_type' => 'bar',
    ];

    $chart2 = new LaravelChart($chart_options2);



   $chart_options3 = [
    'chart_title' => 'Request Qoutes by Week', 
    'report_type' => 'group_by_date',
    'model' => 'App\Models\Request_Qoutes',
    'group_by_field' => 'created_at',
    'group_by_period' => 'week',
    'chart_type' => 'bar',
    ];

    $chart3 = new LaravelChart($chart_options3);


    


     return view('admin.dashboard',compact('chart1','chart2','chart3'));
}

  
public function store(Request $request) {
// Validate the user
$request->validate([
'email' => 'required|email',
'password' => 'required'
]);
// Log the user In
$credentials = $request->only('email','password');
if (! Auth::guard('admin')->attempt($credentials)) {
return back()->withErrors([
'message' => 'Wrong credentials please try again'
]);
}
// Session message
session()->flash('msg','You have been logged in');
return redirect('/admin/dashboard');
}
public function login(){
return view('admin.login');
}
public function logout() {
auth()->guard('admin')->logout();
session()->flash('msg','You have been logged out');
return redirect('/admin/login');
}
public function sendpassword(Request $request){

$checkisadmin=AdminUser::where('email',$request->email)->count();

if ($checkisadmin) {
$adminData=AdminUser::where('email',$request->email)->first();
$to_name ='Superadmin';
$to_email =$adminData->email;
$data = array('name'=>'Superadmin','password'=>$adminData->password_text,'app_url'=>config('custom_env_Variables.APP_URL'),'logo'=>asset('/img').'/'.config('custom_env_Variables.SITE_LOGO'));

Mail::send('emails.adminPass', $data, function($message) use ($to_name, $to_email,$request) {
$message->to($to_email, $to_name)
->subject('cavalloauction.com Superadmin Password');
$message->from( config('custom_env_Variables.MAIL_FROM_ADDRESS'),config('custom_env_Variables.MAIL_FROM_NAME'));
});
session()->flash('msg','Password Send On Your provided email Address Check Email...!');
return redirect()->back();


}else {
return back()->withErrors([
'message' => 'Sorry email you enterted is not matched with already superadmin email...!'
]);

}


}
}