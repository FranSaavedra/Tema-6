<?php
	if ($_POST) {
		header("Content-type: text/xml");
		$xml = "<comprobacion>";
		if (isset($_POST["usuario"])) {
			$disponible = rand(0,1);
			$xml .= "<usuario>";
			if ($disponible) {
				$xml .= "El nombre de usuario [" . $_POST["usuario"] . "] está disponible.";
				$xml .= "</usuario>";
			}else{
				$alternativas = [rand(0,10),"-","_"];
				$xml .= "El nombre de usuario [" . $_POST["usuario"] . "] no está disponible.";
				$xml .= "</usuario>";
				$xml .= "<alternativas>";
				$xml .= $_POST["usuario"] . $alternativas[0] . "<br/>";
				$xml .= $_POST["usuario"] . $alternativas[1]. $alternativas[0] . "<br/>";
				$xml .= $_POST["usuario"] . $alternativas[2]. $alternativas[0] . "<br/>";
				$xml .= "</alternativas>";
			}
		}

		$xml .= "</comprobacion>";
		echo $xml;
	}
?>