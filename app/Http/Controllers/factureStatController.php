<?php

namespace App\Http\Controllers;

use App\Models\Logement;
use App\Models\Vente;
use Illuminate\Http\Request;

class factureStatController extends Controller
{
    public function statVendu(){
        $statistique = Logement::where('disponibilite','vendu')->get();
        return view('facture-statistique.statVendu',['statistique'=>$statistique]);
    }
    public function statDispo(){
        $statistique = Logement::where('disponibilite','disponible')->get();
        return view('facture-statistique.statDispo',['statistique'=>$statistique]);
    }
    public function facturation(){
        $Vente  =  Vente::join('logements', 'ventes.num_log', '=', 'logements.id')
        ->join('clients', 'ventes.clients_id', '=', 'clients.id')
        ->select('logements.num_log as num_log','logements.prix_log as prix_log', 'ventes.clients_id as clients_id','ventes.id as id',
        'ventes.type_vente as type_vente','ventes.date_vente as date_vente','clients.nom_cli as nom_cli')
        ->get();
return view('facture-statistique.appercuListe',['Vente'=>$Vente]);
    }

    public function facture($id){
        $facture = Vente::join('clients', 'ventes.clients_id', '=', 'clients.id')
                    ->join('logements', 'ventes.num_log', '=', 'logements.id')
                   ->select('clients.nom_cli as nom_cli', 'clients.prenom_cli as prenom_cli', 'clients.tel_cli as tel_cli'
                   , 'clients.adresse_cli as adresse_cli', 'ventes.clients_id as id_cli', 'ventes.date_vente as date_vente'
                   ,'ventes.id as id_vente','ventes.type_vente as type_vente','logements.prix_log as prix_log',
                    'logements.num_log as num_log','logements.nb_chambre as nb_chambre','logements.superficie as surface')
                   ->where('ventes.id','=',$id)
                   ->get();
        return view('facture-statistique.facture',['factur'=>$facture]);
    }

    public function navbar(){
        return view('navbar.navbar');
    }
}
