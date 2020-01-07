<?php
	
	class Carteira{
		
		private $codigo;
		private $nome;
		private $tipo;
		private $dono;
		private $ativo;
		
		public function __construct($parametros) {
			if (isset($parametros["codigo"])) {
				$this -> setCodigo($parametros["codigo"]);
			}
			if (isset($parametros["nome"])) {
				$this -> setNome($parametros["nome"]);
			}
			if (isset($parametros["tipo"])) {
				$this -> setTipo($parametros["tipo"]);
			}
			if (isset($parametros["dono"])) {
				$this -> setDono($parametros["dono"]);
			}
			if (isset($parametros["ativo"])) {
				$this -> setAtivo($parametros["ativo"]);
			}
		}
		
		public function getCodigo() {
			return $this -> codigo;
		}
		
		public function setCodigo($codigo) {
			if (!is_numeric($codigo)) {
				throw new Exception("Necessário um valor numérico como código.", 1);
			}
			$this -> codigo = $codigo;
		}
		
		public function getNome() {
			return $this -> nome;
		}
		
		public function setNome($nome) {
			if(strlen($nome) < 3 or strlen($nome) >= 30) {
				throw new Exception("Necessário que o identificador da carteira tenha entre 3 e 30 caracteres.", 2);
			} else if (preg_match('/[!@#$%¨&*(){}$?<>:;|\/]/', $nome)) {
				throw new Exception("Não são permitidos caracteres especiais no nome da carteira.", 3);
			}
			$this -> nome = $nome;
		}
		
		public function getTipo() {
			return $this -> tipo;
		}
		
		public function setTipo($tipo) {
			if ($tipo != 1 and $tipo != 2 and $tipo != 3) {
				throw new Exception("Identificador de \'Tipo\' de carteira não aceito. Favor informar ao responsável pelo sistema.", 4);
			}
			$this -> tipo = $tipo;
		}
		
		public function getDono() {
			return $this -> dono;
		}
		
		public function setDono($dono) {
			if ($dono != 1 and $dono != 2) {
				throw new Exception("Identificador de \'Dono\' de carteira não aceito. Favor informar ao responsável pelo sistema.", 5);
			}
			$this -> dono = $dono;
		}
		
		public function getAtivo() {
			return $this -> ativo;
		}
		
		public function setAtivo($ativo) {
			if (!is_bool($ativo)) {
				throw new Exception("Erro desconhecido ao marcar a carteira como ativa/inativa. Favor informar ao responsável pelo sistema.", 6);
			}
			$this -> ativo = $ativo;
		}
		
		public function __toString() {
			$string = "(" . $this -> codigo . ")" . $this -> nome;
			return $string;
		}

	}
	
?>