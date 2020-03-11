<?php

	namespace rafael\financas\controler;

	include_once '..\autoload.php';

	use rafael\financas\model\bo\bo_carteira;
	echo "<pre>";
	$bo_carteira = new bo_carteira();
//	$arrayTeste = array("codigo" => "1", "nome" => "Identificador");
//	echo $arrayTeste["codigo"]."<br>";
//	echo var_dump($arrayTeste)."<br>";
	
//	echo $bo_carteira -> salvar("Nome grande", 1, 1, true);
//	echo $bo_carteira -> atualizar(29, "Nome corrigido 3", 1, 1, true);
//	echo $bo_carteira -> atualizar(34, "Nome pah de boas", null, null, true);
//	echo $bo_carteira -> atualizar(31, null, 1, 1, false);
//	echo $bo_carteira -> inativar(37);
//	echo $bo_carteira -> ativar(null, null, null, null, null);

//	$arrayCarteiras = $bo_carteira -> buscarPorFiltro("M", null, null, null);
//	$arrayCarteiras = $bo_carteira -> buscarPorCodigo(27);
	$arrayCarteiras = $bo_carteira -> buscarInativos();
	if (is_array($arrayCarteiras)) {
		foreach ($arrayCarteiras as $carteira) {
			echo $carteira;
			echo "<br>";
		}
	} else {
		echo $arrayCarteiras;
	}
	echo "<pre>";
?>