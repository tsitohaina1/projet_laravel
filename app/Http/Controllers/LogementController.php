<?php

namespace App\Http\Controllers;

use App\Models\Cite;
use App\Models\Logement;
use Illuminate\Http\Request;

class LogementController extends Controller
{
    public function index() {
        $Logement = Logement::latest()->paginate(4);
        return view('logement.logement',['Logement'=>$Logement]);
    }
    public function create() {
        $Logement = Logement::get();
        $Cite = Cite::get();
        return view('logement.newLogement',['Cite'=>$Cite]);
    }
    public function ajout(Request $request) {

        //validate data
        $request->validate([
            'num_log' => 'required|unique:logements|max:200'
        ]);
        $statu="disponible";
        $logement = new Logement;
        $logement->num_log=$request->num_log;
        $logement->nb_chambre=$request->nb_chambre;
        $logement->superficie=$request->superficie;
        $logement->lib_cite=$request->lib_cite;
        $logement->prix_log=$request->prix_log;
        $logement->disponibilite=$statu;
        $logement->save();
        return redirect('/logementsListe')->withSuccess('Logement bien ajouter avec succé');
    }

    public function edit($id){
        $logement = Logement::where('id',$id)->first();
        return view('logement.editLogement',['logement'=>$logement]);
    }
    public function update(Request $request,$id){
        $logement = Logement::where('id',$id)->first();
        $statu="disponible";
        $logement->num_log=$request->num_log;
        $logement->nb_chambre=$request->nb_chambre;
        $logement->superficie=$request->superficie;
        $logement->lib_cite=$request->lib_cite;
        $logement->prix_log=$request->prix_log;
        $logement->disponibilite=$statu;
        $logement->save();
        return redirect('/logementsListe')->withSuccess('Logement bien modifié avec succé');
    }
    public function supprimer($id){
        $logement = Logement::whereId($id)->first();
        $logement->delete();
        return redirect('logementsListe')->withSuccess('Logement bien supprimé avec succé');
    }

}
