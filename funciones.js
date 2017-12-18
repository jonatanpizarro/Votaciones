var fecha;
var manana;
var contadorOpciones=0;
var contadorBorrar=0;
var lista=[];


function createLabel(block){

	fechaManana(manana);

	var p = document.createElement("p");
	var txt_pregunta = document.createTextNode("Pregunta: ");
	p.appendChild(txt_pregunta);


	var p_pregunta = document.createElement("p");
	var label_pregunta = document.createElement("LABEL");
	label_pregunta.setAttribute("id", "pregunta");
	p_pregunta.appendChild(label_pregunta);
	var input_pregunta = document.createElement("INPUT");
	input_pregunta.setAttribute("id", "TextBox");
	input_pregunta.setAttribute("name","pregunta")
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

	var boton = document.createElement("input");
	boton.setAttribute("type" , "submit");
	boton.setAttribute("class" , "button");
	boton.setAttribute("value" , "Enviar votacion");
	boton.setAttribute("onClick" , "validaciones()");

	p_pregunta.appendChild(boton);

	var boton_respuestas = document.createElement("input");
	boton_respuestas.setAttribute("class", "button");
	boton_respuestas.setAttribute("id" , "boton_respuestas");
	boton_respuestas.setAttribute("type", "submit");
	boton_respuestas.setAttribute("value", "Crear Respuesta");
	boton_respuestas.setAttribute("onClick", "validacionRespuesta()");

	var boton_eliminar_todos = document.createElement("INPUT");
	boton_eliminar_todos.setAttribute("class", "button");
	boton_eliminar_todos.setAttribute("id", "eliminar_todos");
	boton_eliminar_todos.setAttribute("type", "submit");
	boton_eliminar_todos.setAttribute("value", "Eliminar todas las respuesta");
	boton_eliminar_todos.setAttribute("onClick", "eliminarRespuestas()");

	var form= document.createElement("form");
	form.setAttribute("action", "formulario.php");
	form.setAttribute("method","POST");
	form.appendChild(p);
	form.appendChild(p_pregunta);
	form.appendChild(p_fecha_in);
	form.appendChild(p_fecha_out);
	//form.appendChild(boton_respuestas);

	


	var padre = document.body;
	var padrediv = document.getElementById("div1");
	padre.insertBefore(form, padre.childNodes[6]);
	padrediv.appendChild(boton_respuestas);
	padrediv.appendChild(boton_eliminar_todos);
	block.disabled="true";
}

var contador_respuestas = 0;
function crearRespuesta(){
	contador_respuestas ++;
	var p_respuestas = document.createElement("p");
	p_respuestas.setAttribute("id", "P"+contador_respuestas+"");
	p_respuestas.setAttribute("class", "respuestas");
	
	var txt_respuesta = document.createTextNode("Respuesta: ");
	p_respuestas.appendChild(txt_respuesta);
	
	var label_respuesta = document.createElement("LABEL");
	label_respuesta.setAttribute("id", "label_respuesta"+contador_respuestas+"");
	label_respuesta.setAttribute("class", "label");
	
	var input_respuesta = document.createElement("INPUT");
	input_respuesta.setAttribute("id", "Respuesta"+contador_respuestas+"");
	input_respuesta.setAttribute("value", "");
	input_respuesta.setAttribute("name","respuestas[]");
	input_respuesta.setAttribute("type", "textbox");
	input_respuesta.setAttribute("required", "true");
	label_respuesta.appendChild(input_respuesta);
	
	var input_boton_respuesta = document.createElement("INPUT");
	input_boton_respuesta.setAttribute("class", "button");
	input_boton_respuesta.setAttribute("type", "submit");
	input_boton_respuesta.setAttribute("value", "X");
	input_boton_respuesta.setAttribute("id", contador_respuestas);
	input_boton_respuesta.setAttribute("onClick", "eliminarRespuesta(this)");
	p_respuestas.appendChild(label_respuesta);
	p_respuestas.appendChild(input_boton_respuesta);
	
	var subir_respuesta = document.createElement("INPUT");
	subir_respuesta.setAttribute("class", "button");
	subir_respuesta.setAttribute("type", "submit");
	subir_respuesta.setAttribute("value", "⇧");
	subir_respuesta.setAttribute("onClick", "subirRespuesta(event)");
	p_respuestas.appendChild(subir_respuesta);
	
	var bajar_respuesta = document.createElement("INPUT");
	bajar_respuesta.setAttribute("class", "button");
	bajar_respuesta.setAttribute("type", "submit");
	bajar_respuesta.setAttribute("value", "⇩");
	bajar_respuesta.setAttribute("onClick", "bajarRespuesta(event)");
	p_respuestas.appendChild(bajar_respuesta);

	var padre = document.body.childNodes[6];
	padre.appendChild(p_respuestas);
	contadorOpciones++;
	lista.push(contador_respuestas);

}

function subirRespuesta(event){
	var ctarget = event.currentTarget.parentNode;
	var cln = ctarget.cloneNode(true);
	var padre = document.body.childNodes[6];
	padre.insertBefore(cln, padre.childNodes[4]);
	ctarget.parentNode.removeChild(ctarget);
}

function bajarRespuesta(event){
	var ctarget = event.currentTarget.parentNode;
	var cln = ctarget.cloneNode(true);
	var padre = document.body.childNodes[6];
	padre.appendChild(cln);
	ctarget.parentNode.removeChild(ctarget);
}

function eliminarRespuestas(){
	for(var i = 0; i<contador_respuestas; i++){
		var class_respuesta = document.getElementsByClassName("respuestas")[0];
		class_respuesta.parentNode.removeChild(class_respuesta);	
	}
	contador_respuestas = 0;
	
}

function eliminarRespuesta(boton){
	
	contadorBorrar++;
	contadorOpciones++;
	var id_Actual = boton.id;
	var numero=1;
	//lista.delete(id_Actual);


	var contador_label=1;
	var p_respuesta = document.getElementById("P"+id_Actual);
	p_respuesta.parentNode.removeChild(p_respuesta);
	var p_s = document.getElementByClassName("label")
	for(var num=0 ; num<p_s.length; num++){
		p_s[num].innerHTML="Respuesta "+numero+": ";
		numero++;
	}
	//contador_respuestas --;
	
}

function validacionRespuesta(){
	
	var campoRespuestaExiste = document.getElementById("Respuesta"+contador_respuestas);
	if (campoRespuestaExiste!=null){
		var campoRespuesta = document.getElementById("Respuesta"+contador_respuestas).value;
		if (campoRespuesta!="") {
			crearRespuesta();
		}
	}else{
		crearRespuesta();
	}
}

function validaciones(){
	var campoPregunta = document.getElementById('TextBox').value;
	var campoFechaIni = document.getElementById('TextBox1').value;
	var campoFechaFin = document.getElementById('TextBox2').value;
	//var camporespuesta =document.getElementById('Ruespuesta1').value;


	//fechaActual();

	if((campoPregunta === '') || (campoFechaFin ==='')){
		 alert("Rellena los campos");
		
	}else{
		 //window.location.replace("formulario.php?campoPregunta="+campoPregunta) ;
		 
	}
	

	
}

function fechaManana(){
	/*fecha = new Date();
	document.write(f.getDate() + "/" + (f.getMonth() +1) + "/" + f.getFullYear());*/
	fecha=new Date();
	manana=new Date(fecha.getTime() + 24*60*60*1000);	
}

