@extends('theme.backoffice.layouts.admin')

@section('title', 'Ver especialidad : '. $speciality->name)

@section('head')
@endsection

@section('breadcrumbs')
    <li><a href="{{ route('backoffice.speciality.index') }}">Especialidades</a></li>
    <li class="active">{{ $speciality->name }}</li>
@endsection

@section('dropdown_settings')
    <li><a href="{{ route('backoffice.speciality.create') }}" class="grey-text text-darken-2">Crear especialidad</a></li>
    <li><a href="{{ route('backoffice.speciality.edit', $speciality) }}" class="grey-text text-darken-2">Editar especialidad</a></li>
@endsection

@section('content')

<section id="content">
    <!--start container-->
    <div class="container">
        <div class="section">
            <p class="caption"><strong>Especialidad : </strong> {{ $speciality->name }}</p>
            <div class="divider"></div>
            <!--Basic Form-->
            <div id="basic-form" class="section">
                <div class="row">
                    <div class="col s12 m8 offset-m2">
                        <div class="card">
                           <div class="card-content">
                                <span class="card-title">{{ $speciality->name }}</span>
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Nombre</th>
                                            <th>Correo</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($users as $user)
                                            <tr>
                                                <td>{{ $user->id }}</td>
                                                <td><a href="{{ route('backoffice.user.show', $user) }}">{{ $user->name }}</a></td>
                                                <td>{{ $user->email }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="3">No hay doctores registrados</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-action">
                                <a href="{{ route('backoffice.speciality.edit', $speciality) }}">Editar</a>
                                <a href="#" style="color: red" onclick="enviar_formulario()">Eliminar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <form method="POST" action="{{ route('backoffice.speciality.destroy', $speciality) }}" name="delete_form">
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
                title: "¿Deseas eliminar esta especialidad?",
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
