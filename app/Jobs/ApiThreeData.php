<?php
namespace App\Jobs;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use CH;
use Mail;
use DB;
use Auth;
Use App\Models\apidata;
class ApiThreeData implements ShouldQueue
{
use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
/**
* Create a new job instance.
*
* @return void
*/
public function __construct()
{
//
}
public function isArraycheck($obj){
if (is_array($obj)) {
return json_encode($obj);
}else{
return $obj;
}
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
function unique_code($limit)
{
return substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, $limit);
}
/**
* Execute the job.
*
* @return void
*/
public function handle()
{
$irl = Http::get('https://www.contractsfinder.service.gov.uk/Published/Notices/OCDS/Search?page=1&size=100');
if ($irl->ok() && $irl->serverError()==false && $irl->clientError()==false) {
$xml = $irl->body();
$arrayCount = json_decode($xml,TRUE);
 $lenth=$arrayCount['maxPage']+1;

for ($i = 1; $i < $lenth; $i++){
$ukdataGrab = Http::get('https://www.contractsfinder.service.gov.uk/Published/Notices/OCDS/Search?page='.$i.'&size=100');
$ukdataGrabbody= $ukdataGrab->body();
$array = json_decode($ukdataGrabbody,TRUE);
foreach ($array['results'] as $key => $value) {
$uniqId='req'.$i.$key.'api3';
$apidata=DB::table('apidata')->where('tender_id',$uniqId);
$ENDDATE=(array_key_exists('tenderPeriod',$value['releases'][0]['tender']))? $value['releases'][0]['tender']['tenderPeriod'] :0;
if ($ENDDATE!=0) {
$enddateFinal=(array_key_exists('endDate',$ENDDATE))?$ENDDATE['endDate'] :date('Y-m-d H:i:s');
}else{
$enddateFinal=date('Y-m-d H:i:s');
}
$tags='';
if ($value['releases'][0]['tag'][0]=='award') {
$tags='award';
}elseif($value['releases'][0]['tag'][0]=='tender'){
$tags='active';
}elseif($value['releases'][0]['tag'][0]=='tenderAmendment'){
$tags='active';
}elseif($value['releases'][0]['tag'][0]=='planning'){
$tags='planning';
}elseif($value['releases'][0]['tag'][0]=='awardUpdate'){
$tags='award';
}else{
$tags='cancel';
}
if($apidata->count()>0){
$apidata->update([
'title'=>$value['releases'][0]['tender']['title'],
'description'=>$this->isArraycheck($value['releases'][0]['tender']['description']),
'summary'=>$value['releases'][0]['tender']['title'],
'cpvjson'=>json_encode($value['releases'][0]['tender']['items'][0]['classification']),
'cpv'=>$value['releases'][0]['tender']['items'][0]['classification']['id'],
'location'=>(array_key_exists('buyer',$value['releases'][0]))? $value['releases'][0]['buyer']['address']['countryName']:'',
'published_date'=>date("Y-m-d H:i:s", strtotime($value['publishedDate'])),
'end_date'=>date("Y-m-d H:i:s", strtotime($enddateFinal)) ,
'buyer_location'=>(array_key_exists('buyer',$value['releases'][0]))? $value['releases'][0]['buyer']['address']['countryName']:'',
'buyer_region'=>(array_key_exists('buyer',$value['releases'][0]))? $value['releases'][0]['buyer']['address']['region']:'',
'status'=>$value['releases'][0]['tender']['status'],
'tag'=>$tags,
'buyer_name_1'=>(array_key_exists('buyer',$value['releases'][0]))? $value['releases'][0 ]['buyer']['name'] :'',
'supplier_name'=>(array_key_exists('awards',$value['releases'][0]))? $value['releases'][0]['awards'][0]['suppliers'][0]['name']:'',
'buyer_name_2'=>(array_key_exists('buyer',$value['releases'][0]))? $value['releases'][0]['buyer']['contactPoint']['name'] :'',
'oicd'=>$value['releases'][0]['ocid'],
'tid'=>$value['releases'][0]['id'],
'price'=>(array_key_exists('tender',$value['releases'][0]))? $value['releases'][0]['tender']['value']['amount'] :NULL,
'min_price'=>(array_key_exists('tender',$value['releases'][0]))? $value['releases'][0]['tender']['minValue']['amount'] :NULL,
'currency'=>(array_key_exists('tender',$value['releases'][0]))? $value['releases'][0]['tender']['value']['currency'] :NULL,
'buyer_postal_code'=>(array_key_exists('buyer',$value['releases'][0]))? $value['releases'][0]['buyer']['address']['postalCode']:'',
'api_type'=>3,
'object'=>json_encode($value),
'initiation_time'=>date("Y-m-d H:i:s", strtotime($value['releases'][0]['date'])),
"created_at" =>  \Carbon\Carbon::now(), # new \Datetime()
"updated_at" => \Carbon\Carbon::now(),  # new \Datetime()
]);
}else{
DB::table('apidata')->insert([
'title'=>$value['releases'][0]['tender']['title'],
'description'=>$this->isArraycheck($value['releases'][0]['tender']['description']),
'summary'=>$value['releases'][0]['tender']['title'],
'cpvjson'=>json_encode($value['releases'][0]['tender']['items'][0]['classification']),
'cpv'=>$value['releases'][0]['tender']['items'][0]['classification']['id'],
'location'=>(array_key_exists('buyer',$value['releases'][0]))? $value['releases'][0]['buyer']['address']['countryName']:'',
'published_date'=>date("Y-m-d H:i:s", strtotime($value['publishedDate'])),
'end_date'=>date("Y-m-d H:i:s", strtotime($enddateFinal)),
'buyer_location'=>(array_key_exists('buyer',$value['releases'][0]))? $value['releases'][0]['buyer']['address']['countryName']:'',
'buyer_region'=>(array_key_exists('buyer',$value['releases'][0]))? $value['releases'][0]['buyer']['address']['region']:'',
'status'=>$value['releases'][0]['tender']['status'],
'tag'=>$tags,
'buyer_name_1'=>(array_key_exists('buyer',$value['releases'][0]))? $value['releases'][0]['buyer']['name'] :'',
'supplier_name'=>(array_key_exists('awards',$value['releases'][0]))? $value['releases'][0]['awards'][0]['suppliers'][0]['name']:'',
'buyer_name_2'=>(array_key_exists('buyer',$value['releases'][0]))? $value['releases'][0]['buyer']['contactPoint']['name'] :'',
'oicd'=>$value['releases'][0]['ocid'],
'tid'=>$value['releases'][0]['id'],
'price'=>(array_key_exists('tender',$value['releases'][0]))? $value['releases'][0]['tender']['value']['amount'] :NULL,
'min_price'=>(array_key_exists('tender',$value['releases'][0]))? $value['releases'][0]['tender']['minValue']['amount'] :NULL,
'currency'=>(array_key_exists('tender',$value['releases'][0]))? $value['releases'][0]['tender']['value']['currency'] :NULL,
'buyer_postal_code'=>(array_key_exists('buyer',$value['releases'][0]))? $value['releases'][0]['buyer']['address']['postalCode']:'',
'api_type'=>3,
'object'=>json_encode($value),
'initiation_time'=>date("Y-m-d H:i:s", strtotime($value['releases'][0]['date'])),
'tender_id'=>'req'.$i.$key.'api3',
"created_at" =>  \Carbon\Carbon::now(), # new \Datetime()
"updated_at" => \Carbon\Carbon::now(),  # new \Datetime()
]);
}
}
}
}
}
}