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
		$url = 'https://ai-store-api.herokuapp.com/info/7days-maxes/?pin='.$numpin; //GET
		$url1 = 'https://ai-store-api.herokuapp.com/auth/?pin='.$numpin; //GET

		//inicializamos el objeto CUrl
		$ch = curl_init(); //GET
		$ch1= curl_init(); //GET

		//Indicamos que nuestra petición sera Post
		curl_setopt($ch, CURLOPT_URL, $url); //GET
		curl_setopt($ch1, CURLOPT_URL, $url1); //GET

		//para que la peticion no imprima el resultado como un echo comun, y podamos manipularlo
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //GET
		curl_setopt($ch1, CURLOPT_RETURNTRANSFER, 1); //GET

		//Ejecutamos la petición
		$result = curl_exec($ch); //GET
		$result1 = curl_exec($ch1); //GET

		// cerramos la sesión cURL
		curl_close ($ch);//GET
		curl_close ($ch1);//GET

		// hacemos lo que queramos con los datos recibidos
		$manage = json_decode($result, true);//GET
		$manage1 = json_decode($result1, true);//GET

		//Almacena los ultimos 7 días, con la maxima de personas
		$dias = array();
		$maxcantidad = array();
		$i = 1;
		while($i<=7){
			$dias[$i] = $manage["info"]["day_".$i]["currentDay"];
			$maxcantidad[$i] = $manage["info"]["day_".$i]["maxPeople"];
			$i++;
		}

		//Total de entradas del día
		$totalD = $manage1["store"]["maxPeople"];
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
			var dia1 = '<?php echo $maxcantidad[1]; ?>';
			var dia2 = '<?php echo $maxcantidad[2]; ?>';
			var dia3 = '<?php echo $maxcantidad[3]; ?>';
			var dia4 = '<?php echo $maxcantidad[4]; ?>';
			var dia5 = '<?php echo $maxcantidad[5]; ?>';
			var dia6 = '<?php echo $maxcantidad[6]; ?>';
			var dia7 = '<?php echo $maxcantidad[7]; ?>';
			//date("jS F, Y", strtotime( $Fecha))
			var d1 = '<?php echo date("d/m/y", strtotime($dias[1]));?>';
			var d2 = '<?php echo date("d/m/y", strtotime($dias[2]));?>';
			var d3 = '<?php echo date("d/m/y", strtotime($dias[3]));?>';
			var d4 = '<?php echo date("d/m/y", strtotime($dias[4]));?>';
			var d5 = '<?php echo date("d/m/y", strtotime($dias[5]));?>';
			var d6 = '<?php echo date("d/m/y", strtotime($dias[6]));?>';
			var d7 = '<?php echo date("d/m/y", strtotime($dias[7]));?>';

			var myChart = new Chart(ctx, {
			    type: 'line',
			    data: {
							//ultimos 7 días currentDate
			        labels: [d1, d2, d3, d4, d5, d6, d7],
							datasets: [{
			            label: '# de personas',

									//el numero maximo de personas en el día maxPeople
			            data: [dia1, dia2, dia3, dia4, dia5, dia6, dia7],

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
	      <div class="insight-left"><h4 class="xdia">Entradas en el día:</h4></div>
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
