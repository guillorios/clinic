@extends('theme.backoffice.layouts.admin')

@section('title', 'Editar rol')

@section('head')
@endsection

@section('breadcrumbs')
    <li><a href="{{ route('backoffice.role.index') }}">Roles</a></li>
    <li><a href="{{ route('backoffice.role.show', $role) }}">{{ $role->name }}</a></li>
    <li class="active">Editar rol</li>
@endsection

@section('dropdown_settings')
    <li><a href="{{ route('backoffice.role.create') }}" class="grey-text text-darken-2">Crear rol</a></li>
@endsection

@section('content')

<section id="content">
    <!--start container-->
    <div class="container">
        <div class="section">
            <p class="caption">Introduce los datos para editar este rol.</p>
            <div class="divider"></div>
            <!--Basic Form-->
            <div id="basic-form" class="section">
                <div class="row">
                    <div class="col s12 m8 offset-m2">
                        <div class="card">
                            <div class="card-content">
                                <span class="card-title">Editar Rol</span>
                                <div class="row">
                                    <form class="col s12" method="POST" action="{{ route('backoffice.role.update', $role) }}">
                                        @csrf
                                        @method('PUT')
                                        <div class="row">
                                            <div class="input-field col s12">
                                            <input id="name" type="text" name="name" value="{{ $role->name }}">
                                            <label for="name">Nombre Rol</label>
                                            @if ($errors->has('name'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong style="color:red">{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <textarea id="description" class="materialize-textarea" name="description">{{ $role->description }}</textarea>
                                                <label for="message">Descripción</label>
                                                @if ($errors->has('description'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong style="color:red">{{ $errors->first('description') }}</strong>
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
