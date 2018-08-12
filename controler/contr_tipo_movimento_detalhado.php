<?php
	include_once '..\model\bo\bo_tmovimento.php';
	include_once '..\model\vo\vo_tmovimento.php';
	
	$bo_tmovimento = new bo_tmovimento();
	
	switch($_POST['enviar']){
		case 'Salvar':
			$bo_tmovimento -> Salvar($_POST['tipo_movimento_nome'], $_POST['tipo_movimento_saida']);
			break;
		case 'Alterar':
			$bo_tmovimento -> Alterar(14, $_POST['tipo_movimento_nome'], $_POST['tipo_movimento_saida']);
			break;
		case 'Excluir':
			$bo_tmovimento -> Excluir(14);
			break;
		case 'Buscar':
			return $tipos = $bo_tmovimento -> Pesquisar(null, $_POST['tipo_movimento_nome'], $_POST['tipo_movimento_saida']);
			break;
	}
?>