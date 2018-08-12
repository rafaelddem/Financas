<?php
	echo '
	<!DOCTYPE html>
	<head>
		<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	</head>
	<html>
		<body>
			<div id="pessoa">
				<h3>Pessoas:</h3>
					<form name="form_pessoa" id="form_pessoa" action="controler\contr_pessoa.php" method="post">
						<input type="text" name="pessoa_nome" size="40" maxlength="150" placeholder="Pessoa"/><br><br>
						<input type="submit" name="enviar" value="Salvar"/>
						<input type="submit" name="enviar" value="Alterar"/>
						<input type="button" name="enviar" value="Buscar" href="javascript:void(0)" onclick="atualizaCentro(\'view/pessoa.php #pessoa_pesquisa\')";/>
					</form>
				<p>
			</div>
			<div id="pessoa_pesquisa">
				<h3>Pessoas:</h3>
				<form name="form_pessoa" id="form_pessoa" action="controler\contr_pessoa.php" method="post">
					<table>
						<tr>
							<th>Nome</th>
							<th><input type="submit" name="enviar" value="Excluir"/></th>
							<th><input type="submit" name="enviar" value="Buscar"/></th>
						</tr>
					</table>
				</form>
			</div>
		</body>
	</html>
	';
?>