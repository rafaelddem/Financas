<?php

    namespace rafael\financas\model\entity;

    use \Exception;

    class FormaPagamento
    {
        private int $codigo;
        private String $nome;
        private bool $ativo;
        
        public function __construct(int $codigo, string $nome, bool $ativo)
        {
            self::setCodigo($codigo);
            self::setNome($nome);
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
                throw new Exception("Necessário que o identificador da forma de pagamento tenha entre 3 e 45 caracteres.", 15);
            else if (preg_match('/[!@#$%&*{}$?<>:;|\/]/', $nome))
                throw new Exception("Não são permitidos caracteres especiais no identificador do forma de pagamento.", 16);
            
            $this->nome = $nome;
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