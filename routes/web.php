<?php

use App\Http\Controllers\EventController;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    $events = Event::all();
    return view('welcome', ['events' => $events]);
})->name('/');

Route::get('/dashboard', function () {
    $events = Auth::user()->events;

    return view('dashboard', ['events' => $events]);
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function(){
    Route::get('/events/create', [EventController::class, 'create'])->name('events/create');
    Route::get('/events/edit/{id}', [EventController::class, 'edit'])->name('events/edit');
    Route::post('/events/store', [EventController::class, 'store'])->name('events/store');
    Route::patch('/events/update/{id}', [EventController::class, 'update'])->name('events/update');
    Route::delete('/events/delete/{id}', [EventController::class, 'delete'])->name('events/delete');
});

Route::get('/events/show/{id}', [EventController::class, 'show'])->name('events/show');

require __DIR__.'/auth.php';
