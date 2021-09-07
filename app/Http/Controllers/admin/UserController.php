<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdminUser;
use App\Models\User;
use CH;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\apidata;
use DataTables;
class UserController extends Controller
{
//
public function index()
{
return view('admin.users.index');
}
public function getUser_admin_ajax(Request $request)
{
$query = DB::table('users')->where('is_softdel','no')->orderBy('id','desc');
return DataTables::queryBuilder($query)->editColumn('action',function($query) {
return  '<div class="dropdown">
    <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
        <i class="dw dw-more"></i>
    </a>
    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
       
        <a class="dropdown-item" href="'.route('userEdit',['id'=>$query->id]).'"><i class="dw dw-edit2"></i> Edit</a>

      <a class="dropdown-item" href="'.route('usersAdminsubscription',['id'=>$query->id]).'"><i class="dw dw-edit2"></i> Subscription</a>

        <a class="dropdown-item deleteItem" href="#" del-id="'.$query->id.'"><i class="dw dw-delete-3"></i> Delete</a>
    </div>
</div>';
})->toJson();
}
 // <a class="dropdown-item" href="#"><i class="dw dw-eye"></i> View</a>





public function subscription($id)
{
$editUser = User::where('id',$id)->first();
return view('admin.users.view')->with('user',$editUser);
}
   

public function userEdit($id)
{
$editUser = User::where('id',$id)->first();
return view('admin.users.edit')->with('user',$editUser);
}
public function updateUser(Request $req){
$req->validate([
'first_name' => ['required', 'string', 'max:255'],
'last_name' => ['required', 'string', 'max:255'],
'company' => ['required', 'string', 'max:255'],
'phone_number' => ['required', 'max:255'],

]);
$addUser = User::findOrFail($req->uid);
$addUser->first_name = $req->first_name;
$addUser->last_name = $req->last_name;
$addUser->company = $req->company;
$addUser->phone_number = $req->phone_number;
$addUser->email = $req->email;
$addUser->password_show=$req->password;

$addUser->industry_sector=$req->password;
$addUser->number_of_employees=$req->password;
$addUser->turnover=$req->turnover;
$addUser->company_post_code=$req->company_post_code;


if (!empty($req->password)) {
$addUser->password = Hash::make($req->password);
}
$addUser->save();

return redirect()->back()->with('message','User Updated Successfully');
}

  

public function del_ajax_user(Request $request)
{
 
    $user = User::find($request->del_id);
        $user->update(['is_softdel' => 'yes']);
        if ($user) {
            return response()->json(['status' => 'ok', 'id' => $request->del_id]);
        } else {
            return response()
                ->json(['status' => 'error']);
        }
 
}


public function apiDataView($id){
return view('admin.api.view')->with('apiItem',apidata::find($id));
}
}




