<?php

	namespace rafael\financas\controler;

	include_once '..\autoload.php';

	use rafael\financas\model\bo\bo_tipoMovimento;
	
	$bo_tipoMovimento = new BO_tipoMovimento();
	
//	echo $bo_tipoMovimento -> salvar("Nome grande", 1, 1, null, false);
//	echo $bo_tipoMovimento -> atualizar(47, "Outro Nome 2", null, null, null, null);
//	echo $bo_tipoMovimento -> atualizar(34, "Nome pah de boas", null, null, true);
//	echo $bo_tipoMovimento -> atualizar(50, null, null, null, null, false);
//	echo $bo_tipoMovimento -> ativar(58);
//	echo $bo_tipoMovimento -> ativar(null, null, null, null, null);

//	$arrayTipoMovimento = $bo_tipoMovimento -> buscarPorFiltro("gasolina", null, null, null, null);
	$arrayTipoMovimento = $bo_tipoMovimento -> buscarPorFiltro(null, null, null, null, null);
//	$arrayTipoMovimento = $bo_tipoMovimento -> buscarPorCodigo(15);
//	$arrayTipoMovimento = $bo_tipoMovimento -> buscarAtivos();
//	$arrayTipoMovimento = $bo_tipoMovimento -> buscarInativos();
	if (is_array($arrayTipoMovimento)) {
		foreach ($arrayTipoMovimento as $tipoMovimento) {
			echo $tipoMovimento;
			echo "<br>";
		}
	} else {
		echo $arrayTipoMovimento;
	}

	
?>