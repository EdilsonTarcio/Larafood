<?php

use App\Http\Controllers\{
    PlanController
};
use Illuminate\Support\Facades\Route;
Route::prefix('plans')->group(function (){
    Route::get('/plans/testev', [PlanController::class, 'testev'])->name('plans.testev');

    Route::get('/new', [PlanController::class, 'new'])->name('plans.new');
    Route::any('/search', [PlanController::class, 'search'])->name('plans.search');
    Route::put('/{url}', [PlanController::class, 'update'])->name('plans.update');
    Route::get('/{url}/edit',[PlanController::class, 'edit'])->name('plans.edit');
    Route::delete('/{url}', [PlanController::class, 'destroy'])->name('plans.destroy');
    Route::get('/{url}', [PlanController::class, 'show'])->name('plans.show');
    Route::post('/', [PlanController::class, 'store'])->name('plans.store');
    Route::get('/', [PlanController::class, 'index'])->name('plans.index');
});

Route::get('admin', [PlanController::class, 'index'])->name('admin.index');
Route::get('/teste', function () {
    return view('welcome');
});
