<?php

use App\Http\Controllers\{
    PlanContoller
};
use Illuminate\Support\Facades\Route;

Route::get('/plans', [PlanContoller::class, 'index'])->name('plans.index');
Route::get('/teste', function () {
    return view('welcome');
});
