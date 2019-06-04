@extends('theme.backoffice.layouts.admin')

@section('title', 'Ver rol : '. $role->name)

@section('head')
@endsection

@section('breadcrumbs')
    <li><a href="{{ route('backoffice.role.index') }}">Roles</a></li>
    <li class="active">{{ $role->name }}</li>
@endsection

@section('dropdown_settings')
    <li><a href="{{ route('backoffice.role.create') }}" class="grey-text text-darken-2">Crear rol</a></li>
@endsection

@section('content')

<section id="content">
    <!--start container-->
    <div class="container">
        <div class="section">
            <p class="caption"><strong>Rol : </strong> {{ $role->name }}</p>
            <div class="divider"></div>
            <!--Basic Form-->
            <div id="basic-form" class="section">
                <div class="row">
                    <div class="col s12 m8 offset-m2">
                        <div class="card">
                           <div class="card-content">
                                <span class="card-title">Usuarios con el rol de {{ $role->name }}</span>
                                <p><strong>Slug : </strong>{{ $role->slug }}</p>
                                <p><strong>Descripción : </strong>{{ $role->description }}</p>
                            </div>
                            <div class="card-action">
                                <a href="{{ route('backoffice.role.edit', $role) }}">Editar</a>
                                <a href="#" style="color: red" onclick="enviar_formulario()">Eliminar</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m8 offset-m2">
                        <div class="card">
                           <div class="card-content">
                                <span class="card-title">Permisos del rol</span>
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
                                        @foreach ($permissions as $permission)
                                            <tr>
                                                <td><a href="{{ route('backoffice.permission.show', $permission) }}">{{ $permission->name }}</a></td>
                                                <td>{{ $permission->slug }}</td>
                                                <td>{{ $permission->description }}</td>
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
    <form method="POST" action="{{ route('backoffice.role.destroy', $role) }}" name="delete_form">
        @csrf
        @method('DELETE')
    </form>
</section>


@endsection

@section('foot')

    <script>
        function enviar_formulario()
        {
            Swal.fire({
                title: "¿Deseas eliminar este rol?",
                text: "Esta acción no se puede deshacer",
                type: "warning",
                showCancelButton:true,
                confirmButtonText: "Si, continuar",
                cancelButtonText: "No, cancelar",
                closeOnCancel: false,
                closeOnConfirm: true
            }).then((result) => {
                if (result.value) {
                    document.delete_form.submit();
                }else {
                    Swal.fire(
                        'Operación Cancelada',
                        'Registro no eliminado',
                        'error'
                    )
                }
            });
        }
    </script>

@endsection
