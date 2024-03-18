<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandPartnerRequest;
use App\Models\BrandPartner;
use Illuminate\Http\Request;

class BrandPartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Brand $id
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $images = BrandPartner::all()->sortByDesc('id')->where('brand_id' , $id);

        return view('admin.pages.brands.partners.index' ,compact('images' , 'id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  BrandPartnerRequest  $request
     * @param Brand $id
     * @return \Illuminate\Http\Response
     */
    public function store(BrandPartnerRequest $request , $id)
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
        $image = BrandPartner::findOrFail($id);

        return view('admin.pages.brands.partners.edit' , compact('image'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  BrandPartnerRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BrandPartnerRequest $request, $id)
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
        BrandPartner::findOrFail($id)->delete();

        return redirect()->back();
    }
}
