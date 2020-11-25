/*const app = new Vue ({

})
*/

function horas() {
	let h = new Date();
	if(h.getHours()<10){
		if(h.getMinutes()<10){
			document.getElementById('hora').innerHTML = '<i class="far fa-clock"></i> ' + ' ' + '0' + h.getHours() + ":" + '0' + h.getMinutes();
		}
		else{
			document.getElementById('hora').innerHTML = '<i class="far fa-clock"></i> ' + ' ' + '0' + h.getHours() + ":" + h.getMinutes();
		}
	}
	else{
		if(h.getMinutes()<10){
			document.getElementById('hora').innerHTML = '<i class="far fa-clock"></i> ' + ' ' + h.getHours() + ":" + '0' + h.getMinutes();
		}
		else{
			document.getElementById('hora').innerHTML = '<i class="far fa-clock"></i> ' + ' ' + h.getHours() + ":" + h.getMinutes();
		}
	}
}

function dias(){
	let d = new Date();
	var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
	document.getElementById('fecha').innerHTML = d.getDate() + " de " + meses[d.getMonth()] + " del " + d.getFullYear();
}


function semaforo (){

}

window.addEventListener('load', horas);
window.addEventListener('load', dias);


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
		/*Swal.fire({
		  icon: 'error',
		  title: 'Oops...',
		  text: 'Comunicate con el adminitrador.',
		  confirmButtonText:  'VOLVER',
		  confirmButtonColor: 'rgb(91,158,84)'
		})*/
		window.print();
	}

	function descargar() {
		//alert("Comunicate con el adminitrador.");
		/*Swal.fire({
		  icon: 'error',
		  title: 'Oops...',
		  text: 'Comunicate con el adminitrador.',
		  confirmButtonText:  'VOLVER',
		  confirmButtonColor: 'rgb(91,158,84)'
		})*/
		window.print();
	}
