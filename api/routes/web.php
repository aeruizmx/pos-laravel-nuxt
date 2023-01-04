<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['prefix'=>'api'], function(){
    Route::apiResource('/brands', 'BrandController');
    Route::apiResource('/measures', 'MeasureController');
    Route::apiResource('/categories', 'CategoryController');
    Route::apiResource('/articles', 'ArticleController');
    Route::apiResource('/documents', 'DocumentController');
    Route::apiResource('/boxes', 'BoxController');
    Route::apiResource('/boxmovements', 'BoxController');
});


Route::get('/', function () {
    return view('welcome');
});
