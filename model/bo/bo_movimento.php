<?php
	include_once '..\model\dao\dao_movimento.php';
	include_once '..\model\bo\bo_tmovimento.php';
	include_once '..\model\bo\bo_pessoa.php';
	
	class BO_Movimento{
	
		private $dao_movimento, $vo_movimento;
		private $bo_pessoa;
		private $bo_tmovimento;
		
		public function Salvar($nome, $data, $valor, $tipo, $pessoa, $cartao, $pagamento, $descricao){
			try{
				$bo_tmovimento = new bo_tmovimento();
				$tipo = $bo_tmovimento -> Pesquisar($tipo, null, null);
				$bo_pessoa = new bo_pessoa();
				$pessoa = $bo_pessoa -> Pesquisar($pessoa, null);
				$vo_movimento = new VO_movimento($nome, $data, $valor, $tipo[0], $pessoa[0], $cartao, $pagamento, $descricao);
				$dao_movimento = new DAO_movimento();
				$dao_movimento -> Salvar($vo_movimento);
			}catch (Exception $e){
				echo $e->getMessage();
			}
		}
		
		public function Alterar($codigo, $nome, $data, $valor, $tipo, $pessoa, $tipoPagamento, $dataPagamento, $descricao){
			try{
				$bo_tmovimento = new bo_tmovimento();
				$tipo = $bo_tmovimento -> Pesquisar($tipo, null, null);
				$bo_pessoa = new bo_pessoa();
				$pessoa = $bo_pessoa -> Pesquisar($pessoa, null);
				$vo_movimento = new VO_movimento($nome, $data, $valor, $tipo[0], $pessoa[0], $tipoPagamento, $dataPagamento, $descricao);
				$vo_movimento -> setCodigo($codigo);
				$dao_movimento = new DAO_movimento();
				$dao_movimento -> Alterar($vo_movimento);
			}catch (Exception $e){
				echo $e->getMessage();
			}
		}
		
		public function Excluir($codigo){
			$dao_movimento = new DAO_Movimento();
			$dao_movimento -> Excluir($codigo);
		}
			
		public function Pesquisar($codigo, $nome, $data, $valor, $tipo, $pessoa, $tipo_pagamento, $data_pagamento, $descricao){
			$campos = array("codigo" => $codigo, "nome" => $nome, "data" => $data, "valor" => $valor, "tipo" => $tipo, "pessoa" => $pessoa, "tipo_pagamento" => $tipo_pagamento, "data_pagamento" => $data_pagamento, "descricao" => $descricao);
			$dao_movimento = new DAO_Movimento();
			return $dao_movimento -> Pesquisar($campos);
		}
		
	}
?>