<?php
	include_once '..\model\bo\bo_tipoMovimento.php';
	
	$bo_tipoMovimento = new BO_tipoMovimento();
//	$arrayTeste = array("codigo" => "1", "nome" => "Identificador");
//	echo $arrayTeste["codigo"]."<br>";
//	echo var_dump($arrayTeste)."<br>";
	
	echo $bo_tipoMovimento -> salvar("Nome grande", 1, 1, null);
//	echo $bo_tipoMovimento -> atualizar(34, "Nome corrigido 3", null, null, false);
//	echo $bo_tipoMovimento -> atualizar(34, "Nome pah de boas", null, null, true);
//	echo $bo_tipoMovimento -> atualizar(31, null, 1, 1, false);
//	echo $bo_tipoMovimento -> ativar(36);
//	echo $bo_tipoMovimento -> ativar(null, null, null, null, null);

//	$arrayCarteiras = $bo_tipoMovimento -> buscarPorFiltro("Nome", null, null, null);
//	foreach ($arrayCarteiras as $carteira) {
//		echo $carteira;
//		echo "<br>";
//	}

	
?>