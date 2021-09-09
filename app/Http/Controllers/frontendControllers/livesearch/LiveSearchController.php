<?php
namespace App\Http\Controllers\frontendControllers\livesearch;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class LiveSearchController extends Controller
{




public function index()
{

return view('frontend.livesearch.searchlivetenders');

}



public function historicalSearch()
{
return view('frontend.historicalsearch.historicalsearch');
}



public function Tendor_Search(Request $request)
{


try{

if($request->ajax())
{






if ($request->stype=='live') {



$query = DB::table('apidata');


if (!empty($request->category)) {

$query->where('cpv', 'LIKE', "{$request->category}%");
 
}
if(!empty($request->priceRange)){

$price=explode("-",$request->priceRange);

 $query->whereBetween('min_price', [$price[0],$price[1]]);

}

if(!empty($request->daterange)){

$daterange=explode("_",$request->daterange);

 $query->whereBetween('published_date', [$daterange[0],$daterange[1]]);

}


if(!empty($request->Searchfields)) {


   if (in_array('title',$request->Searchfields)) {
    
   if (!empty($request->searchText)) {
    $query->Where('title', 'LIKE', "%{$request->searchText}%"); 
   }
    
   }

   if (in_array('cpv',$request->Searchfields)) {

   if (!empty($request->searchText)) {
     $query->Where('cpv', 'LIKE', "%{$request->searchText}%");
   }
  

   }

   if (in_array('summary',$request->Searchfields)) {

  if (!empty($request->searchText)) {

    $query->orWhere('description', 'LIKE', "%{$request->searchText}%");

   }

   }

   if (in_array('award',$request->Searchfields)) {

     $query->where('tag',"award");
   }
   

    if (in_array('publisher',$request->Searchfields)) {

     if (!empty($request->searchText)) {
    $query->Where('buyer_name_1', 'LIKE', "%{$request->searchText}%");
    $query->orWhere('buyer_name_2', 'LIKE', "%{$request->searchText}%");

      }
   }

   if (in_array('location',$request->Searchfields)) {


    

     $query->Where('location', 'LIKE', "%{$request->searchText}%");
   
 
   }

   

  }

$apidata=$query->orderBy('published_date', 'desc')->paginate(10);

//return response()->json($request->Searchfields);
return view('include-frontend.horizontal-card', compact('apidata'));




}






}

} catch (\Exception $e) {

    

   return response()->json($e->getMessage());
}
 
}
public function fetch(Request $request){
if($request->get('query'))
{
$query = $request->get('query');
$data = DB::table('apidata')
->where('title', 'LIKE', "%{$query}%")
->get();
$res = array();
$output = '<ul class="dropdown-menu suggesionul" style="display:block;">';




  foreach($data as $row)
  {
  $s =$row->title;
  $ss = explode(" ", $s);
  foreach($ss as $x) {
  if (stripos($x,  $query) > -1 || strpos($x,  $query)) {
  array_push($res, $x);
  }
  }
  
  }
  foreach (array_unique($res) as $key => $value) {
  $output .= '
  <li class="suggesionli"><a href="#">'.$value.'</a></li>
  ';
  }

if (empty(array_unique($res))) {
  $output .=  '<li class="suggesionli"><a href="#">Not Found...!</a></li>';
}
$output .= '</ul>';
echo $output;
}
}
}