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
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
	<script src="java.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700i" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/3.0.2/vue.cjs.js"> </script>
</head>
<body>
<?php
//phpinfo();
//require 'conexion.php';

//metodo post - envio del pin
    $pin = $_POST['pin'];

    $url = 'https://ai-store-api.herokuapp.com/auth/signin';

    //inicializamos el objeto CUrl
    $ch = curl_init($url);

    //el json simulamos una petición de un login
    $jsonData = array(
            'pin' => $pin //código fijo
    );

    //creamos el json a partir de nuestro arreglo
    $jsonDataEncoded = json_encode($jsonData);

    //Indicamos que nuestra petición sera Post
    curl_setopt($ch, CURLOPT_POST, 1);

    //para que la peticion no imprima el resultado como un echo comun, y podamos manipularlo
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    //Adjuntamos el json a nuestra petición
    curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);

    //Agregamos los encabezados del contenido
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

    //ignorar el certificado, servidor de desarrollo
        //utilicen estas dos lineas si su petición es tipo https y estan en servidor de desarrollo
    //curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        //curl_setopt($process, CURLOPT_SSL_VERIFYHOST, FALSE);

    //Ejecutamos la petición
    $result = curl_exec($ch);

    // cerramos la sesión cURL
    curl_close ($ch);

    // hacemos lo que queramos con los datos recibidos
    $manage = json_decode($result, true);
    //print_r($manage);
    $auth = $manage["auth"];
    //$token = $manage["authToken"];
    
    if ($auth==true) {
        //echo '<script> window.location.href="main.php?pin='.$pin."&&token='".$token."'".'";</script>';
        echo '<script> window.location.href="main.php?pin='.$pin.'";</script>';
    }
    else{
        echo '<script>
        //alert("Pin: inexistente");
        Swal.fire({
            icon: "warning",
            title: "Ocurrio un problema",
            text: "Pin inexistente.",
            showConfirmButton: false
        });
        setTimeout(function(){ window.location.href="index.php"; }, 2000);
        </script>';
    }

?>

<div class="container">
	  <div class="welcome">
	    <div class="box">
	      <div class="signin">
	        <h1>INGRESAR</h1>
	        <form class="more-padding" autocomplete="off" action="inicio.php" method="post">
				<div class="textbox">
					<i class="fas fa-lock"></i>
					<input type="password" placeholder="PIN" name="pin">
				</div>
			    <button class="button submit">ENTRAR</button>
	        </form>
	      </div>
	    </div>
			<div class="rightbox">
	      <h2 class="title"><span>COntaVID</span></h2>
	      <img class="covid" src="https://www.megaidea.net/wp-content/uploads/2020/03/coronavirus01.png"/>
	      <p class="account">¿NO ESTAS REGISTRADO?</p>
	      <button class="button" onclick="registrar()">REGISTRARSE</button>
	    </div>
	  </div>
	 </div>
</body>
</html>
