<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;
use App\Http\Controllers\ProductController;

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
    $title = "home";
    return view('halamanutama', compact(['title']));
});

Route::get('/halaman-utama', function () {
    return view('halamanutama');
});

Route::get('/dashboard-admin', function () {
    return view('Admin.dashboard-admin');
});

Route::get('/admin-dashboard', function () {
    return view('Admin.admin-dashboard');
});

Route::resource('products', ProductController::class);

Route::get('/lupa_sandi', function () {
    return view('auth.lupa_sandi');
});


Route::get('/kontak', function () {
    return view('contact', [
        "title" => "Kontak"
    ]);
});

Route::get('/produk', function () {
    $pr = Product::get();
    $title = "product";
    return view('produk',compact(['pr','title']) );
});

Route::get('/pemesanan', function () {
    return view('pemesanan.index');
});
Route::get('/cara-beli', function () {
    return view('Beli.indexbeli');
});

Route::get('/log', function(){
    return view('auth.login');
})->name('login');


// Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login_post', [LoginController::class, 'login_post'])->name('login_post');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/register', [LoginController::class, 'register']);
Route::post('/registerpost', [LoginController::class, 'register_post'])->name('register_post');


Route::post('/login-prosesuser', [LoginController::class, 'login_prosesuser'])->name('login-prosesuser');
Route::get('/logoutuser', [LoginController::class, 'logoutuser'])->name('logoutuser');
Route::get('/registeruser', [LoginController::class, 'registeruser'])->name('registeruser');
Route::post('/register-prosesuser', [LoginController::class, 'register_prosesuser'])->name('register-prosesuser');


