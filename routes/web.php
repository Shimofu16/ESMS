<?php

use App\Http\Controllers\SMS\BackUpController;
use App\Http\Controllers\SMS\SubjectController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Auth::routes();





//Dashboard

//  Route::get('/',[App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard.index')->middleware(['auth',':Dashboard ']);
Route::get('/', [App\Http\Controllers\EnrollNewStudentController::class, 'index'])->name('enrollment.form.index');

Route::group(['prefix' => 'dashboard', 'middleware' => ['auth']], function () {
    Route::get('/', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard.index');
});

//System Maintenance
Route::group(['prefix' => 'system-maintenance', 'middleware' => ['auth']], function () {
    Route::get('/', [App\Http\Controllers\SystemMaintenanceController::class, 'index'])->name('sys_main.index');
});

//Track
Route::group(['prefix' => 'track', 'middleware' => ['auth']], function () {
    Route::post('/store', [App\Http\Controllers\TrackController::class, 'store'])->name('track.store');
});

//Strand
Route::group(['prefix' => 'strand', 'middleware' => ['auth']], function () {
    Route::post('/store', [App\Http\Controllers\StrandController::class, 'store'])->name('strand.store');
});

//Specialization
Route::group(['prefix' => 'specialization', 'middleware' => ['auth']], function () {
    Route::post('/store', [App\Http\Controllers\SpecializationController::class, 'store'])->name('specialization.store');
});

//Section
Route::group(['prefix' => 'section', 'middleware' => ['auth']], function () {
    Route::get('/index', [App\Http\Controllers\SectionController::class, 'index'])->name('section.index');
    Route::get('/class-list/{id}', [App\Http\Controllers\SectionController::class, 'show'])->name('section.show');
    Route::post('/store', [App\Http\Controllers\SectionController::class, 'store'])->name('section.store');
});

//AddSectionToStudent
Route::group(['prefix' => 'add-section-to-student', ['auth', ':Section ']], function () {

    Route::put('/store', [App\Http\Controllers\AddStudentoSectionController::class, 'store'])->name('add_student_to_section.store');
});

//SchoolYear
Route::group(['prefix' => 'school-year', 'middleware' => ['auth']], function () {
    Route::post('/store', [App\Http\Controllers\SchoolYearController::class, 'store'])->name('school_year.store');
});


//Student
Route::group(['prefix' => 'enroll_new_student', 'middleware' => ['auth']], function () {
    Route::get('/create', [App\Http\Controllers\EnrollNewStudentController::class, 'create'])->name('enroll_new_student.create');
    Route::post('/store', [App\Http\Controllers\EnrollNewStudentController::class, 'store'])->name('enroll_new_student.store');
    Route::get('/get_strand', [App\Http\Controllers\EnrollNewStudentController::class, 'get_strand'])->name('get_strand');
    Route::get('/get_specialization', [App\Http\Controllers\EnrollNewStudentController::class, 'get_specialization'])->name('get_specialization');
    Route::post('/enrollmentFormStore', [App\Http\Controllers\EnrollNewStudentController::class, 'enrollmentFormStore'])->name('enrollmentForm.store');
});

//Student
Route::group(['prefix' => 'import_student', 'middleware' => ['auth']], function () {
    Route::get('/create', [App\Http\Controllers\ImportEnrollStudentController::class, 'create'])->name('import_student.create');
    Route::post('/import', [App\Http\Controllers\ImportEnrollStudentController::class, 'import'])->name('import_student.store');
});


// Enrollment Form
// Route::get('/enrollmentForm', function () {
//     return view('pages.eform');
// })->name('eform.index');


//Student
Route::group(['prefix' => 'enroll_existing_student', 'middleware' => ['auth']], function () {
    Route::get('/create', [App\Http\Controllers\EnrollExistingStudentController::class, 'create'])->name('enroll_existing_student.create');
    Route::post('/store', [App\Http\Controllers\EnrollExistingStudentController::class, 'store'])->name('enroll_existing_student.store');
});

//Student Record - Enrolled student
Route::group(['prefix' => 'student-records', 'middleware' => ['auth']], function () {
    Route::get('/enrolled_student', [App\Http\Controllers\EnrolledStudentController::class, 'index'])->name('enrolled_student.index');
    Route::get('/show/{student_id}', [App\Http\Controllers\EnrolledStudentController::class, 'show'])->name('enrolled_student.show');
    Route::get('/edit/{student_id}', [App\Http\Controllers\EnrolledStudentController::class, 'edit'])->name('enrolled_student.edit');
    Route::put('/update/{student_id}', [App\Http\Controllers\EnrolledStudentController::class, 'update'])->name('enrolled_student.update');
    Route::put('/drop/{id}', [App\Http\Controllers\EnrolledStudentController::class, 'drop'])->name('enrolled_student.drop');
});

//Enroll Student Subject
Route::group(['prefix' => 'enroll_student_subject', 'middleware' => ['auth']], function () {
    Route::get('/create/{student_id}', [App\Http\Controllers\SMS\EnrollStudentSubjectController::class, 'create'])->name('enroll_student_subject.create');
    Route::post('/store/{student_id}', [App\Http\Controllers\SMS\EnrollStudentSubjectController::class, 'store'])->name('enroll_student_subject.store');
});

//Documents
Route::group(['prefix' => 'document', 'middleware' => ['auth']], function () {
    Route::post('/store/{id}', [App\Http\Controllers\DocumentController::class, 'store'])->name('document.store');
    Route::post('/update/{id}', [App\Http\Controllers\DocumentController::class, 'update'])->name('document.update');
    Route::get('/download/{id}/{Document}', [App\Http\Controllers\DocumentController::class, 'download'])->name('document.download');
});

//Printables
Route::group(['prefix' => 'printables', 'middleware' => ['auth']], function () {
    Route::get('/indexSIS/{student_id}', [App\Http\Controllers\PrintableController::class, 'index_sis'])->name('sis.index');
    Route::get('/indexSOA/{id}', [App\Http\Controllers\PrintableController::class, 'index_soa'])->name('soa.index');
});

//Dropouts
Route::group(['prefix' => 'dropout', 'middleware' => ['auth']], function () {
    Route::get('/index', [App\Http\Controllers\DropoutController::class, 'index'])->name('dropout.index');
});

//Alumni
Route::group(['prefix' => 'alumni', 'middleware' => ['auth']], function () {
    Route::get('/index', [App\Http\Controllers\AlumniController::class, 'index'])->name('alumni.index');
});

Route::group(['prefix' => 'act_sy_sem', 'middleware' => ['auth']], function () {
    //Active Sy Sem
    Route::put('update/{id}', [App\Http\Controllers\ActSYSemController::class, 'update'])->name('act_sy_sem.update');
});

//Accounting - Billing
Route::group(['prefix' => 'billing', 'middleware' => ['auth']], function () {
    Route::get('/index', [App\Http\Controllers\BillingController::class, 'index'])->name('billing.index');
    Route::get('/show/{student_id}', [App\Http\Controllers\BillingController::class, 'show'])->name('billing.show');
    Route::post('/store', [App\Http\Controllers\BillingController::class, 'store'])->name('billing.store');
    Route::get('/batchCreate', [App\Http\Controllers\BillingController::class, 'batchCreate'])->name('batch.create');
    Route::post('/batchStore', [App\Http\Controllers\BillingController::class, 'batchStore'])->name('batch.store');
});

//Accounting - Payment
Route::group(['prefix' => 'payment', 'middleware' => ['auth']], function () {
    Route::get('/index', [App\Http\Controllers\PaymentController::class, 'index'])->name('payment.index');
    Route::get('/show/{id}', [App\Http\Controllers\PaymentController::class, 'show'])->name('payment.show');
    Route::post('/store', [App\Http\Controllers\PaymentController::class, 'store'])->name('payment.store');
});

//Accounting - Report
Route::group(['prefix' => 'report', 'middleware' => ['auth']], function () {
    Route::get('/index', [App\Http\Controllers\Bill_Pay_Report_Controller::class, 'index'])->name('acc_report.index');
    Route::get('/show/{id}', [App\Http\Controllers\Bill_Pay_Report_Controller::class, 'show'])->name('acc_report.show');
});

//Accounting - Report
Route::group(['prefix' => 'memo', 'middleware' => ['auth']], function () {
    Route::get('/index', [App\Http\Controllers\MemoController::class, 'index'])->name('memo.index');
    Route::get('/show/{id}', [App\Http\Controllers\MemoController::class, 'show'])->name('memo.show');
    Route::post('/store', [App\Http\Controllers\MemoController::class, 'store'])->name('memo.store');
});



//Reports
Route::group(['prefix' => 'reports', 'middleware' => ['auth']], function () {
    Route::get('/yearly_report', [App\Http\Controllers\ReportController::class, 'yearly_report_index'])->name('yearly_report.index');
    Route::get('/student_list', [App\Http\Controllers\ReportController::class, 'student_list_index'])->name('student_list.index');
    Route::get('/document_submission', [App\Http\Controllers\ReportController::class, 'document_submission_index'])->name('document_submission.index');
    Route::get('/contact_info_sheet', [App\Http\Controllers\ReportController::class, 'contact_info_sheet_index'])->name('contact_info_sheet.index');
});

//Graduates
Route::group(['prefix' => 'reports', 'middleware' => ['auth']], function () {
    Route::get('/graduate_create', [App\Http\Controllers\GraduateController::class, 'create'])->name('graduate.create');
    Route::post('/graduate_store', [App\Http\Controllers\GraduateController::class, 'store'])->name('graduate.store');
});

//Graduates
Route::group(['prefix' => 'change-pass', 'middleware' => 'auth'], function () {
    Route::get('/index', [App\Http\Controllers\ChangePassController::class, 'index'])->name('changePass.index');
    Route::post('/update', [App\Http\Controllers\ChangePassController::class, 'update'])->name('changePass.update');
});

// Fees
Route::prefix('fee')
    ->name('fee.')
    ->middleware(['auth'])
    ->group(function () {
        Route::get('/', [App\Http\Controllers\SMS\FeeController::class, 'index'])->name('index');
        Route::post('/store', [App\Http\Controllers\SMS\FeeController::class, 'store'])->name('store');
        Route::put('/update/{id}', [App\Http\Controllers\SMS\FeeController::class, 'update'])->name('update');
        Route::delete('/destroy/{id}', [App\Http\Controllers\SMS\FeeController::class, 'destroy'])->name('destroy');
    });
// Fees
Route::prefix('transaction')
    ->name('transaction.')
    ->middleware(['auth'])
    ->group(function () {
        Route::get('/create', [App\Http\Controllers\SMS\PaymentTransaction::class, 'create'])->name('create');
        Route::get('/{id?}', [App\Http\Controllers\SMS\PaymentTransaction::class, 'index'])->name('index');
        Route::post('/store', [App\Http\Controllers\SMS\PaymentTransaction::class, 'store'])->name('store');
    });
// Subjects
Route::prefix('subject')
    ->name('subject.')
    ->middleware(['auth'])
    ->group(function () {
        Route::get('/create', [App\Http\Controllers\SMS\SubjectController::class, 'create'])->name('create');
        Route::get('/{grade_level_id}/{specialization_id?}', [App\Http\Controllers\SMS\SubjectController::class, 'index'])->name('index');
        Route::post('/store', [App\Http\Controllers\SMS\SubjectController::class, 'store'])->name('store');
        Route::put('/update/{id}', [App\Http\Controllers\SMS\SubjectController::class, 'update'])->name('update');
        Route::delete('/destroy/{id}', [App\Http\Controllers\SMS\SubjectController::class, 'destroy'])->name('destroy');
    });
// Teachers
Route::prefix('teacher')
    ->name('teacher.')
    ->middleware(['auth'])
    ->group(function () {
        Route::get('/', [App\Http\Controllers\SMS\TeacherController::class, 'index'])->name('index');
        Route::get('/{id}', [App\Http\Controllers\SMS\TeacherController::class, 'show'])->name('show');
        Route::post('/store', [App\Http\Controllers\SMS\TeacherController::class, 'store'])->name('store');
        Route::put('/update/{id}', [App\Http\Controllers\SMS\TeacherController::class, 'update'])->name('update');
        Route::delete('/destroy/{id}', [App\Http\Controllers\SMS\TeacherController::class, 'destroy'])->name('destroy');
    });
// Schedules
Route::prefix('schedule')
    ->name('schedule.')
    ->middleware(['auth'])
    ->group(function () {
        Route::get('/', [App\Http\Controllers\SMS\ScheduleController::class, 'index'])->name('index');
        Route::get('/{section_id}', [App\Http\Controllers\SMS\ScheduleController::class, 'show'])->name('show');
        Route::post('/store', [App\Http\Controllers\SMS\ScheduleController::class, 'store'])->name('store');
        Route::put('/update/{id}', [App\Http\Controllers\SMS\ScheduleController::class, 'update'])->name('update');
        Route::delete('/destroy/{id}', [App\Http\Controllers\SMS\ScheduleController::class, 'destroy'])->name('destroy');
    });
// Users
Route::prefix('user')
    ->name('user.')
    ->middleware(['auth'])
    ->group(function () {
        Route::get('/', [App\Http\Controllers\SMS\UserController::class, 'index'])->name('index');
        Route::post('/store', [App\Http\Controllers\SMS\UserController::class, 'store'])->name('store');
        Route::get('/{id}/activities', [App\Http\Controllers\SMS\UserController::class, 'show'])->name('show');
        Route::put('/update/{id}', [App\Http\Controllers\SMS\UserController::class, 'update'])->name('update');
        Route::delete('/destroy/{id}', [App\Http\Controllers\SMS\UserController::class, 'destroy'])->name('destroy');
    });

//Graduates
Route::prefix('backups')
    ->name('backups.')
    ->middleware(['auth'])
    ->group(function () {
        Route::get('/create', [BackUpController::class,'create'])->name('create');
        Route::get('/download/{file_name}', [BackUpController::class,'download'])->name('download');
        Route::delete('/delete/{file_name}', [BackUpController::class,'delete'])->name('delete');
    });
// //Enrollment
//  Route::get('/enrollment', function () {
//      return view('pages.Enrollment.index');
//  })->name('enrollment.index')->middleware('auth');


Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('user-logout');
Route::post('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
