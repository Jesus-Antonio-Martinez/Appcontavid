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
	        <form class="more-padding" autocomplete="off" action="main.html">
				<div class="textbox">
					<i class="fas fa-lock"></i>
					<input type="password" placeholder="PIN">
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
