<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\Azkarresource;
use App\Models\Azkar;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Auth::routes(['verify' => true]);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::namespace('App\Http\Controllers\Resource')->group(function(){
    /// User ///
    Route::post('/store-user-api', "authcontroller@storeUser")->name('admin.store.user.api');
    Route::post('/login-user-api', "authcontroller@loginUser")->name('admin.login.user.api');
    Route::post('/forget-password', "authcontroller@forgetpassword")->name('admin.forget.password');
    Route::post('/forget-password-code', "authcontroller@forgetPasswordCode")->name('forget.password,code');
    Route::post('/change-forget-password/{code}', "authcontroller@changeForgetPassword")->name('forget.password,change');
    
    Route::middleware(['auth:sanctum'])->group(function () {
    //Alazkaar //
    Route::get('/azkarsabah',   'azkarresourcecontroller@azkarS');
    Route::get('/azkarmasaa',   'azkarresourcecontroller@azkarM');
    Route::get('/azkarsleep',   'azkarresourcecontroller@azkarSleep');
    //--------------------------
   
    /// Alsalawat //
    Route::get('/alfagr'    ,    'Alsalawatresourcecontroller@alfagr');
    Route::get('/aldoha'    ,    'Alsalawatresourcecontroller@aldoha');
    Route::get('/aldohr'    ,    'Alsalawatresourcecontroller@aldohr');
    Route::get('/alasr'    ,     'Alsalawatresourcecontroller@alasr');
    Route::get('/almaghreb' ,    'Alsalawatresourcecontroller@almaghreb');
    Route::get('/aleshaa'   ,    'Alsalawatresourcecontroller@aleshaa');
    //-------------------------- 
    
    /// Questions ///
    Route::post('readquran',        'Questioncontroller@readquran');
    Route::post('memorizesquran',   'Questioncontroller@memorizesQuran');
    Route::post('ablutionsleep',         'Questioncontroller@ablution');
    Route::post('fasting',          'Questioncontroller@fasting');
    // User setting //
    Route::post('store/profile/photo',  'usercontroller@storePhotoProfile');
    Route::post('delete/profile/photo', 'usercontroller@deletePhoto');
    Route::post('changepassword',       'usercontroller@changePassword');

    Route::post('contactus', "contactuscontroller@storeMessage")->name('admin.contactus');
    Route::post('logout-user-api', "authcontroller@logoutUser")->name('admin.logout.user.api');
    });

    Route::post('getnotification', "WebNotificationController@sendNotification");
});