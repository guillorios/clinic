@extends('theme.backoffice.layouts.admin')

@section('title', 'Asignar especialidades')

@section('head')
@endsection

@section('breadcrumbs')
    <li><a href="{{ route('backoffice.user.index') }}">Usuarios</a></li>
    <li><a href="{{ route('backoffice.user.show', $user) }}">{{ $user->name }}</a></li>
    <li class="active">Asignar especialidades</li>
@endsection

@section('dropdown_settings')
    <li><a href="{{ route('backoffice.role.create') }}" class="grey-text text-darken-2">Crear specialities</a></li>
@endsection

@section('content')

<section id="content">
    <!--start container-->
    <div class="container">
        <div class="section">
            <p class="caption">Selecciona las especialidades que deseas asignar.</p>
            <div class="divider"></div>
            <!--Basic Form-->
            <div id="basic-form" class="section">
                <div class="row">
                    <div class="col s12 m8">
                        <div class="card">
                            <div class="card-content">
                                <span class="card-title">Asignar especialidades</span>
                                <div class="row">
                                    <form class="col s12" method="POST" action="{{ route('backoffice.user.speciality_assignment', $user) }}">
                                        @csrf
                                        @foreach ($specialities as $speciality)
                                            <p>
                                                <input type="checkbox" id="{{ $speciality->id }}" name="specialities[]" value="{{ $speciality->id }}" @if ($user->has_speciality($speciality->id)) checked @endif />
                                                <label for="{{ $speciality->id }}">
                                                    <span>{{ $speciality->name }}</span>
                                                </label>
                                            </p>
                                        @endforeach

                                        <div class="row">
                                            <div class="input-field col s12">
                                                <button class="btn waves-effect waves-light right" type="submit">GUARDAR
                                                    <i class="material-icons right">send</i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
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

@endsection
