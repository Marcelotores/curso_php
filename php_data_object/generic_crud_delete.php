<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>

	<?php 

		require('_app/Config.inc.php');

		$remova = new Delete;
		$remova->ExeDelete('ws_siteviews_agent', "WHERE agent_id > :id", 'id=4');

		print_r($remova);

		$remova->setPlaces('id=2');


	 ?>
	
</body>
</html>