<?php
	echo '
		<!DOCTYPE html>
		<html>
			<head lang="en">
				<meta http-equiv="content-type" content="text/html;charset=utf-8" />
				<title>Finanças</title>
				<link rel="stylesheet" type="text/css" href="css/style.css">
				<script src="js/jquery.min.js"></script>
				<script src="js/bs_leftnavi.js"></script>
				<script type="text/javascript">
					function atualizaCentro(pagina){
						$("#centro").load(pagina);
					}
				</script>
			</head>
			<body>
				<div class="gw-sidebar">
					<ul class="gw-nav gw-nav-list">
						<li><a href="javascript:void(0)" onclick="atualizaCentro(\'view/home.php #home\');">Início</a></li>
						<li><a>Cadastros</a>
							<ul class="gw-submenu">
								<li><a onclick="atualizaCentro(\'view/movimento.php #movimento\');">Movimento</a></li>
								<li><a onclick="atualizaCentro(\'view/tipo_movimento.php #tipo_movimento\');">Tipo de Movimento</a></li>
								<li><a onclick="atualizaCentro(\'view/pessoa.php #pessoa\');">Pessoa</a></li>
							</ul>
						</li>
						<li><a href="javascript:void(0)">Relatórios</a></b>
							<ul class="gw-submenu">
								<li><a href="javascript:void(0)">Totais</a></li>
							</ul>
						</li>
						<li><a href="javascript:void(0)">Sair</a></li>
					</ul>
				</div>
				<div id="centro">
				</div>
			</body>
		</html>';
?>