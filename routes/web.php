<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Member\RegisterController;
use App\Http\Controllers\Member\DashboardController;
use App\Http\Controllers\Member\MovieController;
use App\Http\Controllers\Member\LoginController as MemberLoginController;
use App\Http\Controllers\Member\PricingController;
use App\Models\Transaction;
use App\Http\Controllers\Member\TransactionController as MemberTransactionController;
use Illuminate\Auth\Events\Login;

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
Route::get('/login',[LoginController::class, 'index'])->name('admin.login');
Route::get('/logout', [LoginController::class, 'logout'])->name('admin.logout');
Route::post('/login',[LoginController::class, 'authenticate'])->name('admin.login.auth');
Route::get('/', function () {
    return view('Admin.Dashboard');
});
Route::group(['prefix' => 'admin', 'middleware' => ['admin.auth']], function(){
    Route::group(['prefix' => 'movie'], function(){
        Route::get('/', [AdminController::class, 'index'])->name('AdminMovie');
        Route::get('/create', [AdminController::class, 'create'])->name('AdminMovieCreate');
        Route::post('/store', [AdminController::class, 'store'])->name('admin.movie.store');
        Route::get('/edit/{id}', [AdminController::class, 'edit'])->name('admin.movie.edit');
        Route::put('/update/{id}', [AdminController::class, 'update'])->name('admin.movie.update');
        Route::delete('/destroy/{id}', [AdminController::class, 'destroy'])->name('admin.movie.destroy');

    });
    Route::group(['prefix' => 'transaction'], function(){
        Route::get('/',[TransactionController::class, 'index'])->name('admin.transaction');
    });

});

Route::view('/', 'index');
Route::get('/register', [RegisterController::class, 'index'])->name('member.register');
Route::post('/storeregister', [RegisterController::class, 'store'])->name('member.store.register');
Route::get('member/login', [MemberLoginController::class, 'index'])->name('member.login');
Route::post('member/login', [MemberLoginController::class, 'auth'])->name('member.login.auth');

Route::group(['prefix' => 'member', 'middleware' => ['auth']], function(){
    Route::get('/', [DashboardController::class, 'index'])->name('member.dashboard');
    Route::get('movie/{id}', [MovieController::class, 'show'])->name('member.movie.detail');
    Route::get('/logout', [MemberLoginController::class, 'logout'])->name('member.logout');
    Route::post('transaction', [MemberTransactionController::class, 'store'])->name('member.transaction.store');
});
Route::get('pricing', [PricingController::class, 'index'])->name('pricing');
