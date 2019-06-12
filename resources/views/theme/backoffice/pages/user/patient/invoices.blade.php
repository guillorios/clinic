@extends('theme.backoffice.layouts.admin')

@section('title', 'Facturas de '. $user->name)

@section('head')
@endsection

@section('breadcrumbs')
    <li><a href="{{ route('backoffice.user.index') }}">Usuarios</a></li>
    <li><a href="{{ route('backoffice.user.show', $user) }}">{{ $user->name }}</a></li>
    <li><a href="{{ route('backoffice.patient.invoices', $user) }}">{{ 'Facturas de '. $user->name }}</a></li>
    <li class="active">Mostrar usuarios</li>
@endsection

@section('dropdown_settings')
    <li><a href="{{ route('backoffice.patient.schedule', $user) }}" class="grey-text text-darken-2">Agendar nueva cita</a></li>
    <li><a href="" class="grey-text text-darken-2">Crer nueva factura</a></li>
@endsection

@section('content')

    <section id="content">
        <!--start container-->
        <div class="container">
            <div class="section">
                <p class="caption">{{ 'Facturas de '. $user->name }}</p>
                {{-- <div class="divider"></div> --}}
                <!--Basic Form-->
                <div id="basic-form" class="section">
                    <div class="row">
                        <div class="col s12 m8">
                            <div class="card">
                                <div class="card-content">
                                    <div class="row">
                                        @include('theme.includes.user.patient.invoice_table')
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

        @include('theme.includes.user.patient.invoice_modal')

    </section>

@endsection

@section('foot')

    @include('theme.includes.user.patient.invoice_foot')

@endsection
