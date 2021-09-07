<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use CH;
use Mail;
use DB;
use Auth;
Use App\Models\apidata;
class ApiOne extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'apione:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'apione cron';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
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

 $apidata=DB::table('apidata')->where('tender_id',$uniqId);

 

 
if($apidata->count()>0){


$apidata->update([

'title'=>$value['title'],
'title_slug'=>$this->slugify($value['title']),
'description'=>$this->isArraycheck($value['content']['publication']['detailedDescription']),
'summary'=>$this->isArraycheck($value['summary']),
'cpvjson'=>json_encode($value['content']['publication']['cpvCodes']['cpvCode']),
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
if ($key === array_key_last($array['entry']))
{
echo 'one End';

}
}
}
        $this->info('Hourly Update has been send successfully');
    }
}
