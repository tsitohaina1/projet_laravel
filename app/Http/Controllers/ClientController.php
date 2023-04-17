<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    //afficher liste de client
    public function index() {
        $Client = Client::latest()->paginate(4);
        return view('client.client',['Client'=>$Client]);
    }

    //afficher formulaire d'ajout client
    public function create() {
        $Client = Client::get();
        return view('client.new');
    }
    //ajout client
    public function store(Request $request) {
        $client = new Client();
        $client->nom_cli=$request->nom_cli;
        $client->prenom_cli=$request->prenom_cli;
        $client->adresse_cli=$request->adresse_cli;
        $client->lieu_cli=$request->lieu_cli;
        $client->tel_cli=$request->tel_cli;
        $client->save();
        return redirect('/clients')->withSuccess('Client bien ajouter avec succé');
    }
    //get client à modification par id
    public function edit($id){
        $client = Client::where('id',$id)->first();
        return view('client.edit',['client'=>$client]);
    }
    //modification client
    public function update(Request $request,$id){
        $client = Client::where('id',$id)->first();
        $client->nom_cli=$request->nom_cli;
        $client->prenom_cli=$request->prenom_cli;
        $client->adresse_cli=$request->adresse_cli;
        $client->lieu_cli=$request->lieu_cli;
        $client->tel_cli=$request->tel_cli;
        $client->save();
        return redirect('/clientsListe')->withSuccess('Client bien modifié avec succé');
    }
    //supression client
    public function destroy($id){
        $client = Client::whereId($id)->first();
        $client->delete();
        return redirect('/clients');
    }
}
