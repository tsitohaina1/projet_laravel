<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MODIFICATION</title>
        <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
        <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
</head>
<body>
    @extends("navbar.navbar")

    @section("contenu")
    <div class="container">
        <h2>Modification cité<a href="/citesListe" class="btn btn-success">Listes des cités</a></h2>
        <form action="/cite-update/{{$cite->id}}" class="was-validated" method="POST">
            @csrf
            @method('put')
            <div class="form-group">
              <label for="uname">Libele Cité:</label>
              <input type="text" class="form-control" placeholder="Saisir code cité" name="lib_cite" value="{{ $cite->lib_cite}}" required>
              <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Code cité.</div>
            </div>
            <div class="form-group">
                <label for="uname">Nom cité:</label>
                <input type="text" class="form-control" placeholder="Saisir nom cité" name="nom_cite" value="{{ $cite->nom_cite}}" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Nom cite.</div>
            </div>
            <div class="form-group">
                <label for="uname">Adresse Cité:</label>
                <input type="text" class="form-control" placeholder="Saisir Adresse cité" name="adresse_cite" value="{{ $cite->adresse_cite}}" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback"> Adresse cité.</div>
            </div>
            <div class="form-group">
                <label for="uname">Agence:</label>
                <input type="text" class="form-control" placeholder="Saisir agence" name="agence" value="{{ $cite->agence}}" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Agence.</div>
            </div>
            <button type="submit" class="btn btn-info mt-4">ENREGISTRER</button>
          </form>
        </div>
    </div>
@endsection
</body>
</html>
