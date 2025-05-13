<?php

use Illuminate\Support\Facades\Route;

/*Route::get('/', function () {
    return view('partials.login');
});*/
Route::get("/mediplan/dashboard", function () {
    return view("mediplan.dashboard");
});
Route::get("/", function () {

    return view("mediplan.dashboard" );
});


Route::controller(\App\Http\Controllers\DashboardAdminController::class)->group(function () {
    Route::get("/dashboardadmin", "index")->name("dashboardadmin");
    Route::get("/utilisateurs" ,"utilisateurs")->name("utilisateurs");
    Route::get("/doctors" , "doctors")->name("doctors");
    Route::get("/patients" ,"patients")->name("patients");
    Route::get("/assistants","assistants")->name("assistants");
    Route::get("/etablissements","etablissements")->name("etablissements");
    Route::get("/rdv","rdvs")->name("rdvs");
    Route::get("/medical-foledrs","medicalFolders")->name("medical-foledrs");
    Route::get("/notifications","notifications")->name("notifications");
})->prefix("mediplan");

//Route respnsable a gerer les docteurs (add , update , delete );
Route::controller(\App\Http\Controllers\DoctorsController::class)->group(function ()
{
    Route::get("/add-doctor", "addDoctor")->name("add-doctor");
    Route::get("/doctors/list","doctors")->name("doctors");
    Route::post("/doctors/save" , "saveDoctor")->name("save-doctor");
});
Route::controller(\App\Http\Controllers\SpecialiteController::class)->group(function ()
{
    Route::get("/specialites/list","specialites")->name("specialites");
    Route::post("/add-specialite", "add_specialite")->name("add-specialite");
    Route::delete("/specialite/delete/{id}", "deleteSpecialite")->name("deleteSpecialite");
});
Route::get("/doctors", function () {
    $notifications = \App\Models\Notification::all();
    return view("mediplan.content.doctors.doctors", compact("notifications"));
})->prefix("mediplan")->name("mediplan.doctors");


Route::get("/patients", function () {
    return view("mediplan.content.patients.patients");
})->prefix("mediplan");








Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/mediplan', function () {
        return view('mediplan');
    })->name('mediplan');

});
