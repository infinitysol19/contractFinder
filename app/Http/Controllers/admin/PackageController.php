<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\package;
use DB;
use DataTables;
class PackageController extends Controller
{

public function index()
{


if (package::where('is_softdel','no')->count()>0) {

return view('admin.packages.index');

}else{

   return view('admin.permissions.index')->with('error','Please first add minimumm one permission');
}



}
public function package_admin_ajax(Request $request)
{
$query = DB::table('packages')->where('is_softdel','no')->orderBy('id','desc');
return DataTables::queryBuilder($query)->editColumn('action',function($query) {
return  '<div class="dropdown">
    <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
        <i class="dw dw-more"></i>
    </a>
    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
        
        <a class="dropdown-item" href="'.route('packageedit',['id'=>$query->id]).'"><i class="dw dw-edit2"></i> Edit</a>
        
    </div>
</div>';
})->toJson();
}
// <a class="dropdown-item deleteItem" href="#" del-id="'.$query->id.'"><i class="dw dw-delete-3"></i> Delete</a>
// <a class="dropdown-item" href="#"><i class="dw dw-eye"></i> View</a>
public function packageedit($id)
{
$package = package::where('id',$id)->first();
return view('admin.packages.edit')->with('package',$package);
}
public function addpackageview()
{
return view('admin.packages.add');
}
public function addpackage(Request $req){
$req->validate([
'name' => ['required', 'string', 'max:255','unique:packages'],
'price' => ['required','max:255'],
'trial_days' => ['required','max:255'],
]);
$package = new package;
$package->name = $req->name;
$package->price = $req->price;
$package->trial_days = $req->trial_days;
$package->save();

return redirect()->route('packages')->with('message','New Package Added Successfully');
}
public function updatepackage(Request $req){

  
$req->validate([
'name' => ['required', 'string', 'max:255'],
'price' => ['required','max:255'],
'trial_days' => ['required','max:255'],

]);

$package = package::findOrFail($req->pid);
$package->name = $req->name;
$package->price = $req->price;
$package->trial_days = $req->trial_days;
    
$package->permission_slug=json_encode($req->permissions);
$package->save();
return redirect()->back()->with('message','Package Updated Successfully');
}

public function del_ajax_package(Request $request)
{

$user = package::find($request->del_id);
$user->update(['is_softdel' => 'yes']);
if ($user) {
return response()->json(['status' => 'ok', 'id' => $request->del_id]);
} else {
return response()
->json(['status' => 'error']);
}

}
}