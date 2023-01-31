<?php


use Illuminate\Support\Facades\Route;

Route::prefix('admin/dusk')->name('tests.')->middleware(['web', 'splade', 'verified'])->group(function() {
    Route::post('/start', [\TomatoPHP\TomatoDusk\Http\Controllers\DuskTestController::class, 'start'])->name('start');
    Route::post('/clear', [\TomatoPHP\TomatoDusk\Http\Controllers\DuskTestController::class, 'clear'])->name('clear');
});


Route::middleware(['web', 'splade', 'verified'])->name('admin.')->group(function () {
    Route::get('admin/dusk', [\TomatoPHP\TomatoDusk\Http\Controllers\TestLogController::class, 'index'])->name('test-logs.index');
    Route::get('admin/dusk/api', [\TomatoPHP\TomatoDusk\Http\Controllers\TestLogController::class, 'api'])->name('test-logs.api');
    Route::get('admin/dusk/create', [\TomatoPHP\TomatoDusk\Http\Controllers\TestLogController::class, 'create'])->name('test-logs.create');
    Route::post('admin/dusk', [\TomatoPHP\TomatoDusk\Http\Controllers\TestLogController::class, 'store'])->name('test-logs.store');
    Route::get('admin/dusk/{model}', [\TomatoPHP\TomatoDusk\Http\Controllers\TestLogController::class, 'show'])->name('test-logs.show');
    Route::get('admin/dusk/{model}/edit', [\TomatoPHP\TomatoDusk\Http\Controllers\TestLogController::class, 'edit'])->name('test-logs.edit');
    Route::post('admin/dusk/{model}', [\TomatoPHP\TomatoDusk\Http\Controllers\TestLogController::class, 'update'])->name('test-logs.update');
    Route::delete('admin/dusk/{model}', [\TomatoPHP\TomatoDusk\Http\Controllers\TestLogController::class, 'destroy'])->name('test-logs.destroy');
});
