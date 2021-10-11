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

Route::get('/item', function(){
	return view('index');
});
Route::get('/barang', function(){
	return view('index');
});

Route::post('/ident', [Scanner::class, 'store1']);

// Route::get('/detil', [Scanner::class, 'index']);

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

Route::get('/login', function(){
	return view('login');
});

Route::post('/log', [Scanner::class, 'login']);

Route::get('/admin', function(){
	return view('admin');
});

Route::post('/logout', [Scanner::class, 'logout']);

Route::get('/databrg', function(){
	return view('data.tbbarang.barang');
});

Route::get('/insertbrg', function(){
	return view('data.tbbarang.insert');
});

Route::get('/showbrg', [Scanner::class, 'show']);

Route::post('/dataeditbrg', [Scanner::class, 'edit']);

Route::post('/datadltbrgs', [Scanner::class, 'destroy']);

Route::get('/datadltbrg', function(){
	return view('data.tbbarang.dltbrg');
});

Route::post('/dataupdatebrg', [Scanner::class, 'update']);

Route::post('/data/savebrg', [Scanner::class, 'storebrg']);

Route::get('/dataadm', function(){
	return view('data.tbadmin.admin');
});

Route::get('/insertadm', function(){
	return view('data.tbadmin.insert');
});

Route::post('/data/saveadmin', [Scanner::class, 'storeadm']);

Route::get('/showadm', [Scanner::class, 'showadm']);

Route::post('/dataeditadm', [Scanner::class, 'editadm']);

Route::post('/datadltadms', [Scanner::class, 'destroyadm']);

Route::post('/dataupdateadm', [Scanner::class, 'updateadm']);

Route::get('/datauser', function(){
	return view('data.tbuser.user');
});

Route::get('/insertuser', function(){
	return view('data.tbuser.insert');
});

Route::post('/data/saveuser', [Scanner::class, 'storeuser']);

Route::get('/showuser', [Scanner::class, 'showuser']);

Route::post('/dataedituser', [Scanner::class, 'edituser']);

Route::post('/datadltuser', [Scanner::class, 'destroyuser']);

Route::post('/dataupdateuser', [Scanner::class, 'updateuser']);

Route::get('/showiden', [Scanner::class, 'showiden']);

Route::get('/showitem', [Scanner::class, 'showitem']);

Route::get('/showdetil', [Scanner::class, 'showdetil']);

Route::post('/datadltiden', [Scanner::class, 'deleteiden']);
Route::post('/datadltitem', [Scanner::class, 'deleteitem']);