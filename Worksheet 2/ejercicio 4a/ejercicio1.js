function comprobarDisponibilidad() {
	var xhttp = new XMLHttpRequest();

	xhttp.onreadystatechange = function() {
		var div = document.getElementById("resultado");
		if (this.readyState < 4) {
			div.innerHTML = "Cargando...";
		}
		else if (this.readyState == 4 && this.status == 200) {
			var xml = this.responseXML;
			div.innerHTML = xml.getElementsByTagName("comprobacion")[0].innerHTML + "<br/>";
    	}
	};

	xhttp.open("POST", "formulario.php", true);
	xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  	xhttp.send("usuario=" + document.getElementById("usuario").value);
}

window.onload = function(){
	document.getElementById("comprobar").onclick = function(){
		comprobarDisponibilidad();
	};
};