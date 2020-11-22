function horas() {
	let h = new Date();
	document.getElementById('hora').innerHTML = h.getHours() + ":" + h.getMinutes();
}

function dias(){
	let d = new Date();
	var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
	document.getElementById('fecha').innerHTML = d.getDate() + " de " + meses[d.getMonth()] + " del " + d.getFullYear();
}

function drawShape(ctx, xoff, yoff) {
	ctx.beginPath();
	ctx.moveTo(0 + xoff, 74 + yoff);
	ctx.bezierCurveTo(-11 + xoff, 84 + yoff, 27 + xoff, 32 + yoff, 56 + xoff, 31 + yoff);
	ctx.bezierCurveTo(71 + xoff, 30 + yoff, 81 + xoff, 56 + yoff, 96 + xoff, 56 + yoff);
	ctx.bezierCurveTo(111 + xoff, 56 + yoff, 131 + xoff, 3 + yoff, 152 + xoff, 8 + yoff);
	ctx.bezierCurveTo(167 + xoff, 11 + yoff, 188 + xoff, 35 + yoff, 212 + xoff, 35 + yoff);
	ctx.bezierCurveTo(225 + xoff, 35 + yoff, 243 + xoff, 16 + yoff, 258 + xoff, 18 + yoff);
	ctx.bezierCurveTo(273 + xoff, 20 + yoff, 295 + xoff, 43 + yoff, 327 + xoff, 4 + yoff);
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
  alert("Comunicate con el adminitrador.");
}

function semaforo (){

}

window.addEventListener('load', horas);
window.addEventListener('load', dias);
window.addEventListener('load', grafica);
