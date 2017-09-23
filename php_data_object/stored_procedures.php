<?php 
	require('_app/Config.inc.php');

	$Conn = new Conn;

	try {

		$QRSelect = 'SELECT * FROM ws_siteviews_agent WHERE agent_name = :name';
		$Select = $Conn->getConn()->prepare($QRSelect);

		$Select->bindValue(':name', 'Firefox');
		$Select->execute();

		$valor1 = $Select->fetch(PDO::FETCH_ASSOC);

		$Select->bindValue(':name', 'Explorer');
		$Select->execute();

		$valor2 = $Select->fetch(PDO::FETCH_ASSOC);
		
	} catch (Exception $e) {
		PHPErro($e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
	}



	if ($valor1) {
		echo "{$valor1['agent_name']} retornou {$valor1['agent_views']} resultados";
	}

	echo "<hr>";
	if ($valor2) {
		echo "{$valor2['agent_name']} retornou {$valor2['agent_views']} resultados";
	}


 ?>