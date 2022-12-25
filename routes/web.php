<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();



Route::group(['namespace' => 'Admin', 'prefix' => 'ad'], function(){
    Route::get('/', 'IndexController')->name('admin.index');
    
    Route::group(['namespace' => 'User', 'prefix' => 'users'], function(){
        Route::get('/', 'IndexController')->name('admin.user.index');
        Route::get('/{user}', 'EditController')->name('admin.user.edit');
        Route::patch('/update/{user}', 'UpdateController')->name('admin.user.update');
        Route::get('/create/user', 'CreateController')->name('admin.user.create');
        Route::post('/store', 'StoreController')->name('admin.user.store');
        Route::delete('/delete/{user}', 'DeleteController')->name('admin.user.delete');


    });
});

Route::group(['namespace' => 'User', 'prefix' => 'user'], function(){
    Route::get('/{user}', 'IndexController')->name('user.index');
    Route::get('/{user}/data', 'GetDataController')->name('user.data');
    Route::get('/activate/user', 'ActivateUserController')->name('activate.user');
    Route::get('/edit/{user}/user', 'EditUserController')->name('user.edit');
    Route::get('/bookings/{user}', 'IndexBookController')->name('user.bookings');
});


Route::group(['namespace' => 'API', 'prefix' => 'service'], function(){
    Route::group(['namespace' => 'User', 'prefix' => 'user'], function(){
        Route::post('/update/{user}', 'UpdateUserController')->name('service.user.update');
        Route::get('/activate', 'RegisterUserController')->name('service.user.activate');
    });
    Route::group(['namespace' => 'WorkingTime', 'prefix' => 'workingtime'], function(){
        Route::get('/add/time', 'StoreController')->name('user.workingtime.store');
        Route::get('/delete', 'DeleteController')->name('user.workingtime.delete');
        Route::get('/update', 'UpdateController')->name('user.workingtime.update');
    });

    Route::group(['namespace' => 'Booking', 'prefix' => 'booking'], function(){
        Route::get('/store', 'StoreController')->name('user.booking.store');
        Route::get('/change/status', 'ChangeStatusController')->name('user.booking.changestatus');
        Route::get('/delete', 'DeleteBookController')->name('user.booking.delete');
    });
});


Route::get('/docs', function () {
    return view('swagger.index');
});
