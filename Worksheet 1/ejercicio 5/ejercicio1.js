function comprobarCorreo() {
	var div = document.getElementById("div");
	var xhttp = new XMLHttpRequest();

	xhttp.onreadystatechange = function() {
		 if (this.readyState == 4 && this.status == 200) {
		 	var xml = this.responseXML;
		 	div.innerHTML = "";
		 	var correos = xml.getElementsByTagName("correo");

		 	for (var i = 0; i < correos.length; i++) {
		 		var email = correos[i];
		 		div.innerHTML += "Correo nº. " + (i + 1) + ": <br/>";
		 		div.innerHTML += "De: " + email.getElementsByTagName("from")[0].innerHTML + "<br/>";
		 		div.innerHTML += "Para: " + email.getElementsByTagName("to")[0].innerHTML + "<br/>";
		 		div.innerHTML += "Asunto: " + email.getElementsByTagName("asunto")[0].innerHTML + "<br/>";
		 		div.innerHTML += "Cuerpo: " + email.getElementsByTagName("body")[0].innerHTML + "<br/>";
		 	}
    	}
	};

	xhttp.open("GET", "correos.xml", true);
  	xhttp.send();
}

window.onload = function(){
	setInterval(function() {
		comprobarCorreo();
	}, 10000);
};