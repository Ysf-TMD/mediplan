<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class DoctorsController extends Controller
{
    public function doctors():View
    {
        return view('mediplan.content.doctors.doctors');
    }
    public function addDoctor():View
    {
        return view("mediplan.content.doctors.addDoctor");
    }
    public function saveDoctor(Request $request):View
    {
        dd($request->post());
        $request->validate([
            "nom_doctor" => "required",
            "prenom_doctor"=>"required",
            "cin_doctor"=>"required",
            "biographie_doctor",
            "email_doctor"=>"required",
            "password_doctor"=>"required",
            "confirm_passeword"=>"required",
            "numero_licence"=>"required",
        ],[
            "nom_doctor.required"=>"Veuillez saisir un nom",
            "prenom_doctor.required"=>"Veuillez saisir un prenom",
            "cin_doctor.required"=>"Veuillez saisir un cin",
            "email_doctor.required"=>"Veuillez saisir un email",
            "password_doctor.required"=>"Veuillez saisir un mot de passe",
            "confirm_password"=>"Veuillez confirmer votre mot de passe",
            "numero_licence.required"=>"Veuillez saisir un numero de licence",
        ]);
    }
}
