<?php
	include_once '..\model\dao\dao_tipoMovimento.php';
	
	class bo_tipoMovimento {
		
		public function salvar($nome, $tipo, $indispensavel, $descricao, $ativo) {
			try{
				$parametros = array("nome" => $nome, "tipo" => $tipo, "indispensavel" => $indispensavel, "descricao" => $descricao, "ativo" => $ativo);
				$tipoMovimento = new tipoMovimento($parametros);
				$dao_tipoMovimento = new dao_tipoMovimento();
				return $dao_tipoMovimento -> salvar($tipoMovimento);
			} catch (Exception $e) {
				$retorno  = "Erro ao salvar um objeto 'Tipo de Movimento' (Código do erro: ".$e -> getCode().").<br>";
				$retorno .= $e -> getMessage();
				return $retorno;
			}
		}
		
		public function atualizar($codigo, $nome, $tipo, $indispensavel, $descricao, $ativo) {
			if (!isset($codigo)) return "É necessário que o código do objeto 'Tipo de Movimento' seja informado para a atualização.";
			if (!(isset($nome) or isset($tipo) or isset($indispensavel) or isset($descricao) or isset($ativo))) return "Não foi informado nenhum dado para atualização.";
			
			try{
				$parametros = array("codigo" => $codigo, "nome" => $nome, "tipo" => $tipo, "indispensavel" => $indispensavel, "descricao" => $descricao, "ativo" => $ativo);
				$tipoMovimento = new tipoMovimento($parametros);
				$dao_tipoMovimento = new dao_tipoMovimento();
				return $dao_tipoMovimento -> atualizar($tipoMovimento);
			} catch (Exception $e) {
				$retorno  = "Erro ao atualizar um objeto 'Tipo de Movimento' (Código do erro: ".$e -> getCode().").<br>";
				$retorno .= $e -> getMessage();
				return $retorno;
			}
		}
		
		public function buscarPorFiltro($nome, $tipo, $indispensavel, $descricao, $ativo) {
			try{
				$tipoMovimento = null;
				if (isset($nome) or isset($tipo) or isset($indispensavel) or isset($descricao) or isset($ativo)) {
					$parametros = array("nome" => $nome, "tipo" => $tipo, "indispensavel" => $indispensavel, "descricao" => $descricao, "ativo" => $ativo);
					$tipoMovimento = new tipoMovimento($parametros);
				}
				$dao_tipoMovimento = new dao_tipoMovimento();
				return $dao_tipoMovimento -> pesquisar($tipoMovimento);
			} catch (Exception $e) {
				$retorno  = "Erro ao buscar o(s) objeto(s) 'Tipo de Movimento' (Código do erro: ".$e -> getCode().").<br>";
				$retorno .= $e -> getMessage();
				return $retorno;
			}
		}
		
		public function buscarPorCodigo($codigo) {
			if (!isset($codigo)) return "É necessário que o código do objeto 'Tipo de Movimento' seja informado para a busca.";
			
			try{
				$parametros = array("codigo" => $codigo);
				$tipoMovimento = new tipoMovimento($parametros);
				$dao_tipoMovimento = new dao_tipoMovimento();
				return $dao_tipoMovimento -> pesquisar($tipoMovimento);
			} catch (Exception $e) {
				$retorno  = "Erro ao buscar o(s) objeto(s) 'Tipo de Movimento' (Código do erro: ".$e -> getCode().").<br>";
				$retorno .= $e -> getMessage();
				return $retorno;
			}
		}
		
		public function buscarAtivos() {
			try{
				$parametros = array("ativo" => true);
				$tipoMovimento = new tipoMovimento($parametros);
				$dao_tipoMovimento = new dao_tipoMovimento();
				return $dao_tipoMovimento -> pesquisar($tipoMovimento);
			} catch (Exception $e) {
				$retorno  = "Erro ao buscar o(s) objeto(s) 'Tipo de Movimento' (Código do erro: ".$e -> getCode().").<br>";
				$retorno .= $e -> getMessage();
				return $retorno;
			}
		}
		
		public function buscarInativos() {
			try{
				$parametros = array("ativo" => false);
				$tipoMovimento = new tipoMovimento($parametros);
				$dao_tipoMovimento = new dao_tipoMovimento();
				return $dao_tipoMovimento -> pesquisar($tipoMovimento);
			} catch (Exception $e) {
				$retorno  = "Erro ao buscar o(s) objeto(s) 'Tipo de Movimento' (Código do erro: ".$e -> getCode().").<br>";
				$retorno .= $e -> getMessage();
				return $retorno;
			}
		}
		
		public function ativar($codigo) {
			try{
				$tipoMovimento = new tipoMovimento(array("codigo" => $codigo, "ativo" => true));
				$dao_tipoMovimento = new dao_tipoMovimento();
				return $dao_tipoMovimento -> atualizar($tipoMovimento);
			} catch (Exception $e) {
				$retorno  = "Erro ao ativar o objeto 'Tipo de Movimento' (Código do erro: ".$e -> getCode().").<br>";
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