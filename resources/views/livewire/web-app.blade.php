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

<div class="app">
    <aside class="sidebar">
        <a class="brand" href="{{ route('dashboard') }}" wire:navigate>
            <span class="brand-mark">A</span>
            <span><span class="brand-title">AlfaApps</span><span class="brand-sub">Personal Dashboard</span></span>
        </a>
        <div class="sidebar-profile">
            <span class="sidebar-avatar">@if($user->avatar)<img src="{{ $user->avatar }}" alt="{{ $user->name }}">@else{{ strtoupper(substr($user->name,0,1)) }}@endif</span>
            <span><strong>{{ $user->name }}</strong><span>{{ $user->email }}</span></span>
        </div>
        <nav class="nav">
            @foreach ($nav as $item)
                <a class="{{ $active($item['key']) }}" href="{{ $item['route'] }}" wire:navigate><i class="fa-solid {{ $item['icon'] }}"></i>{{ $item['label'] }}</a>
            @endforeach
        </nav>
        <form method="POST" action="{{ route('logout') }}">@csrf<button class="logout" type="submit"><i class="fa-solid fa-right-from-bracket"></i>Logout</button></form>
    </aside>

    <main class="main">
        <header class="topbar">
            <div class="topbar-left">
                <button class="hamburger" type="button" aria-label="Menu"><span></span><span></span><span></span></button>
                <p class="eyebrow">{{ now()->translatedFormat('l, d F Y') }}</p>
                <h1 class="title">{{ $page === 'dashboard' ? 'Diary' : collect($nav)->firstWhere('key', $page)['label'] ?? 'AlfaWeb' }}</h1>
                <label class="search-box">
                    <input type="search" placeholder="Search">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </label>
            </div>
            <div class="top-actions">
                <button class="icon-button add" type="button" aria-label="Tambah"><i class="fa-solid fa-plus"></i></button>
                <button class="icon-button" type="button" aria-label="Mode"><i class="fa-solid fa-moon"></i></button>
                <button class="icon-button" type="button" aria-label="Pesan"><i class="fa-regular fa-message"></i><span class="notif">{{ $summary['plans_today'] }}</span></button>
                <button class="icon-button" type="button" aria-label="Notifikasi"><i class="fa-regular fa-bell"></i><span class="notif">{{ $summary['today_schedule_count'] }}</span></button>
                <form method="POST" action="{{ route('logout') }}">@csrf<button class="login-pill" type="submit">Logout</button></form>
            </div>
        </header>

        <div class="content">

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
                <article class="card hero-card"><small>Saldo bulan ini</small><span class="big">{{ $money($summary['month_balance']) }}</span><div class="mini-row"><div class="mini"><small>Pemasukan</small><strong>{{ $money($summary['month_income']) }}</strong></div><div class="mini"><small>Pengeluaran</small><strong>{{ $money($summary['month_expense']) }}</strong></div></div></article>
                <article class="panel"><h2>Target aktif</h2><p>Target pendapatan berjalan seperti di aplikasi Flutter.</p>@if($activeTarget)<div class="item"><div class="item-main"><strong>{{ $activeTarget->title }}</strong><span>{{ $money($targetRealized) }} dari {{ $money($activeTarget->target_amount) }}</span></div><span class="badge b-primary">{{ number_format($targetProgress,1,',','.') }}%</span></div><div class="progress" style="margin-top:12px"><span style="width:{{ $targetProgress }}%"></span></div>@else<div class="empty">Belum ada target pendapatan aktif.</div>@endif</article>
            </section>
            <section style="margin-top:18px" class="category-grid">@foreach(array_slice($nav, 1) as $item)<a class="category" href="{{ $item['route'] }}" wire:navigate><i class="icon i-primary fa-solid {{ $item['icon'] }}"></i><strong>{{ $item['label'] }}</strong><span>Buka modul</span></a>@endforeach</section>
            <livewire:schedule-calendar context="dashboard" :month="$month" />
            <section style="margin-top:18px" class="grid-2">
                <article class="panel"><h2>Aktivitas keuangan</h2><p>Catatan terbaru.</p><div class="list">@forelse($recentRecords as $record)<div class="item"><div class="item-main"><strong>{{ $record->category ?: ucfirst($record->type) }}</strong><span>{{ $record->occurred_at->format('d M Y') }} · {{ $record->note }}</span></div><strong class="{{ $record->type === 'income' ? 'text-income' : 'text-expense' }}">{{ $record->type === 'income' ? '+' : '-' }} {{ $money($record->amount) }}</strong></div>@empty<div class="empty">Belum ada catatan keuangan.</div>@endforelse</div></article>
                <article class="panel"><h2>Rencana terbuka</h2><p>Checklist pekerjaan aktif.</p><div class="list">@forelse($openPlans as $plan)<div class="item"><div class="item-main"><strong>{{ $plan->title }}</strong><span>{{ $plan->due_at?->format('d M Y H:i') ?? 'Tanpa deadline' }}</span></div><span class="badge {{ $plan->priority === 'high' ? 'b-coral' : ($plan->priority === 'medium' ? 'b-orange' : 'b-primary') }}">{{ $plan->priority ?? 'low' }}</span></div>@empty<div class="empty">Belum ada rencana terbuka.</div>@endforelse</div></article>
            </section>
        @endif

        @if ($page === 'finance')
            <section class="grid-2">
                <article class="card hero-card"><small>Saldo total</small><span class="big">{{ $money($financeTotals['balance']) }}</span><div class="mini-row"><div class="mini"><small>Income</small><strong>{{ $money($financeTotals['income']) }}</strong></div><div class="mini"><small>Expense</small><strong>{{ $money($financeTotals['expense']) }}</strong></div></div></article>
                <form class="form-card" wire:submit="storeFinance"><h2>Catat transaksi</h2><p>Data ini langsung tersedia untuk Flutter.</p><div class="form-grid"><div class="field"><label>Tipe</label><select wire:model="financeType"><option value="income">Pemasukan</option><option value="expense">Pengeluaran</option></select></div><div class="field"><label>Jumlah</label><input wire:model="financeAmount" type="number" min="0" step="1000" required></div><div class="field"><label>Kategori</label><input wire:model="financeCategory" placeholder="Gaji, Makan, Transport"></div><div class="field"><label>Tanggal</label><input wire:model="financeOccurredAt" type="datetime-local" required></div><div class="field full"><label>Catatan</label><textarea wire:model="financeNote" rows="2"></textarea></div><div class="field full"><button class="btn btn-primary" type="submit"><i class="fa-solid fa-plus"></i>Simpan</button></div></div></form>
            </section>
            <section style="margin-top:18px" class="panel"><div class="tabs"><button class="btn {{ !$financeFilter ? 'btn-primary' : 'btn-soft' }}" wire:click="setFinanceFilter(null)">Semua</button><button class="btn {{ $financeFilter === 'income' ? 'btn-primary' : 'btn-soft' }}" wire:click="setFinanceFilter('income')">Pemasukan</button><button class="btn {{ $financeFilter === 'expense' ? 'btn-primary' : 'btn-soft' }}" wire:click="setFinanceFilter('expense')">Pengeluaran</button></div><div class="list">@forelse($records as $record)<div class="item" wire:key="finance-{{ $record->id }}"><div class="item-main"><strong>{{ $record->category ?: ucfirst($record->type) }}</strong><span>{{ $record->occurred_at->format('d M Y H:i') }} · {{ $record->note ?: '-' }}</span></div><div class="actions"><strong class="{{ $record->type === 'income' ? 'text-income' : 'text-expense' }}">{{ $record->type === 'income' ? '+' : '-' }} {{ $money($record->amount) }}</strong><button class="btn btn-danger" wire:click="destroyFinance({{ $record->id }})" wire:confirm="Hapus catatan ini?">Hapus</button></div></div>@empty<div class="empty">Belum ada catatan.</div>@endforelse</div></section>
        @endif

        @if ($page === 'income-targets')
            <section class="grid-2"><form class="form-card" wire:submit="storeIncomeTarget"><h2>Target pendapatan</h2><p>Buat target mingguan, bulanan, atau tahunan.</p><div class="form-grid"><div class="field full"><label>Judul</label><input wire:model="incomeTitle" required></div><div class="field"><label>Periode</label><select wire:model="incomePeriod"><option value="weekly">Mingguan</option><option value="monthly">Bulanan</option><option value="yearly">Tahunan</option></select></div><div class="field"><label>Target</label><input wire:model="incomeTargetAmount" type="number" min="0" step="1000" required></div><div class="field"><label>Mulai</label><input wire:model="incomePeriodStart" type="date" required></div><div class="field"><label>Selesai</label><input wire:model="incomePeriodEnd" type="date" required></div><div class="field full"><label>Catatan</label><textarea wire:model="incomeNote" rows="2"></textarea></div><div class="field full"><button class="btn btn-primary" type="submit">Simpan target</button></div></div></form><article class="panel"><h2>Ringkasan</h2><p>Target aktif muncul di dashboard Flutter dan web.</p>@if($activeTarget)<div class="item"><div class="item-main"><strong>{{ $activeTarget->title }}</strong><span>{{ $money($targetRealized) }} / {{ $money($activeTarget->target_amount) }}</span></div><span class="badge b-primary">{{ number_format($targetProgress,1,',','.') }}%</span></div>@else<div class="empty">Belum ada target aktif.</div>@endif</article></section>
            <section style="margin-top:18px" class="grid-3">@forelse($targets as $target)<article class="panel" wire:key="income-target-{{ $target->id }}"><h2>{{ $target->title }}</h2><p>{{ ucfirst($target->period) }} · {{ $target->period_start->format('d M Y') }} - {{ $target->period_end->format('d M Y') }}</p><div class="progress"><span style="width:{{ $target->progress }}%"></span></div><p style="margin-top:12px">{{ $money($target->realized_amount) }} / {{ $money($target->target_amount) }}</p><button class="btn btn-danger" wire:click="destroyIncomeTarget({{ $target->id }})" wire:confirm="Hapus target ini?">Hapus</button></article>@empty<div class="panel"><div class="empty">Belum ada target.</div></div>@endforelse</section>
        @endif

        @if ($page === 'work-targets')
            <section class="grid-2"><form class="form-card" wire:submit="storeWorkTarget"><h2>Target pekerjaan</h2><p>Target karier/proyek dengan progress.</p><div class="form-grid"><div class="field full"><label>Judul</label><input wire:model="workTargetTitle" required></div><div class="field"><label>Status</label><select wire:model="workTargetStatus"><option value="pending">Pending</option><option value="on_progress">On progress</option><option value="done">Done</option></select></div><div class="field"><label>Progress</label><input wire:model="workTargetProgress" type="number" min="0" max="100"></div><div class="field"><label>Deadline</label><input wire:model="workTargetDeadline" type="date"></div><div class="field full"><label>Deskripsi</label><textarea wire:model="workTargetDescription" rows="3"></textarea></div><div class="field full"><button class="btn btn-primary" type="submit">Simpan target</button></div></div></form><article class="panel"><h2>Filter</h2><div class="tabs"><button class="btn {{ !$workTargetFilter ? 'btn-primary' : 'btn-soft' }}" wire:click="setWorkTargetFilter(null)">Semua</button><button class="btn {{ $workTargetFilter === 'pending' ? 'btn-primary' : 'btn-soft' }}" wire:click="setWorkTargetFilter('pending')">Pending</button><button class="btn {{ $workTargetFilter === 'on_progress' ? 'btn-primary' : 'btn-soft' }}" wire:click="setWorkTargetFilter('on_progress')">Progress</button><button class="btn {{ $workTargetFilter === 'done' ? 'btn-primary' : 'btn-soft' }}" wire:click="setWorkTargetFilter('done')">Done</button></div></article></section>
            <section style="margin-top:18px" class="grid-3">@forelse($workTargets as $target)<article class="panel" wire:key="work-target-{{ $target->id }}"><h2>{{ $target->title }}</h2><p>{{ $target->deadline?->format('d M Y') ?? 'Tanpa deadline' }}</p><div class="progress"><span style="width:{{ $target->progress }}%"></span></div><p style="margin-top:12px">{{ $target->progress }}% · {{ str_replace('_',' ', $target->status) }}</p><button class="btn btn-danger" wire:click="destroyWorkTarget({{ $target->id }})" wire:confirm="Hapus target pekerjaan ini?">Hapus</button></article>@empty<div class="panel"><div class="empty">Belum ada target pekerjaan.</div></div>@endforelse</section>
        @endif

        @if ($page === 'work-plans')
            <section class="grid-2"><form class="form-card" wire:submit="storeWorkPlan"><h2>Rencana pekerjaan</h2><p>Checklist task pekerjaan seperti di Flutter.</p><div class="form-grid"><div class="field full"><label>Judul</label><input wire:model="workPlanTitle" required></div><div class="field"><label>Target terkait</label><select wire:model="workPlanTargetId"><option value="">Tanpa target</option>@foreach($allWorkTargets as $target)<option value="{{ $target->id }}">{{ $target->title }}</option>@endforeach</select></div><div class="field"><label>Prioritas</label><select wire:model="workPlanPriority"><option value="low">Low</option><option value="medium">Medium</option><option value="high">High</option></select></div><div class="field"><label>Deadline</label><input wire:model="workPlanDueAt" type="datetime-local"></div><div class="field full"><label>Deskripsi</label><textarea wire:model="workPlanDescription" rows="3"></textarea></div><div class="field full"><button class="btn btn-primary" type="submit">Simpan rencana</button></div></div></form><article class="panel"><h2>Hari ini</h2><p>{{ $summary['plans_today'] }} rencana hari ini, {{ $summary['plans_overdue'] }} terlambat.</p></article></section>
            <section style="margin-top:18px" class="panel"><div class="list">@forelse($workPlans as $plan)<div class="item" wire:key="work-plan-{{ $plan->id }}"><div class="item-main"><strong>{{ $plan->title }}</strong><span>{{ $plan->workTarget?->title ?? 'Tanpa target' }} · {{ $plan->due_at?->format('d M Y H:i') ?? 'Tanpa deadline' }}</span></div><div class="actions"><span class="badge {{ $plan->is_done ? 'b-mint' : ($plan->priority === 'high' ? 'b-coral' : 'b-primary') }}">{{ $plan->is_done ? 'Selesai' : $plan->priority }}</span><button class="btn btn-soft" wire:click="toggleWorkPlan({{ $plan->id }})">Toggle</button><button class="btn btn-danger" wire:click="destroyWorkPlan({{ $plan->id }})" wire:confirm="Hapus rencana ini?">Hapus</button></div></div>@empty<div class="empty">Belum ada rencana pekerjaan.</div>@endforelse</div></section>
        @endif

        @if ($page === 'life-schedules')
            <livewire:schedule-calendar context="life-schedules" :month="$month" />
            <section style="margin-top:18px" class="grid-2"><form class="form-card" wire:submit="storeSchedule"><h2>Tambah jadwal</h2><p>Agenda harian/mingguan untuk web dan Flutter.</p><div class="form-grid"><div class="field full"><label>Judul</label><input wire:model="scheduleTitle" required></div><div class="field"><label>Kategori</label><input wire:model="scheduleCategory" placeholder="Rutinitas, Agenda"></div><div class="field"><label>Repeat</label><select wire:model="scheduleRepeat"><option value="none">Tidak ulang</option><option value="daily">Harian</option><option value="weekly">Mingguan</option><option value="monthly">Bulanan</option></select></div><div class="field"><label>Mulai</label><input wire:model="scheduleStartAt" type="datetime-local" required></div><div class="field"><label>Selesai</label><input wire:model="scheduleEndAt" type="datetime-local" required></div><div class="field"><label>Warna</label><input wire:model="scheduleColor"></div><div class="field full"><label>Deskripsi</label><textarea wire:model="scheduleDescription" rows="3"></textarea></div><div class="field full"><button class="btn btn-primary" type="submit">Simpan jadwal</button></div></div></form><article class="panel"><h2>Tips repeat mingguan</h2><p>Untuk repeat mingguan, API mendukung repeat_days seperti mon,tue,wed. Form web saat ini memakai hari dari tanggal mulai sebagai default.</p><div class="empty">Data jadwal yang dibuat di web langsung tersedia untuk Flutter.</div></article></section>
            <section style="margin-top:18px" class="panel"><h2>Semua jadwal</h2><div class="list" style="margin-top:14px">@forelse($schedules as $schedule)<div class="item" wire:key="schedule-{{ $schedule->id }}"><div class="item-main"><strong>{{ $schedule->title }}</strong><span>{{ $schedule->category ?: 'Tanpa kategori' }} · {{ $schedule->start_at->format('d M Y H:i') }}</span></div><div class="actions"><span class="badge b-primary">{{ $schedule->repeat }}</span><button class="btn btn-danger" wire:click="destroySchedule({{ $schedule->id }})" wire:confirm="Hapus jadwal ini?">Hapus</button></div></div>@empty<div class="empty">Belum ada jadwal.</div>@endforelse</div></section>
        @endif
        <div class="footer">Copyright © Designed & Developed by <span>AlfaApps</span> {{ now()->year }}</div>
        </div>
    </main>
</div>
