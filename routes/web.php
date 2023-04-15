<?php

use App\Http\Controllers\ProfileController;
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

// Magazine Routes
Route::any('magazines/search', 'App\Http\Controllers\MagazineController@search')->name('magazines.search')->middleware('auth');
Route::resource('magazines', 'App\Http\Controllers\MagazineController')->middleware('auth');


// Tools Routes
Route::any('tools/search', 'App\Http\Controllers\ToolController@search')->name('tools.search')->middleware('auth');
Route::resource('tools', 'App\Http\Controllers\ToolController')->middleware('auth');

//Machines routes
Route::any('machines/search', 'App\Http\Controllers\MachineController@search')->name('machines.search')->middleware('auth');
Route::resource('machines', 'App\Http\Controllers\MachineController')->middleware('auth');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
