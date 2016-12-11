<?php
	if ($_POST) {
		header("Content-type: text/xml");
		$xml = "<comprobacion>";
		if (isset($_POST["usuario"])) {
			$disponible = rand(0,1);
			if ($disponible) {
				$xml .= "El nombre de usuario [" . $_POST["usuario"] . "] está disponible.";
			}else{
				$xml .= "El nombre de usuario [" . $_POST["usuario"] . "] no está disponible.";
			}
		}

		$xml .= "</comprobacion>";
		echo $xml;
	}
?>