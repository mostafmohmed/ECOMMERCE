<?php

use App\Http\Controllers\Admin\logincontroller;
use App\Http\Controllers\Admin\maincatagory;
use App\Http\Controllers\authgithub;
use App\Http\Controllers\cartcontroller;
use App\Http\Controllers\checkoutcontroller;
use App\Http\Controllers\paypalcontroller;
use App\Http\Controllers\produectcontroller;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\singleproudect;
use App\Http\Controllers\Usercontroller;
use App\Http\Controllers\wishlistcontroller;
use App\Models\Produect;
use Illuminate\Support\Facades\Route;

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



Route::controller(authgithub::class)->prefix('/github')->group(function (){
    Route::get('/logingithup', 'logingithup')->name('socilte.login');
    Route::get('/redirect', 'redirect');
});

Route::prefix('/front')->name('front.')->middleware('auth')-> group(function () {
   
  //  
  Route::get('/single-produect{id}', singleproudect::class)->name('single-produect');
  
  Route::post('addfav',[wishlistcontroller::class,'addfav'])->name('fav');
    Route::post('cart',[cartcontroller::class,'get'])->name('cart');
    Route::delete('cartdelet/{id}',[cartcontroller::class,'viewdelet'])->name('delet');
    Route::get('cartview',[cartcontroller::class,'view']);
    Route::get('checkout',[checkoutcontroller::class,'checkout'])->name('checkplcher');
    Route::post('checkoutt',[checkoutcontroller::class,'palcher'])->name('check');

    Route::get('my-order',[Usercontroller::class,'index']);
    Route::get('view-order{id}',[Usercontroller::class,'show'])->name('view');

    Route::get('payment',[paypalcontroller::class,'payment'])->name('payment');
    Route::get('cancel',[paypalcontroller::class,'cancel'])->name('cancel');
    Route::get('payment/success',[paypalcontroller::class,'success'])->name('success');
    Route::get('/', function () {
        $produect=Produect::where('active',1)->get();
        return view('frontt.home',compact('produect'));
        // return view('frontt.home');
    });
    Route::get('wishlist',[wishlistcontroller::class,'wishlist'])->name('wishlist');
 
 });

 require __DIR__.'/auth.php';


// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
//ddddddddddddddddddddddddddddddddddddddddddddddddd
Route::prefix('/admin')->name('admin.')-> group(function () {
    Route::resource('/produect',produectcontroller::class);
    Route::post('admin', [logincontroller::class, 'login'])->name('loginn');
    Route::get('/', function () {
        return
       view('admin.auth.login');
    });
    Route::get('/dashpord', function () {
        return
       view('admin.dachpord');
    });
    
    Route::resource('catugory',maincatagory::class);
    // Route::get('/', AdminController::class)->middleware('admin')->name('index');
    // Route::view('login','admin.auth.login');
    //      Route::view('register','admin.auth.register');
    //      Route::view('forgetpassword','admin.auth.forgetpassword');
        //  require __DIR__.'/AdminAuth.php';
});