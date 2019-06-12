@extends('theme.backoffice.layouts.admin')

@section('title', 'Especilidades')

@section('head')
@endsection

@section('breadcrumbs')
    <li><a href="{{ route('backoffice.speciality.index') }}">Especialidades</a></li>
    <li class="active">Mostrar especialidades</li>
@endsection

@section('dropdown_settings')
    <li><a href="{{ route('backoffice.speciality.create') }}" class="grey-text text-darken-2">Crear especialidad</a></li>
@endsection

@section('content')

<section id="content">
    <!--start container-->
    <div class="container">
        <div class="section">
            <p class="caption">Especialidades</p>
            {{-- <div class="divider"></div> --}}
            <!--Basic Form-->
            <div id="basic-form" class="section">
                <div class="row">
                    <div class="col s12">
                        <div class="card">
                            <div class="card-content">
                                <div class="row">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Cuenta</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($specialities as $speciality)
                                                <tr>
                                                    <td><a href="{{ route('backoffice.speciality.show', $speciality) }}">{{ $speciality->name }}</a></td>
                                                    <td>{{ $speciality->users->count() }}</td>
                                                    <td><a href="{{ route('backoffice.speciality.edit', $speciality) }}">Editar</a></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
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
