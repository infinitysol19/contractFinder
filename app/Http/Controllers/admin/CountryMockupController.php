<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CountryMockups;
use DB;
use DataTables;
class CountryMockupController extends Controller{


public function index()
{
return view('admin.countrymockup.index');
}
public function countrymockup_admin_ajax(Request $request)
{
$query = DB::table('country_mockups')->orderBy('id','desc');
return DataTables::queryBuilder($query)->editColumn('action',function($query) {
return  '<div class="dropdown">
    <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
        <i class="dw dw-more"></i>
    </a>
    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
        
        <a class="dropdown-item" href="'.route('countrymockupedit',['id'=>$query->id]).'"><i class="dw dw-edit2"></i> Edit</a>
        <a class="dropdown-item deleteItem" href="#" del-id="'.$query->id.'"><i class="dw dw-delete-3"></i> Delete</a>
    </div>
</div>';
})->toJson();
}
// <a class="dropdown-item" href="#"><i class="dw dw-eye"></i> View</a>
public function countrymockupedit($id)
{
$countrymockupedit = CountryMockups::where('id',$id)->first();
return view('admin.countrymockup.edit')->with('countrymockup',$countrymockupedit);
}
public function addcountrymockupview()
{
return view('admin.countrymockup.add');
}
public function addcountrymockup(Request $req){
$req->validate([
'name' => ['required', 'string', 'max:255','unique:country_mockups'],
'code' => ['required','max:255','unique:country_mockups'],
]);
$countrymockupedit = new CountryMockups;
$countrymockupedit->name = $req->name;
$countrymockupedit->code = $req->code;
$countrymockupedit->save();

return redirect()->route('countrymockup')->with('message','New countrymockup Added Successfully');
}
public function updatecountrymockup(Request $req){
$req->validate([
'name' => ['required', 'string', 'max:255'],
'code' => ['required','max:255'],
]); 

$countrymockupedit = CountryMockups::findOrFail($req->pid);
$countrymockupedit->name = $req->name;
$countrymockupedit->code = $req->code;
$countrymockupedit->save();
return redirect()->back()->with('message','countrymockup Updated Successfully');
}

public function del_ajax_countrymockup(Request $request)
{

$countrymockupedit = CountryMockups::find($request->del_id);
$countrymockupedit->delete();
if ($countrymockupedit) {
return response()->json(['status' => 'ok', 'id' => $request->del_id]);
} else {
return response()
->json(['status' => 'error']);
}

}
}
