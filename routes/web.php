<?php

use Illuminate\Support\Facades\Route;

//Hasnain's Code Start's
use App\Http\Controllers\frontendControllers\home\HomeController;
use App\Http\Controllers\frontendControllers\livesearch\LiveSearchController;
use App\Http\Controllers\frontendControllers\tenderdetailpage\TenderDetailController;
use App\Http\Controllers\frontendControllers\BuyerBehaviour\BuyerBehaviourController;
use App\Http\Controllers\frontendControllers\Competitors\CompetitorsController;
use App\Http\Controllers\Auth\RegisterController;




use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\AddUserController;
use App\Http\Controllers\admin\ApiController;
use App\Http\Controllers\admin\CountryMockupController;
use App\Http\Controllers\admin\PackageController;
use App\Http\Controllers\admin\PermissionController;
use App\Http\Controllers\admin\UserSubscriptionController;
use App\Http\Controllers\admin\SettingController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\RequestQoutesController;
use App\Http\Controllers\admin\Cpv_codesController;
use App\Http\Controllers\admin\FrontSubscriberController;
use App\Http\Controllers\admin\FrontNewsController;
use App\Http\Controllers\admin\ContactusController;



//Hasnain's Code Ends's



//Faisal's Code Start's

//Faisal's Code Ends's

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



// admin Route Start Here

