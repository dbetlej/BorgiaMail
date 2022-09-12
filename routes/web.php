<?php

use App\Http\Controllers\Mail\User\UserMailController;
use App\Http\Controllers\Panel\User\MailController;
use App\Http\Controllers\Panel\User\RecipientController;
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
    return view('welcome');
});

Route::middleware(['auth'])->group( function() {
    Route::resource('mails', MailController::class);
    Route::resource('recipients', RecipientController::class);

    Route::get('/send/email', [UserMailController::class, 'run']);
    Route::post('/send/data/{mail}', [UserMailController::class, 'send'])->name('send.data');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

require __DIR__.'/auth.php';
