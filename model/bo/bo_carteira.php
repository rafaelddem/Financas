<?php
	include_once '..\model\dao\dao_carteira.php';
	
	class bo_carteira {
		
		public function salvar($nome, $tipo, $dono, $ativo) {
			try{
				$parametros = array("nome" => $nome, "tipo" => $tipo, "dono" => $dono, "ativo" => $ativo);
				$carteira = new carteira($parametros);
				$dao_carteira = new dao_carteira();
				return $dao_carteira -> salvar($carteira);
			} catch (Exception $e) {
				$retorno  = "Erro ao salvar um objeto 'Carteira'.<br>";
				$retorno .= $e -> getMessage();
				return $retorno;
			}
		}
		
		public function atualizar($codigo, $nome, $tipo, $dono, $ativo) {
			try{
				$parametros = array("codigo" => $codigo, "nome" => $nome, "tipo" => $tipo, "dono" => $dono, "ativo" => $ativo);
				$carteira = new carteira($parametros);
				$dao_carteira = new dao_carteira();
				return $dao_carteira -> atualizar($carteira);
			} catch (Exception $e) {
				$retorno  = "Erro ao atualizar um objeto 'Carteira'.<br>";
				$retorno .= $e -> getMessage();
				return $retorno;
			}
		}
		
		public function pesquisar($codigo, $nome, $tipo, $dono, $ativo) {
			try{
				$parametros = array("codigo" => $codigo, "nome" => $nome, "tipo" => $tipo, "dono" => $dono, "ativo" => $ativo);
				$carteira = new carteira($parametros);
				$dao_carteira = new dao_carteira();
				return $dao_carteira -> pesquisar($carteira);
			} catch (Exception $e) {
				$retorno  = "Erro ao buscar o objeto 'Carteira'.<br>";
				$retorno .= $e -> getMessage();
				return $retorno;
			}
		}
		
		public function ativar($codigo) {
			try{
				$carteira = new carteira(array("codigo" => $codigo, "ativo" => true));
				$dao_carteira = new dao_carteira();
				return $dao_carteira -> atualizar($carteira);
			} catch (Exception $e) {
				$retorno  = "Erro ao ativar o objeto 'Carteira'.<br>";
				$retorno .= $e -> getMessage();
				return $retorno;
			}
		}
		
		public function inativar($codigo) {
			try{
				$carteira = new carteira(array("codigo" => $codigo, "ativo" => false));
				$dao_carteira = new dao_carteira();
				return $dao_carteira -> atualizar($carteira);
			} catch (Exception $e) {
				$retorno  = "Erro ao inativar o objeto 'Carteira'.<br>";
				$retorno .= $e -> getMessage();
				return $retorno;
			}
		}
		
	}
	
?>