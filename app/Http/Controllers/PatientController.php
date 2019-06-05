<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function schedule(){
        return view('theme.frontoffice.pages.user.patient.schedule');
    }

    public function back_schedule(User $user){
        return view('theme.backoffice.pages.user.patient.schedule', [
            'user' => $user
        ]);
    }

    public function appointments(){
        return view('theme.frontoffice.pages.user.patient.appointments');
    }

    public function prescriptions(){
        return view('theme.frontoffice.pages.user.patient.prescriptions');
    }

    public function invoices(){
        return view('theme.frontoffice.pages.user.patient.invoices');
    }

}
