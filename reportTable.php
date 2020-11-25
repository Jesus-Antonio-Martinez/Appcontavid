<?php
	session_start();
	$pin = $_SESSION["pin"];


	$numpin = intval($pin);
	$urlT = 'https://ai-store-api.herokuapp.com/info/interval/?pin='.$numpin;

	//inicializamos el objeto CUrl
	$chT = curl_init($urlT);

	$fI = $_POST["fechaI"];
	$fF = $_POST["fechaF"];

	//el json simulamos una petición fecha inicial-fecha final
	$jsonData = array(
					'startingDate' => $fI,
					'endingDate' => $fF
	);

	//creamos el json a partir de nuestro arreglo
	$jsonDataEncoded = json_encode($jsonData);

	//Indicamos que nuestra petición sera Post
	curl_setopt($chT, CURLOPT_POST, 1);

	//para que la peticion no imprima el resultado como un echo comun, y podamos manipularlo
	curl_setopt($chT, CURLOPT_RETURNTRANSFER, 1);

	//Adjuntamos el json a nuestra petición
	curl_setopt($chT, CURLOPT_POSTFIELDS, $jsonDataEncoded);

	//Agregamos los encabezados del contenido
	curl_setopt($chT, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

	//Ejecutamos la petición
	$resultT = curl_exec($chT);

	// cerramos la sesión cURL
	curl_close ($chT);

	// hacemos lo que queramos con los datos recibidos
	$manageT = json_decode($resultT, true);

	//lista de items a recorrer
	$listaItems = $manageT["data"];

?>
<!DOCTYPE html>
<html>
<head>
<title>Reportes | COntaVID</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<!--Favicon-->
<link  rel="icon"   href="icon.png" type="image/png" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>

<!--JS-->
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="java.js"></script>
<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700i" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/3.0.2/vue.cjs.js"> </script>

</head>

<body>
	<!--<header class="header">
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
				<li><a href="" class="social-icon"></a></li>
				<li><a href="" class="social-icon"></a></li>
				<li><a href="" class="social-icon"></a></li>
				<li><a href="" class="social-icon"></a></li>
			</ul>
			</section>
		</nav>
	</header>-->

		<h3>REPORTE</h3>

		<?php
		 //bucle para recorrer los elementos del array
		 $j = 0;
		 for ($i = 0; $i<count($listaItems); $i++){
			 $j++;
		?>

		 <table>
		  <tr>
		   <td>ID: </td>
		   <td>
		    <?php echo $j?>
		   </td>
		  </tr>

			<tr>
		   <td>Gente entrando/saliendo: </td>
		   <td>
		    <?php echo $manageT["data"][$i]["peopleEntering"]; ?>
		   </td>
		  </tr>

			<tr>
		   <td>Gente dentro: </td>
		   <td>
		    <?php echo $manageT["data"][$i]["peopleInside"]; ?>
		   </td>
		  </tr>

			<tr>
		   <td>Dia actual: </td>
		   <td>
		    <?php echo $manageT["data"][$i]["currentDay"]; ?>
		   </td>
		  </tr>
		 </table><br/>

		<?php
		 } //cerramos bucle
		?>


</body>
</html>
