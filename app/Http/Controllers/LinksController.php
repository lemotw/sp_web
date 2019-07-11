<?php

namespace App\Http\Controllers;

use App\Links;
use Illuminate\Http\Request;

class LinksController extends Controller
{

    public function show_links()
    {
        $links = Links::get_all_links();
        return view('links.index')->with('links', $links);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('links.panel')->with('links', Links::get_all_links());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('links.add');
    }
    
    /** 
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Links contain 'link_name', 'link'(as url), 'sort'(for sort link)
        $link_name  = $request->input('link_name');
        $link       = $request->input('link');
        $sort       = $request->input('sort');

        //Check if Null.
        if($link_name == NULL || $link == NULL || $sort == NULL)
            return response('Null value.', 400);

        Links::create([
            'link_name' => $link_name,
            'link'      => $link,
            'sort'      => $sort
        ]);
        
        return redirect()->to('/admin/links');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Check if Object contain.
        $link_entity    = Links::find($id);
        if(!$link_entity)
            return response('Object Not Found.', 404);

        return view('links.edit')->with('link', $link_entity);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Check if Object contain.
        $link_entity    = Links::find($id);
        if(!$link_entity)
            return response('Object Not Found.', 404);

        //Links contain 'link_name', 'link'(as url), 'sort'(for sort link)
        $link_name  = $request->input('link_name');
        $link       = $request->input('link');
        $sort       = $request->input('sort');

        //Check if Null.
        if($link_name == NULL || $link == NULL || $sort == NULL)
            return response('Null value.', 400);

        //Save Entity
        $link_entity->link_name = $link_name;
        $link_entity->link      = $link;
        $link_entity->sort      = $sort;
        $link_entity->save();

        return redirect()->to('/admin/links');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete_links(Request $request)
    {
        //Check if id contain.
        $id_arr = $request->input('ch');
        if(!$id_arr)
            return redirect()->to('/admin/links');

        foreach($id_arr as $id) {
            //Iterator find and delete.
            $link = Links::find($id);
            if($link)
                $link->delete();
        }

        return redirect()->to('/admin/links');
    }
}
