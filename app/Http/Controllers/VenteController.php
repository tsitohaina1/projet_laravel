<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Logement;
use App\Models\Vente;
use Illuminate\Http\Request;

class VenteController extends Controller
{
    public function index() {
        $Vente  =  Vente::join('logements', 'ventes.num_log', '=', 'logements.id')
                     ->join('clients', 'ventes.clients_id', '=', 'clients.id')
                     ->select('logements.num_log as num_log','logements.prix_log as prix_log', 'ventes.clients_id as clients_id','ventes.id as id',
                     'ventes.type_vente as type_vente','ventes.date_vente as date_vente','clients.nom_cli as nom_cli')
                     ->get();
        return view('Vente.VenteListe',['Vente'=>$Vente]);
    }

    public function create(){
        $Logements=Logement::where('disponibilite','=','disponible')->get();
        $Clients=Client::get();
        return view('Vente.newVente',['Logements'=>$Logements,'Clients'=>$Clients]);
    }

    public function store(Request $request) {
        $Vente = new Vente;
        $log=$request->num_log;
        $statu_upd="Vendu";
        $logem = Logement::where('id',$log)->first();
        $logem->disponibilite=$statu_upd;
        $logem->save();
        $Vente->clients_id=$request->id_cli;
        $Vente->num_log=$request->num_log;

        $Vente->type_vente=$request->type_vente;
        $Vente->date_vente=$request->date_vente;
        $Vente->save();
        return redirect('/VenteListe')->withSuccess('Vente bien ajouter avec succé');
    }

    public function edit($id){
        $Logements=Logement::where('disponibilite','=','disponible')->get();
        $Clients=Client::get();
        $Ventes = Vente::where('id',$id)->first();
        return view('Vente.editVente',['Ventes'=>$Ventes,'Logements'=>$Logements,'Clients'=>$Clients]);
    }

    public function update(Request $request,$id){
        $Vente = Vente::where('id',$id)->first();
        $Vente->clients_id=$request->id_cli;
        $Vente->num_log=$request->num_log;
        $Vente->type_vente=$request->type_vente;
        $Vente->date_vente=$request->date_vente;
        $Vente->save();


        return redirect('/VenteListe')->withSuccess('Vente bien modifié avec succé');
    }

    public function destroy($id){
        $Vente = Vente::whereId($id)->first();
        $id_log=$Vente->num_log;
        $statu="disponible";
        $logement = Logement::where('id',$id_log)->first();
        $logement->disponibilite=$statu;
        $logement->save();
        $Vente->delete();
        return redirect('/VenteListe')->withSuccess('Suppresion de vente réussit!');

    }
}
