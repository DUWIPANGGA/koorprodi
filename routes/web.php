<?php

use App\Http\Controllers\IPK;
use App\Http\Controllers\Article;
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
use App\Http\Controllers\PeriodeController;
use App\Http\Controllers\aspirasiController;
use App\Http\Controllers\DomisiliController;
use App\Http\Controllers\PengurusController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\Admin\RekapController;
use App\Http\Controllers\RedirectLinkController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    $recommendedArticles = ModelsArticle::latest()->take(8)->get();
    return view('index', compact('recommendedArticles'));
});

Route::get('/try', function () {
    return view('Tentang');
});



// Authentication Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');

// Registration Routes
Route::get('/registrasi', [AuthController::class, 'showRegistrationForm'])->name('registrasi')
    ->middleware(['auth', 'admin']);
Route::post('/registrasi', [AuthController::class, 'store']);



/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    // Dashboard
    Route::get('/dashboard/admin', [UserController::class, 'index'])->name('admin.dashboard');

    // User Management
    Route::resource('users', UserController::class);
    Route::get('/data-mahasiswa', [Mahasiswa::class, 'index'])->name('mahasiswa.index');
    Route::get('import-data', [UserController::class, 'import']);
    Route::post('import-csv', [UserController::class, 'importCSV'])->name('import.csv');
Route::get('/domisili/export-csv', [DomisiliController::class, 'exportCSV'])->name('domisili.export.csv');    // Rekap Management
    Route::get('/admin-rekap', [IPK::class, 'index'])->name('rekap.index');
    Route::put('/admin-rekap-validated/{id}', [IPK::class, 'validasi'])->name('rekap.validasi');
    Route::get('/export-rekap', [IPK::class, 'export'])->name('export.KHS');
    Route::resource('Rekap', IPK::class)->except(['store']);
    Route::resource('pengaduan', PengaduanController::class);

    // Document Approvals
    Route::get('/domisili', [DomisiliController::class, 'adminIndex'])->name('admin.domisili.index');
    Route::put('/domisili/{domisili}/approve', [DomisiliController::class, 'approve'])->name('admin.domisili.approve');
    Route::put('/domisili/{domisili}/reject', [DomisiliController::class, 'reject'])->name('admin.domisili.reject');

    Route::get('/sktm', [SktmController::class, 'adminIndex'])->name('admin.sktm.index');
    Route::put('/sktm/{sktm}/approve', [SktmController::class, 'approve'])->name('admin.sktm.approve');
    Route::put('/sktm/{sktm}/reject', [SktmController::class, 'reject'])->name('admin.sktm.reject');

    // Rekap IPK Routes
    Route::get('/rekap-ipk', [RekapController::class, 'rekapIpk'])->name('admin.rekap.ipk');
    Route::post('/update-semester', [RekapController::class, 'updateSemesterMassal'])->name('admin.update.semester');
    Route::get('/export-rekap-ipk', [RekapController::class, 'exportRekapIpk'])->name('admin.export.ipk');
    Route::get('/users-export', [UserController::class, 'exportUsers'])->name('users.export');

    // Event Routes
    Route::post('/event-rekap', [EventController::class, 'rekapEvent'])->name('rekap.event');
    Route::post('/event-user/{id}', [EventController::class, 'rekapUser'])->name('rekap.user');
});

/*
|--------------------------------------------------------------------------
| Kominfo Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'kominfo'])->group(function () {
    // Article Management
    Route::get('article/create', [Article::class, 'create'])->name('article.create');
    Route::get('admin/article', [Article::class, 'main'])->name('article.main');
    Route::delete('admin/article/{id}', [Article::class, 'destroy'])->name('article.destroy');
    Route::post('admin/article/new', [Article::class, 'store'])->name('article.store');
    Route::put('admin/article/{id}', [Article::class, 'update'])->name('article.update');
    Route::post('admin/article/save', [Article::class, 'store'])->name('article.insert');

    // Aspirasi Management
    Route::resource('aspirasi', aspirasiController::class)->except(['create', 'store']);
    Route::delete('/aspirasi/{id}', [aspirasiController::class, 'destroy'])->name('aspirasi.destroy');
    Route::resource('periode', PeriodeController::class)->except(['show', 'edit', 'update']);
    Route::post('periode/{periode}/set-aktif', [PeriodeController::class, 'setAktif'])->name('periode.set-aktif');
    
    // Pengurus Routes dengan parameter periode
    Route::get('pengurus', [PengurusController::class, 'index'])->name('pengurus.index');
    Route::get('pengurus/create', [PengurusController::class, 'create'])->name('pengurus.create');
    Route::post('pengurus', [PengurusController::class, 'store'])->name('pengurus.store');
    Route::resource('pengurus', PengurusController::class)->except(['index', 'create', 'store']);
});

// Public View
Route::get('struktur-kepengurusan', [PengurusController::class, 'show'])->name('pengurus.public');
Route::get('struktur-kepengurusan/{periode}', [PengurusController::class, 'publicViewDetail'])->name('pengurus.public.detail');

/*
|--------------------------------------------------------------------------
| Event Routes
|--------------------------------------------------------------------------
*/
Route::resource('acara', AcaraController::class);
/*
|--------------------------------------------------------------------------
| Authenticated Routes (All Users)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    // Profile Routes
    Route::get('/edit-profile/{id}', [UserController::class, 'edit'])->name('profile.edit');
    Route::get('/user-edit/{id}', [UserController::class, 'user'])->name('user.edit');
    Route::put('/user-edit/{id}', [UserController::class, 'update'])->name('profile.update');

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    // Rekap Routes
    Route::get('/rekap', [IPK::class, 'main'])->name('rekap');
    Route::resource('Rekap', IPK::class)->only(['store'])->names([
        'store' => 'user.Rekap.store',
    ]);

    // Document Routes
    Route::resource('domisili', DomisiliController::class);
    Route::resource('sktm', SktmController::class);

    // Complaint Routes
    Route::get('/ajukan-pengaduan', [PengaduanController::class, 'create'])->name('pengaduan');
    Route::resource('pengaduan', PengaduanController::class)->only(['store', 'create'])->names([
        'store' => 'user.pengaduan.store',
        'create' => 'user.pengaduan.create',
    ]);

    // Article Routes
    Route::get('admin/article/{id}', [Article::class, 'show'])->name('article.show');
    Route::get('article/{id}', [Article::class, 'showDetail'])->name('article.show.detail');

    // Redirect Links
    Route::resource('redirect-links', RedirectLinkController::class)->except(['show']);
    Route::get('link/{redirectLink}', [RedirectLinkController::class, 'show'])
        ->name('redirect-links.show');
});
/*
|--------------------------------------------------------------------------
| Public Redirect Route
|--------------------------------------------------------------------------
*/
Route::get('/rumahaspirasi', [aspirasiController::class, 'udahkirim'])->name('rumahaspirasi');
Route::post('/', [aspirasiController::class, 'kirim'])->name('rumahaspirasi.kirim');
Route::resource('rumah-aspirasi', aspirasiController::class)->only(['create', 'store'])->names([
    'create' => 'rumah-aspirasi.create',
    'store' => 'rumah-aspirasi.store',
]);
Route::get('/{shortUrl}', [RedirectLinkController::class, 'redirect'])
    ->where('shortUrl', '[A-Za-z0-9\-_]+')
    ->name('redirect');
