<?php

use Illuminate\Support\Facades\Route;

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
use App\Http\Controllers\Scanner;

Route::get('/', function () {
    return view('index');
});

Route::post('/item', [Scanner::class, 'store'] );

Route::get('/identity', function(){
	return view('identity');
});

Route::post('/ident', [Scanner::class, 'store1']);

Route::get('/detil', [Scanner::class, 'index']);

Route::post('/done', [Scanner::class, 'store2']);

Route::get('/manual', [Scanner::class, 'index2']);

Route::post('/man', [Scanner::class, 'store3']);