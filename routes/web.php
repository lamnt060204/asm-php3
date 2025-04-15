<?php

use App\Http\Controllers\client\HomeController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\addmin\CategoryController;
use App\Http\Controllers\addmin\ProductController;
use App\Http\Controllers\AuthController;

Route::get("/login", [AuthController::class,"login"])->name("login");
Route::post("/post-login", [AuthController::class,"postLogin"])->name("postLogin");
Route::get("/post-logout", [AuthController::class,"logout"])->name("logout");
Route::get("/register",[AuthController::class,"register"])->name("register");
Route::post("/post-register",[AuthController::class,"postRegister"])->name("postRegister");

Route::middleware('client')->group(function () {
   
    Route::get('/', [HomeController::class, 'home'])->name("home");
    Route::get("detall-products/{id}", [HomeController::class, "detallProduct"])->name("detallProduct");

});
Route::group([
    "prefix"=> "admin",
    "as"=> "admin.",
    "middleware"=> "admin",

], function () {
    Route::get("/dashboard", [CategoryController::class,"dashboard"])->name("dashboard");
    Route::resource("categories",CategoryController::class);
    Route::get("category/list-soft-delete", [CategoryController::class,"listSoftDelete"])->name("listSoftDeleteCategores");
    Route::delete("category/delete-forever/{id}", [CategoryController::class,"deleteForeverCategory"])->name("deleteForeverCategory");
    Route::get("category/restore/{id}", [CategoryController::class,"restore"])->name("restore");
   

    Route::resource("products",ProductController::class);
    Route::get("/product/list-soft-delete",[ProductController::class,"listSoftDelete"])->name("listSoftDelete");
    Route::delete("product/delete-forever/{id}", [ProductController::class,"deleteForever"])->name("deleteForever");
    Route::get("category/restore/{id}", [ProductController::class,"restore"])->name("restore");


});