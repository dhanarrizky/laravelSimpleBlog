<?php

use App\Http\Controllers\blog\blogController;
use Illuminate\Support\Facades\Auth;
use UniSharp\LaravelFilemanager\Lfm;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\admin\articleController;
use App\Http\Controllers\admin\categoryController;
use App\Http\Controllers\admin\profileController;
use UniSharp\LaravelFilemanager\Controllers\Controller;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// blog page
Route::get('/', [blogController::class , 'index'])->name('blog');
Route::post('/search',[blogController::class , 'index'])->name('search');
Route::get('/category/{id}', [blogController::class , 'cat'])->name('blog-cat');
// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('admin', function(){
    return view('auth.login');
});
Route::middleware('auth')->group(function(){
    // admin page
    Route::get('admin/', 'App\Http\Controllers\admin\adminController@index')->name('admin');
    // category controller
    // only digunakkan untuk menunjukan apa saja yang akan kita pakai
    Route::resource('admin/category', categoryController::class)->only([
        'index','store','update','destroy'
    ])->middleware('UserAccess:1');
    
    // article admin controller
    // Route::get('admin/article', 'App\Http\Controllers\admin\articleController@index')->name('admin-article');
    Route::resource('admin/article', articleController::class);
    Route::resource('admin/users', profileController::class )->middleware('UserAccess:1');
    
    Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['guest']], function () {
        \UniSharp\LaravelFilemanager\Lfm::routes();
    });
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();
