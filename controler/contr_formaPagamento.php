<?php

	namespace rafael\financas\controler;

	include_once '..\autoload.php';

	use rafael\financas\model\bo\bo_formaPagamento;
	
	$bo_formaPagamento = new bo_formaPagamento();
	
//	echo $bo_formaPagamento -> salvar("Nome grande", true);
//	echo $bo_formaPagamento -> atualizar(8, "Outro Nome", null);
//	echo $bo_formaPagamento -> ativar(8);
//	echo $bo_formaPagamento -> inativar(8);

//	$arrayTipoMovimento = $bo_formaPagamento -> buscarPorFiltro("gasolina", null, null, null, null);
	$arrayTipoMovimento = $bo_formaPagamento -> buscarPorFiltro(null, null, null, null, null);
//	$arrayTipoMovimento = $bo_formaPagamento -> buscarPorCodigo(15);
//	$arrayTipoMovimento = $bo_formaPagamento -> buscarAtivos();
//	$arrayTipoMovimento = $bo_formaPagamento -> buscarInativos();
	if (is_array($arrayTipoMovimento)) {
		foreach ($arrayTipoMovimento as $tipoMovimento) {
			echo $tipoMovimento;
			echo "<br>";
		}
	} else {
		echo $arrayTipoMovimento;
	}

	
?>