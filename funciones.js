var fecha;
var manana;


function createLabel(block){

	fechaManana(manana);

	var p = document.createElement("p");
	var txt_pregunta = document.createTextNode("Pregunta: ");
	p.appendChild(txt_pregunta);


	var p_pregunta = document.createElement("p");
	var label_pregunta = document.createElement("LABEL");
	label_pregunta.setAttribute("id", "pregunta");
	p_pregunta.appendChild(label_pregunta);
	var input_pregunta = document.createElement("TEXTAREA");
	input_pregunta.setAttribute("id", "TextBox");
	input_pregunta.setAttribute("rows", "10");
	input_pregunta.setAttribute("cols", "100");
	input_pregunta.setAttribute("required", "true");
	label_pregunta.appendChild(input_pregunta);


	var p_fecha_in = document.createElement("p");
	var label_fecha_in = document.createElement("LABEL");
	var txt_fecha_in = document.createTextNode("Fecha Inicial: ");
	label_fecha_in.setAttribute("id", "fecha_in")
	label_fecha_in.appendChild(txt_fecha_in);
	p_fecha_in.appendChild(label_fecha_in);
	var input_fecha_in = document.createElement("INPUT");
	input_fecha_in.setAttribute("id", "TextBox1");
	input_fecha_in.setAttribute("type", "date");
	input_fecha_in.setAttribute("required", "true");
	input_fecha_in.setAttribute("value", manana);
	label_fecha_in.appendChild(input_fecha_in);

	var p_fecha_out = document.createElement("p");
	var label_fecha_out = document.createElement("LABEL");
	var txt_fecha_out = document.createTextNode("Fecha Final: ");
	label_fecha_out.setAttribute("id", "fecha_out")
	label_fecha_out.appendChild(txt_fecha_out);
	p_fecha_out.appendChild(label_fecha_out);
	var input_fecha_out = document.createElement("INPUT");
	input_fecha_out.setAttribute("id", "TextBox2");
	input_fecha_out.setAttribute("type", "date");
	input_fecha_out.setAttribute("required", "true");
	label_fecha_out.appendChild(input_fecha_out);

	var p_boton = document.createElement("p");
	var boton = document.createElement("input");
	boton.setAttribute("type" , "submit");
	boton.setAttribute("class" , "button");
	boton.setAttribute("value" , "Enviar votacion");
	boton.setAttribute("onClick" , "validaciones()");
	p_pregunta.appendChild(boton);

	var boton_respuestas = document.createElement("input");
	boton_respuestas.setAttribute("class", "button");
	boton_respuestas.setAttribute("id", "boton_respuesta")
	boton_respuestas.setAttribute("type", "submit");
	boton_respuestas.setAttribute("value", "Crear Respuesta");
	boton_respuestas.setAttribute("onClick", "crearRespuesta()");

	var form= document.createElement("form");
	form.setAttribute("action", "formulario.php");
	form.setAttribute("method","POST");
	form.appendChild(p);
	form.appendChild(p_pregunta);
	form.appendChild(p_fecha_in);
	form.appendChild(p_fecha_out);
	form.appendChild(p_boton);
	//form.appendChild(boton_respuestas);

	


	var padre = document.body;
	var padrediv = document.getElementById("div1");
	padre.insertBefore(form, padre.childNodes[6]);
	padrediv.appendChild(boton_respuestas);
	block.disabled="true";
}

var contador_respuestas = 0;
function crearRespuesta(){
	contador_respuestas ++;
	var p_respuestas = document.createElement("p");
	p_respuestas.setAttribute("id", "Respuesta"+contador_respuestas+"");
	var txt_respuesta = document.createTextNode("Respuesta "+contador_respuestas+":");
	p_respuestas.appendChild(txt_respuesta);
	var label_respuesta = document.createElement("LABEL");
	label_respuesta.setAttribute("id", "label_respuesta"+contador_respuestas+"");
	var input_respuesta = document.createElement("INPUT");
	input_respuesta.setAttribute("id", "Respuesta"+contador_respuestas+"");
	input_respuesta.setAttribute("type", "textbox");
	input_respuesta.setAttribute("required", "true");
	label_respuesta.appendChild(input_respuesta);
	var input_boton_respuesta = document.createElement("INPUT");
	input_boton_respuesta.setAttribute("class", "button");
	input_boton_respuesta.setAttribute("type", "submit");
	input_boton_respuesta.setAttribute("value", "X");
	input_boton_respuesta.setAttribute("id", contador_respuestas);
	input_boton_respuesta.setAttribute("onClick", "eliminarRespuesta(this)");
	var id_respuesta_actual = document.getElementById("Respuesta"+contador_respuestas+"");
	p_respuestas.appendChild(label_respuesta);
	p_respuestas.appendChild(input_boton_respuesta);
	var padre = document.body.childNodes[6];
	padre.appendChild(p_respuestas);
}

function eliminarRespuesta(boton){
	var id_Actual = boton.id;
	var p_respuesta = document.getElementById("Respuesta"+id_Actual+"");
	p_respuesta.parentNode.removeChild(p_respuesta);
	contador_respuestas --;
}

/*function validacionRespuesta(){
	if (document.getElementById("Respuesta1")){
		document.getElementById("boton_respuesta").disabled=true;
	}
	else{
		document.getElementById("boton_respuesta").disabled=false;
		crearRespuesta();
	}
}*/

function validaciones(){
	var campoPregunta = document.getElementById('TextBox').value;
	fechaActual();

	if(campoPregunta === ''){
		 alert("Pregunta vacia");
		
	}else{
		 //Las validaciones que necesitas hacer
	}

	var campoFechaIni = document.getElementById('TextBox1').value;

	if(campoFechaIni === ''){
		 alert("La fecha inicial esta vacia");
		return false;
	}else{
		 //Las validaciones que necesitas hacer
	}
}

function fechaManana(){
	/*fecha = new Date();
	document.write(f.getDate() + "/" + (f.getMonth() +1) + "/" + f.getFullYear());*/
	fecha=new Date();
	manana=new Date(fecha.getTime() + 24*60*60*1000);	
}
