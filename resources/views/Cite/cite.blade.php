<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Liste des Cités</title><!-- Inclure jQuery avant Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Inclure Bootstrap -->
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
     <script src="{{asset('excellib/FileSaver.min.js')}}"></script>

    <script src="{{asset('excellib/xlsx.full.min.js')}}"></script>
</head>
<body>
    @extends("navbar.navbar")

    @section("contenu")
    <div class="container">
        <h2>Listes des cités <a href="/cite-create" class="btn btn-primary">Ajouter Nouveau Cité</a> <button id="export-btn" class="btn btn-success ri-file-excel-2-fill">Export Excel</button> </h2>
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
              <th>CODE CITE</th>
              <th>NOM CITE</th>
              <th>ADRESSE DE CITE</th>
              <th>AGENCE</th>
              <th>ACTION</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($Cites as $cite)
            <tr>
              <td>{{$cite->id}}</td>
              <td>{{$cite->lib_cite}}</td>
              <td>{{$cite->nom_cite}}</td>
              <td>{{$cite->adresse_cite}}</td>
              <td>{{$cite->agence}}</td>

              <td>
                <a href="/cite-edit/{{ $cite->id }}" class="btn btn-sm btn-info">Modifier</a>
                <a href="/cite-delete/{{ $cite->id }}" class="btn btn-sm btn-danger">Supprimer</a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>



        <script type="text/javascript">
          $(document).ready(function() {
            $('#export-btn').click(function() {
                /* Export to Excel */
                var wb = XLSX.utils.table_to_book(document.getElementById('ma-table'), {sheet:"Sheet 1"});
                var wbout = XLSX.write(wb, {bookType:'xlsx',  type: 'binary'});
                function s2ab(s) {
                  var buf = new ArrayBuffer(s.length);
                  var view = new Uint8Array(buf);
                  for (var i=0; i<s.length; i++) view[i] = s.charCodeAt(i) & 0xFF;
                  return buf;
                }
                saveAs(new Blob([s2ab(wbout)],{type:"application/octet-stream"}), 'cite.xlsx');
            });
          });
        </script>
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
        {{-- pagination de listes dans tableau--}}
        {{$Cites->links()}}
      </div>
      @endsection
</body>
</html>
