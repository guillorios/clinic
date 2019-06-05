{{-- Esto sera nuestro menu lateral --}}
<div class="col s12 m4">
    <div class="collection">
        <a href="{{ route('frontoffice.user.profile') }}" class="collection-item {!! active_class(route('frontoffice.user.profile')) !!}">Perfil</a>
        @if (auth()->user()->has_role(config('app.patient_role')))
            <a href="{{ route('frontoffice.patient.schedule') }}" class="collection-item {!! active_class(route('frontoffice.patient.schedule')) !!}">Agendar Citas</a>
            <a href="{{ route('frontoffice.patient.appointments') }}" class="collection-item {!! active_class(route('frontoffice.patient.appointments')) !!}">Mis Citas</a>
            <a href="{{ route('frontoffice.patient.prescriptions') }}" class="collection-item {!! active_class(route('frontoffice.patient.prescriptions')) !!}">Recetas</a>
            <a href="{{ route('frontoffice.patient.invoices') }}" class="collection-item {!! active_class(route('frontoffice.patient.invoices')) !!}">Facturación</a>

        @endif

        <a href="{{ route('frontoffice.user.edit', [auth()->user(), 'view=frontoffice']) }}" class="collection-item {!! active_class(route('frontoffice.user.edit', auth()->user())) !!}">Editar perfil</a>
        <a href="{{ route('frontoffice.user.edit_password') }}" class="collection-item {!! active_class(route('frontoffice.user.edit_password')) !!}">Modificar contraseña</a>

    </div>
</div>
