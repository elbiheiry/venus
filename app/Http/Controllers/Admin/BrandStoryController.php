<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandStoryRequest;
use App\Models\Brand;
use App\Models\BrandStory;
use Illuminate\Http\Request;

class BrandStoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Brand $id
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        // dd($id);
        $story = BrandStory::where('brand_id' , $id)->first();
        $brand = Brand::findOrFail($id);

        return view('admin.pages.brands.story' ,compact('story' , 'id' , 'brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  BrandStoryRequest $request
     * @param Brand $id
     * @return \Illuminate\Http\Response
     */
    public function update(BrandStoryRequest $request , $id)
    {
        try {
            $request->update($id);

            return update_response();
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return error_response();
        }
    }
}
