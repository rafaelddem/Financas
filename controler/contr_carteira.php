<?php

	namespace rafael\financas\controler;

	include_once '..\autoload.php';

	use rafael\financas\model\bo\bo_carteira;
	use rafael\financas\model\entity\carteira;

	echo "Testes objeto 'Carteira'";

	echo "<br>Objeto correto: ";
	try {
		$carteira = new Carteira(0, "Nome", 1, 1);
		echo "OK";
	} catch (\Throwable $th) {
		echo "<font color='red'>{$th->getMessage()}</font>";
	}

	echo "<br>Nome menor possível: ";
	try {
		$carteira = new Carteira(0, "Nom", 1, 1);
		echo "OK";
	} catch (\Throwable $th) {
		echo "<font color='red'>{$th->getMessage()}</font>";
	}

	echo "<br>Nome maior possível: ";
	try {
		$carteira = new Carteira(0, "Nome muito grande teste de err", 1, 1);
		echo "OK";
	} catch (\Throwable $th) {
		echo "<font color='red'>{$th->getMessage()}</font>";
	}

	echo "<br>Erro com nome pequeno: ";
	$message;
	try {
		$carteira = new Carteira(0, "No", 1, 1);
		$message = "OK";
	} catch (\Throwable $th) {
		$message = $th->getMessage();
	}
	echo ($message == "Necessário que o identificador da carteira tenha entre 3 e 30 caracteres.") ? "OK" : "<font color='red'>$message</font>";

	echo "<br>Erro com nome grande: ";
	$message;
	try {
		$carteira = new Carteira(0, "Nome muito grande teste de erro", 1, 1);
		$message = "OK";
	} catch (\Throwable $th) {
		$message = $th->getMessage();
	}
	echo ($message == "Necessário que o identificador da carteira tenha entre 3 e 30 caracteres.") ? "OK" : "<font color='red'>$message</font>";

	echo "<br>Erro com nome com caracteres especiais: ";
	$message;
	try {
		$carteira = new Carteira(0, "Nome com caracteres *", 1, 1);
		$message = "OK";
	} catch (\Throwable $th) {
		$message = $th->getMessage();
	}
	echo ($message == "Não são permitidos caracteres especiais no identificador da carteira.") ? "OK" : "<font color='red'>$message</font>";

	echo "<br>Erro com dono: ";
	$message;
	try {
		$carteira = new Carteira(0, "Nome", 0, 1);
		$message = "OK";
	} catch (\Throwable $th) {
		$message = $th->getMessage();
	}
	echo ($message == "Identificador de 'Dono' de carteira não aceito.") ? "OK" : "<font color='red'>$message</font>";

	$bo_carteira = new bo_carteira();
	//echo "<br>" . $bo_carteira -> salvar("Nome", 1, 1);
	//echo "<br>" . $bo_carteira -> atualizar(31, "Corrigido 2", 0, true);

	echo "<pre>";

	$arrayCarteiras = array();
//	$arrayCarteiras = $bo_carteira -> buscarPorFiltro(null, null, null, null);
//	$arrayCarteiras = $bo_carteira -> buscarPorCodigo(27);
//	$arrayCarteiras = $bo_carteira -> buscarInativos();
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