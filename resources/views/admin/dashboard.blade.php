@php
    $assetBase = asset('assets/admin-dashboard');

    $navigation = $navigation ?? [
        ['label' => 'Dashboard', 'icon' => 'e1f64.svg', 'url' => '#', 'active' => true],
        ['label' => 'Peminjaman', 'icon' => 'd8501.svg', 'url' => '#'],
        ['label' => 'Pengembalian', 'icon' => 'af76a.svg', 'url' => '#'],
        ['label' => 'Data Barang', 'icon' => '8bb39.svg', 'url' => '#'],
        ['label' => 'Pengguna', 'icon' => '7b57c.svg', 'url' => '#'],
        ['label' => 'Laporan', 'icon' => 'd024b.svg', 'url' => '#'],
    ];

    $statistics = $statistics ?? [
        ['label' => 'Total Barang', 'value' => 120, 'icon' => 'b92f6.svg', 'tone' => 'green'],
        ['label' => 'Total Peminjaman', 'value' => 85, 'icon' => '09ad7.svg', 'tone' => 'teal'],
        ['label' => 'Total Pengembalian', 'value' => 78, 'icon' => '65ea3.svg', 'tone' => 'red'],
        ['label' => 'Pengguna', 'value' => 245, 'icon' => 'b90ee.svg', 'tone' => 'orange'],
    ];

    $activities = $activities ?? [
        ['title' => 'Peminjaman baru oleh Budi Santoso', 'time' => '2 jam yang lalu', 'icon' => '076eb.svg', 'tone' => 'orange'],
        ['title' => 'Pengembalian dari Siti Rahayu', 'time' => '3 jam yang lalu', 'icon' => 'd434d.svg', 'tone' => 'yellow'],
        ['title' => 'Peminjaman baru oleh Andi Pratama', 'time' => '5 jam yang lalu', 'icon' => '4174d.svg', 'tone' => 'blue'],
    ];
@endphp

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $pageTitle ?? 'Dashboard Admin' }} — Kemah.in</title>
    <link rel="stylesheet" href="{{ asset('css/admin-dashboard.css') }}">
