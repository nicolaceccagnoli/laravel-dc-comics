<?php

use Illuminate\Support\Facades\Route;

// Models
use App\Http\Controllers\Admin\ComicController;

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

    $title = 'Laravel DC Comics';

    return view('welcome', ['title'=> $title]);
})->name('welcome');

Route::get('/about', function () {
    return view('subpages.about');
})->name('subpages.about');

// CRUD Comics
Route::resource('comics', ComicController::class);