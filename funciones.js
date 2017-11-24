function createLabel(block){
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
	input_fecha_in.setAttribute("id", "TextBox");
	input_fecha_in.setAttribute("type", "date");
	input_fecha_in.setAttribute("required", "true");
	label_fecha_in.appendChild(input_fecha_in);

	var p_fecha_out = document.createElement("p");
	var label_fecha_out = document.createElement("LABEL");
	var txt_fecha_out = document.createTextNode("Fecha Final: ");
	label_fecha_out.setAttribute("id", "fecha_out")
	label_fecha_out.appendChild(txt_fecha_out);
	p_fecha_out.appendChild(label_fecha_out);
	var input_fecha_out = document.createElement("INPUT");
	input_fecha_out.setAttribute("id", "TextBox");
	input_fecha_out.setAttribute("type", "date");
	input_fecha_out.setAttribute("required", "true");
	label_fecha_out.appendChild(input_fecha_out);

	var padre = document.body;
	padre.insertBefore(p, padre.childNodes[6]);
	padre.insertBefore(p_pregunta, padre.childNodes[7]);
	padre.insertBefore(p_fecha_in, padre.childNodes[8]);
	padre.insertBefore(p_fecha_out, padre.childNodes[9]);
	block.disabled="disabled";
}