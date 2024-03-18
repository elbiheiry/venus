<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandMediaRequest;
use App\Models\BrandMedia;
use Illuminate\Http\Request;

class BrandMediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Brand $id
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $images = BrandMedia::all()->sortByDesc('id')->where('brand_id' , $id);

        return view('admin.pages.brands.media.index' ,compact('images' , 'id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  BrandMediaRequest  $request
     * @param Brand $id
     * @return \Illuminate\Http\Response
     */
    public function store(BrandMediaRequest $request , $id)
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
        $image = BrandMedia::findOrFail($id);

        return view('admin.pages.brands.media.edit' , compact('image'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  BrandMediaRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BrandMediaRequest $request, $id)
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
        BrandMedia::findOrFail($id)->delete();

        return redirect()->back();
    }
}
