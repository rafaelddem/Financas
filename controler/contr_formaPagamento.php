<?php

	namespace rafael\financas\controler;

	include_once '..\autoload.php';

	use rafael\financas\model\bo\bo_formaPagamento;
	use rafael\financas\model\entity\formaPagamento;

	echo "Testes objeto 'Forma Pagamento'";

	echo "<br>Objeto correto: ";
	try {
		$formaPagamento = new FormaPagamento(0, "Nome", true);
		echo "OK";
	} catch (\Throwable $th) {
		echo "<font color='red'>{$th->getMessage()}</font>";
	}

	echo "<br>Nome menor possível: ";
	try {
		$formaPagamento = new FormaPagamento(0, "Nom", true);
		echo "OK";
	} catch (\Throwable $th) {
		echo "<font color='red'>{$th->getMessage()}</font>";
	}

	echo "<br>Nome maior possível: ";
	try {
		$formaPagamento = new FormaPagamento(0, "Nome muito grande teste de erro com 45 caract", true);
		echo "OK";
	} catch (\Throwable $th) {
		echo "<font color='red'>{$th->getMessage()}</font>";
	}

	echo "<br>Erro com nome pequeno: ";
	$message;
	try {
		$formaPagamento = new FormaPagamento(0, "No", true);
		$message = "OK";
	} catch (\Throwable $th) {
		$message = $th->getMessage();
	}
	echo ($message == "Necessário que o identificador da forma de pagamento tenha entre 3 e 45 caracteres.") ? "OK" : "<font color='red'>$message</font>";

	echo "<br>Erro com nome grande: ";
	$message;
	try {
		$formaPagamento = new FormaPagamento(0, "Nome muito grande teste de erro com 45 caracte", true);
		$message = "OK";
	} catch (\Throwable $th) {
		$message = $th->getMessage();
	}
	echo ($message == "Necessário que o identificador da forma de pagamento tenha entre 3 e 45 caracteres.") ? "OK" : "<font color='red'>$message</font>";

	echo "<br>Erro com nome com caracteres especiais: ";
	$message;
	try {
		$formaPagamento = new FormaPagamento(0, "Nome com caracteres *", true);
		$message = "OK";
	} catch (\Throwable $th) {
		$message = $th->getMessage();
	}
	echo ($message == "Não são permitidos caracteres especiais no identificador do forma de pagamento.") ? "OK" : "<font color='red'>$message</font>";

	$bo_formaPagamento = new BO_formaPagamento();
//	echo "<br>" . $bo_formaPagamento->salvar("Nome", true);
//	echo "<br>" . $bo_formaPagamento->atualizar(8, "Nome alterado", false);

	echo "<pre>";

	$arrayTipoMovimentos = array();
	$arrayTipoMovimentos = $bo_formaPagamento -> buscarPorFiltro(null, null, null, null, null);
//	$arrayTipoMovimentos = $bo_formaPagamento -> buscarPorCodigo(27);
//	$arrayTipoMovimentos = $bo_formaPagamento -> buscarInativos();
	if (is_array($arrayTipoMovimentos)) {
		foreach ($arrayTipoMovimentos as $tipoMovimentos) {
			echo $tipoMovimentos;
			echo "<br>";
		}
	} else {
		echo $arrayTipoMovimentos;
	}
	echo "<pre>";
?>