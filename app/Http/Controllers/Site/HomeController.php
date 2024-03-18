<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Brand;
use App\Models\CareerContent;
use App\Models\Partner;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        $brands = Brand::all();
        $about = About::firstOrFail();
        $partners = Partner::all()->sortByDesc('id')->take(8);
        $career= CareerContent::firstOrFail();

        return view('site.pages.index' ,compact('brands' , 'about' , 'partners' , 'career'));
    }
}
