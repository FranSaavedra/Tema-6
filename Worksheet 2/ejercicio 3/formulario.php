<?php
	if ($_GET) {
		header("Content-type: text/xml");
		$xml = "<validacion>";
		if (isset($_GET["nacimiento"])) {
			$fecha_dividida = explode("/", $_GET["nacimiento"]);
			$xml .= "<nacimiento>";
			//Mes,Dia,Año
			if (is_numeric($fecha_dividida[0]) && is_numeric($fecha_dividida[1]) && is_numeric($fecha_dividida[2]) && checkdate($fecha_dividida[1], $fecha_dividida[0], $fecha_dividida[2])) {
				$xml .= "La fecha de nacimiento [" . $_GET["nacimiento"] . "] SI es válida.";
			}else {
				$xml .= "La fecha de nacimiento [" . $_GET["nacimiento"] . "] NO es válida.";
			}
			$xml .= "</nacimiento>";
		}

		if (isset($_GET["codigo-postal"])) {
			$xml .= "<codigo-postal>";
			if (strlen($_GET["codigo-postal"]) == 5 && is_numeric($_GET["codigo-postal"])){
				$xml .= "El código postal [" . $_GET["codigo-postal"] . "] SI es correcto.";
			}else{
				$xml .= "El código postal [" . $_GET["codigo-postal"] . "] NO es correcto.";
			}
			$xml .= "</codigo-postal>";
		}

		if (isset($_GET["telefono"])) {
			$xml .= "<telefono>";
			if (strlen($_GET["telefono"]) == 9 && is_numeric($_GET["telefono"])){
				$xml .= "El teléfono [" . $_GET["telefono"] . "] SI es válido.";
			}else{
				$xml .= "El teléfono [" . $_GET["telefono"] . "] NO es válido.";
			}
			$xml .= "</telefono>";
		}
		$xml .= "</validacion>";
		echo $xml;
	}else if ($_POST) {
		header("Content-type: text/xml");
		$xml = "<validacion>";
		if (isset($_POST["nacimiento"])) {
			$fecha_dividida = explode("/", $_POST["nacimiento"]);
			$xml .= "<nacimiento>";
			//Mes,Dia,Año
			if (is_numeric($fecha_dividida[0]) && is_numeric($fecha_dividida[1]) && is_numeric($fecha_dividida[2]) && checkdate($fecha_dividida[1], $fecha_dividida[0], $fecha_dividida[2])) {
				$xml .= "La fecha de nacimiento [" . $_POST["nacimiento"] . "] SI es válida.";
			}else {
				$xml .= "La fecha de nacimiento [" . $_POST["nacimiento"] . "] NO es válida.";
			}
			$xml .= "</nacimiento>";
		}

		if (isset($_POST["codigo-postal"])) {
			$xml .= "<codigo-postal>";
			if (strlen($_POST["codigo-postal"]) == 5 && is_numeric($_POST["codigo-postal"])){
				$xml .= "El código postal [" . $_POST["codigo-postal"] . "] SI es correcto.";
			}else{
				$xml .= "El código postal [" . $_POST["codigo-postal"] . "] NO es correcto.";
			}
			$xml .= "</codigo-postal>";
		}

		if (isset($_POST["telefono"])) {
			$xml .= "<telefono>";
			if (strlen($_POST["telefono"]) == 9 && is_numeric($_POST["telefono"])){
				$xml .= "El teléfono [" . $_POST["telefono"] . "] SI es válido.";
			}else{
				$xml .= "El teléfono [" . $_POST["telefono"] . "] NO es válido.";
			}
			$xml .= "</telefono>";
		}
		$xml .= "</validacion>";
		echo $xml;
	}
?>