<?php
	include_once '..\model\dao\conection.php';
	include_once '..\model\entity\tipoMovimento.php';
	
	class dao_tipoMovimento {
		
		public function salvar($tipoMovimento) {
			$conexao = new conection();
			$pdo = $conexao -> criaPDO();
			$pdo -> beginTransaction();
			
			if ($tipoMovimento instanceof TipoMovimento) {
				$stmt = $pdo->prepare("insert into tbfi_tipoMovimento (str_nome, chr_tipo, int_indispensavel, str_descricao, chr_ativo) values (:nome, :tipo, :indispensavel, :descricao, :ativo);");
				$nome = $tipoMovimento->getNome();
				$tipo = $tipoMovimento->getTipo();
				$indispensavel = $tipoMovimento->getIndispensavel();
				$descricao = $tipoMovimento->getDescricao();
				$ativo = $tipoMovimento->getAtivo();
				$stmt->bindParam(':nome', $nome,PDO::PARAM_STR);
				$stmt->bindParam(':tipo', $tipo,PDO::PARAM_INT);
				$stmt->bindParam(':indispensavel', $indispensavel,PDO::PARAM_INT);
				$stmt->bindParam(':descricao', $descricao,PDO::PARAM_STR);
				$stmt->bindParam(':ativo', $ativo,PDO::PARAM_INT);

				if (!$stmt->execute()) {
					$pdo->rollback();
					throw new Exception("Erro interno ao sistema, ao salvar um objeto 'Tipo de Movimento', necessário informar ao responsável pelo sistema.", 21);
				}
				
				$pdo->commit();
				return "Objeto 'Tipo de Movimento' salvo com sucesso.";
			} else {
				throw new Exception("Erro interno ao sistema, ao salvar um objeto 'Tipo de Movimento', necessário informar ao responsável pelo sistema.", 20);
			}
		}
		
		public function atualizar($tipoMovimento) {
			$conexao = new conection();
			$pdo = $conexao -> criaPDO();
			$pdo -> beginTransaction();
			
			if ($tipoMovimento instanceof TipoMovimento) {
				$sql = "update tbfi_tipoMovimento set ";
				$nome = $tipoMovimento->getNome();
				if (isset($nome)) {
					$sql .= "str_nome = :nome, ";
				}
				$tipo = $tipoMovimento->getTipo();
				if (isset($tipo)) {
					$sql .= "chr_tipo = :tipo, ";
				}
				$indispensavel = $tipoMovimento->getIndispensavel();
				if (isset($indispensavel)) {
					$sql .= "int_indispensavel = :indispensavel, ";
				}
				$descricao = $tipoMovimento->getDescricao();
				if (isset($descricao)) {
					$sql .= "str_descricao = :descricao, ";
				}
				$ativo = $tipoMovimento->getAtivo();
				if (isset($ativo)) {
					$sql .= "chr_ativo = :ativo, ";
				}
				$sql = substr($sql, 0, -2)." where int_codigo = :codigo;";
				$stmt = $pdo->prepare($sql);
				$codigo = $tipoMovimento->getCodigo();
				if (isset($nome)) $stmt->bindParam(':nome', $nome,PDO::PARAM_STR);
				if (isset($tipo)) $stmt->bindParam(':tipo', $tipo,PDO::PARAM_INT);
				if (isset($indispensavel)) $stmt->bindParam(':indispensavel', $indispensavel,PDO::PARAM_INT);
				if (isset($descricao)) $stmt->bindParam(':descricao', $descricao,PDO::PARAM_INT);
				if (isset($ativo)) $stmt->bindParam(':ativo', $ativo,PDO::PARAM_INT);
				$stmt->bindParam(':codigo', $codigo,PDO::PARAM_INT);
				if (!$stmt->execute()) {
					$pdo->rollback();
					throw new Exception("Erro interno ao sistema, ao atualizar um objeto 'Tipo de Movimento', necessário informar ao responsável pelo sistema.", 23);
				}
				$count = $stmt->rowCount();
				$pdo->commit();
				$retorno  = "O comando de atualização foi executado com sucesso";
				$retorno .= ($count == 0) ? ", porém nenhum registro foi alterado." : ".";
				return $retorno;
			} else {
				throw new Exception("Erro interno ao sistema, ao atualizar um objeto 'Tipo de Movimento', necessário informar ao responsável pelo sistema.", 22);
			}
		}
		
		public function pesquisar($tipoMovimento) {
			$conexao = new conection();
			$pdo = $conexao -> criaPDO();
			$pdo -> beginTransaction();
			
			$stmt = "";
			if (!isset($tipoMovimento)) {
				$sql = "select * from tbfi_tipoMovimento;";
				$stmt = $pdo->prepare($sql);
			} else if ($tipoMovimento instanceof TipoMovimento) {
				$sql = "select * from tbfi_tipoMovimento where ";
				$codigo = $tipoMovimento->getCodigo();
				if (isset($codigo)) {
					$sql .= "int_codigo = :codigo and ";
				}
				$nome = $tipoMovimento->getNome();
				if (isset($nome)) {
					$nome = "%".$nome."%";
					$sql .= "str_nome like :nome and ";
				}
				$tipo = $tipoMovimento->getTipo();
				if (isset($tipo)) {
					$sql .= "chr_tipo = :tipo and ";
				}
				$indispensavel = $tipoMovimento->getIndispensavel();
				if (isset($indispensavel)) {
					$sql .= "int_indispensavel = :indispensavel and ";
				}
				$descricao = $tipoMovimento->getDescricao();
				if (isset($descricao)) {
					$descricao = "%".$descricao."%";
					$sql .= "str_descricao like :descricao and ";
				}
				$ativo = $tipoMovimento->getAtivo();
				if (isset($ativo)) {
					$sql .= "chr_ativo = :ativo and ";
				}
				$sql = substr($sql, 0, -5).";";
				$stmt = $pdo->prepare($sql);
				if (isset($codigo)) $stmt->bindParam(':codigo', $codigo,PDO::PARAM_INT);
				if (isset($nome)) $stmt->bindParam(':nome', $nome,PDO::PARAM_STR);
				if (isset($tipo)) $stmt->bindParam(':tipo', $tipo,PDO::PARAM_INT);
				if (isset($indispensavel)) $stmt->bindParam(':indispensavel', $indispensavel,PDO::PARAM_INT);
				if (isset($descricao)) $stmt->bindParam(':descricao', $descricao."%",PDO::PARAM_STR);
				if (isset($ativo)) $stmt->bindParam(':ativo', $ativo,PDO::PARAM_INT);
			} else {
				throw new Exception("Erro interno ao sistema, ao tentar buscar o(s) objeto(s) de tipo 'Tipo de Movimento', necessário informar ao responsável pelo sistema.", 24);
			}
				
			if($stmt->execute()){
				if($stmt->rowCount() > 0) {
					$tiposMovimento = array();
					while($row = $stmt->fetch(PDO::FETCH_OBJ)){
						$parametros = array("codigo" => $row->int_codigo, "nome" => $row->str_nome, "tipo" => $row->chr_tipo, "indispensavel" => $row->int_indispensavel, "descricao" => $row->str_descricao, "ativo" => boolval($row->chr_ativo));
						$tipoMovimento = new tipoMovimento($parametros);
						array_push($tiposMovimento, $tipoMovimento);
					}
				} else {
					$pdo->rollback();
					$retorno  = "Não há registro para os filtros pesquisados.";
					return $retorno;
				}
			} else {
				$pdo->rollback();
				throw new Exception("Erro interno ao sistema, ao tentar buscar o(s) objeto(s) de tipo 'Tipo de Movimento', necessário informar ao responsável pelo sistema.", 25);
			}
			
			$pdo->commit();
			return $tiposMovimento;
		}
		
	}
	
?>