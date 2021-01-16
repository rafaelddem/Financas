<?php

	namespace rafael\financas\controler;

	include_once '..\autoload.php';

	use rafael\financas\model\bo\bo_tipoMovimento;
	use rafael\financas\model\entity\tipoMovimento;

	echo "Testes objeto 'Tipo Movimento'";

	echo "<br>Objeto correto: ";
	try {
		$tipoMovimento = new TipoMovimento(0, "Nome", 1, 0, "descrição", true);
		echo "OK";
	} catch (\Throwable $th) {
		echo "<font color='red'>{$th->getMessage()}</font>";
	}

	echo "<br>Nome menor possível: ";
	try {
		$tipoMovimento = new TipoMovimento(0, "Nom", 1, 0, "descrição", true);
		echo "OK";
	} catch (\Throwable $th) {
		echo "<font color='red'>{$th->getMessage()}</font>";
	}

	echo "<br>Nome maior possível: ";
	try {
		$tipoMovimento = new TipoMovimento(0, "Nome muito grande teste de erro com 45 caract", 1, 0, "descrição", true);
		echo "OK";
	} catch (\Throwable $th) {
		echo "<font color='red'>{$th->getMessage()}</font>";
	}

	echo "<br>Descrição maior possível: ";
	try {
		$descricao  = "255 caracteres - 255 caracteres - 255 caracteres - 255 caracteres - 255 caracteres - 255 caracteres - 255 caracteres - 255 caracteres - 255 caracteres - 255 caracteres - ";//170
		$descricao .= "255 caracteres - 255 caracteres - 255 caracteres - 255 caracteres - 255 caracteres -.";//85
		$tipoMovimento = new TipoMovimento(0, "Nome", 1, 0, $descricao, true);
		echo "OK";
	} catch (\Throwable $th) {
		echo "<font color='red'>{$th->getMessage()}</font>";
	}

	echo "<br>Erro com nome pequeno: ";
	$message;
	try {
		$tipoMovimento = new TipoMovimento(0, "No", 1, 0, "descrição", true);
		$message = "OK";
	} catch (\Throwable $th) {
		$message = $th->getMessage();
	}
	echo ($message == "Necessário que o identificador do tipo de movimento tenha entre 3 e 45 caracteres.") ? "OK" : "<font color='red'>$message</font>";

	echo "<br>Erro com nome grande: ";
	$message;
	try {
		$tipoMovimento = new TipoMovimento(0, "Nome muito grande teste de erro com 45 caracte", 1, 0, "descrição", true);
		$message = "OK";
	} catch (\Throwable $th) {
		$message = $th->getMessage();
	}
	echo ($message == "Necessário que o identificador do tipo de movimento tenha entre 3 e 45 caracteres.") ? "OK" : "<font color='red'>$message</font>";

	echo "<br>Erro com nome com caracteres especiais: ";
	$message;
	try {
		$tipoMovimento = new TipoMovimento(0, "Nome com caracteres *", 1, 0, "descrição", true);
		$message = "OK";
	} catch (\Throwable $th) {
		$message = $th->getMessage();
	}
	echo ($message == "Não são permitidos caracteres especiais no identificador do tipo de movimento.") ? "OK" : "<font color='red'>$message</font>";

	echo "<br>Erro com tipo: ";
	$message;
	try {
		$tipoMovimento = new TipoMovimento(0, "Nome", 0, 0, "descrição", true);
		$message = "OK";
	} catch (\Throwable $th) {
		$message = $th->getMessage();
	}
	echo ($message == "Identificador de 'Tipo' de Tipo de Movimento não aceito.") ? "OK" : "<font color='red'>$message</font>";

	echo "<br>Erro com indispensavel: ";
	$message;
	try {
		$tipoMovimento = new TipoMovimento(0, "Nome", 1, 3, "descrição", true);
		$message = "OK";
	} catch (\Throwable $th) {
		$message = $th->getMessage();
	}
	echo ($message == "Identificador de 'Indispensavel' de Tipo de Movimento não aceito.") ? "OK" : "<font color='red'>$message</font>";

	echo "<br>Erro com descrição: ";
	$message;
	try {
		$descricao  = "255 caracteres - 255 caracteres - 255 caracteres - 255 caracteres - 255 caracteres - 255 caracteres - 255 caracteres - 255 caracteres - 255 caracteres - 255 caracteres - ";//170
		$descricao .= "255 caracteres - 255 caracteres - 255 caracteres - 255 caracteres - 255 caracteres -..";//85
		$tipoMovimento = new TipoMovimento(0, "Nome", 1, 0, $descricao, true);
		$message = "OK";
	} catch (\Throwable $th) {
		$message = $th->getMessage();
	}
	echo ($message == "Descrição do Tipo de Movimento, não deve possuir mais de 255 caracteres.") ? "OK" : "<font color='red'>$message</font>";

	$bo_tipoMovimento = new BO_tipoMovimento();
//	echo "<br>" . $bo_tipoMovimento->salvar("Nome", 1, 0, "descrição", true);
//	echo "<br>" . $bo_tipoMovimento->atualizar(36, "Nome alterado", 2, 1, "", false);

	echo "<pre>";

	$arrayTipoMovimentos = array();
//	$arrayTipoMovimentos = $bo_tipoMovimento -> buscarPorFiltro(null, null, null, null, null);
//	$arrayTipoMovimentos = $bo_tipoMovimento -> buscarPorCodigo(27);
//	$arrayTipoMovimentos = $bo_tipoMovimento -> buscarInativos();
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