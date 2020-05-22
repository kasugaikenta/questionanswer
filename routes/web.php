<?php

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


//質問表示画面（1つの質問の詳細画面）へ
Route::get('/detail/{question_id}', 'QuestionsController@detail');

//質問投稿画面へ
Route::get('/question', 'QuestionsController@question');

//回答投稿画面へ
Route::get('/answer/{question_id}', 'AnswersController@answer');

//質問記録
Route::post('/questionsave', 'QuestionsController@sendQuestion');

//回答記録
Route::post('/answer/question/{question_id}', 'AnswersController@sendAnswer');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//質問一覧画面へ
Route::get('/', 'QuestionsController@index');

//マイページ
Route::get('/question/myquestions/', 'QuestionsController@my_questions');

//質問検索
Route::get('/search','QuestionsController@search');

//user詳細
Route::get('/user/show','HomeController@show')->name('user_show');

//user編集
Route::get('/user/edit','HomeController@edit');

//user編集update
Route::post('/user/edit/update','HomeController@update');

//password確認画面
Route::get('/user/password','HomeController@confirm');

//質問キーワード検索
Route::get('/searchkeywords','QuestionsController@keywords');

//通知flag０へ
Route::get('/question/viewed/{question_id}','QuestionsController@viewed');
