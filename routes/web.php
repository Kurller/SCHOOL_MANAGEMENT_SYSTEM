<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\SchoolClassController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\ClassSubjectController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\FeeController;
use App\Http\Controllers\SchoolSettingController;
use App\Http\Controllers\ReportCardController;
use App\Http\Controllers\ReportController;

use App\Http\Controllers\StudentDashboardController;
use App\Http\Controllers\ParentDashboardController;
use App\Http\Controllers\ParentController;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

/*
|--------------------------------------------------------------------------
| Authenticated Users
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| Admin Only
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:Admin'])->group(function () {

    Route::resource('users', UserController::class);

    Route::resource('school-settings', SchoolSettingController::class);

});

/*
|--------------------------------------------------------------------------
| Admin + Principal
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:Admin,Principal'])->group(function () {

    Route::resource('students', StudentController::class);

    Route::resource('teachers', TeacherController::class);

    Route::resource('classes', SchoolClassController::class);

    Route::resource('subjects', SubjectController::class);

    Route::resource('class-subjects', ClassSubjectController::class);

    Route::resource('enrollments', EnrollmentController::class);

});

/*
|--------------------------------------------------------------------------
| Admin + Principal + Teacher
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:Admin,Principal,Teacher'])->group(function () {

    Route::resource('attendances', AttendanceController::class);

    Route::resource('results', ResultController::class);

    Route::get('/report-cards', [ReportCardController::class, 'index'])
        ->name('report-cards.index');

    Route::post('/report-cards', [ReportCardController::class, 'generate'])
        ->name('report-cards.generate');

    Route::get('/report-cards/{id}', [ReportCardController::class, 'show'])
        ->name('report-cards.show');

});

/*
|--------------------------------------------------------------------------
| Admin + Accountant
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:Admin,Accountant'])->group(function () {

    Route::resource('fees', FeeController::class);

    Route::get('/reports', [ReportController::class, 'index'])
        ->name('reports.index');

    Route::get('/reports/export/excel', [ReportController::class, 'exportExcel'])
        ->name('reports.export.excel');

    Route::get('/reports/export/pdf', [ReportController::class, 'exportPdf'])
        ->name('reports.export.pdf');

});

/*
|--------------------------------------------------------------------------
| Student Portal
|--------------------------------------------------------------------------
| Consolidated into a single group. Previously this was split across four
| separate route groups, one of which had no auth middleware at all
| (a security hole) and another of which silently duplicated the
| 'student.results.index' route name pointing at a different controller.
*/

Route::middleware(['auth', 'role:Student'])
    ->prefix('student')
    ->name('student.')
    ->group(function () {

        Route::get('/dashboard', [StudentDashboardController::class, 'index'])
            ->name('dashboard');

        Route::get('/results', [ResultController::class, 'index'])
            ->name('results.index');

        Route::get('/report-cards', [ReportCardController::class, 'index'])
            ->name('report-cards.index');

        Route::get('/attendances', [AttendanceController::class, 'index'])
            ->name('attendances.index');

        Route::get('/fees', [FeeController::class, 'index'])
            ->name('fees.index');

    });

/*
|--------------------------------------------------------------------------
| Parent Portal
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:Parent'])
    ->prefix('parent')
    ->name('parent.')
    ->group(function () {

        Route::get('/dashboard', [ParentDashboardController::class, 'index'])
            ->name('dashboard');

        Route::get('/children', [ParentController::class, 'children'])
            ->name('children');

        Route::get('/results', [ParentController::class, 'results'])
            ->name('results.index');

        Route::get('/fees', [ParentController::class, 'fees'])
            ->name('fees.index');

        Route::get('/report-card/{student}', [ParentController::class, 'reportCard'])
            ->name('report-card');

    });

require __DIR__.'/auth.php';