<?php

use App\Http\Controllers\PrintController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;

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

Route::get('/', [EventController::class, 'index'])->name('home');

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware(['auth', 'verified'])->group(function (){
Route::get('/dashboard', [EventController::class, 'index'])->name('dashboard');
Route::get('/events/create', function () { return view('events.create'); })->name('events.create');
Route::post('/events', [EventController::class, 'store'])->name('events.store');
Route::delete('/events/{id}/delete', [EventController::class, 'destroy'])->name('events.destroy');
Route::post('/events/{event}/modify', [EventController::class, 'modify'])->name('events.modify');
Route::patch('/events/{event}/update', [EventController::class, 'update'])->name('events.update');
});
Route::get('/events/{events}', [EventController::class, 'find'])->name('events');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/categories',[EventController::class, 'categories'])->name('category.index');
Route::get('/categories/{name}',[EventController::class, 'get_category']);
Route::get('/print',[PrintController::class, 'printview'])->name('print.view');

require __DIR__.'/auth.php';
