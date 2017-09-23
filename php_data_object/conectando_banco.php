<!DOCTYPE html>
<html lang="PT-br">
<head>
	<meta charset="UTF-8">
	<title>Conctando ao banco</title>
</head>
<body>

	<?php 
		require('_app/Config.inc.php');

		$conn = new Conn;
		//$conn->getConn();

		var_dump($conn->getConn());


	 ?>
	
</body>
</html>