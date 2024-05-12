<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DevisController;

use App\Http\Controllers\ClientController;
use App\Http\Controllers\FactureController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CsrfTokenController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

Route::get('/', [AdminController::class,'Dashboard'])->name('admin.dashboard');




        // Users
        Route::get('/users', [UserController::class, 'getUsers'])->middleware(['auth', 'verified'])->name('show.users');
        Route::post('/users/store', [UserController::class, 'createUser'])->name('add.users');
        Route::put('/users/update/{id}',[UserController::class,'updateUser'])->name('update.users');
        Route::delete('/users/destroy', [UserController::class, 'deleteUser'])->name('destroy.users');

    // Users
    Route::get('/users', [UserController::class, 'getUsers'])->middleware(['auth', 'verified'])->name('show.users');
    Route::post('/users/store', [UserController::class, 'createUser'])->name('add.users');
    Route::put('/users/update/{id}',[UserController::class,'updateUser'])->name('update.users');
    Route::delete('/users/destroy/{id}', [UserController::class, 'deleteUser'])->name('destroy.users');

    //products
    Route::get('/products',[ProductController::class,'getProducts'])->name('show.products');
    Route::post('/products/store',[ProductController::class,'createProduct'])->name('add.products');
    Route::put('/products/update/{id}', [ProductController::class, 'editProduct'])->name('update.products');
    Route::delete('/products/destroy/{id}',[ProductController::class , 'deleteProduct'])->name('destroy.products');


        // Clients
        Route::get('/clients', [ClientController::class, 'getClients'])->middleware(['auth', 'verified'])->name('show.clients');
        Route::get('/clients/{id}', [ClientController::class, 'getClientsById'])->name('show.client');
        Route::post('/clients/store', [ClientController::class, 'createClient'])->name('add.clients');
        Route::put('/clients/update/{id}',[ClientController::class,'editClient'])->name('update.clients');
        Route::delete('/clients/destroy/{id}', [ClientController::class, 'deleteClient'])->name('destroy.clients');
    
        //products
        Route::get('/products',[ProductController::class,'getProducts'])->name('show.products');
        Route::get('/products/{id}',[ProductController::class,'getProductById'])->name('show.product');
        Route::get('/productsjson',[ProductController::class,'getProductsJSON'])->name('products.json');
        Route::post('/products/store',[ProductController::class,'createeProduct'])->name('add.products');
        Route::put('/products/update/{id}', [ProductController::class, 'editProduct'])->name('update.products');
        Route::delete('/products/destroy',[ProductController::class , 'deleteProduct'])->name('destroy.products');
        
    //Factures
    Route::get('/factures',[FactureController::class ,'getFacture'])->name('show.factures');
    // Route::post('/factures/store',[])->name('add.factures');
    Route::post('/factures/test',[FactureController::class,'test'])->name('add.factures');
    Route::put('/factures/update/{id}',[FactureController::class,'updateFacture'])->name('update.factures');
    Route::delete('/factures/destroy/{id}', [FactureController::class, 'deleteFacture'])->name('destroy.factures');
    Route::get('/factures/print/{id}',[FactureController::class,'indexPrint'])->name('show.print');

    //Devis
    Route::get('/devis',[DevisController::class ,'getDevis'])->name('show.devis');
    Route::post('/devis/store',[DevisController::class,'createDevis'])->name('add.devis');
    Route::put('/devis/update/{id}',[DevisController::class,'updateDevis'])->name('update.devis');
    Route::delete('/devis/destroy/{id}', [DevisController::class, 'deleteDevis'])->name('destroy.devis');
    Route::get('pdf', [PDFController::class, 'pdf'])->name('pdf');
    Route::get('FgeneratePDF/{id}', [App\Http\Controllers\PDFController::class, 'FgeneratePDF'])->name('pdf.f');
    Route::get('DgeneratePDF/{id}', [App\Http\Controllers\PDFController::class, 'DgeneratePDF'])->name('pdf.d');

    Route::get('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
    Route::get('/changeLocale/{locale}',function($locale){
        session()->put('locale',$locale);
        return redirect()->back();
    })->name('products.changeLocale');

    Route::get('/csrf-token', [CsrfTokenController::class,'fetchCsrfToken'])->name('csrf.token');

require __DIR__ . '/auth.php';
