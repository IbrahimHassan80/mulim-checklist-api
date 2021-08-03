<?php

use Illuminate\Support\Facades\Route;

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
Route::namespace('App\Http\Controllers\Admin')->group(function(){
    Route::middleware(['guest:admin'])->group(function(){
      Route::get ('/admin-login', "AdminDashboardController@adminLogin")->name('admin.login');
      Route::post('/check-admin-login', "AdminDashboardController@checkAdminLogin")->name('check.admin.login');
    });
    
    Route::middleware(['auth:admin'])->group(function(){
      Route::get ('/', "AdminDashboardController@dashboard")->name('admin.dashboard');
      Route::get ('/admin-logout', "AdminDashboardController@logout")->name('admin.logout');
      Route::get ('add-admins', "AdminDashboardController@addAdmin")->name('admin.add')->middleware('role:Super admin');
      Route::post('store-admins', "AdminDashboardController@storeAdmin")->name('admin.store');
      Route::get ('show-admins', "AdminDashboardController@showaAmins")->name('admin.show');
      Route::get ('delete-admins/{id}', "AdminDashboardController@deleteAmins")->name('admin.delete');
      
      Route::get('add-user', "AdminDashboardController@addUser")->name('admin.add.user');
      Route::get('show-user', "AdminDashboardController@showusers")->name('show.user');
      Route::post('store-user', "AdminDashboardController@storeUser")->name('admin.store.user');
      Route::post('storephoto', 'AdminDashboardController@storePhoto')->name('store.photo');
      Route::get('delete/user/{id}', 'AdminDashboardController@deleteusers')->name('delete.user');
      
       // Alazkar //
       Route::get('azkarsabah', 'alAzkarController@azkarsabah')->name('azkar.sabah');
       Route::get('azkarmasaa', 'alAzkarController@azkarmasaa')->name('azkar.masaa');
       Route::get('azkarnoom', 'alAzkarController@azkarnoom')->name('azkar.nooom');
       
       Route::get('alsalawat', 'AdminDashboardController@alsalawat')->name('alsalawat');
    });

  });