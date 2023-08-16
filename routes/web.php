<?php

use App\Http\Controllers\add_produck;
use App\Http\Controllers\KategoriProductsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\StudentsController;
use App\Models\KategoriProducts;
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

Route::get('/', function () {
    return view('layout.home');
});

Route::get('/home', function () {
    return view('layout.home');
});

Route::get('/students/add', function () {
    return view('students.formadd');
});

Route::get('/products/add', function(){
    return view('products/formadd');
});

Route::get('/kategori_products/add', function(){
    return view('kategories/tambah');
});
Route::get('/login', [LoginController::class,'login'])->name('login');
Route::post('/login_proses', [LoginController::class,'login_proses'])->name('login_proses');
Route::resource('add_products', add_produck::class);
Route::resource('students', StudentsController::class);
Route::resource('products', ProductsController::class);
Route::resource('products/create', ProductsController::class);
Route::resource('kategori_products', KategoriProductsController::class);


Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');

Route::get('home', [HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');