@extends('theme.frontoffice.layouts.main')

@section('title', 'Agendar una cita')

@section('head')
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
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum eveniet, nesciunt autem reiciendis laboriosam, numquam qui veniam sit doloribus natus modi quasi. Temporibus ut optio quo, delectus fugit cumque voluptatem?</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('foot')
@endsection
