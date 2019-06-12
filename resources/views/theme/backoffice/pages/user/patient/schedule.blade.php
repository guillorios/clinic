@extends('theme.backoffice.layouts.admin')

@section('title', 'Agendar cita para : '. $user->name)

@section('head')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/pickadate/themes/default.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/pickadate/themes/default.date.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/pickadate/themes/default.time.css') }}">
@endsection

@section('breadcrumbs')
    <li><a href="{{ route('backoffice.user.index') }}">Usuarios</a></li>
    <li><a href="{{ route('backoffice.user.show', $user) }}">{{  $user->name }}</a></li>
    <li><a href="">Agendar cita</a></li>
@endsection

@section('dropdown_settings')
    <li><a href="{{ route('backoffice.user.edit', $user) }}" class="grey-text text-darken-2">Editar este usuario</a></li>
@endsection

@section('content')

<section id="content">
    <!--start container-->
    <div class="container">
        <div class="section">
            <p class="caption"><strong>Usuario : </strong> {{ $user->name }}</p>
            <div class="divider"></div>
            <!--Basic Form-->
            <div id="basic-form" class="section">
                <div class="row">
                    <div class="col s12 m8">
                        <div class="card">
                            <div class="card-content">
                                <span class="card-title"> @yield('title')</span>

                                @include('theme.includes.user.patient.schedule_form', [
                                    'route' => route('backoffice.patient.store_back_schedule', $user)
                                ])

                            </div>
                        </div>
                    </div>
                    <div class="col s12 m4">
                        @include('theme.backoffice.pages.user.includes.user_nav')
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection

@section('foot')

    @include('theme.includes.user.patient.schedule_foot',[
        'material_select' => 'material_select'
    ])

@endsection


