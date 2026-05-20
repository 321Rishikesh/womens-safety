<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ComplaintController;
use App\Models\Complaint;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $complaints = Complaint::query()
        ->where('user_id', auth()->id())
        ->latest()
        ->get();

    $stats = [
        'total' => $complaints->count(),
        'pending' => $complaints->where('status', 'Pending')->count(),
        'reviewed' => $complaints->where('status', 'Reviewed')->count(),
        'resolved' => $complaints->where('status', 'Resolved')->count(),
    ];

    return view('dashboard', [
        'complaints' => $complaints->take(5),
        'stats' => $stats,
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware('auth')->group(function () {
    Route::get('/complaint', [ComplaintController::class, 'create'])->name('complaint.create');
    Route::post('/complaint', [ComplaintController::class, 'store'])->name('complaint.store');
});
