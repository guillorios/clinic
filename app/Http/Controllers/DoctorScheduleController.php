<?php

namespace App\Http\Controllers;

use App\User;
use App\DoctorSchedule;
use Illuminate\Http\Request;

class DoctorScheduleController extends Controller
{
    public function assign(User $user)
    {
        return view('theme.backoffice.pages.user.doctor.schedule', [
            'user' => $user,
            'days' => ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado']
        ]);
    }

    public function assignment(Request $request, User $user, DoctorSchedule $doctor_schedule)
    {
        $msj = [];
        $msj[0] = $doctor_schedule->disable_dates($request, $user);
        $msj[1] = $doctor_schedule->disable_work_days($request, $user);
        $msj[2] = $doctor_schedule->disable_hours($request, $user);
    }

}

