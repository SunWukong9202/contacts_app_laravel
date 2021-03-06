<?php

use App\Http\Controllers\ContactsController;
use App\Http\Controllers\HomeController;
use App\Models\Contacts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

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

Route::get('/', fn () => auth()->check() ? redirect('/home') : view('welcome') );

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::resource('contacts', ContactsController::class);

// Route::get('/contacts', [ContactsController::class, 'index'])->name('contacts.index');

// Route::get('/contacts/create', [ContactsController::class, 'create'])->name('contacts.create');

// Route::get('/contacts/{contact}/edit', [ContactsController::class, 'edit'])->name('contacts.edit');

// Route::put('/contacts/{contact}', [ContactsController::class, 'update'])->name('contacts.update');

// Route::get('/contacts/{contact}', [ContactsController::class, 'show'])->name('contacts.show');

// Route::delete('/contacts/{contact}', [ContactsController::class, 'destroy'])->name('contacts.destroy');

// Route::post('/contacts', [ContactsController::class, 'store'])->name('contacts.store');
