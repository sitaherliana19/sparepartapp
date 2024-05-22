<?php

use App\Http\Controllers\BarangKeluarController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\InventoryReportController;
use Illuminate\Support\Facades\Auth;

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
Route::get('/halamanutama', function () {
    $title = "home";
    return view('halamanutama', compact(['title']));
});


// Route::get('/dashboard-admin', function () {
//     return view('Admin.dashboard-admin');
// });

Route::get('/admin-dashboard', function () {
    return view('Admin.admin-dashboard');
});

Route::resource('products', ProductController::class);
Route::get('/produk/{id}', [ProductController::class, 'show'])->name('produk_show');
Route::post('/products/{id}/purchase', [ProductController::class, 'purchase'])->name('purchase');

Route::resource('inventory_reports', InventoryReportController::class);

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

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/log');
})->name('logout');

// Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login_post', [LoginController::class, 'login_post'])->name('login_post');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout')->name('logout');
Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/registerpost', [LoginController::class, 'register_post'])->name('register_post');



Route::post('/login-prosesuser', [LoginController::class, 'login_prosesuser'])->name('login-prosesuser');
Route::get('/logoutuser', [LoginController::class, 'logoutuser'])->name('logoutuser');
Route::get('/registeruser', [LoginController::class, 'registeruser'])->name('registeruser');
Route::post('/register-prosesuser', [LoginController::class, 'register_prosesuser'])->name('register-prosesuser');

Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');


Route::get('/barang_masuk', [BarangMasukController::class, 'index'])->name('barang_masuk.index');
Route::get('/barang_masuk/create', [BarangMasukController::class, 'create'])->name('barang_masuk.create');
Route::post('/barang_masuk', [BarangMasukController::class, 'store'])->name('barang_masuk');

Route::get('/barang_keluar', [BarangKeluarController::class, 'index'])->name('barang_keluar.index');
Route::get('/barang_keluar/create', [BarangKeluarController::class, 'create'])->name('barang_keluar.create');
Route::post('/barang_keluar', [BarangKeluarController::class, 'store'])->name('barang_keluar');


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