Route::prefix('admin')->group(function ()
{
Route::middleware('auth:admin')->group(function ()
{
/////////////////////////////////////// Main Dashboard ///////////////////////////

Route::get('/dashboard', [DashboardController::class, 'admin_dashboard'])->name('admin_dashboard');

/////////////////////////////////////// Main Dashboard End ///////////////////////////



 //////////////////// User Mangement //////////////////////////////////////////////

Route::get('/user', [UserController::class, 'index'])->name('users');

Route::get('/user/subscription/{id}', [UserController::class, 'subscription'])->name('usersAdminsubscription');

Route::get('/getUser_admin_ajax', [UserController::class, 'getUser_admin_ajax'])->name('getUser_admin_ajax');
Route::get('/adduser', [AddUserController::class, 'index'])->name('adduserpage');

Route::get('useredit/{id}', [UserController::class, 'userEdit'])->name('userEdit');

Route::get('userview/{id}', [UserController::class, 'userview'])->name('userview');

Route::post('/adduser', [AddUserController::class, 'addUser'])->name('adduser');

Route::post('del_ajax_user', [UserController::class, 'del_ajax_user'])->name('del_ajax_user');
 
Route::post('updateUser', [UserController::class, 'updateUser'])->name('updateUser');


//////////////////// User Mangement End //////////////////////////////////////////////




//////////////////// Api Data //////////////////////////////////////////////

Route::get('/getapiData', [ApiController::class, 'index'])->name('getapiData');

Route::get('/getapiData_admin_ajax', [ApiController::class, 'getapiData_admin_ajax'])->name('getapiData_admin_ajax');

Route::get('/apiDataView/{id}', [ApiController::class, 'apiDataView'])->name('apiDataView');


//////////////////// Api Data End //////////////////////////////////////////////




//////////////////// Packages //////////////////////////////////////////////

Route::get('/packages', [PackageController::class, 'index'])->name('packages');


Route::get('/package_admin_ajax', [PackageController::class, 'package_admin_ajax'])->name('package_admin_ajax');
Route::get('/addpackageview', [PackageController::class, 'addpackageview'])->name('addpackageview');

Route::get('packageedit/{id}', [PackageController::class, 'packageedit'])->name('packageedit');

Route::get('packageview/{id}', [PackageController::class, 'packageview'])->name('packageview');

Route::post('/addpackage', [PackageController::class, 'addpackage'])->name('addpackage');

Route::post('del_ajax_package', [PackageController::class, 'del_ajax_package'])->name('del_ajax_package');
 
Route::post('updatepackage', [PackageController::class, 'updatepackage'])->name('updatepackage');


//////////////////// Packages End //////////////////////////////////////////////



//////////////////// permissions //////////////////////////////////////////////

Route::get('/permissions', [PermissionController::class, 'index'])->name('permissions');

 
Route::get('/permissions_admin_ajax', [PermissionController::class, 'permissions_admin_ajax'])->name('permissions_admin_ajax');

Route::get('/addpermissionsview', [PermissionController::class, 'addpermissionsview'])->name('addpermissionsview');

Route::get('permissionsedit/{id}', [PermissionController::class, 'permissionsedit'])->name('permissionsedit');

Route::get('permissionsview/{id}', [PermissionController::class, 'permissionsview'])->name('permissionsview');

Route::post('/addpermissions', [PermissionController::class, 'addpermissions'])->name('addpermissions');

Route::post('del_ajax_permissions', [PermissionController::class, 'del_ajax_permissions'])->name('del_ajax_permissions');
 
Route::post('updatepermissions', [PermissionController::class, 'updatepermissions'])->name('updatepermissions');

//////////////////// permissions End //////////////////////////////////////////////
 


//////////////////// countrymockup //////////////////////////////////////////////

Route::get('/countrymockup', [CountryMockupController::class, 'index'])->name('countrymockup');


Route::get('/countrymockup_admin_ajax', [CountryMockupController::class, 'countrymockup_admin_ajax'])->name('countrymockup_admin_ajax');

Route::get('/addcountrymockupview', [CountryMockupController::class, 'addcountrymockupview'])->name('addcountrymockupview');

Route::get('countrymockupedit/{id}', [CountryMockupController::class, 'countrymockupedit'])->name('countrymockupedit');

Route::get('countrymockupview/{id}', [CountryMockupController::class, 'countrymockupview'])->name('countrymockupview');

Route::post('/addcountrymockup', [CountryMockupController::class, 'addcountrymockup'])->name('addcountrymockup');

Route::post('del_ajax_countrymockup', [CountryMockupController::class, 'del_ajax_countrymockup'])->name('del_ajax_countrymockup');
 
Route::post('updatecountrymockup', [CountryMockupController::class, 'updatecountrymockup'])->name('updatecountrymockup');


//////////////////// countrymockup End //////////////////////////////////////////////



//////////////////// Request mockup //////////////////////////////////////////////

Route::get('/req_qoutes', [RequestQoutesController::class, 'index'])->name('req_qoutes');


Route::get('/req_qoutes_admin_ajax', [RequestQoutesController::class, 'req_qoutes_admin_ajax'])->name('req_qoutes_admin_ajax');

Route::get('/addreq_qoutesview', [RequestQoutesController::class, 'addreq_qoutesview'])->name('addreq_qoutesview');

Route::get('req_qoutesedit/{id}', [RequestQoutesController::class, 'req_qoutesedit'])->name('req_qoutesedit');

Route::get('req_qoutesview/{id}', [RequestQoutesController::class, 'req_qoutesview'])->name('req_qoutesview');



Route::post('del_ajax_req_qoutes', [RequestQoutesController::class, 'del_ajax_req_qoutes'])->name('del_ajax_req_qoutes');
 
Route::post('updatereq_qoutes', [RequestQoutesController::class, 'updatereq_qoutes'])->name('updatereq_qoutes');


//////////////////// Request mockup End //////////////////////////////////////////////



//////////////////// Cpv_codes //////////////////////////////////////////////

Route::get('/cpv_codes', [Cpv_codesController::class, 'index'])->name('cpv_codes');


Route::get('/cpv_codes_admin_ajax', [Cpv_codesController::class, 'cpv_codes_admin_ajax'])->name('cpv_codes_admin_ajax');

Route::get('/cpv_codesview', [Cpv_codesController::class, 'cpv_codesview'])->name('cpv_codesview');

Route::get('cpv_codesedit/{id}', [Cpv_codesController::class, 'cpv_codesedit'])->name('cpv_codesedit');

// Route::get('cpv_codesview/{id}', [Cpv_codesController::class, 'cpv_codesview'])->name('cpv_codesview');

Route::post('/addcpv_codes', [Cpv_codesController::class, 'addcpv_codes'])->name('addcpv_codes');

Route::post('del_ajax_cpv_codes', [Cpv_codesController::class, 'del_ajax_cpv_codes'])->name('del_ajax_cpv_codes');
 
Route::post('updatecpv_codes', [Cpv_codesController::class, 'updatecpv_codes'])->name('updatecpv_codes');


//////////////////// Cpv_codes End //////////////////////////////////////////////


/////////////////////////// Blog news ///////////////////////////////////////////

Route::get('/getallnews_admin',[FrontNewsController::class, 'index'])->name('getallnews_admin');

Route::get('/getallnews_admin_ajax',[FrontNewsController::class, 'getall_news_ajax'])->name('getallnews_admin_ajax');


Route::get('/addnews_admin',[FrontNewsController::class, 'addnew'])->name('addnews_admin');

Route::post('/insertnews_admin',[FrontNewsController::class, 'insert_news'])->name('insertnews_admin');

Route::get('/editnews_admin{id}',[FrontNewsController::class, 'edit_news'])->name('editnews_admin');

Route::post('/updatenews_admin',[FrontNewsController::class, 'update_news'])->name('updatenews_admin');

Route::post('/deletenews_admin_ajax',[FrontNewsController::class, 'delete_news_ajax'])->name('deletenews_admin_ajax');





 

//////////////////////////////////   blog news end///////////////////////////
// ContactusController

/*
*
*Contact
*
*/
Route::get('/contact_admin',[ContactusController::class, 'index'])->name('contact_admin');

Route::get('/contact_admin_ajax',[ContactusController::class, 'contact_admin_ajax'])->name('contact_admin_ajax');

Route::get('/add_contact_admin',[ContactusController::class, 'add_contact_admin'])->name('add_contact_admin');

Route::post('/insert_contact_admin',[ContactusController::class, 'insert_contact_admin'])->name('insert_contact_admin');

Route::get('/edit_contact_admin{id}',[ContactusController::class, 'edit_contact_admin'])->name('edit_contact_admin');

Route::post('/update_contact_admin',[ContactusController::class, 'update_contact_admin'])->name('update_contact_admin');

Route::post('/delete_contact_admin_ajax',[ContactusController::class, 'delete_contact_admin_ajax'])->name('delete_contact_admin_ajax');






//////////////////// Subscriber Admin//////////////////////////////////////////////

Route::get('/subscriber_admin',[FrontSubscriberController::class,'index'])->name('subscriber_admin');
Route::get('/subscriber_admin_ajax',[FrontSubscriberController::class,'subscriber_admin_ajax'])->name('subscriber_admin_ajax');

Route::get('/add_subscriber_admin', [FrontSubscriberController::class,'add_subscriber_admin'])->name('add_subscriber_admin');

Route::post('/insert_subscriber_admin',[FrontSubscriberController::class,'insert_subscriber_admin'])->name('insert_subscriber_admin');

Route::get('/edit_subscriber_admin{id}',[FrontSubscriberController::class,'edit_subscriber_admin'])->name('edit_subscriber_admin');
Route::post('/update_subscriber_admin',[FrontSubscriberController::class,'update_subscriber_admin'])->name('update_subscriber_admin');
Route::post('/delete_subscriber_admin_ajax',[FrontSubscriberController::class,'delete_subscriber_admin_ajax'])->name('delete_subscriber_admin_ajax');


Route::post('/sendmail_subscriber_admin_ajax',[FrontSubscriberController::class,'sendmail_subscriber_admin_ajax'])->name('sendmail_subscriber_admin_ajax');

Route::post('/postSubscribeFront',[FrontSubscriberController::class,'postSubscribeFront'])->name('postSubscribeFront');
 

//////////////////// Subscriber Admin End //////////////////////////////////////////////


 


//////////////////// settings //////////////////////////////////////////////


Route::get('/settings', [SettingController::class, 'index'])->name('settings');


Route::post('/setEnvvarables', [SettingController::class, 'setEnvvarables'])->name('setEnvvarables');


//////////////////// settings End //////////////////////////////////////////////


// Logout

Route::get('/logout', [DashboardController::class, 'logout'])->name('admin-logout');


});
 





Route::get('login', [DashboardController::class, 'index'])->name('admin.login');
Route::post('/login', [DashboardController::class, 'store'])->name('admin-loginAttempt');
Route::post('/sendpassword', [DashboardController::class, 'sendpassword'])->name('sendpassword');


});

