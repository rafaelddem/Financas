<?php
	include_once '..\model\dao\dao_tipo_movimento.php';
	
	class BO_tipo_movimento{
	
		private $dao_tipo_movimento, $vo_tipo_movimento;
		
		public function Salvar($nome, $saida){
			try{
				$vo_tipo_movimento = new vo_tipo_movimento($nome, $saida);
				$dao_tipo_movimento = new dao_tipo_movimento();
				$dao_tipo_movimento -> Salvar($vo_tipo_movimento);
				return true;
			}catch (Exception $e){
				return $e->getMessage();
			}
		}
		
		public function Alterar($codigo, $nome, $saida){
			try{
				$vo_tipo_movimento = new vo_tipo_movimento($nome, $saida);
				$vo_tipo_movimento -> setCodigo($codigo);
				$dao_tipo_movimento = new dao_tipo_movimento();
				$dao_tipo_movimento -> Alterar($vo_tipo_movimento);
				return true;
			}catch (Exception $e){
				return $e->getMessage();
			}
		}
		
		public function Excluir($codigo){
			$dao_tipo_movimento = new dao_tipo_movimento();
			$dao_tipo_movimento -> Excluir($codigo);
		}
			
		public function Pesquisar($codigo, $nome, $saida){
			$campos = array("codigo" => $codigo, "nome" => $nome, "saida" => $saida);
			$dao_tipo_movimento = new dao_tipo_movimento();
			return $dao_tipo_movimento -> Pesquisar($campos);
		}
		
	}
?>