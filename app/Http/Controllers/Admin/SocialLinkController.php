<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SocialLinkRequest;
use App\Models\SocialLink;
use Illuminate\Http\Request;

class SocialLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $links = SocialLink::all()->sortByDesc('id');

        return view('admin.pages.links.index' ,compact('links'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  SocialLinkRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SocialLinkRequest $request)
    {
        try {
            $request->store();

            return add_response();
        } catch (\Throwable $th) {
            return error_response();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $link = SocialLink::findOrFail($id);
    
        return view('admin.pages.links.edit' ,compact('link'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  SocialLinkRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SocialLinkRequest $request, $id)
    {
        try {
            $request->update($id);

            return update_response();
        } catch (\Throwable $th) {
            return error_response();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SocialLink::findOrFail($id)->delete();

        return redirect()->back();
    }
}
