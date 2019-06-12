@extends('theme.backoffice.layouts.admin')

@section('title', 'Citas programadas')

@section('head')
    <link href="{{ asset('assets/plugins/fullcalendar/packages/core/main.css') }}" type="text/css" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/fullcalendar/packages/daygrid/main.css') }}" type="text/css" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/fullcalendar/packages/timegrid/main.css') }}" type="text/css" rel="stylesheet" />
@endsection

@section('breadcrumbs')
    <li><a href="#">Citas Programadas</a></li>
@endsection

@section('dropdown_settings')
@endsection

@section('content')
    <section id="content">
        <div class="container">
            <div class="section">
                <!--Basic Form-->
                <div class="row">
                    <div class="col s12">
                        <div class="card">
                            <div class="card-content">
                                <div id="calendar">
                                    {{-- Calendario javascript --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('foot')

<script src="{{ asset('assets/plugins/fullcalendar/packages/core/main.js') }}"></script>
<script src="{{ asset('assets/plugins/fullcalendar/packages/interaction/main.js') }}"></script>
<script src="{{ asset('assets/plugins/fullcalendar/packages/daygrid/main.js') }}"></script>
<script src="{{ asset('assets/plugins/fullcalendar/packages/timegrid/main.js') }}"></script>

<script>

        document.addEventListener('DOMContentLoaded', function() {
          var calendarEl = document.getElementById('calendar');
          var calendar = new FullCalendar.Calendar(calendarEl, {
            plugins: [ 'interaction', 'dayGrid', 'timeGrid' ],
            /* defaultDate: '2019-06-12', */
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth, timeGridWeek, timeGridDay'

            },
            editable: false,
            eventLimit: true, // allow "more" link when too many events
            events: {!! $appointments !!}
          });

          calendar.render();
        });

      </script>

@endsection
