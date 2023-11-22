<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CateController;
use App\Http\Controllers\FeedBackController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserController;

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
// Page
Route::prefix('page')->group(function(){
    Route::get('/', [HomeController::class, 'index'])->name('page.home');
    Route::prefix('news')->group(function(){
        Route::get('/{slug}',[NewsController::class,'detail'])->name('news.detail');
    });
    Route::prefix('category')->group(function(){
        Route::get('/{slug}',[CateController::class,'category'])->name('category.allCategory');
    });
    Route::prefix('tags')->group(function(){
        Route::get('/{slug}',[TagController::class,'find'])->name('tags.find');
    });
    Route::prefix('customer')->group(function(){
        Route::post('/login',[CustomerController::class,'login'])->name('customer.login');
        Route::post('/register',[CustomerController::class,'register'])->name('customer.register');
        Route::post('/change',[CustomerController::class,'change'])->name('customer.change');
        Route::get('/setting',[CustomerController::class,'setting'])->name('customer.setting');
        Route::get('/delete',[CustomerController::class,'delete'])->name('customer.delete');
        Route::get('/logout',[CustomerController::class,'logout'])->name('customer.logout');
    });
    Route::prefix('comment')->group(function(){
        Route::post('/comment',[CommentController::class,'comment'])->name('comment.comment');
    });
});

//Admin
//Category
Route::prefix('admin')->group(function(){
    Route::get('/dashboard',[AdminController::class,'index'])->name('admin.dashboard');
    Route::get('/login',[AdminController::class,'login'])->name('admin.login');
    Route::get('/logout',[AdminController::class,'logout'])->name('admin.logout');
    Route::post('/signIn',[AdminController::class,'signIn'])->name('admin.signIn');
    Route::prefix('category')->group(function(){
        Route::get('/list',[CateController::class,'listCate'])->name('category.list');
        Route::get('/insert',[CateController::class,'insertCate'])->name('category.insert');
        Route::get('/edit-form',[CateController::class,'formEditCate'])->name('category.edit');
        Route::get('/delete',[CateController::class,'delete'])->name('category.delete');
        Route::post('/save',[CateController::class,'saveCate'])->name('category.save');
        Route::post('/edit',[CateController::class,'editCate'])->name('category.change');
        Route::post('/choose',[CateController::class,'choose'])->name('category.choose');
    });

    //News
    Route::prefix('news')->group(function(){
        Route::get('/list',[NewsController::class,'listNews'])->name('news.list');
        Route::get('/insert',[NewsController::class,'insertFormNews'])->name('news.insert');
        Route::get('/edit',[NewsController::class,'editFormNews'])->name('news.edit');
        Route::get('/delete',[NewsController::class,'deleteNews'])->name('news.delete');
        Route::post('/save',[NewsController::class,'insertNews'])->name('news.save');
        Route::post('/change',[NewsController::class,'editNews'])->name('news.change');
        Route::get('/{slug}',[NewsController::class,'detailNewsAdmin'])->name('news.detailAdmin');
    });
    //Tags
    Route::prefix('tags')->group(function(){
        Route::get('/list',[TagController::class,'list'])->name('tags.list');
        Route::get('/insert',[TagController::class,'insert'])->name('tags.insert');
        Route::get('/edit',[TagController::class,'edit'])->name('tags.edit');
        Route::get('/delete',[TagController::class,'delete'])->name('tags.delete');
        Route::post('/save',[TagController::class,'save'])->name('tags.save');
        Route::post('/change',[TagController::class,'change'])->name('tags.change');
    });
    //Customer
    Route::prefix('customer')->group(function(){
        Route::get('/list',[CustomerController::class,'list'])->name('customer.list');
    });
    //User
    Route::prefix('user')->group(function(){
        Route::get('/list',[UserController::class,'list'])->name('user.list');
        Route::get('/insert',[UserController::class,'insert'])->name('user.insert');
        Route::get('/setting',[UserController::class,'setting'])->name('user.setting');
        Route::get('/delete',[UserController::class,'delete'])->name('user.delete');
        Route::post('/permission',[UserController::class,'permission'])->name('user.permission');
        Route::post('/save',[UserController::class,'save'])->name('user.save');
        Route::post('/change',[UserController::class,'change'])->name('user.change');
    });
    //Comment
    Route::prefix('comment')->group(function(){
        Route::get('/list',[CommentController::class,'list'])->name('comment.list');
        Route::post('/update',[CommentController::class,'update'])->name('comment.update');
        Route::post('/reply',[CommentController::class,'reply'])->name('comment.reply');
    });
});