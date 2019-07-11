<?php

use App\Issue;
use App\IssueAnswer;
use App\Issue_list;
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
    $issue_list = Issue_list::all();
    $issues = [];
    foreach($issue_list as $per)
        if($per->issue_id != -1)
            array_push($issues, $per->issue()->first());
    //turn list to issue.

    return view('home')->with('issues', $issues);
});

Route::get('/member', 'MemberController@show_member')->name('show_member');

Route::Group(['prefix' => 'issue'], function(){
    Route::get('/', 'IssueController@show_issues')->name('show_all_issue');
    Route::get('/id/{issue}', 'IssueController@show_issue')->name('show_issue');
    Route::post('/search', 'IssueController@search_issue')->name('issue_search');

    Route::get('/add', 'IssueController@show_issue_add')->name('show_issue_add');

    Route::post('/add', 'IssueController@add_issue')->name('add_issue');
    Route::post('/update', 'IssueController@update_issue')->name('update_issue');
    Route::post('/delete', 'IssueController@delete_issue')->name('delete_issue');

    Route::post('/reply/add', 'IssueController@reply_issue')->name('reply_issue');
    Route::post('/reply/update', 'IssueController@update_reply')->name('update_reply');
    Route::post('/reply/delete', 'IssueController@delete_reply')->name('delete_reply');
});


Route::Group(['prefix' => 'admin'], function(){
    //Login without middleware
    Route::get('/login', 'AdminController@show_login')->name('show_login');
    Route::post('/login', 'AdminController@login')->name('login');
});


Route::Group(['prefix' => 'admin', 'middleware' => 'admin'], function(){
    //Guest can't access
    //issue manage section
    Route::get('/', 'AdminController@show_admin_panel')->name('show_admin_panel');
    Route::get('/delete', 'AdminController@show_delete_panel')->name('show_delete_panel');
    Route::get('/maintain', 'AdminController@show_maintain_panel')->name('show_maintain_panel');
    Route::get('/issue/id/{id}', 'AdminController@show_issue_maintain')->name('show_issue_maintain');
    Route::get('/issue/reply/{id}', 'AdminController@show_issue_reply')->name('show_issue_reply');
    Route::get('/issue/update/{id}', 'AdminController@show_issue_update')->name('show_issue_update');
    Route::get('/issue/reply_update/{id}', 'AdminController@show_reply_update')->name('show_reply_update');

    //Login section
    Route::get('/register', 'AdminController@show_register')->name('show_register');
    Route::post('/register', 'AdminController@register')->name('register');


    //Member section
    Route::get('/member', 'MemberController@show_member_panel')->name('show_member_panel');
    Route::get('/member/add', 'MemberController@show_member_add')->name('show_member_add');
    Route::get('/member/update/{id}', 'MemberController@show_member_update')->name('show_member_update');

    Route::post('/member/add', 'MemberController@add_member')->name('add_member');
    Route::post('/member/update', 'MemberController@update_member')->name('update_member');
    Route::post('/member/delete', 'MemberController@delete_member')->name('delete_member');

    Route::resource('links', 'LinksController')->except(['show', 'destroy']);
    Route::post('links/delete', 'LinksController@delete_links')->name('links.delete');
});

Route::get('/links', 'LinksController@show_links')->name('links.show_links');