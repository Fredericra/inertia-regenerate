<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminControl;
use App\Http\Controllers\MyController;

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
Route::group(
   [
      "middleware"=>"invite"
   ],function () {
      Route::get('/', function () {
         return inertia("Home");
      });
      Route::get("/inscrire",[MyController::class,"inscrire"])->name("inscrire");
      Route::get("/connexion",[MyController::class,"connexion"])->name("connexion");
      Route::post("/inscrire",[MyController::class,"store_inscrire"])->name("store.inscrire");
      Route::post("/connexion",[MyController::class,"store_connexion"])->name("sotre.connexion");
      Route::get("/Admin",[AdminControl::class,"admin"])->name("admin");
      Route::post("/Admin",[AdminControl::class,"store_admin"])->name("store.admin");
    
});


Route::group([
   "middleware"=>"actif",
   "prefix"=>"regenerate::ai"
],function () {
   Route::get("/moncompte",[MyController::class,"compte"])->name("compte");
   Route::post("/admin",[AdminControl::class,"ajouter"])->name("ajouter");
   Route::post("/efface",[AdminControl::class,"efface"])->name("efface");
   Route::post("/plus",[AdminControl::class,"plus"])->name("plus");
   Route::post("/reponseadmin",[AdminControl::class,"reponse"])->name("reponse");
   Route::get("/sortie/{id}",[MyController::class,"sortie"])->name("sortie");
});
