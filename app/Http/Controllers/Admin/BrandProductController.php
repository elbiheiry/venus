<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandProductRequest;
use App\Models\BrandProduct;
use Illuminate\Http\Request;

class BrandProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Brand $id
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $images = BrandProduct::all()->sortByDesc('id')->where('brand_id' , $id);

        return view('admin.pages.brands.products.index' ,compact('images' , 'id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  BrandProductRequest  $request
     * @param Brand $id
     * @return \Illuminate\Http\Response
     */
    public function store(BrandProductRequest $request , $id)
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
        $image = BrandProduct::findOrFail($id);

        return view('admin.pages.brands.products.edit' , compact('image'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  BrandProductRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BrandProductRequest $request, $id)
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
        BrandProduct::findOrFail($id)->delete();

        return redirect()->back();
    }
}
