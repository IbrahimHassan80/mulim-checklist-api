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
      Route::get ('/admin-login', "admin_dashboardcontroller@adminLogin")->name('admin.login');
      Route::post('/check-admin-login', "admin_dashboardcontroller@checkAdminLogin")->name('check.admin.login');
    });
    
    Route::middleware(['auth:admin'])->group(function(){
      Route::get ('/', "admin_dashboardcontroller@dashboard")->middleware('auth:admin')->name('admin.dashboard');
      Route::get ('/admin-logout', "admin_dashboardcontroller@logout")->name('admin.logout');
      Route::get ('add-admins', "admin_dashboardcontroller@addAdmin")->name('admin.add')->middleware('role:Super admin');
      Route::post('store-admins', "admin_dashboardcontroller@storeAdmin")->name('admin.store');
      Route::get ('show-admins', "admin_dashboardcontroller@showaAmins")->name('admin.show');
      Route::get ('delete-admins/{id}', "admin_dashboardcontroller@deleteAmins")->name('admin.delete');
      
      Route::get('add-user', "admin_dashboardcontroller@addUser")->name('admin.add.user');
      Route::post('store-user', "admin_dashboardcontroller@storeUser")->name('admin.store.user');
      Route::post('storephoto', 'admin_dashboardcontroller@storePhoto')->name('store.photo');
    });

    // Alazkar //
      Route::get('azkarsabah', 'alAzkarController@azkarsabah')->name('azkar.sabah');
      Route::get('azkarmasaa', 'alAzkarController@azkarmasaa')->name('azkar.masaa');
      Route::get('azkarnoom', 'alAzkarController@azkarnoom')->name('azkar.nooom');

  });