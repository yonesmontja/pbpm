<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Journal;

class SiteController extends Controller
{
    //

	public function singlepost($slug)
    {
        $post = Journal::where('slug','=',$slug)->first();
        //dd($post);
        return view('sites.singlepost',compact(['post']));
    }

}
