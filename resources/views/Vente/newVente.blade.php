<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nouveau Vente</title>
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
</head>
<body>
    @extends("navbar.navbar")

    @section("contenu")
    <div class="container">
        <h2>Validation de Nouveau Vente <a href="/VenteListe" class="btn btn-success">Liste des Ventes</a></h2>
        <form action="/vente-store" class="was-validated" method="POST">
            @csrf
            <div class="form-group">
              <label for="uname">Numero de Client:</label>
              <select name="id_cli" class="form-control">
                @foreach ($Clients as $cli)
                    <option value="{{ $cli->id}}" class="form-control" title="{{ $cli->id}}">{{ $cli->tel_cli}}</option>
                @endforeach
            </select>
              <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Svp selectionner Numero Client</div>

            </div>
            <div class="form-group">
                <label for="uname">Numero de logement :</label>
                <select name="num_log" class="form-control">
                @foreach ($Logements as $log)
                    <option value="{{ $log->id}}" class="form-control">{{$log->num_log}}</option>
                @endforeach
                </select>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Svp Completer Num logement.</div>
            </div>
            <div class="form-group">
                <label for="uname">Mode Vente:</label>
                <select name="type_vente" class="form-control">
                        <option value="Par montant" class="form-control">Par Espece</option>
                        <option value="Par Crédit" class="form-control">Par Solde</option>
                    </select>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Svp selectionner type de vente.</div>
            </div>


            <div class="form-group">
                <label for="uname">Date de vente:</label>
                <input type="date" class="form-control" name="date_vente" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Svp Completer date vente.</div>
            </div>

            <button type="submit" class="btn btn-info mt-4">ENREGISTRER</button>
          </form>
        </div>
    </div>
@endsection
</body>
</html>