</head>
<body>
    <div class="admin-shell" data-sidebar-open="false">
        <aside class="sidebar" id="admin-sidebar" aria-label="Navigasi admin">
            <a class="brand" href="#" aria-label="Kemah.in">
                <span class="brand-mark" aria-hidden="true">
                    <img src="{{ $assetBase }}/logo-kemahin.png" alt="">
                </span>
                <span>Kemah.in</span>
            </a>

            <nav class="sidebar-nav">
                @foreach ($navigation as $item)
                    <a
                        class="nav-item {{ ($item['active'] ?? false) ? 'is-active' : '' }}"
                        href="{{ $item['url'] }}"
                        @if ($item['active'] ?? false) aria-current="page" @endif
                    >
                        <img src="{{ $assetBase }}/{{ $item['icon'] }}" alt="" aria-hidden="true">
                        <span>{{ $item['label'] }}</span>
                    </a>
                @endforeach
            </nav>

            <form class="logout-form" method="POST" action="{{ $logoutUrl ?? '#' }}">
                @csrf
                <button class="nav-item logout-button" type="submit">
                    <img src="{{ $assetBase }}/30468.svg" alt="" aria-hidden="true">
                    <span>Keluar</span>
                </button>
            </form>
        </aside>

        <button class="sidebar-scrim" type="button" aria-label="Tutup navigasi" data-sidebar-close></button>

        <div class="page-column">
            <header class="topbar">
                <div class="topbar-start">
                    <button
                        class="menu-button"
                        type="button"
                        aria-controls="admin-sidebar"
                        aria-expanded="false"
                        aria-label="Buka navigasi"
                        data-sidebar-toggle
                    >
                        <img src="{{ $assetBase }}/ecd4d.svg" alt="">
                    </button>
                    <span class="panel-label">PANEL ADMIN</span>
                </div>

                <button class="profile-button" type="button" aria-label="Buka menu profil">
                    <span class="avatar" aria-hidden="true">
                        <img src="{{ $assetBase }}/avatar-admin.jpg" alt="">
                    </span>
                    <span>Halo, {{ $adminName ?? 'Admin' }}</span>
                    <span class="chevron" aria-hidden="true">v</span>
                </button>
            </header>

            <main class="dashboard">
                <section class="hero" aria-labelledby="dashboard-title">
                    <div class="hero-copy">
                        <h1 id="dashboard-title">Dashboard Admin</h1>
                        <p>Ringkasan operasional Kemah.in</p>
                    </div>
                    <div class="hero-image" aria-hidden="true">
                        <img src="{{ $assetBase }}/hero-camping.png" alt="">
                    </div>
                </section>

                <section class="statistics-grid" aria-label="Ringkasan statistik">
                    @foreach ($statistics as $statistic)
                        <article class="stat-card">
                            <span class="icon-badge tone-{{ $statistic['tone'] }}">
                                <img src="{{ $assetBase }}/{{ $statistic['icon'] }}" alt="">
                            </span>
                            <p>{{ $statistic['label'] }}</p>
                            <strong>{{ number_format($statistic['value'], 0, ',', '.') }}</strong>
                        </article>
                    @endforeach
                </section>

                <div class="content-grid">
                    <section class="panel chart-panel" aria-labelledby="chart-title">
                        <header class="panel-header">
                            <h2 id="chart-title">Statistik Peminjaman</h2>
                            <span>Jan – Jun</span>
                        </header>
                        <div class="chart" role="img" aria-label="Grafik peminjaman Januari hingga Juni">
                            <div class="y-axis" aria-hidden="true">
                                <span>100</span>
                                <span>75</span>
                                <span>50</span>
                                <span>25</span>
                                <span>0</span>
                            </div>
                            <div class="chart-plot">
                                <div class="grid-lines" aria-hidden="true">
                                    <i></i><i></i><i></i><i></i><i></i>
                                </div>
                                <img class="trend-line" src="{{ $assetBase }}/b4f73.svg" alt="">
                                <div class="x-axis" aria-hidden="true">
                                    <span>Jan</span><span>Feb</span><span>Mar</span>
                                    <span>Apr</span><span>Mei</span><span>Jun</span>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section class="panel activity-panel" aria-labelledby="activity-title">
                        <header class="panel-header">
                            <h2 id="activity-title">Aktivitas Terbaru</h2>
                        </header>
                        <div class="activity-list">
                            @foreach ($activities as $activity)
                                <article class="activity-item">
                                    <span class="activity-icon tone-{{ $activity['tone'] }}">
                                        <img src="{{ $assetBase }}/{{ $activity['icon'] }}" alt="">
                                    </span>
                                    <div>
                                        <h3>{{ $activity['title'] }}</h3>
                                        <p>{{ $activity['time'] }}</p>
                                    </div>
                                </article>
                            @endforeach
                        </div>
                        <a class="see-all" href="{{ $activitiesUrl ?? '#' }}">Lihat Semua <span aria-hidden="true">→</span></a>
                    </section>
                </div>

                <section class="follow-up" aria-labelledby="follow-up-title">
                    <div>
                        <h2 id="follow-up-title">Perlu ditindaklanjuti</h2>
                        <p>{{ $pendingReturns ?? 7 }} peminjaman belum dikembalikan.</p>
                    </div>
                    <a class="primary-button" href="{{ $loansUrl ?? '#' }}">
                        <span>Kelola peminjaman</span>
                        <span aria-hidden="true">→</span>
                    </a>
                </section>
            </main>
        </div>
    </div>

    <script>
        (() => {
            const shell = document.querySelector('.admin-shell');
            const toggle = document.querySelector('[data-sidebar-toggle]');
            const close = document.querySelector('[data-sidebar-close]');

            const setSidebar = (open) => {
                shell.dataset.sidebarOpen = String(open);
                toggle.setAttribute('aria-expanded', String(open));
                document.body.classList.toggle('sidebar-visible', open);
            };

            toggle.addEventListener('click', () => setSidebar(shell.dataset.sidebarOpen !== 'true'));
            close.addEventListener('click', () => setSidebar(false));
            window.addEventListener('keydown', (event) => {
                if (event.key === 'Escape') setSidebar(false);
            });
        })();
    </script>
</body>
</html>
