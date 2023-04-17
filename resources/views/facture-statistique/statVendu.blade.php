<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Statistique Vendu</title>

    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.0"></script>


</head>
<body>
    @extends("navbar.navbar")

@section("contenu")
    <div class="container">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Statistique de Logements Vendus</h5>

                    <!-- Line Chart -->
                    <canvas id="myChart"></canvas>

                                <script>
                                    var ctx=document.getElementById("myChart").getContext("2d");
                                    var labels = [];
                                    var data = [];

                                    @foreach ($statistique as $stat)
                                        labels.push("{{$stat->num_log}}");
                                        data.push({{$stat->prix_log}});
                                    @endforeach


                                    document.addEventListener("DOMContentLoaded", () => {
                                        new Chart(ctx,{
                                      type: "bar",
                                      data: {
                                        labels: labels,
                                        datasets: [{
                                          label: "Prix logement En Ar",
                                          backgroundColor: ["#8c8cd9", "blue", "brown","blue","#333399"],
                                          borderColor: [ "blue","yellow", "blue", "#8c8cd9","black"],
                                          data: 0,data,
                                        }],
                                      },
                                      options: {}
                                    });
                                });
                                </script>
                </div>
            </div>
        </div>
    </div>
@endsection
</body>
</html>
