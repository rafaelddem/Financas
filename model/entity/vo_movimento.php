<?php
	class VO_Movimento{
	
		private $codigo, $nome, $data, $valor, $tipo, $pessoa, $tipoPagamento, $dataPagamento, $descricao;
		
		public function __construct($nome, $data, $valor, $tipo, $pessoa, $tipoPagamento, $dataPagamento, $descricao){
			date_default_timezone_set('America/Sao_Paulo');
			if(strlen($nome) >= 3){
				$this -> nome = $nome;
			}else{
				throw new Exception(strlen($nome)."O campo nome precisa conter mais de 3 caracteres\n");
			}
			$dataAux = explode("-",$data);
			if(!empty($data) and checkdate($dataAux[1], $dataAux[2], $dataAux[0])){
				$this -> data = $data;
			}else{
				throw new Exception("A data do movimento não é válida\n");
			}
			if(is_numeric($valor)){
				$this -> valor = $valor;
			}else{
				throw new Exception("O valor precisa ser um valor numérico\n");
			}
			if(!empty($tipo) and method_exists($tipo , 'getTipoObjeto') and ($tipo -> getTipoObjeto() == "Objeto Tipo Movimento")){
				$this -> tipo = $tipo;
			}else{
				throw new Exception("Erro ao salvar\alterar o Tipo de Movimento\nFavor informar ao suporte");
			}
			if(!empty($pessoa) and method_exists($pessoa , 'getTipoObjeto') and ($pessoa -> getTipoObjeto() == "Objeto Pessoa")){
				$this -> pessoa = $pessoa;
			}else{
				throw new Exception("Erro ao salvar\alterar a Pessoa\nFavor informar ao suporte");
			}
			$this -> tipoPagamento = $tipoPagamento;
			$this -> dataPagamento = $dataPagamento;
			$this -> descricao = $descricao;
		}
		
		public function getCodigo(){
			return $this -> codigo;
		}
		
		public function setCodigo($codigo){
			if(is_numeric($codigo)){
				$this -> codigo = $codigo;
			}else{
				throw new Exception("Código precisa ser um valor numérico\n");
			}
		}
		
		public function getNome(){
			return $this -> nome;
		}
		
		public function setNome($nome){
			if(strlen($valor) >= 3){
				$this -> nome = $nome;
			}else{
				throw new Exception("O campo nome precisa conter mais de 3 caracteres\n");
			}
		}
		
		public function getData(){
			return $this -> data;
		}
		
		public function setData($data){
			if(checkdate(date_format(new DateTime($data), 'm'), date_format(new DateTime($data), 'd'), date_format(new DateTime($data), 'Y'))){
				$this -> data = $data;
			}else{
				throw new Exception("A data do movimento não é válida\n");
			}
		}
		
		public function getValor(){
			return $this -> valor;
		}
		
		public function setValor($valor){
			if(is_numeric($valor)){
				$this -> valor = $valor;
			}else{
				throw new Exception("O valor precisa ser um valor numérico\n");
			}
		}
		
		public function getTipo(){
			return $this -> tipo;
		}
		
		public function setTipo($tipo){
			if(!empty($tipo) and method_exists($tipo , 'getTipoObjeto') and ($tipo -> getTipoObjeto() == "Objeto Tipo Movimento")){
				$this -> tipo = $tipo;
			}else{
				throw new Exception("Erro ao salvar\alterar o Tipo de Movimento\nFavor informar ao suporte");
			}
		}
		
		public function getPessoa(){
			return $this -> pessoa;
		}
		
		public function setPessoa($pessoa){
			if(!empty($pessoa) and method_exists($pessoa , 'getTipoObjeto') and ($pessoa -> getTipoObjeto() == "Objeto Pessoa")){
				$this -> pessoa = $pessoa;
			}else{
				throw new Exception("Erro ao salvar\alterar a Pessoa\nFavor informar ao suporte");
			}
		}
		
		public function getTipoPagamento(){
			return $this -> tipoPagamento;
		}
		
		public function setTipoPagamento($tipoPagamento){
			if(!empty($tipoPagamento)/* and (strtolower($tipoPagamento) == 'n' strtolower($tipoPagamento) == 's')*/){
				$this -> tipoPagamento = $tipoPagamento;
			}else{
				throw new Exception("Erro ao salvar\alterar o tipo de pagamento\nFavor informar ao suporte");
			}
		}
		
		public function getDataPagamento(){
			return $this -> dataPagamento;
		}
		
		public function setDataPagamento($dataPagamento){
			if(checkdate(date_format(new DateTime($dataPagamento), 'm'), date_format(new DateTime($dataPagamento), 'd'), date_format(new DateTime($dataPagamento), 'Y'))){
				$this -> dataPagamento = $dataPagamento;
			}else{
				throw new Exception("A data de pagamento não é válida\n");
			}
		}
		
		public function getDescricao(){
			return $this -> descricao;
		}
		
		public function setDescricao($descricao){
			$this -> descricao = $descricao;
		}
		
	}
?>