<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InstagramController;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ClientsController;
use App\Http\Controllers\Admin\InstagramsController;
use App\Http\Controllers\EcommerceController;

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

Route::group([
    'middleware' => 'App\Http\Middleware\Authenticate',
], function () {
    // ROUTES HOME
    Route::get('/', [HomeController::class, 'index'])->name('home');

    // ROUTES INSTAGRAM
    Route::get('/instagram', [InstagramController::class, 'index'])->name('instagram.index');
    Route::get('/instagram/{datas}', [InstagramController::class, 'show'])->name('instagram.show');

    // ROUTES ECOMMERCE
    Route::get('/ecommerce', [EcommerceController::class, 'index'])->name('ecommerce.index');
    Route::get('/ecommerce/{datas}', [EcommerceController::class, 'show'])->name('ecommerce.show');
    
    Route::prefix('admin')->middleware('admin')->group(function(){
        // ADMIN
        Route::get('/', [AdminController::class, 'index'])->name('admin.index');
        // => Clients
        Route::get('/clients', [ClientsController::class, 'index'])->name('admin.clients.index');
        Route::get('/clients/create', [ClientsController::class, 'create'])->name('admin.clients.create');
        Route::post('/clients/store', [ClientsController::class, 'store'])->name('admin.clients.store');
        Route::get('/clients/{client}/edit', [ClientsController::class, 'edit'])->name('admin.clients.edit');
        Route::put('/clients/{client}/update', [ClientsController::class, 'update'])->name('admin.clients.update');
        Route::delete('/clients/{client}/delete', [ClientsController::class, 'destroy'])->name('admin.clients.delete');
        // => Instagram
        Route::get('/instagram', [InstagramsController::class, 'index'])->name('admin.instagrams.index');
        Route::get('/instagram/create', [InstagramsController::class, 'create'])->name('admin.instagrams.create');
        Route::post('/instagram/store', [InstagramsController::class, 'store'])->name('admin.instagrams.store');
    });

});
Auth::routes();