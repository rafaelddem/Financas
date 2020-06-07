<?php

	namespace rafael\financas\controler;

	include_once '..\autoload.php';

	use \DateTime;
    use rafael\financas\model\entity\Carteira;
    use rafael\financas\model\entity\TipoMovimento;
    use rafael\financas\model\entity\FormaPagamento;
	use rafael\financas\model\bo\BO_Movimento;
	echo "<pre>";
	$tipoMovimento = new TipoMovimento(15, 'Diversos - Negativo', 2, 0, "", true);
	$formaPagamento = new FormaPagamento(1, 'Dinheiro', true);
	$carteiraOrigem = new Carteira(4, 'Casa', 3, 1, true);
	$carteiraDestino = new Carteira(2, 'Gasto', 2, 1, true);

	$bo_movimento = new BO_Movimento();
	$parcelas = [
		["codigo" => 1, "dataMovimento" => new DateTime(), "dataPagamento" => new DateTime(9999-12-31), "valorInicial" => 20.0, "desconto" => 0, "tributacao" => 0, "juros" => 0, "arredondamento" => 0, "valorFinal" => 20.00, "formaPagamento" => $formaPagamento, "carteiraOrigem" => $carteiraOrigem, "carteiraDestino" => $carteiraDestino], 
		["codigo" => 2, "dataMovimento" => new DateTime(), "dataPagamento" => new DateTime(9999-12-31), "valorInicial" => 15.0, "desconto" => 0, "tributacao" => 0, "juros" => 0, "arredondamento" => 0, "valorFinal" => 15.00, "formaPagamento" => $formaPagamento, "carteiraOrigem" => $carteiraOrigem, "carteiraDestino" => $carteiraDestino], 
	];
	echo $bo_movimento -> salvar2(1, $tipoMovimento, $parcelas, 0, "");
//	echo $bo_movimento -> atualizar(29, "Nome corrigido 3", 1, 1, true);
//	echo $bo_movimento -> atualizar(34, "Nome pah de boas", null, null, true);
//	echo $bo_movimento -> atualizar(31, null, 1, 1, false);
//	echo $bo_movimento -> inativar(37);
//	echo $bo_movimento -> ativar(null, null, null, null, null);

//	$arrayCarteiras = $bo_movimento -> buscarPorFiltro(null, null, null, null);
//	$arrayCarteiras = $bo_movimento -> buscarPorCodigo(27);
//	$arrayCarteiras = $bo_movimento -> buscarInativos();
/*
	if (is_array($arrayCarteiras)) {
		foreach ($arrayCarteiras as $carteira) {
			echo $carteira;
			echo "<br>";
		}
	} else {
		echo $arrayCarteiras;
	}
	echo "<pre>";
*/
?>