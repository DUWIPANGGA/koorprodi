<?php

use App\Http\Controllers\IPK;
use App\Http\Controllers\Article;
use Illuminate\Auth\Events\Login;
use App\Http\Controllers\mahasiswa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PkmController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SktmController;
use App\Http\Controllers\UserController;
use App\Models\article as ModelsArticle;
use App\Http\Controllers\AcaraController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\aspirasiController;
use App\Http\Controllers\DomisiliController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\Admin\RekapController;
use App\Http\Controllers\RedirectLinkController;

Route::post('/', [aspirasiController::class, 'kirim'])->name('rumahaspirasi.kirim');
Route::resource('aspirasi', aspirasiController::class)->only(
    [
        'show', 'store'
    ]
)->names([
    'show' => 'aspirasi.show',
    'store' => 'aspirasi.store',
]);

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
Route::post('/login', [LoginController::class, 'login'])->name('login');


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

Route::middleware('auth')->group(function () {
    Route::prefix('user')->group(function () {
        Route::resource('pengaduan', PengaduanController::class)->only(['store'])->middleware('auth')->names([
            'store' => 'user.pengaduan.store',
        ]);;
        Route::resource('Rekap', IPK::class)->only(['store'])->names([
            'store' => 'user.Rekap.store',
        ]);
    });
});
/*
|--------------------------------------------------------------------------
| Route untuk user
|-------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {
    Route::get('/rekap', [IPK::class, 'main'])->name('rekap');
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/ajukan-pengaduan', [PengaduanController::class, 'create'])->name('pengaduan');
    Route::get('admin/article/{id}', [Article::class, 'show'])->name('article.show');
    Route::get('/edit-profile/{id}', [UserController::class, 'edit'])->name('profile.edit');
    Route::get('/user-edit/{id}', [UserController::class, 'user'])->name('user.edit');
    Route::get('/profile-edit', [UserController::class, 'edit'])->name('profile.edit');
    Route::put('/user-edit/{id}', [UserController::class, 'update'])->name('profile.update');
    Route::resource('domisili', DomisiliController::class)
        ->middleware(['auth']);
// Student routes
Route::resource('sktm', SktmController::class)
    ->middleware(['auth']);
    

// Admin routes
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/sktm', [SktmController::class, 'adminIndex'])->name('admin.sktm.index');
    Route::put('/sktm/{sktm}/approve', [SktmController::class, 'approve'])->name('admin.sktm.approve');
    Route::put('/sktm/{sktm}/reject', [SktmController::class, 'reject'])->name('admin.sktm.reject');
});

    Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
        Route::get('/domisili', [DomisiliController::class, 'adminIndex'])->name('admin.domisili.index');
        Route::put('/domisili/{domisili}/approve', [DomisiliController::class, 'approve'])->name('admin.domisili.approve');
        Route::put('/domisili/{domisili}/reject', [DomisiliController::class, 'reject'])->name('admin.domisili.reject');
        Route::get('/domisili', [DomisiliController::class, 'adminIndex'])->name('admin.domisili.index');
        Route::put('/domisili/{domisili}/approve', [DomisiliController::class, 'approve'])->name('admin.domisili.approve');
        Route::put('/domisili/{domisili}/reject', [DomisiliController::class, 'reject'])->name('admin.domisili.reject');
    });
});

/*
|--------------------------------------------------------------------------
| Route untuk admin, super admin, koorprodi
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/export-rekap', [IPK::class, 'export'])->name('export.KHS');

    Route::resource('Rekap', IPK::class);
    Route::resource('pengaduan', PengaduanController::class);
    Route::get('/registrasi', [AuthController::class, 'showRegistrationForm'])->name('registrasi');
    Route::post('/event-rekap', [EventController::class, 'rekapEvent'])->name('rekap.event');
    Route::post('/event-user/{id}', [EventController::class, 'rekapUser'])->name('rekap.user');
    Route::resource('users', UserController::class);
    Route::get('/admin-rekap', [IPK::class, 'index'])->name('rekap.index');
    Route::get('/data-mahasiswa', [Mahasiswa::class, 'index'])->name('mahasiswa.index');
    Route::put('/admin-rekap-validated/{id}', [IPK::class, 'validasi'])->name('rekap.validasi');
    Route::get('/dashboard/admin', [UserController::class, 'index'])->name('admin.dashboard');
    Route::get('import-data', [UserController::class, 'import']);
    Route::post('import-csv', [UserController::class, 'importCSV'])->name('import.csv');
});


/*
|--------------------------------------------------------------------------
| Route buat guest (Home, About Us, Rumah Aspirasi)
|--------------------------------------------------------------------------
*/

Route::get('/rumahaspirasi', [aspirasiController::class, 'udahkirim'])->name('rumahaspirasi');


Route::resource('acara', AcaraController::class);
Route::middleware(['auth', 'kominfo'])->group(function () {

    Route::get('article/create', [Article::class, 'create'])->name('article.create');
    Route::delete('/aspirasi/{id}', [aspirasiController::class, 'destroy'])->name('aspirasi.destroy');

    Route::get('admin/article', [Article::class, 'main'])->name('article.main');
    Route::delete('admin/article/{id}', [Article::class, 'destroy'])->name('article.destroy');
    Route::post('admin/article/new', [Article::class, 'store'])->name('article.store');
    Route::put('admin/article/{id}', [Article::class, 'update'])->name('article.update');
    Route::post('admin/article/save', [Article::class, 'store'])->name('article.insert');
    Route::get('article/{id}', [Article::class, 'showDetail'])->name('article.show.detail');
    Route::resource('aspirasi', aspirasiController::class);
});
Route::middleware('auth')->group(function () {
    Route::resource('redirect-links', RedirectLinkController::class)->except(['show'])->names([
        'index' => 'redirect-links.index',
        'create' => 'redirect-links.create',
        'store' => 'redirect-links.store',
        'edit' => 'redirect-links.edit',
        'update' => 'redirect-links.update',
        'destroy' => 'redirect-links.destroy',
    ]);
    Route::get('link/{redirectLink}', [RedirectLinkController::class, 'show'])
         ->name('redirect-links.show');
});
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/rekap-ipk', [RekapController::class, 'rekapIpk'])->name('admin.rekap.ipk');
    Route::post('/update-semester', [RekapController::class, 'updateSemesterMassal'])->name('admin.update.semester');
    Route::get('/export-rekap-ipk', [RekapController::class, 'exportRekapIpk'])->name('admin.export.ipk');
});
// Public route for redirecting
Route::get('/{shortUrl}', [RedirectLinkController::class, 'redirect'])
     ->where('shortUrl', '[A-Za-z0-9\-_]+')
     ->name('redirect');
/*
|--------------------------------------------------------------------------
| Route untuk logout
|--------------------------------------------------------------------------
*/
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');