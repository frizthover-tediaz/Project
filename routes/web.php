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

Route::get('/', function(){
	return view('identity');
});
Route::post('/ide', [Scanner::class, 'index0'] );

Route::post('/item', [Scanner::class, 'store'] );

Route::get('/barang', function(){
	return view('index');
});

Route::post('/ident', [Scanner::class, 'store1']);

Route::get('/detil', [Scanner::class, 'index']);

Route::post('/done', [Scanner::class, 'store2']);

Route::get('/manual', [Scanner::class, 'index2']);

Route::post('/man', [Scanner::class, 'store3']);

Route::get('/return', function(){
	return view('return');
});

Route::get('/iden', function(){
	return view('idm');
});

Route::post('/idem', [Scanner::class, 'storem']);

Route::get('/idr', function(){
	return view('idr');
});

Route::post('/ider', [Scanner::class, 'storer']);

Route::post('reman', [Scanner::class, 'storen']);
