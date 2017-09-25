<?php 

	class Delete extends Conn {
		private $Termos;
		private $Places;
		private $Delete;
		private $Tabela;
		private $Conn;
		private $Result;


		public function ExeDelete($Tabela, $Termos, $ParseString) {
			$this->Tabela = (String) $Tabela;
			$this->Termos = (String) $Termos;

			parse_str($ParseString, $this->Places);
			$this->getSyntax();
			$this->Execute();
		}

		public function Result() {
			return $this->Result;
		}

		public function getRowCount() {
			return $this->Delete->rowCount();
		}

		public function setPlaces($ParseString) {
			parse_str($ParseString, $this->Places);
			$this->getSyntax();
			$this->Execute();
		}

		private function Connect() {
			$this->Conn = parent::getConn();
			$this->Delete = $this->Conn->prepare($this->Delete);
		}

		private function getSyntax() {
			$this->Delete = "DELETE FROM {$this->Tabela} {$this->Termos}";
		}

		private function Execute() {
			$this->Connect();
			try {
				$this->Delete->execute($this->Places);
				$this->Result = true;
			} catch (PDOException $e) {
				$this->Result = null;
				WSErro("<b>Erro ao excluir:</b> {$e->getMessage()}", $e->getCode());
			}
		}


	}

 ?>