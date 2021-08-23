<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use CH;
use Illuminate\Support\Facades\DB;
use App\Models\apidata;
use DataTables;
class ApiController extends Controller
{
    public function index()
    {
      
        return view('admin.api.index');
    }



       public function getapiData_admin_ajax(Request $request)
    {
 


       $query = DB::table('apidata')->select('id', 'title','description','published_date','api_type')->orderBy('id','desc');
        
         return DataTables::queryBuilder($query)->editColumn('action',function($query) {
                    return  '<a href="' . route('apiDataView', ['id' =>$query->id]) . '" data-color="#e95959"><i class="dw dw-eye"></i></a>';
                })
                ->rawColumns(['link', 'action'])->toJson();


    }




    public function apiDataView($id){

    

     return view('admin.api.view')->with('apiItem',apidata::find($id));

    }

}
