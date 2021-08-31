<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use\App\Models\News;
use DB;
use Auth;
use DataTables; 
use Mail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;
use CH;
class FrontNewsController extends Controller
{
     public function index()
    {
      
        return view('admin.news.dashboard');
    }

 

      public function getall_news_ajax(Request $request)
    {
        
            return datatables()
                ->of(
                    News::where('is_softdel', 'no')
                        ->latest()
                        ->get()
                )->addColumn(
                    'status',
                    function ($data) {
                        if ($data->status == 'on') {
                            $label = '<span class="label label-success">Active</span>';
                        } else {
                            $label = '<span class="label label-danger">Deactive</span>';
                        }

                        return $label;
                    }
                )->addColumn(
                    'action',
                    function ($data) {
                        $button = ' <div class="btn-group">
                  <button type="button" class="btn btn-danger btn-sm shadow-lg border-0 dropdown-toggle btn-block shadow-md" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Operations
                  </button>';

                        $button .= '<div class="dropdown-menu">
                   
                
                    <a class="dropdown-item" href="' . route('editnews_admin', ['id' => Crypt::encrypt($data->id)]) . '">Edit</a>
                   
                    <button class="dropdown-item deleteAuction btn-danger btn-block"   del-id=' . $data->id . '>Delete</button>
                  </div>
                </div>';
                        return $button;
                    }
                )->rawColumns(['action', 'status'])
                ->make(true);
        
    }




     public function addnew()
    {
        return view('admin.news.add');
    }

    public function insert_news(Request $request)

 
 
    {

          // dd(CH::addUtc($request->end_datetime));

        $request->validate(
            [
                'title' => 'required|max:255', 'slug' => 'required|unique:news', 'post_type' => 'required',
                'description' => 'required', 'create_datetime' => 'required','featured_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
                'status' => 'required',
            ]
        );

        if ($request->hasFile('featured_img')) {
            $image = $request->file('featured_img');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/frontend/images/');
            $image->move($destinationPath, $name);

        

            $insertAuction = News::create(
                [
                    'title' => $request->title, 'slug' => $request->slug, 'post_type' => $request->post_type,
                    'description' => $request->description, 'create_datetime' =>date("Y-m-d H:i:s", strtotime($request->create_datetime)),'status' => $request->status, 'featured_img' => $name,'org_name' =>$request->org_name,'author' =>$request->author,
                ]
            );

            if ($insertAuction) {
                return redirect()->back()
                    ->with('message', $insertAuction->title . 'Add SuccessFully...!');
            }
        }
    }

    public function edit_news($id)
    {
        $news_id = Crypt::decrypt($id);

        $auction = News::findOrFail($news_id);

        return view('admin.news.edit')->with('news', $auction);
    }


    
    public function update_news(Request $request)
    {
 
       
     
        $image_name = $request->hidden_image;
        $image = $request->file('featured_img');
        if ($image != '') {
            $request->validate(
            [
                'title' => 'required|max:255', 'slug' => 'required', 'post_type' => 'required',
                'description' => 'required', 'create_datetime' => 'required','featured_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
                'status' => 'required',
            ]
        );


            $image = $request->file('featured_img');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/frontend/images/');
            $image->move($destinationPath, $image_name);
        } else {
            $request->validate(
                [
                    'title' => 'required|max:255', 'slug' => 'required', 'post_type' => 'required',
                    'description' => 'required', 'create_datetime' => 'required', 'status' => 'required',
                ]
            );
        }

        $updateFind = News::find(Crypt::decrypt($request->news_id));
        $updateFind->update(
            [
                    'title' => $request->title, 'slug' => $request->slug, 'post_type' => $request->post_type,
                    'description' => $request->description, 'create_datetime' =>date("Y-m-d H:i:s", strtotime($request->create_datetime)),'status' => $request->status, 'featured_img' =>$image_name,'org_name' =>$request->org_name,'author' =>$request->author,
                ]
        );

        if ($updateFind) {
            return redirect()->back()
                ->with('message', $request->title . 'updated SuccessFully...!');
        }
    }

    public function delete_news_ajax(Request $request)
    {
        $news = News::findOrFail($request->news_id);
        $news->update(['is_softdel' => 'yes']);
        if ($news) {
            return response()->json(['status' => 'ok', 'id' => $request->news_id]);
        } else {
            return response()
                ->json(['status' => 'error']);
        }
    }





  public  function blog(){



$news=News::where('status','on')->orderBy('create_datetime','desc')->paginate(8);


  
   return view('frontend.blog.index')->with('blogs',$news);

    }




    public function blogsingle($slug){


        $new=News::where('slug',$slug)->first();

          return view('frontend.blog.single')->with('blog',$new);
    }

}
