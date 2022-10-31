<?php

use App\Http\Controllers\{
    PlanController,
    DetailPlanController
};
use Illuminate\Support\Facades\Route;
Route::prefix('plans')->group(function (){
    
    /**
     * Route para teste de View e elementos
     */
    Route::get('/teste', [PlanController::class, 'teste'])->name('plans.teste');
    
    /** 
     * Routes details Plans
    */
    Route::get('/{url}/details', [DetailPlanController::class, 'index'])->name('details.imdex');
    /**
     * Plans Routes
     */
    Route::get('/new', [PlanController::class, 'new'])->name('plans.new');
    Route::any('/search', [PlanController::class, 'search'])->name('plans.search');
    Route::put('/{url}', [PlanController::class, 'update'])->name('plans.update');
    Route::get('/{url}/edit',[PlanController::class, 'edit'])->name('plans.edit');
    Route::delete('/{url}', [PlanController::class, 'destroy'])->name('plans.destroy');
    Route::get('/{url}', [PlanController::class, 'show'])->name('plans.show');
    Route::post('/', [PlanController::class, 'store'])->name('plans.store');
    /**
     * Home Deshboard
     */
    Route::get('/', [PlanController::class, 'index'])->name('plans.index');
});
/**
 * Route Breadcrumb 
 */
Route::get('admin', [PlanController::class, 'index'])->name('admin.index');