<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>mofification Client</title>
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
</head>
<body>
    @extends("navbar.navbar")

    @section("contenu")
    <div class="container">
        <h2>Modification de client <a href="/clients" class="btn btn-success">Liste des clients</a></h2>
        <form action="/client-update/{{$client->id}}" class="was-validated" method="POST">
            @csrf
            @method('put')
            <div class="form-group">
              <label for="uname">Nom Client:</label>
              <input type="text" class="form-control" placeholder="Saisir Nom client" name="nom_cli" value="{{ $client->nom_cli}}" required>
              <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">votre nom.</div>
            </div>
            <div class="form-group">
                <label for="uname">Prenom Client:</label>
                <input type="text" class="form-control" placeholder="Saisir Prenom client" name="prenom_cli" value="{{$client->prenom_cli}}" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">votre Prenom.</div>
            </div>
            <div class="form-group">
                <label for="uname">Adresse Client:</label>
                <input type="text" class="form-control" placeholder="Saisir Adresse client" value="{{ $client->adresse_cli}}" name="adresse_cli" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">votre Adresse.</div>
            </div>
            <div class="form-group">
                <label for="uname">Lieu de travail:</label>
                <input type="text" class="form-control" placeholder="Saisir Lieu de travail" value="{{$client->lieu_cli}}" name="lieu_cli" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback"> votre Lieu de travail.</div>
            </div>
            <div class="form-group">
                <label for="uname">Telephone Client:</label>
                <input type="text" class="form-control" placeholder="Saisir Telephone client" name="tel_cli" value="{{$client->tel_cli}}" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">votre Telephone.</div>
            </div>
            <button type="submit" class="btn btn-info mt-4">MODIFIER</button>
          </form>
        </div>
    </div>
@endsection
</body>
</html>
