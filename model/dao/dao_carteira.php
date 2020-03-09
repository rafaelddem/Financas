<?php

	namespace rafael\financas\model\dao;

	include_once '..\autoload.php';

	use \PDO;
	use rafael\financas\model\dao\Conection;
	use rafael\financas\model\entity\Carteira;

	class dao_carteira {
		
		public function salvar($carteira) {
			$conexao = new Conection();
			$pdo = $conexao -> criaPDO();
			$pdo -> beginTransaction();
			
			if ($carteira instanceof Carteira) {
				$stmt = $pdo->prepare("insert into tbfi_carteira (str_nome, chr_tipo, chr_dono, chr_ativo) values (:nome, :tipo, :dono, :ativo);");
				$param1 = $carteira->getNome();
				$param2 = $carteira->getTipo();
				$param3 = $carteira->getDono();
				$param4 = $carteira->getAtivo() == true;
				$stmt->bindParam(':nome', $param1,PDO::PARAM_STR);
				$stmt->bindParam(':tipo', $param2,PDO::PARAM_INT);
				$stmt->bindParam(':dono', $param3,PDO::PARAM_INT);
				$stmt->bindParam(':ativo', $param4,PDO::PARAM_INT);

				if (!$stmt->execute()) {
					$pdo->rollback();
					throw new Exception("Erro interno ao sistema, ao salvar um objeto 'carteira', necessário informar ao responsável pelo sistema.", 8);
				}
				
				$pdo->commit();
				return "Objeto 'Carteira' salvo com sucesso.";
			} else {
				throw new Exception("Erro interno ao sistema, ao salvar um objeto 'carteira', necessário informar ao responsável pelo sistema.", 7);
			}
		}
		
		public function atualizar($carteira) {
			$conexao = new Conection();
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
				$ativo = $carteira->getAtivo();
				if (isset($ativo)) {
					$sql .= "chr_ativo = :ativo, ";
				}
				$sql = substr($sql, 0, -2)." where int_codigo = :codigo;";
				$stmt = $pdo->prepare($sql);
				$codigo = $carteira->getCodigo();
				if (isset($nome)) $stmt->bindParam(':nome', $nome,PDO::PARAM_STR);
				if (isset($tipo)) $stmt->bindParam(':tipo', $tipo,PDO::PARAM_INT);
				if (isset($dono)) $stmt->bindParam(':dono', $dono,PDO::PARAM_INT);
				if (isset($ativo)) $stmt->bindParam(':ativo', $ativo,PDO::PARAM_INT);
				$stmt->bindParam(':codigo', $codigo,PDO::PARAM_INT);
				if (!$stmt->execute()) {
					$pdo->rollback();
					throw new Exception("Erro interno ao sistema, ao atualizar um objeto 'carteira', necessário informar ao responsável pelo sistema.", 10);
				}
				$count = $stmt->rowCount();
				$pdo->commit();
				$retorno  = "O comando de atualização foi executado com sucesso";
				$retorno .= ($count == 0) ? ", porém nenhum registro foi alterado." : ".";
				return $retorno;
			} else {
				throw new Exception("Erro interno ao sistema, ao atualizar um objeto 'carteira', necessário informar ao responsável pelo sistema.", 9);
			}
		}
		
		public function pesquisar($carteira) {
			$conexao = new conection();
			$pdo = $conexao -> criaPDO();
			$pdo -> beginTransaction();
			
			$stmt = "";
			if (!isset($carteira)) {
				$sql = "select * from tbfi_carteira;";
				$stmt = $pdo->prepare($sql);
			} else if ($carteira instanceof Carteira) {
				$sql = "select * from tbfi_carteira where ";
				$codigo = $carteira->getCodigo();
				if (isset($codigo)) {
					$sql .= "int_codigo = :codigo and ";
				}
				$nome = $carteira->getNome();
				if (isset($nome)) {
					$nome = "%".$nome."%";
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
				$ativo = $carteira->getAtivo();
				if (isset($ativo)) {
					$sql .= "chr_ativo = :ativo and ";
				}
				$sql = substr($sql, 0, -5).";";
				$stmt = $pdo->prepare($sql);
				if (isset($codigo)) $stmt->bindParam(':codigo', $codigo,PDO::PARAM_INT);
				if (isset($nome)) $stmt->bindParam(':nome', $nome,PDO::PARAM_STR);
				if (isset($tipo)) $stmt->bindParam(':tipo', $tipo,PDO::PARAM_INT);
				if (isset($dono)) $stmt->bindParam(':dono', $dono,PDO::PARAM_INT);
				if (isset($ativo)) $stmt->bindParam(':ativo', $ativo,PDO::PARAM_INT);
			} else {
				throw new Exception("Erro interno ao sistema, ao tentar buscar o(s) objeto(s) de tipo 'Carteira', necessário informar ao responsável pelo sistema.", 11);
			}
				
			if($stmt->execute()){
				if($stmt->rowCount() > 0){
					$carteiras = array();
					while($row = $stmt->fetch(PDO::FETCH_OBJ)){
						$parametros = array("codigo" => $row->int_codigo, "nome" => $row->str_nome, "tipo" => $row->chr_tipo, "dono" => $row->chr_dono, "ativo" => boolval($row->chr_ativo));
						$carteira = new Carteira($parametros);
						array_push($carteiras, $carteira);
					}
				} else {
					$pdo->rollback();
					$retorno  = "Não há registro para os filtros pesquisados.";
					return $retorno;
				}
			} else {
				$pdo->rollback();
				throw new Exception("Erro interno ao sistema, ao tentar buscar o(s) objeto(s) de tipo 'Carteira', necessário informar ao responsável pelo sistema.", 12);
			}
			
			$pdo->commit();
			return $carteiras;
		}
		
	}
	
?>