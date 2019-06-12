<div class="collection">
    <a href="{{ route('backoffice.user.show', $user) }}" class="collection-item active">{{ $user->name }}</a>
    @if (auth::user()->has_any_role([
        config('app.admin_role'),
        config('app.secretary_role'),
        config('app.doctor_role')
        ]))
        @if ($user->has_role(config('app.patient_role')))
            <a href="{{ route('backoffice.patient.schedule', $user) }}" class="collection-item">Agendar citas</a>
            <a href="{{ route('backoffice.clinic_data.index', $user) }}"  class="collection-item">Historia Clínica</a>
            <a href="{{ route('backoffice.patient.appointments', $user) }}" class="collection-item">Citas Paciente</a>
            <a href="{{ route('backoffice.patient.invoices', $user) }}" class="collection-item">Facturas</a>
        @endif
        @if ($user->has_role(config('app.doctor_role')))
            <a href="{{ route('backoffice.doctor.appointments.show', $user) }}" class="collection-item">Citas Doctor</a>
            <a href="{{ route('backoffice.doctor.schedule.assign', $user) }}" class="collection-item">Gestión de Horarios</a>
        @endif

    @endif
    @if (auth::user()->has_role(config('app.admin_role')))
        <a href="{{ route('backoffice.user.assign_role', $user) }}" class="collection-item">Asignar roles</a>
        <a href="{{ route('backoffice.user.assign_permission', $user) }}" class="collection-item">Asignar permisos</a>
        @if ($user->has_role(config('app.doctor_role')))
            <a href="{{ route('backoffice.user.assign_speciality', $user) }}" class="collection-item">Asignar especialidad</a>
        @endif
    @endif

</div>
