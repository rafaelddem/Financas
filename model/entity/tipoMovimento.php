<?php

	class tipoMovimento{
		
		private $codigo;
		private $nome;
		private $tipo;
		private $indispensavel;
		private $descricao;
		private $ativo;
		
		public function __construct($parametros){
			if (isset($parametros["codigo"])) {
				$this -> setCodigo($parametros["codigo"]);
			}
			if (isset($parametros["nome"])) {
				$this -> setNome($parametros["nome"]);
			}
			if (isset($parametros["tipo"])) {
				$this -> setTipo($parametros["tipo"]);
			}
			if (isset($parametros["indispensavel"])) {
				$this -> setDono($parametros["indispensavel"]);
			}
			$this -> setDono($parametros["descricao"]);
			if (isset($parametros["ativo"])) {
				$this -> setAtivo($parametros["ativo"]);
			}
		}
		
		public function getCodigo(){
			return $this -> codigo;
		}
		
		public function setCodigo($codigo){
			if (!is_numeric($codigo)) throw new Exception("Necessário um valor numérico como código.", 13);
			
			$this -> codigo = $codigo;
		}
		
		public function getNome() {
			return $this -> nome;
		}
		
		public function setNome($nome) {
			if(strlen($nome) < 3 or strlen($nome) >= 45) {
				throw new Exception("Necessário que o identificador do tipo de movimento tenha entre 3 e 45 caracteres.", 14);
			} else if (preg_match('/[!@#$%&*(){}$?<>:;|\/]/', $nome)) {
				throw new Exception("Não são permitidos caracteres especiais no identificador do tipo de movimento.", 15);
			}
			$this -> nome = $nome;
		}
		
		public function getTipo() {
			return $this -> tipo;
		}
		
		public function setTipo($tipo) {
			if ($tipo != 1 and $tipo != 2 and $tipo != 3) {
				throw new Exception("Identificador de 'Tipo' de carteira não aceito. Favor informar ao responsável pelo sistema.", 16);
			}
			$this -> tipo = $tipo;
		}
		
		public function getIndispensavel() {
			return $this -> indispensavel;
		}
		
		public function setIndispensavel($indispensavel) {
			if ($indispensavel != 0 and $indispensavel != 1 and $indispensavel != 2) {
				throw new Exception("Identificador de 'Indispensavel' de carteira não aceito. Favor informar ao responsável pelo sistema.", 17);
			}
			$this -> indispensavel = $indispensavel;
		}
		
		public function getDescricao() {
			return $this -> descricao;
		}
		
		public function setDescricao($descricao) {
			if (strlen($nome) > 255) {
				throw new Exception("Descrição do Tipo de Movimento, não deve possuir mais de 255 caracteres.", 18);
			}
			$this -> descricao = $descricao;
		}
		
		public function getAtivo() {
			return $this -> ativo;
		}
		
		public function setAtivo($ativo) {
			if (!is_bool($ativo)) {
				throw new Exception("Erro desconhecido ao marcar o tipo de movimento como ativo/inativo. Favor informar ao responsável pelo sistema.", 19);
			}
			$this -> ativo = $ativo;
		}
		
		public function __toString() {
			$string = "(" . $this -> codigo . ")" . $this -> nome;
			return $string;
		}
	
	}

?>