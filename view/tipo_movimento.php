<?php
	echo '
	<!DOCTYPE html>
	<head>
		<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	</head>
	<html>
		<body>
			<div id="tipo_movimento">
				<h3>Tipo Movimento:</h3>
					<form name="form_tipo_movimento" id="form_tipo_movimento" action="controler\contr_tipo_movimento.php" method="post">
						<input type="text" id="tipo_movimento_nome" name="tipo_movimento_nome" size="40" maxlength="150" placeholder="Tipo Movimento"/><br>
						<input type="radio" id="tipo_movimento_saida" name="tipo_movimento_saida" value=1 checked/> <label>Saída</label>
						<input type="radio" id="tipo_movimento_saida" name="tipo_movimento_saida" value=2 /> <label for="sexoF">Entrada</label><br>
						<input type="submit" name="enviar" value="Salvar" />
						<input type="submit" name="enviar" value="Alterar" />
						<input type="submit" name="enviar" value="Excluir" />
						<input type="submit" name="enviar" value="Buscar" />
						<input type="submit" name="enviar" value="Teste" />
					</form>
				<p>
			</div>
		</body>
	</html>
	';
?>