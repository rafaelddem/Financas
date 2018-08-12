<?php
	include_once '..\model\dao\conection.php';
	include_once '..\model\vo\vo_movimento.php';
	include_once '..\model\bo\bo_tmovimento.php';
	include_once '..\model\bo\bo_pessoa.php';
	
	class DAO_movimento{
		
		public function Salvar($movimento){
			$conexao = new conection();
			$link = $conexao -> Open();
			$sql  = "insert into movimento (nome, data, valor, tipo_movimento, pessoa, tipo_pagamento, data_pagamento, descricao) values (";
			$sql .= "'".$movimento -> getNome()."'";
			$sql .= ",'".$movimento -> getData()."'";
			$sql .= ", ".$movimento -> getValor()."";
			$sql .= ", ".$movimento -> getTipo() -> getCodigo()."";
			$sql .= ", ".$movimento -> getPessoa() -> getCodigo();
			$sql .= ", ".$movimento -> getTipoPagamento()."";
			if(!empty($movimento -> getDataPagamento())){
				$sql .= ", '".$movimento -> getDataPagamento()."'";
			}else{
				$sql .= ", null";
			}
			if(!empty($movimento -> getDescricao())){
				$sql .= ", '".$movimento -> getDescricao()."'";
			}else{
				$sql .= ", null";
			}
			$sql .= ");";
			echo $sql;
			mysqli_query($link, $sql);
			mysqli_close($link);
		}
		
		public function Alterar($movimento){
			$conexao = new conection();
			$link = $conexao -> Open();
			$sql = "update movimento set nome = '".$movimento -> getNome()."'";
			$sql .=", data = '".$movimento -> getData()."'";
			$sql .=", valor = ".$movimento -> getValor();
			$sql .=", tipo_movimento = ".$movimento -> getTipo() -> getCodigo();
			$sql .=", pessoa = ".$movimento -> getPessoa() -> getCodigo();
			$sql .=", tipo_pagamento = ".$movimento -> getTipoPagamento();
			$sql .=", data_pagamento = '".$movimento -> getDataPagamento()."'";
			$sql .=", descricao = '".$movimento -> getDescricao()."'";
			if(!empty($movimento -> getDataPagamento())){
				$sql .= ", data_pagamento = '".$movimento -> getDataPagamento()."'";
			}else{
				$sql .= ", data_pagamento = null";
			}
			if(!empty($movimento -> getDescricao())){
				$sql .= ", descricao = '".$movimento -> getDescricao()."'";
			}else{
				$sql .= ", descricao = null";
			}
			$sql .=" where codigo = ".$movimento -> getCodigo().";";
			echo $sql;
			mysqli_query($link, $sql);
			mysqli_close($link);
		}
		
		public function Excluir($codigo){
			$conexao = new conection();
			$link = $conexao -> Open();
			$sql = "delete from movimento where codigo = ".$codigo.";";
			mysqli_query($link, $sql);
			mysqli_close($link);
		}
		
		public function Pesquisar($campos){
			$conexao = new conection();
			$link = $conexao -> Open();
			$sql = "select * from movimento";
			if(!empty($campos)){
				$sql .= " where ";
				if(!empty($campos['nome'])){
					$sql .= " nome like '".$campos['nome']."' and";
				}
				if(!($campos['data'] == null)){
					$sql .= " data = ".$campos['data']." and";
				}
				if(!empty($campos['valor'])){
					$sql .= " valor = ".$campos['valor']." and";
				}
				if(!empty($campos['tipo_movimento'])){
					$sql .= " tipo_movimento = ".$campos['tipo_movimento']." and";
				}
				if(!empty($campos['pessoa'])){
					$sql .= " pessoa = ".$campos['pessoa']." and";
				}
				if(!empty($campos['tipo_pagamento'])){
					$sql .= " tipo_pagamento = ".$campos['tipo_pagamento']." and";
				}
				if(!empty($campos['data_pagamento'])){
					$sql .= " data_pagamento = ".$campos['data_pagamento']." and";
				}
				if(!empty($campos['descricao'])){
					$sql .= " descricao = ".$campos['descricao']." and";
				}
				if(!empty($campos['codigo'])){
					$sql .= " codigo = ".$campos['codigo']." and";
				}
			}else{
				$sql .= "and";
			}
			$sql = substr($sql, 0, -3);
			$sql .= ";";
			$result = $link->query($sql);
			$i = 0;
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					//$row["nome"], $row["data"], $row["valor"], $row["tipo_movimento"], $row["pessoa"], $row["tipo_pagamento"], $row["data_pagamento"], $row["descricao"]
					$bo_tmovimento = new bo_tmovimento();
					$tipo_movimento = $bo_tmovimento -> Pesquisar($row["tipo_movimento"], null, null);
					$bo_pessoa = new bo_pessoa();
					$pessoa = $bo_pessoa -> Pesquisar($row["pessoa"], null);
					$movimento = new VO_movimento($row["nome"], $row["data"], $row["valor"], $tipo_movimento[0], $pessoa[0], $row["tipo_pagamento"], $row["data_pagamento"], $row["descricao"]);
					$movimento -> setCodigo($row["codigo"]);
					$movimentos[$i++] = $movimento;
				}
			}else{
				$movimentos = null;
			}
			mysqli_close($link);
			return $movimentos;
		}
		
	}
?>