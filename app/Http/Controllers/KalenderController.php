<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
class KalenderController extends Controller
{
    //
    public function kalender()
    {
    	return view('kalender.index');
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
            'start' => $booking -> start_date,
            'end'   => $booking -> end_date,
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
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);
        $color = null;
        if($booking->title == 'Test 3'){
            $color = '#68801A';
        }
        return response()->json([
            'id'    => $booking->id,
            'start' => $booking->start_date,
            'end'   => $booking->end_date,
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
        $booking -> update([
            'start_date' => $request->start_date,
            'end_date'   => $request->end_date,
        ]);
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
