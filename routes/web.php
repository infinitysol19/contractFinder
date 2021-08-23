<?php

use Illuminate\Support\Facades\Route;

//Hasnain's Code Start's
use App\Http\Controllers\frontendControllers\home\HomeController;
use App\Http\Controllers\frontendControllers\livesearch\LiveSearchController;
use App\Http\Controllers\frontendControllers\tenderdetailpage\TenderDetailController;





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





Route::get('livesearch',[LiveSearchController::class,'index'])->name('livesearch');

Route::get('historicalsearch',[LiveSearchController::class,'historicalSearch'])->name('historicalsearch');

Route::get('tenderdetail',[TenderDetailController::class,'index'])->name('tenderdetail');
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/myhome', [HomeController::class, 'index'])->name('myhome');
Route::get('dashboard',[App\Http\Controllers\frontendControllers\myaccount\DashboardController::class,'index'])->name('dashboard');


Auth::routes();
















// "Dont Touch or Hit And Use  This route Its private "
Route::get('apiTest',[HomeController::class,'apiTest'])->name('apiTest');
// "Dont Touch This route Its private "



//// Front end Routes 