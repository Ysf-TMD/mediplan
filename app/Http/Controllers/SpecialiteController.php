<?php

namespace App\Http\Controllers;

use App\Models\Specialite;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SpecialiteController extends Controller
{
    public function specialites():View
    {
        $specialites = Specialite::all();
        return view("mediplan.content.specialites.specialites",compact("specialites"));
    }
    public function add_specialite(Request $request)
    {

        /*try {*/
            $request->validate([
                "nom_specialite" => "required|min:3",
                "description_specialite" => "max:200",
            ],[
                "nom_specialite.required" => "Le nom de la spécialité est obligatoire !",
                "nom_specialite.min" => "Le nom de la spécialité doit avoir au moins 3 caractères !",
                "description_specialite.max" => "La description doit avoir au maximum 200 caractères !",
            ]);
            $specialite = new Specialite();
            $specialite->nom = $request->nom_specialite ;
            $specialite->description = $request->description_specialite ;
            $specialite->save();
            return back()->with("success","spécialité a été ajouté avec success !");


        /*}
        catch(\SQLiteException $exception){
            return back()->with("error","echec d'insertion : erreur de la base de donnés ".$exception);
        }
        catch (\Exception $exception){
            return back()->with("error","echec d'insertion : erreur generale " . $exception);
        }*/

    }
    public function deleteSpecialite($id){
        $spe = Specialite::findOrFail($id);
        if($spe){
        $spe->delete();
        return back()->with("success","Spécialité supprimé avec success !");
        }else{
            return back()->with("error","Echec de suppression de la spécialité !  ");
        }
    }
}
