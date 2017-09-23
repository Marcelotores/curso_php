<?php 

	require('_app/Config.inc.php');

	$PDO = new Conn;

	$navegador = "Firefox";
	$views = "130";

	try {

		$QRCreate = 'INSERT INTO ws_siteviews_agent(agent_name, agent_views) VALUES(?, ?)';
		$Create = $PDO->getConn()->prepare($QRCreate);

		//$Create->bindValue(1, 'Explorer', PDO::PARAM_STR);
		//$Create->bindValue(2, '20', PDO::PARAM_INT);

		$Create->bindParam(1, $navegador, PDO::PARAM_STR, 15);
		$Create->bindParam(2, $views, PDO::PARAM_INT, 5);

		//$Create->execute();

		if ($Create->rowCount()) {
			echo "{$PDO->getConn()->lastInsertId()} inserido com sucesso! ";
		}

		$QRSelect = 'SELECT * FROM ws_siteviews_agent WHERE agent_views >= :visitas';
		$Select = $PDO->getConn()->prepare($QRSelect);

		$Select->bindValue(':visitas', '20');
		$Select->execute();

		if ($Select->rowCount() >= 1) {
			echo "{$Select->rowCount()} encontrados";
			$resultado = $Select->fetchAll(PDO::FETCH_ASSOC);
			var_dump($resultado);
		}
		
	} catch (PDOException $e) {

		PHPErro($e->getCode(), $e->getMessage(), $e->getFile(), $e->getFile());

	}



 ?>