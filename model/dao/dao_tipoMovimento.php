<?php
	include_once '..\model\dao\conection.php';
	include_once '..\model\entity\tipoMovimento.php';
	
	class dao_carteira {
		
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
				$ativo = $tipoMovimento->getAtivo() == true;
				$stmt->bindParam(':nome', $param1,PDO::PARAM_STR);
				$stmt->bindParam(':tipo', $param2,PDO::PARAM_INT);
				$stmt->bindParam(':indispensavel', $param3,PDO::PARAM_INT);
				$stmt->bindParam(':descricao', $param4,PDO::PARAM_STR);
				$stmt->bindParam(':ativo', $param4,PDO::PARAM_INT);

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
		
		/**/
//		create table financas.tbfi_tipoMovimento (
//			int_codigo, str_nome, chr_tipo, int_indispensavel, str_descricao, chr_ativo
//		
//		create table financas.tbfi_tipoMovimento (
//			int_codigo int(5) not null auto_increment, 
//			str_nome varchar(45) not null, 
//			chr_tipo char(1) not null, 							/* 1-positivo, 2-negativo, 3-transferencia*/
//			int_indispensavel int(1) default 0, 
//			str_descricao varchar(255) default null, 
//			chr_ativo char(1) not null,						/* 0-inativa, 1-ativa */
//			primary key (int_codigo)
//		);
		/**/
		
/*		public function atualizar($carteira) {
			$conexao = new conection();
			$pdo = $conexao -> criaPDO();
			$pdo -> beginTransaction();
			
			if ($carteira instanceof Carteira) {
				$sql = "update tbfi_carteira set ";
				$nome = $carteira->getNome();
				if (isset($nome)) {
					$sql .= "str_nome = :nome, ";
				}
				$tipo = $carteira->getTipo();
				if (isset($tipo)) {
					$sql .= "chr_tipo = :tipo, ";
				}
				$dono = $carteira->getDono();
				if (isset($dono)) {
					$sql .= "chr_dono = :dono, ";
				}
				$ativo = $carteira->getAtivo() == true;
				if ($ativo) {
					$sql .= "chr_ativo = :ativo, ";
				}
				$sql = substr($sql, 0, -2)." where int_codigo = :codigo;";
				$stmt = $pdo->prepare($sql);
				$codigo = $carteira->getCodigo();
				if (isset($nome)) $stmt->bindParam(':nome', $nome,PDO::PARAM_STR);
				if (isset($tipo)) $stmt->bindParam(':tipo', $tipo,PDO::PARAM_INT);
				if (isset($dono)) $stmt->bindParam(':dono', $dono,PDO::PARAM_INT);
				if ($ativo) $stmt->bindParam(':ativo', $ativo,PDO::PARAM_INT);
				$stmt->bindParam(':codigo', $codigo,PDO::PARAM_INT);
				if (!$stmt->execute()) {
					$pdo->rollback();
					throw new Exception("Erro interno ao sistema, ao atualizar um objeto 'carteira', necessário informar ao responsável pelo sistema.", 10);
				}
				
				$pdo->commit();
				return "Objeto 'Carteira' atualizado com sucesso.";
			} else {
				throw new Exception("Erro interno ao sistema, ao atualizar um objeto 'carteira', necessário informar ao responsável pelo sistema.", 9);
			}
		}
		
		public function pesquisar($carteira) {
			$conexao = new conection();
			$pdo = $conexao -> criaPDO();
			$pdo -> beginTransaction();
			
			if ($carteira instanceof Carteira) {
				$sql = "select * from financas.tbfi_carteira where ";
				$codigo = $carteira->getCodigo();
				if (isset($codigo)) {
					$sql .= "int_codigo = :codigo and ";
				}
				$nome = "%".$carteira->getNome()."%";
				if (isset($nome)) {
					$sql .= "str_nome like :nome and ";
				}
				$tipo = $carteira->getTipo();
				if (isset($tipo)) {
					$sql .= "chr_tipo = :tipo and ";
				}
				$dono = $carteira->getDono();
				if (isset($dono)) {
					$sql .= "chr_dono = :dono and ";
				}
				$ativo = $carteira->getAtivo() == true;
				if ($ativo) {
					$sql .= "chr_ativo = :ativo and ";
				}
				$sql = substr($sql, 0, -4).";";
				$stmt = $pdo->prepare($sql);
				if (isset($codigo)) $stmt->bindParam(':codigo', $codigo,PDO::PARAM_INT);
				if (isset($nome)) $stmt->bindParam(':nome', $nome,PDO::PARAM_STR);
				if (isset($tipo)) $stmt->bindParam(':tipo', $tipo,PDO::PARAM_INT);
				if (isset($dono)) $stmt->bindParam(':dono', $dono,PDO::PARAM_INT);
				if ($ativo) $stmt->bindParam(':ativo', $ativo,PDO::PARAM_INT);
				
				if($stmt->execute()){
					if($stmt->rowCount() > 0){
						$carteiras = array();
						while($row = $stmt->fetch(PDO::FETCH_OBJ)){
							$parametros = array("codigo" => $row->int_codigo, "nome" => $row->str_nome, "tipo" => $row->chr_tipo, "dono" => $row->chr_dono, "ativo" => boolval($row->chr_ativo));
							$carteira = new Carteira($parametros);
							array_push($carteiras, $carteira);
						}
						return $carteiras;
					} else {
						$pdo->rollback();
						$retorno  = "Não há registro para os filtros pesquisados.";
						return $retorno;
					}
				} else {
					$pdo->rollback();
					throw new Exception("Erro interno ao sistema, ao buscar o(s) objeto(s) de tipo 'carteira', necessário informar ao responsável pelo sistema.", 12);
				}
				
				$pdo->commit();
				return "Objeto 'Carteira' salvo com sucesso.";
			} else {
				throw new Exception("Erro interno ao sistema, ao ativar/inativar um objeto 'carteira', necessário informar ao responsável pelo sistema.", 11);
			}
		}*/
		
	}
	
?>