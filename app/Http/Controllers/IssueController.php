<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Mail;
use Session;
use App\Issue;
use App\IssueAnswer;
use App\Issue_list;
use App\Mail\MailIssue;

class IssueController extends Controller
{
    //ISSUE PART
    //PERMISSION ANONYMOUS

    public function show_issues() {
        $issues = Issue::orderBy('id', 'DESC')->get();
        return view('issue.issues')->with('issues', $issues);
    }

    public function show_issue($id) {
        $issue = Issue::find($id);

        if($issue)
            return view('issue.issue')->with('issue', $issue);

        return response('Not found', 404);
    }

    public function search_issue(Request $request) {
        if($request->input('search') == NULL)
            return redirect()->to('/issue');

        $issues_return = [];
        $issues = Issue::all();

        foreach($issues as $issue)
            if(strpos($issue->title, $request->input('search')) !== false)
                array_push($issues_return, $issue);
        //Iterate per issue and check if search string contain.

        return view('issue.issues')->with('issues', $issues_return);
    }

    public function show_issue_add() {
        return view('issue.editor');
    }

    public function add_issue(Request $request) {
        if($request->input('title') == NULL || $request->input('describe') == NULL)
            return response('Null value.', 400);

        // Check Google Recaptcha
        $ch = curl_init();
        $secret_key = env("GOOGLE_RECAPTCHA_SECRET_KEY");
        $captcha = $request->input('g-recaptcha-response');
        curl_setopt_array($ch, [
            CURLOPT_URL => 'https://www.google.com/recaptcha/api/siteverify',
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => [
                'secret' => $secret_key,
                'response' => $captcha,
                'remoteip' => $_SERVER['REMOTE_ADDR']
            ],
            CURLOPT_RETURNTRANSFER => true
        ]);

        $output = curl_exec($ch);
        curl_close($ch);
        $json = json_decode($output);

        if($json->success) {
            // 驗證成功
            $issue                  = new Issue;
            $issue->title           = $request->input('title');
            $issue->contact         = $request->input('contact');
            $issue->describe        = $request->input('describe');
            $issue->process_state   = 0;
            $issue->save();

            // 寄信這樣
            Mail::to('nkustsrm@googlegroups.com', '高科學生議會')->queue(new MailIssue($issue));

            Session::flash('success', '新增成功!');
            if(Auth::check())
                return redirect()->to('admin/');
            return redirect('issue');
        } else {
            Session::flash('false', '新增失敗!');
            return back();
        }
    }

    //NEXT PERMISSION ADMIN
    public function delete_issue(Request $request) {
        if($request->input('ch') == NULL)
            return redirect()->to('admin/delete');
        //If no selected, then return to delete panel
        $id_arr = $request->input('ch');

        foreach($id_arr as $id) {
            //Iterate, find and delete.
            $issue = Issue::find($id);
            if($issue)
                $issue->delete();
        }

        if(Auth::check())
            return redirect()->to('/admin/delete');

        return response('Issue not found.', 404);
    }

    public function update_issue(Request $request) {
        if($request->input('id') == NULL        || $request->input('title') == NULL || 
           $request->input('describe') == NULL  || $request->input('panel_select') == NULL)
            return response('Null value.', 400);

        $issue = Issue::find($request->input('id'));
        if($issue) {
            $issue->title       = $request->input('title');
            $issue->contact     = $request->input('contact');
            $issue->describe    = $request->input('describe');
            $issue->save();

            if($request->input('panel_select') != 0) {
                $issue_list = Issue_list::find($request->input('panel_select'));
                if(!$issue_list)
                    Issue_list::create(['issue_id'=>$issue->id]);
                else {
                    $issue_list->issue_id = $issue->id;
                    $issue_list->save();
                }
            } else {
                $issue_list = Issue_list::where('issue_id', $issue->id)->first();
                $issue_list->issue_id = -1;
                $issue_list->save();
            }
            //If panel select not 0, then update the issue order in home page.

            return redirect()->to('/admin/issue/id/'.strval($request->input('id')));
            //Success return to admin maintain panel.
        }

        return response('Issue not found.', 404);
    }


    //REPLY PART
    public function reply_issue(Request $request) {
        if($request->input('issue_id') == NULL || $request->input('reply') == NULL)
            return response('Null value.', 400);

        $issue = Issue::find($request->input('issue_id'));
        if($issue) {
            $issue->reply($request->input('reply'));
            return redirect()->to('admin/issue/id/'.strval($request->input('issue_id')));
            //Success return to admin maintain panel.
        }

        return response('Issue not found.', 404);
    }

    public function delete_reply(Request $request) {
        $issue_id = $request->input('issue_id');
        $id_arr = $request->input('ch');

        if($issue_id == NULL)
            return response('Null value', 400);
        //If unset issue id return 400 status.

        if(!$id_arr)
            return redirect()->to('/admin/issue/id/'.strval($issue_id));
        //If send null id set, then redirect back issue panel.
        
        foreach($id_arr as $id) {
            $issue_answer = IssueAnswer::find($id);
            if($issue_answer)
                $issue_answer->delete();
        }

        return redirect()->to('/admin/issue/id/'.strval($issue_id));
    }

    public function update_reply(Request $request) {
        $id = $request->input('id');
        $reply = $request->input('reply');
        $issue_id = $request->input('issue_id');

        if($id == NULL || $reply == NULL)
            return response('Null value.', 400);

        $issue_answer = IssueAnswer::find($id);
        if($issue_answer) {
            $issue_answer->update(['reply' => $reply]);

            if($issue_id == NULL)
                return redirect()->to('/admin');
            else
                return redirect()->to('/admin/issue/id/'.strval($issue_id));
            //Unset issue id return to admin panel
        }

        return response('Reply not found.', 404);
    }
}