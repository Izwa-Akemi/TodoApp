<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodosController;

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

//一覧表示
//タスク表示
Route::get('/', [TodosController::class, 'index']);


//タスクを追加
Route::post('/todo/create', [TodosController::class, 'create']);


//更新処理
Route::post('/todo/update/{todo}', [TodosController::class, 'update']);


//タスクを削除
Route::delete('/todo/delete/{todo}', [TodosController::class, 'delete']);