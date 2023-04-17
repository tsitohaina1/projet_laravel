<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Liste des Ventes</title>
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
</head>
<body>
    @extends("navbar.navbar")

    @section("contenu")
    <div class="container">
        <h2>Listes des Ventes Effectués<a href="/vente-create" class="btn btn-success">Valider Nouveau Vente</a></h2>
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{session() -> get('success')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fermer"></button>
            </div>
        @endif
        <table class="table table-hover" id="ma-table">
          <thead>
            <tr>
              <th>#</th>
              <th>NUMERO CLIENT</th>
              <th>NUMERO LOGEMENT</th>
              <th>TYPE DE VENTE</th>
              <th>DATE DE VENTE</th>
              <th>PRIX LOGEMENT</th>
              <th>ACTIONS</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($Vente as $vente)
            <tr>
              <td>{{$vente->id}}</td>
              <td>{{$vente->nom_cli}}</td>
              <td>{{$vente->num_log}}</td>
              <td>{{$vente->type_vente}}</td>
              <td>{{$vente->date_vente}}</td>
              <td>{{$vente->prix_log}}Ar</td>
              <td>
                <a href="/vente-edit/{{ $vente->id }}" class="btn btn-sm btn-primary">Modifier</a>
                <a href="/vente-delete/{{ $vente->id }}" class="btn btn-sm btn-danger">Supprimer</a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <script>
        // Sélectionnez le champ de saisie et le tableau
        var input = document.getElementById("myInput");
        var table = document.getElementById("ma-table");

        // Ajoutez un écouteur d'événement sur le champ de saisie
        input.addEventListener("keyup", function() {
        // Récupérez la valeur saisie par l'utilisateur
        var filter = input.value.toUpperCase();

        // Parcourez toutes les lignes du tableau, en excluant la première ligne (l'entête)
        for (var i = 1; i < table.rows.length; i++) {
            var row = table.rows[i];

            // Parcourez toutes les colonnes de chaque ligne
            for (var j = 0; j < row.cells.length; j++) {
            var cell = row.cells[j];

            // Si la cellule contient la valeur saisie, affichez la ligne, sinon masquez-la
            if (cell.innerHTML.toUpperCase().indexOf(filter) > -1) {
                row.style.display = "";
                break;
            } else {
                row.style.display = "none";
            }
            }
        }
        });

    </script>
      @endsection
</body>
</html>
