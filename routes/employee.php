<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Employee\EmployeeController;
use App\Http\Controllers\Employee\EmployeeHomeController;
use App\Http\Controllers\Employee\EmployeeTaskController;
use App\Http\Controllers\Employee\EmployeeKanbanController;
use App\Http\Controllers\Employee\EmployeeProjectController;

/*
|--------------------------------------------------------------------------
| Employee Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::middleware('auth:employee')->group(function () {
    Route::get('/employee', [EmployeeHomeController::class, 'index'])->name("employee.home.index");
    Route::resource('/employee/tasks', EmployeeTaskController::class)->names([
        'index' => 'employee.tasks.index',
        'create' => 'employee.tasks.create',
        'store' => 'employee.tasks.store',
        'show' => 'employee.tasks.show',
        'edit' => 'employee.tasks.edit',
        'update' => 'employee.tasks.update',
        'destroy' => 'employee.tasks.destroy',
    ]);
    Route::resource('/employee/employees', EmployeeController::class)->names([
        'index' => 'employee.employee.index',
        'create' => 'employee.employee.create',
        'store' => 'employee.employee.store',
        'show' => 'employee.employee.show',
        'edit' => 'employee.employee.edit',
        'update' => 'employee.employee.update',
        'destroy' => 'employee.employee.destroy',
    ]);
    Route::resource('/employee/projects', EmployeeProjectController::class)->names([
        'index' => 'employee.projects.index',
        'create' => 'employee.projects.create',
        'store' => 'employee.projects.store',
        'show' => 'employee.projects.show',
        'edit' => 'employee.projects.edit',
        'update' => 'employee.projects.update',
        'destroy' => 'employee.projects.destroy',
    ]);
    
    Route::put('/employee/tasks/{id}/status', [EmployeeKanbanController::class, 'updateStatus'])->name('employee.tasks.updateStatus');
    Route::put('/employee/tasks/{id}/statusUp', [EmployeeTaskController::class, 'statusUpdate'])->name('employee.tasksUp.updateStatusList');
    Route::get('/employee/kanban', [EmployeeKanbanController::class, 'index'])->name('employee.kanban.index');
    Route::get('/employee/certifacte/{id}',[EmployeeController::class,'printWorkCertifacte'])->name('employee.printWorkCertifacte');
    Route::post('/notifications/mark-as-read', function (Request $request) {
        $userUnreadNotifications = auth()->user()->unreadNotifications;
    
        if ($userUnreadNotifications) {
            $userUnreadNotifications->markAsRead();
        }
    
        return redirect()->back();
    });
});
 Auth::routes();