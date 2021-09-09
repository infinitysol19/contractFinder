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

class ApiOneData implements ShouldQueue
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

    /**
     * Execute the job.
     *
     * @return void
     */


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

    



public function handle()
    {



$irl = Http::get('https://irl.eu-supply.com/ctm/rss/Rss.ashx');
if ($irl->ok() && $irl->serverError()==false && $irl->clientError()==false) {
$xml = simplexml_load_string($irl->body());
$json = json_encode($xml);
$array = json_decode($json,TRUE);



foreach ($array['entry'] as $key => $value) {


 $uniqId='req'.$key.'api1';


  if(array_key_exists('@attributes', $value['content']['publication']['cpvCodes']['cpvCode'])){




$code4=$value['content']['publication']['cpvCodes']['cpvCode'];
  }else{


$code4=$value['content']['publication']['cpvCodes']['cpvCode'][0];

  }


 $apidata=DB::table('apidata')->where('tender_id',$uniqId);

 

 
if($apidata->count()>0){


$apidata->update([

'title'=>$value['title'],
'title_slug'=>$this->slugify($value['title']),
'description'=>$this->isArraycheck($value['content']['publication']['detailedDescription']),
'summary'=>$this->isArraycheck($value['summary']),
'cpvjson'=>json_encode($value['content']['publication']['cpvCodes']['cpvCode']),
'location'=>'Ireland',
'cpv'=>$code4['@attributes']['code'],
'published_date'=>date('Y-m-d H:i:s',strtotime($value['published'])),
'end_date'=>date('Y-m-d H:i:s',strtotime($value['content']['publication']['etq'])),
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



DB::table('apidata')->insert([
'title'=>$value['title'],
'title_slug'=>$this->slugify($value['title']),
'description'=>$this->isArraycheck($value['content']['publication']['detailedDescription']),
'summary'=>$this->isArraycheck($value['summary']),
'cpvjson'=>json_encode($value['content']['publication']['cpvCodes']['cpvCode']),
'cpv'=>$code4['@attributes']['code'],
'location'=>'Ireland',
'published_date'=>date('Y-m-d H:i:s',strtotime($value['published'])),
'end_date'=>date('Y-m-d H:i:s',strtotime($value['content']['publication']['etq'])),
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

}
}
        
    }
}
