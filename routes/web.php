<?php

use App\Http\Controllers\admin\AdminCategoryProject;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminTaskController;
use App\Http\Controllers\Admin\AdminProjectController;
use App\Http\Controllers\Admin\AdminEmployeeController;
use App\Http\Controllers\Admin\AdminHolidaysController;
use App\Http\Controllers\Admin\AdminDepartmentController;

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

Route::get('/', [HomeController::class,'index'])->name("home.index");
Route::get('/about', [HomeController::class,'about'])->name("home.about");
Route::get('/admin',[AdminHomeController::class,'index'])->name("admin.home.index");

Route::middleware('auth')->group(function () {
    Route::resource('/admin/employees', AdminEmployeeController::class)->names([
        'index' => 'admin.employees.index',
        'create' => 'admin.employees.create',
        'store' => 'admin.employees.store',
        'show' => 'admin.employees.show',
        'edit' => 'admin.employees.edit',
        'update' => 'admin.employees.update',
        'destroy' => 'admin.employees.destroy',
    ]);   Route::resource('/admin/department', AdminDepartmentController::class)->names([
        'index' => 'admin.department.index',
        'create' => 'admin.department.create',
        'store' => 'admin.department.store',
        'show' => 'admin.department.show',
        'edit' => 'admin.department.edit',
        'update' => 'admin.department.update',
        'destroy' => 'admin.department.destroy',
    ]);  Route::resource('/admin/projects', AdminProjectController::class)->names([
        'index' => 'admin.projects.index',
        'create' => 'admin.projects.create',
        'store' => 'admin.projects.store',
        'show' => 'admin.projects.show',
        'edit' => 'admin.projects.edit',
        'update' => 'admin.projects.update',
        'destroy' => 'admin.projects.destroy',
    ]);Route::resource('/admin/holidays', AdminHolidaysController::class)->names([
        'index' => 'admin.holidays.index',
        'create' => 'admin.holidays.create',
        'store' => 'admin.holidays.store',
        'show' => 'admin.holidays.show',
        'edit' => 'admin.holidays.edit',
        'update' => 'admin.holidays.update',
        'destroy' => 'admin.holidays.destroy',
    ]);     ;Route::resource('/admin/tasks', AdminTaskController::class)->names([
        'index' => 'admin.tasks.index',
        'create' => 'admin.tasks.create',
        'store' => 'admin.tasks.store',
        'show' => 'admin.tasks.show',
        'edit' => 'admin.tasks.edit',
        'update' => 'admin.tasks.update',
        'destroy' => 'admin.tasks.destroy',
    ]); Route::resource('/admin/category', AdminCategoryProject::class)->names([
        'index' => 'admin.category.index',
        'create' => 'admin.category.create',
        'store' => 'admin.category.store',
        'show' => 'admin.category.show',
        'edit' => 'admin.category.edit',
        'update' => 'admin.category.update',
        'destroy' => 'admin.category.destroy',
    ]);       
});
Auth::routes();

