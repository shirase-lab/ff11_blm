<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EquipmentController;
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
if (config("app.env") === "local") {
    Route::prefix('equip')->group(function() {
        Route::get('/', [EquipmentController::class, 'index'])->name('equip.index');
        Route::get('/new', [EquipmentController::class, 'create'])->name('equip.create');
        Route::post('/', [EquipmentController::class, 'store'])->name('equip.store');
        Route::get('/{id}', [EquipmentController::class, 'show'])->name('equip.show');
        Route::get('/{id}/edit', [EquipmentController::class, 'edit'])->name('equip.edit');
        Route::put('/{id}', [EquipmentController::class, 'update'])->name('equip.update');
    });
}

