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
use App\Http\Controllers\TypeOfCateController;

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

});
//User
Route::get('/personal-infomation/{us_name}', [HomeController::class, 'personalInfo']);
Route::get('/edit-profile/{id_user}', [HomeController::class, 'editUser']);
Route::post('/save-profile/{id_user}', [HomeController::class, 'saveUser']);
//Page
//Login
Route::get('/login',[HomeController::class, 'login']);
Route::get('/log-out',[HomeController::class, 'logout']);
Route::post('/register',[HomeController::class, 'register']);
Route::post('/log-in',[HomeController::class, 'goToPage']);
//Category
Route::get('/category-news/{id_cate}/{pages}',[CateController::class,'category_news']);
//News
Route::post('/add-comment/{id_news}',[NewsController::class,'add_comment']);
Route::post('/search-news',[NewsController::class,'searchNews']);
Route::get('/search-news/{name_search}/{pages}',[NewsController::class,'searchNewsByNumberPages']);
//Replies
Route::post('/replies/{id_news}/{id_comment}',[ReplyController::class,'replies']);
//SendMail
Route::post('/send-mail',[HomeController::class, 'sendMail']);
Route::post('/save-password/{email}',[HomeController::class, 'savePassword']);
Route::get('/check-email',[HomeController::class, 'checkEmail']);
Route::get('/email-notification',[HomeController::class, 'email_notification']);
Route::get('/change-pass/{email}',[HomeController::class, 'changePassword']);
//Type of Category
Route::get('/category-type-news/{id_type}/{pages}',[TypeOfCateController::class,'selectType']);
//FeedBack
Route::post('/send-fb/{username}',[FeedBackController::class, 'sendFeedBack']);
//Login FB
Route::get('/login-fb',[HomeController::class, 'loginFacebook']);
Route::get('/callback',[HomeController::class, 'callbackFacebook']);
//Login GG
Route::get('/login-gg',[HomeController::class, 'loginGG']);
Route::get('/google/callback',[HomeController::class, 'callbackGG']);

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
    // Route::get('/details-news/{id_news}',[NewsController::class,'detailNews'])->name('news.detail');
    Route::get('/active-news/{level_news}/{id_type}/{id_news}',[NewsController::class,'changeDisplayNews'])->name('new.active');
    //Search
    // Route::get('/search-cate',[SearchController::class,'searchForm']);
    Route::post('/form-search',[SearchController::class,'searchForm']);
});