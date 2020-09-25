<?php

use App\Http\Controllers\RoleController;
use App\Http\Controllers\RoleSectionController;
use App\Http\Controllers\ShowController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\TrainingSessionController;
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

Auth::routes();


Route::middleware('auth')->group(function() {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resource('training', TrainingController::class);
    Route::resource('shows', ShowController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('role-sections', RoleSectionController::class);

    Route::prefix('training-session')->name('training-session')->group(function() {
        Route::get('new', [TrainingSessionController::class, 'newSession'])->name('.create');
        Route::post('save', [TrainingSessionController::class, 'saveSession'])->name('.save');
    });
    Route::prefix('ajax')->name('ajax')->group(function() {
        Route::get('add-show-role', function() {
            return view('components.shows.show-role');
        })->name('.add-show-role');
    });
});
