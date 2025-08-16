<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ModalController;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CustomLoginRequest;

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

Route::get('/', [ContactController::class, 'index']);
Route::post('/confirm', [ContactController::class, 'confirm']);
Route::post('/thanks', [ContactController::class, 'store']);

Route::middleware('auth')->group(function () {
    Route::get('/admin', [AdminController::class, 'admin']);
    // Route::get('/admin/search', [AdminController::class, 'search']);
    Route::delete('/delete', [AdminController::class, 'destroy']);
    Route::get('/admin/export-users', [AdminController::class, 'exportFilteredUsers'])->name('users.export');
});

Route::post('/login', function (CustomLoginRequest $request) {
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->intended('/admin');
    }

    return back()->withErrors([
        'email' => '認証に失敗しました。',
    ]);
});
