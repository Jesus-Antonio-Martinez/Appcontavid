<!DOCTYPE html>
<html>
<head>
<title>Reportes | COntaVID</title>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/3.0.2/vue.cjs.js"> </script>

</head>
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
			<li><a href="main.php">INICIO</a></li>
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

	<div class="container">
	  <div class="welcome" id="reportes">
				<h2>REPORTES</h2>
				<br>
			  <form autocomplete="off">
					<p>FECHA INICIO</p>
					<input type="date">
					<p>FECHA FIN</p>
					<input type="date">
				</form>
	      <button class="button" onclick="imprimir()">GENERAR</button>
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
