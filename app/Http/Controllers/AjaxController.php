<?php

namespace App\Http\Controllers;

use App\User;
use App\Invoice;
use Carbon\Carbon;
use App\ClinicNote;
use App\Speciality;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function user_speciality(Request $request){

        if($request->ajax()){
            $speciality = Speciality::findOrFail($request->speciality);
            $users = $speciality->users;
            return response()->json($users);
        }

    }

    public function invoice_info(Request $request){

        if($request->ajax()){
            $invoice = Invoice::findOrFail($request->invoice_id);
            $invoice_meta = $invoice->metas;
            return response()->json([
                'invoice' => $invoice,
                'doctor' => $invoice->doctor('No aplica'),
                'concept' => $invoice->concept()
                ]);
        }

    }

    public function note_info(Request $request)
    {
        if($request->ajax()){
            $note = ClinicNote::findOrFail($request->note_id);
            return response()->json([
                'route' => route('backoffice.clinic_note.update', [$note->user, $note]),
                'description' => $note->description,
                'privacy' => $note->privacy
            ]);
        }
    }

    public function disable_dates(Request $request)
    {
        if($request->ajax()){
            $user = User::findOrFail($request->doctor);
            return response()->json([
                'disable_dates' => $user->manual_disabled_dates(),
                'days_off' => $user->days_off(),
            ]);
        }
    }

    public function disable_times(Request $request)
    {
        if($request->ajax()){
            // Detemrinar el usuario
            $user = User::findOrFail($request->doctor);

            // Determinar el día que el usuario proceso
            $date = Carbon::parse($request->date);
            $day = $date->dayOfWeek + 1;

            //Arreglo de horarios base del doctor
            $hours = json_decode($user->hours(), true);

            //Ecncontrar citas de un día en específico
            $date = $date;
            $appointments = $user->doctor_appointments()
                                ->whereDate('date', $date)
                                ->get()
                                ->pluck('date')
                                ->toJson();

            return response()->json([
                'hours' => $hours,
                'day' => $day,
                'date' => $date,
                'appointments' => $appointments
            ]);
        }
    }
}
