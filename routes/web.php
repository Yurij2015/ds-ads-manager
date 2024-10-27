<?php

use App\Http\Controllers\FacebookController;
use App\Http\Controllers\GeminiController;
use Illuminate\Support\Facades\Route;

Route::get('/', static function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['web', 'auth'])->group(function () {
    Route::get('fb-campaigns', [FacebookController::class, 'index'])->name('fb-campaigns');
    Route::get('add-fb-campaign', [FacebookController::class, 'addCampaign'])->name('add-fb-campaign');
    Route::post('store-fb-campaign', [FacebookController::class, 'storeAdCampaign'])->name('store-fb-campaign');

    Route::get('fb-ad-sets', [FacebookController::class, 'adSets'])->name('fb-ad-sets');
    Route::get('add-fb-ad-sets', [FacebookController::class, 'addAdSets'])->name('add-fb-ad-sets');

    Route::get('fb-ads', [FacebookController::class, 'ads'])->name('fb-ads');
    Route::get('add-fb-ads', [FacebookController::class, 'addAds'])->name('add-fb-ads');

    Route::get('fb-ad-creatives', [FacebookController::class, 'adCreatives'])->name('fb-ad-creatives');
    Route::get('add-fb-ad-creatives', [FacebookController::class, 'addAdCreatives'])->name('add-fb-ad-creatives');

    Route::get('gm-promts', [GeminiController::class, 'index'])->name('gm-promts');
    Route::get('generate-content', [GeminiController::class, 'generateContent'])->name('generate-content');
    Route::post('generate-content', [GeminiController::class, 'generateContent'])->name('generate-content');
});
