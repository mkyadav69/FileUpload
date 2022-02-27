<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;

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

# Show UI
Route::get('/', [FileController::class, 'uploadFile'])->name('upload_file');

# Store File
Route::post('store/file', [FileController::class, 'storeFile'])->name('store_file');

# View File
Route::get('show/{file}/{num}', [FileController::class, 'showFile'])->name('show_file');



