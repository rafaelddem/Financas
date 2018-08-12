<?php
	include_once '..\model\dao\conection.php';
	include_once '..\model\vo\vo_tipo_movimento.php';
	
	class DAO_tipo_movimento{
		
		public function Salvar($tmovimento){
			$conexao = new conection();
			$link = $conexao -> Open();
			$query = "insert into tipo_movimento (nome, saida) values ('".$tmovimento -> getNome()."', '".$tmovimento -> getSaida()."');";
			mysqli_query($link, $query);
			mysqli_close($link);
		}
		
		public function Alterar($tmovimento){
			$conexao = new conection();
			$link = $conexao -> Open();
			$query = "update tipo_movimento set nome = '".$tmovimento -> getNome()."', saida = '".$tmovimento -> getSaida()."' where codigo = ".$tmovimento -> getCodigo().";";
			mysqli_query($link, $query);
			mysqli_close($link);
		}
		
		public function Excluir($codigo){
			$conexao = new conection();
			$link = $conexao -> Open();
			$query = "delete from tipo_movimento where codigo = ".$codigo.";";
			mysqli_query($link, $query);
			mysqli_close($link);
		}
		
		public function Pesquisar($campos){
			$conexao = new conection();
			$link = $conexao -> Open();
			$sql = "select * from tipo_movimento";
			if(!empty($campos['nome']) or !empty($campos['saida']) or !empty($campos['codigo'])){
				$sql .= " where ";
				if(!empty($campos['nome'])){
					$sql .= " nome like '".$campos['nome']."' and";
				}
				if(!($campos['saida'] == null)){
					$sql .= " saida = ".$campos['saida']." and";
				}
				if(!empty($campos['codigo'])){
					$sql .= " codigo = ".$campos['codigo']." and";
				}
				$sql = substr($sql, 0, -3);
			}
			$sql .= ";";
			$result = $link->query($sql);
			$i = 0;
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					$tipo = new VO_tMovimento($row["nome"], $row["saida"]);
					$tipo -> setCodigo($row["codigo"]);
					$tipos[$i++] = $tipo;
				}
			}else{
				$tipos = null;
			}
			mysqli_close($link);
			return $tipos;
		}
		
	}
?>