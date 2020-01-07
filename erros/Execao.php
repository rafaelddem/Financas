<?php
	
	class execao{
		
		public function __construct($erro) {
			
			switch($erro) {
				case 1:
					// Ocorre ao tentar inserir um valor não numérico, ao atributo "código", de um objeto carteira.
					throw new Exception("Necessário um valor numérico como código.", 1);
					break;
				case 2:
					// Ocorre ao tentar inserir um valor que não possua entre 3 e 30 caracteres, ao atributo "nome", de um objeto carteira.
					throw new Exception("Necessário que o identificador da carteira tenha entre 3 e 30 caracteres.", 2);
					break;
				case 3:
					// Ocorre ao tentar inserir um valor que possua algum caractere especial, ao atributo "nome", de um objeto carteira.
					throw new Exception("Não são permitidos caracteres especiais no nome da carteira.", 3);
					break;
				case 4:
					// Ocorre ao tentar inserir um valor que não seja "1", "2" ou "3", ao atributo "tipo", de um objeto carteira.
					throw new Exception("Identificador de \'Tipo\' de carteira não aceito. Favor informar ao responsável pelo sistema.", 4);
					break;
				case 5:
					// Ocorre ao tentar inserir um valor que não seja "1" ou "2", ao atributo "dono", de um objeto carteira.
					throw new Exception("Identificador de \'Dono\' de carteira não aceito. Favor informar ao responsável pelo sistema.", 5);
					break;
				case 6:
					// Ocorre ao tentar inserir um valor que não seja booleano, ao atributo "ativo", de um objeto carteira.
					throw new Exception("Erro desconhecido ao marcar a carteira como ativa/inativa. Favor informar ao responsável pelo sistema.", 6);
					break;
				case 7:
					// Ocorre ao receber uma variável que não seja to tipo 'Carteira', na classe 'dao_carteira' (insert).
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
					throw new Exception("Erro interno ao sistema, ao ativar/inativar um objeto 'carteira', necessário informar ao responsável pelo sistema.", 11);
					break;
				case 12:
					// Ocorre ao buscar um ou mais registros na tabela 'tbfi_carteira'.
					throw new Exception("Erro interno ao sistema, ao buscar o(s) objeto(s) de tipo 'carteira', necessário informar ao responsável pelo sistema.", 12);
					break;
				case 13:
					// .
					throw new Exception(".", 13);
					break;
				case 14:
					// .
					throw new Exception(".", 14);
					break;
				case 15:
					// .
					throw new Exception(".", 15);
					break;
				case 16:
					// .
					throw new Exception(".", 16);
					break;
				case 17:
					// .
					throw new Exception(".", 17);
					break;
				case 18:
					// .
					throw new Exception(".", 18);
					break;
				case 19:
					// .
					throw new Exception(".", 19);
					break;
				case 20:
					// .
					throw new Exception(".", 20);
					break;
			}
			
		}
		
	}
	
?>