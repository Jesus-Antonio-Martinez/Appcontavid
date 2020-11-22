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
<body>
<?php
//phpinfo();
require 'conexion.php';

//metodo post - envio del pin
$pin = $_POST['pin'];

//echo "<h1>".$pin."</h1>";


//busqueda del pin en la bd
$pinQuery = array('pin' => $pin);

$cursor = $colección->find($pinQuery);
foreach ($cursor as $doc) {
	//var_dump($doc);
}
//var_dump($cursor->toArray());

if (empty($doc)) {
    echo '<script> 
    //alert("Pin: inexistente");
    Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "Pin inexistente.",
        showConfirmButton: false
      });
      setTimeout(function(){ window.location.href="index.php"; }, 1500);
    </script>';
}
else{
	echo '<script> window.location.href="main.php";</script>';
}

?>
</body>
</html>