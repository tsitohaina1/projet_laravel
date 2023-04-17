<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Facture de vente</title>

    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
    <link href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
</head>
<body>
    @extends("navbar.navbar")

@section("contenu")
    <div class="container">
        <div class="col-12">
            <div class="card">
                @foreach ($factur as $fact)
                <div class="card-body">
                    <div id="print">
                        <h5 class="card-title">FACTURE DE VENTE N°{{$fact->id_vente}} </h5>
                        <p>Date vente: {{$fact->date_vente}}</p>
                        <hr>
                        <p>Nom Client: {{$fact->nom_cli}}</p>
                        <p>Prenom client: {{$fact->prenom_cli}}</p>
                        <p>Numero logement : {{$fact->num_log}}</p>
                        <p>Nb Chambre Logement: {{$fact->nb_chambre}} Chambres</p>
                        <p>Surface Logement : {{$fact->surface}} m²</p>
                        <p>Type de vente : {{$fact->type_vente}}</p>
                        <p>Prix logement: {{$fact->prix_log}}Ar</p><hr>
                    </div>

                    <button class="btn btn-primary bxs-printer" onclick="PrintTable()">IMPRIMER</button> <a href="/facturation" class="btn btn-danger bx-arrow-back" >RETOUR</a>
                </div>

                @endforeach
            </div>
        </div>
    </div>


    <script type="text/javascript">
        function PrintTable() {
            var printWindow = window.open('', '', 'height=0,width=900');
            printWindow.document.write('<html><head><title>Compte de client</title>');

            //Print the Table CSS.
            printWindow.document.write('<style type = "text/css">');
            printWindow.document.write('</style>');
            printWindow.document.write('</head>');

            //Print the DIV contents i.e. the HTML Table.
            printWindow.document.write('<body>');
            var divContents = document.getElementById("print").innerHTML;
            printWindow.document.write(divContents);
            printWindow.document.write('</body>');

            printWindow.document.write('</html>');
            printWindow.document.close();
            printWindow.print();
        }
        </script>
@endsection
</body>
</html>
