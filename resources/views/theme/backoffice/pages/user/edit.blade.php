@extends('theme.backoffice.layouts.admin')

@section('title', 'Editar' . $user->name)

@section('head')
@endsection

@section('breadcrumbs')
    <li><a href="{{ route('backoffice.user.index') }}">Usuarios</a></li>
    <li class="active">Editar {{$user->name}}</li>
@endsection

@section('dropdown_settings')
    <li><a href="{{ route('backoffice.user.create') }}" class="grey-text text-darken-2">Crear usuario</a></li>
@endsection

@section('content')

<section id="content">
    <!--start container-->
    <div class="container">
        <div class="section">
            <p class="caption">Actualiza los datos para editar el usuario.</p>
            <div class="divider"></div>
            <!--Basic Form-->
            <div id="basic-form" class="section">
                <div class="row">
                    <div class="col s12 m8 offset-m2">
                        <div class="card">
                            <div class="card-content">
                                <span class="card-title">Editar Usuario</span>
                                <div class="row">
                                    <form class="col s12" method="POST" action="{{ route('backoffice.user.update', $user) }}">
                                        @csrf
                                        @method('PUT')
                                        <div class="row">
                                            <div class="input-field col s12">
                                            <input id="name" type="text" name="name" value="{{ $user->name }}">
                                            <label for="name">Nombre Usuario</label>
                                            @if ($errors->has('name'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong style="color:red">{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s12">
                                            <input id="dob" type="date" name="dob" value="{{ $user->dob }}">
                                            @if ($errors->has('dob'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong style="color:red">{{ $errors->first('dob') }}</strong>
                                                </span>
                                            @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s12">
                                            <input id="email" type="email" name="email" value="{{ $user->email }}">
                                            <label for="email">Correo electrónico</label>
                                            @if ($errors->has('email'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong style="color:red">{{ $errors->first('email') }}</strong>
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
