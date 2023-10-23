<?php

//use Dbokhan\VlansCompare\Controllers;
use Illuminate\Support\Facades\Route;

//use Illuminate\Support\Facades\Route;

//Route::get('/hello', function () {
//    return view('vlans-compare::index');
//});

Route::group(['middleware' => ['web', 'auth'], 'guard' => 'auth'], function () {
    Route::get('/plugins/vlans-compare', [\Dmbokhan\VlansCompare\Http\Controllers\VlansCompareController::class, 'index'])->name('vlans-compare.index');
    Route::post('/plugins/vlans-compare', [\Dmbokhan\VlansCompare\Http\Controllers\VlansCompareController::class, 'post_request'])->name('vlans-compare.index');
    Route::post('/plugins/vlans-compare/get-ports', [\Dmbokhan\VlansCompare\Http\Controllers\VlansCompareController::class, 'get_ports'])->name('vlans-compare.index');
    //Route::post('/plugins/vlans-compare', function () {
    //    return response('Hello, world!', 200)->header('Content-Type', 'text/plain');;
    //});
});
