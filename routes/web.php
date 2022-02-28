<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\TariffController;
use App\Http\Controllers\CallController;

Route::get('/', [PlanController::class,'index']);

// routest plans

Route::get('/dashboard_plans', [PlanController::class, 'create'])->middleware('auth');
Route::post('/dashboard_plans', [PlanController::class, 'store'])->middleware('auth');
Route::get('/dashboard_plans', [PlanController::class, 'plans'])->middleware('auth');
Route::delete('/dashboard_plans/{id}', [PlanController::class, 'destroy'])->middleware('auth');

// routes tariffs

Route::get('/dashboard_tariffs', [TariffController::class, 'create'])->middleware('auth');
Route::post('/dashboard_tariffs', [TariffController::class, 'store'])->middleware('auth');
Route::get('/dashboard_tariffs', [TariffController::class, 'tariff'])->middleware('auth');
Route::delete('/dashboard_tariffs/{id}', [TariffController::class, 'destroy'])->middleware('auth');

// routes users
Route::get('/dashboard', [PlanController::class, 'dashboard'])->middleware('auth');

// routes calls
Route::get('/chamadas', [CallController::class, 'index']);
Route::get('/chamadas', [CallController::class, 'calc']);
