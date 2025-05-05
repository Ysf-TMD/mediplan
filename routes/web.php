<?php

use Illuminate\Support\Facades\Route;

/*Route::get('/', function () {
    return view('partials.login');
});*/
Route::get("/mediplan/dashboard", function () {
    return view("mediplan.dashboard");
});
Route::get("/", function () {
    return view("mediplan.dashboard");
});

Route::get("/doctors", function () {
    return view("mediplan.content.doctors.doctors");
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
