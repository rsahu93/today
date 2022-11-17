<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogCategoryController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\SellerController;

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

/* ------------- Admin Route -------------- */

Route::prefix('admin')->group(function (){

Route::get('/login',[AdminController::class, 'Index'])->name('login_from');

Route::post('/login/owner',[AdminController::class, 'Login'])->name('admin.login');

Route::get('/dashboard',[AdminController::class, 'Dashboard'])->name('admin.dashboard')->middleware('admin');

Route::get('/logout',[AdminController::class, 'AdminLogout'])->name('admin.logout')->middleware('admin');

Route::get('/register',[AdminController::class, 'AdminRegister'])->name('admin.register');

Route::post('/register/create',[AdminController::class, 'AdminRegisterCreate'])->name('admin.register.create');

Route::get('/user',[AdminController::class, 'User']);


});


Route::get('admin/destroy',[AdminController::class,'destroy'])->name('admin.destroy');
Route::get('profile',[AdminController::class,'create'])->name('adminProfile');
Route::get('profile/edit',[AdminController::class,'edit'])->name('profileEdit');
Route::post('profile/store',[AdminController::class,'store'])->name('profileStore');
Route::get('update',[AdminController::class,'update'])->name('update');
Route::post('password/update',[AdminController::class,'passwordUpdate'])->name('passwordUpdate');
// Route::get('blog.contact',[AdminController::class,'contact'])->name('blog.contact.info');

Route::get('auth/profile',[AdminController::class,'profile']);

//* blog Category
Route::get('blog/category/index',[BlogCategoryController::class,'index'])->name('blog.category.index');
Route::get('blog/category/create',[BlogCategoryController::class,'create'])->name('blog.category.create');
Route::post('blog/category/store',[BlogCategoryController::class,'Store'])->name('blog.category.store');
Route::get('blog/category/edit/{id}',[BlogCategoryController::class,'edit'])->name('blog.category.edit');
Route::post('blog/category/update/{id}',[BlogCategoryController::class,'update'])->name('blog.category.update');
Route::delete('blog/category/destroy/{id}',[BlogCategoryController::class,'destroy'])->name('blog.category.destroy');

//* blog
Route::get('blog/index',[BlogController::class,'index'])->name('blog.index');
Route::get('blog/create',[BlogController::class,'create'])->name('blog.create');
Route::post('blog/store',[BlogController::class,'Store'])->name('blog.store');
Route::get('blog/edit/{id}',[BlogController::class,'edit'])->name('blog.edit');
Route::post('blog/update/{id}',[BlogController::class,'update'])->name('blog.update');
Route::delete('blog/destroy/{id}',[BlogController::class,'destroy'])->name('blog.destroy');





/* ------------- End Admin Route -------------- */




/* ------------- Seller Route -------------- */

Route::prefix('seller')->group(function (){

Route::get('/login',[SellerController::class, 'SellerIndex'])->name('seller_login_from');

Route::get('/dashboard',[SellerController::class, 'SellerDashboard'])->name('seller.dashboard')->middleware('seller');

Route::post('/login/owner',[SellerController::class, 'SellerLogin'])->name('seller.login');



Route::get('/logout',[SellerController::class, 'SellerLogout'])->name('seller.logout')->middleware('seller');

Route::get('/register',[SellerController::class, 'SellerRegister'])->name('seller.register');

Route::post('/register/create',[SellerController::class, 'SellerRegisterCreate'])->name('seller.register.create');


});
/* ------------- End Seller Route -------------- */



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
