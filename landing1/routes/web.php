<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\NewsPostController;
use App\Http\Controllers\Backend\ServiceController;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\TestimonialController;
use App\Http\Controllers\Frontend\IndexController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[IndexController::class,'Index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth','role:admin'])->group(function(){
    Route::get('/admin/dashboard',[AdminController::class,'AdminDashboard'])->name('admin.dashboard');
    Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');





    // Slider Gallery
    Route::controller(SliderController::class)->group(function(){
         Route::get('/all/slider/images','AllSlider')->name('all.slider');
         Route::get('/add/slider/gallery','AddSliderGallery')->name('add.slider.gallery');
         Route::post('/photo/store/','StoreSlider')->name('photo.store');

         Route::get('/edit/slider/{id}', 'EditSlider')->name('edit.slider.gallery');
         Route::post('/update/slider/gallery', 'UpdateSlider')->name('UpdateSlider.store');
         Route::get('/delete/slider/gallery/{id}', 'DeleteSlider')->name('delete.gallery');
    });

        // Create All Category
        Route::controller(CategoryController::class)->group(function () {
            Route::get('/all/category', 'AllCategory')->name('all.category');
            Route::get('/add/category', 'AddCategory')->name('add.category');
            Route::post('/store/category', 'StoreCategory')->name('category.store');
            Route::get('/edit/category/{id}', 'EditCategory')->name('edit.category');
            Route::post('/update/category', 'UpdateCategory')->name('category.update');
            Route::get('/delete/category/{id}', 'DeleteCategory')->name('delete.category');
    
          
    
        });

        // Create News post
    Route::controller(NewsPostController::class)->group(function () {
        Route::get('/all/news/post', 'AllNews')->name('all.news.post');
        Route::get('/add/news/post', 'AddNewsPost')->name('add.news.post');
        Route::post('/store/news', 'StoreNews')->name('store.news.post');
        Route::get('/edit/news/{id}', 'EditNews')->name('edit.newspost');
        Route::get('/delete/news/{id}', 'DeleteNews')->name('delete.newspost');
        Route::post('/update/news', 'UpdateNews')->name('update.news.post');
        Route::get('/inactive/news/{id}', 'InactiveNews')->name('inactive.news.post');
        Route::get('/active/news/{id}', 'ActiveNews')->name('active.news.post');
        Route::get('/nonspecial/news/{id}', 'NonSpecialNews')->name('nonspecial.newspost');
        Route::get('/special/news/{id}', 'SpecialNews')->name('special.newspost');

        // Multi Image Operation
        Route::get('/multiImg/delete/{id}', 'MultiImageDelete')->name('news.multiImg.delete');
        Route::post('/multiImg/update', 'MultiImageUpdate')->name('update-multi-image');

    });

    Route::controller(ServiceController::class)->group(function(){
        Route::get('/all/service/post', 'AllService')->name('all.service.post');
        Route::get('/add/service/post', 'AddService')->name('add.service.post');
        Route::post('/store/service', 'StoreService')->name('store.service.post');
        Route::get('/edit/service/{id}', 'EditService')->name('edit.service.post');
        Route::post('/update/service', 'UpdateService')->name('update.service.post');
        Route::get('/delete/service/{id}', 'DeleteService')->name('delete.service.post');
    });
    Route::controller(TestimonialController::class)->group(function(){
        Route::get('/all/testi/post', 'AllTesti')->name('all.testi.post');
        Route::get('/add/testi/post', 'AddTesti')->name('add.testi.post');
        Route::post('/store/testi', 'StoreTesti')->name('store.testi.post');
        Route::get('/edit/testi/{id}', 'EditTesti')->name('edit.testi.post');
        Route::post('/update/testi', 'UpdateTesti')->name('update.testi.post');
        Route::get('/delete/testi/{id}', 'DeleteTesti')->name('delete.testi');
    });
   
});

Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->middleware(RedirectIfAuthenticated::class)
    ->name('admin.login');
Route::get('/admin/logout/page', [AdminController::class, 'AdminLogoutPage'])->name('admin.logout.page');


//   Access For All

Route::get('/service/details/{id}', [IndexController::class, 'ServiceDetails'])->name('sevice.details');
Route::get('/product/details/{id}', [IndexController::class, 'ProductDetails'])->name('product.details');