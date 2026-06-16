<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {

    $pending = \App\Models\LeaveRequest::where(
        'student_id',
        auth()->id()
    )->where('status', 'pending')->count();

    $approved = \App\Models\LeaveRequest::where(
        'student_id',
        auth()->id()
    )->where('status', 'approved')->count();

    $rejected = \App\Models\LeaveRequest::where(
        'student_id',
        auth()->id()
    )->where('status', 'rejected')->count();

    return view('dashboard', compact(
        'pending',
        'approved',
        'rejected'
    ));

})->middleware(['auth', 'verified', 'role:student'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
use App\Http\Controllers\LeaveRequestController;

Route::get('/apply-leave', function () {
    return view('apply-leave');
})->middleware(['auth']);

Route::post('/leave-request',
    [LeaveRequestController::class, 'store']
)->middleware(['auth']);
Route::get('/leave-history',
    [LeaveRequestController::class, 'history']
)->middleware(['auth']);
use App\Http\Controllers\DeanController;

Route::get('/dean-dashboard',
    [DeanController::class, 'index']
)->middleware(['auth', 'role:dean']);
Route::post('/approve/{id}',
    [DeanController::class, 'approve']
)->middleware(['auth', 'role:dean']);

Route::get('/reject/{id}',
    [DeanController::class, 'reject']
)->middleware(['auth', 'role:dean']);
use App\Http\Controllers\SecurityController;

Route::get('/security-dashboard',
    [SecurityController::class, 'index']
)->middleware(['auth', 'role:security']);
Route::get('/mark-exited/{id}',
    [SecurityController::class, 'markExited']
)->middleware(['auth', 'role:security']);
Route::get('/check-role', function () {
    return [
        'user' => auth()->user()->name,
        'role' => auth()->user()->role,
    ];
})->middleware('auth');
Route::get('/mark-returned/{id}',
    [SecurityController::class, 'markReturned']
)->middleware(['auth', 'role:security']);