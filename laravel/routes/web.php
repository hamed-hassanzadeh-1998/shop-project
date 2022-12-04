<?php

use App\Http\Controllers\Backend\AtrributeValueController;
use App\Http\Controllers\Backend\AttributeGroupController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\MainController;
use App\Http\Controllers\Backend\PhotosController;
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


// Route::group(['middleware'=>'admin'], function (){
// Route::prefix('admin', function (){
//         Route::get('/',)
// });
// });

Route::prefix('administrator')->group(function (){
    Route::get('/',[MainController::class,'mainPage']);
    Route::resource('categories',CategoryController::class);
    Route::resource('attributes-group', AttributeGroupController::class);
    Route::resource('attributes-value', AtrributeValueController::class);
    Route::resource('brands', BrandController::class);
    Route::resource('photos', PhotosController::class);
    Route::post('photos/upload', [PhotosController::class,'upload'])->name('photos.upload');
});
