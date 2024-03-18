<?php

namespace App\Http\Controllers\Admin;

use App\Models\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MessageController extends Controller
{
    public function index(Request $request)
    {
        $messages = Message::where('subject' , null)->orderBy('id' , 'desc')->paginate(6);

        if ($request->ajax()) {
            $messages = Message::where('subject' , null)->orderBy( 'id', 'DESC' )->paginate( 6, [ '*' ], 'page', request()->page );

            return view( 'admin.pages.messages.templates.messages', compact( 'messages' ) );
        }

        return view('admin.pages.messages.index' ,compact('messages'));
    }

    public function show($id)
    {
        $message = Message::findOrFail($id);

        return view('admin.pages.messages.show' ,compact('message'));
    }

    public function destroy($id)
    {
        Message::findOrFail($id)->delete();

        return redirect()->route('admin.messages.index');
    }
}
