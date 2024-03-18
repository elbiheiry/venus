<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\CareerContent;
use Illuminate\Http\Request;

class CareerController extends Controller
{
    public function index()
    {
        $content = CareerContent::firstOrFail();
        return view('site.pages.career.index' ,compact('content'));
    }

    public function store(Request $request)
    {
        $validator = validator($request->all() , [
            'name' => ['required' , 'string' , 'max:255'],
            'email' => ['required' , 'string' , 'email' , 'max:255'],
            'phone' => ['required'],
            'department' => ['not_in:0'],
            'cv' => ['required' , 'file','mimes:pdf,docx','max:2048']
        ] ,[] ,[
            'name' => app()->getLocale() == 'en' ? 'Full name' : 'الإسم بالكامل',
            'email' => app()->getLocale() == 'en' ? 'Email address' : 'البريد الإلكتروني',
            'phone' => app()->getLocale() == 'en' ? 'Phone number' : 'رقم الهاتف',
            'department' => app()->getLocale() == 'en' ? 'Department' : 'القسم',
            'cv' => app()->getLocale() == 'en' ? 'CV' : 'السيرة الذاتية'
        ]);

        if ($validator->fails()) {
            return failed_validation($validator->errors()->first());
        }

        try {
            $request->cv->store('candidates' , 'public');
            Candidate::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'department' => $request->department,
                'cv' => $request->cv->hashName()
            ]);

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
