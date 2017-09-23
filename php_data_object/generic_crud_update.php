<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>

	<?php 
		require('_app/Config.inc.php');

		$Update = new Update;
		$Dados = ['agent_name' => 'Opera', 'agent_views' => '23'];

		$Update->ExeUpdate('ws_siteviews_agent', $Dados, 'WHERE agent_id = :agent_id', 'agent_id=3');

		$Update->setPlaces('agent_id=2');
		$Update->setPlaces('agent_id=4');
		$Update->setPlaces('agent_id=5');

		print_r($Update);



	 ?>
	
</body>
</html>