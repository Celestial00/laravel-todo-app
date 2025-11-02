<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;


Route::controller(TodoController::class)->group(
    function(){
        
        Route::get("/", "index");
        Route::get("/delete/{id}", "destroy");
        Route::get("/edit/{id}", "edit");
        Route::get("/status/{id}/{status}", "updateStatus");
        Route::put("/update/{id}", "update");
        Route::post("/add", "store");
    }
);