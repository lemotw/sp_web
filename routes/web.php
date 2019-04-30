<?php

use App\Issue;
use App\IssueAnswer;
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
    return view('home');
});

Route::get('/test', function() {
    Issue::find(2)->reply("<p>aaaaaaaaaaaaaaaaa</p><p>aaaaaaaaaaaaaaaaa</p><p>aaaaaaaaaaaaaaaaa</p><p>aaaaaaaaaaaaaaaaa</p>");
});

Route::Group(['prefix' => 'issue'], function(){
    Route::get('/', function(){return view('issues')->with('issues', Issue::all());});
    Route::get('/id/{issue}', 'IssueController@show_issue');
    Route::post('/search', 'IssueController@search_issue')->name('issue_search');

    Route::get('/add', 'IssueController@show_issue_add')->name('show_issue_add');

    Route::post('/add', 'IssueController@add_issue')->name('add_issue');
    Route::post('/update', 'IssueController@update_issue')->name('update_issue');
    Route::post('/delete', 'IssueController@delete_issue')->name('delete_issue');

    Route::post('/reply/add', 'IssueController@reply_issue')->name('reply_issue');
    Route::post('/reply/update', 'IssueController@update_reply')->name('update_reply');
    Route::post('/reply/delete', 'IssueController@delete_reply')->name('delete_reply');
});