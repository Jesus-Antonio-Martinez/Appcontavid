<?php/*
//phpinfo();
require 'conexion.php';
*/
?>
<!DOCTYPE html>
<html>
<head>
<title>COntaVID | ¡Bienvenido!</title>
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

</head>
<body>
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
		  <script>
		  	function registrar() {
			//alert("Comunicate con el adminitrador.");
			/*Swal.fire({
				icon: 'error',
				title: 'Oops...',
				text: 'Comunicate con el adminitrador.',
				confirmButtonText:  'VOLVER',
				confirmButtonColor: 'rgb(91,158,84)'
			})*/
			/*Swal.fire({
				title: 'YEEEEEY.',
				width: 600,
				padding: '3em',
				background: '#fff url(/images/trees.png)',
				confirmButtonColor: 'rgb(91,158,84)',
				backdrop:`
				rgba(0,0,123,0.4)
				url("/images/nyan-cat.gif")
				left top
				no-repeat
				`
			})*/
			Swal.mixin({
			input: 'text',
			confirmButtonText: 'Siguiente &rarr;',
			showCancelButton: true,
			confirmButtonColor: 'rgb(91,158,84)',
			progressSteps: ['1', '2', '3']
			})
			.queue(['Escribe tu nombre','Escribe tu correo electrónico','Escribe tu teléfono'])
			.then((result) => {
				if (result.value) {
					const answers = JSON.stringify(result.value)
				Swal.fire({
				title: '¡Perfecto!',
				html: `Hemos recibido tu información, en breve nos comunicamos contigo.`,
				confirmButtonText: 'Aceptar',
				confirmButtonColor: 'rgb(91,158,84)'
				})
			}
			})
			}
		  </script>
	    </div>
	  </div>
	 </div>
</body>
</html>
