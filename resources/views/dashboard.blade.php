<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard - {{ config('app.name', 'AlfaWeb') }}</title>
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/images/favicon.png">
    <link rel="stylesheet" href="/assets/icons/fontawesome/css/all.min.css">
    <style>
        :root {
            --primary: #ff3d1f;
            --primary-dark: #d92b12;
            --dark: #171725;
            --muted: #7a7f91;
            --border: #e7e9f2;
            --surface: #ffffff;
            --soft: #f5f7fb;
            --success: #16a34a;
            --danger: #f1416c;
            --warning: #f59e0b;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: Inter, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
            color: var(--dark);
            background: #f4f7fb;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        button {
            font: inherit;
        }

        .app-shell {
            min-height: 100vh;
            display: grid;
            grid-template-columns: 280px 1fr;
        }

        .sidebar {
            position: sticky;
            top: 0;
            height: 100vh;
            padding: 28px;
            color: #fff;
            background:
                linear-gradient(160deg, rgba(255, 61, 31, 0.98), rgba(145, 33, 17, 0.98)),
                url('/assets/images/pattern/pattern1.png');
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 14px;
            margin-bottom: 38px;
        }

        .brand-mark {
            width: 52px;
            height: 52px;
            display: grid;
            place-items: center;
            border-radius: 18px;
            background: #fff;
            color: var(--primary);
            font-size: 22px;
            font-weight: 900;
        }

        .brand strong {
            display: block;
            font-size: 24px;
        }

        .brand span {
            display: block;
            margin-top: 2px;
            color: rgba(255, 255, 255, 0.75);
            font-size: 12px;
        }

        .nav-list {
            display: grid;
            gap: 10px;
        }

        .nav-link,
        .logout-button {
            width: 100%;
            min-height: 48px;
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 0 16px;
            border: 0;
            border-radius: 16px;
            color: rgba(255, 255, 255, 0.82);
            background: transparent;
            cursor: pointer;
            transition: background 0.18s ease, color 0.18s ease;
        }

        .nav-link.active,
        .nav-link:hover,
        .logout-button:hover {
            color: #fff;
            background: rgba(255, 255, 255, 0.16);
        }

        .logout-form {
            margin-top: 28px;
        }

        .main {
            padding: 30px;
        }

        .topbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 18px;
            margin-bottom: 28px;
        }

        .eyebrow {
            margin: 0 0 6px;
            color: var(--muted);
            font-size: 14px;
            font-weight: 700;
        }

        h1 {
            margin: 0;
            font-size: clamp(28px, 4vw, 42px);
            letter-spacing: -0.04em;
        }

        .user-pill {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 15px;
            border: 1px solid var(--border);
            border-radius: 18px;
            background: var(--surface);
            box-shadow: 0 12px 30px rgba(21, 31, 55, 0.06);
        }

        .avatar {
            width: 42px;
            height: 42px;
            display: grid;
            place-items: center;
            border-radius: 14px;
            color: #fff;
            background: var(--primary);
            overflow: hidden;
            font-weight: 900;
        }

        .avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .user-pill strong,
        .user-pill span {
            display: block;
        }

        .user-pill span {
            color: var(--muted);
            font-size: 12px;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 18px;
            margin-bottom: 24px;
        }

        .stat-card,
        .panel {
            border: 1px solid var(--border);
            border-radius: 24px;
            background: var(--surface);
            box-shadow: 0 16px 42px rgba(21, 31, 55, 0.07);
        }

        .stat-card {
            padding: 22px;
        }

        .stat-head {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            margin-bottom: 20px;
        }

        .stat-head span {
            color: var(--muted);
            font-size: 13px;
            font-weight: 800;
        }

        .stat-icon {
            width: 44px;
            height: 44px;
            display: grid;
            place-items: center;
            border-radius: 16px;
            background: var(--soft);
        }

        .stat-icon.success { color: var(--success); background: #dcfce7; }
        .stat-icon.danger { color: var(--danger); background: #fff0f4; }
        .stat-icon.primary { color: var(--primary); background: #fff1ed; }
        .stat-icon.warning { color: var(--warning); background: #fff7df; }

        .stat-value {
            display: block;
            font-size: clamp(20px, 2vw, 28px);
            font-weight: 900;
            letter-spacing: -0.03em;
        }

        .content-grid {
            display: grid;
            grid-template-columns: 1.1fr 0.9fr;
            gap: 18px;
        }

        .panel {
            padding: 24px;
        }

        .panel-title {
            margin: 0 0 6px;
            font-size: 20px;
        }

        .panel-subtitle {
            margin: 0 0 22px;
            color: var(--muted);
            font-size: 14px;
        }

        .progress-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            margin-bottom: 10px;
            font-weight: 800;
        }

        .progress-value {
            color: var(--primary);
        }

        .progress-track {
            height: 16px;
            overflow: hidden;
            border-radius: 999px;
            background: #fff1ed;
        }

        .progress-bar {
            height: 100%;
            border-radius: inherit;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        }

        .target-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 14px;
            margin-top: 18px;
        }

        .mini-card,
        .empty-card,
        .record-item {
            border-radius: 18px;
            background: var(--soft);
        }

        .mini-card {
            padding: 16px;
        }

        .mini-card span,
        .mini-card strong {
            display: block;
        }

        .mini-card span {
            margin-bottom: 6px;
            color: var(--muted);
            font-size: 13px;
        }

        .empty-card {
            padding: 26px;
            color: var(--muted);
            text-align: center;
        }

        .record-list {
            display: grid;
            gap: 12px;
        }

        .record-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 14px;
            padding: 15px;
        }

        .record-item strong,
        .record-item span {
            display: block;
        }

        .record-item span {
            margin-top: 4px;
            color: var(--muted);
            font-size: 12px;
        }

        .income { color: var(--success); }
        .expense { color: var(--danger); }

        @media (max-width: 1100px) {
            .app-shell {
                grid-template-columns: 1fr;
            }

            .sidebar {
                position: static;
                height: auto;
            }

            .nav-list {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .logout-form {
                margin-top: 12px;
            }

            .stats-grid,
            .content-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (max-width: 720px) {
            .main,
            .sidebar {
                padding: 20px;
            }

            .topbar,
            .record-item {
                align-items: flex-start;
                flex-direction: column;
            }

            .stats-grid,
            .content-grid,
            .target-grid,
            .nav-list {
                grid-template-columns: 1fr;
            }

            .user-pill {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="app-shell">
        <aside class="sidebar">
            <a href="{{ route('dashboard') }}" class="brand">
                <span class="brand-mark">A</span>
                <span>
                    <strong>AlfaWeb</strong>
                    <span>Dashboard Web</span>
                </span>
            </a>

            <nav class="nav-list">
                <a href="{{ route('dashboard') }}" class="nav-link active">
                    <i class="fa-solid fa-chart-line"></i>
                    Dashboard
                </a>
                <a href="{{ route('home') }}" class="nav-link">
                    <i class="fa-solid fa-house"></i>
                    Beranda
                </a>
            </nav>

            <form method="POST" action="{{ route('logout') }}" class="logout-form">
                @csrf
                <button type="submit" class="logout-button">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    Logout
                </button>
            </form>
        </aside>

        <main class="main">
            <header class="topbar">
                <div>
                    <p class="eyebrow">Selamat datang kembali,</p>
                    <h1>{{ $user->name }}</h1>
                </div>
                <div class="user-pill">
                    <span class="avatar">
                        @if ($user->avatar)
                            <img src="{{ $user->avatar }}" alt="{{ $user->name }}">
                        @else
                            {{ strtoupper(substr($user->name, 0, 1)) }}
                        @endif
                    </span>
                    <span>
                        <strong>{{ $user->email }}</strong>
                        <span>{{ now()->translatedFormat('l, d F Y') }}</span>
                    </span>
                </div>
            </header>

            <section class="stats-grid">
                <article class="stat-card">
                    <div class="stat-head">
                        <span>Pemasukan Bulan Ini</span>
                        <i class="stat-icon success fa-solid fa-arrow-trend-up"></i>
                    </div>
                    <strong class="stat-value">Rp {{ number_format($summary['month_income'], 0, ',', '.') }}</strong>
                </article>

                <article class="stat-card">
                    <div class="stat-head">
                        <span>Pengeluaran Bulan Ini</span>
                        <i class="stat-icon danger fa-solid fa-arrow-trend-down"></i>
                    </div>
                    <strong class="stat-value">Rp {{ number_format($summary['month_expense'], 0, ',', '.') }}</strong>
                </article>

                <article class="stat-card">
                    <div class="stat-head">
                        <span>Saldo Bulan Ini</span>
                        <i class="stat-icon primary fa-solid fa-wallet"></i>
                    </div>
                    <strong class="stat-value">Rp {{ number_format($summary['month_balance'], 0, ',', '.') }}</strong>
                </article>

                <article class="stat-card">
                    <div class="stat-head">
                        <span>Transaksi Hari Ini</span>
                        <i class="stat-icon warning fa-solid fa-calendar-day"></i>
                    </div>
                    <strong class="stat-value">Rp {{ number_format($summary['today_income'] - $summary['today_expense'], 0, ',', '.') }}</strong>
                </article>
            </section>

            <section class="content-grid">
                <article class="panel">
                    <h2 class="panel-title">Target Pendapatan Aktif</h2>
                    <p class="panel-subtitle">Progress target berdasarkan data pemasukan.</p>

                    @if ($activeTarget)
                        <div class="progress-row">
                            <span>{{ $activeTarget->title }}</span>
                            <span class="progress-value">{{ number_format($targetProgress, 1, ',', '.') }}%</span>
                        </div>
                        <div class="progress-track">
                            <div class="progress-bar" style="width: {{ $targetProgress }}%"></div>
                        </div>
                        <div class="target-grid">
                            <div class="mini-card">
                                <span>Target</span>
                                <strong>Rp {{ number_format((float) $activeTarget->target_amount, 0, ',', '.') }}</strong>
                            </div>
                            <div class="mini-card">
                                <span>Terealisasi</span>
                                <strong>Rp {{ number_format($targetRealized, 0, ',', '.') }}</strong>
                            </div>
                        </div>
                    @else
                        <div class="empty-card">Belum ada target pendapatan aktif.</div>
                    @endif
                </article>

                <article class="panel">
                    <h2 class="panel-title">Aktivitas Terbaru</h2>
                    <p class="panel-subtitle">Lima catatan keuangan terbaru.</p>

                    <div class="record-list">
                        @forelse ($recentRecords as $record)
                            <div class="record-item">
                                <div>
                                    <strong>{{ $record->category ?: ucfirst($record->type) }}</strong>
                                    <span>{{ $record->occurred_at->format('d M Y') }}</span>
                                </div>
                                <strong class="{{ $record->type === 'income' ? 'income' : 'expense' }}">
                                    {{ $record->type === 'income' ? '+' : '-' }} Rp {{ number_format((float) $record->amount, 0, ',', '.') }}
                                </strong>
                            </div>
                        @empty
                            <div class="empty-card">Belum ada catatan keuangan.</div>
                        @endforelse
                    </div>
                </article>
            </section>
        </main>
    </div>
</body>
</html>
