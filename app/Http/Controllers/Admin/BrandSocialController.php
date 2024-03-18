<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\BrandSocialRequest;
use App\Models\BrandSocial;

class BrandSocialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Brand $id
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $links = BrandSocial::all()->sortByDesc('id')->where('brand_id' , $id);

        return view('admin.pages.brands.links.index' ,compact('links' , 'id'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  BrandSocialRequest  $request
     * @param Brand $id
     * @return \Illuminate\Http\Response
     */
    public function store(BrandSocialRequest $request , $id)
    {
        try {
            $request->store($id);

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
        $link = BrandSocial::findOrFail($id);
    
        return view('admin.pages.brands.links.edit' ,compact('link'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  BrandSocialRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BrandSocialRequest $request, $id)
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
        BrandSocial::findOrFail($id)->delete();

        return redirect()->back();
    }
}
