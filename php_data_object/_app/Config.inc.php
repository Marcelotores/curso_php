<?php 

	define('HOST', 'localhost');
	define('USER', 'root');
	define('PASS', '');
	define('BANCO', 'curso_php');

	function __autoload($Classe) {
		$cDir = ['Conn'];
		$iDir = null;

		foreach ($cDir as $dirName) {
			if (!$iDir && (__DIR__ . "\\{$dirName}\\{$Classe}.class.php") && !is_dir(__DIR__ . "\\{$dirName}\\{$Classe}
				.class.php")) {
				include_once (__DIR__ . "\\{$dirName}\\{$Classe}.class.php");
				$iDir = true;
			}
		}

		if (!$iDir) {
			trigger_error("Não foi possível incluir a classe {$Classe}.class.php", E_USER_ERROR)  ;
			die;
		}
	}


	//WSErro :: Exibe erros lançados :: Front
	function WSErro($ErrMsg, $ErrNo, $ErrDie = null) {
	    $CssClass = ($ErrNo == E_USER_NOTICE ? WS_INFOR : ($ErrNo == E_USER_WARNING ? WS_ALERT : ($ErrNo == E_USER_ERROR ? WS_ERROR : $ErrNo)));
	    echo "<p class=\"trigger {$CssClass}\">{$ErrMsg}<span class=\"ajax_close\"></span></p>";

	    if ($ErrDie):
	        die;
	    endif;
	}


	//PHPErro :: personaliza o gatilho do PHP
	function PHPErro($ErrNo, $ErrMsg, $ErrFile, $ErrLine) {
	    $CssClass = ($ErrNo == E_USER_NOTICE ? WS_INFOR : ($ErrNo == E_USER_WARNING ? WS_ALERT : ($ErrNo == E_USER_ERROR ? WS_ERROR : $ErrNo)));
	    echo "<p class=\"trigger {$CssClass}\">";
	    echo "<b>Erro na Linha: #{$ErrLine} ::</b> {$ErrMsg}<br>";
	    echo "<small>{$ErrFile}</small>";
	    echo "<span class=\"ajax_close\"></span></p>";

	    if ($ErrNo == E_USER_ERROR):
	        die;
	    endif;
	}

	set_error_handler('PHPErro');


 ?>