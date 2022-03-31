<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function loadEvents(Request $request)
    {

        $returnedColumns = ['id', 'title', 'start', 'end', 'color', 'description'];

        $start = (!empty($request->start)) ? ($request->start) : ('');
        $end = (!empty($request->end)) ? ($request->end) : ('');

        /** We will only return events BETWEEN the start and end dates visible on the calendar */
        $events = Event::whereBetween('start', [$start, $end])->get($returnedColumns);

        return response()->json($events);

    }

    public function store(EventRequest $request)
    {
        Event::create($request->all());

        return response()->json(true);
    }

    public function update(EventRequest $request)
    {
        $event = Event::where('id', $request->id)->first();

        $event->fill($request->all());

        $event->save();

        return response()->json(true);
    }

    public function destroy(Request $request)
    {
        Event::where('id', $request->id)->delete();

        return response()->json(true);
    }
}
