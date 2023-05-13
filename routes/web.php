<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\AdminJobContoller;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminTaskController;
use App\Http\Controllers\admin\AdminCategoryProject;
use App\Http\Controllers\Admin\AdminKanbanController;
use App\Http\Controllers\Admin\AdminProjectAttachmnet;
use App\Http\Controllers\Admin\AdminProjectController;
use App\Http\Controllers\Admin\AdminEmployeeController;
use App\Http\Controllers\Admin\AdminHolidaysController;
use App\Http\Controllers\Employee\Auth\LoginController;
use App\Http\Controllers\Admin\ProjectsReportController;
use App\Http\Controllers\Admin\AdminAttendanceController;
use App\Http\Controllers\Admin\AdminDepartmentController;
use App\Http\Controllers\Employee\EmployeeHomeController;
use App\Http\Controllers\Admin\AttendancesReportController;
use App\Http\Controllers\Admin\ArchiveEmp\AdminEmpArchiveController;
use App\Http\Controllers\Admin\ArchivePro\AdminProArchiveController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name("home.index");
Route::get('/about', [HomeController::class, 'about'])->name("home.about");

// Route::get('/phpinfo', function() {
//     return phpinfo();
// });
Route::middleware('auth:web')->group(function () {
    Route::get('/admin', [AdminHomeController::class, 'index'])->name("admin.home.index");

    Route::resource('/admin/employees', AdminEmployeeController::class)->names([
        'index' => 'admin.employees.index',
        'create' => 'admin.employees.create',
        'store' => 'admin.employees.store',
        'show' => 'admin.employees.show',
        'edit' => 'admin.employees.edit',
        'update' => 'admin.employees.update',
        'destroy' => 'admin.employees.destroy',
    ]);
    Route::resource('/admin/department', AdminDepartmentController::class)->names([
        'index' => 'admin.department.index',
        'create' => 'admin.department.create',
        'store' => 'admin.department.store',
        'show' => 'admin.department.show',
        'edit' => 'admin.department.edit',
        'update' => 'admin.department.update',
        'destroy' => 'admin.department.destroy',
    ]);
    Route::resource('/admin/jobs', AdminJobContoller::class)->names([
        'index' => 'admin.jobs.index',
        'create' => 'admin.jobs.create',
        'store' => 'admin.jobs.store',
        'show' => 'admin.jobs.show',
        'edit' => 'admin.jobs.edit',
        'update' => 'admin.jobs.update',
        'destroy' => 'admin.jobs.destroy',
    ]);
    Route::resource('/admin/projects', AdminProjectController::class)->names([
        'index' => 'admin.projects.index',
        'create' => 'admin.projects.create',
        'store' => 'admin.projects.store',
        'show' => 'admin.projects.show',
        'edit' => 'admin.projects.edit',
        'update' => 'admin.projects.update',
        'destroy' => 'admin.projects.destroy',
    ]);
    Route::post('/admin/projects/{id}', [AdminProjectController::class, 'destroy'])->name('admin.projects.destroy');;
    Route::resource('/admin/holidays', AdminHolidaysController::class)->names([
        'index' => 'admin.holidays.index',
        'create' => 'admin.holidays.create',
        'store' => 'admin.holidays.store',
        'show' => 'admin.holidays.show',
        'edit' => 'admin.holidays.edit',
        'update' => 'admin.holidays.update',
        'destroy' => 'admin.holidays.destroy',
    ]);;
    Route::resource('/admin/tasks', AdminTaskController::class)->names([
        'index' => 'admin.tasks.index',
        'create' => 'admin.tasks.create',
        'store' => 'admin.tasks.store',
        'show' => 'admin.tasks.show',
        'edit' => 'admin.tasks.edit',
        'update' => 'admin.tasks.update',
        'destroy' => 'admin.tasks.destroy',
    ]);
    Route::resource('/admin/category', AdminCategoryProject::class)->names([
        'index' => 'admin.category.index',
        'create' => 'admin.category.create',
        'store' => 'admin.category.store',
        'show' => 'admin.category.show',
        'edit' => 'admin.category.edit',
        'update' => 'admin.category.update',
        'destroy' => 'admin.category.destroy',
    ]);
    Route::get('download/{id}/{file_name}', [AdminProjectController::class, 'get_file']);
    Route::get('View_file/{id}/{file_name}', [AdminProjectController::class, 'open_file']);
    Route::put('/admin/project/{id}/status', [AdminProjectController::class, 'statusUpdate'])->name('admin.project.updateStatus');
    Route::resource('ProjectAttachments', AdminProjectAttachmnet::class);
    Route::put('/admin/tasks/{id}/status', [AdminKanbanController::class, 'updateStatus'])->name('admin.tasks.updateStatus');
    Route::get('/admin/kanban', [AdminKanbanController::class, 'index'])->name('admin.kanban.index');
    Route::put('/admin/tasks/{id}/statusUp', [AdminTaskController::class, 'statusUpdate'])->name('admin.tasksUp.updateStatusList');
    Route::post('/admin/archivePro/deleteAll', [AdminProArchiveController::class, 'deleteAll'])->name('admin.archiveprojects.deleteAll');

    Route::resource('/admin/archiveEmp', AdminEmpArchiveController::class)->names([
        'index' => 'admin.archiveEmployees.index',
        // 'create' => 'admin.archiveEmployees.create',
        'store' => 'admin.archiveEmployees.store',
        // 'show' => 'admin.archiveEmployees.show',
        //  'edit' => 'admin.archiveEmployees.edit',
        'update' => 'admin.archiveEmployees.update',
        'destroy' => 'admin.archiveEmployees.destroy',
    ]);
    Route::post('/admin/archiveEmp/deleteAll', [AdminEmpArchiveController::class, 'deleteAll'])->name('admin.archiveEmployees.deleteAll');
    Route::resource('/admin/archivePro', AdminProArchiveController::class)->names([
        'index' => 'admin.archiveprojects.index',
        // 'create' => 'admin.archiveprojects.create',
        'store' => 'admin.archiveprojects.store',
        // 'show' => 'admin.archiveEmployees.show',
        //  'edit' => 'admin.archiveprojects.edit',
        'update' => 'admin.archiveprojects.update',
        'destroy' => 'admin.archiveprojects.destroy',
    ]);
    Route::resource('/admin/attendance', AdminAttendanceController::class)->names([
        'index' => 'admin.attendance.index',
        'update' => 'admin.attendance.update',
        'destroy' => 'admin.attendance.destroy',
    ]);
    Route::get('/admin/report/projects', [ProjectsReportController::class, 'index'])->name('admin.report-projects.index');
    Route::get('/admin/report/attendances', [AttendancesReportController::class, 'index'])->name('admin.report-attendances.index');

    Route::post('Search_project', [ProjectsReportController::class, 'SearchProjects']);
    Route::post('/notifications/mark-as-read/admin', function (Request $request) {
        $userUnreadNotifications = auth()->user('web')->unreadNotifications;

        if ($userUnreadNotifications) {
            $userUnreadNotifications->markAsRead();
        }

        return redirect()->back();
    });
});
Route::group(['middleware' => ['auth']], function () {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
});

Auth::routes();
