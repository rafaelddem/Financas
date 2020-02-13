<?php

	class formaPagamento{
		
		private $codigo;
		private $nome;
		private $ativo;
		
		public function __construct($parametros){
			if (isset($parametros["codigo"])) {
				$this -> setCodigo($parametros["codigo"]);
			}
			if (isset($parametros["nome"])) {
				$this -> setNome($parametros["nome"]);
			}
			if (isset($parametros["ativo"])) {
				$this -> setAtivo($parametros["ativo"]);
			}
		}
		
		public function getCodigo(){
			return $this -> codigo;
		}
		
		public function setCodigo($codigo){
			if (!is_numeric($codigo)) throw new Exception("Necessário um valor numérico como código.", 26);
			
			$this -> codigo = $codigo;
		}
		
		public function getNome() {
			return $this -> nome;
		}
		
		public function setNome($nome) {
			if(strlen($nome) < 3 or strlen($nome) >= 45) {
				throw new Exception("Necessário que o identificador do tipo de movimento tenha entre 3 e 45 caracteres.", 27);
			} else if (preg_match('/[!@#$%&*{}$?<>:;|\/]/', $nome)) {
				throw new Exception("Não são permitidos caracteres especiais no identificador do forma de pagamento.", 28);
			}
			$this -> nome = $nome;
		}
		
		public function getAtivo() {
			return $this -> ativo;
		}
		
		public function setAtivo($ativo) {
			if (!is_bool($ativo)) {
				throw new Exception("Erro desconhecido ao marcar o tipo de movimento como ativo/inativo. Favor informar ao responsável pelo sistema.", 29);
			}
			$this -> ativo = $ativo;
		}
		
		public function __toString() {
			$string = "(" . $this -> codigo . ")" . $this -> nome;
			return $string;
		}
	
	}

?>