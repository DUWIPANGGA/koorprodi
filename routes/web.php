<?php

use App\Http\Controllers\IPK;
use App\Http\Controllers\Article;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PkmController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AcaraController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ReviewerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\PkmProcessController;
use App\Http\Controllers\aspirasiController;

/*
|--------------------------------------------------------------------------
| Route buat guest (Home, About Us, Rumah Aspirasi)
|--------------------------------------------------------------------------
*/

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/rumahaspirasi', [aspirasiController::class, 'index'])->name('rumahaspirasi');

Route::post('/rumahaspirasi', [aspirasiController::class, 'kirim'])->name('rumahaspirasi.kirim');

Route::get('/about', function () {
    return view('about');
})->name('about');


/*
|--------------------------------------------------------------------------
| Route untuk Halaman Utama
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('index');
});

// Form Login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
// Proses Login
Route::post('/login', [LoginController::class, 'login']);

// Form Registrasi
Route::get('/registrasi', [AuthController::class, 'showRegistrationForm'])->name('registrasi');
// Proses Registrasi
Route::post('/registrasi', [AuthController::class, 'store']);

/*
|--------------------------------------------------------------------------
| Route untuk Dashboard (Setelah Login)
|--------------------------------------------------------------------------
*/
Route::get('/try', function () {
    return view('Tentang');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/rekap', [IPK::class, 'main'])->name('rekap');
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/ajukan-pengaduan', [PengaduanController::class, 'create'])->name('pengaduan');
    Route::get('admin/article/{id}', [Article::class, 'show'])->name('article.show');
    Route::get('/user-edit', [UserController::class, 'edit'])->name('profile.edit');
    Route::put('/user-edit/{id}', [UserController::class, 'update'])->name('profile.update');
    Route::get('/edit-profile/{id}', [UserController::class, 'edit'])->name('profile.edit');
    
    
    
    
});
Route::middleware(['auth','admin'])->group(function () {
    Route::resource('users', UserController::class);
    Route::resource('pengaduan', PengaduanController::class);
    Route::get('/admin-rekap', [IPK::class, 'index'])->name('rekap.index');
    Route::put('/admin-rekap-validated/{id}', [IPK::class, 'validasi'])->name('rekap.validasi');
    Route::get('/dashboard/admin', [UserController::class, 'index'])->name('admin.dashboard');
    Route::resource('acara', AcaraController::class);
    Route::get('import-data', [UserController::class, 'import']);
    Route::post('import-csv', [UserController::class, 'importCSV'])->name('import.csv');
    Route::resource('Rekap', IPK::class);
    Route::get('admin/dashboard', [Article::class, 'main'])->name('article.main');
    Route::post('admin/article/new', [Article::class, 'create'])->name('article.create');
    Route::get('admin/article/new', [Article::class, 'create'])->name('article.create');
    Route::delete('admin/article/{id}', [Article::class, 'destroy'])->name('article.destroy');
    Route::put('admin/article/{id}', [Article::class, 'update'])->name('article.update');
    Route::post('admin/article/save', [Article::class, 'store'])->name('article.insert');
    Route::get('article/{id}', [Article::class, 'showDetail'])->name('article.show.detail');
});


Route::get('/logout', function () {
    return redirect('/login');
})->name('logout');
