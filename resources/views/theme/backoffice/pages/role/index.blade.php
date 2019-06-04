@extends('theme.backoffice.layouts.admin')

@section('title', 'Roles del sistema')

@section('head')
@endsection

@section('breadcrumbs')
    <li><a href="{{ route('backoffice.role.index') }}">Roles</a></li>
    <li class="active">Mostrar roles</li>
@endsection

@section('dropdown_settings')
    <li><a href="{{ route('backoffice.role.create') }}" class="grey-text text-darken-2">Crear rol</a></li>
@endsection

@section('content')

<section id="content">
    <!--start container-->
    <div class="container">
        <div class="section">
            <p class="caption">Roles del sistema</p>
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
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($roles as $role)
                                                <tr>
                                                    <td><a href="{{ route('backoffice.role.show', $role) }}">{{ $role->name }}</a></td>
                                                    <td>{{ $role->slug }}</td>
                                                    <td>{{ $role->description }}</td>
                                                    <td><a href="{{ route('backoffice.role.edit', $role) }}">Editar</a></td>
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
