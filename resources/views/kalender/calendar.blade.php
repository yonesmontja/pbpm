@extends('kalender.master')
@section('content')

    @include('kalender.events')
    @include('kalender.fastEvents')

    <div id='external-events'>
        <h4>Quick Event</h4>

        <div id='external-events-list'>

            @isset($fastEvents)
                @forelse($fastEvents as $fastEvent)
                    <div id="boxFastEvent{{ $fastEvent->id }}"
                        style="padding: 4px; border: 1px solid {{ $fastEvent->color }}; background-color: {{ $fastEvent->color }}"
                        class='fc-event event text-center'
                        data-event='{"id":"{{ $fastEvent->id }}","title":"{{ $fastEvent->title }}","color":"{{ $fastEvent->color }}","start":"{{ $fastEvent->start }}","end":"{{ $fastEvent->end }}"}'>
                        {{ $fastEvent->title }}
                    </div>
                @empty
                    <p>There are no quick events to view</p>
                @endforelse
            @endisset

        </div>

        <p>
            <input type='checkbox' id='drop-remove'/>
            <label for='drop-remove'>remove after drag</label>
            <button class="btn btn-sm btn-success" id="newFastEvent" style="font-size: 1em; width: 100%;">create new event</button>
        </p>
    </div>


    <div
        id='calendar'
        data-route-load-events="{{ route('routeLoadEvents') }}"
        data-route-event-update="{{ route('routeEventUpdate') }}"
        data-route-event-store="{{ route('routeEventStore') }}"
        data-route-event-delete="{{ route('routeEventDelete') }}"

        data-route-fast-event-delete="{{ route('routeFastEventDelete') }}"
        data-route-fast-event-update="{{ route('routeFastEventUpdate') }}"
        data-route-fast-event-store="{{ route('routeFastEventStore') }}">
    </div>

@endsection
