<?php

use App\Http\Controllers\PurchaseItemController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\QuoteItemController;
use App\Http\Controllers\PDFController;
use App\Models\Quote;


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

Route::get('/quotes/{quote}/purchase-edit', [QuoteController::class, 'purchaseEdit'])->name('purchase-edit');
Route::get('/quotes/{quote}/sales-edit', [QuoteController::class, 'salesEdit'])->name('sales-edit');
Route::resource('quotes', QuoteController::class);

Route::resource('purchase_items', PurchaseItemController::class);
Route::resource('quote_items', QuoteItemController::class);

// PDF generator
Route::get('/quotes/{quote}/getpdf', [PDFController::class, 'generate']);
