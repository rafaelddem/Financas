<?php
	include_once '..\model\bo\bo_tipo_movimento.php';
	include_once '..\model\vo\vo_tipo_movimento.php';
	
	$bo_tipo_movimento = new bo_tipo_movimento();
	
	switch($_POST['enviar']){
		case 'Salvar':
			$resposta = $bo_tipo_movimento -> Salvar($_POST['tipo_movimento_nome'], $_POST['tipo_movimento_saida']);
			if($resposta === true){
				echo "<script language='javascript'>";
				echo 'alert("Cadastro salvo com sucesso.");';
				echo 'window.location.href=\'../index.php\';';
				echo '</script>';
			}else{
				echo '<script language="javascript">alert("'.$resposta.'"); location.href="javascript:history.go(-1)";</script>';
			}
			break;
		case 'Alterar':
			$resposta = $bo_tipo_movimento -> Alterar(10, $_POST['tipo_movimento_nome'], $_POST['tipo_movimento_saida']);
			if($resposta === true){
				echo "<script language='javascript'>";
				echo 'alert("Cadastro salvo com sucesso.");';
				echo 'window.location.href=\'../index.php\';';
				echo '</script>';
			}else{
				echo '<script language="javascript">alert("'.$resposta.'"); location.href="javascript:history.go(-1)";</script>';
			}
		case 'Excluir':
			$bo_tipo_movimento -> Excluir(14);
			break;
		case 'Buscar':
			return $tipos = $bo_tipo_movimento -> Pesquisar(null, $_POST['tipo_movimento_nome'], $_POST['tipo_movimento_saida']);
			break;
	}
?>