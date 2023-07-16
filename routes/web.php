<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\AugmentController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [EquipmentController::class, 'equip']);
Route::prefix('equip')->group(function() {
    Route::get('/', [EquipmentController::class, 'index'])->name('equip.index');
    Route::get('/new', [EquipmentController::class, 'create'])->name('equip.create');
    Route::post('/', [EquipmentController::class, 'store'])->name('equip.store');
    Route::get('/{id}', [EquipmentController::class, 'show'])->name('equip.show');
    Route::get('/{id}/edit', [EquipmentController::class, 'edit'])->name('equip.edit');
    Route::put('/{id}', [EquipmentController::class, 'update'])->name('equip.update');
    Route::prefix('augment')->group(function() {
        Route::get('/new', [AugmentController::class, 'create'])->name('augment.create');
        Route::post('/', [AugmentController::class, 'store'])->name('augment.store');
    });
});

Route::prefix('enemy')->group(function() {
    Route::get('/', [EnemyController::class, 'index'])->name('enemy.index');
    Route::get('/new', [EnemyController::class, 'create'])->name('enemy.create');
    Route::post('/', [EnemyController::class, 'store'])->name('enemy.store');
});

Route::prefix('magic')->group(function() {
    Route::get('/', [MagicController::class, 'index'])->name('magic.index');
    Route::get('/new', [MagicController::class, 'create'])->name('magic.create');
    Route::post('/', [MagicController::class, 'store'])->name('magic.store');
});

