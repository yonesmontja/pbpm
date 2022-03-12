<?php

namespace App\Http\Controllers;

use App\Models\FastEvent;
use Illuminate\Http\Request;

class FullCalendarController extends Controller
{
    public function index(Request $request)
    {
        $fastEvents = FastEvent::all();

        return view('kalender.calendar', ['fastEvents' => $fastEvents]);
    }

}
