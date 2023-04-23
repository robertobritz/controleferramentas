<?php

use App\Http\Controllers\MagazineController;
use App\Http\Controllers\MagazineToolController;
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




Route::get('magazines/create/{machine}', [MagazineController::class, 'create'])->name('magazines.create')->middleware('auth'); //correto
Route::post('magazines/{id}', [MagazineController::class, 'toolUpdate'])->name('magazines.toolUpdate');
Route::get('magazines/addTool/{id}', [MagazineController::class, 'addTool'])->name('magazines.addTool')->middleware('auth'); //correto
Route::put('magazines/{url}', [MagazineController::class, 'update'])->name('magazines.update');
Route::get('magazines/{url}/edit', [MagazineController::class, 'edit'])->name('magazines.edit');
Route::any('magazines/search', [MagazineController::class, 'search'])->name('magazines.search');
Route::delete('magazines/{url}', [MagazineController::class, 'destroy'])->name('magazines.destroy');
Route::get('magazines/{url}', [MagazineController::class, 'show'])->name('magazines.show');
Route::post('magazines', [MagazineController::class, 'store'])->name('magazines.store');
Route::get('magazines', [MagazineController::class, 'index'])->name('magazines.index');



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
