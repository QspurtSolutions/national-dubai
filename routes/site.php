<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

use App\Http\Controllers\FrBlogController;
use App\Http\Controllers\FrHomeController;
use App\Http\Controllers\FrWorkController;
use App\Http\Controllers\FrbranchController;
use App\Http\Controllers\FrcareerController;
use App\Http\Controllers\FrClientController;
use App\Http\Controllers\frGalleryController;



use App\Http\Controllers\FrProductController;
use App\Http\Controllers\FrServiceController;
use App\Http\Controllers\ContactFormController;




use App\Http\Controllers\FrIndustriesController;
use App\Http\Controllers\FrmanagementController;
use App\Http\Controllers\FrTechnologiesController;
use App\Http\Controllers\FrAboutController;
use App\Http\Controllers\FrpopularproductsController;




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


Route::get('/', [FrHomeController::class, 'index']);
Route::get('/index', [FrHomeController::class, 'index']);
Route::get('/about', [FrAboutController::class, 'about']);
Route::get('/products', [FrpopularproductsController::class, 'products']);

Route::get('/contact', [ContactFormController::class, 'contact']);





// Route::get('index', function () {
//     return view('index');
// });





Route::get('about', function () {
    return view('about');
});


Route::get('/all-products', [FrProductController::class,'getAllProducts'])->name('getAllProducts');
Route::get('single-product/{id}', [FrProductController::class, 'productDetails'])->name('productDetails');

// Route::get('products', function () {
//     return view('products');
// });


// Route::get('single-products', function () {
//     return view('single-products');
// });





















// 
// Route::get('index', function () {
//     return view('index');
// });




Route::get('works', [FrWorkController::class, 'works']);
Route::get('/worksdetails/{slug?}', [FrWorkController::class, 'worksdetails'])->name('worksdetails');

Route::get('serviemenu', [FrServiceController::class, 'serviemenu']);




