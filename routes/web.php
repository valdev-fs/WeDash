<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\EnvCheckController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AccessUserController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\ReportMonitoringController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\BranchFilterController;



Route::get('/check-env', [EnvCheckController::class, 'check']);

Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('embed.powerbi');
    } else {
        return redirect()->route('login');
    }
});

Route::middleware('redirect_if_authenticated')->group(function () {
    Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AuthController::class, 'login']);
});


// Protected routes
Route::middleware(['auth'])->group(function () {
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/api/get-user-department-data', [ApiController::class, 'getUserDepartmentData']);
    Route::get('/api/get-branch-filter-data', [ApiController::class, 'getBranchFilterData']);

    Route::get('/', [ReportController::class, 'index'])->name('home');
    Route::get('/reports/{id}', [ReportController::class, 'show'])->name('reports.show');

    Route::middleware(['is_admin'])->group(function () {
        Route::resource('admin/reports', AdminController::class);
        Route::resource('reports', AdminController::class);

        Route::get('users/create', [UserController::class, 'create'])->name('users.create');
        Route::post('users', [UserController::class, 'store'])->name('users.store');

        Route::get('assign-access', [AccessUserController::class, 'create'])->name('access.create');
        Route::post('assign-access', [AccessUserController::class, 'store'])->name('access.store');
        Route::get('get-assigned-reports', [AccessUserController::class, 'getAssignedReports'])->name('get.assigned.reports');
        Route::post('delete-access', [AccessUserController::class, 'delete'])->name('access.delete');

        Route::get('user-management', [UserManagementController::class, 'index'])->name('user-management.index');
        Route::post('user-management/promote', [UserManagementController::class, 'promote'])->name('user-management.promote');
        Route::post('user-management/change-password', [UserManagementController::class, 'changePassword'])->name('user-management.changePassword');
        Route::post('user-management/department', [UserManagementController::class, 'storeDepartment'])->name('user-management.storeDepartment');
        Route::patch('user-management/department/{department}', [UserManagementController::class, 'updateDepartment'])->name('user-management.updateDepartment');
        Route::delete('user-management/department/{department}', [UserManagementController::class, 'deleteDepartment'])->name('user-management.deleteDepartment');

        Route::get('/report-monitoring', [ReportMonitoringController::class, 'showReportMonitoringPage']);
        Route::get('/report-monitoring-data', [ReportMonitoringController::class, 'getReportMonitoringData']);
        Route::get('/user-detail/{userId}', [ReportMonitoringController::class, 'showUserDetailPage']);
        Route::get('/user-detail-data/{userId}', [ReportMonitoringController::class, 'getUserDetailData']);

        Route::get('/branch-filters', [BranchFilterController::class, 'index'])->name('branch-filters.index');
        Route::post('/branch-filters', [BranchFilterController::class, 'store'])->name('branch-filters.store');
        Route::get('/get-assigned-reports', [BranchFilterController::class, 'getAssignedReports'])->name('get.assigned.reports');
        Route::post('/branch-filters/delete', [BranchFilterController::class, 'delete'])->name('branch-filters.delete');
    });
});
