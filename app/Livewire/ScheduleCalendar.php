<?php

namespace App\Livewire;

use App\Models\LifeSchedule;
use App\Support\SharedData;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Livewire\Attributes\On;
use Livewire\Component;

class ScheduleCalendar extends Component
{
    public ?string $month = null;

    public ?string $selectedDate = null;

    public string $context = 'dashboard';

    public function mount(?string $month = null, string $context = 'dashboard'): void
    {
        $this->month = Carbon::parse($month ?: now())->format('Y-m');
        $this->selectedDate = now()->toDateString();
        $this->context = $context;
    }

    public function previousMonth(): void
    {
        $month = $this->calendarMonth()->subMonth();
        $this->month = $month->format('Y-m');
        $this->selectedDate = $month->copy()->startOfMonth()->toDateString();
    }

    public function nextMonth(): void
    {
        $month = $this->calendarMonth()->addMonth();
        $this->month = $month->format('Y-m');
        $this->selectedDate = $month->copy()->startOfMonth()->toDateString();
    }

    public function currentMonth(): void
    {
        $this->month = now()->format('Y-m');
        $this->selectedDate = now()->toDateString();
    }

    public function selectDate(string $date): void
    {
        $selectedDate = Carbon::parse($date);

        $this->selectedDate = $selectedDate->toDateString();
        $this->month = $selectedDate->copy()->startOfMonth()->format('Y-m');
    }

    #[On('schedule-updated')]
    public function refreshCalendar(): void
    {
        // Re-render calendar when schedule data changes in another component.
    }

    public function render()
    {
        $calendarMonth = $this->calendarMonth();
        $schedules = $this->schedules();
        $selectedDate = Carbon::parse($this->selectedDate ?: now());

        return view('livewire.schedule-calendar', [
            'calendarMonth' => $calendarMonth,
            'calendarDays' => $this->buildCalendarDays($schedules, $calendarMonth),
            'selectedDay' => $selectedDate,
            'selectedSchedules' => $schedules
                ->filter(fn (LifeSchedule $schedule) => $schedule->occursOn($selectedDate))
                ->values(),
        ]);
    }

    private function calendarMonth(): Carbon
    {
        return Carbon::parse($this->month)->startOfMonth();
    }

    private function schedules(): Collection
    {
        $user = auth()->user();

        if (! $user) {
            return collect();
        }

        return LifeSchedule::whereIn('user_id', SharedData::userIds($user))
            ->orderBy('start_at')
            ->get();
    }

    private function buildCalendarDays(Collection $schedules, Carbon $month): array
    {
        $start = $month->copy()->startOfMonth()->startOfWeek(Carbon::MONDAY);
        $end = $month->copy()->endOfMonth()->endOfWeek(Carbon::SUNDAY);
        $days = [];

        for ($date = $start->copy(); $date->lte($end); $date->addDay()) {
            $occurrences = $schedules
                ->filter(fn (LifeSchedule $schedule) => $schedule->occursOn($date))
                ->values();

            $days[] = [
                'date' => $date->copy(),
                'in_month' => $date->isSameMonth($month),
                'is_today' => $date->isToday(),
                'is_selected' => $date->toDateString() === $this->selectedDate,
                'schedules' => $occurrences,
            ];
        }

        return $days;
    }
}
