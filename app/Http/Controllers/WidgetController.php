<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WidgetController extends Controller
{
    //
    public function index()
    {
    	return view('widget.index');
    }
}
