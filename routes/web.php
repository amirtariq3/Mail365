<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BoardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\NewColumeController;
use App\Http\Controllers\FilterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SignatureController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Office365\Office365LoginController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/signin', [Office365LoginController::class, 'redirectToProvider'])->name('signin');
Route::get('/callback', [Office365LoginController::class, 'handleProviderCallback']);
Route::get('/header/{token}', [AuthController::class, 'header'])->name('header');
Route::get('/signout', [AuthController::class, 'signout'])->name('signout');
Route::get('/Inbox/{token}/{parentFolderId}', [AuthController::class, 'inbox'])->name('inbox');
Route::get('/Sent Items/{token}/{parentFolderId}', [AuthController::class, 'send'])->name('send');
Route::get('/Deleted Items/{token}/{parentFolderId}', [AuthController::class, 'trash'])->name('trash');
Route::get('/Drafts/{token}/{parentFolderId}', [AuthController::class, 'draft'])->name('draft');
Route::get('/Archive/{token}/{parentFolderId}', [AuthController::class, 'archive'])->name('archive');
Route::get('/Junk Email/{token}/{parentFolderId}', [AuthController::class, 'junk'])->name('junk');
Route::get('/Outbox/{token}/{parentFolderId}', [AuthController::class, 'outbox'])->name('outbox');
Route::get('/Conversation History/{token}/{parentFolderId}', [AuthController::class, 'history'])->name('history');
Route::get('/detail/{token?}/{id?}', [AuthController::class, 'detail'])->name('detail');
Route::get('/draft_detail/{token}/{id}', [AuthController::class, 'draft_detail'])->name('draft_detail');
Route::get('/compose/{token}', [AuthController::class, 'compose'])->name('compose');
Route::post('/sendmail', [AuthController::class, 'sendmail'])->name('mail');
Route::get('/ali/{token}/{parentFolderId}', [AuthController::class, 'ali'])->name('ali');
Route::get('/faran/{token}/{parentFolderId}', [AuthController::class, 'faran'])->name('faran');
Route::get('/Demo/{token}/{parentFolderId}', [AuthController::class, 'demo'])->name('Demo');
Route::get('/send-items/{token}/{parentFolderId}', [AuthController::class, 'send'])->name('send_message');

Route::get('/reply/{token}/{id}', [AuthController::class, 'reply'])->name('reply_view');
Route::get('/reply', [AuthController::class, 'reply_message'])->name('replay_email');

Route::get('/forward/{token}/{id}', [AuthController::class, 'forward_view'])->name('forward_view');
Route::get('/forward', [AuthController::class, 'forward'])->name('forward');

Route::get('/delete/{token}/{id}', [AuthController::class, 'delete'])->name('delete');
Route::get('/create-folder/{token}', [AuthController::class, 'createFolder'])->name('create_folder');
Route::get('/move/{id}/{folder}', [AuthController::class, 'move'])->name('move');

Route::get('/copy/{id}/{folder}', [CategoryController::class, 'copy'])->name('copy');
Route::get('/add_category', [CategoryController::class, 'add_category'])->name('add_category');
Route::post('/assign/{id}', [CategoryController::class, 'assign'])->name('assign');
Route::get('/unassign/{id}', [CategoryController::class, 'unassign'])->name('unassign');
Route::get('/unread/{id}', [CategoryController::class, 'unread'])->name('unread');
Route::get('/read/{id}', [CategoryController::class, 'read'])->name('read');
Route::get('/mark_as_flagged/{id}',[CategoryController::class,'flag'])->name('flag');
Route::get('/mark_as_notFlagged/{id}',[CategoryController::class,'unflag'])->name('unflag');
Route::get('/mark_as_flagged_today/{id}',[CategoryController::class,'flag_today'])->name('flag_today');
Route::get('/mark_as_flagged_tomorrow/{id}',[CategoryController::class,'flag_tomorrow'])->name('flag_tomorrow');
Route::get('/mark_as_flagged_this_week/{id}',[CategoryController::class,'flag_this_week'])->name('flag_this_week');
Route::get('/mark_as_flagged_next_week/{id}',[CategoryController::class,'flag_next_week'])->name('flag_next_week');
Route::get('/mark_as_flagged_no_date/{id}',[CategoryController::class,'flag_no_date'])->name('flag_no_date');
Route::get('/mark_as_flagged_clear_flag/{id}',[CategoryController::class,'flag_clear_flag'])->name('flag_clear_flag');
Route::get('/mark_as_flagged_clear_complete/{id}',[CategoryController::class,'flag_clear_complete'])->name('flag_clear_complete');
Route::get('/mark_as_completed/{id}',[CategoryController::class,'complete'])->name('complete');
Route::get('/mark_as_pinned/{id}',[CategoryController::class,'pin'])->name('pin');
Route::get('/mark_as_Unpinned/{id}',[CategoryController::class,'unpin'])->name('unpin');
Route::get('/edit_category',[CategoryController::class,'edit_category'])->name('edit_category');
Route::get('/delete_category',[CategoryController::class,'delete_category'])->name('delete_category');

