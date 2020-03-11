<?php

	namespace rafael\financas\controler;

	include_once '..\autoload.php';

	use rafael\financas\model\bo\bo_formaPagamento;
	
	$bo_formaPagamento = new bo_formaPagamento();
	echo "<pre>";
//	echo $bo_formaPagamento -> salvar("Nome grande", true);
//	echo $bo_formaPagamento -> atualizar(10, "Outro Nome", null);
//	echo $bo_formaPagamento -> ativar(8);
//	echo $bo_formaPagamento -> inativar(8);

//	$arrayTipoMovimento = $bo_formaPagamento -> buscarPorFiltro("Gasolina", null);
//	$arrayTipoMovimento = $bo_formaPagamento -> buscarPorFiltro("Din", null);
//	$arrayTipoMovimento = $bo_formaPagamento -> buscarPorFiltro(null, true);
//	$arrayTipoMovimento = $bo_formaPagamento -> buscarPorCodigo(10);
	$arrayTipoMovimento = $bo_formaPagamento -> buscarAtivos();
//	$arrayTipoMovimento = $bo_formaPagamento -> buscarInativos();
	if (is_array($arrayTipoMovimento)) {
		foreach ($arrayTipoMovimento as $tipoMovimento) {
			echo $tipoMovimento;
			echo "<br>";
		}
	} else {
		echo $arrayTipoMovimento;
	}
	echo "<pre>";
	
?>