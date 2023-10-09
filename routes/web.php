<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

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

Route::controller(PageController::class)->group(function () {


    Route::get('/',                                          'home')->name("home");
    Route::get('/dashboard',                                 'dashboard')->middleware(['auth'])->name('dashboard');
    Route::get('/workouts/{user?}',                          'workouts')->middleware(['auth'])->name('workouts');
    Route::get('/workout/{workout}',                         'workout')->middleware(['auth'])->name('workout');
    Route::get('/duplicate/{workout}',                       'duplicate')->middleware(['auth'])->name('duplicate');
    Route::get('/create-athlete',                            'createAthlete')->middleware(['auth'])->name('create-athlete');
    Route::get('/edit-athlete/{user}',                       'editAthlete')->middleware(['auth'])->name('edit-athlete');
    Route::get('/profile/{user}',                            'profile')->middleware(['auth'])->name('profile');
    Route::get('/create-workout',                            'createWorkout')->middleware(['auth'])->name('create-workout');
    Route::get('/edit-workout/{workout}',                    'editWorkout')->middleware(['auth'])->name('edit-workout');
    Route::get('/new-coach/{email}/{id}',          'newCoach')->middleware(['auth'])->name('new-coach');
    Route::post('/storeathlete',                             'storeathlete')->middleware(['auth'])->name('storeathlete');
    Route::post('/storeworkout',                             'storeworkout')->middleware(['auth'])->name('storeworkout');
    Route::put('/storefeedbackmonday/{workout}',             'storefeedbackmonday')->middleware(['auth'])->name('storefeedbackmonday');
    Route::put('/storefeedbacktuesday/{workout}',            'storefeedbacktuesday')->middleware(['auth'])->name('storefeedbacktuesday');
    Route::put('/storefeedbackwednesday/{workout}',          'storefeedbackwednesday')->middleware(['auth'])->name('storefeedbackwednesday');
    Route::put('/storefeedbackthursday/{workout}',           'storefeedbackthursday')->middleware(['auth'])->name('storefeedbackthursday');
    Route::put('/storefeedbackfriday/{workout}',             'storefeedbackfriday')->middleware(['auth'])->name('storefeedbackfriday');
    Route::put('/storefeedbacksaturday/{workout}',           'storefeedbacksaturday')->middleware(['auth'])->name('storefeedbacksaturday');
    Route::put('/storefeedbacksunday/{workout}',              'storefeedbacksunday')->middleware(['auth'])->name('storefeedbacksunday');
    Route::put('/updateathlete/{user}',                       'updateathlete')->middleware(['auth'])->name('updateathlete');
    Route::put('/updateworkout/{workout}',                    'updateworkout')->middleware(['auth'])->name('updateworkout');
    Route::get('/export/{workout}',                          'export')->middleware(['auth'])->name("export");
    Route::put('/storecomment/{workout}',                    'storecomment')->middleware(['auth'])->name('storecomment');
    Route::get('/search',                                    'search')->middleware(['auth'])->name('search');
    Route::delete('/delete-athlete/{user}',                  'deleteAthlete')->middleware(['auth'])->name('delete-athlete');
    Route::delete('/delete-workout/{workout}',               'deleteWorkout')->middleware(['auth'])->name('delete-workout');

}); 

//Route::get('send-workout-email', [SendEmailController::class, 'emailWorkout']);

require __DIR__.'/auth.php';
