<?php

	namespace rafael\financas\model\dao;

	use \PDO;

	class Conection{
		
		private string $banco;
		private string $servidor;
		private string $usuario;
		private string $senha;
		
		public function __construct(){
			$this -> banco = "financas";
			$this -> servidor = "127.0.0.1";
			$this -> usuario = "root";
			$this -> senha = "root";
		}
		
		public function setBanco(string $banco){
			$this -> banco = $banco;
		}
		
		public function getBanco() : string{
			return $this -> banco;
		}
		
		public function setServidor(string $banco){
			$this -> servidor = $servidor;
		}
		
		public function getServidor() : string{
			return $this -> servidor;
		}
		
		public function setUsuario(string $banco){
			$this -> usuario = $usuario;
		}
		
		public function getUsuario() : string{
			return $this -> usuario;
		}
		
		public function setSenha(string $banco){
			$this -> senha = $senha;
		}
		
		public function getSenha() : string{
			return $this -> senha;
		}
		
		public function criaPDO(){
			return new PDO("mysql:host=" . $this -> servidor . ";dbname=" . $this -> banco, $this -> usuario, $this -> senha);
		}
		
	}
?>