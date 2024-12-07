<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

// use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});


Route::resource('category', CategoryController::class);

// route of the download file
Route::get('categories/{id}/download-pdf', [CategoryController::class, 'downloadPDF'])->name('categories.download');


// Route::resource('/user-page', function(){
//     return view('user-page');
// })->middleware('auth', 'is_admin:admin');