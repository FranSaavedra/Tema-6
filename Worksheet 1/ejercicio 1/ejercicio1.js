window.onload = function(){
	var div = document.getElementById("div");
	this.boton = document.createElement("input");
	this.boton.type = "button";
	this.boton.value = "Hacer peticion AJAX";
	var that = this;
	this.boton.onclick = function() { 
	  var xhttp = new XMLHttpRequest();
	  xhttp.onreadystatechange = function() {
	    if (this.readyState == 4 && this.status == 200) {
	    	div.innerHTML = this.responseText;
	    }
	  };
	  xhttp.open("GET", "paginaAJAX/index.html", true);
	  xhttp.send();
	};
	div.appendChild(this.boton);
};