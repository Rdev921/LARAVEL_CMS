<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;


// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[BaseController::class,'home']);
Route::get('/company',[BaseController::class,'company']);
Route::get('/services',[BaseController::class,'services']);
Route::get('/contact',[BaseController::class,'contact']);

Route::get('admin',[AdminController::class,'index'])->name('admin.login');
Route::post('admin',[AdminController::class,'makeLogin']);
Route::get('dashboard',[AdminController::class,'dashboard']);


Route::group(['middleware' => ['admin']],function(){
    
    Route::get('logout',[AdminController::class,'logout']);
    Route::get('add-page',[PageController::class,'AddPage'])->name('add-page');
    Route::match(['get','post'],'create-page',[PageController::class,'createPage'])->name('create-page');
    Route::get('company-page-add',[PageController::class,'ourCompany'])->name('company.page.add');
    
    //***********************Route Post*********************
    Route::get('add-post',[Postcontroller::class,'create'])->name('add-post');
    Route::get('post-show',[Postcontroller::class,'show'])->name('post-show');
    Route::get('post-edit/{post_id?}',[Postcontroller::class,'create'])->name('post-edit');
    Route::post('add-post/{post_id?}',[Postcontroller::class,'store'])->name('post-store');
    Route::post('/post-delete',[Postcontroller::class,'delete'])->name('post-delete');
    
});


