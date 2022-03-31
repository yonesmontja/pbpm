<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
class KalenderController extends Controller
{
    //
    public function index(Request $request)
    {
        if($request -> ajax())
        {
            $data = Booking::whereDate('start', '>=', $request->start)->whereDate('end','<=', $request->end)->get(['id','title','start','end']);
            return response()->json($data);
        }
    return view('kalender.full-calender');
    }
    public function action(Request $request)
    {
    	if($request->ajax())
    	{
    		if($request->type == 'add')
    		{
    			$event = Booking::create([
    				'title'		=>	$request->title,
    				'start'		=>	$request->start,
    				'end'		=>	$request->end
    			]);

    			return response()->json($event);
    		}

    		if($request->type == 'update')
    		{
    			$event = Booking::find($request->id)->update([
    				'title'		=>	$request->title,
    				'start'		=>	$request->start,
    				'end'		=>	$request->end
    			]);

    			return response()->json($event);
    		}

    		if($request->type == 'delete')
    		{
    			$event = Booking::find($request->id)->delete();

    			return response()->json($event);
    		}
    	}
    }
    public function kalender()
    {
    	$bookings = Booking::all();
        $events = array();

        foreach($bookings as $booking)
        {
            $color = null;
            if($booking -> title == "Test")
            {
                $color = '#924ACE';
            }
            if($booking->title=='Test 1'){
                $color = '#68801A';
            }
            if($booking->title=='Test 2'){
                $color = '#8ECE4A';
            }
            $events[]=[
            'id'    => $booking -> id,
            'title' => $booking -> title,
            'start' => $booking -> start,
            'end'   => $booking -> end,
            'color' => $color
            ];

        }
        return view('kalender.index',['events' => $events]);
    }
    public function incalendar()
    {
        $bookings = Booking::all();
        $events = array();
        //dd($bookings);
        foreach($bookings as $booking){
            $color = null;
            if($booking->title=="Test"){
                $color = '#924ACE';
            }
            if($booking->title=='Test 1'){
                $color = '#68801A';
            }
            if($booking->title=='Test 2'){
                $color = '#8ECE4A';
            }
            $events[]=[
            'id'    => $booking -> id,
            'title' => $booking -> title,
            'start' => $booking -> start,
            'end'   => $booking -> end,
            'color' => $color
             ];

        }
        //dd($events);
    	return view('kalender.incalendar',['events' => $events]);
    }
    public function instorecalendar(Request $request)
    {
        //return $request->all();
        $request->validate([
            'title' => 'required|string'
        ]);
        $booking = Booking::create([
            'title' => $request->title,
            'start' => $request->start,
            'end' => $request->end,
        ]);
        $color = null;
        if($booking->title == 'Test 3'){
            $color = '#68801A';
        }
        return response()->json([
            'id'    => $booking->id,
            'start' => $booking->start,
            'end'   => $booking->end,
            'title' => $booking->title,
            'color' => $color ? $color: '',
        ]);
    }
    public function inupdatecalendar(Request $request, $id)
    {
        //return $id;
        $booking = Booking::find($id);
        if(! $booking){
            return response() -> json([
                'error' => 'Unable to locate the event'
            ],404);
        }

        $booking -> start = $request -> start;
        $booking -> end = $request -> end;
        return response()->json('Event updated');
    }
    public function indeletecalendar($id)
    {
        //return $id;
        //dd($id);
        $booking = Booking::find($id);
            if(! $booking){
            return response() -> json([
                'error' => 'Unable to locate the event'
            ],404);
        }
        $booking->delete();
        return $id;
    }
}
