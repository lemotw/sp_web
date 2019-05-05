<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;

class MemberController extends Controller
{

    public function show_member() {
        $members = Member::all();
        return view('member.member')->with('members', $members);
    }

    public function show_member_panel() {
        $members = Member::all();
        return view('member.panel')->with('members', $members);
    }

    public function show_member_add() {
        return view('member.add');
    }

    public function add_member(Request $request) {

        $name = $request->input('name');
        $title = $request->input('title');
        $img_link = $request->input('img_link');

        if($name == NULL || $title == NULL || $img_link == NULL)
            return response('Null value.', 400);

        Member::create([
            'name'      => $name,
            'title'     => $title,
            'img_link'  => $img_link
        ]);

        return redirect()->to('/admin/member');
    }

    public function show_member_update($id) {
        $member = Member::find($id);
        return view('member.update')->with('member', $member);
    }

    public function update_member(Request $request) {

        $id = $request->input('id');
        $name = $request->input('name');
        $title = $request->input('title');
        $img_link = $request->input('img_link');

        if($name == NULL || $title == NULL || $img_link == NULL || $id == NULL)
            return response('Null value.', 400);
        
        $member = Member::find($id);
        if(!$member)
            return response('Not found.', 404);
        
        $member->name = $name;
        $member->title = $title;
        $member->img_link = $img_link;
        $member->save();

        return redirect()->to('/admin/member');
    }

    public function delete_member(Request $request) {
        
        $id_arr = $request->input('ch');
        if(!$id_arr)
            return redirect()->to('/admin/member');

        foreach($id_arr as $id) {
            //Iterator find and delete.
            $member = Member::find($id);
            if($member)
                $member->delete();
        }

        return redirect()->to('/admin/member');
    }
}
