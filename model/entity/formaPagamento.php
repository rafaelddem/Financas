<?php

	namespace rafael\financas\model\entity;

	use \Exception;

	class formaPagamento{
		
		private int $codigo;
		private String $nome;
		private bool $ativo;
		
		public function __construct(int $codigo, string $nome, bool $ativo){
			$this -> setCodigo($codigo);
			$this -> setNome($nome);
			$this -> setAtivo($ativo);
		}
		
		public function getCodigo() : int{
			return $this -> codigo;
		}
		
		public function setCodigo(int $codigo){
			$this -> codigo = $codigo;
		}
		
		public function getNome() : string{
			return $this -> nome;
		}
		
		public function setNome(string $nome) {
			if(strlen($nome) < 3 or strlen($nome) >= 45) {
				throw new Exception("Necessário que o identificador do tipo de movimento tenha entre 3 e 45 caracteres.", 27);
			} else if (preg_match('/[!@#$%&*{}$?<>:;|\/]/', $nome)) {
				throw new Exception("Não são permitidos caracteres especiais no identificador do forma de pagamento.", 28);
			}
			$this -> nome = $nome;
		}
		
		public function getAtivo() : bool {
			return $this -> ativo;
		}
		
		public function setAtivo(bool $ativo) {
			$this -> ativo = $ativo;
		}
		
		public function __toString(){
			$string = "(" . $this -> codigo . ")" . $this -> nome;
			return $string;
		}
	
	}

?>