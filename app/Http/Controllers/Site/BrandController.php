<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\BrandMedia;
use App\Models\BrandPartner;
use App\Models\BrandProduct;
use App\Models\BrandSlider;
use App\Models\BrandStory;
use App\Models\Message;
use Illuminate\Http\Request;
use App\Models\Partner;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::all();

        return view('site.pages.brands.index' ,compact('brands'));
    }

    public function brand($slug)
    {
        $brand = Brand::whereSlug($slug)->firstOrFail();
        $sliders = BrandSlider::where('brand_id' , $brand->id)->orderBy('id' , 'desc')->get();
        $about = BrandStory::where('brand_id' , $brand->id)->firstOrFail();
        $products = BrandProduct::where('brand_id' , $brand->id)->orderBy('id' , 'asc')->take(8)->get();
        $partners = Partner::orderBy('id' , 'desc')->take(8)->get();
        $images = BrandMedia::where('brand_id' , $brand->id)->orderBy('id' , 'desc')->take(8)->get();

        return view('site.pages.brands.single' ,compact('brand' , 'sliders' , 'about' , 'products', 'partners' ,'images'));
    }

    public function story($slug)
    {
        $brand = Brand::whereSlug($slug)->firstOrFail();
        $about = BrandStory::where('brand_id' , $brand->id)->firstOrFail();
        $images = BrandMedia::where('brand_id' , $brand->id)->orderBy('id' , 'desc')->take(8)->get();

        return view('site.pages.brands.story' ,compact('brand' , 'about', 'images'));
    }

    public function products(Request $request , $slug)
    {
        $brand = Brand::whereSlug($slug)->firstOrFail();

        $products = BrandProduct::where('brand_id' , $brand->id)->orderBy('id' , 'asc')->get();

        return view('site.pages.brands.products' ,compact('brand' , 'products'));
    }

    public function partners(Request $request , $slug)
    {
        $brand = Brand::whereSlug($slug)->firstOrFail();

        $partners = Partner::orderBy('id' , 'desc')->get();

        return view('site.pages.brands.partners' ,compact('brand' , 'partners'));
    }

    public function media($slug)
    {
        $brand = Brand::whereSlug($slug)->firstOrFail();
        $images = BrandMedia::where('brand_id' , $brand->id)->orderBy('id' , 'desc')->get();

        return view('site.pages.brands.media' ,compact('brand' , 'images'));
    }

    public function contact($slug)
    {
        $brand = Brand::whereSlug($slug)->firstOrFail();

        return view('site.pages.brands.contact' ,compact('brand'));
    }

    public function store(Request $request , $slug)
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
        $brand = Brand::whereSlug($slug)->firstOrFail();
        $data = $request->all();
        $data['subject'] = $brand->translate('en')->subject;

        try {
            Message::create($data);

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
