<?php
	session_start();
	$pin = $_SESSION["pin"];


	$numpin = intval($pin);
	$urlT = 'https://ai-store-api.herokuapp.com/info/interval/?pin='.$numpin;

	//inicializamos el objeto CUrl
	$chT = curl_init();

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
	curl_setopt($chT, CURLOPT_POST, $urlT);

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
	$manageT = json_decode($resultT);

?>
