<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UrlController;

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
Route::get('/', [UrlController::class, 'urlForm'])->name('url_form');

# Store Url
Route::post('generate/url', [UrlController::class, 'generateUrl'])->name('generate_url');

# Redirect to Original URL
Route::get('as/{key}', [UrlController::class, 'redirectToOriginalUrl'])->name('orignal_url');


