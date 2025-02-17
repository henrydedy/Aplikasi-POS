<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\SatuanController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\TransaksiSementaraController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TambahBarangController;
use Illuminate\Auth\Events\PasswordReset;
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
    return view('auth.login');
});




// bagian lupa pas
Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->middleware('guest')->name('password.request');

Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);

    $status = Password::sendResetLink(
        $request->only('email')
    );

    return $status === Password::RESET_LINK_SENT
        ? back()->with(['status' => __($status)])
        : back()->withErrors(['email' => __($status)]);
})->middleware('guest')->name('password.email');

Route::get('/reset-password/{token}', function (string $token) {
    return view('auth.reset-password', ['token' => $token]);
})->middleware('guest')->name('password.reset');


Route::post('/reset-password', function (Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:5|confirmed',
    ]);

    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function ($user, $password) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->setRememberToken(Str::random(60));

            $user->save();

            event(new PasswordReset($user));
        }
    );

    return $status === Password::PASSWORD_RESET
        ? redirect()->route('login')->with('status', __($status))
        : back()->withErrors(['email' => [($status)]]);
})->middleware('guest')->name('password.update');
// end bagian lupa pass





Route::get('/daftar', [AuthController::class, 'index']);
Route::post('/user/daftar', [AuthController::class, 'store'])->name('store');


Route::post('/postlogin', [AuthController::class, 'postlogin']);
Route::get('/logout', [AuthController::class, 'logout']);
Route::get('/login', function () {
    return Auth::check() ? redirect('/dashboard') : view('auth.login');
})->middleware('guest')->name('login');

Route::get('/forgot/password', [AuthController::class, 'forgotPw']);

Route::group(['middleware' => ['auth', 'ceklevel:admin']], function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index']);
    Route::get('/admin/dashboard/kalkulator', [DashboardController::class, 'kalkulator'])->name('kalkulator');

    Route::get('/admin/kategori', [KategoriController::class, 'index']);
    Route::post('/admin/kategori/store', [KategoriController::class, 'store']);
    Route::get('/admin/kategori/{id}/edit', [KategoriController::class, 'edit']);
    Route::put('/admin/kategori/{id}', [KategoriController::class, 'update']);
    Route::get('/admin/kategori/{id}', [KategoriController::class, 'destroy']);

    Route::get('/admin/satuan', [SatuanController::class, 'index']);
    Route::post('/admin/satuan/store', [SatuanController::class, 'store']);
    Route::get('/admin/satuan/{id}/edit', [SatuanController::class, 'edit']);
    Route::put('/admin/satuan/{id}', [SatuanController::class, 'update']);
    Route::get('/admin/satuan/{id}', [SatuanController::class, 'destroy']);

    Route::get('/admin/supplier', [SupplierController::class, 'index']);
    Route::post('/admin/supplier/store', [SupplierController::class, 'store']);
    Route::get('/admin/supplier/{id}/edit', [SupplierController::class, 'edit']);
    Route::put('/admin/supplier/{id}', [SupplierController::class, 'update']);
    Route::get('/admin/supplier/{id}', [SupplierController::class, 'destroy']);

    Route::get('/admin/barang', [BarangController::class, 'index']);
    Route::post('/admin/barang/store', [BarangController::class, 'store']);
    Route::get('/admin/barang/{id}/edit', [BarangController::class, 'edit']);
    Route::get('/admin/barang/{id}/show', [BarangController::class, 'show']);
    Route::put('/admin/barang/{id}', [BarangController::class, 'update']);
    Route::get('/admin/barang/{id}', [BarangController::class, 'destroy']);

    Route::get('/admin/laporan', [TransaksiController::class, 'index'])->name('transaksi.index');
    Route::get('/admin/laporan/cari', [TransaksiController::class, 'cari']);


    Route::get('/admin/laporan/{dari}/{sampai}/print', [TransaksiController::class, 'printTanggal']);
    Route::get('/admin/laporan/{kodeTransaksi}/print', [TransaksiController::class, 'print']);
    Route::get('/admin/laporan/{kodeTransaksi}', [TransaksiController::class, 'show']);
    Route::delete('/admin/laporan/{kodeTransaksi}', [TransaksiController::class, 'destroy'])->name('transaksi.destroy');

    Route::get('/admin/user', [UserController::class, 'index']);
    Route::post('/admin/user/store', [UserController::class, 'store']);
    Route::get('/admin/user/{id}/edit', [UserController::class, 'edit']);
    Route::put('/admin/user/{id}', [UserController::class, 'update']);
    Route::get('/admin/user/{id}', [UserController::class, 'destroy']);
    Route::get('/admin/profile/{id}', [ProfileController::class, 'edit']);
    Route::put('/admin/profile/{id}', [ProfileController::class, 'update']);


    // Rute untuk penjualan
    Route::get('/admin/penjualan', [TransaksiSementaraController::class, 'index']);
    Route::post('/admin/penjualan/store', [TransaksiSementaraController::class, 'store']);
    Route::post('/admin/penjualan/bayar/{kodeTransaksi}', [TransaksiSementaraController::class, 'bayar']);
    Route::get('/admin/penjualan/{id}', [TransaksiSementaraController::class, 'destroy']);
    Route::get('/admin/penjualan/hapus/semua', [TransaksiSementaraController::class, 'hapusSemua']);
    Route::get('/admin/laporan/{kodeTransaksi}/print', [TransaksiController::class, 'print']);
    //coba
    Route::get('/admin/barang/search', 'BarangController@search')->name('barang.search');

    Route::put('/admin/transaksi-sementara/{id}/{barang_id}/edit', [TransaksiSementaraController::class, 'update']);
});

