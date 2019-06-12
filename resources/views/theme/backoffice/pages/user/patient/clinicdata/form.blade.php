@extends('theme.backoffice.layouts.admin')

@section('title', 'Editar historia clínica')

@section('head')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/pickadate/themes/default.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/pickadate/themes/default.date.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/pickadate/themes/default.time.css') }}">
@endsection

@section('breadcrumbs')
	{{-- <li><a href=""></a></li> --}}
	<li><a href="{{ route('backoffice.user.index') }}">Usuarios del sistema</a></li>
	<li>Historia clínica {{ $user->name }}</li>
@endsection

@section('content')
    <section id="content">
        <div class="container">
            <div class="section">
                <p class="caption">Actualiza los datos de historia clínica del usuario</p>
                <div class="divider"></div>
                <div class="section">
                    <div class="row">
                        <div class="col s12 m8 offset-m2">
                            <div class="card">
                                <div class="card-content">
                                    <span class="card-title">Editar historia clínica</span>
                                    <div class="row">
                                        <form class="col s12" method="post" action="{{ route('backoffice.clinic_data.store', $user) }}">

                                            @csrf

                                            <div class="row">
                                                <div class="input-field col s12">
                                                    <input type="text" name="check_in" id="datepicker" class="datepicker" placeholder="Fecha de alta" value="{{ $user->clinic_data('check_in', $datas) }}">
                                                    <label for="check_in">Fecha de alta</label>
                                                    @if ($errors->has('check_in'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong style="color: red">{{ $errors->first('check_in') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="input-field col s12">
                                                    <input
                                                        id="scholarship"
                                                        type="text"
                                                        name="scholarship"
                                                        value="{{ $user->clinic_data('scholarship', $datas) }}"
                                                    >
                                                    <label for="scholarship">Escolaridad</label>
                                                    @if ($errors->has('scholarship'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong style="color: red">{{ $errors->first('scholarship') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="input-field col s12">
                                                    <button class="btn waves-effect waves-light right" type="submit">Actualizar
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
    </div>
@endsection

@section('foot')

    <script type="text/javascript" src="{{ asset('assets/plugins/pickadate/picker.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/plugins/pickadate/picker.date.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/plugins/pickadate/picker.time.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/plugins/pickadate/legacy.js') }}"></script>

    <script type="text/javascript">

        var input_date = $('.datepicker').pickadate({
            min:true,
            formatSubmit: 'yyyy-m-d'
        });
        var date_picker = input_date.pickadate('picker');

    </script>
@endsection
