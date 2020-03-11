<?php

	namespace rafael\financas\model\bo;

	include_once '..\autoload.php';

	use rafael\financas\model\entity\tipoMovimento;
	use rafael\financas\model\dao\dao_tipoMovimento;
	
	class bo_tipoMovimento {
		
		public function salvar(string $nome, int $tipo, bool $indispensavel, string $descricao = null, bool $ativo) {
			try{
				$tipoMovimento = new tipoMovimento(0, $nome, $tipo, $indispensavel, $descricao, $ativo);
				$dao_tipoMovimento = new dao_tipoMovimento();
				return $dao_tipoMovimento -> salvar($tipoMovimento);
			} catch (Exception $e) {
				$retorno  = "Erro ao salvar um objeto 'Tipo de Movimento' (Código do erro: ".$e -> getCode().").<br>";
				$retorno .= $e -> getMessage();
				return $retorno;
			}
		}
		
		public function atualizar(int $codigo, string $nome, int $tipo, bool $indispensavel, string $descricao = null, bool $ativo) {
			try{
				$tipoMovimento = new tipoMovimento($codigo, $nome, $tipo, $indispensavel, $descricao, $ativo);
				$dao_tipoMovimento = new dao_tipoMovimento();
				return $dao_tipoMovimento -> atualizar($tipoMovimento);
			} catch (Exception $e) {
				$retorno  = "Erro ao atualizar um objeto 'Tipo de Movimento' (Código do erro: ".$e -> getCode().").<br>";
				$retorno .= $e -> getMessage();
				return $retorno;
			}
		}
		
		public function buscarPorFiltro(string $nome = null, int $tipo = null, bool $indispensavel = null, string $descricao = null, bool $ativo = null) {
			try{
				$parametros = array("nome" => $nome, "tipo" => $tipo, "indispensavel" => $indispensavel, "descricao" => $descricao, "ativo" => $ativo);
				$dao_tipoMovimento = new dao_tipoMovimento();
				return $dao_tipoMovimento -> pesquisar($parametros);
			} catch (Exception $e) {
				$retorno  = "Erro ao buscar o(s) objeto(s) 'Tipo de Movimento' (Código do erro: ".$e -> getCode().").<br>";
				$retorno .= $e -> getMessage();
				return $retorno;
			}
		}
		
		public function buscarPorCodigo(int $codigo) {
			try{
				$parametros = array("codigo" => $codigo);
				$dao_tipoMovimento = new dao_tipoMovimento();
				return $dao_tipoMovimento -> pesquisar($parametros);
			} catch (Exception $e) {
				$retorno  = "Erro ao buscar o(s) objeto(s) 'Tipo de Movimento' (Código do erro: ".$e -> getCode().").<br>";
				$retorno .= $e -> getMessage();
				return $retorno;
			}
		}
		
		public function buscarAtivos() {
			try{
				$parametros = array("ativo" => true);
				$dao_tipoMovimento = new dao_tipoMovimento();
				return $dao_tipoMovimento -> pesquisar($parametros);
			} catch (Exception $e) {
				$retorno  = "Erro ao buscar o(s) objeto(s) 'Tipo de Movimento' (Código do erro: ".$e -> getCode().").<br>";
				$retorno .= $e -> getMessage();
				return $retorno;
			}
		}
		
		public function buscarInativos() {
			try{
				$parametros = array("ativo" => false);
				$dao_tipoMovimento = new dao_tipoMovimento();
				return $dao_tipoMovimento -> pesquisar($parametros);
			} catch (Exception $e) {
				$retorno  = "Erro ao buscar o(s) objeto(s) 'Tipo de Movimento' (Código do erro: ".$e -> getCode().").<br>";
				$retorno .= $e -> getMessage();
				return $retorno;
			}
		}
		
	}
	
?>