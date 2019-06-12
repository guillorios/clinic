@extends('theme.backoffice.layouts.admin')

@section('title', 'Editar citas de '. $user->name)

@section('head')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/pickadate/themes/default.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/pickadate/themes/default.date.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/pickadate/themes/default.time.css') }}">
@endsection

@section('breadcrumbs')
    <li><a href="{{ route('backoffice.user.index') }}">Usuarios</a></li>
    <li><a href="{{ route('backoffice.user.show', $user) }}">{{ $user->name }}</a></li>
    <li><a href="{{ route('backoffice.patient.appointments', $user) }}">{{ 'Citas de '. $user->name }}</a></li>
    <li class="active">Editar Cita</li>
@endsection

@section('dropdown_settings')
    <li><a href="{{ route('backoffice.patient.schedule', $user) }}" class="grey-text text-darken-2">Agendar nueva cita</a></li>
@endsection

@section('content')

<section id="content">
    <!--start container-->
    <div class="container">
        <div class="section">
            <p class="caption">{{ 'Citas de '. $user->name }}</p>
            {{-- <div class="divider"></div> --}}
            <!--Basic Form-->
            <div id="basic-form" class="section">
                <div class="row">
                    <div class="col s12 m8">
                        <div class="card">
                            <div class="card-content">
                                <div class="row">

                                    @include('theme.includes.user.patient.schedule_form', [
                                        'route' => route('backoffice.patient.appointment.update', [$user, $appointment]),
                                    ])

                                </div>
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
