<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CareerContentRequest;
use App\Models\CareerContent;
use Illuminate\Http\Request;

class CareerContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $content = CareerContent::firstOrFail();

        return view('admin.pages.careers.content' ,compact('content'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CareerContentRequest $request
     * @return \Illuminate\Http\Response
     */
    public function update(CareerContentRequest $request)
    {
        try {
            $request->update();

            return update_response();
        } catch (\Throwable $th) {
            // dd($th->getMessage());
            return error_response();
        }
    }
}
