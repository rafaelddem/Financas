<?php
	include_once '..\model\dao\conection.php';
	include_once '..\model\vo\vo_tipo_movimento_detalhado.php';
	
	class DAO_tipo_movimento_detalhado{
		
		public function Salvar($tipo_movimento_detalhado){
			$conexao = new conection();
			$link = $conexao -> Open();
			$query = "insert into tipo_movimento_detalhado (nome, tipo_movimento) values ('".$tipo_movimento_detalhado -> getNome()."', '".$tipo_movimento_detalhado -> getTipoMovimento()."');";
			mysqli_query($link, $query);
			mysqli_close($link);
		}
		
		public function Alterar($tipo_movimento_detalhado){
			$conexao = new conection();
			$link = $conexao -> Open();
			$query = "update tipo_movimento_detalhado set nome = '".$tipo_movimento_detalhado -> getNome()."', tipo_movimento = '".$tipo_movimento_detalhado -> getTipoMovimento()."' where codigo = ".$tipo_movimento_detalhado -> getCodigo().";";
			mysqli_query($link, $query);
			mysqli_close($link);
		}
		
		public function Excluir($codigo){
			$conexao = new conection();
			$link = $conexao -> Open();
			$query = "delete from tipo_movimento_detalhado where codigo = ".$codigo.";";
			mysqli_query($link, $query);
			mysqli_close($link);
		}
		
		public function Pesquisar($campos){
			$conexao = new conection();
			$link = $conexao -> Open();
			$sql = "select * from tipo_movimento_detalhado";
			if(!empty($campos['nome']) or !empty($campos['tipo_movimento']) or !empty($campos['codigo'])){
				$sql .= " where ";
				if(!empty($campos['nome'])){
					$sql .= " nome like '".$campos['nome']."' and";
				}
				if(!($campos['tipo_movimento'] == null)){
					$sql .= " tipo_movimento = ".$campos['tipo_movimento']." and";
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
					$tipo = new VO_tipo_movimento_detalhado($row["nome"], $row["tipo_movimento"]);
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