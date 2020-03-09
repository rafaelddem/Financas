<?php

	namespace rafael\financas\model\bo;

	include_once '..\autoload.php';

	use rafael\financas\model\dao\dao_formaPagamento;
	
	class bo_formaPagamento {
		
		public function salvar($nome, $ativo) {
			try{
				$parametros = array("nome" => $nome, "ativo" => $ativo);
				$formaPagamento = new formaPagamento($parametros);
				$dao_formaPagamento = new dao_formaPagamento();
				return $dao_formaPagamento -> salvar($formaPagamento);
			} catch (Exception $e) {
				$retorno  = "Erro ao salvar um objeto 'Forma de Pagamento' (Código do erro: ".$e -> getCode().").<br>";
				$retorno .= $e -> getMessage();
				return $retorno;
			}
		}
		
		public function atualizar($codigo, $nome, $ativo) {
			if (!isset($codigo)) return "É necessário que o código do objeto 'Forma de Pagamento' seja informado para a atualização.";
			if (!(isset($nome) or isset($ativo))) return "Não foi informado nenhum dado para atualização.";
			
			try{
				$parametros = array("codigo" => $codigo, "nome" => $nome, "ativo" => $ativo);
				$formaPagamento = new formaPagamento($parametros);
				$dao_formaPagamento = new dao_formaPagamento();
				return $dao_formaPagamento -> atualizar($formaPagamento);
			} catch (Exception $e) {
				$retorno  = "Erro ao atualizar um objeto 'Forma de Pagamento' (Código do erro: ".$e -> getCode().").<br>";
				$retorno .= $e -> getMessage();
				return $retorno;
			}
		}
		
		public function buscarPorFiltro($nome, $ativo) {
			try{
				$formaPagamento = null;
				if (isset($nome) or isset($ativo)) {
					$parametros = array("nome" => $nome, "ativo" => $ativo);
					$formaPagamento = new formaPagamento($parametros);
				}
				$dao_formaPagamento = new dao_formaPagamento();
				return $dao_formaPagamento -> pesquisar($formaPagamento);
			} catch (Exception $e) {
				$retorno  = "Erro ao buscar o(s) objeto(s) 'Forma de Pagamento' (Código do erro: ".$e -> getCode().").<br>";
				$retorno .= $e -> getMessage();
				return $retorno;
			}
		}
		
		public function buscarPorCodigo($codigo) {
			if (!isset($codigo)) return "É necessário que o código do objeto 'Forma de Pagamento' seja informado para a busca.";
			
			try{
				$parametros = array("codigo" => $codigo);
				$formaPagamento = new formaPagamento($parametros);
				$dao_formaPagamento = new dao_formaPagamento();
				return $dao_formaPagamento -> pesquisar($formaPagamento);
			} catch (Exception $e) {
				$retorno  = "Erro ao buscar o(s) objeto(s) 'Forma de Pagamento' (Código do erro: ".$e -> getCode().").<br>";
				$retorno .= $e -> getMessage();
				return $retorno;
			}
		}
		
		public function buscarAtivos() {
			try{
				$parametros = array("ativo" => true);
				$formaPagamento = new formaPagamento($parametros);
				$dao_formaPagamento = new dao_formaPagamento();
				return $dao_formaPagamento -> pesquisar($formaPagamento);
			} catch (Exception $e) {
				$retorno  = "Erro ao buscar o(s) objeto(s) 'Forma de Pagamento' (Código do erro: ".$e -> getCode().").<br>";
				$retorno .= $e -> getMessage();
				return $retorno;
			}
		}
		
		public function buscarInativos() {
			try{
				$parametros = array("ativo" => false);
				$formaPagamento = new formaPagamento($parametros);
				$dao_formaPagamento = new dao_formaPagamento();
				return $dao_formaPagamento -> pesquisar($formaPagamento);
			} catch (Exception $e) {
				$retorno  = "Erro ao buscar o(s) objeto(s) 'Forma de Pagamento' (Código do erro: ".$e -> getCode().").<br>";
				$retorno .= $e -> getMessage();
				return $retorno;
			}
		}
		
		public function ativar($codigo) {
			try{
				$formaPagamento = new formaPagamento(array("codigo" => $codigo, "ativo" => true));
				$dao_formaPagamento = new dao_formaPagamento();
				return $dao_formaPagamento -> atualizar($formaPagamento);
			} catch (Exception $e) {
				$retorno  = "Erro ao ativar o objeto 'Forma de Pagamento' (Código do erro: ".$e -> getCode().").<br>";
				$retorno .= $e -> getMessage();
				return $retorno;
			}
		}
		
		public function inativar($codigo) {
			try{
				$formaPagamento = new formaPagamento(array("codigo" => $codigo, "ativo" => false));
				$dao_formaPagamento = new dao_formaPagamento();
				return $dao_formaPagamento -> atualizar($formaPagamento);
			} catch (Exception $e) {
				$retorno  = "Erro ao inativar o objeto 'Forma de Pagamento' (Código do erro: ".$e -> getCode().").<br>";
				$retorno .= $e -> getMessage();
				return $retorno;
			}
		}
		
	}
	
?>