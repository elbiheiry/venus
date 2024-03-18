<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    public function index(Request $request)
    {
        $partners = Partner::orderBy('id' , 'desc')->paginate(8);

        if ($request->ajax()) {
            $partners = Partner::orderBy( 'id', 'DESC' )->paginate( 8, [ '*' ], 'page', request()->page );

            return view( 'site.pages.partners.templates.partners', compact( 'partners' ) );
        }

        return view('site.pages.partners.index' ,compact('partners'));
    }
}
