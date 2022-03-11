<?php

use App\Models\product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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
    return view('welcome');
});

Route::resource('product', ProductController::class);

Route::get('new-product', function () {

    product::create([
        'productname' => 'New product',
        'price' => 100.8,
        'image' => 'new.png',
        'discription' => 'lorem'
    ]);

    return 'Done';
});
