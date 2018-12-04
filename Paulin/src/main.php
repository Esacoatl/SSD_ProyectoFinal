<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pronosticos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href=" https://bootswatch.com/4/darkly/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="css/styleMain.css">
    }
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

      if (localStorage.correo) {
        
      }else {
        window.location.assign("../login.html")
      }
      
      google.charts.load('current', {'packages':['corechart']});
      google.charts.load('current', {'packages':['gauge']});
      google.charts.setOnLoadCallback(drawChart);
      google.charts.setOnLoadCallback(drawChart2);

        /////////////grafica lineal///////////////

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Periodo', 'Frecuencia'], <?php
                $con = mysqli_connect("localhost","root","","sistemasDSS");
                $sql = "SELECT * FROM data1";
                $result = mysqli_query($con,$sql);
                $n = mysqli_num_rows($result);

                for ($i=0; $i < $n-1; $i++) { 
                    $fila = mysqli_fetch_row($result);
                    print("['".$fila[0]."',".$fila[1]."],");
                }
                $fila = mysqli_fetch_row($result);
                print("['".$fila[0]."',".$fila[1]."]");
    		
	        ?>
            ]);

            var options = {
                title: 'Salario',
                titleTextStyle: {
                    color: 'white', 
                    fontName: 'Arial', 
                    fontSize: '20',
                    bold: true
                },
                curveType: 'function',
                backgroundColor: '#303643',
                colors: ['#ADB7FB'],
                hAxis: {
                    title: 'Time',
                    textStyle: {
                        color: 'white',
                        fontSize: 14,
                        bold: false
                    },
                    titleTextStyle: {
                        color: 'white',
                        fontSize: 14,
                        bold: true
                    }
                    },
                    vAxis: {
                    title: 'Promedio de goles',
                    textStyle: {
                        color: 'white',
                        fontSize: 14,
                        bold: false
                    },
                    titleTextStyle: {
                        color: 'white',
                        fontSize: 14,
                        bold: true
                    }
                },
                legend: {
                    position: 'right', 
                    textStyle: {
                        color: 'white', 
                        fontSize: 10
                    }
                },
                pointsVisible: true
            };

            var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

            chart.draw(data, options);
        }

      //////////////Grafica Velocimetro////////////////

      function drawChart2() {

        var data2 = google.visualization.arrayToDataTable([
          ['Label', 'Value'],
          ['Mejor', <?php
                            $con = mysqli_connect("localhost", "root", "", "sistemasDSS");
                            $sql = "Select * from data1";
                            $result = mysqli_query($con, $sql);
                            $n = mysqli_num_rows($result);

                            for ($i = 0; $i < $n - 1; $i++) {
                                $fila = mysqli_fetch_row($result);
                            }
                            $fila = mysqli_fetch_row($result);
                            print($fila[1]);
                            ?>]
     
        ]);

        var options2 = {
          width: 400, height: 125,
          redFrom: 0, redTo: 49,
          yellowFrom:50, yellowTo: 74,
          greenFrom:75, greenTo:100,
          minorTicks: 5
        };

        var chart2 = new google.visualization.Gauge(document.getElementById('chart_div'));

        chart2.draw(data2, options2);

      }
    </script>

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="main.php"><img src="../images/logoQ.png" alt="" height="40" width="40" ><b> Pronostico App</b></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item align-middle">
                        <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#exampleModalCenter"><i class="far fa-envelope"></i> Enviar Correo</button>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../index.html"><i class="fas fa-sign-out-alt" style="font-size: 1.4em;"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <br><br><br>

    <div class= "container" id="front1">
        <div class="row mt-5">
            <div class = "col-md-5">
                <br><br>
                <h4>Lista de Estadisticas</h4><br>
                <div class="table-wrapper-scroll-y">
                <?php
                    $con=mysqli_connect("localhost", "root", "", "sistemasDSS");
                    $sql = "Select * from data1";
                    $result = mysqli_query($con, $sql);

                    echo ("<table class='table table-bordered table-striped'>
                    <thead>
                    <tr>
                    <th><strong>Periodo</strong></th>
                    <th><strong>Frecuencia</strong></th>
                    </tr>
                    </thead>
                    <tbody>");

                    while($row = mysqli_fetch_array($result))
                    {
                    echo "<tr>";
                    echo "<td>" . $row['PERIODO'] . "</td>";
                    echo "<td>" . $row['FRECUENCIA'] . "</td>";
                    echo "</tr>";
                    }
                    echo "</tbody> </table>";

                    mysqli_close($con);
                ?>
                </div>
            </div>
            <div class = "col-md-7 align-middle">
                <br>
                <h4>Grafica Pronostico</h4><br>
                <div id="curve_chart" style="width: 625px; height: 325px" class="align-middle"></div>
                <br><br>
                <div id="chart_div" style="width: 425px; height: 125px;" class="align-middle "></div>
            </div>
        </div>
        <div><h4>EL mejor metodo de Pronostico es: </h4></div>
        <br>
    </div>





    
<!--------------------------------------- Modal ----------------------------------------->

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"><i class="far fa-envelope"></i> Enviar Correo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div><p>Ingrese el correo de contacto: </p></div>
                <input type="email" name="email" id="email">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Enviar</button>
            </div>
        </div>
    </div>
</div>

</body>



</html>
