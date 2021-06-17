<?php

use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\UtilisateursController;
use App\Http\Controllers\ConnexionController;
use App\Http\Controllers\CompteController;
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\SuivisController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//Route::view('/','welcome');
Route::get('/inscription',[InscriptionController::class,'formulaire']);

Route::post('/inscription',[InscriptionController::class,'traitement']);

Route::get('/',[UtilisateursController::class,'liste']);

Route::get('/connexion',[ConnexionController::class,'formulaire']);

Route::post('/connexion',[ConnexionController::class,'traitement']);

Route::group([
 
	'middleware'=>'App\Http\Middleware\Auth'],function(){

		Route::view('/mon-compte','mon-compte');

		Route::get('/mon-compte',[CompteController::class,'acceuil']);

		Route::get('/deconnexion',[CompteController::class,'deconnexion']);

		Route::post('/modification-mot-de-passe',[CompteController::class,'modificationMotDePasse']);

		Route::post('/messages',[MessagesController::class,'nouveau']);

		Route::post('/{email}/suivis',[SuivisController::class,'nouveau']);

		Route::delete('/{email}/suivis',[SuivisController::class,'enlever']);
	}
);

Route::get('/{email}',[UtilisateursController::class,'voir']);