Route::POST('/search-category', [CategoryController::class, 'searchCategory'])->name('search_category');
//new routes
Route::get('/mark_as_flagged/{id}',[CategoryController::class,'flag'])->name('flag');
Route::get('/mark_as_completed/{id}',[CategoryController::class,'complete'])->name('complete');
Route::get('/mark_as_pinned/{id}',[CategoryController::class,'pin'])->name('pin');
Route::get('/mark_as_Unpinned/{id}',[CategoryController::class,'unpin'])->name('unpin');
//add comments 
Route::post('/comment/{id}',[CommentsController::class,'store'])->name('comment');

//add to favorite
Route::get('/add-to-favorite/{id}', [CommentsController::class, 'favorite'])->name('favorite');
//filter
Route::post('/filter',[CommentsController::class,'filter'])->name('filter');
Route::get('/mark-all-read',[CommentsController::class,'allread'])->name('allread');

Route::get('/board/{token}', [CommentsController::class,'board'])->name('board');
Route::get('/board/ali/{token}/{parentFolderId}', [BoardController::class,'ali'])->name('board_ali');
Route::get('/board/Archive/{token}/{parentFolderId}', [BoardController::class,'Archive'])->name('board_Archive');
Route::get('/board/Conversation History/{token}/{parentFolderId}', [BoardController::class,'Conversation_History'])->name('board_Conversation_History');
Route::get('/board/Deleted Items/{token}/{parentFolderId}', [BoardController::class,'Deleted_Items'])->name('board_Deleted_Items');
Route::get('/board/Demo/{token}/{parentFolderId}', [BoardController::class,'Demo'])->name('board_Demo');
Route::get('/board/Drafts/{token}/{parentFolderId}', [BoardController::class,'Drafts'])->name('board_Drafts');
Route::get('/board/faran/{token}/{parentFolderId}', [BoardController::class,'faran'])->name('board_faran');
Route::get('/board/farann/{token}/{parentFolderId}', [BoardController::class,'farann'])->name('board_farann');
Route::get('/board/Inbox/{token}/{parentFolderId}', [BoardController::class,'Inbox'])->name('board_Inbox');
Route::get('/board/Junk Email/{token}/{parentFolderId}', [BoardController::class,'Junk_Email'])->name('board_Junk_Email');
Route::get('/board/Send Item/{token}/{parentFolderId}', [BoardController::class,'Send_Item'])->name('board_Send_Item');



Route::get('/status/{id}/{col}',[CommentsController::class,'status'])->name('status');
Route::get('/status_ali/{id}/{col}',[BoardController::class,'status_ali'])->name('status');
Route::get('/status_archive/{id}/{col}',[BoardController::class,'status_archive'])->name('status');
Route::get('/status_conversation_history/{id}/{col}',[BoardController::class,'status_conversation_history'])->name('status');
Route::get('/status_deleted_items/{id}/{col}',[BoardController::class,'status_deleted_items'])->name('status');
Route::get('/status_demo/{id}/{col}',[BoardController::class,'status_demo'])->name('status');
Route::get('/status_drafts/{id}/{col}',[BoardController::class,'status_drafts'])->name('status');
Route::get('/status_faran/{id}/{col}',[BoardController::class,'status_faran'])->name('status');
Route::get('/status_farann/{id}/{col}',[BoardController::class,'status_farann'])->name('status');
Route::get('/status_inbox/{id}/{col}',[BoardController::class,'status_inbox'])->name('status');
Route::get('/status_junk_email/{id}/{col}',[BoardController::class,'status_junk_email'])->name('status');
Route::get('/status_send_item/{id}/{col}',[BoardController::class,'status_send_item'])->name('status');

