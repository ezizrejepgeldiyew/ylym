<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\LessonNameController;
use App\Http\Controllers\Admin\QuestionsController;
use App\Http\Controllers\Admin\TalypLoginController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\User\TestController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Models\TalypLogin;

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

Route::controller(IndexController::class)->group(function(){
    Route::get('statistika','statistika')->name('statistika');
});



Route::controller(TestController::class)->group(function(){
    Route::get('usertest/{id}','usertest')->name('usertest');
    Route::post('answertest/{id}','answertest')->name('answertest');
});


Route::resource('/LessonName',LessonNameController::class);
Route::resource('/Questions', QuestionsController::class);
Route::get('QuestionExport/{id}',[QuestionsController::class,'QuestionExport'])->name('QuestionExport');
Route::resource('/TalypLogin', TalypLoginController::class);
Route::get('TalypLoginExport/{id}',[TalypLoginController::class,'TalypLoginExport'])->name('TalypLoginExport');

Auth::routes();
Route::get('/index',[IndexController::class,'index'])->name('index');
Route::get('/home', [HomeController::class, 'index'])->name('home');


Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);

});
Route::group(['middleware' => ['guest']], function(){
    Route::get('/',[IndexController::class,'login1'])->name('login1');
});



Route::post('file-import', [ImportController::class, 'fileImport'])->name('file-import');
