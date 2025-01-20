<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});*/

Route::get('/', [FrontController::class, 'inizio'])->name('inizio');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // ----------------------------USER------------------------------------
    Route::get('/listaOperatori', [UserController::class, 'listaOperatori'])->name('listaOperatori');
    Route::delete('/eliminaOperatore/{id}', [UserController::class, 'eliminaOperatore'])->name('eliminaOperatore');
    Route::patch('/operatore/{user}', [UserController::class, 'modificaOperatore'])->name('modificaOperatore');

    // ----------------------------CAR------------------------------------
    Route::get('/listaCar', [CarController::class, 'listaCar'])->name('listaCar');
    Route::delete('/eliminaCar/{id}', [CarController::class, 'eliminaCar'])->name('eliminaCar');
    Route::patch('/car/{car}', [CarController::class, 'modificaCar'])->name('modificaCar');

    // ----------------------------ACTIVITY------------------------------------
    Route::get('/listaAttivita', [ActivityController::class, 'listaAttivita'])->name('listaAttivita');
    Route::delete('/eliminaAttivita/{id}', [ActivityController::class, 'eliminaAttivita'])->name('eliminaAttivita');
    Route::patch('/attivita/{activity}', [ActivityController::class, 'modificaAttivita'])->name('modificaAttivita');



    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