Route::get('/reply', [AuthController::class, 'reply_message'])->name('replay_email');
Route::get('/forward', [AuthController::class, 'forward'])->name('forward');
Route::get('/delete_card/{id}',[NewColumeController::class,'delete_card'])->name('delete_card');

Route::get('/add_colume',[NewColumeController::class,'index'])->name('create_colume');
Route::get('/delete_colume/{id}',[NewColumeController::class,'delete'])->name('delete_colume');
Route::get('/update_colume',[NewColumeController::class,'update_colume'])->name('update_colume');
Route::get('/delete_card/{id}',[NewColumeController::class,'delete_card'])->name('delete_card');
Route::get('/update_card/{id}',[NewColumeController::class,'update_card'])->name('update_card');
Route::get('/reply_card/{id}',[NewColumeController::class,'reply_card'])->name('reply_card');
Route::get('/delete_card/{id}',[NewColumeController::class,'delete_card'])->name('delete_card');
Route::get('/done_card/{id}',[NewColumeController::class,'done_card'])->name('done_card');
Route::get('/delete_colume_ali/{id}',[NewColumeController::class,'delete_ali'])->name('delete_colume_ali');
Route::get('/delete_colume_archive/{id}',[NewColumeController::class,'delete_archive'])->name('delete_colume_archive');
Route::get('/delete_colume_conversation_history/{id}',[NewColumeController::class,'delete_conversation_history'])->name('delete_colume_conversation_history');
Route::get('/delete_colume_deleted_items/{id}',[NewColumeController::class,'delete_deleted_items'])->name('delete_colume_deleted_items');
Route::get('/delete_colume_demo/{id}',[NewColumeController::class,'delete_demo'])->name('delete_colume_demo');
Route::get('/delete_colume_drafts/{id}',[NewColumeController::class,'delete_drafts'])->name('delete_colume_drafts');
Route::get('/delete_colume_faran/{id}',[NewColumeController::class,'delete_faran'])->name('delete_colume_faran');
Route::get('/delete_colume_farann/{id}',[NewColumeController::class,'delete_farann'])->name('delete_colume_farann');
Route::get('/delete_colume_junk_email/{id}',[NewColumeController::class,'delete_junk_email'])->name('delete_colume_junk_email');
Route::get('/delete_colume_send_items/{id}',[NewColumeController::class,'delete_send_items'])->name('delete_colume_send_items');
//filtering data
Route::post('/filter',[FilterController::class,'done_filter'])->name('done_filter');
// Route::post('/filter',[FilterController::class,'done_filter'])->name('done_filter');
//add todo 
Route::post('/todo/{id}',[CommentsController::class,'todo'])->name('todo');
Route::get('/delete-todo/{id}',[CommentsController::class,'delete_todo'])->name('delete_todo');
Route::get('/set-date',[CommentsController::class,'set_date'])->name('set_date');
Route::get('/delete-set-date/{id}',[CommentsController::class,'delete_set_date'])->name('delete_set_date');

//user authentication
Route::get('/user-sigin',[UserController::class,'index'])->name('user_login');
Route::post('/user-sigin',[UserController::class,'login'])->name('user_login');
Route::get('/user-sigup',[UserController::class,'create'])->name('user_sigup');
Route::post('/user-sigup',[UserController::class,'store'])->name('user_store');
Route::get('/user-logout',[UserController::class,'logout'])->name('logout');

Route::get('/notification',[CommentsController::class,'index'])->name('notification');
//signature
Route::get('/add-signature', [SignatureController::class, 'index'])->name('add_signature');
Route::post('/add-signature', [SignatureController::class, 'store'])->name('store_signature');
Route::get('/signature-profile', [SignatureController::class, 'show'])->name('signature_profile');

Route::get('/datepicker', ['as'=>'merge', 'uses'=>'SignatureController@datepicker']);
Route::post('/datepicker', ['as'=>'merge', 'uses'=>'SignatureController@datestore']);










