<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('site.pages.contact.index');
    }

    public function store(Request $request)
    {
        $validator = validator($request->all() , [
            'name' => ['required' , 'string' , 'max:255'],
            'email' => ['required' , 'string' , 'email' , 'max:255'],
            'phone' => ['required'],
            'message' => ['required'],
        ] ,[] ,[
            'name' => app()->getLocale() == 'en' ? 'Full name' : 'الإسم بالكامل',
            'email' => app()->getLocale() == 'en' ? 'Email address' : 'البريد الإلكتروني',
            'phone' => app()->getLocale() == 'en' ? 'Phone number' : 'رقم الهاتف',
            'message' => app()->getLocale() == 'en' ? 'Message' : 'الرسالة',
        ]);

        if ($validator->fails()) {
            return failed_validation($validator->errors()->first());
        }

        try {
            Message::create($request->all());

            return response()->json(
                app()->getLocale() == 'en' ? 'Thanks for your message , we will contact you ASAP' : 'شكرا لك علي رسالتك سيتم التواصل معك في أقرب وقت ممكن',
                200
            );
        } catch (\Throwable $th) {
            return response()->json( 
                app()->getLocale() == 'en' ? 'Error , please try again later' : 'خطأ برجاء المحاوله مرة اخري لاحقا'
                , 400);
        }
    }
}
