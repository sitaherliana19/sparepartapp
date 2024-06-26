<?php

use App\Http\Controllers\AdminController;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\DataPelangganController;
use App\Http\Controllers\KategoriProdukController;
use App\Http\Controllers\InventoryReportController;
use App\Http\Controllers\ResetPasswordControllers;
use App\Http\Controllers\ForgotPasswordControllers;
use App\Http\Controllers\LaporanController;

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


Route::get('/admin-dashboard', function () {
    return view('Admin.admin-dashboard');
});

Route::get('/carabeli', function () {
    return view('cara_beli', );
});


Route::get('/produk', function () {
    $pr = Product::get();
    $title = "product";
    return view('produk',compact(['pr','title']) );
});

Route::get('/log', function(){
    return view('auth.login');
})->name('login');

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/log');
})->name('logout');


Route::post('/login_post', [LoginController::class, 'login_post'])->name('login_post');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout')->name('logout');
Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/registerpost', [LoginController::class, 'register_post'])->name('register_post');


//login regis proses
Route::post('/login-prosesuser', [LoginController::class, 'login_prosesuser'])->name('login-prosesuser');
Route::get('/logoutuser', [LoginController::class, 'logoutuser'])->name('logoutuser');
Route::get('/registeruser', [LoginController::class, 'registeruser'])->name('registeruser');
Route::post('/register-prosesuser', [LoginController::class, 'register_prosesuser'])->name('register-prosesuser');


// forgot dan reset password
Route::get('password/reset', [ForgotPasswordControllers::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordControllers::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [ResetPasswordControllers::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordControllers::class, 'reset'])->name('password.update');


//barang masuk
Route::get('/barang_masuk', [BarangMasukController::class, 'index'])->name('barang_masuk.index');
Route::get('/barang_masuk/create', [BarangMasukController::class, 'create'])->name('barang_masuk.create');
Route::post('/barang_masuk', [BarangMasukController::class, 'store'])->name('barang_masuk');


//barang keluar
Route::get('/barang_keluar', [BarangKeluarController::class, 'index'])->name('barang_keluar.index');
Route::get('/barang_keluar/create', [BarangKeluarController::class, 'create'])->name('barang_keluar.create');
Route::post('/barang_keluar', [BarangKeluarController::class, 'store'])->name('barang_keluar');


//produk
Route::get('products', [ProductController::class, 'index'])->name('products.index');
Route::get('products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('products', [ProductController::class, 'store'])->name('products.store');
Route::get('products/{id}', [ProductController::class, 'show'])->name('products.show');
Route::get('products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('products/{id}', [ProductController::class, 'update'])->name('products.update');
Route::delete('products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
Route::post('/products/{id}/purchase', [ProductController::class, 'purchase'])->name('purchase');


// kategori produk
Route::get('kategori_produk', [KategoriProdukController::class, 'index'])->name('kategori_produk.index');
Route::get('kategori_produk/create', [KategoriProdukController::class, 'create'])->name('kategori_produk.create');
Route::post('kategori_produk', [KategoriProdukController::class, 'store'])->name('kategori_produk.store');
Route::get('kategori_produk/{id}', [KategoriProdukController::class, 'show'])->name('kategori_produk.show');
Route::get('kategori_produk/{id}/edit', [KategoriProdukController::class, 'edit'])->name('kategori_produk.edit');
Route::put('kategori_produk/{id}', [KategoriProdukController::class, 'update'])->name('kategori_produk.update');
Route::delete('kategori_produk/{id}', [KategoriProdukController::class, 'destroy'])->name('kategori_produk.destroy');


// data pelanggan
Route::get('/data_pelanggan', [DataPelangganController::class, 'index'])->name('data_pelanggan.index');
Route::get('/data_pelanggan/create', [DataPelangganController::class, 'create'])->name('data_pelanggan.create');
Route::post('/data_pelanggan', [DataPelangganController::class, 'store'])->name('data_pelanggan.store');
Route::get('/data_pelanggan/{id}', [DataPelangganController::class, 'show'])->name('data_pelanggan.show');
Route::get('/data_pelanggan/{id}/edit', [DataPelangganController::class, 'edit'])->name('data_pelanggan.edit');
Route::put('/data_pelanggan/{id}', [DataPelangganController::class, 'update'])->name('data_pelanggan.update');
Route::delete('/data_pelanggan/{id}', [DataPelangganController::class, 'destroy'])->name('data_pelanggan.destroy');

// Keranjang
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
Route::get('/cart/remove/{productId}', [CartController::class, 'remove'])->name('cart.remove');


// Middleware untuk memastikan hanya user yang login bisa mengakses keranjang
Route::middleware(['auth'])->group(function () {
    Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
});


Route::middleware(['auth'])->group(function () {
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout/process', [CheckoutController::class, 'process'])->name('checkout.process');
});


Route::get('/pesanan-saya', [PesananController::class, 'index'])->name('pesanan.index');
Route::get('/api/order/status', [PesananController::class, 'getOrderStatus'])->name('order.status');
Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');


Route::put('/admin/update-status/{detailTransaksi}', [AdminController::class, 'updateStatus'])->name('admin.update_status');
Route::get('/data_pesanan', [AdminController::class, 'index'])->name('data_pesanan.index');
Route::get('/data_pesanan/{id}/edit', [AdminController::class, 'edit'])->name('data_pesanan.edit');
Route::put('/data_pesanan/{id}', [AdminController::class, 'update'])->name('data_pesanan.update');
Route::put('admin/update_tracking_number/{detailTransaksi}', [AdminController::class, 'updateTrackingNumber'])->name('admin.update_tracking_number');

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
