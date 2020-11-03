<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Issue;
use App\IssueAnswer;

class AdminController extends Controller
{

    public function show_login() {
        return view('admin.login');
    }

    public function show_admin_panel() {
        if(Auth::check()) {
            $issues = Issue::all();
            return view('admin.panel')->with('issues', $issues);
        } else
            return redirect()->to('/admin/login');
    }

    public function show_delete_panel() {
        $issues = Issue::orderBy('id', 'DESC')->get();
        return view('admin.delete')->with('issues', $issues);
    }

    public function show_maintain_panel() {
        $issues = Issue::all();
        return view('admin.maintain')->with('issues', $issues);
    }

    public function show_issue_maintain($id) {
        $issue = Issue::find($id);
        if(!$issue)
            return response('Not found', 404);
        return view('admin.issue')->with('issue', $issue);
    }

    public function show_issue_reply($id) {
        $issue = Issue::find($id);
        if($issue)
            return view('admin.reply')->with('issue', $issue);

        return response('Not found', 404);
    }

    public function show_reply_update($id) {
        $reply = IssueAnswer::find($id);
        if($reply)
            return view('admin.reply_update')->with('reply', $reply);
        
        return response('Not found', 404);
    }

    public function show_issue_update($id) {
        $issue = Issue::find($id);
        if($issue)
            return view('admin.update')->with('issue', $issue);

        return response('Not found', 404);
    }

    public function login(Request $request) {
        $username = $request->input('user');
        $password = $request->input('password');

        if(Auth::attempt(['username' => $username, 'password' => $password])) {
            $user = User::where('username', $username)->first();
            Auth::login($user);
            return redirect()->to('/admin');
        }

        return redirect()->to('/admin/login');
    }

    public function show_register() {
        return view('admin.register');
    }

    public function register(Request $request) {
        $name = $request->input('name');
        $username = $request->input('user');
        $password = Hash::make($request->input('password'));

        if(User::where('username',$username)->first())
            return redirect()->to('/admin/register');

        User::create([
            'name'      => $name,
            'username'  => $username,
            'password'  => $password,
        ]);

        return redirect()->to('/admin/login');
    }
}
