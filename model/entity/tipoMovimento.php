<?php

    namespace rafael\financas\model\entity;

    use \Exception;

    class TipoMovimento
    {
        private int $codigo;
        private string $nome;
        private int $tipo;
        private int $indispensavel;
        private string $descricao;
        private bool $ativo;
        
        public function __construct(int $codigo, string $nome, int $tipo, int $indispensavel, string $descricao, bool $ativo)
        {
            self::setCodigo($codigo);
            self::setNome($nome);
            self::setTipo($tipo);
            self::setIndispensavel($indispensavel);
            self::setDescricao($descricao);
            self::setAtivo($ativo);
        }
        
        public function getCodigo() : int
        {
            return $this->codigo;
        }
        
        public function setCodigo(int $codigo)
        {
            $this->codigo = $codigo;
        }
        
        public function getNome() : string
        {
            return $this->nome;
        }
        
        public function setNome(string $nome)
        {
            if(strlen($nome) < 3 or strlen($nome) > 45)
                throw new Exception("Necessário que o identificador do tipo de movimento tenha entre 3 e 45 caracteres.", 7);
            else if (preg_match('/[!@#$%&*{}$?<>:;|\/]/', $nome))
                throw new Exception("Não são permitidos caracteres especiais no identificador do tipo de movimento.", 8);
            
            $this->nome = $nome;
        }
        
        public function getTipo() : int
        {
            return $this->tipo;
        }
        
        public function setTipo(int $tipo)
        {
            if (!in_array($tipo, array(1, 2, 3)))
                throw new Exception("Identificador de 'Tipo' de Tipo de Movimento não aceito.", 9);
            
            $this->tipo = $tipo;
        }
        
        public function getIndispensavel() : int
        {
            return $this->indispensavel;
        }
        
        public function setIndispensavel(int $indispensavel)
        {
            if (!in_array($indispensavel, array(0, 1, 2)))
                throw new Exception("Identificador de 'Indispensavel' de Tipo de Movimento não aceito.", 10);
            
            $this->indispensavel = $indispensavel;
        }
        
        public function getDescricao() : string
        {
            return $this->descricao;
        }
        
        public function setDescricao(string $descricao = "")
        {
            if (strlen($descricao) > 255)
                throw new Exception("Descrição do Tipo de Movimento, não deve possuir mais de 255 caracteres.", 11);
            
            $this->descricao = $descricao;
        }
        
        public function getAtivo() : bool
        {
            return $this->ativo;
        }
        
        public function setAtivo(bool $ativo)
        {
            $this->ativo = $ativo;
        }
        
        public function __toString()
        {
            $string = "(" . $this->codigo . ")" . $this->nome;
            return $string;
        }
    
    }

?>