// admin Route End Here

     



//// Front  Routes 




Route::middleware('auth')->group(function ()
{


// myaccount Index Route
Route::get('dashboard',[App\Http\Controllers\frontendControllers\myaccount\DashboardController::class,'index'])->name('dashboard');

Route::post('userSettings',[App\Http\Controllers\frontendControllers\myaccount\DashboardController::class,'userSettings'])->name('userSettings');




Route::get('profile',[App\Http\Controllers\frontendControllers\myaccount\ProfileController::class,'index'])->name('profile');

Route::post('UpdateUserFront',[App\Http\Controllers\frontendControllers\myaccount\ProfileController::class,'UpdateUserFront'])->name('UpdateUserFront');

Route::post('UpdateUserProfilePic',[App\Http\Controllers\frontendControllers\myaccount\ProfileController::class,'UpdateUserProfilePic'])->name('UpdateUserProfilePic');


Route::get('myalerts',[App\Http\Controllers\frontendControllers\myaccount\MyalertsController::class,'index'])->name('myalerts');

Route::get('bidWriter',[App\Http\Controllers\frontendControllers\myaccount\BidWriterController::class,'index'])->name('bidWriter');
Route::post('bidWriterFrontPost',[App\Http\Controllers\frontendControllers\myaccount\BidWriterController::class,'bidWriterFrontPost'])->name('bidWriterFrontPost');

Route::get('subscription',[App\Http\Controllers\frontendControllers\myaccount\SubscriptionController::class,'index'])->name('frontsubscription');

Route::post('changesubscription',[App\Http\Controllers\frontendControllers\myaccount\SubscriptionController::class,'changesubscription'])->name('changesubscription');


Route::get('whishlist',[App\Http\Controllers\frontendControllers\myaccount\WhishlistController::class,'index'])->name('whishlist');


Route::get('whishlist',[App\Http\Controllers\frontendControllers\myaccount\WhishlistController::class,'index'])->name('whishlist');

Route::get('recentallyview',[App\Http\Controllers\frontendControllers\myaccount\WhishlistController::class,'recentallyview'])->name('recentallyview');
// myaccount Index Route End


});
Auth::routes();











