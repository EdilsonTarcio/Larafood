<?php

use App\Http\Controllers\{
    PlanController
};
use Illuminate\Support\Facades\Route;

Route::any('/plans/search', [PlanController::class, 'search'])->name('plans.search');
Route::delete('/plans/{url}', [PlanController::class, 'destroy'])->name('plans.destroy');
Route::get('/plans/{url}', [PlanController::class, 'show'])->name('plans.show');
Route::post('/plans', [PlanController::class, 'store'])->name('plans.store');
Route::get('/plans/create', [PlanController::class, 'create'])->name('plans.create');
Route::get('/plans', [PlanController::class, 'index'])->name('plans.index');
Route::get('/teste', function () {
    return view('welcome');
});
