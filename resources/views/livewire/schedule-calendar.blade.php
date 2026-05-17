<section class="calendar-shell">
    <article class="panel calendar-card">
        <div class="calendar-head">
            <div>
                <h2 class="calendar-title">
                    {{ $context === 'dashboard' ? 'Kalender' : 'Kalender Jadwal' }} {{ $calendarMonth->translatedFormat('F Y') }}
                </h2>
                <p>{{ $context === 'dashboard' ? 'Ringkasan jadwal dari modul Jadwal Kehidupan.' : 'Kalender agenda bulanan, termasuk jadwal berulang.' }}</p>
            </div>
            <div class="calendar-nav">
                <button type="button" wire:click="previousMonth" aria-label="Bulan sebelumnya"><i class="fa-solid fa-chevron-left"></i></button>
                <button type="button" wire:click="currentMonth" aria-label="Bulan ini"><i class="fa-solid fa-calendar-day"></i></button>
                <button type="button" wire:click="nextMonth" aria-label="Bulan berikutnya"><i class="fa-solid fa-chevron-right"></i></button>
            </div>
        </div>

        <div class="calendar-week notranslate" translate="no">
            <span>Sen</span><span>Sel</span><span>Rab</span><span>Kam</span><span>Jum</span><span>Sab</span><span>Min</span>
        </div>

        <div class="calendar-grid" wire:loading.class="is-loading">
            @foreach ($calendarDays as $day)
                <button type="button" class="calendar-day {{ $day['in_month'] ? '' : 'is-muted' }} {{ $day['is_today'] ? 'is-today' : '' }} {{ $day['is_selected'] ? 'is-selected' : '' }}" wire:click="selectDate('{{ $day['date']->toDateString() }}')" wire:key="calendar-day-{{ $day['date']->toDateString() }}">
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
                </button>
            @endforeach
        </div>
    </article>

    <aside class="schedule-side">
        <article class="panel">
            <h2>Jadwal tanggal dipilih</h2>
            <p>{{ $selectedDay->translatedFormat('l, d F Y') }}</p>
            <div class="list">
                @forelse ($selectedSchedules as $schedule)
                    <div class="item" wire:key="selected-schedule-{{ $selectedDay->toDateString() }}-{{ $schedule->id }}">
                        <div class="item-main">
                            <strong>{{ $schedule->title }}</strong>
                            <span>{{ $schedule->start_at->format('H:i') }} - {{ $schedule->end_at->format('H:i') }} · {{ $schedule->category ?: 'Tanpa kategori' }}</span>
                        </div>
                        <span class="badge b-primary">{{ $schedule->repeat }}</span>
                    </div>
                @empty
                    <div class="empty">Tidak ada jadwal pada tanggal ini.</div>
                @endforelse
            </div>
        </article>

        @if ($context === 'dashboard')
            <a class="category" href="{{ route('web.life-schedules.index') }}">
                <i class="icon i-primary fa-solid fa-calendar-plus"></i>
                <strong>Kelola Jadwal</strong>
                <span>Tambah atau hapus agenda</span>
            </a>
        @else
            <article class="panel">
                <h2>Legenda</h2>
                <div class="schedule-legend">
                    <div class="legend-item"><span class="legend-dot"></span>Jadwal aktif</div>
                    <div class="legend-item"><span class="legend-dot" style="background:var(--coral)"></span>Agenda penting</div>
                    <div class="legend-item"><span class="legend-dot" style="background:var(--orange)"></span>Rutinitas</div>
                </div>
            </article>
        @endif
    </aside>
</section>
