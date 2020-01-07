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
				$retorno  = "Erro ao salvar um objeto 'Carteira' (Código do erro: ".$e -> getCode().").<br>";
				$retorno .= $e -> getMessage();
				return $retorno;
			}
		}
		
		public function atualizar($codigo, $nome, $tipo, $dono, $ativo) {
			if (!isset($codigo)) return "É necessário que o código do objeto 'Carteira' seja informado para a atualização.";
			if (!(isset($nome) or isset($tipo) or isset($dono) or isset($ativo))) return "Não foi informado nenhum dado para atualização.";
			
			try{
				$parametros = array("codigo" => $codigo, "nome" => $nome, "tipo" => $tipo, "dono" => $dono, "ativo" => $ativo);
				$carteira = new carteira($parametros);
				$dao_carteira = new dao_carteira();
				return $dao_carteira -> atualizar($carteira);
			} catch (Exception $e) {
				$retorno  = "Erro ao atualizar um objeto 'Carteira' (Código do erro: ".$e -> getCode().").<br>";
				$retorno .= $e -> getMessage();
				return $retorno;
			}
		}
		
		public function buscarPorFiltro($nome, $tipo, $dono, $ativo) {
			try{
				$parametros = array("nome" => $nome, "tipo" => $tipo, "dono" => $dono, "ativo" => $ativo);
				$carteira = new carteira($parametros);
				$dao_carteira = new dao_carteira();
				return $dao_carteira -> pesquisar($carteira);
			} catch (Exception $e) {
				$retorno  = "Erro ao buscar o objeto 'Carteira' (Código do erro: ".$e -> getCode().").<br>";
				$retorno .= $e -> getMessage();
				return $retorno;
			}
		}
		
		public function buscarPorCodigo($codigo) {
			try{
				$parametros = array("codigo" => $codigo);
				$carteira = new carteira($parametros);
				$dao_carteira = new dao_carteira();
				return $dao_carteira -> pesquisar($carteira);
			} catch (Exception $e) {
				$retorno  = "Erro ao buscar o objeto 'Carteira' (Código do erro: ".$e -> getCode().").<br>";
				$retorno .= $e -> getMessage();
				return $retorno;
			}
		}
		
		public function buscarAtivos() {
			try{
				$parametros = array("ativo" => true);
				$carteira = new carteira($parametros);
				$dao_carteira = new dao_carteira();
				return $dao_carteira -> pesquisar($carteira);
			} catch (Exception $e) {
				$retorno  = "Erro ao buscar o objeto 'Carteira' (Código do erro: ".$e -> getCode().").<br>";
				$retorno .= $e -> getMessage();
				return $retorno;
			}
		}
		
		public function buscarInativos() {
			try{
				$parametros = array("ativo" => false);
				$carteira = new carteira($parametros);
				$dao_carteira = new dao_carteira();
				return $dao_carteira -> pesquisar($carteira);
			} catch (Exception $e) {
				$retorno  = "Erro ao buscar o objeto 'Carteira' (Código do erro: ".$e -> getCode().").<br>";
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
				$retorno  = "Erro ao ativar o objeto 'Carteira' (Código do erro: ".$e -> getCode().").<br>";
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
				$retorno  = "Erro ao inativar o objeto 'Carteira' (Código do erro: ".$e -> getCode().").<br>";
				$retorno .= $e -> getMessage();
				return $retorno;
			}
		}
		
	}
	
?>