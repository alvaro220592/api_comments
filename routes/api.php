<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\CommentController;


Route::group(['prefix' => 'v1'], function(){
    
    Route::resource('comments', CommentController::class);
    
});


