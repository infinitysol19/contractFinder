<?php
namespace App\Http\Controllers\frontendControllers\home;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use CH;
use Illuminate\Support\Facades\DB;
Use App\Models\apidata;
class HomeController extends Controller
{
//
public function index()
{
return view('frontend.home.index');
}


public function pricing()
{
return view('frontend.pricing.pricing');
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
public function ApiOne(){
$irl = Http::get('https://irl.eu-supply.com/ctm/rss/Rss.ashx');
if ($irl->ok() && $irl->serverError()==false && $irl->clientError()==false) {
$xml = simplexml_load_string($irl->body());
$json = json_encode($xml);
$array = json_decode($json,TRUE);
foreach ($array['entry'] as $key => $value) {
$apidata=DB::table('apidata')->where('tender_id','req'.$key.'api1');
 
if($apidata->count()>0){

echo "update1";
$apidata->update([
'title'=>$value['title'],
'title_slug'=>$this->slugify($value['title']),
'description'=>$this->isArraycheck($value['content']['publication']['detailedDescription']),
'summary'=>$this->isArraycheck($value['summary']),
'cpvjson'=>json_encode($value['content']['publication']['cpvCodes']['cpvCode']),
'location'=>'Ireland',
'published_date'=>date('Y-m-d H:i:s',strtotime($value['published'])),
'buyer_location'=>'Ireland',
'buyer_region'=>'Ireland',
'status'=>$value['content']['publication']['processTemplate'],
'tag'=>$value['content']['publication']['processTemplate'],
'buyer_name_1'=>$value['content']['publication']['authority']['@attributes']['name'],
'buyer_name_2'=>$value['content']['publication']['contactPerson']['@attributes']['firstName'].' '.$value['content']['publication']['contactPerson']['@attributes']['lastName'],
'api_type'=>1,
'object'=>json_encode($value),
'initiation_time'=>$value['content']['publication']['publishedTime'],
"created_at" =>  \Carbon\Carbon::now(), # new \Datetime()
"updated_at" => \Carbon\Carbon::now(),  # new \Datetime()

]);



}else{

  echo "insert 1";

DB::table('apidata')->insert([
'title'=>$value['title'],
'title_slug'=>$this->slugify($value['title']),
'description'=>$this->isArraycheck($value['content']['publication']['detailedDescription']),
'summary'=>$this->isArraycheck($value['summary']),
'cpvjson'=>json_encode($value['content']['publication']['cpvCodes']['cpvCode']),
'location'=>'Ireland',
'published_date'=>date('Y-m-d H:i:s',strtotime($value['published'])),
'buyer_location'=>'Ireland',
'buyer_region'=>'Ireland',
'status'=>$value['content']['publication']['processTemplate'],
'tag'=>$value['content']['publication']['processTemplate'],
'buyer_name_1'=>$value['content']['publication']['authority']['@attributes']['name'],
'buyer_name_2'=>$value['content']['publication']['contactPerson']['@attributes']['firstName'].' '.$value['content']['publication']['contactPerson']['@attributes']['lastName'],
'api_type'=>1,
'object'=>json_encode($value),
'initiation_time'=>$value['content']['publication']['publishedTime'],
'tender_id'=>'req'.$key.'api1',
"created_at" =>  \Carbon\Carbon::now(), # new \Datetime()
"updated_at" => \Carbon\Carbon::now(),  # new \Datetime()
]);
}
if ($key === array_key_last($array['entry']))
{
echo 'one End';

}
}
}
}
public function ApiTwo(){
$strJsonFileContents = file_get_contents("https://ec.europa.eu/info/funding-tenders/opportunities/data/referenceData/grantsTenders.json");
// Convert to array
$array = json_decode($strJsonFileContents, true);
foreach ($array['fundingData']['GrantTenderObj'] as $key => $value) {

$apidata=DB::table('apidata')->where('tender_id','req'.$key.'api2');

if (array_key_exists("type",$value)) {
if ($value['type']==0) {
if($apidata->count()>0){

 echo "api2 update"; 
$apidata->update([
'title'=>$value['title'],
'title_slug'=>$this->slugify($value['title']),
'description'=>$value['descriptionTender'],
'summary'=>$value['identifier'],
'cpv'=>(array_key_exists("mainCpv",$value)) ? $value['mainCpv']['mainCode']:'',
'cpvjson'=>json_encode($value['additionalCpvs']),
'published_date'=>date('Y-m-d H:i:s', substr($value['publicationDateLong'], 0, 10)),
'location2'=>json_encode($value['placesOfDeliveryOrPerformance']),
'status'=>$value['procedureType'],
'tag'=>$value['status']['abbreviation'],
'buyer_name_1'=>$value['contractingAuthority'],
'buyer_name_2'=>$value['contractingAuthority'],
'api_type'=>2,
'object'=>json_encode($value),
'initiation_time'=>date('Y-m-d H:i:s', substr($value['publicationDateLong'], 0, 10)),
"created_at" =>  \Carbon\Carbon::now(), # new \Datetime()
"updated_at" => \Carbon\Carbon::now(),  # new \Datetime()
]);
}else{

   echo "api2 insert"; 

DB::table('apidata')->insert([
'title'=>$value['title'],
'title_slug'=>$this->slugify($value['title']),
'description'=>$value['descriptionTender'],
'summary'=>$value['identifier'],
'cpv'=>(array_key_exists("mainCpv",$value)) ? $value['mainCpv']['mainCode']:'',
'cpvjson'=>json_encode($value['additionalCpvs']),
'published_date'=>date('Y-m-d H:i:s', substr($value['publicationDateLong'], 0, 10)),
'location2'=>json_encode($value['placesOfDeliveryOrPerformance']),
'status'=>$value['procedureType'],
'tag'=>$value['status']['abbreviation'],
'buyer_name_1'=>$value['contractingAuthority'],
'buyer_name_2'=>$value['contractingAuthority'],
'api_type'=>2,
'object'=>json_encode($value),
'tender_id'=>'req'.$key.'api2', 
'initiation_time'=>date('Y-m-d H:i:s', substr($value['publicationDateLong'], 0, 10)),
"created_at" =>  \Carbon\Carbon::now(), # new \Datetime()
"updated_at" => \Carbon\Carbon::now(),  # new \Datetime()
]);
}
}
}
if ($key === array_key_last($array['fundingData']['GrantTenderObj']))
{
echo 'Two End';
// Api three
 
}
}
}


public function ApiThree(){


$irl = Http::get('https://www.contractsfinder.service.gov.uk/Published/Notices/OCDS/Search?page=1&size=100');
if ($irl->ok() && $irl->serverError()==false && $irl->clientError()==false) {
$xml = $irl->body();


$arrayCount = json_decode($xml,TRUE);

$lenth=$arrayCount['maxPage']+1;

  //$lenth=21; 

for ($i = 1; $i < $lenth; $i++){

// echo "<pre>";
// print_r('https://www.contractsfinder.service.gov.uk/Published/Notices/OCDS/Search?page='.$i.'&size=100');
// echo "</pre>";


$ukdataGrab = Http::get('https://www.contractsfinder.service.gov.uk/Published/Notices/OCDS/Search?page='.$i.'&size=100');
$ukdataGrabbody= $irl->body();
$array = json_decode($ukdataGrabbody,TRUE);



foreach ($array['results'] as $key => $value) {

$apidata=DB::table('apidata')->where('tender_id','req'.$i.$key.'api3');
 
if($apidata->count()>0){
  echo "api3 Update"; 
$apidata->update([

'title'=>$value['releases'][0]['tender']['title'],
'description'=>$this->isArraycheck($value['releases'][0]['tender']['description']),
'summary'=>$value['releases'][0]['tender']['title'],
'cpvjson'=>json_encode($value['releases'][0]['tender']['items'][0]['classification']),
'cpv'=>$value['releases'][0]['tender']['items'][0]['classification']['id'],
'location'=>(array_key_exists('buyer',$value['releases'][0]))? $value['releases'][0]['buyer']['address']['countryName']:'',
'published_date'=>date("Y-m-d H:i:s", strtotime($value['publishedDate'])),
'buyer_location'=>(array_key_exists('buyer',$value['releases'][0]))? $value['releases'][0]['buyer']['address']['countryName']:'',
'buyer_region'=>(array_key_exists('buyer',$value['releases'][0]))? $value['releases'][0]['buyer']['address']['region']:'',
'status'=>$value['releases'][0]['tender']['status'],
'tag'=>$value['releases'][0]['tag'][0],
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
"created_at" =>  \Carbon\Carbon::now(), # new \Datetime()
"updated_at" => \Carbon\Carbon::now(),  # new \Datetime()

]);



}else{

  echo "api3 insert";
DB::table('apidata')->insert([

'title'=>$value['releases'][0]['tender']['title'],
'description'=>$this->isArraycheck($value['releases'][0]['tender']['description']),
'summary'=>$value['releases'][0]['tender']['title'],
'cpvjson'=>json_encode($value['releases'][0]['tender']['items'][0]['classification']),
'cpv'=>$value['releases'][0]['tender']['items'][0]['classification']['id'],
'location'=>(array_key_exists('buyer',$value['releases'][0]))? $value['releases'][0]['buyer']['address']['countryName']:'',
'published_date'=>date("Y-m-d H:i:s", strtotime($value['publishedDate'])),
'buyer_location'=>(array_key_exists('buyer',$value['releases'][0]))? $value['releases'][0]['buyer']['address']['countryName']:'',
'buyer_region'=>(array_key_exists('buyer',$value['releases'][0]))? $value['releases'][0]['buyer']['address']['region']:'',
'status'=>$value['releases'][0]['tender']['status'],
'tag'=>$value['releases'][0]['tag'][0],
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

if ($key === array_key_last($array['results']))
{
echo $i.'three End'.$lenth;
}
}

if($i==$lenth-1){
  
  return 'ApiThree Done';

}








}
}
}
 
public function apiTest(){
// Api One
$this->ApiThree(); 
}
}