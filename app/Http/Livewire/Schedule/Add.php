<?php

namespace App\Http\Livewire\Schedule;

use App\Helpers\Activity;
use App\Models\Section;
use Livewire\Component;
use App\Models\SMS\Subject;
use App\Models\SMS\Schedule;
use Illuminate\Support\Collection;

class Add extends Component
{

    public $specializations, $teachers, $sections, $subjects, $schedules, $semesters, $days;
    public $specialization_id, $teacher_id, $section_id, $subject_id, $schedule_id, $semester_id, $selected_day;
    public $start_time, $end_time;

    public function updatedSpecializationId($value)
    {
        $this->subjects = Subject::query()->where('specialization_id', $value);
        $this->sections = Section::where('specialization_id', $value)->get();
        if ($this->semester_id) {
            $this->subjects = $this->subjects->where('semester_id', $this->semester_id);
        }
        $this->subjects = $this->subjects->get();
    }
    public function updatedSemesterId($value)
    {
        $this->subjects = Subject::where('specialization_id', $this->specialization_id)->where('semester_id', $value)->get();
    }
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
                'specialization_id' => 'required',
                'semester_id' => 'required',
                'teacher_id' => 'required',
                'section_id' => 'required',
                'subject_id' => 'required',
                'start_time' => 'required',
                'end_time' => 'required',
            ]);
            $hasSchedule = self::checkIfHasSchedule($this->semester_id, $this->section_id, $this->start_time, $this->end_time, $this->days);
            if ($hasSchedule) {
                return redirect(request()->header('Referer'))->with('toast_error', 'Schedule already exists.');
            }
            $setting = getCurrentSettings();
            Schedule::create([
                'teacher_id' => $this->teacher_id,
                'subject_id' => $this->subject_id,
                'section_id' => $this->section_id,
                'school_year_id' => $setting->school_year_id,
                'semester_id' => $this->semester_id,
                'days' => $this->days,
                'start_time' => $this->start_time,
                'end_time' => $this->end_time,
            ]);
            Activity::log(auth()->user()->id, 'Schedule Management', 'Added a new schedule');
            $this->reset();

            return redirect(request()->header('Referer'))->with('toast_success', 'Schedule successfully added.');
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }
    public function mount()
    {
        $this->days = collect();
        $this->specialization_id = null;
        $this->semester_id = null;
    }
    public function render()
    {
        return view('livewire.schedule.add');
    }
}
