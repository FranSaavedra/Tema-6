<?php
	if ($_GET) {
		if (isset($_GET["nacimiento"])) {
			$fecha_dividida = explode("/", $_GET["nacimiento"]);
			//Mes,Dia,Año
			if (is_numeric($fecha_dividida[0]) && is_numeric($fecha_dividida[1]) && is_numeric($fecha_dividida[2]) && checkdate($fecha_dividida[1], $fecha_dividida[0], $fecha_dividida[2])) {
				echo "La fecha de nacimiento [" . $_GET["nacimiento"] . "] SI es válida.<br/>";
			}else {
				echo "La fecha de nacimiento [" . $_GET["nacimiento"] . "] NO es válida.<br/>";
			}
		}

		if (isset($_GET["codigo-postal"])) {
			if (strlen($_GET["codigo-postal"]) == 5 && is_numeric($_GET["codigo-postal"])){
				echo "El código postal [" . $_GET["codigo-postal"] . "] SI es correcto.<br/>";
			}else{
				echo "El código postal [" . $_GET["codigo-postal"] . "] NO es correcto.<br/>";
			}
		}

		if (isset($_GET["telefono"])) {
			if (strlen($_GET["telefono"]) == 9 && is_numeric($_GET["telefono"])){
				echo "El teléfono [" . $_GET["telefono"] . "] SI es válido.<br/>";
			}else{
				echo "El teléfono [" . $_GET["telefono"] . "] NO es válido.<br/>";
			}
		}
	}else if ($_POST) {
		if (isset($_POST["nacimiento"])) {
			$fecha_dividida = explode("/", $_POST["nacimiento"]);
			//Mes,Dia,Año
			if (is_numeric($fecha_dividida[0]) && is_numeric($fecha_dividida[1]) && is_numeric($fecha_dividida[2]) && checkdate($fecha_dividida[1], $fecha_dividida[0], $fecha_dividida[2])) {
				echo "La fecha de nacimiento [" . $_POST["nacimiento"] . "] SI es válida.<br/>";
			}else {
				echo "La fecha de nacimiento [" . $_POST["nacimiento"] . "] NO es válida.<br/>";
			}
		}

		if (isset($_POST["codigo-postal"])) {
			if (strlen($_POST["codigo-postal"]) == 5 && is_numeric($_POST["codigo-postal"])){
				echo "El código postal [" . $_POST["codigo-postal"] . "] SI es correcto.<br/>";
			}else{
				echo "El código postal [" . $_POST["codigo-postal"] . "] NO es correcto.<br/>";
			}
		}

		if (isset($_POST["telefono"])) {
			if (strlen($_POST["telefono"]) == 9 && is_numeric($_POST["telefono"])){
				echo "El teléfono [" . $_POST["telefono"] . "] SI es válido.<br/>";
			}else{
				echo "El teléfono [" . $_POST["telefono"] . "] NO es válido.<br/>";
			}
		}
	}
?>