@extends('theme.frontoffice.layouts.main')

@section('title', 'Facturas')

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

                        @include('theme.includes.user.patient.invoice_table')

                    </div>
                </div>
            </div>
        </div>

        @include('theme.includes.user.patient.invoice_modal')


    </div>
@endsection

@section('foot')

    @include('theme.includes.user.patient.invoice_foot')

@endsection
