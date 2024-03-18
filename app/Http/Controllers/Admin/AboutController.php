<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AboutRequest;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about = About::firstOrFail();

        return view('admin.pages.about.index' ,compact('about'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  AboutRequest $request
     * @return \Illuminate\Http\Response
     */
    public function update(AboutRequest $request)
    {
        try {
            $request->update();

            return update_response();
        } catch (\Throwable $th) {
            return error_response();
        }
    }
}
