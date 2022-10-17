<?php

use App\Http\Controllers\{
    PlanContoller
};
use Illuminate\Support\Facades\Route;

Route::post('/plans', [PlanContoller::class, 'store'])->name('plans.store');
Route::get('/plans/create', [PlanContoller::class, 'create'])->name('plans.create');
Route::get('/plans', [PlanContoller::class, 'index'])->name('plans.index');
Route::get('/teste', function () {
    return view('welcome');
});
