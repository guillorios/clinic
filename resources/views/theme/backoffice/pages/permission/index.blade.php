@extends('theme.backoffice.layouts.admin')

@section('title', 'Permisos del sistema')

@section('head')
@endsection

@section('breadcrumbs')
    <li><a href="{{ route('backoffice.permission.index') }}">Permisos</a></li>
    <li class="active">Mostrar permisos</li>
@endsection

@section('dropdown_settings')
    <li><a href="{{ route('backoffice.permission.create') }}" class="grey-text text-darken-2">Crear permiso</a></li>
@endsection

@section('content')

<section id="content">
    <!--start container-->
    <div class="container">
        <div class="section">
            <p class="caption">Permisos del sistema</p>
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
                                                <th>Slug</th>
                                                <th>Descripción</th>
                                                <th>Rol</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($permissions as $permission)
                                                <tr>
                                                    <td><a href="{{ route('backoffice.permission.show', $permission) }}">{{ $permission->name }}</a></td>
                                                    <td>{{ $permission->slug }}</td>
                                                    <td>{{ $permission->description }}</td>
                                                    <td><a href="{{ route('backoffice.role.show', $permission->role) }}">{{ $permission->role->name }}</a></td>
                                                    <td><a href="{{ route('backoffice.permission.edit', $permission) }}">Editar</a></td>
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
