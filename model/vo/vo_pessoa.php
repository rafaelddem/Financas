<?php
class VO_pessoa{
	
	private $codigo;
	private $nome;
	
	public function __construct($nome){
		if(strlen($nome) <= 40 and strlen($nome) > 2){
			$this -> nome = $nome;
		}else{
			throw new Exception('O nome precisa possuir entre 3 e 40 caracteres');
		}
	}
	
	public function getCodigo(){
		return $this -> codigo;
	}
	
	public function setCodigo($codigo){
		if(is_numeric($codigo)){
			$this -> codigo = $codigo;
		}else{
			throw new Exception('Código precisa ser um valor numérico');
		}
	}
	public function getNome(){
		return $this -> nome;
	}
	
	public function setNome($nome){
		if(strlen($nome) <= 40 and strlen($nome) > 2){
			$this -> nome = $nome;
		}else{
			throw new Exception('O nome precisa possuir entre 3 e 40 caracteres');
		}
	}
	
	public function getTipoObjeto(){
		return "Objeto Pessoa";
	}
	
}
?>