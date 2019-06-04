@extends('theme.backoffice.layouts.admin')

@section('title', 'Ver usuario : '. $user->name)

@section('head')
@endsection

@section('breadcrumbs')
    <li><a href="{{ route('backoffice.user.index') }}">Usuarios</a></li>
    <li class="active">{{ $user->name }}</li>
@endsection

@section('dropdown_settings')
    <li><a href="{{ route('backoffice.user.edit', $user) }}" class="grey-text text-darken-2">Editar este usuario</a></li>
@endsection

@section('content')

<section id="content">
    <!--start container-->
    <div class="container">
        <div class="section">
            <p class="caption"><strong>Usuario : </strong> {{ $user->name }}</p>
            <div class="divider"></div>
            <!--Basic Form-->
            <div id="basic-form" class="section">
                <div class="row">
                    <div class="col s12 m8">
                        <div class="card">
                           <div class="card-content">
                                <span class="card-title">{{ $user->name }}</span>
                                <p><strong>Edad : </strong>{{ $user->age() }}</p>
                                {{-- <h4>Roles:</h4>
                                <ul>
                                    @foreach ($user->roles as $role)
                                        <li>{{ $role->name }}</li>
                                    @endforeach
                                </ul> --}}
                            </div>
                            <div class="card-action">
                                <a href="{{ route('backoffice.user.edit', $user) }}">Editar</a>
                                <a href="#" style="color: red" onclick="enviar_formulario()">Eliminar</a>
                            </div>
                        </div>
                    </div>
                    <div class="col s12 m4">
                        @include('theme.backoffice.pages.user.includes.user_nav')
                    </div>
                </div>
            </div>
        </div>
    </div>
    <form method="POST" action="{{ route('backoffice.user.destroy', $user) }}" name="delete_form">
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
                title: "¿Deseas eliminar este usuario?",
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
