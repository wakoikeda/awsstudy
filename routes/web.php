<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;      //追加
Route::get('/', [PostController::class, 'index']);
Route::get('/posts/{post}', [PostController::class ,'show']);
// '/posts/{対象データのID}'にGetリクエストが来たら、PostControllerのshowメソッドを実行する
?>