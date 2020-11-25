<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Inicio | COntaVID</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<!--Favicon-->
	<link  rel="icon"   href="icon.png" type="image/png" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
	<!--CSS-->
	<link href="estilo.css" rel="stylesheet" type="text/css">
	<!--JS-->
	<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<script src="java.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700i" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/3.0.2/vue.cjs.js"> </script>
</head>

<?php

//metodo post - envio del pin
	$pin = $_GET['pin'];
	//echo gettype($pin);
	//echo "<br>";
	//$token = $_GET['token'];

	// variables de sesion
	$_SESSION["pin"] = $pin;
	//$_SESSION["token"] = $token;

	$numpin = intval($pin);

    $url = 'https://ai-store-api.herokuapp.com/auth/?pin='.$numpin;

    //inicializamos el objeto CUrl
    $ch = curl_init();

    //Indicamos que nuestra petición sera Post
    curl_setopt($ch, CURLOPT_URL, $url);

    //para que la peticion no imprima el resultado como un echo comun, y podamos manipularlo
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	/*$headers = [
		'Content-Type: Content-Type: application/json; charset=utf-8',
		'x-access-token: '.$token
	];
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	//print_r($headers);
	*/

    //Ejecutamos la petición
    $result = curl_exec($ch);

    // cerramos la sesión cURL
    curl_close ($ch);

    // hacemos lo que queramos con los datos recibidos
    $manage = json_decode($result, true);
	//print_r($result);

	$cantidad = $manage["store"]["peopleInside"];
	$_SESSION["cantidad"]=$cantidad;

?>

<body>
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
			<!--<li><a href="configuration.php">CONFIGURACIÓN</a></li>-->
			<li><a href= "index.php">SALIR</a></li>

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

<div class="alinear">
					<div class="convertor-card">
					        <div class="base">
					            <span class="valueCont">
									<?php
										echo $cantidad;
									?>	
									<script>
										if( <?php echo $cantidad; ?> ==50){
											colorSemaforo=0; //rojo
										}
										else if( <?php echo $cantidad; ?> <50 &&  <?php echo $cantidad; ?> >35){
											colorSemaforo=1; //amarillo
										}
										else if( <?php echo $cantidad; ?> <=35){
											colorSemaforo=2; //verde
	}
									</script>
									
								</span>
											<br>
											<i class="fas fa-walking" style="font-size:150px;padding-top:0px;padding-bottom: 20px;float:left;"></i>
											
							</div>

					        <div class="converted">
								<span class="valueDate" id="hora" style="float:right;"></span>
					        </div>
					</div>

					<div id= app class="semaforo">
									<div class="rojo">
										<script>
											if(colorSemaforo!=0){
												document.write("<style> .rojo{opacity:.05;} </style>");
											}
										</script>
									</div>
									<div class="amarillo">
										<script>
											if(colorSemaforo!=1){
												document.write("<style> .amarillo{opacity:.05;} </style>");
											}
										</script>
									</div>
									<div class="verde">
										<script>
											if(colorSemaforo!=2){
												document.write("<style> .verde{opacity:.05;} </style>");
											}
										</script>
									</div>
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
		location.reload();
	}, 10000);

	window.onload = function(){
		var contenedor = document.getElementById('contenedor_carga');
		contenedor.style.visibility = "hidden";
		contenedor.style.opacity="0";
	}
</script>
</body>
</html>
