<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;

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

//登録画面の表示
Route::get('/register', [AuthController::class, 'user']);

//登録ボタン
Route::post('/register',[AuthController::class,'store']);

//ログインボタン
Route::post('/admin',[AuthController::class,'login'])->middleware(['auth'])->name('admin')
;

//問い合わせフォームの表示
Route::get('/', [ContactController::class, 'index'])->name('contact.form');

//問い合わせ内容を確認画面へ表示
Route::post('/contact/confirm', [ContactController::class, 'confirm'])->name('contact.confirm');

//確認画面から送信or修正
Route::post('/contact/submit', [ContactController::class, 'store'])->name('contact.store');

//thanks画面へ
Route::get('/contact/thanks', fn()=>view('thanks'))->name('contact.thanks');

//管理画面へ
Route::get('/admin',[AdminController::class,'index']);

//検索
Route::get('/admin/search',[AdminController::class,'search'])->name('admin.search');

//モーダルウィンドウ表示
Route::get('/admin/detail/{id}', [AdminController::class, 'detail'])->name('admin.detail');


// データの削除
Route::delete('/contacts/{contact}', [ContactController::class, 'destroy'])->name('contacts.destroy');

//ログアウト
Route::post('/logout',[AuthController::class,'logout'])->name('logout');