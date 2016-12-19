function obtenerTiempo() {
	var div = document.getElementById("tiempo");
	var xhttp = new XMLHttpRequest();

	xhttp.onreadystatechange = function() {
		if (this.readyState < 4) {
			div.innerHTML = "Obteniendo información del tiempo...";
		}
		else if (this.readyState == 4 && this.status == 200) {
		 	var json = JSON.parse(this.responseText);
		 	div.innerHTML = "";

	 		div.innerHTML += "Ciudad: "+ json.name + " (" + json.sys.country + ")<br/>";
	 		div.innerHTML += "Latitud: " + json.coord.lat + 
	 		" Longitud: " + json.coord.lon + "<br/>";
	 		var amanecer = new Date(json.sys.sunrise * 1000);
	 		div.innerHTML += "Amanece a las: " + amanecer.getHours() + ":" + 
	 		amanecer.getMinutes() + ":" + amanecer.getSeconds() + "<br/>";
	 		var anochecer = new Date(json.sys.sunset * 1000);
	 		div.innerHTML += "Anochece a las: " + anochecer.getHours() + ":" +
	 		anochecer.getMinutes() + ":" + anochecer.getSeconds() + "<br/>";
	 		div.innerHTML += "Predicción: " + json.weather[0].description + "<br/>";
	 		div.innerHTML += "Temperatura actual: " + json.main.temp + "ºC<br/>";
	 		div.innerHTML += "Temperatura máxima: " + json.main.temp_max + "ºC<br/>";
	 		div.innerHTML += "Temperatura mínima: " + json.main.temp_min + "ºC<br/>";
    	}
	};

	xhttp.open("GET", "http://api.openweathermap.org/data/2.5/weather?q=" + 
		document.getElementById("ciudad").value + "&appid=29c6b2bb5a7e84383312ea83b35468fc&lang=es&units=metric", true);
  	xhttp.send();
}

function obtenerTiempo5Dias() {
	var grafico = document.getElementById('curve_chart');
	var xhttp = new XMLHttpRequest();

	xhttp.onreadystatechange = function() {
		if (this.readyState < 4) {
			grafico.innerHTML = "Obteniendo información del tiempo...";
		}
		else if (this.readyState == 4 && this.status == 200) {
		 	var json = JSON.parse(this.responseText);

	        var data = new google.visualization.DataTable();
	        data.addColumn("string","Dia");
	        data.addColumn("number","Minima");
	        data.addColumn("number","Máxima");

	        var diaMarcado = "";

			for (var i = 0; i < json.list.length; i++) {
				var dia = new Date(json.list[i].dt * 1000);
				var stringDia = dia.getDate() + "/" + (dia.getMonth() + 1) + "/" + dia.getFullYear();
				if (diaMarcado != stringDia) {
					data.addRow([stringDia,json.list[i].main.temp_min,json.list[i].main.temp_max]);
					diaMarcado = stringDia;
				}
			}
	        var options = {
	          title: json.city.name,
	          curveType: 'function',
	          legend: { position: 'bottom' }
	        };

	        var chart = new google.visualization.LineChart(grafico);

	        chart.draw(data, options);
    	}
	};

	xhttp.open("GET", "http://api.openweathermap.org/data/2.5/forecast?q=" + 
		document.getElementById("ciudad").value + "&appid=29c6b2bb5a7e84383312ea83b35468fc&lang=es&units=metric", true);
  	xhttp.send();
}

window.onload = function(){
	document.getElementById("submit").onclick = function(){
		obtenerTiempo();
		google.charts.setOnLoadCallback(obtenerTiempo5Dias);
	};
	google.charts.load('current', {'packages':['corechart']});
};