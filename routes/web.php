<?php

use App\Livewire\Public\RegistrationForm;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->away('https://ei-uagrm.edu.bo/');
});

Route::group(['prefix' => 'publico'], function () {
    Route::get('/formulario-inscripcion/{code}', RegistrationForm::class)->name('public.formulario-inscripcion');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
