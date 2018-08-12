<?php
class VO_tipo_movimento{
	
	private $codigo, $nome, $saida;
	
	public function __construct($nome, $saida){
		if(strlen($nome) <= 30 and strlen($nome) > 2){
			$this -> nome = $nome;
		}else{
			throw new Exception("O nome do Tipo de Movimento precisa possuir entre 3 e 30 caracteres");
		}
		if(is_numeric($saida) and ($saida == 1 or $saida == 2)){
			$this -> saida = $saida;
		}else{
			throw new Exception("Erro interno, favor informe ao desenvolvedor<br>Descrição: Erro ao salvar a saída do Tipo de Movimento");
		}
	}
	
	public function getCodigo(){
		return $this -> codigo;
	}
	
	public function setCodigo($codigo){
		if(is_numeric($codigo)){
			$this -> codigo = $codigo;
		}else{
			throw new Exception("Código precisa ser um valor numérico");
		}
	}
	
	public function getNome(){
		return $this -> nome;
	}
	
	public function setNome($nome){
		if(strlen($nome) <= 30 and strlen($nome) > 2){
			$this -> nome = $nome;
		}else{
			throw new Exception("O nome do Tipo de Movimento precisa possuir entre 3 e 30 caracteres");
		}
	}
	
	public function getSaida(){
		return $this -> saida;
	}
	
	public function setSaida($saida){
		if(is_numeric($saida) and ($saida == 1 or $saida == 2)){
			$this -> saida = $saida;
		}else{
			throw new Exception("Erro interno, favor informe ao desenvolvedor<br>Descrição: Erro ao salvar a saída do Tipo de Movimento");
		}
	}
	
	public function toString(){
		$retorno  = $this -> nome;
		$retorno .= " (";
		if($this -> saida == '1'){ $retorno .= "S"; }else{ $retorno .= "E"; };
		$retorno .= ")";
		echo $retorno;
		return $retorno;
	}
	
	public function getTipoObjeto(){
		return "Objeto Tipo Movimento";
	}
	
}
?>