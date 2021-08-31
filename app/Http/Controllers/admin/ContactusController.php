<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use DataTables; 
use Mail;
use Illuminate\Support\Facades\Crypt;
use CH;
use App\Models\Contacts; 
class ContactusController extends Controller
{
      public function index()
    {
        //unlink(public_path('/img/').'1603980152.jpg');
        return view('admin.contacts.dashboard');
    }

 
   
      public function contact_admin_ajax(Request $request)
    
    {
       
            return datatables()
                ->of(
                    Contacts::where('is_softdel', 'no')
                        ->latest()
                        ->get()
                )->addColumn(
                    'status',
                    function ($data) {
                        if ($data->status == 'on') {
                            $label = '<span class="label label-success">yes</span>';
                        } else {
                            $label = '<span class="label label-danger">No</span>';
                        }

                        return $label;
                    }
                )->setRowClass(function ($data) {
    return 'customvalueofemailget';
})->addColumn(
                    'action',
                    function ($data) {
                        $button = ' <div class="btn-group">
                  <button type="button" class="btn btn-danger btn-sm shadow-lg border-0 dropdown-toggle btn-block shadow-md" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Operations
                  </button>';

                        $button .= '<div class="dropdown-menu">
                   
                
                    <a class="dropdown-item" href="' . route('edit_contact_admin', ['id' => Crypt::encrypt($data->id)]) . '">Edit</a>
                   
                    <button class="dropdown-item deleteAuction btn-danger btn-block"   del-id=' . $data->id . '>Delete</button>
                  </div>
                </div>';
                        return $button;
                    }
                )->rawColumns(['action', 'status'])
                ->make(true);
        
    }


 

     public function add_contact_admin()
    {
        return view('admin.contacts.add');
    }

    public function insert_contact_admin(Request $request)

 
 
    {

          

        $request->validate(
            [
                'email' =>'required','create_datetime' => 'required','status' => 'required','is_agree' => 'required','name' => 'required',
            ]
        );

       
            $insert = Contacts::create(
                [
                    'email' => $request->email,'description' => $request->description, 'create_datetime' => date("Y-m-d H:i:s", strtotime($request->create_datetime)),'status' =>$request->status,'phone' =>$request->phone,'is_agree' =>$request->is_agree,'name' =>$request->name,'subject' =>$request->subject
                ]
            );

            if ($insert) {
                return redirect()->back()
                    ->with('message', $insert->email . 'Add SuccessFully...!');
            }
       
    }

    public function edit_contact_admin($id)
    {
        $contact_id = Crypt::decrypt($id);

        $contact = Contacts::findOrFail($contact_id);


        return view('admin.contacts.edit')->with('conatct', $contact);
    }


    
    public function update_contact_admin(Request $request)
    {
     


        
     

      $request->validate(
            [
               'email' =>'required','create_datetime' => 'required','status' => 'required','is_agree' => 'required','name' => 'required',
            ]
        );

       
        $updateFind = Contacts::find(Crypt::decrypt($request->contact_id));
        $updateFind->update(
            [
                   
                   'email' => $request->email,'description' => $request->description, 'create_datetime' =>date("Y-m-d H:i:s", strtotime($request->create_datetime)),'status' =>$request->status,'phone' =>$request->phone,'is_agree' =>$request->is_agree,'name' =>$request->name,'subject' =>$request->subject
                ]
        );

        if ($updateFind) {
            return redirect()->back()
                ->with('message', $request->email . 'updated SuccessFully...!');
        }


   
    } 

    public function delete_contact_admin_ajax(Request $request)
    {
        $subscriber =Contacts::findOrFail($request->contact_id);
        $subscriber->update(['is_softdel' => 'yes']);
        if ($subscriber) {
            return response()->json(['status' => 'ok', 'id' => $request->sub_id]);
        } else {
            return response()
                ->json(['status' => 'error']);
        }
    }
}
