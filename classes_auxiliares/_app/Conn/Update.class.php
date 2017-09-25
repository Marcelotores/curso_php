<?php 

	class Update extends Conn {

		private $Update;
		private $Places;
		private $Termos;
		private $Dados;
		private $Result;
		private $Tabela;
		private $Conn;

		public function ExeUpdate($Tabela, array $Dados, $Termos, $ParseString) {
			$this->Tabela = (string) $Tabela;
			$this->Termos = (string) $Termos;
			$this->Dados = $Dados;

			parse_str($ParseString, $this->Places);

			$this->getSyntax();
			$this->Execute();
		}

		public function Result() {
			return $this->Result;
		}

		public function getRowCount() {
			return $this->Update->rowCount();
		}

		public function setPlaces($ParseString) {
			parse_str($ParseString, $this->Places);
			$this->getSyntax();
			$this->Execute();
		}


		private function Connect() {
			$this->Conn = parent::getConn();
			$this->Update = $this->Conn->prepare($this->Update);
		}

		private function getSyntax() {
			foreach ($this->Dados as $key => $value) {
				$Places[] = $key . ' = :' . $key;				
			}
			$Places = implode(', ', $Places);
			$this->Update = "UPDATE {$this->Tabela} SET {$Places} {$this->Termos}";
		}
									

		private function Execute() {
			$this->Connect();
			try {
				$this->Update->execute(array_merge($this->Dados, $this->Places));
				$this->Result = true;
				
			} catch (PDOException $e) {
				$this->Result = null;
				WSErro("<b>Erro ao cadastrar:</b> {$e->getMessage()}", $e->getCode());
				
			}
		}


	}

 ?>