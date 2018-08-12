<?php
	include_once '..\model\dao\dao_tipo_movimento_detalhado.php';
	
	class BO_tipo_movimento_detalhado{
	
		private $dao_tipo_movimento_detalhado_detalhado, $vo_tipo_movimento_detalhado_detalhado;
		
		public function Salvar($nome, $saida){
			try{
				$vo_tipo_movimento_detalhado = new vo_tipo_movimento_detalhado($nome, $saida);
				$dao_tipo_movimento_detalhado = new dao_tipo_movimento_detalhado();
				$dao_tipo_movimento_detalhado -> Salvar($vo_tipo_movimento_detalhado);
			}catch (Exception $e){
				echo $e->getMessage();
			}
		}
		
		public function Alterar($codigo, $nome, $saida){
			try{
				$vo_tipo_movimento_detalhado = new vo_tipo_movimento_detalhado($nome, $saida);
				$vo_tipo_movimento_detalhado -> setCodigo($codigo);
				$dao_tipo_movimento_detalhado = new dao_tipo_movimento_detalhado();
				$dao_tipo_movimento_detalhado -> Alterar($vo_tipo_movimento_detalhado);
			}catch (Exception $e){
				echo $e->getMessage();
			}
		}
		
		public function Excluir($codigo){
			$dao_tipo_movimento_detalhado = new dao_tipo_movimento_detalhado();
			$dao_tipo_movimento_detalhado -> Excluir($codigo);
		}
			
		public function Pesquisar($codigo, $nome, $saida){
			$campos = array("codigo" => $codigo, "nome" => $nome, "saida" => $saida);
			$dao_tipo_movimento_detalhado = new dao_tipo_movimento_detalhado();
			return $dao_tipo_movimento_detalhado -> Pesquisar($campos);
		}
		
	}
?>