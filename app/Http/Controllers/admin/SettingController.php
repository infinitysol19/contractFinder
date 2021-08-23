<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class SettingController extends Controller
{
      public function index()
    {
       
        return view('admin.settings.index');
    }


    public function setEnvvarables(Request $request)
    {


        $hlogo = $request->file('hlogo');
        if (!empty($hlogo)) {
            $hlogo_image = $request->file('hlogo');
            $hlogo= time() . uniqid(). '.' .$hlogo_image->getClientOriginalExtension();
            $hlogo_destinationPath = public_path('/admin/vender/images/');
            $hlogo_image->move($hlogo_destinationPath, $hlogo);
        }else {
            
             $hlogo=$request->hlogohidden; 
        }

      

        $flogo = $request->file('flogo');
        if (!empty($flogo)) {
            $flogo_image = $request->file('flogo');
            $flogo= time() . uniqid(). '.' .$flogo_image->getClientOriginalExtension();
            $flogo_destinationPath = public_path('/admin/vender/images/');
            $flogo_image->move($flogo_destinationPath, $flogo);
        }else {
            
             $flogo=$request->flogohidden; 

        }



          $settings=DB::table('settings')->where('id',1);
       
        
        if ($settings->count()>0) {
            
    $settings->update(['home_banner_h1'=>$request->home_banner_h1,'home_banner_p'=>$request->home_banner_p,'home_banner_p2'=>$request->home_banner_p2]);

        }else{
       

        DB::table('settings')->insert(['home_banner_h1'=>$request->home_banner_h1,'home_banner_p'=>$request->home_banner_p,'home_banner_p2'=>$request->home_banner_p2]);

        }


       $values=['SITE_LOGO'=>$hlogo,'SITE_LOGO_FOOTER'=>$flogo,'MAIL_SUBJECT'=>$request->MAIL_SUBJECT,'MAIL_TO_CONTACT'=>$request->MAIL_TO_CONTACT,'MAIL_FROM_NAME'=>$request->MAIL_FROM_NAME,'APP_URL'=>$request->APP_URL,'MAIL_FROM_ADDRESS'=>$request->MAIL_FROM_ADDRESS,'APP_NAME'=>$request->APP_NAME];

        $envFile = app()->environmentFilePath();
        $str = file_get_contents($envFile); 

         if (count($values) > 0) {
        foreach ($values as $envKey => $envValue) {

            $str .= "\n"; // In case the searched variable is in the last line without \n
            $keyPosition = strpos($str, "{$envKey}=");
            $endOfLinePosition = strpos($str, "\n", $keyPosition);
            $oldLine = substr($str, $keyPosition, $endOfLinePosition - $keyPosition);

            // If key does not exist, add it
            if (!$keyPosition || !$endOfLinePosition || !$oldLine) {
                $str .= "{$envKey}={$envValue}\n";
            } else {
                $str = str_replace($oldLine, "{$envKey}={$envValue}", $str);
            }

        }
    } 

    $str = substr($str, 0, -1);
     if (!file_put_contents($envFile, $str)) return false;
      \Artisan::call('config:cache');
    \Artisan::call('route:clear');
     \Artisan::call('cache:clear');
       \Artisan::call('view:clear');


    return redirect()->back()->with('message','Settings Update SuccessFully');
    }



}
