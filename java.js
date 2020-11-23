/*const app = new Vue ({
 
})
*/

function horas() {
	let h = new Date();
	if(h.getHours()<10){
		if(h.getMinutes()<10){
			document.getElementById('hora').innerHTML = '0' + h.getHours() + ":" + '0' + h.getMinutes();
		}
		else{
			document.getElementById('hora').innerHTML = '0' + h.getHours() + ":" + h.getMinutes();
		}
	}
	else{
		if(h.getMinutes()<10){
			document.getElementById('hora').innerHTML = h.getHours() + ":" + '0' + h.getMinutes();
		}
		else{
			document.getElementById('hora').innerHTML = h.getHours() + ":" + h.getMinutes();
		}
	}
}

function dias(){
	let d = new Date();
	var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
	document.getElementById('fecha').innerHTML = d.getDate() + " de " + meses[d.getMonth()] + " del " + d.getFullYear();
}

function drawShape(ctx, xoff, yoff) {
	ctx.beginPath();
	var random=Math.random();
	ctx.moveTo(0 + xoff, 74 + yoff);
	ctx.bezierCurveTo((random*-11) + xoff, 84 + yoff, (random*27) + xoff, (random*32) + yoff, 56 + xoff, (random*31) + yoff);
	ctx.bezierCurveTo( 71 + xoff, (random*30) + yoff, 81 + xoff, (random*56) + yoff, 96 + xoff, 56 + yoff);
	ctx.bezierCurveTo((random*111) + xoff, 56 + yoff, (random*131) + xoff, (random*3) + yoff, 152 + xoff, 8 + yoff);
	ctx.bezierCurveTo(167 + xoff, (random*11) + yoff, 188 + xoff, (random*35) + yoff, 212 + xoff, 35 + yoff);
	ctx.bezierCurveTo((random*225) + xoff, 35 + yoff, (random*243) + xoff, (random*16) + yoff, 258 + xoff, 18 + yoff);
	ctx.bezierCurveTo(273 + xoff, (random*20) + yoff, 295 + xoff, (random*43) + yoff, 327 + xoff, 4 + yoff);
	ctx.strokeStyle = '#485E3D';
	ctx.lineWidth = 1.5;
	ctx.stroke();
}

function grafica(){
	let canvas = document.getElementById('analytics');
	let ctx = canvas.getContext('2d');
	drawShape(ctx, 0, 0);
}

function registrar() {
  //alert("Comunicate con el adminitrador.");
  Swal.fire({
	icon: 'error',
	title: 'Oops...',
	text: 'Comunicate con el adminitrador.',
	confirmButtonText:  'VOLVER',
	confirmButtonColor: 'rgb(91,158,84)'
  })
}

function semaforo (){

}

window.addEventListener('load', horas);
window.addEventListener('load', dias);
window.addEventListener('load', grafica);


/**********************************************************************************************************/
/*   barra de navegacion  */
/**********************************************************************************************************/
$(function() {
	$(".navigation").click(function() {
		 $(".navigation").toggleClass('navigation-open');
	   });
 });

/**********************************************************************************************************/
/*   Ejemplo de contador  */
/**********************************************************************************************************/
/*
var aleatorio = Math.trunc(Math.random()*200);
var colorSemaforo;

	if(aleatorio==200){
		colorSemaforo=0; //rojo
	}
	else if(aleatorio<200 && aleatorio>150){
		colorSemaforo=1; //amarillo
	}
	else if(aleatorio<=150){
		colorSemaforo=2; //verde
	}
*/
/**********************************************************************************************************/
/*   Impresion de graficas  */
/**********************************************************************************************************/

	function imprimir() {
		//alert("Comunicate con el adminitrador.");
		Swal.fire({
		  icon: 'error',
		  title: 'Oops...',
		  text: 'Comunicate con el adminitrador.',
		  confirmButtonText:  'VOLVER',
		  confirmButtonColor: 'rgb(91,158,84)'
		})
	  }
	  
	  function descargar() {
		//alert("Comunicate con el adminitrador.");
		Swal.fire({
		  icon: 'error',
		  title: 'Oops...',
		  text: 'Comunicate con el adminitrador.',
		  confirmButtonText:  'VOLVER',
		  confirmButtonColor: 'rgb(91,158,84)'
		})
	  }



