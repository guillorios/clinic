@extends('theme.backoffice.layouts.admin')

@section('title', 'Usuarios del sistema')

@section('head')
@endsection

@section('breadcrumbs')
    <li><a href="{{ route('backoffice.user.index') }}">Usuarios</a></li>
    <li class="active">Mostrar usuarios</li>
@endsection

@section('dropdown_settings')
    <li><a href="{{ route('backoffice.user.create') }}" class="grey-text text-darken-2">Crear usuario</a></li>
    <li><a href="{{ route('backoffice.user.import') }}" class="grey-text text-darken-2">Importar usuarios</a></li>
@endsection

@section('content')

<section id="content">
    <!--start container-->
    <div class="container">
        <div class="section">
            <p class="caption">Usuarios del sistema</p>
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
                                                <th>Edad</th>
                                                <th>Correo</th>
                                                <th>Roles</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $user)
                                                <tr>
                                                    <td><a href="{{ route('backoffice.user.show', $user) }}">{{ $user->name }}</a></td>
                                                    <td>{{ $user->age() }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>{{ $user->list_roles() }}</td>
                                                    <td><a href="{{ route('backoffice.user.edit', $user) }}">Editar</a></td>
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
