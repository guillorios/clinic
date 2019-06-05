@extends('theme.frontoffice.layouts.main')

@section('title', 'Modificar contraseña')

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
                        <div class="row">
                            <form action="{{ route('frontoffice.user.change_password') }}" method="post" class="col s12">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input type="password" name="old_password" id="old_password">
                                        <label for="old_password">Contraseña actual</label>
                                        @if ($errors->has('old_password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong style="color: red">{{ $errors->first('old_password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input type="password" name="password" id="password">
                                        <label for="password">Nueva Contraseña</label>
                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong style="color: red">{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input type="password" name="password_confirmation" id="password_confirmation">
                                        <label for="password_confirmation">Confirmar Contraseña</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <button class="btn waves-effect waves-light right" type="submit">ACTUALIZAR <i class="material-icons right">send</i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('foot')
@endsection

