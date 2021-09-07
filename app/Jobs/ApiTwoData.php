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
class ApiTwoData implements ShouldQueue
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
public function handle(){
$strJsonFileContents = file_get_contents("https://ec.europa.eu/info/funding-tenders/opportunities/data/referenceData/grantsTenders.json");
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
$cityfound=(array_key_exists($citiescode,$cities))?$cities[$citiescode] :'Not Found';

if($apidata->count()>0){
$apidata->update([
'title'=>$value['title'],
'title_slug'=>$this->slugify($value['title']),
'description'=>$value['descriptionTender'],
'summary'=>$value['identifier'],
'cpv'=>(array_key_exists("mainCpv",$value)) ? $value['mainCpv']['mainCode']:'',
'cpvjson'=>json_encode($value['additionalCpvs']),
'published_date'=>date('Y-m-d H:i:s', substr($value['publicationDateLong'], 0, 10)),
'end_date'=>(array_key_exists(0,$value['deadlineDatesLong'])) ? date('Y-m-d H:i:s', substr($value['deadlineDatesLong'][0], 0, 10)) :date('Y-m-d H:i:s'),
'location2'=>json_encode($value['placesOfDeliveryOrPerformance']),
'status'=>$value['procedureType'],
'tag'=>$tags,
'location'=>$cityfound,
'buyer_name_1'=>$value['contractingAuthority'],
'buyer_name_2'=>$value['contractingAuthority'],
'api_type'=>2,
'object'=>json_encode($value),
'initiation_time'=>date('Y-m-d H:i:s', substr($value['publicationDateLong'], 0, 10)),
"created_at" =>  \Carbon\Carbon::now(), # new \Datetime()
"updated_at" => \Carbon\Carbon::now(),  # new \Datetime()
]);
}else{

DB::table('apidata')->insert([
'title'=>$value['title'],
'title_slug'=>$this->slugify($value['title']),
'description'=>$value['descriptionTender'],
'summary'=>$value['identifier'],
'cpv'=>(array_key_exists("mainCpv",$value)) ? $value['mainCpv']['mainCode']:'',
'cpvjson'=>json_encode($value['additionalCpvs']),
'published_date'=>date('Y-m-d H:i:s', substr($value['publicationDateLong'], 0, 10)),
'end_date'=>(array_key_exists(0,$value['deadlineDatesLong'])) ? date('Y-m-d H:i:s', substr($value['deadlineDatesLong'][0], 0, 10)) :date('Y-m-d H:i:s'),
'location2'=>json_encode($value['placesOfDeliveryOrPerformance']),
'location'=>$cityfound,
'status'=>$value['procedureType'],
'tag'=>$tags,
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
}
}
}