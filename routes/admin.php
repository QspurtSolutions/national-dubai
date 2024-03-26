<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\WorkController;
use App\Http\Controllers\Admin\CareerController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\User\UserBlogController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\IndustriesController;
use App\Http\Controllers\Admin\TechnologiesController;
use App\Http\Controllers\Admin\Auth\NewPasswordController;
use App\Http\Controllers\Admin\Auth\PasswordResetLinkController;
use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;


//New Controllers 

use App\Http\Controllers\Admin\ManagementController;
use App\Http\Controllers\Admin\BranchController;
use App\Http\Controllers\Admin\OtherserviceController;
use App\Http\Controllers\Admin\LoanController;
use App\Http\Controllers\Admin\DepositController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\FormController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\PopularProductsController;
use App\Http\Controllers\Admin\FeaturedController;

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

Route::prefix('admin')->name('admin.')->group(function () {

    Route::middleware('guest:admin')->group(function () {
        Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
        Route::post('/login', [AuthenticatedSessionController::class, 'store']);
        Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
        Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');
        Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
        Route::post('/reset-password', [NewPasswordController::class, 'store'])->name('password.update');
    });

    Route::middleware('auth:admin')->group(function () {
        Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        



//Management  Admin Panel bank start 

Route::prefix('management')->group(function () {
    Route::get('/', [ManagementController::class, 'index'])->name('management.index');
    Route::get('/index', [ManagementController::class, 'list'])->name('management.list');
    Route::get('/create', [ManagementController::class, 'create'])->name('management.create');
    Route::post('/create', [ManagementController::class, 'store'])->name('management.store');
    Route::get('/{id}/edit', [ManagementController::class, 'edit'])->name('management.edit');
    Route::patch('/{id}/edit', [ManagementController::class, 'update'])->name('management.update');
    Route::delete('/{id}/delete', [ManagementController::class, 'destroy'])->name('management.destroy');
});



Route::prefix('branch')->group(function () {
    Route::get('/', [BranchController::class, 'index'])->name('branch.index');
    Route::get('/index', [BranchController::class, 'list'])->name('branch.list');
    Route::get('/create', [BranchController::class, 'create'])->name('branch.create');
    Route::post('/create', [BranchController::class, 'store'])->name('branch.store');
    Route::get('/{id}/edit', [BranchController::class, 'edit'])->name('branch.edit');
    Route::patch('/{id}/edit', [BranchController::class, 'update'])->name('branch.update');
    Route::delete('/{id}/delete', [BranchController::class, 'destroy'])->name('branch.destroy');
});



Route::prefix('otherservices')->group(function () {
    Route::get('/', [OtherserviceController::class, 'index'])->name('otherservices.index');
    Route::get('/index', [OtherserviceController::class, 'list'])->name('otherservices.list');
    Route::get('/create', [OtherserviceController::class, 'create'])->name('otherservices.create');
    Route::post('/create', [OtherserviceController::class, 'store'])->name('otherservices.store');
    Route::get('/{id}/edit', [OtherserviceController::class, 'edit'])->name('otherservices.edit');
    Route::patch('/{id}/edit', [OtherserviceController::class, 'update'])->name('otherservices.update');
    Route::delete('/{id}/delete', [OtherserviceController::class, 'destroy'])->name('otherservices.destroy');
});


Route::prefix('loan')->group(function () {
    Route::get('/', [LoanController::class, 'index'])->name('loan.index');
    Route::get('/index', [LoanController::class, 'list'])->name('loan.list');
    Route::get('/create', [LoanController::class, 'create'])->name('loan.create');
    Route::post('/create', [LoanController::class, 'store'])->name('loan.store');
    Route::get('/{id}/edit', [LoanController::class, 'edit'])->name('loan.edit');
    Route::patch('/{id}/edit', [LoanController::class, 'update'])->name('loan.update');
    Route::delete('/{id}/delete', [LoanController::class, 'destroy'])->name('loan.destroy');
});


Route::prefix('deposit')->group(function () {
    Route::get('/', [DepositController::class, 'index'])->name('deposit.index');
    Route::get('/index', [DepositController::class, 'list'])->name('deposit.list');
    Route::get('/create', [DepositController::class, 'create'])->name('deposit.create');
    Route::post('/create', [DepositController::class, 'store'])->name('deposit.store');
    Route::get('/{id}/edit', [DepositController::class, 'edit'])->name('deposit.edit');
    Route::patch('/{id}/edit', [DepositController::class, 'update'])->name('deposit.update');
    Route::delete('/{id}/delete', [DepositController::class, 'destroy'])->name('deposit.destroy');
});



Route::prefix('deposit')->group(function () {
    Route::get('/', [DepositController::class, 'index'])->name('deposit.index');
    Route::get('/index', [DepositController::class, 'list'])->name('deposit.list');
    Route::get('/create', [DepositController::class, 'create'])->name('deposit.create');
    Route::post('/create', [DepositController::class, 'store'])->name('deposit.store');
    Route::get('/{id}/edit', [DepositController::class, 'edit'])->name('deposit.edit');
    Route::patch('/{id}/edit', [DepositController::class, 'update'])->name('deposit.update');
    Route::delete('/{id}/delete', [DepositController::class, 'destroy'])->name('deposit.destroy');
});



Route::prefix('gallery')->group(function () {
    Route::get('/', [GalleryController::class, 'index'])->name('gallery.index');
    Route::get('/index', [GalleryController::class, 'list'])->name('gallery.list');
    Route::get('/create', [GalleryController::class, 'create'])->name('gallery.create');
    Route::post('/create', [GalleryController::class, 'store'])->name('gallery.store');
    Route::get('/{id}/edit', [GalleryController::class, 'edit'])->name('gallery.edit');
    Route::patch('/{id}/edit', [GalleryController::class, 'update'])->name('gallery.update');
    Route::delete('/{id}/delete', [GalleryController::class, 'destroy'])->name('gallery.destroy');
});



Route::prefix('forms')->group(function () {
    Route::get('/', [FormController::class, 'index'])->name('forms.index');
    Route::get('/index', [FormController::class, 'list'])->name('forms.list');
    Route::get('/create', [FormController::class, 'create'])->name('forms.create');
    Route::post('/create', [FormController::class, 'store'])->name('forms.store');
    Route::get('/{id}/edit', [FormController::class, 'edit'])->name('forms.edit');
    Route::patch('/{id}/edit', [FormController::class, 'update'])->name('forms.update');
    Route::delete('/{id}/delete', [FormController::class, 'destroy'])->name('forms.destroy');
});



Route::prefix('news')->group(function () {
    Route::get('/', [NewsController::class, 'index'])->name('news.index');
    Route::get('/index', [NewsController::class, 'list'])->name('news.list');
    Route::get('/create', [NewsController::class, 'create'])->name('news.create');
    Route::post('/create', [NewsController::class, 'store'])->name('news.store');
    Route::get('/{id}/edit', [NewsController::class, 'edit'])->name('news.edit');
    Route::patch('/{id}/edit', [NewsController::class, 'update'])->name('news.update');
    Route::delete('/{id}/delete', [NewsController::class, 'destroy'])->name('news.destroy');
});



Route::prefix('banner')->group(function () {
    Route::get('/', [BannerController::class, 'index'])->name('banner.index');
    Route::get('/index', [BannerController::class, 'list'])->name('banner.list');
    Route::get('/create', [BannerController::class, 'create'])->name('banner.create');
    Route::post('/create', [BannerController::class, 'store'])->name('banner.store');
    Route::get('/{id}/edit', [BannerController::class, 'edit'])->name('banner.edit');
    Route::patch('/{id}/edit', [BannerController::class, 'update'])->name('banner.update');
    Route::delete('/{id}/delete', [BannerController::class, 'destroy'])->name('banner.destroy');
});




Route::prefix('brand')->group(function () {
    Route::get('/', [BrandController::class, 'index'])->name('brand.index');
    Route::get('/index', [BrandController::class, 'list'])->name('brand.list');
    Route::get('/create', [BrandController::class, 'create'])->name('brand.create');
    Route::post('/create', [BrandController::class, 'store'])->name('brand.store');
    Route::get('/{id}/edit', [BrandController::class, 'edit'])->name('brand.edit');
    Route::patch('/{id}/edit', [BrandController::class, 'update'])->name('brand.update');
    Route::delete('/{id}/delete', [BrandController::class, 'destroy'])->name('brand.destroy');
});


Route::prefix('testimonial')->group(function () {
    Route::get('/', [TestimonialController::class, 'index'])->name('testimonial.index');
    Route::get('/index', [TestimonialController::class, 'list'])->name('testimonial.list');
    Route::get('/create', [TestimonialController::class, 'create'])->name('testimonial.create');
    Route::post('/create', [TestimonialController::class, 'store'])->name('testimonial.store');
    Route::get('/{id}/edit', [TestimonialController::class, 'edit'])->name('testimonial.edit');
    Route::patch('/{id}/edit', [TestimonialController::class, 'update'])->name('testimonial.update');
    Route::delete('/{id}/delete', [TestimonialController::class, 'destroy'])->name('testimonial.destroy');
});


Route::prefix('categories')->group(function () {
    Route::get('/', [CategoriesController::class, 'index'])->name('categories.index');
    Route::get('/index', [CategoriesController::class, 'list'])->name('categories.list');
    Route::get('/create', [CategoriesController::class, 'create'])->name('categories.create');
    Route::post('/create', [CategoriesController::class, 'store'])->name('categories.store');
    Route::get('/{id}/edit', [CategoriesController::class, 'edit'])->name('categories.edit');
    Route::patch('/{id}/edit', [CategoriesController::class, 'update'])->name('categories.update');
    Route::delete('/{id}/delete', [CategoriesController::class, 'destroy'])->name('categories.destroy');
});


Route::prefix('sub_categories')->group(function () {
    Route::get('/', [SubCategoryController::class, 'index'])->name('sub_categories.index');
    Route::get('/list', [SubCategoryController::class, 'table'])->name('sub_categories.list');
    Route::get('/create', [SubCategoryController::class, 'create'])->name('sub_categories.create');
    Route::post('/create', [SubCategoryController::class, 'store'])->name('sub_categories.store');
    Route::get('/{id}/edit', [SubCategoryController::class, 'edit'])->name('sub_categories.edit');
    Route::patch('/{id}/edit', [SubCategoryController::class, 'update'])->name('sub_categories.update');
    Route::delete('/{id}/delete', [SubCategoryController::class, 'destroy'])->name('sub_categories.destroy');
});



Route::prefix('popular_products')->group(function () {
    Route::get('/', [PopularProductsController::class, 'index'])->name('popular_products.index');
    Route::get('/list', [PopularProductsController::class, 'table'])->name('popular_products.list');
    Route::get('/create', [PopularProductsController::class, 'create'])->name('popular_products.create');
    Route::post('/create', [PopularProductsController::class, 'store'])->name('popular_products.store');
    Route::get('/{id}/edit', [PopularProductsController::class, 'edit'])->name('popular_products.edit');
    Route::patch('/{id}/edit', [PopularProductsController::class, 'update'])->name('popular_products.update');
    Route::delete('/{id}/delete', [PopularProductsController::class, 'destroy'])->name('popular_products.destroy');
});




Route::prefix('featured_categories')->group(function () {
    Route::get('/', [FeaturedController::class, 'index'])->name('featured_categories.index');
    Route::get('/list', [FeaturedController::class, 'table'])->name('featured_categories.list');
    Route::get('/create', [FeaturedController::class, 'create'])->name('featured_categories.create');
    Route::post('/create', [FeaturedController::class, 'store'])->name('featured_categories.store');
    Route::get('/{id}/edit', [FeaturedController::class, 'edit'])->name('featured_categories.edit');
    Route::patch('/{id}/edit', [FeaturedController::class, 'update'])->name('featured_categories.update');
    Route::delete('/{id}/delete', [FeaturedController::class, 'destroy'])->name('featured_categories.destroy');
});




       

        // Route::prefix('works')->group(function () {
        //     Route::get('/', [WorkController::class, 'index'])->name('works.index');
        //     Route::get('/index', [WorkController::class, 'list'])->name('works.list');
        //     Route::get('/create', [WorkController::class, 'create'])->name('works.create');
        //     Route::post('/create', [WorkController::class, 'store'])->name('works.store');
        //     Route::get('/{id}/edit', [WorkController::class, 'edit'])->name('works.edit');
        //     Route::patch('/{id}/edit', [WorkController::class, 'update'])->name('works.update');
        //     Route::delete('/{id}/delete', [WorkController::class, 'destroy'])->name('works.destroy');
        // });

        // Route::prefix('career')->group(function () {
        //     Route::get('/', [CareerController::class, 'index'])->name('career.index');
        //     Route::get('/index', [CareerController::class, 'list'])->name('career.list');
        //     Route::get('/create', [CareerController::class, 'create'])->name('career.create');
        //     Route::post('create', [CareerController::class, 'store'])->name('career.store');
        //     Route::get('/{id}/edit', [CareerController::class, 'edit'])->name('career.edit');
        //     Route::patch('/{id}/edit', [CareerController::class, 'update'])->name('career.update');
        //     Route::delete('/{id}/delete', [CareerController::class, 'destroy'])->name('career.destroy');
        // });






    });
});
