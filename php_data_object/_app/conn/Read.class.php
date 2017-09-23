<?php 

	class Read extends Conn {

		private $Select;
		private $Places;
		private $Result;
		private $Read;
		private $Conn;

		public function ExeRead($Tabela, $Termos = null, $ParseString = null) {
			if (!empty($ParseString)) {
				parse_str($ParseString, $this->Places);
			}
			$this->Select = "SELECT * FROM {$Tabela} {$Termos}";
			$this->Execute();
		}

		public function Result() {
			return $this->Result;
		}

		public function getRowCount() {
			return $this->Read->rowCount();
		}

		public function setPlaces($ParseString) {
			parse_str($ParseString, $this->Places);
			$this->Execute();
		}

		public function FullRead($Query, $ParseString = null) {
			$this->Select = (string) $Query;
			if (!empty($ParseString)):
				parse_str($ParseString, $this->Places);
			endif;
			$this->Execute();
		}

		private function Connect() {
			$this->Conn = parent::getConn();
			$this->Read = $this->Conn->prepare($this->Select);
			$this->Read->setFetchMode(PDO::FETCH_ASSOC);
		}

		private function getSyntax() {
			if ($this->Places) {
				foreach ($this->Places as $vinculo => $value) {
					if ($vinculo == 'limit' || $vinculo == 'offset') {
						$value = (int) $value;
					}
					$this->Read->bindValue(":{$vinculo}", $value, (is_int($value) ? PDO::PARAM_INT : PDO::PARAM_STR));
				}
			}
		}



		private function Execute() {
			$this->Connect();
			try {
				$this->getSyntax();
				$this->Read->execute();
				$this->Result = $this->Read->fetchAll();
				
			} catch (PDOException $e) {
				$this->Result = null;
				WSErro("<b>Erro ao cadastrar:</b> {$e->getMessage()}", $e->getCode());
				
			}
		}


	}

 ?>