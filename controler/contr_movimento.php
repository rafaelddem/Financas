<?php
	include_once '..\model\bo\bo_movimento.php';
	
	$bo_movimento = new bo_movimento();
	
	switch($_POST['enviar']){
		case 'Salvar':
			$bo_movimento -> Salvar($_POST['movimento_nome'], $_POST['movimento_data'], $_POST['movimento_valor'], $_POST['movimento_tipo'], $_POST['movimento_pessoa'], $_POST['movimento_tipo_pagamento'], $_POST['movimento_data_pagamento'], $_POST['movimento_descricao']);
			break;
		case 'Alterar':
			$bo_movimento -> Alterar(6, $_POST['movimento_nome'], $_POST['movimento_data'], $_POST['movimento_valor'], $_POST['movimento_tipo'], $_POST['movimento_pessoa'], $_POST['movimento_tipo_pagamento'], $_POST['movimento_data_pagamento'], $_POST['movimento_descricao']);
			break;
		case 'Excluir':
			$bo_movimento -> Excluir(6);
			break;
		case 'Buscar':
			$movimentos = $bo_movimento -> Pesquisar(null/*$codigo*/, $_POST['movimento_nome']/*$nome*/, null/*$data*/, null/*$valor*/, null/*$tipo*/, null/*$pessoa*/, null/*$tipo_pagamento*/, null/*$data_pagamento*/, null/*$descricao*/);
			$i = 0;
			if(isset($movimentos)){
				while($i < count($movimentos)){
					$movimento = $movimentos[$i++];
					echo $movimento -> getNome()."<br>";
				};
			};
			break;
	}
?>