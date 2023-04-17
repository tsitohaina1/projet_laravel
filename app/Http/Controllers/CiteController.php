<?php

namespace App\Http\Controllers;

use App\Models\Cite;
use Illuminate\Http\Request;


class CiteController extends Controller
{
    public function create() {
        $Cite = Cite::get();
        return view('Cite.newCite',['Cite'=>$Cite]);
    }

    public function index(){
        $Cites = Cite::latest()->paginate(4);
        return view('Cite.cite',['Cites'=>$Cites]);
    }

    public function ajout(Request $request) {
        $cite = new Cite();
        $cite->lib_cite=$request->lib_cite;
        $cite->nom_cite=$request->nom_cite;
        $cite->adresse_cite=$request->adresse_cite;
        $cite->agence=$request->agence;
        $cite->save();
        return redirect('/citesListe')->withSuccess('Cité bien ajouter avec succé');
    }

    public function edit($id){
        $cite = Cite::where('id',$id)->first();
        return view('Cite.editCite',['cite'=>$cite]);
    }

    public function update(Request $request,$id){
        $cite = Cite::where('id',$id)->first();
        $cite->lib_cite=$request->lib_cite;
        $cite->nom_cite=$request->nom_cite;
        $cite->adresse_cite=$request->adresse_cite;
        $cite->agence=$request->agence;
        $cite->save();
        return redirect('/citesListe')->withSuccess('Cité bien modifié avec succé');
    }

    public function supprimer($id){
        $cite = Cite::whereId($id)->first();
        $cite->delete();
        return redirect('/citesListe')->withSuccess('Cité Supprimé avec succé');
    }
}
