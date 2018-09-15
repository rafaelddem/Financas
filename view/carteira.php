<?php
	echo '
	<!DOCTYPE html>
	<head>
		<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	</head>
	<html>
		<body>
			<div id="carteira">
				<h3>Carteiras:</h3>
					<form name="form_carteira" id="form_carteira" action="controler\contr_carteira.php" method="post">
						<input type="text" name="carteira_nome" size="40" maxlength="150" placeholder="Carteira"/><br><br>
						<input type="submit" name="enviar" value="Salvar"/>
						<input type="submit" name="enviar" value="Alterar"/>
						<input type="button" name="enviar" value="Buscar" href="javascript:void(0)" onclick="atualizaCentro(\'view/carteira.php #carteira_pesquisa\')";/>
					</form>
				<p>
			</div>
			<div id="carteira_pesquisa">
				<h3>Carteiras:</h3>
				<form name="form_carteira" id="form_carteira" action="controler\contr_carteira.php" method="post">
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