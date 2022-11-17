<?php

use App\Http\Controllers\{
    CidadeController,
    PlanController,
    DetailPlanController,
    PermissionController,
    ProfileController,
    PermissionProfileController,
};
use Illuminate\Support\Facades\Route;

Route::prefix('plans')->group(function (){
    /** 
     * Permission x Profile
    */
    Route::post('profiles/{id}/permissions', [PermissionProfileController::class, 'attachPermissionsProfile'])->name('profiles.permission.attach');
    Route::get('profiles/{id}/permissions/available', [PermissionProfileController::class, 'available'])->name('profiles.permission.available');
    Route::get('profiles/{id}/permissions', [PermissionProfileController::class, 'permissions'])->name('profiles.permission');

    /**
     * Routes para Permission
     */
    Route::any('permission/search', [PermissionController::class, 'search'])->name('permission.search');
    Route::resource('permission', PermissionController::class);
    /**
     * Routes para Profiles
     */
    Route::any('profiles/search', [ProfileController::class, 'search'])->name('profiles.search');
    Route::resource('profiles', ProfileController::class);
    /**
     * Route para teste de View e elementos
     */
    Route::get('/teste', [PlanController::class, 'teste'])->name('plans.teste');
    
    /** 
     * Routes details Plans
    */
    Route::post('/{url}/details', [DetailPlanController::class, 'store'])->name('details.store');
    Route::get('/{url}/details,create', [DetailPlanController::class, 'create'])->name('details.create');
    Route::get('/{url}/details', [DetailPlanController::class, 'index'])->name('details.index');
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

Route::get('cidades', [CidadeController::class, 'index'])->name('cidade.index');