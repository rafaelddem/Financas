<?php
	include_once '..\model\dao\conection.php';
	include_once '..\model\entity\formaPagamento.php';
	
	class dao_formaPagamento {
		
		public function salvar($formaPagamento) {
			$conexao = new conection();
			$pdo = $conexao -> criaPDO();
			$pdo -> beginTransaction();
			
			if ($formaPagamento instanceof FormaPagamento) {
				$stmt = $pdo->prepare("insert into tbfi_formaPagamento (str_nome, chr_ativo) values (:nome, :ativo);");
				$nome = $formaPagamento->getNome();
				$ativo = $formaPagamento->getAtivo();
				$stmt->bindParam(':nome', $nome,PDO::PARAM_STR);
				$stmt->bindParam(':ativo', $ativo,PDO::PARAM_INT);

				if (!$stmt->execute()) {
					$pdo->rollback();
					throw new Exception("Erro interno ao sistema, ao salvar um objeto 'Forma de Pagamento', necessário informar ao responsável pelo sistema.", 31);
				}
				
				$pdo->commit();
				return "Objeto 'Forma de Pagamento' salvo com sucesso.";
			} else {
				throw new Exception("Erro interno ao sistema, ao salvar um objeto 'Forma de Pagamento', necessário informar ao responsável pelo sistema.", 30);
			}
		}
		
		public function atualizar($formaPagamento) {
			$conexao = new conection();
			$pdo = $conexao -> criaPDO();
			$pdo -> beginTransaction();
			
			if ($formaPagamento instanceof FormaPagamento) {
				$sql = "update tbfi_formaPagamento set ";
				$nome = $formaPagamento->getNome();
				if (isset($nome)) {
					$sql .= "str_nome = :nome, ";
				}
				$ativo = $formaPagamento->getAtivo();
				if (isset($ativo)) {
					$sql .= "chr_ativo = :ativo, ";
				}
				$sql = substr($sql, 0, -2)." where int_codigo = :codigo;";
				$stmt = $pdo->prepare($sql);
				$codigo = $formaPagamento->getCodigo();
				if (isset($nome)) $stmt->bindParam(':nome', $nome,PDO::PARAM_STR);
				if (isset($ativo)) $stmt->bindParam(':ativo', $ativo,PDO::PARAM_INT);
				$stmt->bindParam(':codigo', $codigo,PDO::PARAM_INT);
				if (!$stmt->execute()) {
					$pdo->rollback();
					throw new Exception("Erro interno ao sistema, ao atualizar um objeto 'Forma de Pagamento', necessário informar ao responsável pelo sistema.", 33);
				}
				$count = $stmt->rowCount();
				$pdo->commit();
				$retorno  = "O comando de atualização foi executado com sucesso";
				$retorno .= ($count == 0) ? ", porém nenhum registro foi alterado." : ".";
				return $retorno;
			} else {
				throw new Exception("Erro interno ao sistema, ao atualizar um objeto 'Forma de Pagamento', necessário informar ao responsável pelo sistema.", 32);
			}
		}
		
		public function pesquisar($formaPagamento) {
			$conexao = new conection();
			$pdo = $conexao -> criaPDO();
			$pdo -> beginTransaction();
			
			$stmt = "";
			if (!isset($formaPagamento)) {
				$sql = "select * from tbfi_formaPagamento;";
				$stmt = $pdo->prepare($sql);
			} else if ($formaPagamento instanceof FormaPagamento) {
				$sql = "select * from tbfi_formaPagamento where ";
				$codigo = $formaPagamento->getCodigo();
				if (isset($codigo)) {
					$sql .= "int_codigo = :codigo and ";
				}
				$nome = $formaPagamento->getNome();
				if (isset($nome)) {
					$nome = "%".$nome."%";
					$sql .= "str_nome like :nome and ";
				}
				$ativo = $formaPagamento->getAtivo();
				if (isset($ativo)) {
					$sql .= "chr_ativo = :ativo and ";
				}
				$sql = substr($sql, 0, -5).";";
				$stmt = $pdo->prepare($sql);
				if (isset($codigo)) $stmt->bindParam(':codigo', $codigo,PDO::PARAM_INT);
				if (isset($nome)) $stmt->bindParam(':nome', $nome,PDO::PARAM_STR);
				if (isset($ativo)) $stmt->bindParam(':ativo', $ativo,PDO::PARAM_INT);
			} else {
				throw new Exception("Erro interno ao sistema, ao tentar buscar o(s) objeto(s) de tipo 'Forma de Pagamento', necessário informar ao responsável pelo sistema.", 24);
			}
				
			if($stmt->execute()){
				if($stmt->rowCount() > 0) {
					$formasPagamento = array();
					while($row = $stmt->fetch(PDO::FETCH_OBJ)){
						$parametros = array("codigo" => $row->int_codigo, "nome" => $row->str_nome, "ativo" => boolval($row->chr_ativo));
						$formaPagamento = new formaPagamento($parametros);
						array_push($formasPagamento, $formaPagamento);
					}
				} else {
					$pdo->rollback();
					$retorno  = "Não há registro para os filtros pesquisados.";
					return $retorno;
				}
			} else {
				$pdo->rollback();
				throw new Exception("Erro interno ao sistema, ao tentar buscar o(s) objeto(s) de tipo 'Forma de Pagamento', necessário informar ao responsável pelo sistema.", 35);
			}
			
			$pdo->commit();
			return $formasPagamento;
		}
		
	}
	
?>