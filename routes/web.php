<?php

use App\Livewire\Contratos;
use App\Livewire\Inquilinos;
use App\Livewire\Propiedads;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('profile.edit');
    Volt::route('settings/password', 'settings.password')->name('password.edit');
    Volt::route('settings/appearance', 'settings.appearance')->name('appearance.edit');

    Volt::route('settings/two-factor', 'settings.two-factor')
        ->middleware(
            when(
                Features::canManageTwoFactorAuthentication()
                    && Features::optionEnabled(Features::twoFactorAuthentication(), 'confirmPassword'),
                ['password.confirm'],
                [],
            ),
        )
        ->name('two-factor.show');
Route::get('/propiedades', Propiedads::class)->name('propiedades')->middleware('auth');
Route::get('/inquilinos', Inquilinos::class)->name('inquilinos')->middleware('auth');
Route::get('/contratos', Contratos::class)->name('contratos')->middleware('auth');

});

require __DIR__.'/auth.php';
