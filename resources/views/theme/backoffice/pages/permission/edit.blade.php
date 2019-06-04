@extends('theme.backoffice.layouts.admin')

@section('title', 'Editar permiso : '. $permission->name)

@section('head')
@endsection

@section('breadcrumbs')
    <li><a href="{{ route('backoffice.permission.index') }}">Permisos</a></li>
    <li class="active">Editar permiso {{ $permission->name }}</li>
@endsection

@section('dropdown_settings')
    <li><a href="{{ route('backoffice.permission.create') }}" class="grey-text text-darken-2">Crear permiso</a></li>
@endsection

@section('content')

<section id="content">
    <!--start container-->
    <div class="container">
        <div class="section">
            <p class="caption">Introduce los datos para editar el permiso.</p>
            <div class="divider"></div>
            <!--Basic Form-->
            <div id="basic-form" class="section">
                <div class="row">
                    <div class="col s12 m8 offset-m2">
                        <div class="card">
                            <div class="card-content">
                                <span class="card-title">Editar Permiso</span>
                                <div class="row">
                                    <form class="col s12" method="POST" action="{{ route('backoffice.permission.update', $permission) }}">
                                        @csrf
                                        @method('PUT')
                                        <div class="row">
                                            <div class="input-field col s12">
                                            <input id="name" type="text" name="name" value="{{ $permission->name }}">
                                            <label for="name">Nombre Permiso</label>
                                            @if ($errors->has('name'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong style="color:red">{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <select name="role_id" id="">
                                                    <option value="{{ $permission->role->id }}" selected="">{{ $permission->role->name }}</option>
                                                    @foreach ($roles as $role)
                                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('role_id'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong style="color:red">{{ $errors->first('role_id') }}</strong>
                                                    </span>
                                                @endif
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <textarea id="description" class="materialize-textarea" name="description">{{ $permission->description }}</textarea>
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
