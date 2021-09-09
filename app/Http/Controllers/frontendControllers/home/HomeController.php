<?php
namespace App\Http\Controllers\frontendControllers\home;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use CH;
use Mail;
use DB;
use Auth;
use DataTables; 
use Illuminate\Support\Facades\Crypt;
use App\Models\Contacts; 
Use App\Models\apidata;
use App\Jobs\ApiOneData;
use App\Jobs\ApiTwoData;
use App\Jobs\ApiThreeData;
class HomeController extends Controller
{
//
public function index()
{

$homeapidata = DB::table('apidata')->where('tag','active')->where('api_type','3')->orderBy('published_date', 'desc')->limit(3)->get();
 
 return view('frontend.home.index',compact('homeapidata'));
}


public function pricing()
{
return view('frontend.pricing.pricing');
}



public function contact()
{
return view('frontend.contact.contact');
}

public function privacy()
{
return view('frontend.privacy.privacy');
}




 public function postContactFront(Request $request){

        
 
          
     
        
        
           $request->validate(
            [
                'email' =>'required','create_datetime' => 'required','is_agree' => 'required','name' => 'required' ,'subject' => 'required',
            ]
        );

           
            $insert = Contacts::create(
                [
                    'email' => $request->email,'description' => $request->description, 'create_datetime' =>date("Y-m-d H:i:s", strtotime($request->create_datetime)),'status' =>'off','phone' =>$request->phone,'is_agree' =>$request->is_agree,'name' =>$request->name,'subject' =>$request->subject
                ]
            );

            if ($insert) {
   
          // $to_name =config('custom_env_Variables.MAIL_FROM_NAME');
          // $to_email =config('custom_env_Variables.MAIL_TO_CONTACT');
          // $data = array('name'=>$request->name, "email" =>$request->email,"body" =>$request->description, "phone" =>$request->phone,'subject'=>$request->subject,'app_url'=>config('custom_env_Variables.APP_URL'),'logo'=>asset('img').'/'.config('custom_env_Variables.SITE_LOGO'));
          
          // Mail::send('emails.contact', $data, function($message) use ($to_name, $to_email,$request) {
          // $message->to($to_email, $to_name) 
          //   ->subject($request->subject);
          // $message->from( config('custom_env_Variables.MAIL_FROM_ADDRESS'),config('custom_env_Variables.MAIL_FROM_NAME'));
          //  });



                return redirect()->back()
                    ->with('message', 'Email Send SuccessFully...!');
            }

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


 $uniqId='req'.$key.'api1';

 $apidata=DB::table('apidata')->where('tender_id',$uniqId);

 
  if(array_key_exists('@attributes', $value['content']['publication']['cpvCodes']['cpvCode'])){




$code4=$value['content']['publication']['cpvCodes']['cpvCode'];
  }else{


$code4=$value['content']['publication']['cpvCodes']['cpvCode'][0];

  }


 
if($apidata->count()>0){


$apidata->update([

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
"created_at" =>  \Carbon\Carbon::now(), # new \Datetime()
"updated_at" => \Carbon\Carbon::now(),  # new \Datetime()

]);



}else{



DB::table('apidata')->insert([
'title'=>$value['title'],
'title_slug'=>$this->slugify($value['title']),
'description'=>$this->isArraycheck($value['content']['publication']['detailedDescription']),
'summary'=>$this->isArraycheck($value['summary']),
'cpv'=>$code4['@attributes']['code'],
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
}
public function ApiTwo(){
$strJsonFileContents = file_get_contents("https://ec.europa.eu/info/funding-tenders/opportunities/data/referenceData/grantsTenders.json");
// Convert to array
$array = json_decode($strJsonFileContents, true);

$cities=['00'=>'Not specified / Other',
'BE100'=>'Arr. de Bruxelles-Capitale / Arr. Brussel-Hoofdstad',
'BE'=>'Belgique / België',
'ITC41'=>'Varese',
'BE10'=>'Région de Bruxelles-Capitale / Brussels Hoofdstedelijk Gewest',
'LU'=>'Luxembourg',
'BE1'=>'Région de Bruxelles-Capitale / Brussels Hoofdstedelijk Gewest',
'LU000'=>'Luxembourg',
'BE213'=>'Arr. Turnhout',
'NL328'=>'Alkmaar en omgeving',
'ITH52'=>'Parma',
'FR'=>'France',
'PT170'=>'Área Metropolitana de Lisboa',
'LU00'=>'Luxembourg',
'DE122'=>'Karlsruhe',
'EL'=>'Ελλάδα  / Elláda',
'MT'=>'Malta',
'BE21'=>'Prov Antwerpen',
'ES618'=>'Sevilla',
'TR'=>'Türkiye',
'ES521'=>'Alicante / Alacant',
'DK011'=>'Byen København',
'CY'=>'Κύπρος  / Kýpros',
'DEA23'=>'Köln',
'LT'=>'Lietuva',
'SE'=>'Sverige',
'NL332'=>'Agglomeratie ’s-Gravenhage',
'DE12'=>'Karlsruhe',
'IT'=>'Italia',
'PL'=>'Polska',
'ME'=>'Црна Гора / Crna Gora',
'PL911'=>'Miasto Warszawa',
'RS'=>'Srbija/Сpбија / Serbia',
'ES'=>'España',
'FRF11'=>'Bas-Rhin',
'LU0'=>'Luxembourg',
'ITC11'=>'Torino',
'NL'=>'Nederland',
'DE'=>'Deutschland',
'MK'=>'Северна Македонија / Severna Makedonija',
'EE'=>'Eesti',
'AT'=>'Österreich',
'BA'=>'Bosnia And Herzegovina',
'BG'=>'България  / Bulgaria',
'PT'=>'Portugal',
'IE061'=>'Dublin',
'NL1'=>'Noord-Nederland',
'HU'=>'Magyarország',
'RO'=>'România',
'FI'=>'Suomi / Finland',
'FI1B1'=>'Helsinki-Uusimaa',
'MA'=>'Morocco',
'SK'=>'Slovensko',
'UA'=>'Ukraine',
'1A'=>'Kosovo',
'FR101'=>'Paris',
'HR'=>'Hrvatska',
'IE'=>'Éire / Ireland',
'LB'=>'Lebanon',
'DK'=>'Danmark',
'FRE11'=>'Nord',
'HU110'=>'Budapest',
'LV006'=>'Rīga',
'DE123'=>'Karlsruhe',
'PL91'=>'Warszawski stołeczny',
'SI'=>'Slovenija',
'AL'=>'Shqipëria',
'DE712'=>'Frankfurt am Main',
'LV'=>'Latvija',
'TN'=>'Tunisia',
'AM'=>'Armenia',
'CZ'=>'Česko',
'EL30'=>'Aττική / Attiki',
'ES213'=>'Bizkaia',
'SI041'=>'Osrednjeslovenska',
'GE'=>'Georgia',
'MG'=>'Madagascar',
'NL329'=>'Groot-Amsterdam',
'AZ'=>'Azerbaijan',
'DZ'=>'Algeria',
'EL522'=>'Θεσσαλονίκη / Thessaloniki',
'ES114'=>'Pontevedra',
'ES3'=>'Comunidad de Madrid',
'ET'=>'Ethiopia',
'FRF1'=>'Alsace',
'MD'=>'Moldova',
'PT17'=>'Área Metropolitana de Lisboa',
'AT130'=>'Wien',
'BY'=>'Belarus',
'CG'=>'Congo',
'EG'=>'Egypt',
'UK'=>'United Kingdom',
'BE2'=>'Vlaams Gewest',
'DK01'=>'Hovedstaden',
'EL3'=>'Αττική / Attiki',
'FR10'=>'Ile-de-France',
'FR105'=>'Hauts-de-Seine',
'IE0'=>'Ireland',
'IE062'=>'Mid-East',
'JO'=>'Jordan',
'LT011'=>'Vilniaus apskritis',
'LY'=>'Libya',
'MT001'=>'Malta',
'TD'=>'Chad',
'BEZ'=>'Extra-Regio NUTS 1',
'DEA2'=>'Köln',
'ES511'=>'Barcelona',
'KE'=>'Kenya',
'LI'=>'Liechtenstein',
'NE'=>'Niger',
'NO'=>'Norge',
'RO321'=>'Bucureşti',
'SK01'=>'Bratislavský kraj',
'SL'=>'Sierra Leone',
'US'=>'United States',
'AT13'=>'Wien',
'EE00'=>'Eesti',
'FR1'=>'Ile-de-France',
'FRG02'=>'Maine-et-Loire',
'IL'=>'Israel',
'IQ'=>'Iraq',
'IS'=>'Ísland',
'KM'=>'Comoros',
'MK008'=>'Скопски / Skopski',
'MU'=>'Mauritius',
'MW'=>'Malawi',
'MZ'=>'Mozambique',
'PK'=>'Pakistan',
'SY'=>'Syria',
'TR100'=>'İstanbul',
'TR51'=>'Ankara',
'BB'=>'Barbados',
'BE3'=>'Région wallonne',
'BZ'=>'Belize',
'CF'=>'Central African Republic',
'CH'=>'Schweiz / Suisse / Svizzera',
'CM'=>'Cameroon',
'CZ01'=>'Praha',
'EE001'=>'Põhja-Eesti',
'GH'=>'Ghana',
'HR041'=>'HR041',
'ITC4'=>'Lombardia',
'JM'=>'Jamaica',
'KZ'=>'Kazakhstan',
'LA'=>'Laos',
'LK'=>'Sri Lanka',
'LT01'=>'Sostinės regionas',
'MT00'=>'Malta',
'NA'=>'Namibia',
'PE'=>'Peru',
'PS'=>'Palestinian Territory',
'PT1'=>'Continente',
'RU'=>'Russia',
'SC'=>'Seychelles',
'SI0'=>'Slovenija',
'SV'=>'El Salvador',
'TR10'=>'İstanbul',
'TR31'=>'İzmir',
'UG'=>'Uganda',
'UKI4'=>'Inner London — East',
'VN'=>'Vietnam',
'AG'=>'Antigua And Barbuda',
'AR'=>'Argentina',
'AT322'=>'Pinzgau-Pongau',
'BE255'=>'Arr. Oostende',
'BG411'=>'София (столица) / Sofia (stolitsa)',
'BG412'=>'София / Sofia',
'BJ'=>'Benin',
'BO'=>'Bolivia',
'BR'=>'Brazil',
'BS'=>'Bahamas',
'BW'=>'Botswana',
'CI'=>'Côte D’Ivoire',
'CN'=>'China',
'CO'=>'Colombia',
'CR'=>'Costa Rica',
'CU'=>'Cuba',
'CV'=>'Cape Verde',
'DE1'=>'Baden-Württemberg',
'DE30'=>'Berlin',
'DEA'=>'Nordrhein-Westfalen',
'DJ'=>'Djibouti',
'DM'=>'Dominica',
'DO'=>'Dominican Republic',
'EL303'=>'Κεντρικός Τομέας Αθηνών / Kentrikos Tomeas Athinon',
'EL431'=>'Ηράκλειο / Irakleio',
'ES21'=>'País Vasco',
'ES61'=>'Andalucía',
'FI1B'=>'Helsinki-Uusimaa',
'FI1D8'=>'Kainuu',
'FR103'=>'Yvelines',
'FRF'=>'Grand Est',
'FRL04'=>'Bouches-du-Rhône',
'GA'=>'Gabon',
'GD'=>'Grenada',
'GM'=>'Gambia',
'GN'=>'Guinea',
'GQ'=>'Equatorial Guinea',
'GY'=>'Guyana',
'HN'=>'Honduras',
'HT'=>'Haiti',
'HU11'=>'Budapest',
'ID'=>'Indonesia',
'ITG17'=>'Catania',
'ITH55'=>'Bologna',
'ITI4'=>'Lazio',
'ITI43'=>'Roma',
'KN'=>'Saint Kitts And Nevis',
'LC'=>'Saint Lucia',
'LS'=>'Lesotho',
'LT0'=>'Lietuva',
'LV0'=>'Latvija',
'LV00'=>'Latvija',
'ML'=>'Mali',
'MR'=>'Mauritania',
'MV'=>'Maldives',
'MX'=>'Mexico',
'MY'=>'Malaysia',
'NG'=>'Nigeria',
'NL32'=>'Noord-Holland',
'PA'=>'Panama',
'PT111'=>'Alto Minho',
'PY'=>'Paraguay',
'RW'=>'Rwanda',
'SE11'=>'Stockholm',
'SE110'=>'Stockholms län',
'SN'=>'Senegal',
'SO'=>'Somalia',
'SR'=>'Suriname',
'SS'=>'South Sudan',
'ST'=>'São Tomé And Príncipe',
'TG'=>'Togo',
'TR211'=>'Tekirdağ',
'TR310'=>'İzmir',
'TR332'=>'Afyonkarahisar',
'TR41'=>'Bursa',
'TR422'=>'Sakarya',
'TR510'=>'Ankara',
'TR631'=>'Hatay',
'TR714'=>'Nevşehir',
'TR822'=>'Çankırı',
'TR823'=>'Sinop',
'TR901'=>'Trabzon',
'TR903'=>'Giresun',
'TRA21'=>'Ağrı',
'TRB13'=>'Bingöl',
'TRB14'=>'Tunceli',
'TRB24'=>'Hakkari',
'TRC11'=>'Gaziantep',
'TRC21'=>'Şanlıurfa',
'TRC33'=>'Şırnak',
'TT'=>'Trinidad And Tobago',
'UKI'=>'London',
'UKI42'=>'Tower Hamlets',
'VC'=>'Saint Vincent And The Grenadines',
'ZA'=>'South Africa'];

foreach ($array['fundingData']['GrantTenderObj'] as $key => $value) {



$uniqId='req'.$key.'api2';
$apidata=DB::table('apidata')->where('tender_id',$uniqId);



if (array_key_exists("type",$value)) {

if ($value['type']==0) {

$enddate=(array_key_exists(0,$value['deadlineDatesLong'])) ? $value['deadlineDatesLong'][0]:date('Y-m-d H:i:s');



$tags='';

if ($value['status']['abbreviation']=='Closed') {
 $tags='cancel';
}else{
   $tags='active';
}

$citiescode=(array_key_exists(0,$value['placesOfDeliveryOrPerformance']))? $value['placesOfDeliveryOrPerformance'][0]:0;


$cityfound=(array_key_exists($citiescode,$cities))?$cities[$codeval] :'Not Found';
 
 print_r($cityfound);
if($apidata->count()>0){


// $apidata->update([
// 'title'=>$value['title'],
// 'title_slug'=>$this->slugify($value['title']),
// 'description'=>$value['descriptionTender'],
// 'summary'=>$value['identifier'],
// 'cpv'=>(array_key_exists("mainCpv",$value)) ? $value['mainCpv']['mainCode']:'',
// 'cpvjson'=>json_encode($value['additionalCpvs']),
// 'published_date'=>date('Y-m-d H:i:s', substr($value['publicationDateLong'], 0, 10)),
// 'end_date'=>(array_key_exists(0,$value['deadlineDatesLong'])) ? date('Y-m-d H:i:s', substr($value['deadlineDatesLong'][0], 0, 10)) :date('Y-m-d H:i:s'),
// 'location2'=>json_encode($value['placesOfDeliveryOrPerformance']),
// 'status'=>$value['procedureType'],
// 'tag'=>$tags,
// 'buyer_name_1'=>$value['contractingAuthority'],
// 'buyer_name_2'=>$value['contractingAuthority'],
// 'api_type'=>2,
// 'object'=>json_encode($value),
// 'initiation_time'=>date('Y-m-d H:i:s', substr($value['publicationDateLong'], 0, 10)),
// "created_at" =>  \Carbon\Carbon::now(), # new \Datetime()
// "updated_at" => \Carbon\Carbon::now(),  # new \Datetime()
// ]);
}else{

 

// DB::table('apidata')->insert([
// 'title'=>$value['title'],
// 'title_slug'=>$this->slugify($value['title']),
// 'description'=>$value['descriptionTender'],
// 'summary'=>$value['identifier'],
// 'cpv'=>(array_key_exists("mainCpv",$value)) ? $value['mainCpv']['mainCode']:'',
// 'cpvjson'=>json_encode($value['additionalCpvs']),
// 'published_date'=>date('Y-m-d H:i:s', substr($value['publicationDateLong'], 0, 10)),
// 'end_date'=>(array_key_exists(0,$value['deadlineDatesLong'])) ? date('Y-m-d H:i:s', substr($value['deadlineDatesLong'][0], 0, 10)) :date('Y-m-d H:i:s'),
// 'location2'=>json_encode($value['placesOfDeliveryOrPerformance']),
// 'status'=>$value['procedureType'],
// 'tag'=>$tags,
// 'buyer_name_1'=>$value['contractingAuthority'],
// 'buyer_name_2'=>$value['contractingAuthority'],
// 'api_type'=>2,
// 'object'=>json_encode($value), 
// 'tender_id'=>'req'.$key.'api2', 
// 'initiation_time'=>date('Y-m-d H:i:s', substr($value['publicationDateLong'], 0, 10)),
// "created_at" =>  \Carbon\Carbon::now(), # new \Datetime()
// "updated_at" => \Carbon\Carbon::now(),  # new \Datetime()
// ]);
}
}
}
if ($key === array_key_last($array['fundingData']['GrantTenderObj']))
{
echo 'Two End';

 
}
}
}


public function ApiThree(){


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


if ($key === array_key_first($array['results'])) {
    
      $uniqId='req'.$i.$key.'api3Fst';
     
    }elseif($key === array_key_last($array)){


      echo $uniqId='req'.$i.$key.'api3Lst';
  
    }else{


    $uniqId='req'.$i.$key.'api3';
     
    }
// $apidata=DB::table('apidata')->where('tender_id',$uniqId);
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
// if($apidata->count()>0){
// $apidata->update([
// 'title'=>$value['releases'][0]['tender']['title'],
// 'description'=>$this->isArraycheck($value['releases'][0]['tender']['description']),
// 'summary'=>$value['releases'][0]['tender']['title'],
// 'cpvjson'=>json_encode($value['releases'][0]['tender']['items'][0]['classification']),
// 'cpv'=>$value['releases'][0]['tender']['items'][0]['classification']['id'],
// 'location'=>(array_key_exists('buyer',$value['releases'][0]))? $value['releases'][0]['buyer']['address']['countryName']:'',
// 'published_date'=>date("Y-m-d H:i:s", strtotime($value['publishedDate'])),
// 'end_date'=>date("Y-m-d H:i:s", strtotime($enddateFinal)) ,
// 'buyer_location'=>(array_key_exists('buyer',$value['releases'][0]))? $value['releases'][0]['buyer']['address']['countryName']:'',
// 'buyer_region'=>(array_key_exists('buyer',$value['releases'][0]))? $value['releases'][0]['buyer']['address']['region']:'',
// 'status'=>$value['releases'][0]['tender']['status'],
// 'tag'=>$tags,
// 'buyer_name_1'=>(array_key_exists('buyer',$value['releases'][0]))? $value['releases'][0 ]['buyer']['name'] :'',
// 'supplier_name'=>(array_key_exists('awards',$value['releases'][0]))? $value['releases'][0]['awards'][0]['suppliers'][0]['name']:'',
// 'buyer_name_2'=>(array_key_exists('buyer',$value['releases'][0]))? $value['releases'][0]['buyer']['contactPoint']['name'] :'',
// 'oicd'=>$value['releases'][0]['ocid'],
// 'tid'=>$value['releases'][0]['id'],
// 'price'=>(array_key_exists('tender',$value['releases'][0]))? $value['releases'][0]['tender']['value']['amount'] :NULL,
// 'min_price'=>(array_key_exists('tender',$value['releases'][0]))? $value['releases'][0]['tender']['minValue']['amount'] :NULL,
// 'currency'=>(array_key_exists('tender',$value['releases'][0]))? $value['releases'][0]['tender']['value']['currency'] :NULL,
// 'buyer_postal_code'=>(array_key_exists('buyer',$value['releases'][0]))? $value['releases'][0]['buyer']['address']['postalCode']:'',
// 'api_type'=>3,
// 'object'=>json_encode($value),
// 'initiation_time'=>date("Y-m-d H:i:s", strtotime($value['releases'][0]['date'])),
// "created_at" =>  \Carbon\Carbon::now(), # new \Datetime()
// "updated_at" => \Carbon\Carbon::now(),  # new \Datetime()
// ]);
// }else{
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
'tender_id'=>$uniqId,
"created_at" =>  \Carbon\Carbon::now(), # new \Datetime()
"updated_at" => \Carbon\Carbon::now(),  # new \Datetime()
]);
// }
}
}
}
           }
 
public function apiTest(){


   $this->ApiThree();
}
}





