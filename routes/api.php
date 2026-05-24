<?php
 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Admin\ArticleController as AdminArticleController;
use App\Http\Controllers\AuthController;

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::get("/articles", [ArticleController::class, "index"]);
Route::get("/articles/{article}", [ArticleController::class, "show"]);

Route::get('/admin/articles', [AdminArticleController::class, 'index'])->middleware('auth:sanctum');
Route::post('/admin/articles', [AdminArticleController::class, 'store'])->middleware('auth:sanctum');
Route::delete('/admin/articles/{article}', [AdminArticleController::class, 'delete'])->middleware('auth:sanctum');
