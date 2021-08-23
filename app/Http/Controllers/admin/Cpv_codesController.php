<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cpv_codes;
use DB;
use DataTables;

class Cpv_codesController extends Controller
{
    public function index()
{
return view('admin.cpvcodes.index');
}
public function cpv_codes_admin_ajax(Request $request)
{
$query = DB::table('cpv_codes')->orderBy('id','desc');
return DataTables::queryBuilder($query)->editColumn('action',function($query) {
return  '<div class="dropdown">
    <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
        <i class="dw dw-more"></i>
    </a>
    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
        
        <a class="dropdown-item" href="'.route('cpv_codesedit',['id'=>$query->id]).'"><i class="dw dw-edit2"></i> Edit</a>
        <a class="dropdown-item deleteItem" href="#" del-id="'.$query->id.'"><i class="dw dw-delete-3"></i> Delete</a>
    </div>
</div>';
})->toJson();
}
// <a class="dropdown-item" href="#"><i class="dw dw-eye"></i> View</a>
public function cpv_codesedit($id)
{
$countrymockupedit = Cpv_codes::where('id',$id)->first();
return view('admin.cpvcodes.edit')->with('countrymockup',$countrymockupedit);
}
public function cpv_codesview()
{
return view('admin.cpvcodes.add');
}
public function addcpv_codes(Request $req){
$req->validate([
'name' => ['required', 'string','unique:cpv_codes'],
'code' => ['required','max:255','unique:country_mockups'],
]);
$countrymockupedit = new Cpv_codes;
$countrymockupedit->name = $req->name;
$countrymockupedit->code = $req->code;
$countrymockupedit->save();

return redirect()->route('cpv_codes')->with('message','New cpv code Added Successfully');
}
public function updatecpv_codes(Request $req){
$req->validate([
'name' => ['required', 'string', 'max:255'],
'code' => ['required','max:255'],
]); 

$countrymockupedit = Cpv_codes::findOrFail($req->pid);
$countrymockupedit->name = $req->name;
$countrymockupedit->code = $req->code;
$countrymockupedit->save();
return redirect()->back()->with('message','cpv code Updated Successfully');
}

public function del_ajax_cpv_codes(Request $request)
{

$countrymockupedit = Cpv_codes::find($request->del_id);
$countrymockupedit->delete();
if ($countrymockupedit) {
return response()->json(['status' => 'ok', 'id' => $request->del_id]);
} else {
return response()
->json(['status' => 'error']);
}

}
}
