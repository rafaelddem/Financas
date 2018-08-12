<?php
	echo '
	<!DOCTYPE html>
	<head>
		<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	</head>
	<html>
		<body>
			<div id="pessoa_pesquisa">
				<h3>Pessoas:</h3>
				<form name="form_pessoa" id="form_pessoa" action="controler\contr_pessoa.php" method="post">
					<table>
						<tr>
							<th>Nome</th>
							<th><input type="submit" name="enviar" value="Alterar" /></th>
							<th><input type="submit" name="enviar" value="Excluir"/></th>
						</tr>
					</table>
				</form>
			</div>
		</body>
	</html>
	';
?>