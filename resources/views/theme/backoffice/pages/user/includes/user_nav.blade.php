<div class="collection">
    <a href="{{ route('backoffice.user.show', $user) }}" class="collection-item active">{{ $user->name }}</a>
    @if (auth::user()->has_role(config('app.admin_role')) || auth::user()->has_role(config('app.secretary_role')))
        @if ($user->has_role(config('app.patient_role')))
            <a href="{{ route('backoffice.patient.schedule', $user) }}" class="collection-item">Agendar citas</a>
        @endif
    @endif
    @if (auth::user()->has_role(config('app.admin_role')))
        <a href="{{ route('backoffice.user.assign_role', $user) }}" class="collection-item">Asignar roles</a>
        <a href="{{ route('backoffice.user.assign_permission', $user) }}" class="collection-item">Asignar permisos</a>
    @endif

</div>
