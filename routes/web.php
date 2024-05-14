<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\controllers\AdminController;
use App\Http\controllers\VendorController;
use App\Http\controllers\UserController;
use App\Http\controllers\Backend\BrandController;
use App\Http\controllers\Backend\CategoryController;
use App\Http\controllers\Backend\SubCategoryController;
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

Route::get('/', function () {
    return view('frontend.index');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth'])->group(function() {
    // user dashboard
    Route::get('/dashboard', [UserController::class, 'UserDashboard'])->name('dashboard');

    Route::post('/user/profile/store', [UserController::class, 'UserProfileStore'])->name('user.profile.store');

    Route::get('/user/logout', [UserController::class, 'UserLogout'])->name('user.logout');

    Route::post('/user/update/password', [UserController::class, 'UserUpdatePassword'])->name('user.update.password');


}); // Group Middleware End

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';

// Admin Dashboard
Route::middleware(['auth', 'role:admin'])->group(function() {
    //admin
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');

    Route::get('/admin/logout', [AdminController::class, 'AdminDestroy'])->name('admin.logout');

    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');

    Route::post('/admin/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');

    Route::get('/admin/change/password', [AdminController::class, 'AdminChangePassword'])->name('admin.change.password');

    Route::post('/admin/update/password', [AdminController::class, 'AdminUpdatePassword'])->name('update.password');

});

// Vendor Dashboard
Route::middleware(['auth', 'role:vendor'])->group(function() {
   // vendor
    Route::get('/vendor/dashboard', [VendorController::class, 'VendorDashboard'])->name('vendor.dashboard');

    Route::get('/vendor/logout', [VendorController::class, 'VendorDestroy'])->name('vendor.logout');

    Route::get('/vendor/profile', [VendorController::class, 'VendorProfile'])->name('vendor.profile');

    Route::post('/vendor/profile/store', [VendorController::class, 'VendorProfileStore'])->name('vendor.profile.store');

    Route::get('/vendor/change/password', [VendorController::class, 'VendorChangePassword'])->name('vendor.change.password');

    Route::post('/vendor/update/password', [VendorController::class, 'VendorUpdatePassword'])->name('update.password');

});

// Admin Login
Route::get('/admin/login', [AdminController::class, 'AdminLogin']);
// Vendor Login
Route::get('/vendor/login', [VendorController::class, 'VendorLogin']);




Route::middleware(['auth', 'role:admin'])->group(function() {
    // Brands
    Route::controller(BrandController::class)->group(function() {

        Route::get('/all/brand', 'AllBrand')->name('all.brand');

        Route::get('/add/brand', 'AddBrand')->name('add.brand');

        Route::post('/store/brand', 'StoreBrand')->name('store.brand');

        Route::get('/edit/brand/{id}', 'EditBrand')->name('edit.brand');

        Route::post('/update/brand', 'UpdateBrand')->name('update.brand');

        Route::get('/delete/brand/{id}', 'DeleteBrand')->name('delete.brand');

    });

    // Category
    Route::controller(CategoryController::class)->group(function() {

        Route::get('/all/category', 'AllCategory')->name('all.category');

        Route::get('/add/category', 'AddCategory')->name('add.category');

        Route::post('/store/category', 'StoreCategory')->name('store.category');

        Route::get('/edit/category/{id}', 'EditCategory')->name('edit.category');

        Route::post('/update/category', 'UpdateCategory')->name('update.category');

        Route::get('/delete/category/{id}', 'DeleteCategory')->name('delete.category');

    });

    // Sub Category
    Route::controller(SubCategoryController::class)->group(function() {

        Route::get('/all/subcategory', 'AllSubCategory')->name('all.subcategory');

        Route::get('/add/subcategory', 'AddSubCategory')->name('add.subcategory');

        Route::post('/store/subcategory', 'StoreSubCategory')->name('store.subcategory');

        Route::get('/edit/subcategory/{id}', 'EditSubCategory')->name('edit.subcategory');

        Route::post('/update/subcategory', 'UpdateSubCategory')->name('update.subcategory');

        Route::get('/delete/subcategory/{id}', 'DeleteSubCategory')->name('delete.subcategory');

    });
}); // end middleware
