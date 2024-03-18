<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Media;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $about = About::firstOrFail();
        $images = Media::all()->sortByDesc('id')->take(12);

        return view('site.pages.about.index' ,compact('about' , 'images'));
    }
}
