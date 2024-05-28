<?php

use App\Http\Controllers\Api\CompteBancaireController;
use App\Http\Controllers\Api\UtilisateurApiControlleur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//Pour la banque
Route::prefix('/Bav1')->group(function () {
    Route::get('/liste-des-comptes', [CompteBancaireController::class, 'liste_compte'])->name('liste_compte');
});

//pour Utilisateur et aspect globale de notre application
Route::prefix('/Globale')->group( function () {
    Route::get('/Utilisateur', [UtilisateurApiControlleur::class, 'liste'])->name('liste');

});
