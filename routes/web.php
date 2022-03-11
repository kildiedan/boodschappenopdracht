<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GroceryController;


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

Route::get('/', function () {
    return redirect('/groceries');
});






// TODO: gebruik een resource route zodat alle CRUD routes automatisch gemaakt worden voor kortere code en minder werk

Route::get('/groceries', [GroceryController::class, 'index']);


Route::get('/groceries/create', [GroceryController::class, 'insertform']);


Route::post('/groceries/save', [GroceryController::class, 'store']);


Route::get('/groceries/delete/{id}', [GroceryController::class, 'destroy']);


Route::get('/groceries/edit', [GroceryController::class, 'ChangeIndex']);


Route::get('/groceries/edit/{id}', [GroceryController::class, 'show']);


Route::post('/groceries/edit/{id}', [GroceryController::class, 'edit']);




