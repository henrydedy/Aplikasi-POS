<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="/{{ auth()->user()->level }}/dashboard">Toko Bulan Mart</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="/{{ auth()->user()->level }}/dashboard">TB</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="dropdown">
                <a href="/{{ auth()->user()->level }}/dashboard" class="nav-link"><i
                        class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            <li class="menu-header">Master Data</li>
            @if (auth()->user()->level == 'admin')
                <li class="dropdown">
                    <a href="/{{ auth()->user()->level }}/kategori" class="nav-link"><i
                            class="fas fa-list"></i><span>Kategori</span></a>
                </li>
                <li class="dropdown">
                    <a href="/{{ auth()->user()->level }}/satuan" class="nav-link"><i
                            class="fas fa-box"></i><span>Satuan</span></a>
                </li>
                <li class="dropdown">
                    <a href="/{{ auth()->user()->level }}/supplier" class="nav-link"><i
                            class="fas fa-truck"></i><span>Supplier</span></a>
                </li>
                <li class="dropdown">
                    <a href="/{{ auth()->user()->level }}/barang" class="nav-link"><i
                            class="fas fa-boxes"></i><span>Barang</span></a>
                </li>
                {{-- <li class="dropdown">
                    <a href="/{{ auth()->user()->level }}/tambahbarang" class="nav-link"><i
                            class="fas fa-plus"></i><span>Tambah Barang</span></a>
                </li> --}}
            @endif
            @if (auth()->user()->level == 'kasir')
                <li class="dropdown">
                    <a href="/{{ auth()->user()->level }}/penjualan" class="nav-link"><i
                            class="fas fa-shopping-cart"></i><span>Transaksi</span></a>
                </li>
            @endif
            @if (auth()->user()->level == 'admin')
                <li class="menu-header">Menu</li>
                <li class="dropdown">
                    <a href="/{{ auth()->user()->level }}/laporan" class="nav-link"><i
                            class="fas fa-file"></i><span>Laporan</span></a>
                </li>
                <li class="dropdown">
                    <a href="/{{ auth()->user()->level }}/user" class="nav-link"><i
                            class="fas fa-users"></i><span>Users</span></a>
                </li>
                <li class="dropdown">
                    <a href="/{{ auth()->user()->level }}/penjualan" class="nav-link"><i
                            class="fas fa-shopping-cart"></i><span>Transaksi</span></a>
                </li>
            @endif
        </ul>
    </aside>
</div>
