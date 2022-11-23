<?php


use Illuminate\Support\Facades\Route;

//Route::apiResource('/users',\App\Http\Controllers\UserController::class);


    Route::get('/comments', [\App\Http\Controllers\CommentController::class,'index'])->name('index');
    Route::get('comments/{comment}', [\App\Http\Controllers\CommentController::class,'show'])->name('show');
    Route::post('/comments', [\App\Http\Controllers\CommentController::class,'store'])->name('store');
    Route::patch('/comments/{comment}', [\App\Http\Controllers\CommentController::class,'update'])->name('update');
    Route::delete('/comments/{comment}', [\App\Http\Controllers\CommentController::class,'destroy'])->name('destroy');


?>
