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
	//boton.setAttribute("disabled" , "true");
	p_boton.appendChild(boton);

	var form= document.createElement("form");
	form.setAttribute("action", "formulario.php");
	form.setAttribute("method","POST");
	form.appendChild(p);
	form.appendChild(p_pregunta);
	form.appendChild(p_fecha_in);
	form.appendChild(p_fecha_out);
	form.appendChild(p_boton);

	var padre = document.body;
	padre.insertBefore(form, padre.childNodes[6]);
	block.disabled="disabled";
}

function validaciones(){
	var campoPregunta = document.getElementById('TextBox').value;
	var campoFechaIni = document.getElementById('TextBox1').value;
	var campoFechaFin = document.getElementById('TextBox2').value;
	alert(campoPregunta);
	alert(campoFechaFin);
	

	//fechaActual();

	if((campoPregunta === '') || (campoFechaFin ==='')){
		 alert("Rellena los campos");
		
	}/*else if(campoFechaIni ===''){
		 		
			alert("La fecha inicial esta vacia");
			return false;
	}else if(campoFechaFin ===''){
			
			alert("La fecha final esta vacia");
			return false;
		
	}*/else{
		 window.location.replace("formulario.php?campoPregunta="+campoPregunta) ;
		 alert("aaaaaaa");
	}

	
}

function fechaManana(){
	/*fecha = new Date();
	document.write(f.getDate() + "/" + (f.getMonth() +1) + "/" + f.getFullYear());*/
	fecha=new Date();
	manana=new Date(fecha.getTime() + 24*60*60*1000);	
}
