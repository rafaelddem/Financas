<?php
	include_once '..\model\dao\conection.php';
	include_once '..\model\vo\vo_pessoa.php';
	
	class DAO_pessoa{
		
		public function Salvar($pessoa){
			$conexao = new conection();
			$link = $conexao -> Open();
			$query = "insert into pessoa (nome) values ('".$pessoa -> getNome()."');";
			mysqli_query($link, $query);
			mysqli_close($link);
		}
		
		public function Alterar($pessoa){
			$conexao = new conection();
			$link = $conexao -> Open();
			$query = "update pessoa set nome = '".$pessoa -> getNome()."' where codigo = ".$pessoa -> getCodigo().";";
			mysqli_query($link, $query);
			mysqli_close($link);
		}
		
		public function Excluir($pessoa){
			$conexao = new conection();
			$link = $conexao -> Open();
			$query = "delete from pessoa where codigo = ".$pessoa -> getCodigo().";";
			mysqli_query($link, $query);
			mysqli_close($link);
		}
		
		public function Pesquisar($campos){
			$conexao = new conection();
			$link = $conexao -> Open();
			$sql = "select * from pessoa";
			if(!empty($campos['nome']) or !empty($campos['codigo'])){
				$sql .= " where ";
				if(!empty($campos['nome'])){
					$sql .= " nome like '".$campos['nome']."' and";
				}
				if(!empty($campos['codigo'])){
					$sql .= " codigo = ".$campos['codigo']." and";
				}
				$sql = substr($sql, 0, -3);
			}
			$sql .= " order by codigo;";
			$result = $link->query($sql);
			$i = 0;
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					$pessoa = new VO_pessoa($row["nome"]);
					$pessoa -> setCodigo($row["codigo"]);
					$pessoas[$i++] = $pessoa;
				}
			}else{
				$pessoas = null;
			}
			mysqli_close($link);
			return $pessoas;
		}
		
	}
?>