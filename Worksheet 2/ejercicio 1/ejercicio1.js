function validarDatosGET() {
	var xhttp = new XMLHttpRequest();

	xhttp.onreadystatechange = function() {
		 if (this.readyState == 4 && this.status == 200) {
		 	var div = document.getElementById("resultado");
		 	div.innerHTML = this.responseText;
    	}
	};

	xhttp.open("GET", "formulario.php?nacimiento=" + document.getElementById("nacimiento").value + 
		"&codigo-postal=" + document.getElementById("codigo-postal").value + 
		"&telefono=" + document.getElementById("telefono").value, true);
  	xhttp.send();
}

function validarDatosPOST() {
	var xhttp = new XMLHttpRequest();

	xhttp.onreadystatechange = function() {
		 if (this.readyState == 4 && this.status == 200) {
		 	var div = document.getElementById("resultado");
		 	div.innerHTML = this.responseText;
    	}
	};

	xhttp.open("POST", "formulario.php", true);
	xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  	xhttp.send("nacimiento=" + document.getElementById("nacimiento").value + 
		"&codigo-postal=" + document.getElementById("codigo-postal").value + 
		"&telefono=" + document.getElementById("telefono").value);
}

window.onload = function(){
	document.getElementById("submit-get").onclick = function(){
		validarDatos();
	};
	document.getElementById("submit-post").onclick = function(){
		validarDatosGET();
	};
};