<?php

use App\Http\Middleware\isAuth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});


//rotalar
Route::group(['middleware' => 'isAuth'], function(){

    Route::get('/yusuf', function(){
        return 'yusuf';
    }); // Buradaki ->middleware(['kayitliMi']) gereksizdi, sildim. Çünkü zaten grubun içinde.

    Route::get('/dag', function(){
        return 'dag';
    });

    Route::get('/code23', function(){
        return 'Code23';
    }); // Buradaki boş ->middleware() çağrısını sildim, hata verdirir.

    //Admin rotaları
    Route::group(['prefix' => 'admin', 'middleware' => 'isAdmin'], function () {

    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    Route::group(['prefix' => 'carBrand'], function () {
        Route::get('/index', [AdminController::class,'carBrandIndex'])->name('index');
        Route::get('/create', [AdminController::class,'carBrandCreatePage'])->name('createPage');
        Route::get('/update', [AdminController::class,'carBrandUpdatePage'])->name('updatePage');
    });
});

        
        
});



Route::middleware(['auth:sanctum', config('jetstream.auth_session'),'verified',])
    ->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
    })->name('dashboard');
});


/* Test Routes */
Route::get('panel/template',function(){
    return view('panel.layout.app');
});