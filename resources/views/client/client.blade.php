<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Listes des Clients</title>

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
        <h2>Listes des clients <a href="/client-create" class="btn btn-primary">Ajout Nouveau Client</a> <button id="export-btn" class="btn btn-success ri-file-excel-2-fill">Export Excel</button></h2>
        @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
           {{session() -> get('success')}}
           <script>
            Swal.fire(
            'Good job!',
            'You clicked the button!',
            'success'
            )
           </script>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fermer"></button>
          </div>
        @endif
        <table class="table table-hover" id="ma-table">
          <thead>
            <tr>
              <th>#</th>
              <th>Nom client</th>
              <th>Prenom</th>
              <th>Adresse</th>
              <th>Lieu travail</th>
              <th>Telephone</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($Client as $cli)
            <tr>
              <td>{{$loop->index+1}}</td>
              <td>{{$cli->nom_cli}}</td>
              <td>{{$cli->prenom_cli}}</td>
              <td>{{$cli->adresse_cli}}</td>
              <td>{{$cli->lieu_cli}}</td>
              <td>{{$cli->tel_cli}}</td>

              <td>
                <a href="/client-edit/{{ $cli->id }}" class="btn btn-sm btn-primary">Modifier</a>
                <a href="/client-delete/{{ $cli->id }}" class="btn btn-sm btn-danger">Supprimer</a>
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
                saveAs(new Blob([s2ab(wbout)],{type:"application/octet-stream"}), 'client.xlsx');
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
        {{$Client->links()}}
      </div>
@endsection
</body>
</html>
