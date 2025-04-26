<?php

use App\Http\Controllers\Public\PublicController;
use App\Livewire\Public\FormularioInscripcion;
use App\Reports\Pdf\FormularioInscripcionPDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('public.formulario-inscripcion');
});

Route::group(['prefix' => 'publico'], function () {
    Route::get('/formulario-inscripcion', FormularioInscripcion::class)->name('public.formulario-inscripcion');
    Route::get('/formulario-inscripcion/download', function (Request $request) {
        $encryptedData = $request->query('data');
        try {
            $formData = json_decode(decrypt($encryptedData), true);
            // Ejemplo: $formData['id'], $formData['fullName'], etc.
            $LetterDownload = new FormularioInscripcionPDF();
            return $LetterDownload->download($formData);
        } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
            return response()->json(['error' => 'Datos inválidos'], 400);
        }
    })->name('public.formulario-inscripcion-download');
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
