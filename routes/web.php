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
use App\Models\article as ModelsArticle;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ReviewerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\PkmProcessController;
use App\Http\Controllers\aspirasiController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\mahasiswa;

Route::post('/', [aspirasiController::class, 'kirim'])->name('rumahaspirasi.kirim');


/*
|--------------------------------------------------------------------------
| Route untuk Halaman Utama
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    $recommendedArticles = ModelsArticle::latest()->take(8)->get();
    return view('index', compact('recommendedArticles'));
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
| Route untuk uji coba halaman
|--------------------------------------------------------------------------
*/
Route::get('/try', function () {
    return view('Tentang');
});

/*
|--------------------------------------------------------------------------
| Route untuk user
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {
    Route::get('/rekap', [IPK::class, 'main'])->name('rekap');
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/ajukan-pengaduan', [PengaduanController::class, 'create'])->name('pengaduan');
    Route::get('admin/article/{id}', [Article::class, 'show'])->name('article.show');
    Route::get('/user-edit', [UserController::class, 'edit'])->name('profile.edit');
    Route::put('/user-edit/{id}', [UserController::class, 'update'])->name('profile.update');
    Route::get('/edit-profile/{id}', [UserController::class, 'edit'])->name('profile.edit');
});

/*
|--------------------------------------------------------------------------
| Route untuk admin, super admin, koorprodi
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'admin'])->group(function () {
    Route::post('/event-rekap', [EventController::class, 'rekapEvent'])->name('rekap.event');
    Route::resource('users', UserController::class);
    Route::resource('pengaduan', PengaduanController::class);
    Route::get('/admin-rekap', [IPK::class, 'index'])->name('rekap.index');
    Route::get('/data-mahasiswa', [mahasiswa::class, 'index'])->name('mahasiswa.index');
    Route::put('/admin-rekap-validated/{id}', [IPK::class, 'validasi'])->name('rekap.validasi');
    Route::get('/dashboard/admin', [UserController::class, 'index'])->name('admin.dashboard');
    Route::get('import-data', [UserController::class, 'import']);
    Route::post('import-csv', [UserController::class, 'importCSV'])->name('import.csv');
    Route::resource('Rekap', IPK::class);
});


/*
|--------------------------------------------------------------------------
| Route buat guest (Home, About Us, Rumah Aspirasi)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'kominfo'])->group(function () {
    Route::get('index', [aspirasiController::class, 'udahkirim'])->name('rumahaspirasi');
    Route::resource('acara', AcaraController::class);
    Route::resource('aspirasi', aspirasiController::class);
    Route::delete('/aspirasi/{id}', [aspirasiController::class, 'destroy'])->name('aspirasi.destroy');
    Route::get('admin/article/create', [Article::class, 'create'])->name('article.create');
    
    Route::get('admin/article', [Article::class, 'main'])->name('article.main');
    Route::delete('admin/article/{id}', [Article::class, 'destroy'])->name('article.destroy');
    Route::post('admin/article/new', [Article::class, 'store'])->name('article.store');
    Route::put('admin/article/{id}', [Article::class, 'update'])->name('article.update');
    Route::post('admin/article/save', [Article::class, 'store'])->name('article.insert');
    Route::get('article/{id}', [Article::class, 'showDetail'])->name('article.show.detail');
});

/*
|--------------------------------------------------------------------------
| Route untuk logout
|--------------------------------------------------------------------------
*/
Route::get('/logout', function () {
    return redirect('/login');
})->name('logout');
