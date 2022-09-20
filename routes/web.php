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
//User
Route::get('/personal-infomation/{us_name}', [HomeController::class, 'personalInfo']);
Route::get('/edit-profile/{id_user}', [HomeController::class, 'editUser']);
Route::post('/save-profile/{id_user}', [HomeController::class, 'saveUser']);
//Page
Route::get('/', [HomeController::class, 'index']);
//Login
Route::get('/login',[HomeController::class, 'login']);
Route::get('/log-out',[HomeController::class, 'logout']);
Route::post('/register',[HomeController::class, 'register']);
Route::post('/log-in',[HomeController::class, 'goToPage']);
//Category
Route::get('/category-news/{id_cate}/{pages}',[CateController::class,'category_news']);
//News
Route::get('/detail-news/{id_news}',[NewsController::class,'detail_news']);
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
Route::get('/admin',[AdminController::class,'loginAdmin']);
//GET
Route::get('/dashboard',[AdminController::class,'index']);
Route::get('/logout',[AdminController::class,'logout']);
//POST
Route::post('/login-admin',[AdminController::class,'checkLogin']);
//Category
Route::get('/list-cate',[CateController::class,'listCate']);
Route::get('/insert-cate',[CateController::class,'insertCate']);
Route::get('/edit-form-cate/{id_cate}',[CateController::class,'formEditCate']);
Route::get('/delete-form-cate/{id_cate}',[CateController::class,'deleteCate']);
Route::post('/save-cate',[CateController::class,'saveCate']);
Route::post('/edit-cate/{id_cate}',[CateController::class,'editCate']);
//Type of Category
Route::get('/list-type',[TypeOfCateController::class,'listTypeOfCate']);
Route::get('/insert-type',[TypeOfCateController::class,'insertFormTypeOfCate']);
Route::get('/edit-form-type/{id_type}',[TypeOfCateController::class,'editFormTypeOfCate']);
Route::get('/delete-type/{id_type}',[TypeOfCateController::class,'deleteTypeOfCate']);
Route::get('/page-type/{page}',[TypeOfCateController::class,'selectPages']);
Route::post('/save-type',[TypeOfCateController::class,'insertTypeOfCate']);
Route::post('/edit-type/{id_type}',[TypeOfCateController::class,'editTypeOfCate']);

//News
Route::get('/list-news',[NewsController::class,'listNews']);
Route::get('/insert-news',[NewsController::class,'insertFormNews']);
Route::get('/edit-form-news/{id_news}',[NewsController::class,'editFormNews']);
Route::get('/delete-news/{id_news}',[NewsController::class,'deleteNews']);
Route::get('/details-news/{id_news}',[NewsController::class,'detailNews']);
Route::get('/active-news/{level_news}/{id_type}/{id_news}',[NewsController::class,'changeDisplayNews']);
Route::post('/save-news',[NewsController::class,'insertNews']);
Route::post('/edit-news/{id_news}',[NewsController::class,'editNews']);
//Slide
Route::get('/list-slide',[SlideController::class,'listSlide']);
Route::get('/insert-slide',[SlideController::class,'insertFormSlide']);
Route::get('/edit-form-slide/{id_slide}',[SlideController::class,'editFormSlide']);
Route::get('/delete-slide/{id_slide}',[SlideController::class,'deleteSlide']);
Route::post('/save-slide',[SlideController::class,'insertSlide']);
Route::post('/edit-slide/{id_slide}',[SlideController::class,'editSlide']);
//Search
// Route::get('/search-cate',[SearchController::class,'searchForm']);
Route::post('/form-search',[SearchController::class,'searchForm']);