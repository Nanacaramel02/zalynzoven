<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\AdminController;

use App\Http\Controllers\OrderController;

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

Route::get('/nanacaramel', function () {
    return view('welcome');
});


Route::get("/",[HomeController::class,"index"])->name('homepage');
Route::get("/redirects",[HomeController::class,"redirects"]);
Route::get("/order",[HomeController::class,"order"]);
Route::post("/addtocart/{id}",[HomeController::class,"addtocart"]);
Route::get("/showcart/{id}",[HomeController::class,"showcart"]);
Route::get("/remove/{id}",[HomeController::class,"remove"]);
Route::post("/orderconfirm/{id}",[HomeController::class,"orderconfirm"]);
Route::get("/payment/{id}",[HomeController::class,"payment"])->name('payment');
Route::post("/makepayment/{id}",[HomeController::class,"makepayment"]);
Route::get("/successorder/{id}",[HomeController::class,"successorder"]) ->name('successorder');


Route::get("/adminhome",[AdminController::class,"adminhome"]);
Route::get("/users",[AdminController::class,"user"]);
Route::get("/deleteuser/{id}",[AdminController::class,"deleteuser"]);

Route::get("/foodmenu",[AdminController::class,"foodmenu"])->name('foodmenu');
Route::get("/addnewmenu",[AdminController::class,"addnewmenu"]);
Route::post("/uploadfood",[AdminController::class,"uploadfood"]);
Route::get("/updateproduct/{id}",[AdminController::class,"updateproduct"]);
Route::post("/update/{id}",[AdminController::class,"update"]);
Route::get("/deleteproduct/{id}",[AdminController::class,"deleteproduct"]);

Route::post("/reservation",[HomeController::class,"reservation"]);
Route::get("/successreservation/{id}", [HomeController::class, "successreservation"])->name('successreservation');

Route::get("/viewreservation",[AdminController::class,"viewreservation"])->name('viewreservation');
Route::get("/addnewreservation",[AdminController::class,"addnewreservation"]);
Route::post("/uploadreservation",[AdminController::class,"uploadreservation"]);
Route::get("/updatereservation/{id}",[AdminController::class,"updatereservation"]);
Route::post("/update3/{id}",[AdminController::class,"update3"]);
Route::get("/deletereservation/{id}",[AdminController::class,"deletereservation"]);

Route::get("/viewstaff",[AdminController::class,"viewstaff"]) ->name('viewstaff');
Route::get("/addnewstaff",[AdminController::class,"addnewstaff"]);
Route::post("/uploadstaff",[AdminController::class,"uploadstaff"]);
Route::get("/updatestaff/{id}",[AdminController::class,"updatestaff"]);
Route::post("/update2/{id}",[AdminController::class,"update2"]);
Route::get("/deletestaff/{id}",[AdminController::class,"deletestaff"]);

Route::get("/orders",[AdminController::class,"orders"])->name('vieworder');
Route::get("/addneworder",[AdminController::class,"addneworder"]);
Route::post("/addtocart2/{id}",[AdminController::class,"addtocart"]);
Route::get('/removefromcart/{id}', [AdminController::class, 'removeFromCart']);
Route::post('/uploadorder', [AdminController::class, 'uploadOrder']);
Route::get("/updateorder/{id}",[AdminController::class,"updateorder"]);
Route::get('/removefromorder/{id}', [AdminController::class, 'removeFromOrder']);
Route::post("/addtocart3/{id}",[AdminController::class,"addtocart3"]);
Route::post("/update4/{id}",[AdminController::class,"update4"]);
Route::get("/deleteorder/{id}",[AdminController::class,"deleteorder"]);




Route::middleware([ 'auth:sanctum', config('jetstream.auth_session'), 'verified', ])->group(function () {
    Route::get('/dashboard', function () { return view('dashboard'); })->name('dashboard');
});

