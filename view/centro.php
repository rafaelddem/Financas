<?php
	echo '
	<!DOCTYPE html>
	<head>
		<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	</head>
	<html>
		<body>
			<div id="movimento">
				<h3>Movimento:</h3>
					<form name="form_movimento" id="form_movimento" action="controler\contr_movimento.php" method="post">
						<input type="text" id="movimento_nome" name="movimento_nome" size="40" maxlength="150" placeholder="Identificação do movimento"/><br><br>
						<input type="date" id="movimento_data" name="movimento_data"/><label>Data do movimento</label><br><br>
						<input type="text" id="movimento_valor" name="movimento_valor" size="40" maxlength="150" placeholder="Valor do movimento"/><br><br>
						<input type="text" id="movimento_tipo" name="movimento_tipo" size="40" maxlength="150" placeholder="Tipo movimento" value="1"/><label>Tipo de movimento</label><br><br>
						<input type="text" id="movimento_pessoa" name="movimento_pessoa" size="40" maxlength="150" placeholder="Pessoa" value="1"/><label>Pessoa</label><br><br>
						
						<input type="radio" id="movimento_tipo_pagamento" name="movimento_tipo_pagamento" value=1 checked/> <label>Dinheiro</label>
						<input type="radio" id="movimento_tipo_pagamento" name="movimento_tipo_pagamento" value=2 /> <label>Credito</label>
						<input type="radio" id="movimento_tipo_pagamento" name="movimento_tipo_pagamento" value=3 /> <label>Débito</label><br><br>
						
						<input type="date" id="movimento_data_pagamento" name="movimento_data_pagamento"/><label>Data do pagamento</label><br><br>
						<textarea id="movimento_descricao" name="movimento_descricao" size="40" maxlength="150" placeholder="Descrição do movimento"></textarea><br><br>
						<input type="submit" name="enviar" value="Salvar" />
						<input type="submit" name="enviar" value="Alterar" />
						<input type="submit" name="enviar" value="Excluir" />
						<input type="submit" name="enviar" value="Buscar" />
					</form>
				<p>
			</div>
		</body>
	</html>
	';
?>