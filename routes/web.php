<?php

use App\Http\Controllers\PurchaseItemController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\QuoteItemController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\ClientController;
use GuzzleHttp\Middleware;

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

Route::get('/dashboard', function () {
    //return view('dashboard');
    return redirect()->action([QuoteController::class, 'index']);
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

Route::get('/quotes/{quote}/edit', [QuoteController::class, 'edit'])->name('quotes.edit')->middleware('auth');

// Store a new client and create a new quote
Route::post('/clients', [ClientController::class, 'store'])->name('clients.store')->middleware(('auth'));


Route::resource('quotes', QuoteController::class)->middleware('auth')->only('index', 'edit');

//Route::resource('quote_items', QuoteItemController::class)->middleware('auth');

// PDF generator
Route::get('/quotes/{quote}/getpdf', [PDFController::class, 'generate'])->middleware('auth')->name('getpdf');

// Settings
Route::get('/settings', [SettingController::class, 'edit'])->middleware('auth')->name('settings');
Route::post('/settings', [SettingController::class, 'store'])->middleware('auth')->name('settings.store');
