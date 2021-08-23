<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use DataTables;
class RequestQoutesController extends Controller
{



public function index()
{
return view('admin.request_qoutes.index');
}
public function req_qoutes_admin_ajax(Request $request)
{
$query = DB::table('request_qoutes')->where('is_softdel','no')->get();
return DataTables::of($query)->addColumn('email',function($query) {


if (!empty($query->user_id)) {
  $useremail=DB::table('users')->where('id',$query->user_id)->first();

  return $useremail->email;
}else{

    return 'User Is Deleted';
}

  

})->editColumn('status',function($query) {




})->editColumn('action',function($query) {



if ($query->reply=='no') {
   $rep='<a href="'.route('req_qoutesedit',['id'=>$query->id]).'" class="btn-sm btn-danger  shadow-lg">Not Reply yet</a>';
}else{
    $rep='<a href="'.route('req_qoutesedit',['id'=>$query->id]).'" class="btn-sm btn-success btn-sm shadow-lg"> Replyed by Admin</a>';  
}

return  '<div>
         '.$rep.'
        <a class="btn-sm btn-dark  deleteItem" href="#" del-id="'.$query->id.'"><i class="dw dw-delete-3"></i> Delete</a>

</div>';
})->toJson();
}



// <a class="dropdown-item" href="#"><i class="dw dw-eye"></i> View</a>
public function req_qoutesedit($id)
{
$request_qoutes = DB::table('request_qoutes')->where('id',$id)->first();
return view('admin.request_qoutes.edit')->with('request_qoutes',$request_qoutes);
}


public function updatereq_qoutes(Request $req){

  



$request_qoutes= DB::table('request_qoutes')->where('id',$req->rid)->update($req->except('_token','rid'));


return redirect()->back()->with('message','Request qoutes Updated Successfully');
}





public function del_ajax_req_qoutes(Request $request)
{
$request_qoutes = DB::table('request_qoutes')->where('id',$request->del_id);
$request_qoutes->update(['is_softdel' => 'yes']);
if ($request_qoutes) {
return response()->json(['status' => 'ok', 'id' => $request->del_id]);
} else {
return response()
->json(['status' => 'error']);
}

}



}
