<?php
	include_once '..\model\bo\bo_pessoa.php';
	include_once '..\model\bo\bo_tmovimento.php';
	
	$bo_pessoa = new bo_pessoa();
	$pessoas = $bo_pessoa -> Pesquisar(null, $_POST['pessoa_nome']);
	$i = 0;
	$bo_tmovimento = new bo_tmovimento();
	$tmovimentos = $bo_tmovimento -> Pesquisar(null, $_POST['tipo_movimento_nome']);
	$j = 0;
	
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
						<label>Tipo de movimento:</label>
						<select id="movimento_tipo" name="movimento_tipo" maxlength="150" placeholder="Tipo de movimento">
						';
						if(isset($tmovimentos)){
							while($j < count($tmovimentos)){
								$tmovimento = $tmovimentos[$j++];
								echo '<option value='.$tmovimento -> getCodigo().'>'.$tmovimento -> toString().'</option>';
							};
						};
						echo '
						</select><br><br>
						<label>Pessoa</label>
						<select id="movimento_pessoa" name="movimento_pessoa" maxlength="150" placeholder="Pessoa">
						';
						if(isset($pessoas)){
							while($i < count($pessoas)){
								$pessoa = $pessoas[$i++];
								echo '<option value='.$pessoa -> getCodigo().'>'.$pessoa -> getNome().'</option>';
							};
						};
						echo '
						</select><br><br>
						<input type="radio" id="movimento_tipo_pagamento" name="movimento_tipo_pagamento" value=1 checked/><label>Dinheiro</label>
						<input type="radio" id="movimento_tipo_pagamento" name="movimento_tipo_pagamento" value=2 /><label>Credito</label>
						<input type="radio" id="movimento_tipo_pagamento" name="movimento_tipo_pagamento" value=3 /><label>Débito</label><br><br>
						
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
