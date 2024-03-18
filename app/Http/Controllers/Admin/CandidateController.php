<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    public function index(Request $request)
    {
        $candidates = Candidate::orderBy('id' , 'desc')->paginate(6);

        if ($request->ajax()) {
            $candidates = Candidate::orderBy( 'id', 'DESC' )->paginate( 6, [ '*' ], 'page', request()->page );

            return view( 'admin.pages.careers.templates.candidates', compact( 'candidates' ) );
        }

        return view('admin.pages.careers.index' ,compact('candidates'));
    }

    public function destroy($id)
    {
        Candidate::findOrFail($id)->delete();

        return redirect()->route('admin.careers.index');
    }
}
