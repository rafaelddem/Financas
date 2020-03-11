<?php

	namespace rafael\financas\model\dao;

	include_once '..\autoload.php';

	use \PDO;
	use rafael\financas\model\dao\Conection;
	use rafael\financas\model\entity\Carteira;

	class dao_carteira {
		
		public function salvar(carteira $carteira) {
			$conexao = new Conection();
			$pdo = $conexao -> criaPDO();
			$pdo -> beginTransaction();
			
			$stmt = $pdo->prepare("insert into tbfi_carteira (str_nome, chr_tipo, chr_dono, chr_ativo) values (:nome, :tipo, :dono, :ativo);");
			$nome = $carteira->getNome();
			$tipo = $carteira->getTipo();
			$dono = $carteira->getDono();
			$ativo = $carteira->getAtivo();
			$stmt->bindParam(':nome', $nome,PDO::PARAM_STR);
			$stmt->bindParam(':tipo', $tipo,PDO::PARAM_INT);
			$stmt->bindParam(':dono', $dono,PDO::PARAM_INT);
			$stmt->bindParam(':ativo', $ativo,PDO::PARAM_INT);
			
			if (!$stmt->execute()) {
				$pdo->rollback();
				throw new Exception("Erro interno ao sistema, ao salvar um objeto 'carteira', necessário informar ao responsável pelo sistema.", 8);
			}
			
			$pdo->commit();
			return "Objeto 'Carteira' salvo com sucesso.";
		}
		
		public function atualizar(carteira $carteira) {
			$conexao = new Conection();
			$pdo = $conexao -> criaPDO();
			$pdo -> beginTransaction();
			
			$sql = "update tbfi_carteira set str_nome = :nome, chr_tipo = :tipo, chr_dono = :dono, chr_ativo = :ativo where int_codigo = :codigo;";
			$stmt = $pdo->prepare($sql);
			$nome = $carteira->getNome();
			$tipo = $carteira->getTipo();
			$dono = $carteira->getDono();
			$ativo = $carteira->getAtivo();
			$codigo = $carteira->getCodigo();
			$stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
			$stmt->bindParam(':tipo', $tipo, PDO::PARAM_INT);
			$stmt->bindParam(':dono', $dono, PDO::PARAM_INT);
			$stmt->bindParam(':ativo', $ativo, PDO::PARAM_INT);
			$stmt->bindParam(':codigo', $codigo, PDO::PARAM_INT);
			
			if (!$stmt->execute()) {
				$pdo->rollback();
				throw new Exception("Erro interno ao sistema, ao atualizar um objeto 'carteira', necessário informar ao responsável pelo sistema.", 10);
			}
			$count = $stmt->rowCount();
			$pdo->commit();
			$retorno  = "O comando de atualização foi executado com sucesso";
			$retorno .= ($count == 0) ? ", porém nenhum registro foi alterado." : ".";
			return $retorno;
		}
		
		public function pesquisar(array $colunas) {
			$conexao = new conection();
			$pdo = $conexao -> criaPDO();
			$pdo -> beginTransaction();
			
			$temFiltro = false;
			$sql = "select * from tbfi_carteira";
			if (isset($colunas['codigo'])) {
				$codigo = $colunas['codigo'];
				$sql .= ($temFiltro) ? " and" : " where";
				$sql .= " int_codigo = :codigo";
				$temFiltro = true;
			}
			if (isset($colunas['nome'])) {
				$nome = "%".$colunas['nome']."%";
				$sql .= ($temFiltro) ? " and" : " where";
				$sql .= " str_nome like :nome";
				$temFiltro = true;
			}
			if (isset($colunas['tipo'])) {
				$tipo = $colunas['tipo'];
				$sql .= ($temFiltro) ? " and" : " where";
				$sql .= " chr_tipo = :tipo";
				$temFiltro = true;
			}
			if (isset($colunas['dono'])) {
				$dono = $colunas['dono'];
				$sql .= ($temFiltro) ? " and" : " where";
				$sql .= " chr_dono = :dono";
				$temFiltro = true;
			}
			if (isset($colunas['ativo'])) {
				$ativo = $colunas['ativo'];
				$sql .= ($temFiltro) ? " and" : " where";
				$sql .= " chr_ativo = :ativo";
				$temFiltro = true;
			}
			$sql .= ";";
			$stmt = $pdo->prepare($sql);
			if (isset($codigo)) $stmt->bindParam(':codigo', $codigo,PDO::PARAM_INT);
			if (isset($nome)) $stmt->bindParam(':nome', $nome,PDO::PARAM_STR);
			if (isset($tipo)) $stmt->bindParam(':tipo', $tipo,PDO::PARAM_INT);
			if (isset($dono)) $stmt->bindParam(':dono', $dono,PDO::PARAM_INT);
			if (isset($ativo)) $stmt->bindParam(':ativo', $ativo,PDO::PARAM_INT);
				
			if($stmt->execute()){
				if($stmt->rowCount() > 0){
					$carteiras = array();
					while($row = $stmt->fetch(PDO::FETCH_OBJ)){
						$carteira = new Carteira($row->int_codigo, $row->str_nome, $row->chr_tipo, $row->chr_dono, boolval($row->chr_ativo));
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