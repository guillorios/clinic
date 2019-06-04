@extends('theme.backoffice.layouts.admin')

@section('title', 'Ver permiso : '. $permission->name)

@section('head')
@endsection

@section('breadcrumbs')
    {{-- <li><a href="{{ route('backoffice.permission.index') }}">Permisos</a></li> --}}
    <li><a href="{{ route('backoffice.role.index') }}">Roles del sistema</a></li>
    <li><a href="{{ route('backoffice.role.show', $permission->role) }}"> Rol :  {{ $permission->role->name }}</a></li>
    <li class="active">{{ $permission->name }}</li>
@endsection

@section('dropdown_settings')
    <li><a href="{{ route('backoffice.permission.create') }}" class="grey-text text-darken-2">Crear permiso</a></li>
@endsection

@section('content')

<section id="content">
    <!--start container-->
    <div class="container">
        <div class="section">
            <p class="caption"><strong>Permiso : </strong> {{ $permission->name }}</p>
            <div class="divider"></div>
            <!--Basic Form-->
            <div id="basic-form" class="section">
                <div class="row">
                    <div class="col s12 m8 offset-m2">
                        <div class="card">
                           <div class="card-content">
                                <span class="card-title">Usuarios con el permiso de {{ $permission->name }}</span>
                                <p><strong>Slug : </strong>{{ $permission->slug }}</p>
                                <p><strong>Descripción : </strong>{{ $permission->description }}</p>
                            </div>
                            <div class="card-action">
                                <a href="{{ route('backoffice.permission.edit', $permission) }}">Editar</a>
                                <a href="#" style="color: red" onclick="enviar_formulario()">Eliminar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <form method="POST" action="{{ route('backoffice.permission.destroy', $permission) }}" name="delete_form">
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
                title: "¿Deseas eliminar este permiso?",
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
