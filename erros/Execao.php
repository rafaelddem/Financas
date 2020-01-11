<?php
	
	class execao{
		
		public function __construct($erro) {
			
			switch($erro) {
				case 1:
					// Ocorre ao tentar inserir um valor não numérico, ao atributo 'código', de um objeto 'carteira'.
					throw new Exception("Necessário um valor numérico como código.", 1);
					break;
				case 2:
					// Ocorre ao tentar inserir um valor que não possua entre 3 e 30 caracteres, ao atributo 'nome', de um objeto 'carteira'.
					throw new Exception("Necessário que o identificador da carteira tenha entre 3 e 30 caracteres.", 2);
					break;
				case 3:
					// Ocorre ao tentar inserir um valor que possua algum caractere especial, ao atributo 'nome', de um objeto 'carteira'.
					throw new Exception("Não são permitidos caracteres especiais no identificador da carteira.", 3);
					break;
				case 4:
					// Ocorre ao tentar inserir um valor que não seja '1', '2' ou '3', ao atributo 'tipo', de um objeto 'carteira'.
					throw new Exception("Identificador de \'Tipo\' de carteira não aceito. Favor informar ao responsável pelo sistema.", 4);
					break;
				case 5:
					// Ocorre ao tentar inserir um valor que não seja '1" ou '2', ao atributo 'dono', de um objeto 'carteira'.
					throw new Exception("Identificador de \'Dono\' de carteira não aceito. Favor informar ao responsável pelo sistema.", 5);
					break;
				case 6:
					// Ocorre ao tentar inserir um valor que não seja booleano, ao atributo 'ativo', de um objeto 'carteira'.
					throw new Exception("Erro desconhecido ao marcar a carteira como ativa/inativa. Favor informar ao responsável pelo sistema.", 6);
					break;
				case 7:
					// Ocorre ao receber uma variável que não seja do tipo 'Carteira', na classe 'dao_carteira' (insert).
					throw new Exception("Erro interno ao sistema, ao salvar um objeto 'carteira', necessário informar ao responsável pelo sistema.", 7);
					break;
				case 8:
					// Ocorre ao tentar executar um comando 'insert' na tabela 'tbfi_carteira'.
					throw new Exception("Erro interno ao sistema, ao salvar um objeto 'carteira', necessário informar ao responsável pelo sistema.", 8);
					break;
				case 9:
					// Ocorre ao receber uma variável que não seja to tipo 'Carteira', na classe 'dao_carteira' (update).
					throw new Exception("Erro interno ao sistema, ao atualizar um objeto 'carteira', necessário informar ao responsável pelo sistema.", 9);
					break;
				case 10:
					// Ocorre ao tentar executar um comando 'update' na tabela 'tbfi_carteira'.
					throw new Exception("Erro interno ao sistema, ao atualizar um objeto 'carteira', necessário informar ao responsável pelo sistema.", 10);
					break;
				case 11:
					// Ocorre ao receber uma variável que não seja to tipo 'Carteira', na classe 'dao_carteira' (pesquisar).
					throw new Exception("Erro interno ao sistema, ao tentar buscar o(s) objeto(s) de tipo 'Carteira', necessário informar ao responsável pelo sistema.", 11);
					break;
				case 12:
					// Ocorre ao tentar buscar um ou mais registros na tabela 'tbfi_carteira'.
					throw new Exception("Erro interno ao sistema, ao tentar buscar o(s) objeto(s) de tipo 'Carteira', necessário informar ao responsável pelo sistema.", 12);
					break;
				case 13:
					// Ocorre ao tentar inserir um valor não numérico, ao atributo 'código', de um objeto 'tipoMovimento'.
					throw new Exception("Necessário um valor numérico como código.", 13);
					break;
				case 14:
					// Ocorre ao tentar inserir um valor que não possua entre 3 e 45 caracteres, ao atributo 'nome', de um objeto 'tipo de movimento'.
					throw new Exception("Necessário que o identificador do tipo de movimento tenha entre 3 e 45 caracteres.", 14);
					break;
				case 15:
					// Ocorre ao tentar inserir um valor que possua algum caractere especial, ao atributo 'nome', de um objeto 'tipo de movimento'.
					throw new Exception("Não são permitidos caracteres especiais no identificador do tipo de movimento.", 15);
					break;
				case 16:
					// Ocorre ao tentar inserir um valor que não seja '1', '2' ou '3', ao atributo 'tipo', de um objeto 'tipo de movimento'.
					throw new Exception("Identificador de 'Tipo' de Tipo de Movimento não aceito. Favor informar ao responsável pelo sistema.", 16);
					break;
				case 17:
					// Ocorre ao tentar inserir um valor que não seja '0', '1' ou '2', ao atributo 'indispensavel', de um objeto 'tipo de movimento'.
					throw new Exception("Identificador de 'Indispensavel' de Tipo de Movimento não aceito. Favor informar ao responsável pelo sistema.", 17);
					break;
				case 18:
					// Ocorre ao tentar inserir uma descrição com mais de 255 caracteres, a um objeto 'tipo de movimento'.
					throw new Exception("Descrição do Tipo de Movimento, não deve possuir mais de 255 caracteres.", 18);
					break;
				case 19:
					// Ocorre ao tentar inserir um valor que não seja booleano, ao atributo 'ativo', de um objeto 'tipo de movimento'.
					throw new Exception("Erro desconhecido ao marcar o tipo de movimento como ativo/inativo. Favor informar ao responsável pelo sistema.", 19);
					break;
				case 20:
					// Ocorre ao receber uma variável que não seja do tipo 'Tipo de Movimento', na classe 'dao_tipoMovimento' (insert).
					throw new Exception("Erro interno ao sistema, ao salvar um objeto 'Tipo de Movimento', necessário informar ao responsável pelo sistema.", 20);
					break;
				case 21:
					// Ocorre ao tentar executar um comando 'insert' na tabela 'tbfi_tipoMovimento'.
					throw new Exception("Erro interno ao sistema, ao salvar um objeto 'Tipo de Movimento', necessário informar ao responsável pelo sistema.", 21);
					break;
				case 22:
					// Ocorre ao receber uma variável que não seja to tipo 'Tipo de Movimento', na classe 'dao_tipoMovimento' (update).
					throw new Exception("Erro interno ao sistema, ao atualizar um objeto 'Tipo de Movimento', necessário informar ao responsável pelo sistema.", 22);
					break;
				case 23:
					// Ocorre ao tentar executar um comando 'update' na tabela 'tbfi_tipoMovimento'.
					throw new Exception("Erro interno ao sistema, ao atualizar um objeto 'Tipo de Movimento', necessário informar ao responsável pelo sistema.", 23);
					break;
				case 24:
					// Ocorre ao receber uma variável que não seja to tipo 'Tipo de Movimento', na classe 'dao_tipoMovimento' (pesquisar).
					throw new Exception("Erro interno ao sistema, ao tentar buscar o(s) objeto(s) de tipo 'Tipo de Movimento', necessário informar ao responsável pelo sistema.", 24);
					break;
				case 25:
					// Ocorre ao tentar buscar um ou mais registros na tabela 'tbfi_tipoMovimento'.
					throw new Exception("Erro interno ao sistema, ao tentar buscar o(s) objeto(s) de tipo 'Tipo de Movimento', necessário informar ao responsável pelo sistema.", 25);
					break;
				case 26:
					// .
					throw new Exception(".", 26);
					break;
				case 27:
					// .
					throw new Exception(".", 27);
					break;
				case 28:
					// .
					throw new Exception(".", 28);
					break;
				case 29:
					// .
					throw new Exception(".", 29);
					break;
				case 30:
					// .
					throw new Exception(".", 30);
					break;
				case 31:
					// .
					throw new Exception(".", 31);
					break;
				case 32:
					// .
					throw new Exception(".", 32);
					break;
				case 33:
					// .
					throw new Exception(".", 33);
					break;
				case 34:
					// .
					throw new Exception(".", 34);
					break;
				case 35:
					// .
					throw new Exception(".", 35);
					break;
				case 36:
					// .
					throw new Exception(".", 36);
					break;
				case 37:
					// .
					throw new Exception(".", 37);
					break;
				case 38:
					// .
					throw new Exception(".", 38);
					break;
				case 39:
					// .
					throw new Exception(".", 39);
					break;
				case 40:
					// .
					throw new Exception(".", 40);
					break;
			}
			
		}
		
	}
	
?>