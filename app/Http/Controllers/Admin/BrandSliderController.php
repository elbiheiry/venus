<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandSliderRequest;
use App\Models\BrandSlider;
use Illuminate\Http\Request;

class BrandSliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Brand $id
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $images = BrandSlider::all()->sortByDesc('id')->where('brand_id' , $id);

        return view('admin.pages.brands.slider.index' ,compact('images' , 'id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  BrandSliderRequest  $request
     * @param Brand $id
     * @return \Illuminate\Http\Response
     */
    public function store(BrandSliderRequest $request , $id)
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
        $image = BrandSlider::findOrFail($id);

        return view('admin.pages.brands.slider.edit' , compact('image'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  BrandSliderRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BrandSliderRequest $request, $id)
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
        BrandSlider::findOrFail($id)->delete();

        return redirect()->back();
    }
}
