<?php

use App\Http\Controllers\Api\ContactUsController;
use App\Http\Controllers\Api\LiveCamController;
use App\Http\Controllers\Api\NewsController;
use App\Http\Controllers\Api\PhotoPageController;
use App\Http\Controllers\Api\WeatherController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});


// route render main pages
Route::get('/news' , [NewsController::class , 'render'])->name('News-page');
Route::get('/livepage' , [LiveCamController::class , 'render'])->name('liveCam-page');
Route::get('/photos' , [PhotoPageController::class , 'render'])->name('Photos-page');
Route::get('/contact' , [ContactUsController::class , 'render'])->name('ContactUs-page');

Route::get('/' , [WeatherController::class, 'getByCoordinates']);
Route::get('/weather' , [WeatherController::class, 'search'])->name('weather.search');

require __DIR__.'/auth.php';
