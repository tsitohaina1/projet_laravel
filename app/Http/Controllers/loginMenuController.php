<?php

namespace App\Http\Controllers;

use App\Models\Logement;
use App\Models\Vente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class loginMenuController extends Controller
{
    public function menu(){
        $log = DB::select('select count(id) as nb_log from logements where disponibilite = ?', ['disponible']);
        $logVendu = DB::select('select count(id) as nb_log from logements where disponibilite = ?', ['vendu']);
        $client = DB::select('select count(id) as nb_cli from clients');

        return view('Menu.menuPrincipale',['Logements'=>$log,'LogVendu'=>$logVendu,'clients'=>$client]);
    }
    public function login(){
        return view('Menu.login');
    }
    public function connexion(Request $request){
        if($request->username=="username" && $request->password=="123456"){
    

        return redirect('/statVendu');

        }
        else{
            return redirect('/')->withErrors('Mot de passe ou Username Incorrecte!');
        }
    }
}
