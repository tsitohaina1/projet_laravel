<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modification Logement</title>
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
</head>
<body>
    @extends("navbar.navbar")

    @section("contenu")
    <div class="container">
        <h2>Modification Logement <a href="/logementsListe" class="btn btn-success">Liste des logements</a></h2>
        <form action="/logement-update/{{$logement->id}}" class="was-validated" method="POST">
            @csrf
            @method('put')
            <div class="form-group">
              <label for="uname">Numero Logement:</label>
              <input type="text" class="form-control" placeholder="Saisir Numero Logement" name="num_log" value="{{ $logement->num_log}}" required>
              <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback"> Numero Logement.</div>
            </div>
            <div class="form-group">
                <label for="uname">Nombre Chambre:</label>
                <input type="text" class="form-control" placeholder="Saisir Nombre Chambre" name="nb_chambre" value="{{ $logement->nb_chambre}}" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Nombre Chambre.</div>
            </div>
            <div class="form-group">
                <label for="uname">Superficie Logement:</label>
                <input type="number" class="form-control" placeholder="Saisir Superficie Logement en Km²" name="superficie" value="{{ $logement->superficie}}" title="Saisir Superficie de Logement en Km²" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Superficie Logement.</div>
            </div>
            <div class="form-group">
                <label for="uname">Code Cité:</label>
                <input type="text" class="form-control" placeholder="Saisir code cité" name="lib_cite" value="{{ $logement->lib_cite}}" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Code cité.</div>
            </div>
            <div class="form-group">
                <label for="uname">Prix Logement:</label>
                <input type="text" class="form-control" placeholder="Saisir Telephone client" name="prix_log" value="{{ $logement->prix_log}}" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback"> Prix logement.</div>
            </div>
            <button type="submit" class="btn btn-info mt-4">MODIFIER</button>
          </form>
        </div>
    </div>
@endsection
</body>
</html>
