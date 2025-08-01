<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['web', 'auth'])->get('/search-menu', function (Request $request) {
    $query = strtolower($request->input('query'));
    $user = Auth::user();
    $results = [];
if (!$user) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

    // Menu dasar untuk semua user
    $baseMenus = [
        [
            'id' => 1,
            'name' => 'Dashboard',
            'route' => route('dashboard'),
            'type' => 'menu',
            'icon' => 'M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z'
        ],
        [
            'id' => 2,
            'name' => 'Profil',
            'route' => route('profile.show'),
            'type' => 'menu',
            'icon' => 'M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z'
        ],
        [
            'id' => 3,
            'name' => 'Rekap Akademik',
            'route' => route('rekap'),
            'type' => 'menu',
            'icon' => 'M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z'
        ]
    ];

    // Menu untuk user biasa
    $userMenus = [
        [
            'id' => 4,
            'name' => 'Pengaduan',
            'route' => route('pengaduan'),
            'type' => 'page',
            'icon' => 'M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z'
        ],
        [
            'id' => 5,
            'name' => 'Aspirasi',
            'route' => route('rumah-aspirasi.create'),
            'type' => 'page',
            'icon' => 'M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z'
        ],
        [
            'id' => 6,
            'name' => 'Domisili',
            'route' => route('domisili.index'),
            'type' => 'page',
            'icon' => 'M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0zM15 11a3 3 0 11-6 0 3 3 0 016 0z'
        ],
        [
            'id' => 7,
            'name' => 'SKTM',
            'route' => route('sktm.create'),
            'type' => 'page',
            'icon' => 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z'
        ],
        [
            'id' => 8,
            'name' => 'Keaktifan Organisasi',
            'route' => route('user-organisasi.create', ['user_id' => $user->id]),
            'type' => 'page',
            'icon' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z'
        ]
    ];

    // Menu untuk admin
    $adminMenus = [
        [
            'id' => 9,
            'name' => 'Manajemen Pengaduan',
            'route' => route('pengaduan.index'),
            'type' => 'admin',
            'icon' => 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01'
        ],
        [
            'id' => 10,
            'name' => 'Data IPK',
            'route' => route('Rekap.index'),
            'type' => 'admin',
            'icon' => 'M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z'
        ],
        [
            'id' => 11,
            'name' => 'Manajemen Mahasiswa',
            'route' => route('mahasiswa.index'),
            'type' => 'admin',
            'icon' => 'M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z'
        ],
        [
            'id' => 12,
            'name' => 'Manajemen Link',
            'route' => route('redirect-links.index'),
            'type' => 'admin',
            'icon' => 'M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1'
        ],
        [
            'id' => 13,
            'name' => 'Manajemen SKTM',
            'route' => route('admin.sktm.index'),
            'type' => 'admin',
            'icon' => 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z'
        ],
        [
            'id' => 14,
            'name' => 'Manajemen Domisili',
            'route' => route('admin.domisili.index'),
            'type' => 'admin',
            'icon' => 'M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0zM15 11a3 3 0 11-6 0 3 3 0 016 0z'
        ],
        [
            'id' => 15,
            'name' => 'Manajemen Organisasi',
            'route' => route('organisasi.index'),
            'type' => 'admin',
            'icon' => 'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4'
        ],
        [
            'id' => 16,
            'name' => 'Rekap Organisasi',
            'route' => route('user-organisasi.index'),
            'type' => 'admin',
            'icon' => 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01'
        ]
    ];

    // Menu untuk super admin
    $superAdminMenus = [
        [
            'id' => 17,
            'name' => 'User Management',
            'route' => route('users.index'),
            'type' => 'super_admin',
            'icon' => 'M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z'
        ]
    ];

    // Menu untuk KOMINFO
    $kominfoMenus = [
        [
            'id' => 18,
            'name' => 'Manajemen Aspirasi',
            'route' => route('aspirasi.index'),
            'type' => 'kominfo',
            'icon' => 'M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z'
        ],
        [
            'id' => 19,
            'name' => 'Manajemen Artikel',
            'route' => route('article.main'),
            'type' => 'kominfo',
            'icon' => 'M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z'
        ],
        [
            'id' => 20,
            'name' => 'Manajemen Acara',
            'route' => route('acara.index'),
            'type' => 'kominfo',
            'icon' => 'M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z'
        ],
        [
            'id' => 21,
            'name' => 'Manajemen Kepengurusan',
            'route' => route('pengurus.index'),
            'type' => 'kominfo',
            'icon' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z'
        ],
        [
            'id' => 22,
            'name' => 'Manajemen Periode',
            'route' => route('periode.index'),
            'type' => 'kominfo',
            'icon' => 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z'
        ]
    ];

    // Menu pengaturan dan logout
    $settingsMenus = [
        [
            'id' => 23,
            'name' => 'Pengaturan',
            'route' => route('profile.edit', $user->id),
            'type' => 'settings',
            'icon' => 'M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065zM15 12a3 3 0 11-6 0 3 3 0 016 0z'
        ],
        [
            'id' => 24,
            'name' => 'Keluar',
            'route' => route('logout'),
            'type' => 'settings',
            'icon' => 'M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1'
        ]
    ];

    // Gabungkan semua menu berdasarkan role user
    $allMenus = array_merge($baseMenus, $settingsMenus);

    if ($user->role === 'user') {
        $allMenus = array_merge($allMenus, $userMenus);
    }

    if ($user->role === 'admin' || $user->role === 'super_admin') {
        $allMenus = array_merge($allMenus, $adminMenus);
    }

    if ($user->role === 'super_admin') {
        $allMenus = array_merge($allMenus, $superAdminMenus);
    }

    if ($user->role === 'KOMINFO' || $user->role === 'admin' || $user->role === 'super_admin') {
        $allMenus = array_merge($allMenus, $kominfoMenus);
    }

    // Filter berdasarkan query pencarian
    if (!empty($query)) {
        $filteredMenus = array_filter($allMenus, function ($menu) use ($query) {
            return str_contains(strtolower($menu['name']), $query);
        });
        
        // Re-index array
        return array_values($filteredMenus);
    }

    return [];
})->name('api.search-menu');