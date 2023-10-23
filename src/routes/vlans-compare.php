<?php

use Illuminate\Support\Facades\Route;



Route::group(['middleware' => ['web', 'auth'], 'guard' => 'auth'], function () {
    Route::get('/plugins/vlans-compare', [\Dmbokhan\VlansCompare\Http\Controllers\VlansCompareController::class, 'index'])->name('vlans-compare.index');
    Route::post('/plugins/vlans-compare', [\Dmbokhan\VlansCompare\Http\Controllers\VlansCompareController::class, 'post_request'])->name('vlans-compare.post_request');
    Route::post('/plugins/vlans-compare/get-ports', [\Dmbokhan\VlansCompare\Http\Controllers\VlansCompareController::class, 'get_ports'])->name('vlans-compare.get_ports');
});
