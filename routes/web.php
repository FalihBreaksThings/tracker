<?php

use App\Http\Controllers\WorkoutController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WorkoutController::class, 'index']);

// Create new workout
Route::post('/workouts', [WorkoutController::class, 'store']);

// Update workout (PATCH)
Route::patch('/workouts/{workout}', [WorkoutController::class, 'update']);

// Delete workout (DELETE)
Route::delete('/workouts/{workout}', [WorkoutController::class, 'destroy'])->name('workouts.destroy');
