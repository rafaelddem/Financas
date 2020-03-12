<?php

    namespace rafael\financas\model\dao;

    include_once '..\autoload.php';

    use \PDO;
    use rafael\financas\model\dao\Conection;
    use rafael\financas\model\entity\TipoMovimento;

    class DAO_TipoMovimento
    {
        public function salvar(TipoMovimento $tipoMovimento)
        {
            $conexao = new conection();
            $pdo = $conexao -> criaPDO();
            $pdo -> beginTransaction();
            
            $stmt = $pdo->prepare("insert into tbfi_tipoMovimento (str_nome, chr_tipo, int_indispensavel, str_descricao, chr_ativo) values (:nome, :tipo, :indispensavel, :descricao, :ativo);");
            $nome = $tipoMovimento->getNome();
            $tipo = $tipoMovimento->getTipo();
            $indispensavel = $tipoMovimento->getIndispensavel();
            $descricao = $tipoMovimento->getDescricao();
            $descricao = (isset($descricao)) ? $descricao : null;
            $ativo = $tipoMovimento->getAtivo();
            $stmt->bindParam(':nome', $nome,PDO::PARAM_STR);
            $stmt->bindParam(':tipo', $tipo,PDO::PARAM_INT);
            $stmt->bindParam(':indispensavel', $indispensavel,PDO::PARAM_INT);
            $stmt->bindParam(':descricao', $descricao,PDO::PARAM_STR);
            $stmt->bindParam(':ativo', $ativo,PDO::PARAM_INT);

            if (!$stmt->execute()) {
                $pdo->rollback();
                throw new Exception("Erro interno ao sistema, ao salvar um objeto 'Tipo de Movimento', necessário informar ao responsável pelo sistema.", 21);
            }
            
            $pdo->commit();
            return "Objeto 'Tipo de Movimento' salvo com sucesso.";
        }
        
        public function atualizar(TipoMovimento $tipoMovimento)
        {
            $conexao = new conection();
            $pdo = $conexao -> criaPDO();
            $pdo -> beginTransaction();
            
            $sql = "update tbfi_tipoMovimento set str_nome = :nome, chr_tipo = :tipo, int_indispensavel = :indispensavel, str_descricao = :descricao, chr_ativo = :ativo where int_codigo = :codigo;";
            $nome = $tipoMovimento->getNome();
            $tipo = $tipoMovimento->getTipo();
            $indispensavel = $tipoMovimento->getIndispensavel();
            $descricao = $tipoMovimento->getDescricao();
            $descricao = (isset($descricao)) ? $descricao : null;
            $ativo = $tipoMovimento->getAtivo();
            $codigo = $tipoMovimento->getCodigo();
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':nome', $nome,PDO::PARAM_STR);
            $stmt->bindParam(':tipo', $tipo,PDO::PARAM_INT);
            $stmt->bindParam(':indispensavel', $indispensavel,PDO::PARAM_INT);
            $stmt->bindParam(':descricao', $descricao,PDO::PARAM_INT);
            $stmt->bindParam(':ativo', $ativo,PDO::PARAM_INT);
            $stmt->bindParam(':codigo', $codigo,PDO::PARAM_INT);

            if (!$stmt->execute()) {
                $pdo->rollback();
                throw new Exception("Erro interno ao sistema, ao atualizar um objeto 'Tipo de Movimento', necessário informar ao responsável pelo sistema.", 23);
            }
            $count = $stmt->rowCount();
            $pdo->commit();
            $retorno  = "O comando de atualização foi executado com sucesso";
            $retorno .= ($count == 0) ? ", porém nenhum registro foi alterado." : ".";
            return $retorno;
        }
        
        public function pesquisar(array $colunas)
        {
            $conexao = new conection();
            $pdo = $conexao -> criaPDO();
            $pdo -> beginTransaction();
            
            $temFiltro = false;
            $sql = "select * from tbfi_tipoMovimento";
            if (isset($colunas['codigo'])) {
                $codigo = $colunas['codigo'];
                $sql .= ($temFiltro) ? " and" : " where";
                $sql .= " int_codigo = :codigo";
                $temFiltro = true;
            }
            if (isset($colunas['nome'])) {
                $nome = "%".$colunas['nome']."%";
                $sql .= ($temFiltro) ? " and" : " where";
                $sql .= " str_nome like :nome";
                $temFiltro = true;
            }
            if (isset($colunas['tipo'])) {
                $tipo = $colunas['tipo'];
                $sql .= ($temFiltro) ? " and" : " where";
                $sql .= " chr_tipo = :tipo";
                $temFiltro = true;
            }
            if (isset($colunas['indispensavel'])) {
                $indispensavel = $colunas['indispensavel'];
                $sql .= ($temFiltro) ? " and" : " where";
                $sql .= " int_indispensavel = :indispensavel";
                $temFiltro = true;
            }
            if (isset($colunas['descricao'])) {
                $descricao = $colunas['descricao'];
                $sql .= ($temFiltro) ? " and" : " where";
                $sql .= " str_descricao like :descricao";
                $temFiltro = true;
            }
            if (isset($colunas['ativo'])) {
                $ativo = $colunas['ativo'];
                $sql .= ($temFiltro) ? " and" : " where";
                $sql .= " chr_ativo = :ativo";
                $temFiltro = true;
            }
            $sql .= ";";
            $stmt = $pdo->prepare($sql);
            if (isset($codigo)) $stmt->bindParam(':codigo', $codigo,PDO::PARAM_INT);
            if (isset($nome)) $stmt->bindParam(':nome', $nome,PDO::PARAM_STR);
            if (isset($tipo)) $stmt->bindParam(':tipo', $tipo,PDO::PARAM_INT);
            if (isset($indispensavel)) $stmt->bindParam(':indispensavel', $indispensavel,PDO::PARAM_INT);
            if (isset($descricao)) $stmt->bindParam(':descricao', $descricao."%",PDO::PARAM_STR);
            if (isset($ativo)) $stmt->bindParam(':ativo', $ativo,PDO::PARAM_INT);

            if($stmt->execute()) {
                if($stmt->rowCount() > 0) {
                    $tiposMovimento = array();
                    while($row = $stmt->fetch(PDO::FETCH_OBJ)){
                        $tipoMovimento = new TipoMovimento($row->int_codigo, $row->str_nome, $row->chr_tipo, $row->int_indispensavel, $row->str_descricao, boolval($row->chr_ativo));
                        array_push($tiposMovimento, $tipoMovimento);
                    }
                } else {
                    $pdo->rollback();
                    $retorno  = "Não há registro para os filtros pesquisados.";
                    return $retorno;
                }
            } else {
                $pdo->rollback();
                throw new Exception("Erro interno ao sistema, ao tentar buscar o(s) objeto(s) de tipo 'Tipo de Movimento', necessário informar ao responsável pelo sistema.", 25);
            }
            
            $pdo->commit();
            return $tiposMovimento;
        }
        
    }
    
?>