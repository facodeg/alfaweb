@php
    $money = fn ($value) => 'Rp ' . number_format((float) $value, 0, ',', '.');
    $active = fn (string $name) => $page === $name ? 'active' : '';
    $nav = [
        ['key' => 'dashboard', 'label' => 'Dashboard', 'icon' => 'fa-chart-pie', 'route' => route('dashboard')],
        ['key' => 'finance', 'label' => 'Keuangan', 'icon' => 'fa-wallet', 'route' => route('web.finance.index')],
        ['key' => 'income-targets', 'label' => 'Target Pendapatan', 'icon' => 'fa-bullseye', 'route' => route('web.income-targets.index')],
        ['key' => 'work-targets', 'label' => 'Target Pekerjaan', 'icon' => 'fa-flag-checkered', 'route' => route('web.work-targets.index')],
        ['key' => 'work-plans', 'label' => 'Rencana Kerja', 'icon' => 'fa-list-check', 'route' => route('web.work-plans.index')],
        ['key' => 'life-schedules', 'label' => 'Jadwal', 'icon' => 'fa-calendar-days', 'route' => route('web.life-schedules.index')],
    ];
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AlfaWeb - {{ config('app.name', 'AlfaApps') }}</title>
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/images/favicon.png">
    <link rel="stylesheet" href="/assets/icons/fontawesome/css/all.min.css">
    <style>
        :root{--primary:#5B5FEF;--primary-dark:#4347D6;--primary-light:#8E91F4;--coral:#FF6B81;--orange:#FFA552;--mint:#4FD1A5;--bg:#F2F4F8;--surface:#fff;--surface-alt:#F7F8FB;--text:#1F2233;--muted:#7A7E92;--border:#E5E7EE;--danger:#EF4444;--shadow:0 18px 44px rgba(17,26,64,.08)}
        *{box-sizing:border-box} body{margin:0;min-height:100vh;background:var(--bg);color:var(--text);font-family:'Plus Jakarta Sans',Inter,ui-sans-serif,system-ui,-apple-system,BlinkMacSystemFont,"Segoe UI",sans-serif} a{text-decoration:none;color:inherit} button,input,select,textarea{font:inherit} .app{display:grid;grid-template-columns:292px 1fr;min-height:100vh}.sidebar{position:sticky;top:0;height:100vh;padding:26px 20px;background:rgba(255,255,255,.78);backdrop-filter:blur(18px);border-right:1px solid rgba(229,231,238,.8)}.brand{display:flex;align-items:center;gap:12px;margin-bottom:30px}.brand-mark{width:52px;height:52px;border-radius:20px;display:grid;place-items:center;background:linear-gradient(135deg,var(--primary),var(--primary-light));color:white;font-weight:900;font-size:22px;box-shadow:0 18px 34px rgba(91,95,239,.28)}.brand-title{font-size:22px;font-weight:900;letter-spacing:-.04em}.brand-sub{display:block;color:var(--muted);font-size:12px;margin-top:2px}.nav{display:grid;gap:8px}.nav a,.logout{width:100%;min-height:48px;display:flex;align-items:center;gap:12px;padding:0 14px;border:0;border-radius:18px;background:transparent;color:var(--muted);font-weight:800;cursor:pointer;transition:.18s}.nav a:hover,.nav a.active{background:linear-gradient(135deg,var(--primary),var(--primary-dark));color:white;box-shadow:0 16px 32px rgba(91,95,239,.24)}.logout{margin-top:18px;color:var(--danger)}.logout:hover{background:#fff1f2}.main{padding:28px 30px 42px}.topbar{display:flex;align-items:center;justify-content:space-between;gap:18px;margin-bottom:24px}.eyebrow{margin:0 0 6px;color:var(--muted);font-weight:800;font-size:13px}.title{margin:0;font-size:clamp(30px,4vw,44px);letter-spacing:-.055em;line-height:1.05}.profile{display:flex;align-items:center;gap:12px;padding:12px 14px;border-radius:22px;background:var(--surface);box-shadow:var(--shadow);border:1px solid var(--border)}.avatar{width:44px;height:44px;border-radius:16px;display:grid;place-items:center;background:#EEF0FF;color:var(--primary);font-weight:900;overflow:hidden}.avatar img{width:100%;height:100%;object-fit:cover}.profile strong,.profile span{display:block}.profile span{font-size:12px;color:var(--muted);margin-top:2px}.notice,.errors{margin-bottom:18px;padding:14px 16px;border-radius:18px;font-weight:800}.notice{background:#E9FBF4;color:#138A62}.errors{background:#FFF1F3;color:var(--danger)}.stats{display:grid;grid-template-columns:repeat(4,minmax(0,1fr));gap:16px;margin-bottom:18px}.card,.panel,.form-card{background:var(--surface);border:1px solid var(--border);border-radius:26px;box-shadow:var(--shadow)}.stat{padding:20px}.stat-head{display:flex;align-items:center;justify-content:space-between;gap:10px;margin-bottom:18px;color:var(--muted);font-size:13px;font-weight:900}.icon{width:44px;height:44px;border-radius:16px;display:grid;place-items:center}.i-primary{background:#EEF0FF;color:var(--primary)}.i-mint{background:#E7FBF4;color:#19A978}.i-coral{background:#FFF0F3;color:var(--coral)}.i-orange{background:#FFF6E9;color:var(--orange)}.stat-value{font-size:24px;font-weight:900;letter-spacing:-.04em}.grid-2{display:grid;grid-template-columns:1.1fr .9fr;gap:16px}.grid-3{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:16px}.panel{padding:22px}.panel h2,.form-card h2{margin:0 0 6px;font-size:21px;letter-spacing:-.03em}.panel p,.form-card p{margin:0 0 18px;color:var(--muted)}.hero-card{padding:26px;background:linear-gradient(135deg,var(--primary),var(--primary-dark));color:white;overflow:hidden;position:relative}.hero-card:after{content:"";position:absolute;width:220px;height:220px;right:-72px;top:-82px;border-radius:999px;background:rgba(255,255,255,.14)}.hero-card *{position:relative}.hero-card small{color:rgba(255,255,255,.72)}.hero-card .big{display:block;margin:10px 0 18px;font-size:34px;font-weight:900;letter-spacing:-.05em}.mini-row{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:12px}.mini{padding:14px;border-radius:18px;background:rgba(255,255,255,.14)}.category-grid{display:grid;grid-template-columns:repeat(4,minmax(0,1fr));gap:14px}.category{padding:18px;border-radius:24px;background:var(--surface);border:1px solid var(--border);box-shadow:var(--shadow);transition:.18s}.category:hover{transform:translateY(-2px)}.category i{margin-bottom:14px}.category strong,.category span{display:block}.category span{margin-top:4px;color:var(--muted);font-size:13px}.form-card{padding:20px}.form-grid{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:12px}.field{display:grid;gap:7px}.field.full{grid-column:1/-1}.field label{font-size:13px;font-weight:900}.field input,.field select,.field textarea{width:100%;border:1px solid var(--border);border-radius:16px;background:var(--surface-alt);padding:12px 14px;outline:none}.field input:focus,.field select:focus,.field textarea:focus{border-color:var(--primary);box-shadow:0 0 0 4px rgba(91,95,239,.1);background:white}.btn{display:inline-flex;align-items:center;justify-content:center;gap:8px;border:0;border-radius:16px;padding:12px 16px;font-weight:900;cursor:pointer}.btn-primary{background:linear-gradient(135deg,var(--primary),var(--primary-dark));color:white}.btn-soft{background:#EEF0FF;color:var(--primary)}.btn-danger{background:#FFF1F3;color:var(--danger)}.list{display:grid;gap:12px}.item{display:flex;align-items:center;justify-content:space-between;gap:14px;padding:16px;border-radius:20px;background:var(--surface-alt)}.item-main strong,.item-main span{display:block}.item-main span{margin-top:4px;color:var(--muted);font-size:13px}.badge{display:inline-flex;align-items:center;border-radius:999px;padding:7px 10px;font-size:12px;font-weight:900}.b-primary{background:#EEF0FF;color:var(--primary)}.b-mint{background:#E7FBF4;color:#159A70}.b-coral{background:#FFF0F3;color:var(--coral)}.b-orange{background:#FFF6E9;color:#D98312}.progress{height:12px;border-radius:999px;background:#EEF0FF;overflow:hidden}.progress span{display:block;height:100%;border-radius:inherit;background:linear-gradient(135deg,var(--primary),var(--primary-light))}.tabs{display:flex;gap:8px;flex-wrap:wrap;margin-bottom:14px}.empty{padding:24px;border-radius:20px;background:var(--surface-alt);text-align:center;color:var(--muted);font-weight:700}.actions{display:flex;gap:8px;align-items:center}.inline-form{display:inline}.text-income{color:#159A70}.text-expense{color:var(--danger)}
        .calendar-shell{display:grid;grid-template-columns:1fr 340px;gap:18px;margin-top:18px}.calendar-card{padding:22px}.calendar-head{display:flex;align-items:center;justify-content:space-between;gap:14px;margin-bottom:18px}.calendar-title{margin:0;font-size:24px;font-weight:900;letter-spacing:-.04em}.calendar-nav{display:flex;gap:8px}.calendar-nav a{width:42px;height:42px;display:grid;place-items:center;border-radius:15px;background:#EEF0FF;color:var(--primary);font-weight:900}.calendar-week,.calendar-grid{display:grid;grid-template-columns:repeat(7,minmax(0,1fr));gap:10px}.calendar-week{margin-bottom:10px;color:var(--muted);font-size:12px;font-weight:900;text-align:center}.calendar-day{min-height:118px;padding:11px;border:1px solid var(--border);border-radius:20px;background:var(--surface-alt);overflow:hidden}.calendar-day.is-muted{opacity:.42}.calendar-day.is-today{border-color:var(--primary);box-shadow:0 0 0 4px rgba(91,95,239,.1);background:#fff}.calendar-date{display:flex;align-items:center;justify-content:space-between;margin-bottom:8px;font-weight:900}.calendar-date span:first-child{width:30px;height:30px;display:grid;place-items:center;border-radius:11px}.calendar-day.is-today .calendar-date span:first-child{background:linear-gradient(135deg,var(--primary),var(--primary-dark));color:#fff}.calendar-count{font-size:11px;color:var(--primary);background:#EEF0FF;border-radius:999px;padding:4px 8px}.calendar-events{display:grid;gap:6px}.calendar-event{padding:7px 8px;border-radius:10px;background:#fff;color:var(--text);font-size:12px;font-weight:800;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;border-left:4px solid var(--primary)}.calendar-more{color:var(--muted);font-size:12px;font-weight:800}.schedule-side{display:grid;gap:14px}.schedule-legend{display:grid;gap:10px}.legend-item{display:flex;align-items:center;gap:10px;color:var(--muted);font-size:13px;font-weight:800}.legend-dot{width:12px;height:12px;border-radius:999px;background:var(--primary)}
        @media(max-width:1180px){.app{grid-template-columns:1fr}.sidebar{position:static;height:auto}.nav{grid-template-columns:repeat(3,minmax(0,1fr))}.stats,.category-grid{grid-template-columns:repeat(2,minmax(0,1fr))}.grid-2,.calendar-shell{grid-template-columns:1fr}}
        @media(max-width:720px){.main,.sidebar{padding:18px}.topbar,.item{align-items:flex-start;flex-direction:column}.stats,.grid-3,.category-grid,.form-grid,.mini-row,.nav{grid-template-columns:1fr}.profile{width:100%}.actions{width:100%;justify-content:flex-end}.title{font-size:30px}.calendar-week,.calendar-grid{gap:6px}.calendar-day{min-height:88px;padding:8px;border-radius:15px}.calendar-event{display:none}.calendar-count{font-size:10px;padding:3px 6px}.calendar-title{font-size:20px}}
    </style>
</head>
<body>
<div class="app">
    <aside class="sidebar">
        <a class="brand" href="{{ route('dashboard') }}">
            <span class="brand-mark">A</span>
            <span><span class="brand-title">AlfaApps</span><span class="brand-sub">Web + REST API</span></span>
        </a>
        <nav class="nav">
            @foreach ($nav as $item)
                <a class="{{ $active($item['key']) }}" href="{{ $item['route'] }}"><i class="fa-solid {{ $item['icon'] }}"></i>{{ $item['label'] }}</a>
            @endforeach
        </nav>
        <form method="POST" action="{{ route('logout') }}">@csrf<button class="logout" type="submit"><i class="fa-solid fa-right-from-bracket"></i>Logout</button></form>
    </aside>
    <main class="main">
        <header class="topbar">
            <div>
                <p class="eyebrow">{{ now()->translatedFormat('l, d F Y') }}</p>
                <h1 class="title">{{ $page === 'dashboard' ? 'Diary' : collect($nav)->firstWhere('key', $page)['label'] ?? 'AlfaWeb' }}</h1>
            </div>
            <div class="profile">
                <span class="avatar">@if($user->avatar)<img src="{{ $user->avatar }}" alt="{{ $user->name }}">@else{{ strtoupper(substr($user->name,0,1)) }}@endif</span>
                <span><strong>{{ $user->name }}</strong><span>{{ $user->email }}</span></span>
            </div>
        </header>

        @if (session('status'))<div class="notice">{{ session('status') }}</div>@endif
        @if ($errors->any())<div class="errors">{{ $errors->first() }}</div>@endif

        <section class="stats">
            <article class="card stat"><div class="stat-head"><span>Saldo bulan ini</span><i class="icon i-primary fa-solid fa-wallet"></i></div><div class="stat-value">{{ $money($summary['month_balance']) }}</div></article>
            <article class="card stat"><div class="stat-head"><span>Pemasukan hari ini</span><i class="icon i-mint fa-solid fa-arrow-down"></i></div><div class="stat-value">{{ $money($summary['today_income']) }}</div></article>
            <article class="card stat"><div class="stat-head"><span>Rencana hari ini</span><i class="icon i-orange fa-solid fa-list-check"></i></div><div class="stat-value">{{ $summary['plans_today'] }}</div></article>
            <article class="card stat"><div class="stat-head"><span>Jadwal hari ini</span><i class="icon i-coral fa-solid fa-calendar-day"></i></div><div class="stat-value">{{ $summary['today_schedule_count'] }}</div></article>
        </section>

        @if ($page === 'dashboard')
            <section class="grid-2">
                <article class="card hero-card">
                    <small>Saldo bulan ini</small>
                    <span class="big">{{ $money($summary['month_balance']) }}</span>
                    <div class="mini-row">
                        <div class="mini"><small>Pemasukan</small><strong>{{ $money($summary['month_income']) }}</strong></div>
                        <div class="mini"><small>Pengeluaran</small><strong>{{ $money($summary['month_expense']) }}</strong></div>
                    </div>
                </article>
                <article class="panel">
                    <h2>Target aktif</h2>
                    <p>Target pendapatan berjalan seperti di aplikasi Flutter.</p>
                    @if ($activeTarget)
                        <div class="item">
                            <div class="item-main"><strong>{{ $activeTarget->title }}</strong><span>{{ $money($targetRealized) }} dari {{ $money($activeTarget->target_amount) }}</span></div>
                            <span class="badge b-primary">{{ number_format($targetProgress, 1, ',', '.') }}%</span>
                        </div>
                        <div class="progress" style="margin-top:12px"><span style="width:{{ $targetProgress }}%"></span></div>
                    @else
                        <div class="empty">Belum ada target pendapatan aktif.</div>
                    @endif
                </article>
            </section>
            <section style="margin-top:18px" class="category-grid">
                @foreach (array_slice($nav, 1) as $item)
                    <a class="category" href="{{ $item['route'] }}"><i class="icon i-primary fa-solid {{ $item['icon'] }}"></i><strong>{{ $item['label'] }}</strong><span>Buka modul</span></a>
                @endforeach
            </section>
            <section class="calendar-shell">
                <article class="panel calendar-card">
                    <div class="calendar-head">
                        <div>
                            <h2 class="calendar-title">Kalender {{ $calendarMonth->translatedFormat('F Y') }}</h2>
                            <p>Ringkasan jadwal dari modul Jadwal Kehidupan.</p>
                        </div>
                        <div class="calendar-nav">
                            <a href="{{ route('dashboard', ['month' => $previousMonth]) }}" aria-label="Bulan sebelumnya"><i class="fa-solid fa-chevron-left"></i></a>
                            <a href="{{ route('dashboard', ['month' => $nextMonth]) }}" aria-label="Bulan berikutnya"><i class="fa-solid fa-chevron-right"></i></a>
                        </div>
                    </div>
                    <div class="calendar-week">
                        <span>Sen</span><span>Sel</span><span>Rab</span><span>Kam</span><span>Jum</span><span>Sab</span><span>Min</span>
                    </div>
                    <div class="calendar-grid">
                        @foreach ($calendarDays as $day)
                            <div class="calendar-day {{ $day['in_month'] ? '' : 'is-muted' }} {{ $day['is_today'] ? 'is-today' : '' }}">
                                <div class="calendar-date">
                                    <span>{{ $day['date']->format('j') }}</span>
                                    @if ($day['schedules']->isNotEmpty())
                                        <span class="calendar-count">{{ $day['schedules']->count() }}</span>
                                    @endif
                                </div>
                                <div class="calendar-events">
                                    @foreach ($day['schedules']->take(2) as $schedule)
                                        <div class="calendar-event" style="border-left-color: {{ $schedule->color ?: '#5B5FEF' }}">{{ $schedule->title }}</div>
                                    @endforeach
                                    @if ($day['schedules']->count() > 2)
                                        <div class="calendar-more">+{{ $day['schedules']->count() - 2 }} lainnya</div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </article>
                <aside class="schedule-side">
                    <article class="panel">
                        <h2>Jadwal hari ini</h2>
                        <p>{{ now()->translatedFormat('d F Y') }}</p>
                        <div class="list">@forelse(($todaySchedules ?? collect()) as $schedule)<div class="item"><div class="item-main"><strong>{{ $schedule->title }}</strong><span>{{ $schedule->start_at->format('H:i') }} - {{ $schedule->end_at->format('H:i') }} · {{ $schedule->category ?: 'Tanpa kategori' }}</span></div><span class="badge b-primary">{{ $schedule->repeat }}</span></div>@empty<div class="empty">Tidak ada jadwal hari ini.</div>@endforelse</div>
                    </article>
                    <a class="category" href="{{ route('web.life-schedules.index') }}"><i class="icon i-primary fa-solid fa-calendar-plus"></i><strong>Kelola Jadwal</strong><span>Tambah atau hapus agenda</span></a>
                </aside>
            </section>
            <section style="margin-top:18px" class="grid-2">
                <article class="panel"><h2>Aktivitas keuangan</h2><p>Catatan terbaru.</p><div class="list">@forelse(($recentRecords ?? collect()) as $record)<div class="item"><div class="item-main"><strong>{{ $record->category ?: ucfirst($record->type) }}</strong><span>{{ $record->occurred_at->format('d M Y') }} · {{ $record->note }}</span></div><strong class="{{ $record->type === 'income' ? 'text-income' : 'text-expense' }}">{{ $record->type === 'income' ? '+' : '-' }} {{ $money($record->amount) }}</strong></div>@empty<div class="empty">Belum ada catatan keuangan.</div>@endforelse</div></article>
                <article class="panel"><h2>Rencana terbuka</h2><p>Checklist pekerjaan aktif.</p><div class="list">@forelse(($openPlans ?? collect()) as $plan)<div class="item"><div class="item-main"><strong>{{ $plan->title }}</strong><span>{{ $plan->due_at?->format('d M Y H:i') ?? 'Tanpa deadline' }}</span></div><span class="badge {{ $plan->priority === 'high' ? 'b-coral' : ($plan->priority === 'medium' ? 'b-orange' : 'b-primary') }}">{{ $plan->priority ?? 'low' }}</span></div>@empty<div class="empty">Belum ada rencana terbuka.</div>@endforelse</div></article>
            </section>
        @endif

        @if ($page === 'finance')
            <section class="grid-2">
                <article class="card hero-card"><small>Saldo total</small><span class="big">{{ $money($financeTotals['balance']) }}</span><div class="mini-row"><div class="mini"><small>Income</small><strong>{{ $money($financeTotals['income']) }}</strong></div><div class="mini"><small>Expense</small><strong>{{ $money($financeTotals['expense']) }}</strong></div></div></article>
                <form class="form-card" method="POST" action="{{ route('web.finance.store') }}">@csrf<h2>Catat transaksi</h2><p>Data ini langsung tersedia untuk Flutter.</p><div class="form-grid"><div class="field"><label>Tipe</label><select name="type"><option value="income">Pemasukan</option><option value="expense">Pengeluaran</option></select></div><div class="field"><label>Jumlah</label><input name="amount" type="number" min="0" step="1000" required></div><div class="field"><label>Kategori</label><input name="category" placeholder="Gaji, Makan, Transport"></div><div class="field"><label>Tanggal</label><input name="occurred_at" type="datetime-local" value="{{ now()->format('Y-m-d\TH:i') }}" required></div><div class="field full"><label>Catatan</label><textarea name="note" rows="2"></textarea></div><div class="field full"><button class="btn btn-primary" type="submit"><i class="fa-solid fa-plus"></i>Simpan</button></div></div></form>
            </section>
            <section style="margin-top:18px" class="panel"><div class="tabs"><a class="btn {{ !$financeFilter ? 'btn-primary' : 'btn-soft' }}" href="{{ route('web.finance.index') }}">Semua</a><a class="btn {{ $financeFilter === 'income' ? 'btn-primary' : 'btn-soft' }}" href="{{ route('web.finance.index', ['type' => 'income']) }}">Pemasukan</a><a class="btn {{ $financeFilter === 'expense' ? 'btn-primary' : 'btn-soft' }}" href="{{ route('web.finance.index', ['type' => 'expense']) }}">Pengeluaran</a></div><div class="list">@forelse($records as $record)<div class="item"><div class="item-main"><strong>{{ $record->category ?: ucfirst($record->type) }}</strong><span>{{ $record->occurred_at->format('d M Y H:i') }} · {{ $record->note ?: '-' }}</span></div><div class="actions"><strong class="{{ $record->type === 'income' ? 'text-income' : 'text-expense' }}">{{ $record->type === 'income' ? '+' : '-' }} {{ $money($record->amount) }}</strong><form class="inline-form" method="POST" action="{{ route('web.finance.destroy', $record) }}">@csrf @method('DELETE')<button class="btn btn-danger" type="submit">Hapus</button></form></div></div>@empty<div class="empty">Belum ada catatan.</div>@endforelse</div></section>
        @endif

        @if ($page === 'income-targets')
            <section class="grid-2"><form class="form-card" method="POST" action="{{ route('web.income-targets.store') }}">@csrf<h2>Target pendapatan</h2><p>Buat target mingguan, bulanan, atau tahunan.</p><div class="form-grid"><div class="field full"><label>Judul</label><input name="title" required></div><div class="field"><label>Periode</label><select name="period"><option value="weekly">Mingguan</option><option value="monthly" selected>Bulanan</option><option value="yearly">Tahunan</option></select></div><div class="field"><label>Target</label><input name="target_amount" type="number" min="0" step="1000" required></div><div class="field"><label>Mulai</label><input name="period_start" type="date" value="{{ now()->startOfMonth()->toDateString() }}" required></div><div class="field"><label>Selesai</label><input name="period_end" type="date" value="{{ now()->endOfMonth()->toDateString() }}" required></div><div class="field full"><label>Catatan</label><textarea name="note" rows="2"></textarea></div><div class="field full"><button class="btn btn-primary" type="submit">Simpan target</button></div></div></form><article class="panel"><h2>Ringkasan</h2><p>Target aktif muncul di dashboard Flutter dan web.</p>@if($activeTarget)<div class="item"><div class="item-main"><strong>{{ $activeTarget->title }}</strong><span>{{ $money($targetRealized) }} / {{ $money($activeTarget->target_amount) }}</span></div><span class="badge b-primary">{{ number_format($targetProgress,1,',','.') }}%</span></div>@else<div class="empty">Belum ada target aktif.</div>@endif</article></section>
            <section style="margin-top:18px" class="grid-3">@forelse($targets as $target)<article class="panel"><h2>{{ $target->title }}</h2><p>{{ ucfirst($target->period) }} · {{ $target->period_start->format('d M Y') }} - {{ $target->period_end->format('d M Y') }}</p><div class="progress"><span style="width:{{ $target->progress }}%"></span></div><p style="margin-top:12px">{{ $money($target->realized_amount) }} / {{ $money($target->target_amount) }}</p><form method="POST" action="{{ route('web.income-targets.destroy', $target) }}">@csrf @method('DELETE')<button class="btn btn-danger" type="submit">Hapus</button></form></article>@empty<div class="panel"><div class="empty">Belum ada target.</div></div>@endforelse</section>
        @endif

        @if ($page === 'work-targets')
            <section class="grid-2"><form class="form-card" method="POST" action="{{ route('web.work-targets.store') }}">@csrf<h2>Target pekerjaan</h2><p>Target karier/proyek dengan progress.</p><div class="form-grid"><div class="field full"><label>Judul</label><input name="title" required></div><div class="field"><label>Status</label><select name="status"><option value="pending">Pending</option><option value="on_progress" selected>On progress</option><option value="done">Done</option></select></div><div class="field"><label>Progress</label><input name="progress" type="number" min="0" max="100" value="0"></div><div class="field"><label>Deadline</label><input name="deadline" type="date"></div><div class="field full"><label>Deskripsi</label><textarea name="description" rows="3"></textarea></div><div class="field full"><button class="btn btn-primary" type="submit">Simpan target</button></div></div></form><article class="panel"><h2>Filter</h2><div class="tabs"><a class="btn {{ !$workTargetFilter ? 'btn-primary' : 'btn-soft' }}" href="{{ route('web.work-targets.index') }}">Semua</a><a class="btn {{ $workTargetFilter === 'pending' ? 'btn-primary' : 'btn-soft' }}" href="{{ route('web.work-targets.index', ['status'=>'pending']) }}">Pending</a><a class="btn {{ $workTargetFilter === 'on_progress' ? 'btn-primary' : 'btn-soft' }}" href="{{ route('web.work-targets.index', ['status'=>'on_progress']) }}">Progress</a><a class="btn {{ $workTargetFilter === 'done' ? 'btn-primary' : 'btn-soft' }}" href="{{ route('web.work-targets.index', ['status'=>'done']) }}">Done</a></div></article></section>
            <section style="margin-top:18px" class="grid-3">@forelse($workTargets as $target)<article class="panel"><h2>{{ $target->title }}</h2><p>{{ $target->deadline?->format('d M Y') ?? 'Tanpa deadline' }}</p><div class="progress"><span style="width:{{ $target->progress }}%"></span></div><p style="margin-top:12px">{{ $target->progress }}% · {{ str_replace('_',' ', $target->status) }}</p><form method="POST" action="{{ route('web.work-targets.destroy', $target) }}">@csrf @method('DELETE')<button class="btn btn-danger" type="submit">Hapus</button></form></article>@empty<div class="panel"><div class="empty">Belum ada target pekerjaan.</div></div>@endforelse</section>
        @endif

        @if ($page === 'work-plans')
            <section class="grid-2"><form class="form-card" method="POST" action="{{ route('web.work-plans.store') }}">@csrf<h2>Rencana pekerjaan</h2><p>Checklist task pekerjaan seperti di Flutter.</p><div class="form-grid"><div class="field full"><label>Judul</label><input name="title" required></div><div class="field"><label>Target terkait</label><select name="work_target_id"><option value="">Tanpa target</option>@foreach($workTargets as $target)<option value="{{ $target->id }}">{{ $target->title }}</option>@endforeach</select></div><div class="field"><label>Prioritas</label><select name="priority"><option value="low">Low</option><option value="medium" selected>Medium</option><option value="high">High</option></select></div><div class="field"><label>Deadline</label><input name="due_at" type="datetime-local"></div><div class="field full"><label>Deskripsi</label><textarea name="description" rows="3"></textarea></div><div class="field full"><button class="btn btn-primary" type="submit">Simpan rencana</button></div></div></form><article class="panel"><h2>Hari ini</h2><p>{{ $summary['plans_today'] }} rencana hari ini, {{ $summary['plans_overdue'] }} terlambat.</p></article></section>
            <section style="margin-top:18px" class="panel"><div class="list">@forelse($workPlans as $plan)<div class="item"><div class="item-main"><strong>{{ $plan->title }}</strong><span>{{ $plan->workTarget?->title ?? 'Tanpa target' }} · {{ $plan->due_at?->format('d M Y H:i') ?? 'Tanpa deadline' }}</span></div><div class="actions"><span class="badge {{ $plan->is_done ? 'b-mint' : ($plan->priority === 'high' ? 'b-coral' : 'b-primary') }}">{{ $plan->is_done ? 'Selesai' : $plan->priority }}</span><form method="POST" action="{{ route('web.work-plans.toggle', $plan) }}">@csrf @method('PATCH')<button class="btn btn-soft" type="submit">Toggle</button></form><form method="POST" action="{{ route('web.work-plans.destroy', $plan) }}">@csrf @method('DELETE')<button class="btn btn-danger" type="submit">Hapus</button></form></div></div>@empty<div class="empty">Belum ada rencana pekerjaan.</div>@endforelse</div></section>
        @endif

        @if ($page === 'life-schedules')
            <section class="calendar-shell">
                <article class="panel calendar-card">
                    <div class="calendar-head">
                        <div>
                            <h2 class="calendar-title">{{ $calendarMonth->translatedFormat('F Y') }}</h2>
                            <p>Kalender agenda bulanan, termasuk jadwal berulang.</p>
                        </div>
                        <div class="calendar-nav">
                            <a href="{{ route('web.life-schedules.index', ['month' => $previousMonth]) }}" aria-label="Bulan sebelumnya"><i class="fa-solid fa-chevron-left"></i></a>
                            <a href="{{ route('web.life-schedules.index', ['month' => $nextMonth]) }}" aria-label="Bulan berikutnya"><i class="fa-solid fa-chevron-right"></i></a>
                        </div>
                    </div>
                    <div class="calendar-week">
                        <span>Sen</span><span>Sel</span><span>Rab</span><span>Kam</span><span>Jum</span><span>Sab</span><span>Min</span>
                    </div>
                    <div class="calendar-grid">
                        @foreach ($calendarDays as $day)
                            <div class="calendar-day {{ $day['in_month'] ? '' : 'is-muted' }} {{ $day['is_today'] ? 'is-today' : '' }}">
                                <div class="calendar-date">
                                    <span>{{ $day['date']->format('j') }}</span>
                                    @if ($day['schedules']->isNotEmpty())
                                        <span class="calendar-count">{{ $day['schedules']->count() }}</span>
                                    @endif
                                </div>
                                <div class="calendar-events">
                                    @foreach ($day['schedules']->take(2) as $schedule)
                                        <div class="calendar-event" style="border-left-color: {{ $schedule->color ?: '#5B5FEF' }}">{{ $schedule->title }}</div>
                                    @endforeach
                                    @if ($day['schedules']->count() > 2)
                                        <div class="calendar-more">+{{ $day['schedules']->count() - 2 }} lainnya</div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </article>
                <aside class="schedule-side">
                    <article class="panel">
                        <h2>Jadwal hari ini</h2>
                        <p>{{ now()->translatedFormat('d F Y') }}</p>
                        <div class="list">@forelse($todaySchedules as $schedule)<div class="item"><div class="item-main"><strong>{{ $schedule->title }}</strong><span>{{ $schedule->start_at->format('H:i') }} - {{ $schedule->end_at->format('H:i') }} · {{ $schedule->category ?: 'Tanpa kategori' }}</span></div><span class="badge b-primary">{{ $schedule->repeat }}</span></div>@empty<div class="empty">Tidak ada jadwal hari ini.</div>@endforelse</div>
                    </article>
                    <article class="panel">
                        <h2>Legenda</h2>
                        <div class="schedule-legend">
                            <div class="legend-item"><span class="legend-dot"></span>Jadwal aktif</div>
                            <div class="legend-item"><span class="legend-dot" style="background:var(--coral)"></span>Agenda penting</div>
                            <div class="legend-item"><span class="legend-dot" style="background:var(--orange)"></span>Rutinitas</div>
                        </div>
                    </article>
                </aside>
            </section>
            <section style="margin-top:18px" class="grid-2"><form class="form-card" method="POST" action="{{ route('web.life-schedules.store') }}">@csrf<h2>Tambah jadwal</h2><p>Agenda harian/mingguan untuk web dan Flutter.</p><div class="form-grid"><div class="field full"><label>Judul</label><input name="title" required></div><div class="field"><label>Kategori</label><input name="category" placeholder="Rutinitas, Agenda"></div><div class="field"><label>Repeat</label><select name="repeat"><option value="none">Tidak ulang</option><option value="daily">Harian</option><option value="weekly">Mingguan</option><option value="monthly">Bulanan</option></select></div><div class="field"><label>Mulai</label><input name="start_at" type="datetime-local" value="{{ now()->format('Y-m-d\TH:i') }}" required></div><div class="field"><label>Selesai</label><input name="end_at" type="datetime-local" value="{{ now()->addHour()->format('Y-m-d\TH:i') }}" required></div><div class="field"><label>Warna</label><input name="color" value="#5B5FEF"></div><div class="field full"><label>Deskripsi</label><textarea name="description" rows="3"></textarea></div><div class="field full"><button class="btn btn-primary" type="submit">Simpan jadwal</button></div></div></form><article class="panel"><h2>Tips repeat mingguan</h2><p>Untuk repeat mingguan, API mendukung repeat_days seperti mon,tue,wed. Form web saat ini memakai hari dari tanggal mulai sebagai default.</p><div class="empty">Data jadwal yang dibuat di web langsung tersedia untuk Flutter.</div></article></section>
            <section style="margin-top:18px" class="panel"><h2>Semua jadwal</h2><div class="list" style="margin-top:14px">@forelse($schedules as $schedule)<div class="item"><div class="item-main"><strong>{{ $schedule->title }}</strong><span>{{ $schedule->category ?: 'Tanpa kategori' }} · {{ $schedule->start_at->format('d M Y H:i') }}</span></div><div class="actions"><span class="badge b-primary">{{ $schedule->repeat }}</span><form method="POST" action="{{ route('web.life-schedules.destroy', $schedule) }}">@csrf @method('DELETE')<button class="btn btn-danger" type="submit">Hapus</button></form></div></div>@empty<div class="empty">Belum ada jadwal.</div>@endforelse</div></section>
        @endif
    </main>
</div>
</body>
</html>
