<?php


use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\OderController;
use App\Http\Controllers\Admin\UploadController;
use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

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

Route::get("/admin", function () {
    return view("admin.home");
});

Route::get('/', function () {
    Artisan::call('storage:link');
});
Route::post("/admin/product/add", [ProductsController::class, 'insert_product']);
Route::get("/admin/product/create", [ProductsController::class, 'add_product']);
Route::get("/admin/product/list", [ProductsController::class, 'list_product']);
Route::get("/admin/product/delete", [ProductsController::class, 'delete_product']);
Route::get("/admin/product/edit/{id}", [ProductsController::class, 'edit_product']);
Route::post("/admin/product/edit/{id}", [ProductsController::class, 'update_product']);


Route::get("/admin/oder/list", [OderController::class, 'oder_list']);
Route::get("/admin/oder/detail/{oder_detail}", [OderController::class, 'oder_detail']);
//upload
Route::post('/upload', [UploadController::class, 'upload']);
Route::post('/uploads', [UploadController::class, 'uploads']);

//fontend
Route::get('/', [FrontendController::class, 'index']);
Route::get('/category', [FrontendController::class, 'category']);

Route::get('/category/sort/', [FrontendController::class, 'sort']);

Route::get('/category/aothun', [FrontendController::class, 'aothun']);
Route::get('/category/aosomi', [FrontendController::class, 'aosomi']);
Route::get('/category/aokhoac', [FrontendController::class, 'aokhoac']);
Route::get('/category/aolen', [FrontendController::class, 'aolen']);
Route::get('/category/aopolo', [FrontendController::class, 'aopolo']);
Route::get('/product/{id}', [FrontendController::class, 'product']);

Route::get('/cart/view', [FrontendController::class, 'cart_view']);
Route::get('/cart', [FrontendController::class, 'cart']);
Route::get('/oder/confirm', function () {
    return view('oder.confirm');
});
Route::get('/oder/success', function () {
    return view('oder.success');
});


Route::get('/category/search', [FrontendController::class, 'search']);
//cart
Route::post('/cart/add', [FrontendController::class, 'add_cart']);
Route::get('/cart/delete/{id}', [FrontendController::class, 'delete_cart']);
Route::post('/cart/update', [FrontendController::class, 'update_cart']);

//oder
Route::post('/cart/send', [FrontendController::class, 'cart_send']);
