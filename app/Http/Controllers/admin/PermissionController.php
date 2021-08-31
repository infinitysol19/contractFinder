<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\permission;
use DB;
use DataTables;
class PermissionController extends Controller
{
     


public function index()
{
return view('admin.permissions.index');
}

public  function slugify($text, string $divider = '_')
{
// replace non letter or digits by divider
$text = preg_replace('~[^\pL\d]+~u', $divider, $text);
// transliterate
$text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
// remove unwanted characters
$text = preg_replace('~[^-\w]+~', '', $text);
// trim
$text = trim($text, $divider);
// remove duplicate divider
$text = preg_replace('~-+~', $divider, $text);
// lowercase
$text = strtolower($text);
if (empty($text)) {
return 'n-a';
}
return $text;
}

public function permissions_admin_ajax(Request $request)
{
$query = DB::table('permissions')->where('is_softdel','no')->orderBy('id','desc');
return DataTables::queryBuilder($query)->editColumn('action',function($query) {
return  '<div class="dropdown">
    <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
        <i class="dw dw-more"></i>
    </a>
    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
        
        <a class="dropdown-item" href="'.route('permissionsedit',['id'=>$query->id]).'"><i class="dw dw-edit2"></i> Edit</a>
       
    </div>
</div>';
})->toJson();
}
 // <a class="dropdown-item deleteItem" href="#" del-id="'.$query->id.'"><i class="dw dw-delete-3"></i> Delete</a>
// <a class="dropdown-item" href="#"><i class="dw dw-eye"></i> View</a>
public function permissionsedit($id)
{
$permission = permission::where('id',$id)->first();
return view('admin.permissions.edit')->with('permission',$permission);
}
public function addpermissionsview()
{
return view('admin.permissions.add');
}
public function addpermissions(Request $req){
$req->validate([
'name' => ['required', 'string', 'max:255','unique:permissions'],

]);
$permission = new permission;
$permission->name = $req->name;
$permission->slug = $this->slugify($req->name);


$permission->save(); 

return redirect()->route('permissions')->with('message','New permission Added Successfully');
}
public function updatepermissions(Request $req){
$req->validate([
'name' => ['required', 'string', 'max:255'],

]);

$permission = permission::findOrFail($req->pid);
$permission->name = $req->name;
$permission->slug = $this->slugify($req->name);
$permission->save();
return redirect()->back()->with('message','permission Updated Successfully');
}
 
public function del_ajax_permissions(Request $request)
{

$permission = permission::find($request->del_id);
$permission->update(['is_softdel' => 'yes']);
if ($permission) {
return response()->json(['status' => 'ok', 'id' => $request->del_id]);
} else {
return response()
->json(['status' => 'error']);
}

}

     
}
