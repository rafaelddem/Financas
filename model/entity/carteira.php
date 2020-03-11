<?php
	
	namespace rafael\financas\model\entity;

	use \Exception;

	class Carteira{
		
		private int $codigo;
		private string $nome;
		private int $tipo;
		private int $dono;
		private bool $ativo;
		
		public function __construct(int $codigo, string $nome, int $tipo = 3, int $dono = 1, bool $ativo) {
			$this -> setCodigo($codigo);
			$this -> setNome($nome);
			$this -> setTipo($tipo);
			$this -> setDono($dono);
			$this -> setAtivo($ativo);
		}
		
		public function getCodigo() : int {
			return $this -> codigo;
		}
		
		public function setCodigo(int $codigo) {
			$this -> codigo = $codigo;
		}
		
		public function getNome() : string {
			return $this -> nome;
		}
		
		public function setNome(string $nome) {
			if(strlen($nome) < 3 or strlen($nome) >= 30) {
				throw new Exception("Necessário que o identificador da carteira tenha entre 3 e 30 caracteres.", 2);
			} else if (preg_match('/[!@#$%&*{}$?<>:;|\/]/', $nome)) {
				throw new Exception("Não são permitidos caracteres especiais no identificador da carteira.", 3);
			}
			$this -> nome = $nome;
		}
		
		public function getTipo() : int {
			return $this -> tipo;
		}
		
		public function setTipo(int $tipo) {
			if (!in_array($tipo, array(1, 2, 3))) {
				throw new Exception("Identificador de \'Tipo\' de carteira não aceito. Favor informar ao responsável pelo sistema.", 4);
			}
			$this -> tipo = $tipo;
		}
		
		public function getDono() : int {
			return $this -> dono;
		}
		
		public function setDono(int $dono) {
			if (!in_array($dono, array(1, 2))) {
				throw new Exception("Identificador de \'Dono\' de carteira não aceito. Favor informar ao responsável pelo sistema.", 5);
			}
			$this -> dono = $dono;
		}
		
		public function getAtivo() : bool {
			return $this -> ativo;
		}
		
		public function setAtivo(bool $ativo) {
			$this -> ativo = $ativo;
		}
		
		public function __toString() : string {
			$string = "(" . $this -> codigo . ")" . $this -> nome;
			return $string;
		}

	}
	
?>