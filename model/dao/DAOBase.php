<?php

    namespace rafael\financas\model\dao;

    use \PDO;
    use rafael\financas\model\dao\Conection;

    abstract class DAOBase
    {
        private PDO $pdo;
        
        protected function __construct()
        {
            $conexao = new Conection();
            self::setPDO($conexao->criaPDO());
        }
        
        protected function setPDO(PDO $pdo)
        {
            $this->pdo = $pdo;
        }
        
        protected function getPDO() : PDO
        {
            return $this->pdo;
        }
        
    }
    
?>