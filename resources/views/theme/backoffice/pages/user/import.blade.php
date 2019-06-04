@extends('theme.backoffice.layouts.admin')

@section('title', 'Importar Usuarios')

@section('head')
@endsection

@section('breadcrumbs')
    <li><a href="{{ route('backoffice.user.index') }}">Usuarios</a></li>
    <li class="active">Importar usuario</li>
@endsection

@section('dropdown_settings')
    <li><a href="{{ route('backoffice.user.create') }}" class="grey-text text-darken-2">Crear usuario</a></li>
@endsection

@section('content')

<section id="content">
    <!--start container-->
    <div class="container">
        <div class="section">
            <p class="caption">Seleccionar un archivo de excel.</p>
            <div class="divider"></div>
            <!--Basic Form-->
            <div id="basic-form" class="section">
                <div class="row">
                    <div class="col s12 m8 offset-m2">
                        <div class="card">
                            <div class="card-content">
                                <span class="card-title">Importar Usuarios</span>
                                <div class="row">
                                    <form class="col s12" method="POST" action="{{ route('backoffice.user.make_import') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="input-field col s12">
                                            <input id="excel" type="file" name="excel" required="" >
                                            @if ($errors->has('excel'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong style="color:red">{{ $errors->first('excel') }}</strong>
                                                </span>
                                            @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <button class="btn waves-effect waves-light right" type="submit">IMPORTAR
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
