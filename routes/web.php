<?php

use App\Http\Controllers\ProvidersController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SourceItemController;
use App\Http\Controllers\SourceProviderController;
use App\Http\Controllers\MarketPlacesController;

Route::get('/', function () {
    return view('layouts.base');
});

Route::group(['prefix' => 'source','middleware' => 'auth'], function(){ 	
	Route::get('item',[SourceItemController::class, 'index'])->name('source.item.index');	
	Route::post('item/create',[SourceItemController::class, 'create'])->name('source.item.create');	
	Route::get('provider',[SourceProviderController::class, 'index'])->name('source.provider.index');
	Route::post('provider/crete',[SourceProviderController::class, 'create'])->name('source.provider.create');	
	Route::post('provider/edit/',[SourceProviderController::class, 'edit'])->name('source.provider.edit');
	Route::get('provider/delete/{id}',[SourceProviderController::class, 'delete'])->name('source.provider.delete');
	Route::get('marketplace',[MarketPlacesController::class, 'index'])->name('marketplaces.index');
	Route::get('marketplace/recursive',[SourceItemController::class, 'recursiveJson'])->name('item.recursiveJson');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('layouts.base');
})->name('dashboard');
