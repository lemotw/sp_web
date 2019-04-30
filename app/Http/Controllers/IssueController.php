<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Issue;
use App\IssueAnswer;

class IssueController extends Controller
{
    //ISSUE PART
    //PERMISSION ANONYMOUS

    public function show_issues() {
        $issues = Issue::all();
        return view('issues')->with('issues', $issues);
    }

    public function show_issue($id) {
        $issue = Issue::find($id);

        if($issue)
            return view('issue')->with('issue', $issue);

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

        return view('issues')->with('issues', $issues_return);
    }

    public function show_issue_add() {
        return view('editor');
    }

    public function add_issue(Request $request) {
        if($request->input('title') == NULL || $request->input('describe') == NULL)
            return response('Null value.', 400);

        $issue                  = new Issue;
        $issue->title           = $request->input('title');
        $issue->contact         = $request->input('contact');
        $issue->describe        = $request->input('describe');
        $issue->process_state   = 0;
        $issue->save();
        
        return redirect('issue');
    }

    //NEXT PERMISSION ADMIN
    public function delete_issue(Request $request) {
        if($request->input('id') == NULL)
            return response('Null value.', 400);

        $issue = Issue::find($request->input('id'));
        if($issue) {
            $issue->delete();
            return redirect()->to('issue');
        }

        return response('Issue not found.', 404);
    }

    public function show_issue_update() {

    }

    public function update_issue(Request $request) {
        if($request->input('id') == NULL        || $request->input('title') == NULL || 
           $request->input('describe') == NULL  || $request->input('contact') == NULL)
            return response('Null value.', 400);

        $issue = Issue::find($request->input('id'));
        if($issue) {
            $issue->title       = $request->input('title');
            $issue->contact     = $request->input('contact');
            $issue->describe    = $request->input('describe');
            $issue->save();
        }

        return response('Issue not found.', 404);
    }


    //REPLY PART
    public function show_issue_reply() {

    }

    public function reply_issue(Request $request) {
        if($request->input('issue_id') == NULL || $request->input('reply') == NULL)
            return response('Null value.', 400);

        $issue = Issue::find($request->input('issue_id'));
        if($issue) {
            $issue->reply($request->input('reply'));
            return redirect()->to('issue');
        }

        return response('Issue not found.', 404);
    }

    public function show_reply_delete() {

    }

    public function delete_reply(Request $request) {
        if($request->input('id') == NULL)
            return response('Null value.', 400);
        
        $issue_answer = IssueAnswer::find($request->input('id'));
        if($issue_answer) {
            $issue_answer->delete();
            return redirect()->to('issue');
        }

        return response('Issue not found.', 404);
    }

    public function show_reply_update() {

    }

    public function update_reply(Request $request) {
        if($request->input('id') == NULL || $request->input('reply') == NULL)
            return response('Null value.', 400);

        $issue_answer = IssueAnswer::find($request->input('id'));
        if($issue_answer) {
            $issue_answer->update(['reply' => $request->input('reply')]);
            return redirect()->to('issue');
        }

        return response('Issue not found.', 404);
    }
}