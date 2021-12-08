<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\MailController;
use App\Http\Controllers\api\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::post('/all_mail', [MailController::class, 'allmail'])->name('all_mail');  
Route::group(['middleware' => 'cros'], function ()
{
Route::post('/send-mail', 'api\MailController@send_mail');
Route::post('/reply-mail', 'api\MailController@reply_mail');
Route::post('/forward-mail', 'api\MailController@forward_mail');
Route::post('/list-mail', 'api\MailController@list_mail');
Route::post('/all-mail', 'api\MailController@allmail');

Route::post('/all-folder', 'api\MailController@allfolder');
Route::post('/mail-detail/{id}', 'api\MailController@mail_detail');
Route::post('/delete-mail', 'api\MailController@destroy');


Route::post('/creat-column', 'api\ColumnController@creat');
Route::post('/delete-column/{id}', 'api\ColumnController@delete');
Route::post('/update-column', 'api\ColumnController@update_colume');
Route::post('/done-card', 'api\ColumnController@done_card');

Route::post('/creat-todo', 'api\CommentController@store_todo');
Route::post('/delete-todo', 'api\CommentController@delete_todo');
Route::post('/update-todo', 'api\CommentController@update_todo');


Route::post('/update-mail-column', 'api\MailController@update');
Route::post('/create-comment', 'api\CommentController@comment');
Route::post('/delete-comment', 'api\CommentController@delete_comment');
Route::post('/update-comment', 'api\CommentController@update_comment');

Route::post('/user-sigup', 'api\UserController@store');
Route::post('/user-sigin', 'api\UserController@login');
Route::post('/set-date', 'api\UserController@set_date');

Route::post('/filter', 'api\FilterController@filter')->name('filter');
Route::post('/mail-search', 'api\FilterController@search');
Route::post('/date-wise-filter', ['as'=>'merge', 'uses'=>'api\FilterController@date_wise']);




});
Route::group(['middleware' => 'auth:api'], function(){
    Route::post('/user-logout', 'api\UserController@logout');
    Route::get('/profile', ['as'=>'api.logout', 'uses'=>'api\UserController@show']);
 });