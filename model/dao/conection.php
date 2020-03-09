<?php

	namespace rafael\financas\model\dao;

	use \PDO;

	class Conection{
		
		private $banco, $servidor, $usuario, $senha;
		
		public function __construct(){
			$this -> banco = "financas";
			$this -> servidor = "127.0.0.1";
			$this -> usuario = "root";
			$this -> senha = "root";
		}
		
		public function setBanco(){
			$this -> banco = $banco;
		}
		
		public function getBanco(){
			return $this -> banco;
		}
		
		public function setServidor(){
			$this -> servidor = $servidor;
		}
		
		public function getServidor(){
			return $this -> servidor;
		}
		
		public function setUsuario(){
			$this -> usuario = $usuario;
		}
		
		public function getUsuario(){
			return $this -> usuario;
		}
		
		public function setSenha(){
			$this -> senha = $senha;
		}
		
		public function getSenha(){
			return $this -> senha;
		}
		
		public function criaPDO(){
			return new PDO("mysql:host=" . $this -> servidor . ";dbname=" . $this -> banco, $this -> usuario, $this -> senha);
		}
		
	}
?>