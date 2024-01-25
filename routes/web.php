<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\DashboardController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



route::get('/',[ItemsController::class,'ShowItemGroup'])->name('welcome');
route::get('/addtocart/{id}',[ItemsController::class,'AddtoCart'])->name('addtocart');
route::get('/showproduct/{id}',[ItemsController::class,'Showproduct'])->name('showproduct');
route::get('/itemgroup',[ItemsController::class,'GetItemGroup'])->name('itemgroup');
route::post('save',[ItemsController::class,"SaveGroupsItems"])->name('save');
route::get('testapi',[ItemsController::class,"testapi"])->name('testapi');


route::get('/checkout',[ItemsController::class,'Checkout'])->name('checkout');


route::get('/del/{x}',[ItemsController::class,"del"])->name('del');


route::post('/update',[ItemsController::class,"update"])->name('update');

route::get('/edit/{x}',[ItemsController::class,'Edit'])->name('edit');(

    route::get('/cpanel',[DashboardController::class,'DisplayItems'])->name('controlpanel'));
   route::get('/addgritem',[DashboardController::class,'displayadditemsgroup'])->name('addgritem');

   route::get('/logout',[DashboardController::class,'logout'])->name('logout');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
