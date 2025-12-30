<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ItemController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\AuthController;


/*
|--------------------------------------------------------------------------
| DEFAULT HOME
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return redirect('/register');
});


/*
|--------------------------------------------------------------------------
| USER DASHBOARD
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


/*
|--------------------------------------------------------------------------
| USER AREA (NORMAL USERS)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // USER CAN CREATE ITEM
    Route::get('/items/create', [ItemController::class,'create'])->name('items.create');
    Route::post('/items', [ItemController::class,'store'])->name('items.store');

    // USER CAN ONLY VIEW HIS + ADMIN ITEMS
    Route::get('/my-items', [ItemController::class,'myItems'])->name('user.items');
});


require __DIR__.'/auth.php';



/*
|--------------------------------------------------------------------------
| FULL ADMIN PANEL (SEPARATE GUARD)
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->group(function () {

    // Admin Login
    Route::get('/login',[AuthController::class,'loginPage'])->name('admin.login');
    Route::post('/login',[AuthController::class,'login'])->name('admin.login.submit');

    // Admin Logout
    Route::post('/logout',[AuthController::class,'logout'])->name('admin.logout');


    /*
    |--------------------------------------------------------------------------
    | PROTECTED ADMIN AREA
    |--------------------------------------------------------------------------
    */
    Route::middleware('auth:admin')->group(function(){

        // Admin Dashboard
        Route::get('/', function (){
            return view('admin.dashboard');
        })->name('admin.dashboard');

        /*
        |--------------------------------------------------------------------------
        | ADMIN FULL CRUD WITH UNIQUE NAMES
        |--------------------------------------------------------------------------
        */
        Route::resource('items', ItemController::class)
            ->names('admin.items');   // 👈 IMPORTANT
    });
});



/*
|--------------------------------------------------------------------------
| OPTIONAL: SAFE LOGOUT GET SUPPORT
|--------------------------------------------------------------------------
*/
Route::get('/admin/logout', function () {
    Auth::guard('admin')->logout();
    return redirect('/admin/login');
});
