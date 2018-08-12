<?php
	include_once '..\model\dao\dao_pessoa.php';
	
	class bo_pessoa{
	
		private $dao_pessoa, $vo_pessoa;
		
		public function Salvar($nome){
			try{
				$vo_pessoa = new vo_pessoa($nome);
				$dao_pessoa = new dao_pessoa();
				$dao_pessoa -> Salvar($vo_pessoa);
				return true;
			}catch (Exception $e){
				return $e->getMessage();
			}
		}
		
		public function Alterar($codigo, $nome){
			try{
				$vo_pessoa = new vo_pessoa($nome);
				$vo_pessoa -> setCodigo($codigo);
				$dao_pessoa = new dao_pessoa();
				$dao_pessoa -> Alterar($vo_pessoa);
				return true;
			}catch (Exception $e){
				return $e->getMessage();
			}
		}
		
		public function Excluir($codigo){
			try{
				$dao_pessoa = new dao_pessoa();
				$vo_pessoa = new vo_pessoa($nome);
				$dao_pessoa -> Excluir($vo_pessoa);
				return true;
			}catch (Exception $e){
				return $e->getMessage();
			}
		}
			
		public function Pesquisar($codigo, $nome){
			$campos = array("codigo" => $codigo, "nome" => $nome);
			$dao_pessoa = new DAO_Pessoa();
			return $dao_pessoa -> Pesquisar($campos);
		}
		
	}
?>