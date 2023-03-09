<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SetTopBoxController;
use App\Http\Middleware\AdminAuth;
use App\Http\Middleware\CustomerAuth;
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

Route::get('/login_page', function () {
    return view('backend.auth.login');
})->name('admin_login');


Route::group(['prefix' => 'admin'], function () {
    // Authentication

    Route::post('admin_loginPerform', [AdminAuthController::class, 'adminLoginPerform'])->name('admin.loginPerform');


    Route::middleware([AdminAuth::class])->group(function () {
        Route::get('/', function () {
            return view('backend.dashboard');
        })->name('dashboard');
        Route::get('/admin_logout', [AdminAuthController::class, 'admin_logout'])->name('admin.logout');


        //Admin
        Route::get('/admin_list', [AdminController::class, 'index'])->name('admin_list');

        Route::post('/search_admin', [AdminController::class, 'searchAdmin'])->name('search_admin');

        Route::post('/admin_create', [AdminController::class, 'adminCreate'])->name('admin_create');


        Route::get('/customer_reset_password/{id}', [AdminController::class, 'customerResetPassword'])->name('customer_reset_password');

        // Route::get('/getAdmin', [AdminController::class, 'getAdmin'])->name('getAdmin');

        Route::get('/edit_admin/{id}', [AdminController::class, 'AdminEdit'])->name('edit-admin');

        Route::post('/update_admin', [AdminController::class, 'adminUpdate'])->name('update-admin');


        Route::get('/delete_admin/{id}', [AdminController::class, 'adminDelete'])->name('delete_admin');


        //Role    
        Route::get('/role_list', [RoleController::class, 'roleIndex'])->name('role_list');

        Route::post('/search_role', [RoleController::class, 'searchRole'])->name('search_role');

        Route::post('/role_create', [RoleController::class, 'roleCreate'])->name('role_create');

        Route::get('/role_edit/{id}', [RoleController::class, 'roleEdit'])->name('role_edit');

        Route::post('/role_update', [RoleController::class, 'roleUpdate'])->name('role_update');

        Route::get('/role_delete/{id}', [RoleController::class, 'roleDelete'])->name('role_delete');



   //customer
        Route::get('/user_list', [CustomerController::class, 'userList'])->name('user_list');
        Route::post('/search_user', [CustomerController::class, 'search_user'])->name('search_user');
        Route::post('/customer_create', [CustomerController::class, 'customerCreate'])->name('customer_create');
        Route::get('/customer_edit/{id}', [CustomerController::class, 'customerEdit'])->name('customer_edit');
        Route::post('/customer_update', [CustomerController::class, 'customerUpdate'])->name('customer_update');
        Route::get('/customer_delete/{id}', [CustomerController::class, 'customerDelete'])->name('customer_delete');
        Route::get('/customer_profile/{id}', [CustomerController::class, 'customerProfileView'])->name('customer_profile_view');



        Route::get('/user_create', function () {
            return view('backend.user.create');
        })->name('user_create');
    });






    //Package

    Route::get('/package_list', [PackageController::class, 'packeageList'])->name('package_list');

    Route::post('/search_package', [PackageController::class, 'search_package'])->name('search_package');

    Route::post('/package_create', [PackageController::class, 'packageCreate'])->name('package_create');

    Route::get('/package_edit/{id}', [PackageController::class, 'packageEdit'])->name('package_edit');

    Route::post('/package_update', [PackageController::class, 'packageUpdate'])->name('package_update');
    
    Route::get('/package_delete/{id}', [PackageController::class, 'packageDelete'])->name('package_delete');

    Route::get('/customer_package_assign/{id}', [CustomerController::class, 'package_assign'])->name('package_assign');


    Route::post('/customer_package_assign_perform', [CustomerController::class, 'package_assign_perform'])->name('package_assign_perform');
    Route::get('/customer_setTopBox_assign/{id}', [CustomerController::class, 'settop_box_assign'])->name('settop_box_assign');
    Route::post('/customer_settopbox_assign_perform', [CustomerController::class, 'settop_box_assign_perform'])->name('psettop_box_assign_perform');
   
    // Route::get('/package_create', function () {
    //     return view('backend.package.create');
    // })->name('package_create');

    Route::get('/dashboard', function () {
        return view('backend.dashboard');
    })->name('admin_dashboard');
    
    // SetTop Box
    Route::get('/setTop_box', [SetTopBoxController::class, 'SetTopBox'])->name('setTop_box');

    Route::post('/search_setTopBox', [SetTopBoxController::class, 'search_setTopBox'])->name('search_setTopBox');

    Route::post('/setTopBox_create', [SetTopBoxController::class, 'setTopBoxCreate'])->name('setTopBox_create');

    Route::get('/setTopBox_edit/{id}', [SetTopBoxController::class, 'setTopBoxEdit'])->name('setTopBox_edit');

    Route::post('/setTopBox_update', [SetTopBoxController::class, 'setTopBoxUpdate'])->name('setTopBox_update');

    Route::get('/setTopBox_delete/{id}', [SetTopBoxController::class, 'setTopBoxDelete'])->name('setTopBox_delete');

});

//customer_profile
Route::middleware([CustomerAuth::class])->group(function () {
    Route::get('/customer_profile', [CustomerController::class, 'customer_profile'])->name('customer_profile');

    Route::post('/password_reset',[CustomerController::class,'passwordReset'])->name('password_reset');
});

 Route::get('/test',function() {

        return add_smart_card('8006064265146285', '26321490458239','1','test','01358976542','dhaka');
    });




