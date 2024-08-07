<?php

use Illuminate\Support\Facades\Route;

Auth::routes([
    'register' => false,
    'password.request' => false,
    'password.reset' => false,
]);

// Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function() {

// });
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'Index'])->name('Home');

Route::get('/', [App\Http\Controllers\HomeController::class, 'Index'])->name('Home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'Index'])->name('Home');

Route::get('/home2', [App\Http\Controllers\HomeController::class, 'Index2'])->name('Home2');

// Cashier

Route::get('cashier', [App\Http\Controllers\HomeController::class, 'Cashier'])->name('Cashier');
Route::post('cashier/{status}/{id}', [App\Http\Controllers\HomeController::class, 'AddCashier'])->name('AddCashier');

// Supplier

Route::get('supplier', [App\Http\Controllers\HomeController::class,'Supplier'] )->name('Supplier');
Route::post('supplier/{status}/{id}', [App\Http\Controllers\HomeController::class, 'AddSupplier'])->name('AddSupplier');

// buy

Route::get('buy', [App\Http\Controllers\HomeController::class,'Buy'] )->name('Buy');
Route::post('buy/{status}/{id}', [App\Http\Controllers\HomeController::class, 'AddStore'])->name('AddStore');

// Not left

Route::get('notleft', [App\Http\Controllers\HomeController::class,'Notleft'] )->name('Notleft');

// Not leftUser

Route::get('_notleft_', [App\Http\Controllers\HomeController::class,'Notleft2'] )->name('Notleft2');

// Debt List

Route::get('debtlist', [App\Http\Controllers\HomeController::class,'Debtlist'] )->name('Debtlist');
Route::post('debtlist', [App\Http\Controllers\HomeController::class,'Debtlist'] )->name('Debtlist');

// Debt ListUser

Route::get('_debtlist_', [App\Http\Controllers\HomeController::class,'Debtlist2'] )->name('Debtlist2');
Route::post('_debtlist_', [App\Http\Controllers\HomeController::class,'Debtlist2'] )->name('Debtlist2');

// Expire

Route::get('expire', [App\Http\Controllers\HomeController::class,'Expire'] )->name('Expire');

// ExpireUser

Route::get('_expire_', [App\Http\Controllers\HomeController::class,'Expire2'] )->name('Expire2');

// Sellers

Route::get('sellers', [App\Http\Controllers\HomeController::class,'Sellers'] )->name('Sellers');

// Sale

Route::get('sale', [App\Http\Controllers\HomeController::class,'Sale'] )->name('Sale');
Route::post('sale', [App\Http\Controllers\HomeController::class,'Get_Sale'] )->name('Get_Sale');
Route::post('viewtb', [App\Http\Controllers\HomeController::class,'ViewTb'] )->name('ViewTb');
Route::post('undo', [App\Http\Controllers\HomeController::class,'Undo'] )->name('Undo');
Route::post('invoice', [App\Http\Controllers\HomeController::class,'Invoice'] )->name('Invoice');
Route::get('clean', [App\Http\Controllers\HomeController::class,'Clean'] )->name('Clean');

// SaleUser

Route::get('_sale_', [App\Http\Controllers\HomeController::class,'Sale2'] )->name('Sale2');