Route::get('/', [HomeController::class, 'index'])->name('home');


Route::get('/pricing', [HomeController::class, 'pricing'])->name('pricing');

Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

Route::post('/postContactFront', [HomeController::class, 'postContactFront'])->name('postContactFront');


Route::get('/privacy_policy', [HomeController::class, 'privacy'])->name('privacy');
 

Route::get('livesearch',[LiveSearchController::class,'index'])->name('livesearch');


////////////////////////  Search Tendor //////////////////////////////

Route::get('Ajax_live_Tender/fetch_data',[LiveSearchController::class,'Tendor_Search'])->name('Ajax_live_Tender');

Route::post('/autocomplete/fetch', [LiveSearchController::class,'fetch'])->name('autocomplete.fetch');

 
//////////////////////// End  Search Tendor //////////////////////////////

Route::get('historicalsearch',[LiveSearchController::class,'historicalSearch'])->name('historicalsearch');


Route::get('tenderdetail',[TenderDetailController::class,'index'])->name('tenderdetail');

Route::get('/myhome', [HomeController::class, 'index'])->name('myhome');


Route::post('/customize_register', [RegisterController::class, 'customize_register'])->name('customize_register');

Route::get('/doneSubscription/{email}',[FrontSubscriberController::class,'doneSubscription'])->name('doneSubscription');

Route::get('/blog',[FrontNewsController::class, 'blog'])->name('blog');


Route::get('/blog/{slug}',[FrontNewsController::class, 'blogsingle'])->name('blogsingle');


Route::get('buyer-behaviour-analysis',[BuyerBehaviourController::class, 'index'])->name('buyer_behaviour');

Route::get('find-your-competitors',[CompetitorsController::class, 'index'])->name('find_your_competitors');



















// "Dont Touch or Hit And Use  This route Its private "
Route::get('apiTest',[HomeController::class,'apiTest'])->name('apiTest');
// "Dont Touch This route Its private "



//// Front end Routes 







