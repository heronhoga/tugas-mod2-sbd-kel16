<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', [AdminController::class, 'index'])->name('admin.index');
Route::get('add', [AdminController::class, 'create'])->name('admin.create');
Route::post('store', [AdminController::class, 'store'])->name('admin.store');
Route::get('edit/{id}', [AdminController::class, 'edit'])->name('admin.edit');
Route::put('update/{id}', [AdminController::class, 'update'])->name('admin.update');
Route::post('delete/{id}', [AdminController::class, 'delete'])->name('admin.delete');


//DATA PENJUAL
//GET SELLER
Route::get('/seller', [AdminController::class, 'indexseller'])->name('admin.indexseller');

//CREATE SELLER
Route::get('/selleradd', [AdminController::class, 'sellercreateform'])->name('admin.createseller');
Route::post('addseller', [AdminController::class, 'storeseller'])->name('admin.storeseller');
Route::get('editseller/{id}', [AdminController::class, 'sellereditform'])->name('admin.editseller');
Route::put('updateseller/{id}', [AdminController::class, 'updateseller'])->name('admin.updateseller');
Route::delete('deleteseller/{id}', [AdminController::class, 'deleteseller'])->name('admin.deleteseller');
//FUNGSI UPDATE