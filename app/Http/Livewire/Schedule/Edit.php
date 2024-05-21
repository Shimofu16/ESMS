<?php

namespace App\Http\Livewire\Schedule;

use App\Helpers\Activity;
use App\Models\SMS\Schedule;
use Illuminate\Support\Collection;
use Livewire\Component;

class Edit extends Component
{
    public $schedule;
    public $days;
    public $selected_day;
    public $start_time, $end_time;
    public function updatedSelectedDay($value)
    {

        $this->days[] = $value;
        if ($value == 'All') {
            // reset days
            $this->days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];
        }
        $this->sortDays();
    }

    private function sortDays()
    {
        $daysOfWeek = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];
        $sorted = new Collection();

        foreach ($this->days as $k => $v) {
            $key = array_search($v, $daysOfWeek);

            if ($key !== FALSE) {
                $sorted[$key] = $v;
            }
        }


        $this->days =   $sorted->sortKeys();
    }
    public function removeDay($index)
    {
        try {
            $this->days->forget($index);
            $this->reset('selected_day');
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }

    private function checkIfHasSchedule(int $semesterId, int $sectionId, string $startTime, string $endTime, $days): bool
    {
        $schedule = Schedule::with('subject', 'teacher', 'section')
            ->where(function ($query) use ($startTime, $endTime) {
                $query->where('start_time', '<', $endTime)
                    ->where('end_time', '>', $startTime);
            })
            ->where('semester_id', $semesterId)
            ->where('section_id', $sectionId)
            ->where('id','!=' ,$this->schedule->id)
            ->first();

        if ($schedule) {

            $scheduleDays = collect($schedule->days);

            foreach ($days as $day) {
                if ($scheduleDays->contains($day)) {
                    return true;
                }
            }
        }

        return false;
    }
    public function save()
    {
        try {
            $this->validate([
                'start_time' => 'required',
                'end_time' => 'required',
            ]);
            $hasSchedule = self::checkIfHasSchedule($this->schedule->semester_id, $this->schedule->section_id, $this->start_time, $this->end_time, $this->days);
            if ($hasSchedule) {
                return redirect(request()->header('Referer'))->with('toast_error', 'Schedule already exists.');
            }
            // $setting = getCurrentSettings();
            $this->schedule->update([
                'days' => $this->days,
                'start_time' => $this->start_time,
                'end_time' => $this->end_time,
            ]);
            Activity::log(auth()->user()->id, 'Schedule Management', 'Updated schedule');
            $this->reset();

            return redirect(request()->header('Referer'))->with('toast_success', 'Schedule successfully updated.');
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }
    public function mount()
    {
        foreach ($this->schedule->days as $key => $day) {
            $this->days[] = $day;
        }
        $this->sortDays();
        $this->start_time = $this->schedule->start_time;
        $this->end_time = $this->schedule->end_time;
    }
    public function render()
    {
        return view('livewire.schedule.edit');
    }
}
