<?php
	include_once '..\model\bo\bo_carteira.php';
	
	$bo_carteira = new BO_carteira();
//	$arrayTeste = array("codigo" => "1", "nome" => "Identificador");
//	echo $arrayTeste["codigo"]."<br>";
//	echo var_dump($arrayTeste)."<br>";
	
//	echo $bo_carteira -> salvar("Nome grande", 1, 1, null);
//	echo $bo_carteira -> atualizar(34, "Nome corrigido 3", null, null, false);
//	echo $bo_carteira -> atualizar(34, "Nome pah de boas", null, null, true);
//	echo $bo_carteira -> ativar(36);
//	echo $bo_carteira -> ativar(null, null, null, null, null);
	$arrayCarteiras = $bo_carteira -> buscarPorFiltro("Nome", null, null, null);
	foreach ($arrayCarteiras as $carteira) {
		echo $carteira;
		echo "<br>";
	}
//	echo $bo_carteira -> atualizar(31, null, 1, 1, false);
	
?>