<nav class="sidebar-menu p-4 ">
    <ul class="space-y-1">
        <!-- Dashboard -->
        <li>
            <a href="{{ route('dashboard') }}" class="nav-link flex items-center p-3 rounded-lg transition-colors {{ request()->routeIs('dashboard') ? 'bg-blue-50 text-blue-600' : 'text-gray-500 hover:bg-gray-50 hover:text-black' }}">
                <i class="fas fa-home mr-3 w-5 text-center"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <!-- Profile -->
        <li>
            <a href="{{ route('profile.show') }}" class="nav-link flex items-center p-3 rounded-lg transition-colors {{ request()->routeIs('profile.show') ? 'bg-blue-50 text-blue-600' : 'text-gray-500 hover:bg-gray-50 hover:text-black' }}">
                <i class="fas fa-user mr-3 w-5 text-center"></i>
                <span>Profil</span>
            </a>
        </li>

        <!-- Rekap -->
        <li>
            <a href="{{ route('rekap') }}" class="nav-link flex items-center p-3 rounded-lg transition-colors {{ request()->routeIs('rekap') ? 'bg-blue-50 text-blue-600' : 'text-gray-500 hover:bg-gray-50 hover:text-black' }}">
                <i class="fas fa-chart-bar mr-3 w-5 text-center"></i>
                <span>Rekap Akademik</span>
            </a>
        </li>

        <!-- Student Services Section -->
        @if(Auth::user()->role == 'user')
        <li class="mt-6 mb-2 px-3 text-xs font-semibold text-gray-400 uppercase tracking-wider">Layanan Mahasiswa</li>

        <!-- Pengaduan -->
        <li>
            <a href="{{ route('pengaduan') }}" class="nav-link flex items-center p-3 rounded-lg transition-colors {{ request()->routeIs('pengaduan') ? 'bg-blue-50 text-blue-600' : 'text-gray-500 hover:bg-gray-50 hover:text-black' }}">
                <i class="fas fa-exclamation-circle mr-3 w-5 text-center"></i>
                <span>Pengaduan</span>
            </a>
        </li>

        <!-- Aspirasi -->
        <li>
            <a href="{{ route('rumah-aspirasi.create') }}" class="nav-link flex items-center p-3 rounded-lg transition-colors {{ request()->routeIs('rumah-aspirasi.create') ? 'bg-blue-50 text-blue-600' : 'text-gray-500 hover:bg-gray-50 hover:text-black' }}">
                <i class="fas fa-comment-dots mr-3 w-5 text-center"></i>
                <span>Aspirasi</span>
            </a>
        </li>

        <!-- Domisili -->
        <li>
            <a href="{{ route('domisili.index') }}" class="nav-link flex items-center p-3 rounded-lg transition-colors {{ request()->routeIs('domisili.index') ? 'bg-blue-50 text-blue-600' : 'text-gray-500 hover:bg-gray-50 hover:text-black' }}">
                <i class="fas fa-home mr-3 w-5 text-center"></i>
                <span>Domisili</span>
            </a>
        </li>

        <!-- SKTM -->
        <li>
            <a href="{{ route('sktm.create') }}" class="nav-link flex items-center p-3 rounded-lg transition-colors {{ request()->routeIs('sktm.create') ? 'bg-blue-50 text-blue-600' : 'text-gray-500 hover:bg-gray-50 hover:text-black' }}">
                <i class="fas fa-file-alt mr-3 w-5 text-center"></i>
                <span>SKTM</span>
            </a>
        </li>

        <!-- Organisasi -->
        <li>
            <a href="{{ route('user-organisasi.create', ['user_id' => Auth::user()->id]) }}" class="nav-link flex items-center p-3 rounded-lg transition-colors {{ request()->routeIs('user-organisasi.create') ? 'bg-blue-50 text-blue-600' : 'text-gray-500 hover:bg-gray-50 hover:text-black' }}">
                <i class="fas fa-users mr-3 w-5 text-center"></i>
                <span>Keaktifan Organisasi</span>
            </a>
        </li>
        @endif

        <!-- Admin Services Section -->
        @if(Auth::user()->role == 'admin' || Auth::user()->role == 'super_admin')
        <li class="mt-6 mb-2 px-3 text-xs font-semibold text-gray-400 uppercase tracking-wider">Layanan Admin</li>

        <!-- Manajemen Pengaduan -->
        <li>
            <a href="{{ route('pengaduan.index') }}" class="nav-link flex items-center p-3 rounded-lg transition-colors {{ request()->routeIs('pengaduan.index') ? 'bg-blue-50 text-blue-600' : 'text-gray-500 hover:bg-gray-50 hover:text-black' }}">
                <i class="fas fa-tasks mr-3 w-5 text-center"></i>
                <span>Manajemen Pengaduan</span>
            </a>
        </li>

        <!-- Data IPK -->
        <li>
            <a href="{{ route('Rekap.index') }}" class="nav-link flex items-center p-3 rounded-lg transition-colors {{ request()->routeIs('Rekap.index') ? 'bg-blue-50 text-blue-600' : 'text-gray-500 hover:bg-gray-50 hover:text-black' }}">
                <i class="fas fa-chart-line mr-3 w-5 text-center"></i>
                <span>Data IPK</span>
            </a>
        </li>

        <!-- Manajemen Mahasiswa -->
        <li>
            <a href="{{ route('mahasiswa.index') }}" class="nav-link flex items-center p-3 rounded-lg transition-colors {{ request()->routeIs('mahasiswa.index') ? 'bg-blue-50 text-blue-600' : 'text-gray-500 hover:bg-gray-50 hover:text-black' }}">
                <i class="fas fa-user-graduate mr-3 w-5 text-center"></i>
                <span>Manajemen Mahasiswa</span>
            </a>
        </li>

        <!-- Manajemen Link -->
        <li>
            <a href="{{ route('redirect-links.index') }}" class="nav-link flex items-center p-3 rounded-lg transition-colors {{ request()->routeIs('redirect-links.index') ? 'bg-blue-50 text-blue-600' : 'text-gray-500 hover:bg-gray-50 hover:text-black' }}">
                <i class="fas fa-link mr-3 w-5 text-center"></i>
                <span>Manajemen Link</span>
            </a>
        </li>

        <!-- Manajemen SKTM -->
        <li>
            <a href="{{ route('admin.sktm.index') }}" class="nav-link flex items-center p-3 rounded-lg transition-colors {{ request()->routeIs('admin.sktm.index') ? 'bg-blue-50 text-blue-600' : 'text-gray-500 hover:bg-gray-50 hover:text-black' }}">
                <i class="fas fa-file-contract mr-3 w-5 text-center"></i>
                <span>Manajemen SKTM</span>
            </a>
        </li>

        <!-- Manajemen Domisili -->
        <li>
            <a href="{{ route('admin.domisili.index') }}" class="nav-link flex items-center p-3 rounded-lg transition-colors {{ request()->routeIs('admin.domisili.index') ? 'bg-blue-50 text-blue-600' : 'text-gray-500 hover:bg-gray-50 hover:text-black' }}">
                <i class="fas fa-map-marker-alt mr-3 w-5 text-center"></i>
                <span>Manajemen Domisili</span>
            </a>
        </li>

        <!-- Manajemen Organisasi -->
        <li>
            <a href="{{ route('organisasi.index') }}" class="nav-link flex items-center p-3 rounded-lg transition-colors {{ request()->routeIs('organisasi.index') ? 'bg-blue-50 text-blue-600' : 'text-gray-500 hover:bg-gray-50 hover:text-black' }}">
                <i class="fas fa-sitemap mr-3 w-5 text-center"></i>
                <span>Manajemen Organisasi</span>
            </a>
        </li>

        <!-- Rekap Organisasi -->
        <li>
            <a href="{{ route('user-organisasi.index') }}" class="nav-link flex items-center p-3 rounded-lg transition-colors {{ request()->routeIs('user-organisasi.index') ? 'bg-blue-50 text-blue-600' : 'text-gray-500 hover:bg-gray-50 hover:text-black' }}">
                <i class="fas fa-clipboard-list mr-3 w-5 text-center"></i>
                <span>Rekap Organisasi</span>
            </a>
        </li>

        <!-- User Management (Super Admin only) -->
        @if(Auth::user()->role == 'super_admin')
        <li>
            <a href="{{ route('users.index') }}" class="nav-link flex items-center p-3 rounded-lg transition-colors {{ request()->routeIs('users.index') ? 'bg-blue-50 text-blue-600' : 'text-gray-500 hover:bg-gray-50 hover:text-black' }}">
                <i class="fas fa-users-cog mr-3 w-5 text-center"></i>
                <span>User Management</span>
            </a>
        </li>
        @endif
        @endif

        <!-- KOMINFO Services Section -->
        @if(Auth::user()->role == 'KOMINFO' || Auth::user()->role == 'admin' || Auth::user()->role == 'super_admin')
        <li class="mt-6 mb-2 px-3 text-xs font-semibold text-gray-400 uppercase tracking-wider">Layanan KOMINFO</li>

        <!-- Manajemen Aspirasi -->
        <li>
            <a href="{{ route('aspirasi.index') }}" class="nav-link flex items-center p-3 rounded-lg transition-colors {{ request()->routeIs('aspirasi.index') ? 'bg-blue-50 text-blue-600' : 'text-gray-500 hover:bg-gray-50 hover:text-black' }}">
                <i class="fas fa-comments mr-3 w-5 text-center"></i>
                <span>Manajemen Aspirasi</span>
            </a>
        </li>

        <!-- Manajemen Artikel -->
        <li>
            <a href="{{ route('article.main') }}" class="nav-link flex items-center p-3 rounded-lg transition-colors {{ request()->routeIs('article.main') ? 'bg-blue-50 text-blue-600' : 'text-gray-500 hover:bg-gray-50 hover:text-black' }}">
                <i class="fas fa-newspaper mr-3 w-5 text-center"></i>
                <span>Manajemen Artikel</span>
            </a>
        </li>

        <!-- Manajemen Acara -->
        <li>
            <a href="{{ route('acara.index') }}" class="nav-link flex items-center p-3 rounded-lg transition-colors {{ request()->routeIs('acara.index') ? 'bg-blue-50 text-blue-600' : 'text-gray-500 hover:bg-gray-50 hover:text-black' }}">
                <i class="fas fa-calendar-alt mr-3 w-5 text-center"></i>
                <span>Manajemen Acara</span>
            </a>
        </li>

        <!-- Manajemen Kepengurusan -->
        <li>
            <a href="{{ route('pengurus.index') }}" class="nav-link flex items-center p-3 rounded-lg transition-colors {{ request()->routeIs('pengurus.index') ? 'bg-blue-50 text-blue-600' : 'text-gray-500 hover:bg-gray-50 hover:text-black' }}">
                <i class="fas fa-user-tie mr-3 w-5 text-center"></i>
                <span>Manajemen Kepengurusan</span>
            </a>
        </li>

        <!-- Manajemen Periode -->
        <li>
            <a href="{{ route('periode.index') }}" class="nav-link flex items-center p-3 rounded-lg transition-colors {{ request()->routeIs('periode.index') ? 'bg-blue-50 text-blue-600' : 'text-gray-500 hover:bg-gray-50 hover:text-black' }}">
                <i class="fas fa-clock mr-3 w-5 text-center"></i>
                <span>Manajemen Periode</span>
            </a>
        </li>
        @endif
    </ul>

    <!-- Bottom Section -->
    <div class="mt-8 pt-4 border-t border-gray-100">
        <ul class="space-y-1">
            <!-- Settings -->
            <li>
                <a href="{{ route('profile.edit',Auth::user()->id) }}" class="nav-link flex items-center p-3 rounded-lg transition-colors {{ request()->routeIs('profile.edit') ? 'bg-blue-50 text-blue-600' : 'text-gray-500 hover:bg-gray-50 hover:text-black' }}">
                    <i class="fas fa-cog mr-3 w-5 text-center"></i>
                    <span>Pengaturan</span>
                </a>
            </li>

            <!-- Logout -->
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" class="nav-link flex items-center p-3 rounded-lg transition-colors text-gray-500 hover:bg-gray-50 hover:text-black">
                        <i class="fas fa-sign-out-alt mr-3 w-5 text-center"></i>
                        <span>Keluar</span>
                    </a>
                </form>
            </li>
        </ul>
    </div>
</nav>
