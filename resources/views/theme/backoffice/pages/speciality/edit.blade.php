@extends('theme.backoffice.layouts.admin')

@section('title', 'Editar especialidad')

@section('head')
@endsection

@section('breadcrumbs')
    <li><a href="{{ route('backoffice.speciality.index') }}">Especialidades</a></li>
    <li><a href="">{{ $speciality->name }}</a></li>
    <li class="active">Editar especialidad</li>
@endsection

@section('dropdown_settings')
    <li><a href="{{ route('backoffice.speciality.create') }}" class="grey-text text-darken-2">Crear especialidad</a></li>
@endsection

@section('content')
    <section id="content">
        <!--start container-->
        <div class="container">
            <div class="section">
                <p class="caption">Introduce los datos para editar especialidad <strong>{{ $speciality->name }}</strong>.</p>
                <div class="divider"></div>
                <!--Basic Form-->
                <div id="basic-form" class="section">
                    <div class="row">
                        <div class="col s12 m8 offset-m2">
                            <div class="card">
                                <div class="card-content">
                                    <span class="card-title">Editar especialidad</span>
                                    <div class="row">
                                        <form class="col s12" method="POST" action="{{ route('backoffice.speciality.update', $speciality) }}">
                                            @csrf
                                            @method('PUT')
                                            <div class="row">
                                                <div class="input-field col s12">
                                                <input id="name" type="text" name="name" value="{{ $speciality->name }}" >
                                                <label for="name">Nombre Especialidad</label>
                                                @if ($errors->has('name'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong style="color:red">{{ $errors->first('name') }}</strong>
                                                    </span>
                                                @endif
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="input-field col s12">
                                                    <button class="btn waves-effect waves-light right" type="submit">ACTUALIZAR
                                                        <i class="material-icons right">send</i>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('foot')
@endsection
