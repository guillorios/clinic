@extends('theme.frontoffice.layouts.main')

@section('title', 'Agendar una cita')

@section('head')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/pickadate/themes/default.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/pickadate/themes/default.date.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/pickadate/themes/default.time.css') }}">
@endsection

@section('nav')
@endsection

@section('content')
    <div class="container">
        <div class="row">
            @include('theme.frontoffice.pages.user.includes.nav')
            {{-- Sección principal --}}
            <div class="col s12 m8">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title"> @yield('title')</span>
                        <form action="#" method="POST" id="">
                            @csrf
                            <div class="row">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">device_hub</i>
                                    <select name="specialite" id="">
                                        <option value="1">Odontología General</option>
                                        <option value="2">Ortodoncia</option>
                                        <option value="3">Periodoncia</option>
                                        <option value="3">Endodoncia</option>
                                    </select>
                                    <label for="specialite">Selecciona la especialidad</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">face</i>
                                    <select name="doctor" id="">
                                        <option value="1">Raul</option>
                                        <option value="2">Carlos</option>
                                        <option value="3">Ulices</option>
                                    </select>
                                    <label for="doctor">Selecciona al doctor</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12 m6">
                                    <i class="material-icons prefix">today</i>
                                    <input type="text" name="date" id="datepicker" class="datepicker" placeholder="Selecciona una fecha">

                                </div>
                                <div class="input-field col s12 m6">
                                    <i class="material-icons prefix">access_time</i>
                                    <input type="text" name="time" id="timepicker" class="timepicker" placeholder="Selecciona un horario">
                                </div>
                            </div>
                            <div class="row">
                                <button class="btn waves-effect waves-light" type="submit">AGENDAR <i class="material-icons right">send</i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('foot')

    <script type="text/javascript" src="{{ asset('assets/plugins/pickadate/picker.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/plugins/pickadate/picker.date.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/plugins/pickadate/picker.time.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/plugins/pickadate/legacy.js') }}"></script>

    <script type="text/javascript">
        $('select').formSelect();
        var input_date = $('.datepicker').pickadate({
            min:true
        });
        var date_picker = input_date.pickadate('picker');

        date_picker.set('disable', [
            1
        ])

        var input_time = $('.timepicker').pickatime({
            min:4
        });
        var time_picker = input_time.pickatime('picker');

        time_picker.set('disable', [
            4
        ])

    </script>
@endsection
