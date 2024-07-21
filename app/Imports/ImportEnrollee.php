<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Carbon\Carbon;
use App\Models\Student;
use App\Models\Active_SchoolYearAndSem;
use App\Models\Strand;
use App\Models\Student_Specialization_GradeLevel_SchoolYear;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class ImportEnrollee implements
WithMultipleSheets

{
     public function sheets(): array
    {
        return [
            // 'G11' => new ImportGradeElevenEnrollees(),
            'G12' => new ImportGradeTwelveEnrollees(),
        ];
    }

}
