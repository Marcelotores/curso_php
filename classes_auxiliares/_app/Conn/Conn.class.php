<?php 

	 abstract class Conn {

		private static $Host = HOST;
		private static $User = USER;
		private static $Pass = PASS;
		private static $Banco = BANCO;

		private static $Connect = null;

		private static function conectar() {
			try {
				if(self::$Connect == null) {
					$dsn = 'mysql:host=' . self::$Host . ';dbname=' . self::$Banco;
					$options = [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'];
					'mysql:host=' . self::$Host . ';dbname=' . self::$Banco;
					self::$Connect = new PDO($dsn, self::$User, self::$Pass, $options);
				}
			} catch(PDOExeption $e) {
				PHPErro($e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
				die;
			}

			self::$Connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return self::$Connect;
		}

		public static function getConn() {
			return self::conectar();
		}


	}



 ?>