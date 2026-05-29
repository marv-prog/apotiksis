<div class="main-sidebar">
        <aside id="sidebar-wrapper">
         <div class="sidebar-brand">
            <a href="/admin/dashboard"><i class="fas fa-mortar-pestle"></i> APOTEK SIS</a>
        </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="{{ Request::is('admin/dashboard*') ? 'active' : '' }}">
                <a class="nav-link" href="/admin/dashboard">
                    <i class="fas fa-fire"></i> <span>Dashboard</span>
                </a>
            </li>

            <li class="menu-header">Manajemen</li>
            
            <!-- Menu Dropdown Utama -->
            <li class="nav-item dropdown {{ Request::is('admin/obat*', 'admin/kategori*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                    <i class="fas fa-pills"></i> <span>Data Obat</span>
                </a>
                <ul class="dropdown-menu">
                    <!-- Sub-menu 1: Daftar Obat -->
                    <li class="{{ Request::is('admin/obat*') ? 'active' : '' }}">
                        <a class="nav-link" href="/admin/obat">Daftar Stok Obat</a>
                    </li>
                    <!-- Sub-menu 2: Kategori -->
                    <li class="{{ Request::is('admin/kategori*') ? 'active' : '' }}">
                        <a class="nav-link" href="/admin/kategori">Kategori Obat</a>
                    </li>
                </ul>
            </li>
            <li class="{{ Request::routeIs('admin.user.*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.user.index') }}">
                    <i class="fas fa-users"></i> <span>Data User</span>
                </a>
            </li>
            <li class="menu-header">Laporan</li>
            <li class="{{ Request::is('admin/transaksi*') ? 'active' : '' }}">
                <a class="nav-link" href="#">
                    <i class="fas fa-file-invoice-dollar"></i> <span>Transaksi</span>
                </a>
            </li>
            <li class="nav-item mt-4">
                <form action="{{ route('logout') }}" method="POST" id="logout-form" style="display: none;">
                    @csrf
                </form>
                <a href="#" class="nav-link text-danger font-weight-bold" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="nav-icon fas fa-sign-out-alt mr-2"></i>
                    <span>Logout</span>
                </a>
            </li>
        </ul>
        </aside>
      </div>
