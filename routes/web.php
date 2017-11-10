<?php

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
    return view('home');
})->name('home');

Route::get('/profil', function () {
    echo "profil";
    //return view('profil');
})->name('profil');

Route::get('/mathematiques', function () {
    echo "maths";
    //return view('mathematiques');
})->name('mathematiques');

Route::get('/informatique', function () {
    echo "info";
    //return view('informatique');
})->name('informatique');
