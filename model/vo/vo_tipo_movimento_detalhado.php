<?php
class VO_tipo_movimento_detalhado{
	
	private $codigo, $nome, $tipo_movimento;
	
	public function __construct($nome, $tipo_movimento){
		if(strlen($nome) <= 30 and strlen($nome) > 2){
			$this -> nome = $nome;
		}else{
			throw new Exception("O nome do Tipo de Movimento precisa possuir entre 3 e 30 caracteres");
		}
		if(is_numeric($saida)){
			$this -> saida = $saida;
		}else{
			throw new Exception("Erro interno, favor informe ao desenvolvedor<br>Descrição: Erro ao salvar a saída do Tipo de Movimento Detalhado");
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
	
	public function getTipoMovimento(){
		return $this -> tipo_movimento;
	}
	
	public function setTipoMovimento($tipo_movimento){
		if(is_numeric($tipo_movimento)){
			$this -> tipo_movimento = $tipo_movimento;
		}else{
			throw new Exception("Erro interno, favor informe ao desenvolvedor<br>Descrição: Erro ao salvar a saída do Tipo de Movimento Detalhado");
		}
	}
	
	public function toString(){
		$retorno  = $this -> nome;
		$retorno .= " (";
		if($this -> tipo_movimento -> getSaida() == '1'){ $retorno .= "S"; }else{ $retorno .= "E"; };
		$retorno .= ")";
		echo $retorno;
		return $retorno;
	}
	
	public function getTipoObjeto(){
		return "Objeto Tipo Movimento Detalhado";
	}
	
}
?>