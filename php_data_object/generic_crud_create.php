<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Create</title>
</head>
<body>

	<?php 
		require('_app/Config.inc.php');
		$cadastro1 = new Create;

		$dados = ['agent_name' => 'opera', 'agent_views' => '156'];

		$cadastro1->ExeCreate('ws_siteviews_agent', $dados);

		$dados2 = ['agent_name' => 'opera2', 'agent_views' => '200'];

		$cadastro1->ExeCreate('ws_siteviews_agent', $dados2);

		if ($cadastro1->Result()) {
			echo "Cadastro feito com sucesso!";
		}
		//var_dump($cadastro1);

	 ?>
	
</body>
</html>