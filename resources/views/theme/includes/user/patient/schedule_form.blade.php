<form action="{{ $route }}" method="POST" id="">
    @csrf

    @if (!isset($appointment))

        @if (user()->has_role(config('app.doctor_role')))
            <input type="hidden" name="doctor" value="{{ user()->id }}">
        @else
            <div class="row">
                <div class="input-field col s12">
                    <i class="material-icons prefix">device_hub</i>
                    <select name="speciality" id="speciality">
                        <option value="" disabled="" selected="">Selecciona una especialidad</option>
                        @foreach ($specialities as $speciality)
                            <option value="{{ $speciality->id }}">{{ $speciality->name }}</option>
                        @endforeach
                    </select>
                    <label for="speciality">Especialidades</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <i class="material-icons prefix">face</i>
                    <select name="doctor" id="doctor">
                        <option value="" disabled="" selected="">Primero selecciona una especialidad</option>
                    </select>
                    <label for="doctor">Doctores</label>
                </div>
            </div>
        @endif

    @else

    <div class="row">
        <div class="input-field col s12">
            <i class="material-icons prefix">hourglass_full</i>
            <select name="status" id="status">
                <option value="pending" @if($appointment->status == 'pending') selected @endif>Pendiente</option>
                <option value="done" @if($appointment->status == 'done') selected @endif>Terminada</option>
                <option value="cancelled" @if($appointment->status == 'cancelled') selected @endif>Cancelada</option>
            </select>
            <label for="speciality">Estados</label>
        </div>
    </div>

    @endif

    <div class="row">
        <div class="input-field col s12 m6">
            <i class="material-icons prefix">today</i>
            <input type="text" name="date" id="datepicker" class="datepicker" placeholder="Selecciona una fecha" @if(isset($appointment)) data-value="{{ $appointment->date->format('Y-m-d') }}"@endif>
        </div>
        <div class="input-field col s12 m6">
            <i class="material-icons prefix">access_time</i>
            <input type="text" name="time" id="timepicker" class="timepicker" placeholder="Selecciona un horario" @if(isset($appointment)) data-value="{{ $appointment->date->format('H:i') }}"@endif>
        </div>
    </div>
    <input type="hidden" name="user_id" value="{{ encrypt($user->id) }}">
    <div class="row">
        <div class="input-field col s12 m6">
            <button class="btn waves-effect waves-light" type="submit">AGENDAR <i class="material-icons right">send</i></button>
        </div>
    </div>

</form>
