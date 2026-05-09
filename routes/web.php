<?php

use App\Http\Controllers\ProfileController;
use App\Livewire\Students\Create;
use App\Livewire\Students\Edit;
use App\Livewire\Students\Index as StudentsIndex;
use App\Livewire\Students\Show;
use App\Livewire\Dashboard\SchoolDashboard;
use Illuminate\Support\Facades\Route;

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


Route::group(['prefix' => 'livewire', 'middleware' => ['auth']], function () {
   
     Route::group(['prefix' => 'student'], function () {
        Route::get('/', StudentsIndex::class)->name('students.index');
        Route::get('/create', Create::class)->name('students.create');
        Route::get('/edit/{id}', Edit::class)->name('students.edit');
        Route::get('/view/{id}', Show::class)->name('students.view');
       
     
    });

    Route::get('/dashboard/school', SchoolDashboard::class)
    ->name('school.dashboard');
});

require __DIR__.'/auth.php';