Route::group(['middleware' => ['auth', 'ceklevel:admin,kasir']], function () {
    Route::get('/kasir/dashboard', [DashboardController::class, 'index']);
    Route::get('/kasir/dashboard/kalkulator', [DashboardController::class, 'kalkulator'])->name('kalkulator');

    Route::get('/kasir/penjualan', [TransaksiSementaraController::class, 'index']);
    Route::post('/kasir/penjualan/store', [TransaksiSementaraController::class, 'store']);
    Route::post('/kasir/penjualan/bayar/{kodeTransaksi}', [TransaksiSementaraController::class, 'bayar']);
    Route::get('/kasir/penjualan/{id}', [TransaksiSementaraController::class, 'destroy']);
    Route::get('/kasir/penjualan/hapus/semua', [TransaksiSementaraController::class, 'hapusSemua']);
    Route::get('/kasir/laporan/{kodeTransaksi}/print', [TransaksiController::class, 'print']);

    Route::put('/kasir/transaksi-sementara/{id}/{barang_id}/edit', [TransaksiSementaraController::class, 'update']);
    Route::get('/kasir/profile/{id}', [ProfileController::class, 'edit']);
    Route::put('/kasir/profile/{id}', [ProfileController::class, 'update']);

    Route::get('/kasir/laporan', [TransaksiController::class, 'index'])->name('transaksi.index');
    Route::get('/kasir/laporan/cari', [TransaksiController::class, 'cari']);


    Route::get('/kasir/laporan/{dari}/{sampai}/print', [TransaksiController::class, 'printTanggal']);
    Route::get('/kasir/laporan/{kodeTransaksi}/print', [TransaksiController::class, 'print']);
    Route::get('/kasir/laporan/{kodeTransaksi}', [TransaksiController::class, 'show']);
});




Route::group(['middleware' => ['auth', 'ceklevel:admin,owner']], function () {
    Route::get('/owner/dashboard', [DashboardController::class, 'index']);
    Route::get('/owner/dashboard/kalkulator', [DashboardController::class, 'kalkulator'])->name('kalkulator');

    Route::get('/owner/user', [UserController::class, 'index']);
    Route::post('/owner/user/store', [UserController::class, 'store']);
    Route::get('/owner/user/{id}/edit', [UserController::class, 'edit']);
    Route::put('/owner/user/{id}', [UserController::class, 'update']);
    Route::get('/owner/user/{id}', [UserController::class, 'destroy']);
    Route::get('/owner/profile/{id}', [ProfileController::class, 'edit']);
    Route::put('/owner/profile/{id}', [ProfileController::class, 'update']);


    Route::get('/owner/laporan', [TransaksiController::class, 'index'])->name('transaksi.index');
    Route::get('/owner/laporan/cari', [TransaksiController::class, 'cari']);


    Route::get('/owner/laporan/{dari}/{sampai}/print', [TransaksiController::class, 'printTanggal']);
    Route::get('/owner/laporan/{kodeTransaksi}/print', [TransaksiController::class, 'print']);
    Route::get('/owner/laporan/{kodeTransaksi}', [TransaksiController::class, 'show']);
    Route::delete('/owner/laporan/{kodeTransaksi}', [TransaksiController::class, 'destroy'])->name('transaksi.destroy');

    Route::get('/owner/penjualan', [TransaksiSementaraController::class, 'index']);
    Route::post('/owner/penjualan/store', [TransaksiSementaraController::class, 'store']);
    Route::post('/owner/penjualan/bayar/{kodeTransaksi}', [TransaksiSementaraController::class, 'bayar']);
    Route::get('/owner/penjualan/{id}', [TransaksiSementaraController::class, 'destroy']);
    Route::get('/owner/penjualan/hapus/semua', [TransaksiSementaraController::class, 'hapusSemua']);
    Route::get('/owner/laporan/{kodeTransaksi}/print', [TransaksiController::class, 'print']);
});
