<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Message;
use Illuminate\Http\Request;

class BrandRequestController extends Controller
{
    public function index(Request $request , $id)
    {
        $brand = Brand::findOrFail($id);

        $messages = Message::where('subject' , $brand->translate('en')->name)->orderBy('id' , 'desc')->paginate(6);

        if ($request->ajax()) {
            $messages = Message::where('subject' , $brand->translate('en')->name)->orderBy( 'id', 'DESC' )->paginate( 6, [ '*' ], 'page', request()->page );

            return view( 'admin.pages.brands.messages.templates.messages', compact( 'messages' ) );
        }

        return view('admin.pages.brands.messages.index' ,compact('messages' , 'brand'));
    }
}
