<?php
	session_start();
	$pin = $_SESSION["pin"];
	$cantidad = $_SESSION["cantidad"];
?>

<!DOCTYPE html>
<html>
<head>
<title>Grafica | COntaVID</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<!--Favicon-->
<link  rel="icon"   href="icon.png" type="image/png" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
<!--Custom CSS-->
<link href="estilo.css" rel="stylesheet" type="text/css">
<!--JS-->
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="java.js"></script>
<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700i" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>

</head>

<body>

	<?php

		$numpin = intval($pin);
		$url = 'https://ai-store-api.herokuapp.com/info/?pin='.$numpin;

		//inicializamos el objeto CUrl
		$ch = curl_init();

		//Indicamos que nuestra petición sera Post
		curl_setopt($ch, CURLOPT_URL, $url);

		//para que la peticion no imprima el resultado como un echo comun, y podamos manipularlo
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

		//Ejecutamos la petición
		$result = curl_exec($ch);

		// cerramos la sesión cURL
		curl_close ($ch);

		// hacemos lo que queramos con los datos recibidos
		$manage = json_decode($result, true);

		//Fecha actual para el ciclo
		$fechaA = date("Y")."-".date(m)."-".date(d);

		$totalD = $manage["info"][0]["peopleEntering"]

	?>

	<header class="header">

		<nav class="navigation">

		  <section class="logo"></section>

		  <section class="navigation__icon">
			<span class="topBar"></span>
			<span class="middleBar"></span>
			<span class="bottomBar"></span>
		  </section>

		  <ul class="navigation__ul">
			<li><a href=<?php echo '"main.php?pin='.$pin.'"'?>>INICIO</a></li>
			<li><a href="grafics.php">GRÁFICAS</a></li>
			<li><a href="report.php">REPORTES</a></li>
			<li><a href="configuration.php">CONFIGURACIÓN</a></li>
			<li><a href= "index.php">SALIR</a></li>
		  </ul>

		  <section class="navigation__social">
			<ul class="navigation__social-ul">
			  <li>
				<a href="" class="social-icon"></a>
			  </li>
			  <li>
				<a href="" class="social-icon"></a>
			  </li>
			  <li>
				<a href="" class="social-icon"></a>
			  </li>
			  <li>
				<a href="" class="social-icon"></a>
			  </li>
			</ul>
		  </section>

		</nav>

	</header>
	<div class="container1">
	  <div class="contadorR">
	    <h1 class="num-personas"><a>
			<?php
				echo $cantidad;
			?>
		</a></h1>
	    <h2 class="personas">personas</h2>
	  </div>

		<!--Grafica-->
		<canvas id="myChart"></canvas>
			<script>
			var ctx = document.getElementById('myChart').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'line',
			    data: {
			        labels: ['Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab', 'Dom'],

							datasets: [{
			            label: '# de personas',
									//la suma del # de personas en el día (variables)
			            data: [12, 20, 3, 5, 2, 3, 5],
									backgroundColor: ['rgba(91,158,84, 0.46)'],
			            borderColor: ['rgb(91,158,84)'],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
			</script>

	    <div class="insights">
	      <div class="insight-left"><h3 class="xdia">Total en el día:</h3></div>
	      <div class="insight-right">
			<h3 class="xdia2">
				<?php
					echo $totalD;
				?>
			</h3>
		  </div>


			</div>
	  <div class="foot">
			<span class="harvey" id="fecha"></span>
			<br>
			<i class="fa fa-print" style="font-size:40px; color: white; padding: 15px" onclick="imprimir()"></i>
			<i class="fa fa-download" style="font-size:40px; color: white; padding: 15px" onclick="descargar()"></i>
	  </div>
	</div>
	<div id="contenedor_carga">
		<div id="carga">
		</div>
	</div>
	<script>
		/*window.onload = function(){
			var contenedor = document.getElementById('contenedor_carga');
			contenedor.style.visibility = "hidden";
			contenedor.style.opacity="0";
		}*/
		setTimeout(() => {
			var contenedor = document.getElementById('contenedor_carga');
			contenedor.style.visibility = "hidden";
			contenedor.style.opacity="0";
		}, 1000);
	</script>
</body>
</html>
