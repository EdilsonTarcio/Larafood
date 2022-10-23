<?php

use App\Http\Controllers\{
    PlanController
};
use Illuminate\Support\Facades\Route;
Route::get('/plans/testev', [PlanController::class, 'testev'])->name('plans.testev');

Route::get('/plans/new', [PlanController::class, 'new'])->name('plans.new');
Route::any('/plans/search', [PlanController::class, 'search'])->name('plans.search');
Route::put('/plans/{url}', [PlanController::class, 'update'])->name('plans.update');
Route::get('/plans/{url}/edit',[PlanController::class, 'edit'])->name('plans.edit');
Route::delete('/plans/{url}', [PlanController::class, 'destroy'])->name('plans.destroy');
Route::get('/plans/{url}', [PlanController::class, 'show'])->name('plans.show');
Route::post('/plans', [PlanController::class, 'store'])->name('plans.store');
Route::get('/plans', [PlanController::class, 'index'])->name('plans.index');

Route::get('admin', [PlanController::class, 'index'])->name('admin.index');

Route::get('/teste', function () {
    return view('welcome');
});
