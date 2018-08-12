<?php
	include_once '..\model\bo\bo_pessoa.php';
	
	$bo_pessoa = new bo_pessoa();
	
	switch($_POST['enviar']){
		case 'Salvar':
			$resposta = $bo_pessoa -> Salvar($_POST['pessoa_nome']);
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
			$resposta = $bo_pessoa -> Alterar($_POST['pessoa_codigo'], $_POST['pessoa_nome']);
			if($resposta === true){
				echo '<script language="javascript">';
				echo 'alert("Cadastro salvo com sucesso.");';
				echo 'window.location.href=\'../index.php\';';
				echo '</script>';
			}else{
				echo '<script language="javascript">alert("'.$bo_pessoa -> Salvar($_POST['pessoa_nome']).'"); location.href="javascript:history.go(-1)";</script>';
			}
			break;
		case 'Excluir':
			$bo_pessoa -> Excluir();
			break;
		case 'Buscar':
			$pessoas = $bo_pessoa -> Pesquisar(null, $_POST['pessoa_nome']);
			$i = 0;
			if(isset($pessoas)){
				echo "<script language='javascript'>alert('Teste'); window.location.href='../index.php#pessoa';</script>";
			//	echo "<script language='javascript'>alert('Teste'); window.location.href='../index.php' $('#centro').load(#view/pessoa.php #pessoa_pesquisa)';</script>";
			}else{
				echo '<script language="javascript">alert("Não foi encontrado nenhum Cadastro"); location.href="javascript:history.go(-1)";</script>';
			};
			break;
	}
?>