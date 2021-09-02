<?php
namespace App\Http\Controllers\frontendControllers\livesearch;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class LiveSearchController extends Controller
{
//
public function index()
{
$apidata = DB::table('apidata')->orderBy('published_date', 'desc')->paginate(10);
return view('frontend.livesearch.searchlivetenders', compact('apidata'));

}
public function historicalSearch()
{
// return "hello from live search controller";
return view('frontend.historicalsearch.historicalsearch');
}
public function Tendor_Search(Request $request)
{
if($request->ajax())
{

$apidata = DB::table('apidata')->orderBy('published_date', 'desc')->paginate(10);
//return response()->json($apidata);
return view('include-frontend.horizontal-card', compact('apidata'));

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