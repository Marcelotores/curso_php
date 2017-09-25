<?php 

	class Create extends Conn {
		private $Conn;
		private $Create;
		private $Result;
		private $Dados;
		private $Tabela;

		public function ExeCreate($Tabela, array $Dados) {
			$this->Tabela = (string) $Tabela;
			$this->Dados = $Dados;

			$this->getSyntax();
			$this->Execute();
		}

		public function Connect() {
			$this->Conn = parent::getConn();
			$this->Create = $this->Conn->prepare($this->Create);
		}

		public function Result() {
			return $this->Result;
		}

		private function getSyntax() {
			$Files = implode(', ', array_keys($this->Dados));
			$Places = ':' . implode(', :', array_keys($this->Dados));
			$this->Create = "INSERT INTO {$this->Tabela} ({$Files}) values ({$Places})";
		}



		private function Execute() {
			$this->Connect();
			try {
				$this->Create->execute($this->Dados);
				$this->Result = $this->Conn->LastInsertId();
			} catch (PDOException $e) {
				$this->Result = null;
				WSErro("<b>Erro ao cadastrar:</b> {$e->getMessage()}", $e->getCode());
			}
		}
		 

	}


 ?>